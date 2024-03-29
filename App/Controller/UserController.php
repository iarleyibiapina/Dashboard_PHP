<?php

namespace App\Controller;

use App\Model\User;
use App\Utils\RenderView;
use App\Request\Request;

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
        $user = new User();
        $resultado = $user->find($id_user);
        echo "<pre>";
        var_dump($resultado);
        echo "</pre>";
    }
    public function create($data = null)
    {
        $teste = new User();
        $teste->create([
            'nome' => 'juj',
            'idade' => '100',
            'email' => 'xxx@xxx',
        ]);
    }

    public function update($id, $data = null)
    {
        $id_user = $id[0];
        $teste = new User();
        $teste->update($id_user, [
            'nome' => 'uju',
            'idade' => 200,
            'email' => 'yyy@yy',
        ]);
        var_dump($teste);
    }
    public function delete($id)
    {
        $id_user = $id[0];
        $teste = new User();
        $teste->delete($id_user);
    }
}
