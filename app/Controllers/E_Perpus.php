<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;

class E_Perpus extends BaseController
{
    public function buku()
    {
        $model=new M_model();
        $data['data']=$model->tampil('buku');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('buku/buku');
        echo view('layout/footer'); 
    }

    public function tambah()
    {
        $model=new M_model();
        $data['data']=$model->tampil('buku');

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('buku/tambah');
        echo view('layout/footer');
    }

    public function aksi_tambah()
    {
        $model = new M_model();
        $judul_buku = $this->request->getPost('judul_buku');
        $jenis_buku = $this->request->getPost('jenis_buku');
        $tahun_terbit = $this->request->getPost('tahun_terbit');
        $data = array(
            'judul_buku' => $judul_buku,
            'jenis_buku' => $jenis_buku,
            'tahun_terbit' => $tahun_terbit,
            'jumlah' => '0',
        );

        try {
            $foto = $this->request->getFile('file_buku');
            if ($foto && $foto->isValid() && !$foto->hasMoved()) {
                $newName = $foto->getRandomName();
                $foto->move(ROOTPATH . '/public/assets/file/', $newName);
                $data['file_buku'] = $newName;
            }

            $model->simpan('buku', $data);

            return redirect()->to('/E_Perpus/buku');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function edit_buku($id)
    {
        $model=new M_model();
        $where2=array('buku.id_buku'=>$id);

        $data['data']=$model->getRow('buku', $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('buku/edit_buku');
        echo view('layout/footer');
    }

    public function aksi_edit()
    {
        $model=new M_model();
        $id=$this->request->getPost('id');
        $judul_buku=$this->request->getPost('judul_buku');
        $jenis_buku=$this->request->getPost('jenis_buku');
        $tahun_terbit=$this->request->getPost('tahun_terbit');
        $data=array(

            'judul_buku'=>$judul_buku,
            'jenis_buku'=>$jenis_buku,
            'tahun_terbit'=>$tahun_terbit,
        );

        try {
            $foto = $this->request->getFile('file_buku');
            if ($foto && $foto->isValid() && !$foto->hasMoved()) {
                $newName = $foto->getRandomName();
                $foto->move(ROOTPATH . '/public/assets/file/', $newName);
                $data['file_buku'] = $newName;
            }

        $where=array('id_buku'=>$id);
        $model->edit('buku',$data,$where);

        return redirect()->to('/E_Perpus/buku');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function hapus_buku($id)
    {
        $model=new M_model();
        $where=array('id_buku'=>$id);
        $model->hapus('buku',$where);

        return redirect()->to('/E_Perpus/buku');
    }

    public function buku_masuk()
    {
        $model=new M_model();
        $on='buku_masuk.id_buku_buku=buku.id_buku';
        $data['data']=$model->fusion('buku_masuk', 'buku', $on);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('buku/buku_masuk');
        echo view('layout/footer'); 
    }

    public function tambah_masuk()
    {
        $model=new M_model();
        $on='buku_masuk.id_buku_buku=buku.id_buku';
        $data['data']=$model->fusion('buku_masuk', 'buku', $on);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        $data['a']=$model->tampil('buku'); 

        echo view('layout/header', $data);
        echo view('layout/menu');
        echo view('buku/tambah_masuk');
        echo view('layout/footer');
    }

    public function aksi_tambah_masuk()
    {
        $model=new M_model();
        $buku=$this->request->getPost('id_buku');
        $stok=$this->request->getPost('stok');
        $data=array(

            'id_buku_buku'=> $buku,
            'stok'=>$stok,
        );
            $model->simpan('buku_masuk',$data);
            return redirect()->to('/E_Perpus/buku_masuk');
    }

    public function hapus_masuk($id)
    {
        $model=new M_model();
        $where=array('id_buku_masuk'=>$id);
        $model->hapus('buku_masuk',$where);

        return redirect()->to('/E_Perpus/buku_masuk');
    }

    public function peminjaman()
    {
        $model = new M_model();
        $id = session()->get('id');
        $level = session()->get('level');

        if ($level == 1 || $level == 2) {
            $on = 'peminjaman_buku.id_buku_buku=buku.id_buku';
            $on2 = 'peminjaman_buku.maker_peminjaman_buku=user.id_user';
            $data['data'] = $model->super('peminjaman_buku', 'buku', 'user', $on, $on2);
        } elseif ($level == 3) {
            $on = 'peminjaman_buku.id_buku_buku=buku.id_buku';
            $on2 = 'peminjaman_buku.maker_peminjaman_buku=user.id_user';
            $where = array('id_user' => $id);
            $data['data'] = $model->superWithWhere('peminjaman_buku', 'buku', 'user', $on, $on2, $where);
        }

        $where = array('id_user' => $id);
        $data['foto'] = $model->getRow('user', $where);

        echo view('layout/header', $data);
        echo view('layout/menu');
        echo view('buku/peminjaman');
        echo view('layout/footer');
    }

    public function tambah_peminjaman()
    {
        $model=new M_model();
        $on='peminjaman_buku.id_buku_buku=buku.id_buku';
        $on2='peminjaman_buku.maker_peminjaman_buku=user.id_user';
        $data['data']=$model->super('peminjaman_buku', 'buku', 'user', $on, $on2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        $data['a']=$model->tampil('buku'); 

        echo view('layout/header', $data);
        echo view('layout/menu');
        echo view('buku/tambah_peminjaman');
        echo view('layout/footer');
    }

    public function aksi_tambah_peminjaman()
    {
        $model=new M_model();
        $buku=$this->request->getPost('id_buku');
        $stok=$this->request->getPost('stok');
        $maker_peminjaman_buku=session()->get('id');
        $data=array(

            'id_buku_buku'=> $buku,
            'stok'=>$stok,
            'status'=>'Tidak Diterima',
            'maker_peminjaman_buku'=>$maker_peminjaman_buku
        );

        $model->simpan('peminjaman_buku',$data);
        return redirect()->to('/E_Perpus/peminjaman');
    }

    public function diterima($id)
    {
        $model=new M_model();
        $where=array('id_peminjaman_buku'=>$id);
        $data=array(
            'status'=>"Diterima"
        );

        $model->edit('peminjaman_buku', $data, $where);
        return redirect()->to('/E_Perpus/peminjaman');
    }

    public function pengembalian()
    {
        $model=new M_model();
        $on='pengembalian_buku.id_buku_buku=buku.id_buku';
        $data['data']=$model->fusion('pengembalian_buku', 'buku', $on);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('buku/pengembalian');
        echo view('layout/footer'); 
    }

    public function tambah_pengembalian()
    {
        $model=new M_model();
        $on='pengembalian_buku.id_buku_buku=buku.id_buku';
        $data['data']=$model->fusion('pengembalian_buku', 'buku', $on);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        $data['a']=$model->tampil('buku'); 

        echo view('layout/header', $data);
        echo view('layout/menu');
        echo view('buku/tambah_pengembalian');
        echo view('layout/footer');
    }

    public function aksi_tambah_pengembalian()
    {
        $model=new M_model();
        $buku=$this->request->getPost('id_buku');
        $stok=$this->request->getPost('stok');
        $nama_peminjaman=$this->request->getPost('nama_peminjaman');
        $data=array(

            'id_buku_buku'=> $buku,
            'stok'=>$stok,
            'nama_peminjaman'=>$nama_peminjaman,
        );

        $model->simpan('pengembalian_buku',$data);
        return redirect()->to('/E_Perpus/pengembalian');
    }

    public function hapus_pengembalian($id)
    {
        $model=new M_model();
        $where=array('id_pengembalian_buku'=>$id);
        $model->hapus('pengembalian_buku',$where);

        return redirect()->to('/E_Perpus/pengembalian');
    }
}
