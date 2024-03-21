<?php

namespace App\Controller;

use App\Model\User;
use App\Utils\RenderView;

class UserController extends RenderView
{
    public function index()
    {
        $usuarioModel = new User();
        $resposta = $usuarioModel->get();
        echo "<pre>";
        var_dump($resposta);
        echo "</pre>";
    }

    public function show($id)
    {
        $id_user = $id[0];
        print($id_user);
        $user = new User();
        $resultado = $user->find($id_user);
        var_dump($resultado);
    }
    public function create()
    {
        $teste = new User();
        $teste->create([
            'nome' => 'juj',
            'idade' => '100',
            'email' => 'xxx@xxx',
        ]);
    }

    /* broken */
    public function update()
    {
        $teste = new User();
        $teste->update(4, [
            'nome' => 'uju',
            'idade' => '200',
            'email' => 'yyy@yy',
        ]);
    }
    public function delete()
    {
        $teste = new User();
        $teste->delete(7);
    }
}
