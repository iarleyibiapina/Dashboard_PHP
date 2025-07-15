<?php

namespace App\Controller\Api;

use App\Model\Funcionario;
use App\Model\GraficoPizza;
use App\Model\Graficos\DadosBarra;

class GraficosController
{
    public function getGraficoPizza()
    {
        $GraficoPizza = new GraficoPizza();
        responder_json($GraficoPizza->get());
    }
    public function getGraficoTabela()
    {
        $Funcionario = new Funcionario();
        responder_json($Funcionario->get());
    }

    public function getGraficoBarra()
    {
        $DadosBarra = new DadosBarra();
        $resultadoConsulta = $DadosBarra->getDados();  
        // --- INÍCIO DA LÓGICA DE TRANSFORMAÇÃO ---

        // 1. Extrair todos os meses únicos e ordená-los
        $meses = [];
        foreach ($resultadoConsulta as $linha) {
            // Usamos o nome do mês como chave para garantir que ele seja único
            $meses[$linha['mes']] = $linha['ordem'];
        }
        // Ordena o array de meses com base na coluna 'ordem', mantendo a associação das chaves
        asort($meses);

        // Agora, pegamos apenas as chaves (os nomes dos meses) para ter nossa lista de rótulos do eixo X
        $labels = array_keys($meses);
        $totalLabels = count($labels);

        // Cria um "mapa de posições" para encontrar rapidamente o índice de um mês. Ex: ['Janeiro' => 0, 'February' => 1, ...]
        $posicoesMeses = array_flip($labels);

        // 2. Agrupar os dados por legenda
        $datasetsAgrupados = [];
        foreach ($resultadoConsulta as $linha) {
            $nomeLegenda = $linha['nome'];

            // Se esta legenda ainda não foi vista, inicialize-a
            if (!isset($datasetsAgrupados[$nomeLegenda])) {
                $datasetsAgrupados[$nomeLegenda] = [
                    'label' => $nomeLegenda,
                    // Preenche o array 'data' com 'null' para todas as posições.
                    // Isso garante que todos os datasets tenham o mesmo tamanho dos labels.
                    'data' => array_fill(0, $totalLabels, null)
                ];
            }

            // Encontra a posição correta para o valor deste mês
            $posicao = $posicoesMeses[$linha['mes']];

            // Insere o valor na posição correta, sobrescrevendo o 'null'
            // Convertemos o valor para float para garantir que seja um número no JSON final
            $datasetsAgrupados[$nomeLegenda]['data'][$posicao] = (float) $linha['valor'];
        }

        // 3. Montar a estrutura final para o JSON
        $dadosGrafico = [
            'labels'   => $labels,
            // Usamos array_values para converter o array associativo em um array indexado, como o Chart.js espera
            'datasets' => array_values($datasetsAgrupados)
        ];

        responder_json($dadosGrafico);
    }

    public function getGraficoArea()
    {
        
    }
}
