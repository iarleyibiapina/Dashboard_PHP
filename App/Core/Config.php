<?php

namespace App\Core;

class Config
{
    public function defineConstants()
    {
        $DS = DIRECTORY_SEPARATOR;
        define('BASE_URL',  env('BASE_URL', 'http://localhost:8000'));
        define('VIEW_URL', PROJECT_ROOT . $DS . 'App' . $DS . 'Resource' . $DS . 'Views' . $DS);
        define('ASSETS', BASE_URL . '/App/Resource/Assets/');
    }

    public function timezone()
    {
        return 'America/Fortaleza';
    }

    public function storagePath(): string
    {
        return PROJECT_ROOT . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Storage' . DIRECTORY_SEPARATOR . 'app.log'; 
    }

    public function mapRoutes(): array
    {
        return [
            'web' => '/Web.php',
            'api' => '/Api.php',
        ];
    }
}
