<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard | Recaka',
        ];

        return view('index', $data);
    }
}
