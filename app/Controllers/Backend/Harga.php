<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Harga extends BaseController
{
    public function __construct()
    {
        // 
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Harga | Recaka',
            'content_header' => 'Kelola Harga',
        ];

        return view('backend/harga/index', $data);
    }

    public function insert()
    {
        // 
    }

    public function update()
    {
        // 
    }

    public function delete()
    {
        // 
    }
}
