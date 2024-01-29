<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;

class My_Favorit extends BaseController
{
    public function index()
    {
        $model=new M_model();
        $data['data']=$model->tampil('buku');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        $where=array("maker_favorit"=>session()->get('id'));
        $data['favorit']=$model->getWhereKey('favorit',$where,'id_buku');

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('favorit/favorit');
        echo view('layout/footer'); 
    }

    public function unfavorit($id)
    {
        $model=new M_model();
        $where=array('id_favorit'=>$id);
        $model->hapus('favorit',$where);

        return redirect()->to('/My_Favorit');
    }
}