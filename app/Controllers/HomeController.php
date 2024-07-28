<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function home()
    {
        $data = [
            'title' => 'Dashboard',
            'scrumble' => 'Dashboard'
        ];

        return view('home/home', $data);
    }
}
