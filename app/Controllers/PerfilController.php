<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class PerfilController extends Controller
{
    public function index()
    {

        // $items = self::getresponse('http://localhost/ushno-api/public/emisora/horario');

        //$response = $items->Horarios;

        //$response['lista'] = json_decode(json_encode($response), true);

        $response = [];

        $vistas =
        view('admin/head') .
        view('admin/pages/perfil', $response) .
        view('admin/footer');

        return $vistas;

    }
}
