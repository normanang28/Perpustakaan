<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="d-flex justify-content-between mb-3">
			    <h1></h1>
			    <div class="ml-auto">
			        <a href="<?= base_url('/E_Perpus/tambah_ulasan/'.$buku[0]->id_buku)?>"><button class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah</button></a>
			    </div>
			</div>
			<div class="table-responsive">
				<table id="example" class="display" style="min-width: 100%">
					<thead>
						<tr>
							<th style="text-align: center;">Username</th>
							<th style="text-align: center;">Ulasan</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $ulasan){ ?>
						<tr>
							<td style="text-align: center;" class="text-capitalize"><?php echo $ulasan->username?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $ulasan->ulasan?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
