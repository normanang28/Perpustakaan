<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="d-flex justify-content-between mb-3">
			    <h1></h1>
			    <div class="ml-auto">
			        <a href="<?= base_url('/DM/data_petugas/')?>"><button class="btn btn-info"><i class="fa-solid fa-arrow-left"></i></button></a>
			        <a href="<?= base_url('/DM/reset_password/' .$data->id_user_petugas)?>"><button class="btn btn-info"><i class="fa-solid fa-key"></i></button></a>
			        <a href="<?= base_url('/DM/edit_DPP/' .$data->id_user_petugas)?>"><button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
			        <a href="<?= base_url('/DM/hapus_DPP/' .$data->id_user_petugas)?>"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
			    </div>
			</div>
			<div class="table-responsive">
				<table id="example" class="display" style="min-width: 100%">
					<thead>
						<tr>
							<th style="text-align: center;">NIP</th>
							<th style="text-align: center;">Username / Nama Petugas</th>
							<th style="text-align: center;">Jenis Kelamin</th>
							<th style="text-align: center;">Tempat Tanggal Lahir</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="text-align: center;" class="text-capitalize"><?php echo $data->nip?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $data->username?> / <?php echo $data->nama_petugas?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $data->jk?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $data->ttl?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
