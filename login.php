
<div class="card" style="padding: 50px; padding-top: 25px; width: 40%; margin: 0 auto; margin-top: 10%;">
<h3 style="text-align: center; font-weight: bold; margin-bottom: 10%;" class="black-text">LOGIN</h3>
	<form method="POST">
		<div class="input_field">
			<label for="email">E-mail</label>
			<input id="email" type="text" name="email" required>
		</div>
		<div class="input_field">
			<label for="password">Password</label>
			<input id="password" type="password" name="password" required>
		</div>
		<input type="submit" name="login" value="Login" class="btn blue darken-4" style="width: 100%;">
	</form>
	<div class="divider"></div>
	<center>
		<h6 style="font-weight: bold; margin-top: 10%;">Disclaimer</h6>
    	<h6>Jika belum membuat akun silahkan hubungi <a href="contact.php">admin</a></h6>
    </center>
	
</div>
<?php 
	if(isset($_POST['login'])){
		$email = mysqli_real_escape_string($koneksi,$_POST['email']);
		$password = mysqli_real_escape_string($koneksi,md5($_POST['password']));
	
		$sql = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE email='$email' AND password='$password' ");
		$cek = mysqli_num_rows($sql);
		$data = mysqli_fetch_assoc($sql);
	
		$sql2 = mysqli_query($koneksi,"SELECT * FROM petugas WHERE email='$email' AND password='$password' ");
		$cek2 = mysqli_num_rows($sql2);
		$data2 = mysqli_fetch_assoc($sql2);

		if($cek>0){
			session_start();
			$_SESSION['email']=$email;
			$_SESSION['data']=$data;
			$_SESSION['level']='mahasiswa';
			header('location:mahasiswa/');
		}
		elseif($cek2>0){
			if($data2['level']=="admin"){
				session_start();
				$_SESSION['email']=$email;
				$_SESSION['data']=$data2;
				header('location:admin/');
			}
			elseif($data2['level']=="petugas"){
				session_start();
				$_SESSION['email']=$email;
				$_SESSION['data']=$data2;
				header('location:petugas/');
			}
		}
		else{
			echo "<script>alert('E-mail/Password Salah')</script>";
		}

	}
 ?>