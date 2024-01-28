<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;

class Logout extends BaseController
{
    public function index()
    {
        if(session()->get('id') > 0) {
            $model = new M_model();
            $id = session()->get('id');

            session()->destroy();
            return redirect()->to('/');
        } else {
            return redirect()->to('/Dashboard');
        }
    }
}
