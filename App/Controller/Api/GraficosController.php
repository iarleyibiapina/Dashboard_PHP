<?php

namespace App\Controller\Api;

use App\Model\GraficoPizza;

class GraficosController
{
    public function getGraficoPizza()
    {
        $GraficoPizza = new GraficoPizza();
        responder_json($GraficoPizza->get());
    }
    public function getGraficoTabela()
    {
        
    }

    public function getGraficoBarra()
    {
        
    }

    public function getGraficoArea()
    {
        
    }
}
