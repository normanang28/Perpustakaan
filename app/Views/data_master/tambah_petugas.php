<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('DM/aksi_tambah_petugas')?>" method="post">

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">NIP<span style="color: red;">*</span></label>
                            <input type="text" id="nip" name="nip" 
                            class="form-control text-capitalize" placeholder="NIP" maxlength="14" oninput="validateNumberInput(this)">
                        </div>
                        <script>
                        function validateNumberInput(input) {
                            input.value = input.value.replace(/\D/g, '');

                            if (input.value.length > 14) {
                                input.value = input.value.slice(0, 14);
                            }
                        }
                        </script>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nama Lengkap<span style="color: red;">*</span></label>
                            <input type="text" id="nama_petugas" name="nama_petugas" 
                            class="form-control text-capitalize" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Tempat Tanggal Lahir<span style="color: red;">*</span></label>
                            <input type="text" id="ttl" name="ttl" 
                            class="form-control text-capitalize" placeholder="Tempat Tanggal Lahir">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Jenis Kelamin<span style="color: red;">*</span></label>
                            <div class="col-12">
                            <select id="jk" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="jk" required="required">
                              <option>Pilih Jenis Kelamin</option>
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Username<span style="color: red;">*</span></label>
                            <input type="text" id="username" name="username" 
                            class="form-control text-capitalize" placeholder="Username" maxlength="50">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Level<span style="color: red;">*</span></label>
                            <div class="col-12">
                                <select id="level" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="level" required="required">
                                  <option>Pilih Level</option>
                                  <option value="1">Admin</option>
                                  <option value="2">Petugas Perpustakaan</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <a href="<?= base_url('/DM/data_petugas')?>" type="button" class="btn btn-primary">Cancel</a></button>
                  <button type="submit" class="btn btn-success">Submit</button>
              </form>
          </div>
      </div>
  </div>
</div>