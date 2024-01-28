<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('level') > 0) {
            return redirect()->to('/Dashboard'); 
        } else {
            $model = new M_model();
            return view('sign_in');
        }
    }

    public function sign_in()
    {
        $n=$this->request->getPost('username'); 
        $p=$this->request->getPost('password');

        $model= new M_model();
        $data=array(
            'username'=>$n, 
            'password'=>md5($p)
        );
        $cek=$model->getarray('user', $data);
        if ($cek>0) {
            $where=array('id_user_petugas'=>$cek['id_user']);
            $petugas=$model->getarray('petugas', $where);

                if ($petugas) { 
                if ($petugas['status'] == 'Aktif') {
                session()->set('id', $cek['id_user']);
                session()->set('username', $cek['username']);
                session()->set('nama_petugas', $petugas['nama_petugas']);
                session()->set('level', $cek['level']);

                return redirect()->to('/Dashboard');
                }
            } else {
            $where=array('id_user_pengguna'=>$cek['id_user']);
            $pengguna=$model->getarray('pengguna', $where);

                if ($pengguna) { 
                if ($pengguna['status'] == 'Aktif') {
                session()->set('id', $cek['id_user']);
                session()->set('username', $cek['username']);
                session()->set('nama_pengguna', $pengguna['nama_pengguna']);
                session()->set('level', $cek['level']);

                return redirect()->to('/Dashboard');
                }
                }         
            }
        }
        return redirect()->to('/');
    }
}
