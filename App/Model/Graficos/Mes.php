<?php

namespace App\Model\Graficos;

use App\Model\Model;

class Mes extends Model
{
    /**
     * @var 
     */
    protected $table = "meses";
    /**
     * @var array
     */
    protected $collums = [
        "mes",
        "ordem"
    ];
}
