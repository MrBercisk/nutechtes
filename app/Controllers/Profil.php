<?php

namespace App\Controllers;

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
        $data = [
            'title' => "SIMS Web App || Profil",
            'token' => $token ,
            'page' => "profil" ,
            'nama' => $this->session->get('nama'),
            'email' => $this->session->get('email'),
            'user' => $this->user->where('email', $this->session->get('email'))->first()
        ];
       
        return view('v_home/profil', $data); 
    }


}
