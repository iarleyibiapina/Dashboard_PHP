<?php

namespace App\Core;

class Config
{
    public function mapRoutes(): array
    {
        return [
            'web' => '/Web.php',
            'api' => '/Api.php',
        ];
    }
}
