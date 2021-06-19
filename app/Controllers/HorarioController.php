<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class HorarioController extends Controller
{

    public function index()
    {

        $vistas =
        view('admin/head') .
        view('admin/pages/admin') .
        view('admin/footer');

        return $vistas;

    }
}
