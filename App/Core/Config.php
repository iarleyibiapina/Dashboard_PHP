<?php

namespace App\Core;

class Config
{
    public function timezone()
    {
        return 'America/Fortaleza';
    }

    public function storagePath(): array
    {
        return [
            'path' => __DIR__ . '/../Storage/app.log'
        ];
    }

    public function mapRoutes(): array
    {
        return [
            'web' => '/Web.php',
            'api' => '/Api.php',
        ];
    }
}
