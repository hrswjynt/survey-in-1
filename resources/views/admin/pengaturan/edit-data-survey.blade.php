<h1>Ini halaman edit data survey</h1>
<hr>
<ul>
	<hr>
	<form action="/pengaturan/edit-data-survey/jalan/tambah" method="post" id="form-jalan">
		@csrf
		<input type="text" name="jalan" id="jalan">
		<button form="form-jalan" type="submit">Tambah</button>
	</form>
	<h3>Kondisi Jalan :</h3>
	<hr>
	@foreach ($jalan as $item)
	<li>
		{{ $item->jenis }}
		<button>
			<a href="/pengaturan/edit-data-survey/ubah/{{ $item->id }}">Ubah</a>
		</button>
		<button>
			<a href="/pengaturan/edit-data-survey/jalan/hapus/{{ $item->id }}">Hapus</a>
		</button>
	</li>
	@endforeach
</ul>
<ul>
	<hr>
	<form action="/pengaturan/edit-data-survey/saluran/tambah" method="post" id="form-saluran">
		@csrf
		<input type="text" name="saluran" id="saluran">
		<button form="form-saluran" type="submit">Tambah</button>
	</form>
	<h3>Kondisi Saluran :</h3>
	<hr>
	@foreach ($saluran as $item)
	<li>
		{{ $item->jenis }}
		<button>
			<a href="/pengaturan/edit-data-survey/ubah/{{ $item->id }}">Ubah</a>
		</button>
		<button>
			<a href="/pengaturan/edit-data-survey/saluran/hapus/{{ $item->id }}">Hapus</a>
		</button>
	</li>
	@endforeach
</ul>
<ul>
	<hr>

	<form action="/pengaturan/edit-data-survey/fasos/tambah" method="post" id="form-fasos">
		@csrf

		<input type="text" name="fasos" id="fasos">
		<button form="form-fasos" type="submit">Tambah</button>
	</form>
	<h3>Jenis Fasilitas Sosial (Fasos) :</h3>
	<hr>
	@foreach ($sosial as $item)
	<li>
		{{ $item->jenis }}
		<button>
			<a href="/pengaturan/edit-data-survey/ubah/{{ $item->id }}">Ubah</a>
		</button>
		<button>
			<a href="/pengaturan/edit-data-survey/fasos/hapus/{{ $item->id }}">Hapus</a>
		</button>
	</li>
	@endforeach
</ul>
<ul>
	<hr>
	<form action="/pengaturan/edit-data-survey/lampiran/tambah" method="post" id="form-lampiran">
		@csrf
		<input type="text" name="lampiran" id="lampiran">
		<button form="form-lampiran" type="submit">Tambah</button>
	</form>
	<h3>Lampiran Data :</h3>
	<hr>
	@foreach ($lampiran as $item)
	<li>
		{{ $item->jenis }}
		<button>
			<a href="/pengaturan/edit-data-survey/ubah/{{ $item->id }}">Ubah</a>
		</button>
		<button>
			<a href="/pengaturan/edit-data-survey/fasos/hapus/{{ $item->id }}">Hapus</a>
		</button>
	</li>
	@endforeach
</ul>