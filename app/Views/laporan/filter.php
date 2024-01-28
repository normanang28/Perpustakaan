<div class="col-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>
        <?php if ($kunci=='view_peminjaman') {
        }else if ($kunci=='view_pengembalian') {
        }else{
        }
        ?>
      </h2>
      <!--  -->
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <form class="form-horizontal form-label-left" novalidate

      action="
      <?php if ($kunci=='view_peminjaman') {
        echo base_url('Laporan/print_peminjaman');
        }else if ($kunci=='view_pengembalian') {
        echo base_url('Laporan/print_pengembalian');
        }else{
          echo base_url('');
        }
        ?>" method="post">

        <div class="item form-group">
          <label class="control-label col-12">Start Date<span style="color: red;">*</span>
          </label>
          <div class="col-12">
            <input id="name" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="awal" placeholder="" required="required" type="date">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12">End Date<span style="color: red;">*</span>
          </label>
          <div class="col-12">
            <input type="date" id="kode" name="akhir" required="required" placeholder="" class="form-control col-12">
          </div>
        </div>
        <div class="form-group">
          <div class="col-12">
            <button id="send" type="submit" class="btn btn-warning"><i class="fa fa-print"></i> Print</button>
          </div>
        </div>
      </form>

      <div class="ln_solid"></div>

      <form class="form-horizontal form-label-left" novalidate

      action="
      <?php if ($kunci=='view_peminjaman') {
        echo base_url('Laporan/pdf_peminjaman');
        }else if ($kunci=='view_pengembalian') {
        echo base_url('Laporan/pdf_pengembalian');
        }else{
        echo base_url('');
          }
        ?>" method="post" target="_blank">

        <div class="item form-group">
          <label class="control-label col-12">Start Date<span style="color: red;">*</span>
          </label>
          <div class="col-12">
            <input id="name" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="awal" placeholder="" required="required" type="date">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12">End Date<span style="color: red;">*</span>
          </label>
          <div class="col-12">
            <input type="date" id="kode" name="akhir" required="required" placeholder="" class="form-control col-12">
          </div>
        </div>
        <div class="form-group">
          <div class="col-12">
            <button type="submit" class="btn btn-danger"><i class="fa fa-print"></i> PDF</button>
          </div>
        </div>
      </form>

      <div class="ln_solid"></div>
      <form class="form-horizontal form-label-left" novalidate
      action="
      <?php if ($kunci=='view_peminjaman') {
        echo base_url('E_Perpus/peminjaman');
        }else if ($kunci=='view_pengembalian') {
        echo base_url('E_Perpus/pengembalian');
        }else{
          echo base_url('');
        }
        ?>" method="post">
      </div>
    </div>
  </div>