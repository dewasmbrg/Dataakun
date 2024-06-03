@extends('layout/aplikasi')

@section('konten')
<div class="pb-3">
    <form class="d-flex" action="{{url('akun')}}" method="get">
        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Cari</button>
    </form>
</div>
<head>
    <!-- Element head lainnya -->

    <!-- Tambahkan baris ini untuk menyertakan Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body style="background-color: #cbdddd;">

    <a href="/akun/create" class="btn btn-success" style="margin-bottom: 10px;">Tambah Data <i class="fas fa-plus-square"></i></a>
    <a href="/akun/cetak" target="_blank" class="btn btn-primary" style="margin-bottom: 10px;">Cetak Data <i class="fas fa-print"></i></a>

<table class="table table-bordered table-hover custom-table" style="background-color: rgba(255, 255, 255, 0.3); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 15px; border-collapse: collapse;">
    <thead style="background-color: rgba(218, 218, 218, 0.5); color: #3d3d3d; font-size: 16px; border: 1px solid #cbdddd;">
        <tr>
            <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Kode Akun</th>
            <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Nama Akun</th>
            <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Deskripsi</th>
            <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Tipe Akun</th>
            <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Kategori Akun</th>
            <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Level Akun</th>
            <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Created at</th>
            <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Aksi</th>
        </tr>
    </thead>
    <tbody style="background-color: rgba(173, 216, 230, 0.4); font-size: 13px; border: 1px solid #cbdddd;">
        @foreach ($data as $item)
            <tr>
                <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $item->kode_akun }}</td>
                <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $item->nama_akun }}</td>
                <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $item->deskripsi }}</td>
                <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $item->tipe_akun }}</td>
                <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $item->kategori_akun }}</td>
                <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $item->role->nama_level }}</td>
                <td style="text-align: center; border: 1px solid #cbdddd; background-color: rgba(243, 231, 231, 0.5);">{{ $item->created_at }}</td>
                <td style="text-align: center; border: 1px solid #cbdddd; background-color: rgba(243, 231, 231, 0.5); font-size: 1em;">
                    <a class='btn btn-info btn-sm' href='{{ url('/akun/'.$item->kode_akun) }}'><i class="fas fa-exclamation-circle" style="font-size: 1em;"></i></a>
                    <a class='btn btn-warning btn-sm' href='{{ url('/akun/'.$item->kode_akun.'/edit') }}'><i class="fas fa-pencil-alt" style="font-size: 1em;"></i></a>

                    <form class='d-inline' action="{{ '/akun/'.$item->kode_akun }}" method='post' onsubmit="return confirm('Hapus data?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt" style="font-size: 1em;"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $data->links() }}
@endsection