<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class VideosController extends Controller
{
    public function index()
    {

        // $items = self::getresponse('http://localhost/ushno-api/public/emisora/horario');

        //$response = $items->Horarios;

        //$response['lista'] = json_decode(json_encode($response), true);

        $response = [];

        $vistas =
        view('admin/head') .
        view('admin/pages/videos', $response) .
        view('admin/footer');

        return $vistas;

    }
}
