@extends('/admin/main')
@section('main-content')
	<div class="content">
		<h2 class="p-3 text-center shadow mb-5">Edit Surveyor {{ $nama_lengkap }}</h2>
		<div class="row justify-content-center">
			<div class="col-8  p-5 shadow">
				<form method="POST" action="/surveyor/edit">
					@csrf
					<div class="mb-3">
						<input type="hidden" name="id" value="{{ $id }}">
						<label for="nama_lengkap" class="form-label">Nama Lengkap</label>
						<input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
							id="nama_lengkap" name="nama_lengkap" value="{{ $nama_lengkap }}">
						@error('nama_lengkap'))
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="nomor_telpon" class="form-label">Nomor Telepon</label>
						<input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ $nomor_telepon }}">
						@error ('nomor_telepon')
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email address</label>
						<input type="email" class="form-control @error('email') is-invalid @enderror"" id=" email"
							name="email" value="{{ $email }}">
						@error('email')
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password Baru</label>
						<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="">
						<input type="hidden" name="oldPassword" value="{{ $password }}" >
						@error('password')
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@enderror
					</div>
	
					<button type="submit" class="btn btn-primary container-fluid">Submit</button>
				</form>
			</div>
		</div>
	</div>
@endsection