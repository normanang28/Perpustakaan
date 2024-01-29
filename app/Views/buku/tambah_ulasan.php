<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form id="userForm" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate action="<?= base_url('E_Perpus/aksi_tambah_ulasan')?>" method="post">

                    <input type="hidden" name="idbuku" value="<?= $data[0]->id_buku?>">

                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Ulasan<span style="color: red;">*</span></label>
                            <input type="text" id="ulasan" name="ulasan" 
                            class="form-control text-capitalize" placeholder="Ulasan">
                        </div>
                    </div>
                  <a href="<?= base_url('/E_Perpus/buku')?>" type="button" class="btn btn-primary">Cancel</a></button>
                  <button type="submit" class="btn btn-success">Submit</button>
              </form>
          </div>
      </div>
  </div>
</div>