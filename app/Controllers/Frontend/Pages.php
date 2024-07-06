<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdukModel;

class Pages extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Recaka Parfum',
            'produk' => $this->produkModel->findAll()
        ];

        return view('frontend/index', $data);
    }

    public function shop()
    {
        $data = [
            'title' => 'Recaka Parfum',
        ];

        return view('frontend/shop', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Recaka Parfum',
        ];

        return view('frontend/about', $data);
    }

    public function services()
    {
        $data = [
            'title' => 'Recaka Parfum',
        ];

        return view('frontend/services', $data);
    }

    public function blog()
    {
        $data = [
            'title' => 'Recaka Parfum',
        ];

        return view('frontend/blog', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Recaka Parfum',
        ];

        return view('frontend/contact', $data);
    }

    public function cart()
    {
        $data = [
            'title' => 'Recaka Parfum',
        ];

        return view('frontend/cart', $data);
    }
}
