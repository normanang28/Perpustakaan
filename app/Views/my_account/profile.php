<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form id="profileForm" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate action="<?= base_url('DM/aksi_ganti_profile')?>" method="post">

                    <div class="row">    
                        <div class="mb-3 col-md-6">
                            <label class="form-label">NIP<span style="color: red;">*</span></label>
                            <input type="text" id="nip" name="nip" 
                            class="form-control text-capitalize" placeholder="NIP" maxlength="14" oninput="validateNumberInput(this)" value="<?= $users->nip?>">
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
                            <label class="form-label">Nama Petugas<span style="color: red;">*</span></label>
                            <input type="text" id="nama_petugas" name="nama_petugas" 
                            class="form-control text-capitalize" placeholder="Nama Petugas" value="<?= $users->nama_petugas?>">
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="control-label col-12" >Jenis Kelamin<span style="color: red;">*</span>
                          </label>
                          <div class="col-12">
                            <select id="jk" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="jk" required="required">
                              <option  value="<?= $users->jk?>"><?= $users->jk; ?></option>
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                          </select>
                      </div>
                  </div>
                  <div class="mb-3 col-md-6">
                      <label class="form-label">Tempat Tanggal Lahir<span style="color: red;">*</span></label>
                      <input type="text" id="ttl" name="ttl" 
                      class="form-control text-capitalize" placeholder="Tempat Tanggal Lahir" value="<?= $users->ttl?>">
                  </div>
                  <div class="mb-3 col-md-12">
                    <label class="form-label" >Username<span style="color: red;">*</span></label>
                    <input type="text" id="username" name="username" placeholder="Username" required="required" class="form-control text-capitalize" value="<?= $use->username?>">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
</div>
</div>
