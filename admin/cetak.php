<h2 style="text-align: center;">Laporan Layanan Pengaduan Mahasiswa FTI</h2>
<table border="2" style="width: 100%; height: 10%;">
	<tr style="text-align: center;">
		<td>No</td>
		<td>NIK Pelapor</td>
		<td>Nama Pelapor</td>
		<td>Nama Petugas</td>
		<td>Tanggal Masuk</td>
		<td>Tanggal Ditanggapi</td>
		<td>Status</td>
	</tr>
	<?php 
		include '../conn/koneksi.php';
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN mahasiswa ON pengaduan.nim=mahasiswa.nim INNER JOIN respon ON pengaduan.id_pengaduan=respon.id_pengaduan INNER JOIN petugas ON respon.nip=petugas.nip ORDER BY respon.id_pengaduan DESC");
        while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['nim']; ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['nama_petugas']; ?></td>
			<td><?php echo $r['tgl_pengaduan']; ?></td>
			<td><?php echo $r['tgl_respon']; ?></td>
			<td><?php echo $r['status']; ?></td>
		</tr>
	<?php	}
	 ?>
</table>
<script type="text/javascript">
	window.print();
</script>
