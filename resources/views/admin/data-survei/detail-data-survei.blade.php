<p>Nama gang atau perumahan : {{ $data->nama_gang }}</p>
<p>Lokasi : {{ $data->lokasi }}</p>
<p>Koordinat : {{ $data->no_gps }}</p>
<p>Dimensi Jalan Utama : Panjang = {{ $data->dimensi_jalan_panjang }}m, <br>Lebar =
    {{ $data->dimensi_jalan_lebar }}m</p>
<p>Kondisi Jalan : {{ $data->status_jalan }}%</p>
<p>Dimensi Saluran : Panjang = {{ $data->dimensi_saluran_panjang_kanan + $data->dimensi_saluran_panjang_kiri }},
    <br>Lebar = {{ $data->dimensi_saluran_lebar_kanan + $data->dimensi_saluran_lebar_kiri }}, <br> Kedalaman =
    {{ $data->dimensi_saluran_kedalaman_kanan + $data->dimensi_saluran_kedalaman_kiri }}
</p>
<p>Kondisi Saluran : {{ $data->kondisi_saluran }}%</p>
<p>Jenis Fasos :
    @foreach ($fasos as $item)
        {{ $item->jenis }} <br>
    @endforeach
</p>
<p>Luas Fasos : </p>
<p>Koordinat Fasos : </p>
<p>Jumlah Rumah : Layak = , <br>Tidak Layak = , <br>Kosong = </p>
<p>Jenis Rumah : Developer = , <br>Swadaya =</p>
<p>Pos Jaga : </p>
<p>Ruko di bagian depan : </p>
<p>No. IMB Pendahuluan : </p>
<p>Surveyor : </p>
<p>Lampiran Data : </p>
