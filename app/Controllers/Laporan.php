<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;

class Laporan extends BaseController
{
    public function laporan_peminjaman()
    {
        $model=new M_model();
        $data['kunci']='view_peminjaman';

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('laporan/filter');
        echo view('layout/footer');
    }

    public function print_peminjaman()
    {
        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filter_peminjaman('peminjaman_buku',$awal,$akhir);

        echo view('laporan/laporan_peminjaman',$data);
    }

    public function pdf_peminjaman()
    {
        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filter_peminjaman('peminjaman_buku',$awal,$akhir);

        $dompdf = new\Dompdf\Dompdf();
        $dompdf->loadHtml(view('laporan/laporan_peminjaman',$data));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>0));
    }

    public function laporan_pengembalian()
    {
        $model=new M_model();
        $data['kunci']='view_pengembalian';

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('laporan/filter');
        echo view('layout/footer');
    }

    public function print_pengembalian()
    {
        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filter_pengembalian('pengembalian_buku',$awal,$akhir);

        echo view('laporan/laporan_pengembalian',$data);
    }

    public function pdf_pengembalian()
    {
        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filter_pengembalian('pengembalian_buku',$awal,$akhir);

        $dompdf = new\Dompdf\Dompdf();
        $dompdf->loadHtml(view('laporan/laporan_pengembalian',$data));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>0));
    }
    
}