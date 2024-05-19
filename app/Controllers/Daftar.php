<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Services;
use CodeIgniter\RESTful\ResourceController;

class Daftar extends BaseController
{
    protected $encrypter;
    protected $form_validation;
    protected $user;
    protected $session;
    protected $request;
    protected $format    = 'json';

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->request = Services::request();
        $this->encrypter = \Config\Services::encrypter();
        $this->form_validation =  \Config\Services::validation();
        $this->user = new UserModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data['title']   = "SIMS | Register";
        return view('auth/register', $data);
    }

    public function create()
    {
        $nama             = $this->request->getVar('nama');
        $email            = $this->request->getVar('email');
        $image            = $this->request->getFile('image');
        $position         = $this->request->getVar('position');
        $password         = $this->request->getVar('password');
        $confirm_password = $this->request->getVar('confirm_password');

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $cek_validasi = [
            'nama'             => $nama,
            'email'            => $email,
            'position'         => $position,
            'password'         => $password,
            'confirm_password' => $confirm_password,
        ];

        // Cek Validasi
        if ($this->form_validation->run($cek_validasi, 'daftar_akun') == FALSE) {
            $validasi = [
                'error'              => true,
                'daftar_akun_error'  => $this->form_validation->getErrors()
            ];
            echo json_encode($validasi);
        }
         else {
            $nama_foto = $image->getRandomName();
            $image->move('profile_picture', $nama_foto);
            $data = [
                'role_id' => 1,
                'nama'     => $nama,
                'email'    => $email,
                'position' => $position,
                'password' => $hash,
                'image'    => $nama_foto
            ];
            $this->user->save($data);
            $validasi = [
                'success'   => true,
                'link'      => base_url('login')
            ];
            echo json_encode($validasi);
        }
    }
}
