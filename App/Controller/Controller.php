<?php

namespace App\Controller;

use App\Core\Request;

class Controller
{
    public function __construct(protected Request $request) {
    }
}
