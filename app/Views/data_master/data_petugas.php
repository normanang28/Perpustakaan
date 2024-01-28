<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<div class="d-flex justify-content-between align-items-center mb-3">
                    <h1></h1>
                    <a href="<?= base_url('/DM/tambah')?>">
                        <button class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah</button>
                    </a>
                </div>
				<table id="example" class="display" style="min-width: 100%">
					<thead>
						<tr>
							<th style="text-align: center;">NIP</th>
							<th style="text-align: center;">Nama Petugas</th>
							<th style="text-align: center;">Status</th>
							<th style="text-align: center;">Maker</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                    $no=1;
                    foreach ($data as $dataa){?>
						<tr>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nip?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_petugas?></td>
							<td style="text-align: center;" class="text-capitalize text-dark">
                                <?php if ($dataa->status == 'Aktif'){ ?>
                                    <i class="fas fa-circle text-success blinking-icon"></i> Aktif
                                <?php } else { ?>
                                    <i class="fas fa-circle text-warning blinking-icon"></i> Tidak Aktif
                                <?php } ?>
                            </td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->username?> / <?php echo $dataa->tanggal_petugas?></td>
							<td class="d-flex justify-content-between">
                                <?php if($dataa->status == 'Aktif'): ?>
                                    <a href="<?= base_url('/DM/tidak_aktif_DPP/'.$dataa->id_user_petugas)?>">
                                        <button class="btn btn-warning mr-2"><i class="fa-solid fa-user-xmark"></i></button>
                                    </a>
                                <?php elseif($dataa->status == 'Tidak Aktif'): ?>
                                    <a href="<?= base_url('/DM/aktif_DPP/'.$dataa->id_user_petugas)?>">
                                        <button class="btn btn-success mr-2"><i class="fa-solid fa-user-check"></i></button>
                                    </a>
                                <?php endif; ?>
                                <a href="<?= base_url('/DM/detail/'.$dataa->id_user_petugas)?>">
                                    <button class="btn btn-info mr-2"><i class="fa-solid fa-bars"></i></button>
                                </a>
                            </td>
                            <style>
							.btn {
							    margin-right: 2px; 
							}

							@keyframes blink {
			                    0% { opacity: 1; }
			                    50% { opacity: 0; }
			                    100% { opacity: 1; }
			                }

			                .blinking-icon {
			                    animation: blink 1s infinite; 
			                }

			                @keyframes blink-green {
			                    0% { opacity: 1; }
			                    50% { opacity: 0; }
			                    100% { opacity: 1; }
			                }

			                @keyframes blink-orange {
			                    0% { opacity: 1; }
			                    50% { opacity: 0; }
			                    100% { opacity: 1; }
			                }

			                .blinking-icon {
			                    animation-duration: 1s; 
			                    animation-iteration-count: infinite; 
			                }

			                .text-success .blinking-icon {
			                    animation-name: blink-green;
			                }

			                .text-warning .blinking-icon {
			                    animation-name: blink-orange; 
			                }
                            </style>
						</tr>
                    <?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
