<?php
namespace App\Controllers;

use App\Models\HorarioModel;
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

        $items = self::getresponse('http://localhost/ushno-api/public/admin/horario');

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

        $teams = self::getresponse('http://localhost/ushno-api/public/admin/cbteams');

        $resteams = $teams->teams;

        $datos['teams'] = json_decode(json_encode($resteams), true);

        $combo = self::getresponse('http://localhost/ushno-api/public/admin/cbdias');

        $rescombo = $combo->combo;

        $datos['combo'] = json_decode(json_encode($rescombo), true);

        $url = "http://localhost/ushno-api/public/admin/horario/" . $id;

        $lista = self::getresponse($url);

        $reslista = $lista->lista;

        $datos['lista'] = json_decode(json_encode($reslista), true);

        // print_r($datos);

        $vistas =
        view('admin/head') .
        view('admin/pages/ediHorario', $datos) .
        view('admin/footer');

        return $vistas;

    }

    public function update()
    {
        $updatehorario = new HorarioModel(); // se crea el objeto de la clase HorarioModel
        $user_id       = '1';
        $datos         = [
            'user_id'     => $user_id,
            'horario'     => $this->request->getVar('txtHorario'),
            'descripcion' => $this->request->getVar('txtDesc'),
            'te_id'       => $this->request->getVar('cbTeam'),
            'dia_id'      => $this->request->getVar('cbDia'),
            'frase'       => $this->request->getVar('txtFrase'),
            'hor_id'      => $this->request->getVar('hor_id')

        ];

        $res["mod"] = $updatehorario->updteHorario($datos);

        echo "actualizado a la base de datos";
        return $this->response->redirect(base_url('admin/horario'));
    }

    public function create()
    {

        $teams = self::getresponse('http://localhost/ushno-api/public/admin/cbteams');

        $resteams = $teams->teams;

        $datos['teams'] = json_decode(json_encode($resteams), true);

        $combo = self::getresponse('http://localhost/ushno-api/public/admin/cbdias');

        $rescombo = $combo->combo;

        $datos['combo'] = json_decode(json_encode($rescombo), true);

        $vistas =
        view('admin/head') .
        view('admin/pages/addHorario', $datos) .
        view('admin/footer');

        return $vistas;

    }

    public function save()
    {
        $nuevoHorario = new HorarioModel();

        $datos = [
            'user_id'     => 1,
            'horario'     => $this->request->getVar('txtHorario'),
            'descripcion' => $this->request->getVar('txtDesc'),
            'te_id'       => $this->request->getVar('cbTeam'),
            'dia_id'      => $this->request->getVar('cbDia'),
            'frase'       => $this->request->getVar('txtFrase')
        ];

        //print_r($datos);

        $res["add"] = $nuevoHorario->addHorario($datos);
        echo "ingresado a la base de datos";
        return $this->response->redirect(base_url('/admin/horario'));

    }

    public function delete($id)
    {

        $borrarcontacto = new HorarioModel();
        $borrarcontacto->where('hor_id', $id)->delete($id);
        return $this->response->redirect(base_url('/admin/horario'));

    }
}
