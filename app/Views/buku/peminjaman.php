<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
<?php  if(session()->get('level')== 3) { ?>
				<div class="d-flex justify-content-between align-items-center mb-3">
                    <h1></h1>
                    <a href="<?= base_url('/E_Perpus/tambah_peminjaman')?>">
                        <button class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah</button>
                    </a>
                </div>
<?php }else{} ?>
				<table id="example" class="display" style="min-width: 100%">
					<thead>
						<tr>
							<th style="text-align: center;">Judul Buku</th>
							<th style="text-align: center;">Stok</th>
							<th style="text-align: center;">Status</th>
							<th style="text-align: center;">Maker</th>
<?php  if(session()->get('level')== 1 || session()->get('level')== 2) { ?>
							<th style="text-align: center;">Action</th>
<?php }else{} ?>
						</tr>
					</thead>
					<tbody>
					<?php
                    $no=1;
                    foreach ($data as $dataa){?>
						<tr>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->judul_buku?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->stok?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->status?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->username?> / <?php echo $dataa->tanggal_peminjaman_buku?></td>
<?php  if(session()->get('level')== 1 || session()->get('level')== 2) { ?>
							<td style="text-align: center;">
							    <?php if ($dataa->status != 'Diterima'): ?>
							        <a href="<?= base_url('/E_Perpus/diterima/' . $dataa->id_peminjaman_buku) ?>">
							            <button class="btn btn-success mr-2">
							                <i class="fa-solid fa-check"></i>
							            </button>
							        </a>
							    <?php endif; ?>
							</td>	
<?php }else{} ?>
						</tr>
                    <?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
