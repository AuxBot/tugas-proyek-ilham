<?php
?>
<!DOCTYPE html>
<html>

<head>
	<title>KRAFTO - PRODUK TERBARU</title>
	<meta charset="utf-8">
	<meta name="title" content="">
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/fontawesome-free/css/all.css">
    <link rel="stylesheet" type="text/css" href="../assets/materialize/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="../img/favicon.ico">
</head>

<body>
<nav>
<div class="container">
	<div class="nav-wrapper">
		<a href="beranda" class="brand-logo"><img src="../img/logo.png" class="logo"></a>
		<ul class="right">
			<li><a href="beranda" class="nav-link">BERANDA</a></li>
			<li><a href="pasang-iklan" class="nav-link">PASANG IKLAN</a></li>
			<li><a href="buat-usulan" class="nav-link">BUAT USULAN</a></li>
			<li><a class="nav-link dropdown-button" data-activates="dropdown1">
				<?php echo $_SESSION['user']; ?>
			</a></li>
		</ul>
	</div>
	<ul id="dropdown1" class="dropdown-content">
    	<li><a href="profil">Profil</a></li>
    	<li><a href="logout">Keluar</a></li>
 	</ul>
</div>
</nav>
<div class="banner">
	<div class="container">
		<div class="row valign-wrapper">
			<div class="col s10">
				<h3>Produk kerajinan terbaru</h3>
				<p>Menampilkan produk kerajinan tangan yang terbaru</p>
			</div>
			<div class="col s2">
				<a href="#filter"><div class="filter right tooltipped" data-position="top" data-delay="33" data-tooltip="Filter produk">
					<span class="fa fa-filter"></span>
				</div></a>
			</div>
		</div>
	</div>
</div>
<div class="container">
<center>
	<!--modal-->
	<div id="filter" class="modal bottom-sheet">
		<div class="modal-content">
			<h5>Filter produk</h5>
			<div class="filterr">
				<div class="row">
					<div class="col s6">
						<label>Kondisi produk</label>
						<select class="browser-default">
							<option value="" disabled selected>Pilih kondisi produk</option>
							<option value="bekas">Bekas</option>
							<option value="baru">Baru</option>
						</select>
					</div>
					<div class="col s6">
						<label>Urutkan berdasarkan</label>
						<select class="browser-default">
							<option value="" disabled selected>Pilih pengurutan</option>
							<option value="bekas">Terbaru - Terlama</option>
							<option value="bekas">Terlama - Terbaru</option>
							<option value="baru">Harga tertinggi - Harga terendah</option>
							<option value="baru">Harga terendah - Harga tertinggi</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a class="modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
		</div>
	</div>
	<!--end-->
	<div class="produk" style="width:97%;text-align:left;margin-top:40px;">
		<div class="row">
			<?php
				$data = mysqli_query($link, "SELECT * FROM produk ORDER BY waktu_dijual DESC LIMIT 20");
				while($d = mysqli_fetch_array($data)){
			?>
			<div class="col s12 m4 l4">
				<a href="produk?id=<?php echo $d['id']; ?>" style="color:#333333;">
				<div class="card">
					<div class="card-image">
						<?php echo "<img src='gambar_produk/".$d['gambar_produk']."'>"; ?>
					</div>
					<div class="card-content">
						<h5><?php echo $d['nama_produk']; ?></h5>
						<p style="margin-bottom:5px;"><?php echo $d['penjual']; ?></p>
						<b>Rp. <?php echo $d['harga_produk']; ?></b>
					</div>
				</div>
				</a>
			</div>
			<?php
				}
			?>
		</div>
	</div>
</center>
</div>
<footer class="page-footer">
	<div class="container">
		<div class="row footer-content">
			<div class="col s12 m12 l2 bottom-space">
				<img src="../img/logo.png" class="footer-logo">	
			</div>
			<div class="col s12 m12 l2 footer-link bottom-space">
				<ul>
					<li><b><a href="beranda">Beranda</a></b></li>
					<li><a href="profil">Profil</a></li>
					<li><a href="buat-usulan">Buat Usulan</a></li>
					<li><a href="pasang-iklan">Pasang Iklan</a></li>
				</ul>
			</div>
			<div class="col m12 l2 footer-link bottom-space">
				<ul>
					<li><a href="#">FAQ</a></li>
					<li><a href="kontak">Hubungi</a></li>
					<li><a href="logout">Keluar</a></li>
				</ul>
			</div>
			<div class="col s12 m12 l6 bottom-space">
				<p class="copyrights">&copy; KRAFTO 2018</p>
				<div class="footer-icon">
					<ul>
						<li><i class="fab fa-facebook"></i></li>
						<li><i class="fab fa-twitter"></i></li>
						<li><i class="fab fa-instagram"></i></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyright" style="padding:20px 15px 15px;">
		<div class="container">
			Made with <i class="fa fa-heart heart"></i> by Ikhya Ulummuddin
		</div>
	</div>
</footer>
<div class="back">
	<a class="btn-floating btn-large waves-effect waves-light z-depth-2 top">
		<i class="fa fa-arrow-up"></i>
	</a>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/materialize.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.dropdown-button').dropdown({
    		inDuration: 300,
    		outDuration: 225,
    		hover: true,
    		belowOrigin: true
    	});
    	$('.top').click(function(event){
    		event.preventDefault();
    		$('html, body').animate({scrollTop: 0}, 500);
    	});
    	$('.tooltipped').tooltip({delay: 33});
    	$('.modal').modal();
	});
</script>
</body>

</html>
