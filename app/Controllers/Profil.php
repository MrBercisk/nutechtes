<?php

namespace App\Controllers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


use App\Models\UserModel;

class Profil extends BaseController
{
    protected $encrypter;
    protected $form_validation;
    protected $user;

    protected $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->encrypter = \Config\Services::encrypter();
        $this->form_validation =  \Config\Services::validation();
        $this->user = new UserModel();
    }

    public function index()
    {
        $token = $this->session->get('token');
        /*  dd($token); */
        $key = getenv('JWT_SECRET_KEY');
        if (!$token) {
            return redirect()->to('/accessdenied?error=Token Required');
        } else {
            try {
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                $data = [
                    'title' => "SIMS Web App || Profil",
                    'page' => "profil",
                    'id' => $decoded->uid,
                    'email' => $decoded->email,
                    'nama' => $decoded->nama,
                    'role_id' => $decoded->role_id,
                    'user' => $this->user->where('email', $decoded->email)->first()
                ];
                return view('v_home/profil', $data);
            } catch (\throwable $th) {
                return redirect()->to('/');
            }
        }
    }
}
