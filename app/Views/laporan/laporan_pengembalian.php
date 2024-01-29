<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-transform: capitalize;
    }

    .container {
      max-width: 8000px;
      margin: 0 auto;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header img {
      width: 100%;
      height: auto;
    }

    .table-container {
      margin-top: 20px;
    }

    table {
      width: 100%; 
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Laporan Peminjaman Buku</h1>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Judul Buku</th>
            <th>Stok</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Dipinjam</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($data as $dataa) {
            ?>
            <tr>
              <td><?php echo $dataa->judul_buku?></td>
              <td><?php echo $dataa->stok?></td>
              <td><?php echo $dataa->nama_pengguna?></td>
              <td><?php echo $dataa->tanggal_pengembalian?></td>
            </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    window.print();
  </script>
</body>
</html>
