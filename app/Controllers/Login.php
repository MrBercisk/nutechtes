<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;


class Login extends BaseController
{
	protected $encrypter;
	protected $form_validation;
	protected $user;
	protected $session;
	use ResponseTrait;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->encrypter = \Config\Services::encrypter();
		$this->form_validation =  \Config\Services::validation();
		$this->user = new UserModel();
	}

	public function index()
	{
		$data['title']   = "SIMS | Login";
		return view('auth/index', $data);
	}

	public function create()
	{
		$email      = $this->request->getVar('email');
		$password   = $this->request->getVar('password');

		$cek_validasi = [
			'email' => $email,
			'password' => $password,
		];
		if ($this->form_validation->run($cek_validasi, 'login') == FALSE) {
			$validasi = [
				'error' => true,
				'login_error' => $this->form_validation->getErrors()
			];
			echo json_encode($validasi);
		} else {
			$cekUser = $this->user->where('email', $email)->first();
			if ($cekUser) {
				// Jika password benar
				if (password_verify($password, $cekUser['password'])) {

					$key = getenv('JWT_SECRET_KEY');
					$issuedAt = time();
					$expirationTime = $issuedAt + 3600;
					$payload = [
						'iat' => $issuedAt,
						'iss' => 'sims',
						'sub' => 'loginToken',
						'exp' => $expirationTime,
						'uid' => $cekUser['id'],
						'email' => $cekUser['email'],
						'nama' => $cekUser['nama'],
						'role_id'   => $cekUser['role_id'],
					];

					$token = JWT::encode($payload, $key, 'HS256');
					$this->session->set('token', $token);

					$validasi = [
						'success'   => true,
						'token' => $token,
						'link' => base_url('home')
					];
					echo json_encode($validasi);
				}
				// Password salah
				else {
					$validasi = [
						'error'     => true,
						'login_error' => [
							'password' => 'Password Salah!'
						]
					];
					echo json_encode($validasi);
				}
			}
			// Dan jika user tidak ada
			else {
				$validasi = [
					'error'     => true,
					'login_error' => [
						'email' => 'Email Anda Tidak Terdaftar!'
					]
				];
				echo json_encode($validasi);
			}
		}
	}
}
