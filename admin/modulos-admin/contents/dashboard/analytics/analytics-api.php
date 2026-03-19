<?php
/**
 * Analytics API - Google Analytics Integration
 * Configure apenas o arquivo .env
 */

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'ga4_property_id' => $_ENV['GA4_PROPERTY_ID'],
    'service_account_json' => $_ENV['SERVICE_ACCOUNT_JSON'],
    'site_url' => $_ENV['SITE_URL'],
    'timezone' => $_ENV['TIMEZONE']
];

if ($config['ga4_property_id'] === 'SEU_PROPERTY_ID_AQUI') {
    die(json_encode(['error' => 'Configure o GA4_PROPERTY_ID no arquivo .env']));
}

if (!file_exists($config['service_account_json'])) {
    die(json_encode(['error' => 'Arquivo de credenciais não encontrado: ' . $config['service_account_json']]));
}

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\FilterExpression;
use Google\Analytics\Data\V1beta\Filter;
use Google\Analytics\Data\V1beta\StringFilter;

try {
    $client = new BetaAnalyticsDataClient([
        'credentials' => $config['service_account_json']
    ]);
} catch (Exception $e) {
    die(json_encode(['error' => 'Erro na inicialização: ' . $e->getMessage()]));
}

$property_id = $config['ga4_property_id'];

// ===================== PARSE RANGE DAS REQUISIÇÕES =====================
// O frontend envia via POST (JSON) os campos data_inicio e data_fim (YYYY-MM-DD)
// Mantemos compatibilidade com GET se necessário
$REQUEST_START_DATE = null;
$REQUEST_END_DATE = null;

// Lê corpo JSON se for POST
$rawBody = file_get_contents('php://input');
$body = json_decode($rawBody, true);
if (!is_array($body)) { $body = []; }

// Prioridade: POST JSON > GET querystring
$start = $body['data_inicio'] ?? ($_GET['data_inicio'] ?? null);
$end = $body['data_fim'] ?? ($_GET['data_fim'] ?? null);

// Validação simples do formato YYYY-MM-DD
$isValidDate = function ($d) {
    if (!is_string($d)) return false;
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $d)) return false;
    [$y,$m,$day] = explode('-', $d);
    return checkdate((int)$m, (int)$day, (int)$y);
};

if ($isValidDate($start) && $isValidDate($end)) {
    // Se as datas forem válidas, usa-as (corrige ordem se necessário)
    if (strtotime($start) > strtotime($end)) {
        [$start, $end] = [$end, $start];
    }
    $REQUEST_START_DATE = $start;
    $REQUEST_END_DATE = $end;
}

function createDateRange() {
    // Usa o intervalo solicitado; se não enviado, usa 30 dias
    global $REQUEST_START_DATE, $REQUEST_END_DATE;
    if (!empty($REQUEST_START_DATE) && !empty($REQUEST_END_DATE)) {
        return new DateRange([
            'start_date' => $REQUEST_START_DATE,
            'end_date' => $REQUEST_END_DATE,
        ]);
    }
    return new DateRange([
        'start_date' => '30daysAgo',
        'end_date' => 'today',
    ]);
}

function getPerformanceData($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'metrics' => [
                new Metric(['name' => 'sessions']),
                new Metric(['name' => 'activeUsers']),
                new Metric(['name' => 'screenPageViews']),
                new Metric(['name' => 'bounceRate']),
                new Metric(['name' => 'averageSessionDuration'])
            ]
        ]);

        $sessions = 0;
        $users = 0;
        $pageviews = 0;
        $bounce_rate = 0;
        $avg_duration = 0;

        foreach ($response->getRows() as $row) {
            $values = $row->getMetricValues();
            $sessions = $values[0]->getValue();
            $users = $values[1]->getValue();
            $pageviews = $values[2]->getValue();
            $bounce_rate = round($values[3]->getValue() * 100, 2);
            $avg_duration = $values[4]->getValue();
        }

        $minutes = floor($avg_duration / 60);
        $seconds = $avg_duration % 60;
        $duration_formatted = sprintf('%d:%02d', $minutes, $seconds);

        return [
            'sessoes' => $sessions,
            'usuarios' => $users,
            'pageviews' => $pageviews,
            'bounce_rate' => $bounce_rate . '%',
            'duracao_media' => $duration_formatted
        ];

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar dados de performance: ' . $e->getMessage()];
    }
}

function getGeoCities($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'city']),
                new Dimension(['name' => 'region'])
            ],
            'metrics' => [
                new Metric(['name' => 'sessions'])
            ],
            'limit' => 10
        ]);

        $cities = [];
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $cities[] = [
                'city' => $dimensions[0]->getValue(),
                'region' => $dimensions[1]->getValue(),
                'sessions' => intval($metrics[0]->getValue())
            ];
        }

        return $cities;

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar cidades: ' . $e->getMessage()];
    }
}

function getGeoStates($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'region'])
            ],
            'metrics' => [
                new Metric(['name' => 'sessions'])
            ]
        ]);

        $states = [];
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $states[] = [
                'region' => $dimensions[0]->getValue(),
                'sessions' => intval($metrics[0]->getValue())
            ];
        }

        return $states;

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar estados: ' . $e->getMessage()];
    }
}

function getDevices($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'deviceCategory'])
            ],
            'metrics' => [
                new Metric(['name' => 'sessions'])
            ]
        ]);

        $devices = [];
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $devices[] = [
                'device' => $dimensions[0]->getValue(),
                'sessions' => intval($metrics[0]->getValue())
            ];
        }

        return $devices;

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar dispositivos: ' . $e->getMessage()];
    }
}

function getTrafficSources($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'sessionSource']),
                new Dimension(['name' => 'sessionMedium'])
            ],
            'metrics' => [
                new Metric(['name' => 'sessions'])
            ],
            'limit' => 10
        ]);

        $sources = [];
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $sources[] = [
                'source' => $dimensions[0]->getValue(),
                'medium' => $dimensions[1]->getValue(),
                'sessions' => intval($metrics[0]->getValue())
            ];
        }

        return $sources;

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar fontes de tráfego: ' . $e->getMessage()];
    }
}

function getBrowsers($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'browser']),
                new Dimension(['name' => 'operatingSystem'])
            ],
            'metrics' => [
                new Metric(['name' => 'sessions'])
            ],
            'limit' => 10
        ]);

        $browsers = [];
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $browsers[] = [
                'browser' => $dimensions[0]->getValue(),
                'os' => $dimensions[1]->getValue(),
                'sessions' => intval($metrics[0]->getValue())
            ];
        }

        return $browsers;

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar navegadores: ' . $e->getMessage()];
    }
}

function getOperatingSystems($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'operatingSystem'])
            ],
            'metrics' => [
                new Metric(['name' => 'sessions'])
            ],
            'limit' => 10
        ]);

        $systems = [];
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $systems[] = [
                'sistema' => $dimensions[0]->getValue(),
                'total' => intval($metrics[0]->getValue())
            ];
        }

        return $systems;

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar sistemas operacionais: ' . $e->getMessage()];
    }
}

function getResolutions($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'screenResolution'])
            ],
            'metrics' => [
                new Metric(['name' => 'sessions'])
            ],
            'limit' => 10
        ]);

        $resolutions = [];
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $resolutions[] = [
                'resolucao' => $dimensions[0]->getValue(),
                'total' => intval($metrics[0]->getValue())
            ];
        }

        return $resolutions;

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar resoluções: ' . $e->getMessage()];
    }
}

function getMostVisited($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'pagePath']),
                new Dimension(['name' => 'pageTitle'])
            ],
            'metrics' => [
                new Metric(['name' => 'screenPageViews'])
            ],
            'limit' => 10
        ]);

        $pages = [];
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $pages[] = [
                'pagina' => $dimensions[0]->getValue(),
                'titulo' => $dimensions[1]->getValue(),
                'total' => intval($metrics[0]->getValue())
            ];
        }

        return $pages;

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar páginas mais visitadas: ' . $e->getMessage()];
    }
}

function getUserTypes($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'newVsReturning'])
            ],
            'metrics' => [
                new Metric(['name' => 'activeUsers'])
            ]
        ]);

        $userTypes = [];
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $type = $dimensions[0]->getValue();
            $label = $type === 'new' ? 'Novos Visitantes' : 'Visitantes Recorrentes';
            
            $userTypes[] = [
                'tipo' => $label,
                'usuarios' => intval($metrics[0]->getValue())
            ];
        }

        return $userTypes;

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar tipos de usuário: ' . $e->getMessage()];
    }
}

function getPageFlow($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'landingPage']),
                new Dimension(['name' => 'pagePath'])
            ],
            'metrics' => [
                new Metric(['name' => 'screenPageViews'])
            ],
            'limit' => 20
        ]);

        $pageFlow = [];
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $pageFlow[] = [
                'pagina_entrada' => $dimensions[0]->getValue(),
                'pagina_destino' => $dimensions[1]->getValue(),
                'pageviews' => intval($metrics[0]->getValue())
            ];
        }

        return $pageFlow;

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar fluxo de páginas: ' . $e->getMessage()];
    }
}

function getDeviceDetails($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'deviceCategory'])
            ],
            'metrics' => [
                new Metric(['name' => 'sessions']),
                new Metric(['name' => 'averageSessionDuration']),
                new Metric(['name' => 'screenPageViewsPerSession']),
                new Metric(['name' => 'bounceRate'])
            ]
        ]);

        $deviceDetails = [];
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $duration = intval($metrics[1]->getValue());
            $minutes = floor($duration / 60);
            $seconds = $duration % 60;
            $duration_formatted = sprintf('%d:%02d', $minutes, $seconds);
            
            $deviceDetails[] = [
                'dispositivo' => $dimensions[0]->getValue(),
                'sessoes' => intval($metrics[0]->getValue()),
                'duracao_media' => $duration_formatted,
                'paginas_por_sessao' => round($metrics[2]->getValue(), 1),
                'taxa_rejeicao' => round($metrics[3]->getValue() * 100, 1) . '%'
            ];
        }

        return $deviceDetails;

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar detalhes de dispositivos: ' . $e->getMessage()];
    }
}

function getGeoMap($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'region'])
            ],
            'metrics' => [
                new Metric(['name' => 'sessions'])
            ]
        ]);

        // Mapeamento de estados do GA para códigos do Google Maps
        // GA retorna nomes como "State of Rio Grande do Sul", então precisamos mapear ambos os formatos
        $stateMapping = [
            'São Paulo' => 'BR-SP', 'State of São Paulo' => 'BR-SP',
            'Rio de Janeiro' => 'BR-RJ', 'State of Rio de Janeiro' => 'BR-RJ',
            'Minas Gerais' => 'BR-MG', 'State of Minas Gerais' => 'BR-MG',
            'Bahia' => 'BR-BA', 'State of Bahia' => 'BR-BA',
            'Paraná' => 'BR-PR', 'State of Paraná' => 'BR-PR',
            'Rio Grande do Sul' => 'BR-RS', 'State of Rio Grande do Sul' => 'BR-RS',
            'Pernambuco' => 'BR-PE', 'State of Pernambuco' => 'BR-PE',
            'Ceará' => 'BR-CE', 'State of Ceará' => 'BR-CE',
            'Pará' => 'BR-PA', 'State of Pará' => 'BR-PA',
            'Santa Catarina' => 'BR-SC', 'State of Santa Catarina' => 'BR-SC',
            'Goiás' => 'BR-GO', 'State of Goiás' => 'BR-GO',
            'Maranhão' => 'BR-MA', 'State of Maranhão' => 'BR-MA',
            'Espírito Santo' => 'BR-ES', 'State of Espírito Santo' => 'BR-ES',
            'Paraíba' => 'BR-PB', 'State of Paraíba' => 'BR-PB',
            'Amazonas' => 'BR-AM', 'State of Amazonas' => 'BR-AM',
            'Mato Grosso' => 'BR-MT', 'State of Mato Grosso' => 'BR-MT',
            'Rio Grande do Norte' => 'BR-RN', 'State of Rio Grande do Norte' => 'BR-RN',
            'Alagoas' => 'BR-AL', 'State of Alagoas' => 'BR-AL',
            'Piauí' => 'BR-PI', 'State of Piauí' => 'BR-PI',
            'Distrito Federal' => 'BR-DF', 'Federal District' => 'BR-DF',
            'Mato Grosso do Sul' => 'BR-MS', 'State of Mato Grosso do Sul' => 'BR-MS',
            'Sergipe' => 'BR-SE', 'State of Sergipe' => 'BR-SE',
            'Rondônia' => 'BR-RO', 'State of Rondônia' => 'BR-RO',
            'Acre' => 'BR-AC', 'State of Acre' => 'BR-AC',
            'Tocantins' => 'BR-TO', 'State of Tocantins' => 'BR-TO',
            'Roraima' => 'BR-RR', 'State of Roraima' => 'BR-RR',
            'Amapá' => 'BR-AP', 'State of Amapá' => 'BR-AP'
        ];

        $geoData = [];
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $stateName = $dimensions[0]->getValue();
            $sessions = intval($metrics[0]->getValue());
            
            // Buscar código do estado para o mapa
            $stateCode = $stateMapping[$stateName] ?? null;
            
            if ($stateCode && $sessions > 0) {
                $geoData[] = [
                    'estado' => $stateName,
                    'codigo' => $stateCode,
                    'sessoes' => $sessions
                ];
            }
        }

        return $geoData;

    } catch (Exception $e) {
        return ['error' => 'Erro ao buscar dados geográficos: ' . $e->getMessage()];
    }
}

function getWhatsAppClicks($client, $property_id) {
    try {
        $dateRange = createDateRange();
        
        $response = $client->runReport([
            'property' => 'properties/' . $property_id,
            'dateRanges' => [$dateRange],
            'dimensions' => [
                new Dimension(['name' => 'eventName'])
            ],
            'metrics' => [
                new Metric(['name' => 'eventCount'])
            ]
        ]);

        $clicks = [];
        $totalClicks = 0;
        
        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();
            
            $eventName = $dimensions[0]->getValue();
            
            // Filtrar apenas eventos de clique do WhatsApp
            if ($eventName === 'clique_whatsapp') {
                $cliques = intval($metrics[0]->getValue());
                $totalClicks += $cliques;
                
                // Como não conseguimos pegar o event_label diretamente via API,
                // vamos mostrar um resultado consolidado por enquanto
                $clicks[] = [
                    'botao' => 'todos-os-botoes',
                    'cliques' => $cliques
                ];
            }
        }

        return [
            'total' => $totalClicks,
            'por_botao' => $clicks
        ];

    } catch (Exception $e) {
        return [
            'total' => 0,
            'por_botao' => [],
            'error' => 'Erro ao buscar cliques WhatsApp: ' . $e->getMessage()
        ];
    }
}

if (isset($_GET['action'])) {
    header('Content-Type: application/json');
    $action = $_GET['action'];
    
    switch ($action) {
        case 'performance-data':
            echo json_encode(getPerformanceData($client, $property_id));
            break;
        case 'geo-cities':
            echo json_encode(getGeoCities($client, $property_id));
            break;
        case 'geo-states':
            echo json_encode(getGeoStates($client, $property_id));
            break;
        case 'devices':
            echo json_encode(getDevices($client, $property_id));
            break;
        case 'traffic-sources':
            echo json_encode(getTrafficSources($client, $property_id));
            break;
        case 'browsers':
            echo json_encode(getBrowsers($client, $property_id));
            break;
        case 'operating-systems':
            echo json_encode(getOperatingSystems($client, $property_id));
            break;
        case 'resolutions':
            echo json_encode(getResolutions($client, $property_id));
            break;
        case 'most-visited':
            echo json_encode(getMostVisited($client, $property_id));
            break;
        case 'user-types':
            echo json_encode(getUserTypes($client, $property_id));
            break;
        case 'page-flow':
            echo json_encode(getPageFlow($client, $property_id));
            break;
        case 'device-details':
            echo json_encode(getDeviceDetails($client, $property_id));
            break;
        case 'geo-map':
            echo json_encode(getGeoMap($client, $property_id));
            break;
        case 'whatsapp-clicks':
            echo json_encode(getWhatsAppClicks($client, $property_id));
            break;
        default:
            echo json_encode(['error' => 'Ação não encontrada']);
            break;
    }
} else {
    echo 'Analytics API - Acesse com ?action=performance-data ou outros endpoints';
}
?>
