<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
<?php  if(session()->get('id')>0) { ?>
            <li><a href="<?= base_url('/Dashboard')?>" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-home" title="Dashboard"></i>
                    <span  class="nav-text">Dashboard</span>
                </a>
            </li>
<?php }else{} ?>
<?php  if(session()->get('level')== 1) { ?>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-user-9" title="User"></i>
                    <span class="nav-text">Data Master</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('/DM/data_petugas')?>">Data Petugas</a></li>
                    <li><a href="<?= base_url('/DM/data_pengguna')?>">Data Pengguna</a></li>
                </ul>
            </li>
<?php }else{} ?>
<?php  if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) { ?>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-book-open-reader" title="E-Perpus"></i>
                    <span class="nav-text">E-Perpus</span>
                </a>
                <ul aria-expanded="false">
<?php  if(session()->get('level')== 1 || session()->get('level')== 2) { ?>
                    <li><a href="<?= base_url('/E_Perpus/buku')?>">Buku</a></li>
                    <li><a href="<?= base_url('/E_Perpus/buku_masuk')?>">Buku Masuk</a></li>
<?php }else{} ?>
<?php  if(session()->get('level')== 3) { ?>
                    <li><a href="<?= base_url('/E_Perpus/buku')?>">Buku Digital</a></li>
<?php }else{} ?>
                    <li><a href="<?= base_url('/E_Perpus/peminjaman')?>">Peminjaman Buku</a></li>
<?php  if(session()->get('level')== 1 || session()->get('level')== 2) { ?>
                    <li><a href="<?= base_url('/E_Perpus/pengembalian')?>">Pengembalian Buku</a></li>
<?php }else{} ?>
                </ul>
            </li>
<?php }else{} ?>
<?php  if(session()->get('level')== 1 || session()->get('level')== 2) { ?>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-file-invoice" title="Laporan"></i>
                    <span class="nav-text">Laporan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('/Laporan/laporan_peminjaman')?>">Laporan Peminjaman</a></li>
                    <li><a href="<?= base_url('/Laporan/laporan_pengembalian')?>">Laporan Pengembalian</a></li>
                </ul>
            </li>
<?php }else{} ?>
            <hr class="sidebar-divider">
<?php  if(session()->get('level')== 3) { ?>
            <li><a href="<?= base_url('/My_Favorit')?>" class="ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-bookmark" title="Favorit"></i>
                    <span class="nav-text">My Favorit</span>
                </a>
            </li>
<?php }else{} ?>
<?php  if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) { ?>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-user-secret" title="Laporan"></i>
                    <span class="nav-text">My Account</span>
                </a>
                <ul aria-expanded="false">
<?php  if(session()->get('level')== 1 || session()->get('level')== 2) { ?>
                    <li><a href="<?= base_url('/DM/profile_petugas')?>">Profile</a></li>
<?php }else{} ?>
<?php  if(session()->get('level')== 3) { ?>
                    <li><a href="<?= base_url('/DM/profile_pengguna')?>">Profile</a></li>
<?php }else{} ?>
                    <li><a href="<?= base_url('/DM/ganti_pw')?>">Ganti Password</a></li>
                </ul>
            </li>
<?php }else{} ?>
            <li><a href="<?= base_url('/Logout')?>" class="ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-right-from-bracket" title="Log Activity User"></i>
                    <span class="nav-text">Log Out</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="content-body">
<div class="container-fluid">
<div class="form-head d-flex mb-3 align-items-start">
   <div class="me-auto d-none d-lg-block">
        <?php
        $level = session()->get('level'); 
        $nama_petugas = session()->get('nama_petugas');
        $nama_pengguna = session()->get('nama_pengguna');
        
        $userLevelText = "";
        
        if ($level == 1) {
            $userLevelText = "Admin";
        } elseif ($level == 2) {
            $userLevelText = "Petugas Perpustakaan";
        } elseif ($level == 3) {
            $userLevelText = "Peminjam";
        } else {
            $userLevelText = "";
        }

        $namaToShow = $nama_petugas ? $nama_petugas : $nama_pengguna;
        
        echo "<p  class='mb-0 text-capitalize'>Welcome <b>$namaToShow / $userLevelText</b> to " . session()->get('nama_website') . "!</p>";
        ?>
    </div>
    <b><span id="currentDateTime"></span></b>
</div>

<script>
function updateDateTime() {
    const dateTimeElement = document.getElementById('currentDateTime');
    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: '2-digit',
        second: '2-digit',
        hour12: true, 
    };

    const currentDateTime = new Date().toLocaleString(undefined, options);
    dateTimeElement.textContent = currentDateTime.replace(',', ' at');
}

setInterval(updateDateTime, 1000);

updateDateTime();
</script>


               