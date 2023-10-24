@extends('admin.app')
@section('title', 'Tambah Siswa')
@section('content-title', 'Tambah Siswa')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                @if (count($errors) > 0)
                   <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                   </div>
                @endif
                <form method="post" enctype="multipart/form-data" action="{{ route('mastersiswa.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name='nama' value="{{ old('nama') }}">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-select form-control" id="jk" name="jk" value="{{ old('jk') }}">
                          <option value="laki-laki">Laki - laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea class="form-control" id="about" name='about' value="{{ old('about') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Siswa</label>
                        <input type="file" class="form-control-file" id="foto" name="foto" value="{{ old('foto') }}">
                   </div>
                   <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">Batal</a>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>   
    
@endsection