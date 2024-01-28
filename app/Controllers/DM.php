<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;

class DM extends BaseController
{
    public function data_petugas()
    {
        $model=new M_model();
        $on='petugas.maker_petugas=user.id_user';
        $data['data']=$model->fusionOderBy('petugas', 'user', $on, 'tanggal_petugas');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('data_master/data_petugas');
        echo view('layout/footer'); 
    }

    public function tambah()
    {
        $model=new M_model();
        $on='petugas.id_user_petugas=user.id_user';
        $data['data']=$model->fusionOderBy('petugas', 'user', $on, 'tanggal_petugas');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('data_master/tambah_petugas');
        echo view('layout/footer'); 
    }

    public function aksi_tambah_petugas()
    {
        $model=new M_model();

        $nip=$this->request->getPost('nip');
        $nama_petugas=$this->request->getPost('nama_petugas');
        $ttl=$this->request->getPost('ttl');
        $jk=$this->request->getPost('jk');
        $username=$this->request->getPost('username');
        $level=$this->request->getPost('level');
        $maker_petugas=session()->get('id');

        $user=array(
            'username'=>$username,
            'password'=>md5('@dmin123'),
            'level'=>$level,
        );

        $model=new M_model();
        $model->simpan('user', $user);
        $where=array('username'=>$username);
        $id=$model->getarray('user', $where);
        $iduser = $id['id_user'];

        $petugas = array(
            'nip' => $nip,
            'nama_petugas' => $nama_petugas,
            'ttl' => $ttl,
            'jk' => $jk,
            'status' => 'Aktif',
            'id_user_petugas' => $iduser,
            'maker_petugas' => $maker_petugas,
        );
        $model->simpan('petugas', $petugas);
        return redirect()->to('/DM/data_petugas');
    }

    public function aktif_DPP($id)
    {
        $model=new M_model();
        $where=array('id_user_petugas'=>$id);
        $data=array(
            'status'=>"Aktif"
        );

        $model->edit('petugas', $data, $where);
        return redirect()->to('DM/data_petugas');
    }

    public function tidak_aktif_DPP($id)
    {
        $model=new M_model();
        $where=array('id_user_petugas'=>$id);
        $data=array(
            'status'=>"Tidak Aktif"
        );

        $model->edit('petugas', $data, $where);
        return redirect()->to('DM/data_petugas');
    }

    public function detail($id)
    {
        $model=new M_model();
        $where2=array('id_user_petugas'=>$id); 
        $on='petugas.id_user_petugas=user.id_user';
        $data['data']=$model->detail('petugas', 'user',$on, $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('data_master/detail');
        echo view('layout/footer');
    }

    public function reset_password($id)
    {
        $model=new M_model();
        $where=array('id_user'=>$id);
        $data=array(
            'password'=>md5('@dmin123')
        );

        $model->edit('user',$data,$where);
        return redirect()->to('/DM/data_petugas');
    }

    public function edit_DPP($id)
    {
        $model=new M_model();
        $where2=array('petugas.id_user_petugas'=>$id);

        $on='petugas.id_user_petugas=user.id_user';
        $data['data']=$model->edit_user('petugas', 'user',$on, $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('data_master/edit_petugas');
        echo view('layout/footer');
    }

    public function aksi_edit_petugas()
    {
        $id= $this->request->getPost('id');    
        $nip=$this->request->getPost('nip');
        $nama_petugas=$this->request->getPost('nama_petugas');
        $ttl=$this->request->getPost('ttl');
        $jk=$this->request->getPost('jk');
        $username=$this->request->getPost('username');
        $level=$this->request->getPost('level');
        $maker_petugas=session()->get('id');

        $where=array('id_user'=>$id);    
        $where2=array('id_user_petugas'=>$id);
        if ($password !='') {
            $user=array(
                'username'=>$username,
                'level'=>$level,
            );
        }else{
            $user=array(
                'username'=>$username,
                'level'=>$level,
            );
        }
        
        $model=new M_model();
        $model->edit('user', $user,$where);

        $petugas=array(
            'nip' => $nip,
            'nama_petugas' => $nama_petugas,
            'ttl' => $ttl,
            'jk' => $jk,
            'maker_petugas' => $maker_petugas,
        );

        $model->edit('petugas', $petugas, $where2);
        return redirect()->to('/DM/data_petugas');
    }

    public function hapus_DPP($id)
    {
        $model=new M_model();
        $where2=array('id_user'=>$id);
        $where=array('id_user_petugas'=>$id);

        $model->hapus('petugas',$where);
        $model->hapus('user',$where2);
        return redirect()->to('/DM/data_petugas');
    }

    public function data_pengguna()
    {
        $model=new M_model();
        $on='pengguna.id_user_pengguna=user.id_user';
        $data['data']=$model->fusionOderBy('pengguna', 'user', $on, 'tanggal_pengguna');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('data_master/data_pengguna');
        echo view('layout/footer'); 
    }

    public function aktif_DP($id)
    {
        $model=new M_model();
        $where=array('id_user_pengguna'=>$id);
        $data=array(
            'status'=>"Aktif"
        );

        $model->edit('pengguna', $data, $where);
        return redirect()->to('DM/data_pengguna');
    }

    public function tidak_aktif_DP($id)
    {
        $model=new M_model();
        $where=array('id_user_pengguna'=>$id);
        $data=array(
            'status'=>"Tidak Aktif"
        );

        $model->edit('pengguna', $data, $where);
        return redirect()->to('DM/data_pengguna');
    }

    public function hapus_DP($id)
    {
        $model=new M_model();
        $where2=array('id_user'=>$id);
        $where=array('id_user_pengguna'=>$id);

        $model->hapus('pengguna',$where);
        $model->hapus('user',$where2);
        return redirect()->to('/DM/data_pengguna');
    }


    public function profile_petugas()
    {
        $id=session()->get('id');
        $where2=array('id_user'=>$id);
        $where=array('id_user_petugas'=>$id);
        $model=new M_model();
        $data['users']=$model->edit_pp('petugas',$where);
        $data['use']=$model->edit_pp('user',$where2);

        $data['foto']=$model->getRow('user',$where2);

        $id=session()->get('id');

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('my_account/profile', $data);
        echo view('layout/footer');
    }

    public function aksi_ganti_profile()
    {
    $model= new M_model();
    $id=session()->get('id');
    $where=array('id_user'=>$id);
    $photo=$this->request->getFile('foto');
    $kui=$model->getRow('user',$where);
    if( $photo != '' ){}
        elseif($photo != '' && file_exists(PUBLIC_PATH."/assets/images/profile/".$kui->foto) ) 
        {
            unlink(PUBLIC_PATH."/assets/images/profile/".$kui->foto);
        }
        elseif($photo == '')
        {
            $username= $this->request->getPost('username');
            $nip= $this->request->getPost('nip');                    
            $nama_petugas= $this->request->getPost('nama_petugas');
            $jk= $this->request->getPost('jk');
            $ttl= $this->request->getPost('ttl');

            $user=array(
                'username'=>$username,
            );
            $model->edit('user', $user,$where);
            $where2=array('id_user_petugas'=>$id);

            $petugas=array(
                'nip'=>$nip,
                'nama_petugas'=>$nama_petugas,
                'jk'=>$jk,
                'ttl'=>$ttl,
            );

            $model->edit('petugas', $petugas, $where2);
            return redirect()->to('/DM/profile_petugas');
        }

        $username= $this->request->getPost('username');
        $nip= $this->request->getPost('nip');                    
        $nama_petugas= $this->request->getPost('nama_petugas');
        $jk= $this->request->getPost('jk');
        $ttl= $this->request->getPost('ttl');

        $img = $photo->getRandomName();
        $photo->move(PUBLIC_PATH.'/assets/images/profile/',$img);
        $user=array(
            'username'=>$username,
            'foto'=>$img
        );
        $model=new M_model();
        $model->edit('user', $user,$where);

        $petugas=array(
            'nip'=>$nip,
            'nama_petugas'=>$nama_petugas,
            'jk'=>$jk,
            'ttl'=>$ttl,
        );

        $where2=array('id_user_petugas'=>$id);
        $model->edit('petugas', $petugas, $where2);
        return redirect()->to('/DM/profile_petugas');
    }

    public function profile_pengguna()
    {
        $id=session()->get('id');
        $where2=array('id_user'=>$id);
        $where=array('id_user_pengguna'=>$id);
        $model=new M_model();
        $data['users']=$model->edit_pp('pengguna',$where);
        $data['use']=$model->edit_pp('user',$where2);

        $data['foto']=$model->getRow('user',$where2);

        $id=session()->get('id');

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('my_account/profile_pengguna', $data);
        echo view('layout/footer');
    }

    public function aksi_ganti_profile_pengguna()
    {
    $model= new M_model();
    $id=session()->get('id');
    $where=array('id_user'=>$id);
    $photo=$this->request->getFile('foto');
    $kui=$model->getRow('user',$where);
    if( $photo != '' ){}
        elseif($photo != '' && file_exists(PUBLIC_PATH."/assets/images/profile/".$kui->foto) ) 
        {
            unlink(PUBLIC_PATH."/assets/images/profile/".$kui->foto);
        }
        elseif($photo == '')
        {
            $username= $this->request->getPost('username');
            $nama_pengguna= $this->request->getPost('nama_pengguna');
            $no_telp= $this->request->getPost('no_telp');

            $user=array(
                'username'=>$username,
            );
            $model->edit('user', $user,$where);
            $where2=array('id_user_pengguna'=>$id);

            $pengguna=array(
                'nama_pengguna'=>$nama_pengguna,
                'no_telp'=>$no_telp,
            );

            $model->edit('pengguna', $pengguna, $where2);
            return redirect()->to('/DM/profile_pengguna');
        }

        $username= $this->request->getPost('username');
        $nama_pengguna= $this->request->getPost('nama_pengguna');
        $no_telp= $this->request->getPost('no_telp');

        $img = $photo->getRandomName();
        $photo->move(PUBLIC_PATH.'/assets/images/profile/',$img);
        $user=array(
            'username'=>$username,
            'foto'=>$img
        );
        $model=new M_model();
        $model->edit('user', $user,$where);

        $pengguna=array(
            'nama_pengguna'=>$nama_pengguna,
            'no_telp'=>$no_telp,
        );

        $where2=array('id_user_pengguna'=>$id);
        $model->edit('pengguna', $pengguna, $where2);
        return redirect()->to('/DM/profile_pengguna');
    }

    public function ganti_pw()  
    {
        $id=session()->get('id');
        $where2=array('id_user'=>$id);
        $model=new M_model();
        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);
        $data['use']=$model->getRow('user',$where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        echo view('layout/header',$data);
        echo view('layout/menu',$data);
        echo view('my_account/ganti_pw',$data);
        echo view('layout/footer');
    }

    public function aksi_ganti_pw()   
    {
        $pass=$this->request->getPost('pw');
        $id=session()->get('id');
        $model= new M_model();

        $data=array( 
            'password'=>md5($pass)
        );

        $where=array('id_user'=>$id);
        $model->edit('user', $data, $where);
        return redirect()->to('/Logout');
    }
}
