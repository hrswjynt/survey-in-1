<h1>Ini halaman edit data survey</h1>
<hr>
<ul>
  @foreach ($jalan as $item)
  <li>{{ $item->jenis }}</li>
  @endforeach
</ul>
<ul>
  @foreach ($saluran as $item)
  <li>{{ $item->jenis }}</li>
  @endforeach
</ul>
<ul>
  @foreach ($sosial as $item)
  <li>{{ $item->jenis }}</li>
  @endforeach
</ul>
<ul>
  @foreach ($lampiran as $item)
  <li>{{ $item->jenis }}</li>
  @endforeach
</ul>