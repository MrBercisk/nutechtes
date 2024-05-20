<?php

namespace App\Controllers;

use Config\Services;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Home extends BaseController
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
        $key = getenv('JWT_SECRET_KEY');
        if (!$token) {
            return redirect()->to('/accessdenied?error=Token Required');
        }else{
            try{
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                $data = [
                    'title' => "SIMS Web App",
                    'id' => $decoded->uid,
                    'email' => $decoded->email,
                    'nama' => $decoded->nama,
                    'role_id' => $decoded->role_id,
                    'page' => "home",
                    'produk' => $this->produk->findAll(),
                    'kategori' => $this->kategori->findAll()
                ];
                return view('v_home/index', $data);
            }catch (\throwable $th) {
                return redirect()->to('/');
            }         
        }
     
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
