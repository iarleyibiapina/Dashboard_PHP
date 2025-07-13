<?php

namespace App\Database\Factory;

use App\Model\Model;

class Factory
{
    // create
    // count
    private static int $count = 0;

    protected $model;

    public static function count(int $count = 1): void
    {
        $factoryChild = get_called_class();
        $Factory = new $factoryChild;
        for ($i=self::$count; $i < $count; $i++) { 
            $Factory::create();
        }
    }

    public static function create()
    {
        $factoryChild = get_called_class();
        $Factory      = new $factoryChild;
        $Model        = new $Factory->model;
        $Model->create($Factory->mapping());
    }

    public function mapping(): array
    {
        return [];
    }
}
