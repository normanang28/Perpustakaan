 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form id="profileForm" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate action="<?= base_url('DM/aksi_ganti_profile_pengguna')?>" method="post">

                    <div class="row">    
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nama Lengkap<span style="color: red;">*</span></label>
                            <input type="text" id="nama_pengguna" name="nama_pengguna" 
                            class="form-control text-capitalize" placeholder="Nama Lengkap" value="<?= $users->nama_pengguna?>">
                        </div>
                        
                        <div class="mb-3 col-md-6">
                          <label class="form-label">Nomor Telepon<span style="color: red;">*</span></label>
                          <input type="text" id="no_telp" name="no_telp" 
                          class="form-control text-capitalize" placeholder="Nomor Telepon" value="<?= $users->no_telp?>" oninput="validateNumberInput(this)">
                      </div>
                      <script>
                        function validateNumberInput(input) {
                            input.value = input.value.replace(/\D/g, '');

                            if (input.value.length > 14) {
                                input.value = input.value.slice(0, 14);
                            }
                        }
                    </script>
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