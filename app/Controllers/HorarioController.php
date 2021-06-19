<?php
namespace App\Controllers;

use App\Models\HorarioModel;
use CodeIgniter\Controller;

class HorarioController extends Controller
{

    public function index()
    {

        $horaList = new HorarioModel(); // se crea el objeto de la clase mcontacts

        $result['lista'] = $horaList->getHorarios();

        $vistas =
        view('admin/head') .
        view('admin/pages/horario', $result) .
        view('admin/footer');

        return $vistas;

    }

    public function edit($id)
    {

        $editardato = new HorarioModel();

        $datos['combo'] = $editardato->getcbDia();
        $datos['teams'] = $editardato->getcbTeam();

        $datos['lista'] = $editardato->getHorario($id);

        //print_r($datos);

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
        $editardato = new HorarioModel();

        $datos['combo'] = $editardato->getcbDia();
        $datos['teams'] = $editardato->getcbTeam();

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
