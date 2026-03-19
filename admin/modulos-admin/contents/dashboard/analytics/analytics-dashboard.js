/**
 * Analytics Dashboard JavaScript - Google Analytics Integration
 * 
 * Este script gerencia o dashboard de analytics com dados do Google Analytics
 * ANALYTICS_CONFIG é definido no analytics.php
 */

// Função principal de inicialização
function initDashboard() {
    loadAllData();
    setupEventListeners();
}

// Event Listeners
function setupEventListeners() {
    document.getElementById('data-inicio').addEventListener('change', function() {
        updatePeriod();
    });
    
    document.getElementById('data-fim').addEventListener('change', function() {
        updatePeriod();
    });
}

// Atualizar período
function updatePeriod() {
    const dataInicio = document.getElementById('data-inicio').value;
    const dataFim = document.getElementById('data-fim').value;
    
    if (dataInicio && dataFim) {
        window.location.href = `?data-inicio=${dataInicio}&data-fim=${dataFim}`;
    }
}

// Carregar todos os dados
function loadAllData() {
    loadWhatsAppData();
    loadPerformanceData();
    loadUserAnalysis();
    loadTrafficSources();
    loadGeoData();
    loadTechData();
    loadMostVisited();
}

// Dados de Performance
function loadPerformanceData() {
    makeRequest('performance-data')
        .then(data => {
            if (data && !data.error) {
                document.getElementById('total-sessoes').textContent = data.sessoes || '0';
                document.getElementById('total-usuarios').textContent = data.usuarios || '0';
                document.getElementById('total-pageviews').textContent = data.pageviews || '0';
                document.getElementById('bounce-rate').textContent = data.bounce_rate || '0%';
                document.getElementById('duracao-media').textContent = data.duracao_media || '0:00';
            } else {
                console.error('Erro ao carregar dados de performance:', data?.error);
                // Exibir dados de exemplo em caso de erro
                document.getElementById('total-sessoes').textContent = 'Erro';
                document.getElementById('total-usuarios').textContent = 'Erro';
                document.getElementById('total-pageviews').textContent = 'Erro';
                document.getElementById('bounce-rate').textContent = 'Erro';
                document.getElementById('duracao-media').textContent = 'Erro';
            }
        });
}

// Análise de Usuários
function loadUserAnalysis() {
    // Tipos de usuário (novos vs recorrentes)
    makeRequest('user-types')
        .then(data => {
            if (data && !data.error && Array.isArray(data) && data.length > 0) {
                const chartData = [['Tipo de Usuário', 'Quantidade']];
                data.forEach(item => {
                    chartData.push([item.tipo, parseInt(item.usuarios) || 0]);
                });
                
                const dataTable = google.visualization.arrayToDataTable(chartData);
                const chart = new google.visualization.PieChart(document.getElementById('chart-user-types'));
                chart.draw(dataTable, {
                    backgroundColor: 'transparent',
                    is3D: true,
                    legend: {position: 'bottom'},
                    colors: ['#28a745', '#17a2b8']
                });
            } else {
                document.getElementById('chart-user-types').innerHTML = '<div class="text-center text-muted py-4">Nenhum dado de usuário disponível</div>';
            }
        });

    // Fluxo de páginas
    makeRequest('page-flow')
        .then(data => {
            if (data && !data.error && Array.isArray(data) && data.length > 0) {
                const chartData = [['Entrada → Destino', 'Visualizações']];
                
                // Pegar os top 10 fluxos mais comuns
                data.slice(0, 10).forEach(item => {
                    const entrada = item.pagina_entrada.replace(/^\//, '') || 'Home';
                    const destino = item.pagina_destino.replace(/^\//, '') || 'Home';
                    chartData.push([`${entrada} → ${destino}`, parseInt(item.pageviews) || 0]);
                });
                
                const dataTable = google.visualization.arrayToDataTable(chartData);
                const table = new google.visualization.Table(document.getElementById('chart-page-flow'));
                table.draw(dataTable, {
                    width: '100%',
                    height: '300px',
                    sortColumn: 1,
                    sortAscending: false
                });
            } else {
                document.getElementById('chart-page-flow').innerHTML = '<div class="text-center text-muted py-4">Nenhum dado de fluxo disponível</div>';
            }
        });
}

// Fontes de Tráfego
function loadTrafficSources() {
    makeRequest('traffic-sources')
        .then(data => {
            if (data && !data.error && Array.isArray(data) && data.length > 0) {
                const chartData = [['Fonte/Meio', 'Sessões']];
                data.forEach(item => {
                    chartData.push([`${item.source}/${item.medium}`, parseInt(item.sessions) || 0]);
                });
                
                const dataTable = google.visualization.arrayToDataTable(chartData);
                const chart = new google.visualization.PieChart(document.getElementById('chart-traffic-sources'));
                chart.draw(dataTable, {
                    backgroundColor: 'transparent',
                    is3D: true,
                    legend: {position: 'bottom'}
                });
            } else {
                document.getElementById('chart-traffic-sources').innerHTML = '<div class="text-center text-muted py-4">Nenhum dado de tráfego disponível</div>';
            }
        });

    // Navegadores
    makeRequest('browsers')
        .then(data => {
            if (data && !data.error && Array.isArray(data) && data.length > 0) {
                const chartData = [['Navegador', 'Sessões']];
                data.forEach(item => {
                    chartData.push([item.browser, parseInt(item.sessions) || 0]);
                });
                
                const dataTable = google.visualization.arrayToDataTable(chartData);
                const chart = new google.visualization.PieChart(document.getElementById('chart-browsers'));
                chart.draw(dataTable, {
                    backgroundColor: 'transparent',
                    is3D: true,
                    legend: {position: 'bottom'}
                });
            } else {
                document.getElementById('chart-browsers').innerHTML = '<div class="text-center text-muted py-4">Nenhum dado de navegador disponível</div>';
            }
        });
}

// Dados Geográficos com Mapa Interativo
function loadGeoData() {
    // Mapa interativo do Brasil
    makeRequest('geo-map')
        .then(data => {
            if (data && !data.error && Array.isArray(data) && data.length > 0) {
                // Dados para o mapa
                const mapData = [['Estado', 'Visitantes']];
                data.forEach(item => {
                    mapData.push([item.codigo, parseInt(item.sessoes) || 0]);
                });
                
                const dataTable = google.visualization.arrayToDataTable(mapData);
                const geoChart = new google.visualization.GeoChart(document.getElementById('chart-mapa-brasil'));
                
                const options = {
                    region: 'BR', // Brasil
                    resolution: 'provinces', // Estados
                    backgroundColor: '#f8f9fa',
                    datalessRegionColor: '#f0f0f0',
                    defaultColor: '#f5f5f5',
                    colorAxis: {
                        colors: ['#e3f2fd', '#2196f3', '#1976d2', '#0d47a1']
                    },
                    tooltip: {
                        textStyle: {
                            color: '#333',
                            fontSize: 12
                        }
                    },
                    legend: {
                        textStyle: {
                            color: '#666',
                            fontSize: 11
                        }
                    }
                };
                
                geoChart.draw(dataTable, options);
                
                // Ranking de estados na lateral
                const rankingData = [['Estado', 'Sessões']];
                data.sort((a, b) => b.sessoes - a.sessoes).slice(0, 10).forEach(item => {
                    rankingData.push([item.estado, parseInt(item.sessoes) || 0]);
                });
                
                const rankingTable = google.visualization.arrayToDataTable(rankingData);
                const table = new google.visualization.Table(document.getElementById('chart-estados-ranking'));
                table.draw(rankingTable, {
                    width: '100%',
                    height: '400px',
                    sortColumn: 1,
                    sortAscending: false,
                    alternatingRowStyle: false
                });
                
            } else {
                document.getElementById('chart-mapa-brasil').innerHTML = '<div class="text-center text-muted py-4">Nenhum dado geográfico disponível</div>';
                document.getElementById('chart-estados-ranking').innerHTML = '<div class="text-center text-muted py-4">Nenhum dado de estado disponível</div>';
            }
        });
}

// Dados Tecnológicos
function loadTechData() {
    // Análise detalhada de dispositivos
    makeRequest('device-details')
        .then(data => {
            if (data && !data.error && Array.isArray(data) && data.length > 0) {
                const chartData = [['Dispositivo', 'Sessões', 'Tempo Médio', 'Páginas/Sessão', 'Taxa Saída']];
                data.forEach(item => {
                    chartData.push([
                        item.dispositivo,
                        parseInt(item.sessoes) || 0,
                        item.duracao_media,
                        parseFloat(item.paginas_por_sessao) || 0,
                        item.taxa_rejeicao
                    ]);
                });
                
                const dataTable = google.visualization.arrayToDataTable(chartData);
                const table = new google.visualization.Table(document.getElementById('chart-device-details'));
                table.draw(dataTable, {
                    width: '100%',
                    height: '300px',
                    sortColumn: 1,
                    sortAscending: false
                });
            } else {
                document.getElementById('chart-device-details').innerHTML = '<div class="text-center text-muted py-4">Nenhum dado de dispositivo disponível</div>';
            }
        });

    // Sistemas Operacionais
    makeRequest('operating-systems')
        .then(data => {
            if (data && !data.error && Array.isArray(data) && data.length > 0) {
                const chartData = [['Sistema', 'Sessões']];
                data.forEach(item => {
                    chartData.push([item.sistema, parseInt(item.total) || 0]);
                });
                
                const dataTable = google.visualization.arrayToDataTable(chartData);
                const chart = new google.visualization.PieChart(document.getElementById('chart-sistemas'));
                chart.draw(dataTable, {
                    backgroundColor: 'transparent',
                    is3D: true,
                    legend: {position: 'bottom'}
                });
            } else {
                document.getElementById('chart-sistemas').innerHTML = '<div class="text-center text-muted py-4">Nenhum dado de sistema disponível</div>';
            }
        });

    // Resoluções
    makeRequest('resolutions')
        .then(data => {
            if (data && !data.error && Array.isArray(data) && data.length > 0) {
                const chartData = [['Resolução', 'Sessões']];
                data.forEach(item => {
                    chartData.push([item.resolucao, parseInt(item.total) || 0]);
                });
                
                const dataTable = google.visualization.arrayToDataTable(chartData);
                const chart = new google.visualization.BarChart(document.getElementById('chart-resolucoes'));
                chart.draw(dataTable, {
                    backgroundColor: 'transparent',
                    legend: {position: 'none'},
                    hAxis: {title: 'Sessões'},
                    vAxis: {textStyle: {fontSize: 12}}
                });
            } else {
                document.getElementById('chart-resolucoes').innerHTML = '<div class="text-center text-muted py-4">Nenhum dado de resolução disponível</div>';
            }
        });
}

// Páginas Mais Visitadas
function loadMostVisited() {
    makeRequest('most-visited')
        .then(data => {
            if (data && !data.error && Array.isArray(data) && data.length > 0) {
                const chartData = [['Página', 'Título', 'Visualizações']];
                data.forEach(item => {
                    chartData.push([item.pagina, item.titulo, parseInt(item.total) || 0]);
                });
                
                const dataTable = google.visualization.arrayToDataTable(chartData);
                const table = new google.visualization.Table(document.getElementById('chart-mais-visitados'));
                table.draw(dataTable, {
                    width: '100%',
                    height: '400px',
                    sortColumn: 2,
                    sortAscending: false
                });
            } else {
                document.getElementById('chart-mais-visitados').innerHTML = '<div class="text-center text-muted py-4">Nenhuma página visitada disponível</div>';
            }
        });
}

// WhatsApp Analytics
function loadWhatsAppData() {
    makeRequest('whatsapp-clicks')
        .then(data => {
            if (data && !data.error) {
                // Atualizar total de cliques
                document.getElementById('total-whatsapp-clicks').textContent = data.total || '0';
                
                // Criar gráfico de cliques por botão
                if (Array.isArray(data.por_botao) && data.por_botao.length > 0) {
                    const chartData = [['Localização do Botão', 'Cliques']];
                    data.por_botao.forEach(item => {
                        // Formatar nome do botão para ficar mais legível
                        const nomeFormatado = formatarNomeBotao(item.botao);
                        chartData.push([nomeFormatado, parseInt(item.cliques) || 0]);
                    });
                    
                    const dataTable = google.visualization.arrayToDataTable(chartData);
                    const pieChart = new google.visualization.PieChart(document.getElementById('chart-whatsapp-buttons'));
                    
                    pieChart.draw(dataTable, {
                        title: 'Distribuição de Cliques por Localização',
                        titleTextStyle: { fontSize: 14, bold: true },
                        pieHole: 0.4,
                        width: '100%',
                        height: 300,
                        colors: ['#25D366', '#128C7E', '#075E54', '#DCF8C6', '#34B7F1'],
                        backgroundColor: 'transparent',
                        legend: { position: 'bottom', textStyle: { fontSize: 12 } },
                        chartArea: { left: 20, top: 40, width: '90%', height: '70%' }
                    });
                } else {
                    document.getElementById('chart-whatsapp-buttons').innerHTML = '<div class="text-center text-muted py-4">📱 Nenhum clique no WhatsApp registrado ainda.<br><small>Configure o rastreamento nos seus botões (veja wpp.md)</small></div>';
                }
            } else {
                document.getElementById('total-whatsapp-clicks').textContent = '0';
                document.getElementById('chart-whatsapp-buttons').innerHTML = '<div class="text-center text-muted py-4">📱 Configure o rastreamento de WhatsApp<br><small>Veja as instruções no arquivo wpp.md</small></div>';
            }
        });
}

// Função para formatar nome do botão de forma legível
function formatarNomeBotao(nomeBotao) {
    const nomes = {
        'header': '🔝 Cabeçalho',
        'footer': '👇 Rodapé', 
        'flutuante': '💬 Botão Flutuante',
        'produto': '🏷️ Página de Produto',
        'contato': '📞 Página de Contato',
        'lateral': '↗️ Barra Lateral',
        'menu': '📱 Menu Mobile',
        'banner': '🎯 Banner',
        'popup': '⚡ Pop-up',
        'nao-especificado': '❓ Não Especificado'
    };
    
    return nomes[nomeBotao] || `📍 ${nomeBotao.charAt(0).toUpperCase() + nomeBotao.slice(1)}`;
}

// Função para fazer requisições AJAX
function makeRequest(endpoint, data = {}) {
    data.data_inicio = ANALYTICS_CONFIG.dataInicio;
    data.data_fim = ANALYTICS_CONFIG.dataFim;
    
    return fetch(`${ANALYTICS_CONFIG.apiUrl}?action=${endpoint}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .catch(error => {
        console.error('Erro na requisição:', error);
        return {error: error.message};
    });
}

// Redimensionar gráficos quando a tela mudar
window.addEventListener('resize', function() {
    if (typeof google !== 'undefined' && google.charts) {
        setTimeout(function() {
            loadAllData();
        }, 300);
    }
});