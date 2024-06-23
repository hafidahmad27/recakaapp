<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Member extends BaseController
{
    public function __construct()
    {
        // 
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Member | Recaka',
            'content_header' => 'Kelola Member',
        ];

        return view('backend/members/index', $data);
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
