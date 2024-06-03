@extends('layout.aplikasi')

@section('konten')
<form method="post" action="/akun">
    @csrf
    <div class="mb-3">
        <label for="kode_akun" class="form-label">Kode Akun</label>
        <input type="text" class="form-control" name='kode_akun' id="kode_akun"
            value="{{ Session::get('kode_akun') }}">
    </div>
    
    <div class="mb-3">
        <label for="nama_akun" class="form-label">Nama Akun</label>
        <input type="text" class="form-control" name='nama_akun' id="nama_akun"
            value="{{ Session::get('nama_akun') }}">
    </div>
    
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" name='deskripsi' id="deskripsi">{{ Session::get('deskripsi') }}</textarea>
    </div>
    
    <div class="mb-3">
        <label for="tipe_akun" class="form-label">Tipe Akun</label>
        <input type="text" class="form-control" name='tipe_akun' id="tipe_akun"
            value="{{ Session::get('tipe_akun') }}">
    </div>
    
    <div class="mb-3">
        <label for="kategori_akun" class="form-label">Kategori Akun</label>
        <input type="text" class="form-control" name='kategori_akun' id="kategori_akun"
            value="{{ Session::get('kategori_akun') }}">
    </div>
    
    <div class="mb-3">
        <label for="level_akun" class="form-label">Level Akun</label>
        <select name="level_akun" class="form-select" id="level_akun">
            <option disabled selected > --Pilih Level-- </option>
            @foreach ($wil as $item)
                <option value="{{$item->kode_level}}">{{$item->nama_level}}</option>
            @endforeach
        </select>
    </div>
    

    <div class="mb-3">
        <label for="created_at" class="form-label">Created At</label>
        <input type="text" class="form-control" name='created_at' id="created_at"
            value="{{ \Carbon\Carbon::parse(Session::get('created_at'))->format('Y-m-d H:i:s') }}" readonly>
    </div>
           
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </div>
</form>
@endsection
