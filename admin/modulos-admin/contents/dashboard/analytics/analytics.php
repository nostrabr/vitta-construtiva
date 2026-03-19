<?php
/**
 * Dashboard Analytics - Sistema Reutilizável
 * 
 * Configurações de conexão - Altere conforme necessário
 */

// ======================== CONFIGURAÇÕES ========================
// Carregamento das dependências e .env
require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    // Configurações de período padrão
    'data_inicio_default' => date('Y-m-01'),
    'data_fim_default' => date('Y-m-d'),
    
    // Nome do site/dashboard (vem do .env)
    'nome_site' => $_ENV['SITE_NAME'],
];

// Parâmetros de data
$data_inicio = $_GET['data-inicio'] ?? $config['data_inicio_default'];
$data_fim = $_GET['data-fim'] ?? $config['data_fim_default'];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $config['nome_site'] ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" href="favicon.png">
</head>
<body>

<style>
/* Dashboard Analytics Styles */
.container-data-site {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.admin-subtitulo {
    font-size: 18px;
    font-weight: 700;
    color: #495057;
    margin-bottom: 15px;
    border-bottom: 3px solid #007bff;
    padding-bottom: 8px;
}

.data-site-vendas-totais, .data-site-produto-totais {
    padding: 15px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
}

.data-site-vendas-totais:hover, .data-site-produto-totais:hover {
    transform: translateY(-2px);
}

.data-site-vendas-totais img, .data-site-produto-totais img {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    background: rgba(255,255,255,0.2);
    padding: 8px;
}

.data-site-vendas-totais-total, .data-site-produto-totais-total {
    font-size: 24px;
    font-weight: 700;
    line-height: 1.2;
}

.data-site-vendas-totais-legenda, .data-site-produto-totais-legenda {
    font-size: 12px;
    font-weight: 500;
    opacity: 0.9;
}

.chart-container {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    min-height: 300px;
}

.chart-loading {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 200px;
    color: #6c757d;
}

.form-control {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .data-site-vendas-totais, .data-site-produto-totais {
        margin-bottom: 15px;
    }
    
    .chart-container {
        padding: 15px;
    }
}
</style>

<section id="analytics-dashboard">
    <div class="container-fluid">
        <!-- Período -->
        <div class="container-data-site mb-4">
            <div class="row admin-subtitulo">
                <div class="col-12">PERÍODO</div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="data-inicio" class="form-label">Data Início</label>
                                <input type="date" class="form-control" id="data-inicio" value="<?= $data_inicio ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="data-fim" class="form-label">Data Fim</label>
                                <input type="date" class="form-control" id="data-fim" value="<?= $data_fim ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cliques WhatsApp -->
        <div class="d-none container-data-site mb-4">
            <div class="row admin-subtitulo">
                <div class="col-12">
                    📱 CLIQUES NO WHATSAPP
                    <small class="d-block" style="font-size: 12px; font-weight: 400; color: #6c757d; margin-top: 5px;">
                        Quantas pessoas clicaram para entrar em contato via WhatsApp
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-6 mb-3">
                    <div class="data-site-vendas-totais d-flex align-items-center">
                        <div class="me-3">
                            <i class="fab fa-whatsapp fa-2x"></i>
                        </div>
                        <div>
                            <div id="total-whatsapp-clicks" class="data-site-vendas-totais-total">-</div>
                            <div class="data-site-vendas-totais-legenda metric-tooltip" data-tooltip="Total de cliques nos botões do WhatsApp em todo o site">Total de Cliques</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 mb-4">
                    <div class="chart-container">
                        <h6 class="mb-3">📊 Cliques por Localização do Botão</h6>
                        <div id="chart-whatsapp-buttons" class="chart-loading">Carregando...</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Geral -->
        <div class="container-data-site mb-4">
            <div class="row admin-subtitulo">
                <div class="col-12">
                    📊 PERFORMANCE DO SITE
                    <small class="d-block" style="font-size: 12px; font-weight: 400; color: #6c757d; margin-top: 5px;">
                        Métricas principais de tráfego e engajamento dos visitantes
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <div class="data-site-vendas-totais d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-mouse-pointer fa-2x"></i>
                        </div>
                        <div>
                            <div id="total-sessoes" class="data-site-vendas-totais-total">-</div>
                            <div class="data-site-vendas-totais-legenda metric-tooltip" data-tooltip="Cada visita ao site. Uma pessoa pode gerar várias sessões.">Sessões (Visitas)</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <div class="data-site-vendas-totais d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div>
                            <div id="total-usuarios" class="data-site-vendas-totais-total">-</div>
                            <div class="data-site-vendas-totais-legenda metric-tooltip" data-tooltip="Pessoas únicas que visitaram o site. Não conta visitas repetidas.">Usuários Únicos</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <div class="data-site-vendas-totais d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-eye fa-2x"></i>
                        </div>
                        <div>
                            <div id="total-pageviews" class="data-site-vendas-totais-total">-</div>
                            <div class="data-site-vendas-totais-legenda metric-tooltip" data-tooltip="Total de páginas vistas. 1 pessoa pode ver várias páginas.">Páginas Vistas</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <div class="data-site-vendas-totais d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-chart-line fa-2x"></i>
                        </div>
                        <div>
                            <div id="bounce-rate" class="data-site-vendas-totais-total">-</div>
                            <div class="data-site-vendas-totais-legenda metric-tooltip" data-tooltip="% de pessoas que saíram sem interagir. Menor é melhor.">Taxa de Saída</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <div class="data-site-vendas-totais d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                        <div>
                            <div id="duracao-media" class="data-site-vendas-totais-total">-</div>
                            <div class="data-site-vendas-totais-legenda metric-tooltip" data-tooltip="Tempo médio que pessoas ficam no site. Maior é melhor.">Tempo no Site</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Análise de Usuários -->
        <div class="container-data-site mb-4">
            <div class="row admin-subtitulo">
                <div class="col-12">
                    👥 ANÁLISE DE USUÁRIOS
                    <small class="d-block" style="font-size: 12px; font-weight: 400; color: #6c757d; margin-top: 5px;">
                        Comportamento e tipos de visitantes do seu site
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="chart-container">
                        <h6 class="mb-3">🆕 Visitantes Novos vs Recorrentes</h6>
                        <div id="chart-user-types" class="chart-loading">Carregando...</div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="chart-container">
                        <h6 class="mb-3">🛤️ Fluxo de Navegação Popular</h6>
                        <div id="chart-page-flow" class="chart-loading">Carregando...</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fontes de Tráfego -->
        <div class="container-data-site mb-4">
            <div class="row admin-subtitulo">
                <div class="col-12">
                    🚀 FONTES DE TRÁFEGO
                    <small class="d-block" style="font-size: 12px; font-weight: 400; color: #6c757d; margin-top: 5px;">
                        De onde vem seus visitantes: Google, redes sociais, links diretos, etc.
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="chart-container">
                        <h6 class="mb-3">📊 Como as pessoas chegaram ao site</h6>
                        <div id="chart-traffic-sources" class="chart-loading">Carregando...</div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="chart-container">
                        <h6 class="mb-3">🌍 Navegadores mais usados</h6>
                        <div id="chart-browsers" class="chart-loading">Carregando...</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mapa Geográfico Interativo -->
        <div class="container-data-site mb-4">
            <div class="row admin-subtitulo">
                <div class="col-12">
                    🗺️ MAPA DE VISITANTES
                    <small class="d-block" style="font-size: 12px; font-weight: 400; color: #6c757d; margin-top: 5px;">
                        Visualização interativa de onde vem seus visitantes
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="chart-container">
                        <h6 class="mb-3">🇧🇷 Mapa do Brasil - Estados com mais visitantes</h6>
                        <div id="chart-mapa-brasil" class="chart-loading">Carregando mapa...</div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="chart-container">
                        <h6 class="mb-3">📈 Ranking de Estados</h6>
                        <div id="chart-estados-ranking" class="chart-loading">Carregando...</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dados Tecnológicos -->
        <div class="container-data-site mb-4">
            <div class="row admin-subtitulo">
                <div class="col-12">
                    💻 TECNOLOGIA E DISPOSITIVOS
                    <small class="d-block" style="font-size: 12px; font-weight: 400; color: #6c757d; margin-top: 5px;">
                        Análise detalhada dos dispositivos e sistemas utilizados
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="chart-container">
                        <h6 class="mb-3">📱 Análise Detalhada por Dispositivo</h6>
                        <div id="chart-device-details" class="chart-loading">Carregando...</div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="chart-container">
                        <h6 class="mb-3">💻 Windows, Android, iOS, etc.</h6>
                        <div id="chart-sistemas" class="chart-loading">Carregando...</div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="chart-container">
                        <h6 class="mb-3">🗺️ Tamanhos de tela (1920x1080, etc.)</h6>
                        <div id="chart-resolucoes" class="chart-loading">Carregando...</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Páginas Mais Visitadas -->
        <div class="container-data-site mb-4">
            <div class="row admin-subtitulo">
                <div class="col-12">
                    📄 CONTEÚDO MAIS POPULAR
                    <small class="d-block" style="font-size: 12px; font-weight: 400; color: #6c757d; margin-top: 5px;">
                        Quais páginas atraem mais visitantes - otimize essas!
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="chart-container">
                        <h6 class="mb-3">🔥 Páginas que mais despertam interesse</h6>
                        <div id="chart-mais-visitados" class="chart-loading">Carregando...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Charts -->
<script src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Incluir script do dashboard primeiro -->
<script src="analytics-dashboard.js"></script>

<script>
// ======================== ANALYTICS DASHBOARD SCRIPT ========================

// Configuração para o dashboard
const ANALYTICS_CONFIG = {
    apiUrl: 'analytics-api.php',
    dataInicio: '<?= $data_inicio ?>',
    dataFim: '<?= $data_fim ?>'
};

// Carregar os pacotes do Google Charts e inicializar depois que tudo estiver pronto
google.charts.load('current', {
    'packages': ['corechart', 'table', 'geochart', 'bar']
});
google.charts.setOnLoadCallback(initDashboard);
</script>

</body>
</html>