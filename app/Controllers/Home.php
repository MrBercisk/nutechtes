<?php

namespace App\Controllers;

use Config\Services;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use CodeIgniter\API\ResponseTrait;

use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Home extends ResourceController
{

    protected $request;
    protected $session;
    protected $produk;
    protected $kategori;
    use ResponseTrait;

    public function __construct()
    {
        $this->request = Services::request();
        $this->session = \Config\Services::session();
        $this->produk = new ProdukModel();
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $token = $this->session->get('token');

        // Ambil informasi pengguna dari token
        $data = [
            'title' => "SIMS Web App",
            'token' => $token ,
            'page' => "home",
            'produk' => $this->produk->findAll(),
            'kategori' => $this->kategori->findAll()
        ];
        return view('v_home/index', $data);
    }

    // Logout
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
