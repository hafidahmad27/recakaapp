<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function __construct()
    {
        // 
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola User | Recaka',
            'content_header' => 'Kelola User',
        ];

        return view('backend/users/index', $data);
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
