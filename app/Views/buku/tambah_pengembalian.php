<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form id="userForm" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate action="<?= base_url('E_Perpus/aksi_tambah_pengembalian')?>" method="post">

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Judul Buku<span style="color: red;">*</span></label>
                            <select name="id_buku" class="form-control text-capitalize" id="id_buku" required>
                                <option>Pilih Judul Buku</option>
                                <?php 
                                foreach ($a as $item) { 
                                ?>
                                    <option class="text-capitalize" value="<?php echo $item->id_buku ?>"><?php echo $item->judul_buku ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Stok<span style="color: red;">*</span></label>
                            <input type="text" id="stok" name="stok" 
                            class="form-control text-capitalize" placeholder="Stok">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Nama Pengembalian<span style="color: red;">*</span></label>
                            <input type="text" id="nama_peminjaman" name="nama_peminjaman" 
                            class="form-control text-capitalize" placeholder="Nama Pengembalian">
                        </div>
                    </div>
                  <a href="<?= base_url('/E_Perpus/pengembalian')?>" type="button" class="btn btn-primary">Cancel</a></button>
                  <button type="submit" class="btn btn-success">Submit</button>
              </form>
          </div>
      </div>
  </div>
</div>