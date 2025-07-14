// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const HOST = "http://dashboard.com";

async function getGraficoPizza () {
  const response = await fetch(`${HOST}/api/graficos/pizza`);
  if (!response.ok) {
    throw new Error(`Erro na requisição: ${response.statusText}`);
  }
  return await response.json();
}

async function exibirDadosGraficoPizza() {
  try {
    montaTabela(await getGraficoPizza());
  } catch (error) {
    console.error("Falha ao buscar e exibir os dados:", error);
  }
}

/**
 * Monta o gráfico de pizza com os dados dinâmicos da API.
 * @param {Array} dados - O array de objetos, onde cada objeto tem "legenda", "valor" e "cor".
 */
function montaTabela(dados)
{
  var ctx = document.getElementById("myPieChart");
  const legendas = dados.map(item => item.legenda);
  const valores = dados.map(item => parseFloat(item.valor)); 
  const cores = dados.map(item => item.cor);
  // encerra a div de loading...
  const myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: legendas,
      datasets: [{
        data: valores,
        backgroundColor: cores,
      }],
    },
  });
}

async function exibirDadosGraficoPizza() {
  const loader = document.getElementById('loading-pizza');
  const canvasGrafico = document.getElementById('myPieChart'); 
  try {
    const dados = await getGraficoPizza();
    montaTabela(dados);
    loader.style.display = 'none';
    canvasGrafico.style.display = 'block';
  } catch (error) {
    console.error("Falha ao buscar e exibir os dados:", error);
    loader.innerHTML = '<p style="color: red;">Falha ao carregar o gráfico.</p>';
  }
}

exibirDadosGraficoPizza();
