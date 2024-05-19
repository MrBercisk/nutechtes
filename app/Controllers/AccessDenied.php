<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

class AccessDenied extends Controller
{
    public function index()
    {

        $this->response->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);


        $error = $this->request->getGet('error') ?? 'Access Denied';


        return view('access_denied', ['error' => $error]);
    }
}
