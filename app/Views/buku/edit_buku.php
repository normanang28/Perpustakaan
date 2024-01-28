<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form id="userForm" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate action="<?= base_url('E_Perpus/aksi_edit')?>" method="post">
                    <input type="hidden" name="id" value="<?= $data->id_buku ?>">

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Judul Buku<span style="color: red;">*</span></label>
                            <input type="text" id="judul_buku" name="judul_buku" 
                            class="form-control text-capitalize" placeholder="Judul Buku" value="<?= $data->judul_buku?>">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Jenis Buku<span style="color: red;">*</span></label>
                            <input type="text" id="jenis_buku" name="jenis_buku" 
                            class="form-control text-capitalize" placeholder="Jenis Buku" value="<?= $data->jenis_buku?>">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Tahun Terbit<span style="color: red;">*</span></label>
                            <input type="text" id="tahun_terbit" name="tahun_terbit" 
                            class="form-control text-capitalize" placeholder="Tahun Terbit" value="<?= $data->tahun_terbit?>">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="control-label col-12">File Buku<span style="color: red;">*</span></label>
                            <div class="col-12">
                                <input type="file" name="file_buku" class="form-file-input form-control col-12" accept=".pdf">
                                <small style="color: red;">File Buku hanya dapat dipilih dengan format .pdf</small>
                            </div>
                        </div>
                    </div>
                  <a href="<?= base_url('/E_Perpus/buku')?>" type="button" class="btn btn-primary">Cancel</a></button>
                  <button type="submit" class="btn btn-success">Submit</button>
              </form>
          </div>
      </div>
  </div>
</div>