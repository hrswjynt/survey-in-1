@extends('/admin/main')
@section('main-content')
	<div class="content">
		<div class="admin-hl">
			<h1>Edit Profile Admin</h1>
			<p class="hl">Lengkapi data pribadi Anda dengan lengkap di bawah ini</p>
			<div class="admin-img">
				<div class="admin-foto">
					<button class="upload-btn">Ubah foto profile
					</button>
					<p>maks upload (2 mb)</p>
				</div>
			</div>
			<h2>Azizi Iqbalika</h2>
			<p class="status">Admin</p>
		</div>
		<!-- ===================== -->
		<form action="" method="post">
			<div class="namalengkap">
				<p>Nama Lengkap :</p>
				<input type="text" input autocomplete="off" required>
			</div>
			<div class="jkelamin">
				<p>Jenis Kelamin :</p>
				<select name="" id="" input autocomplete="off" required>
					<option value=""></option>
					<option value="">Laki-laki</option>
					<option value="">Perempuan</option>
				</select>
			</div>
			<div class="nip">
				<p>NIP :</p>
				<input type="text" input autocomplete="off" required>
			</div>
			<div class="phone">
				<p>No Handphone :</p>
				<input type="tel" input autocomplete="off" required>
			</div>
			<div class="email">
				<p>Email :</p>
				<input type="email" input autocomplete="off" required>
			</div>
			<div class="alamat">
				<p>Alamat :</p>
				<input type="text" input autocomplete="off" required>
			</div>
			<button type="submit" id="btn-daftar">Simpan Perubahan</button>
		</form>

	</div>	
@endsection
