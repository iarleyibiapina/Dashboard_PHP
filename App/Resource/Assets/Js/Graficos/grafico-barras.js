// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

const HOST_BARRA = "http://dashboard.com";

async function getGraficoBarra () {
  const response = await fetch(`${HOST_BARRA}/api/graficos/barra`);
  if (!response.ok) {
    throw new Error(`Erro na requisição: ${response.statusText}`);
  }
  return await response.json();
}

function montaTabela(dados) {
  // vai loopar a cada 6 cores
  const PALETA_CORES = [
    "rgba(2,117,216,0.8)",   // Azul
    "rgba(240,84,84,0.8)",   // Vermelho
    "rgba(92,184,92,0.8)",   // Verde
    "rgba(240,173,78,0.8)",  // Laranja
    "rgba(91,192,222,0.8)",  // Azul Claro
    "rgba(156,84,240,0.8)",  // Roxo
  ];
  dados.datasets.forEach((dataset, index) => {
    // Seleciona uma cor da paleta. O operador '%' faz com que a seleção volte ao início se houver mais datasets que cores.
    const cor = PALETA_CORES[index % PALETA_CORES.length];    
    dataset.backgroundColor = cor;
    dataset.borderColor = cor;
  });

  // Bar Chart Example
  var ctx = document.getElementById("myBarChart");
  var myLineChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: dados.labels,
      datasets: dados.datasets, 
    },
    options: {
      scales: {
        xAxes: [
          {
            time: {
              unit: "month",
            },
            gridLines: {
              display: false,
            },
            ticks: {
              maxTicksLimit: 6,
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              min: 0,
              max: 20000,
              maxTicksLimit: 5,
            },
            gridLines: {
              display: true,
            },
          },
        ],
      },
      legend: {
        display: true,
      },
    },
  });
}

async function exibirDadosGraficoBarra() {
  const loader = document.getElementById("loading-barra");
  const canvasGrafico = document.getElementById('myPieChart');
  try {
    montaTabela(await getGraficoBarra());
    loader.style.display = 'none';
    canvasGrafico.style.display = 'block';
  } catch (error) {
    console.error("Falha ao buscar e exibir os dados:", error);
    loader.innerHTML = '<p style="color: red;">Falha ao carregar o gráfico.</p>';
  }
}

exibirDadosGraficoBarra();