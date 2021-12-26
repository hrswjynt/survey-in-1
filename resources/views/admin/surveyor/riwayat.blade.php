@foreach ($detailSurvey as $item)
    <p>nama : {{ $profile }}</p>
    <p>kecamatan : {{ $item->kecamatan->nama }}</p>
    <p>Per-Hari</p>
    <p>tanggal : {{ \Carbon\Carbon::parse($item->tanggal)->format('j F Y') }}</p>
    <p>{{ $item->selesai }} dari {{ $item->target }} Gang dan Perumahan</p>
    <p>
        @if ($item->selesai - $item->target == 0)
            <p style="color: rgb(0, 255, 0)">Survei Sukses</p>
        @else
            <p style="color: red">{{ $item->selesai - $item->target }} Gang dan Perumahan</p>
        @endif
    </p>
    <hr>
@endforeach
