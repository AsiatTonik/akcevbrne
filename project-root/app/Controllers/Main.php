<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Main extends BaseController
{
    public function index()
    {
        echo view("index");
    }
    public function xml()
    {
       
    }
    public function json()
    {
        
    }
}
