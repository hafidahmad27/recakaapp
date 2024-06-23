<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MemberLevel extends BaseController
{
    public function __construct()
    {
        // 
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Member Level | Recaka',
            'content_header' => 'Kelola Member Level',
        ];

        return view('backend/member_levels/index', $data);
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
