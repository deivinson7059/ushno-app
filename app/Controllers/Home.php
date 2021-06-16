<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $vistas = view('emisora/head') .
        view('emisora/menu') .
        view('emisora/pages/index') .
        view('emisora/footer');

        return $vistas;

    }

    public function about()
    {

        $vistas = view('emisora/head') .
        view('emisora/menu') .
        view('emisora/pages/about') .
        view('emisora/footer');

        return $vistas;

    }

    public function show()
    {

        $vistas = view('emisora/head') .
        view('emisora/menu') .
        view('emisora/pages/show') .
        view('emisora/footer');

        return $vistas;

    }
}
