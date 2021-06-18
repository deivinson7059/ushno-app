<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {

        $rRuta['rRuta'] = "index";
        $vistas         = view('emisora/head', $rRuta) .
        view('emisora/menu') .
        view('emisora/pages/index') .
        view('emisora/footer');

        return $vistas;

    }

    public function about()
    {

        $rRuta['rRuta'] = "about";
        $vistas         = view('emisora/head', $rRuta) .
        view('emisora/menu') .
        view('emisora/pages/about') .
        view('emisora/footer');

        return $vistas;

    }

    public function show()
    {

        $rRuta['rRuta'] = "show";
        $vistas         = view('emisora/head', $rRuta) .
        view('emisora/menu') .
        view('emisora/pages/show') .
        view('emisora/footer');

        return $vistas;

    }

    public function team()
    {

        $rRuta['rRuta'] = "team";
        $vistas         = view('emisora/head', $rRuta) .
        view('emisora/menu') .
        view('emisora/pages/team') .
        view('emisora/footer');

        return $vistas;

    }

    public function video()
    {

        $rRuta['rRuta'] = "video";
        $vistas         = view('emisora/head', $rRuta) .
        view('emisora/menu') .
        view('emisora/pages/video') .
        view('emisora/footer');

        return $vistas;

    }

    public function gallery()
    {

        $rRuta['rRuta'] = "gallery";
        $vistas         = view('emisora/head', $rRuta) .
        view('emisora/menu') .
        view('emisora/pages/gallery') .
        view('emisora/footer');

        return $vistas;

    }

    public function bloglist()
    {

        $rRuta['rRuta'] = "blog-list";
        $vistas         = view('emisora/head', $rRuta) .
        view('emisora/menu') .
        view('emisora/pages/blog-list') .
        view('emisora/footer');

        return $vistas;

    }

    public function blogdetails()
    {

        $rRuta['rRuta'] = "blog-details";
        $vistas         = view('emisora/head', $rRuta) .
        view('emisora/menu') .
        view('emisora/pages/blog-details') .
        view('emisora/footer');

        return $vistas;

    }

    public function contact()
    {

        $rRuta['rRuta'] = "contact";
        $vistas         = view('emisora/head', $rRuta) .
        view('emisora/menu') .
        view('emisora/pages/contact') .
        view('emisora/footer');

        return $vistas;

    }

    public function login()
    {

        return view('admin/pages/login');

    }

    public function logout()
    {

        return 'logout';

    }

    public function admin()
    {

        return view('admin/pages/admin');

    }
}
