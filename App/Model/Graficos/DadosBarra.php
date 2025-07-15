<?php

namespace App\Model\Graficos;

use PDO;
use App\Model\Model;

class DadosBarra extends Model
{
    /**
     * @var 
     */
    protected $table = "grafico_dados_barra";
    /**
     * @var array
     */
    protected $collums = [
        "legenda_id",
        "mes_id",
        "valor"
    ];

    public function getDados()
    {
        $sql = "select 
                *,
                gdb.id as id_dados_barra,
                m.id as pk_mes_id_,
                gl.id as pk_legenda_id
            from 
	        grafico_dados_barra gdb 
            inner join 
            	meses m 
            on m.id = gdb.mes_id 
            inner join 
            	grafico_legendas gl 
            on gl.id = gdb.legenda_id";
        $stm = $this->pdo()->prepare($sql);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
}
