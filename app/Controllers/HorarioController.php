<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class HorarioController extends Controller
{

    public static function getresponse($url)
    {
        #set HTTP header
        $headers = array('Content-Type: application/json');

        #Open connection
        $ch = curl_init();

        #Set the url, number of GET vars, GET data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        #Execute request
        $result = curl_exec($ch);

        #Close connection
        curl_close($ch);

        #get the result and parse to JSON
        $items = json_decode($result);

        return $items;

    }

    public function index()
    {

        $items = self::getresponse('https://api-web.danisoft.com.co//ushno-api/public/emisora/horario');

        $response = $items->Horarios;

        $response['lista'] = json_decode(json_encode($response), true);

        $vistas =
        view('admin/head') .
        view('admin/pages/horario', $response) .
        view('admin/footer');

        return $vistas;

    }

    public function edit($id)
    {

        $teams = self::getresponse('https://api-web.danisoft.com.co//ushno-api/public/emisora/cbteams');

        $resteams = $teams->teams;

        $datos['teams'] = json_decode(json_encode($resteams), true);

        $combo = self::getresponse('https://api-web.danisoft.com.co//ushno-api/public/emisora/cbdias');

        $rescombo = $combo->combo;

        $datos['combo'] = json_decode(json_encode($rescombo), true);

        $url = "https://api-web.danisoft.com.co//ushno-api/public/emisora/horario/" . $id;

        $lista = self::getresponse($url);

        $reslista = $lista->lista;

        $datos['lista'] = json_decode(json_encode($reslista), true);

        //print_r($datos);

        $vistas =
        view('admin/head') .
        view('admin/pages/ediHorario', $datos) .
        view('admin/footer');

        return $vistas;

    }

    public function create()
    {

        $teams = self::getresponse('https://api-web.danisoft.com.co//ushno-api/public/emisora/cbteams');

        $resteams = $teams->teams;

        $datos['teams'] = json_decode(json_encode($resteams), true);

        $combo = self::getresponse('https://api-web.danisoft.com.co//ushno-api/public/emisora/cbdias');

        $rescombo = $combo->combo;

        $datos['combo'] = json_decode(json_encode($rescombo), true);

        $vistas =
        view('admin/head') .
        view('admin/pages/addHorario', $datos) .
        view('admin/footer');

        return $vistas;

    }

}
