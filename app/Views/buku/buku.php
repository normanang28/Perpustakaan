<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="alert alert-info" role="alert">
                  <i class="fa-solid fa-triangle-exclamation animated-icon"></i> 
                  Judul buku dapat ditekan untuk membaca buku secara digital, memberikan aksesibilitas yang lebih mudah bagi para pembaca.
                </div>
                <style>
                @keyframes blink {
                  0% { opacity: 1; }
                  50% { opacity: 0; }
                  100% { opacity: 1; }
                }

                .animated-icon {
                  animation: blink 1s infinite;
                }
                </style>
                <br>
<?php  if(session()->get('level')== 1 || session()->get('level')== 2) { ?>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1></h1>
                    <a href="<?= base_url('/E_Perpus/tambah')?>">
                        <button class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah</button>
                    </a>
                </div>
<?php }else{} ?>
                <table id="example" class="display" style="min-width: 100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Judul Buku</th>
                            <th style="text-align: center;">Jenis Buku</th>
                            <th style="text-align: center;">Tahun Terbit</th>
                            <th style="text-align: center;">Jumlah Yang Tersedia</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    foreach ($data as $dataa){?>
                        <tr>
                            <td style="text-align: center;" class="text-capitalize">
                                <a href="<?php echo base_url('/assets/file/' . $dataa->file_buku) ?>" target="_blank" style="color: blue;">
                                    <?php echo $dataa->judul_buku ?>
                                </a>
                            </td>
                            <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->jenis_buku?></td>
                            <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->tahun_terbit?></td>
                            <td style="text-align: center;" class="text-capitalize">Tersedia <?php echo $dataa->jumlah?> Buku</td>
<?php  if(session()->get('level')== 1 || session()->get('level')== 2) { ?>
                            <td class="d-flex justify-content-between">
                            <a href="<?= base_url('/E_Perpus/edit_buku/' .$dataa->id_buku)?>"><button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                            <a href="<?= base_url('/E_Perpus/hapus_buku/' .$dataa->id_buku)?>"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                            </td>
<?php }else{} ?>
<?php  if(session()->get('level')== 3) { ?>
                            <td class="d-flex justify-content-between">
                        <?php if(empty($favorit[$dataa->id_buku])) { ?>
                            <a href="<?= base_url('E_Perpus/favorit/'.$dataa->id_buku)?>"><button class="btn btn-success"><i class="fa-regular fa-bookmark"></i></button></a>
                        <?php }else{ ?>
                            <a href="<?= base_url('E_Perpus/unfavorit/'.$favorit[$dataa->id_buku]->id_favorit)?>"><button class="btn btn-success"><i class="fa-solid fa-bookmark"></i></button></a>
                        <?php } ?>

                            <a href="<?= base_url('E_Perpus/detail_ulasan/' .$dataa->id_buku)?>"><button class="btn btn-info"><i class="fa-regular fa-comment"></i></button></a>
                            </td>
<?php }else{} ?>
                        </tr>
                        <style>
                        .btn {
                            margin-right: 15px; 
                        }
                        </style>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
