<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<div class="d-flex justify-content-between align-items-center mb-3">
                    <h1></h1>
                    <a href="<?= base_url('/E_Perpus/tambah_masuk')?>">
                        <button class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah</button>
                    </a>
                </div>
				<table id="example" class="display" style="min-width: 100%">
					<thead>
						<tr>
							<th style="text-align: center;">Judul Buku</th>
							<th style="text-align: center;">Stok</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                    $no=1;
                    foreach ($data as $dataa){?>
						<tr>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->judul_buku?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->stok?></td>
							<td style="text-align: center;">
					        <a href="<?= base_url('/E_Perpus/hapus_masuk/' .$dataa->id_buku_masuk)?>"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
							</td>
						</tr>
                    <?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
