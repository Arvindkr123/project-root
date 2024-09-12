<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        // now doing according to session
        if (session()->get("isLoggedIn")) {
            redirect()->to("/dashboard");
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
