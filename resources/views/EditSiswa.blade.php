@extends('admin.app')
@section('title', 'Edit Siswa')
@section('content-title', 'Edit Siswa')
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
                <form method="post" enctype="multipart/form-data" action="{{ route('mastersiswa.update', $data->id) }}" >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name='nama' value="{{ $data->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-select form-control" id="jk" name="jk">
                          <option value="laki-laki" @if( $data->jk == 'laki-laki') selected @endif >Laki - laki</option>
                          <option value="perempuan" @if( $data->jk == 'perempuan') selected @endif >Perempuan</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{$data->email }}">
                    </div>

                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea class="form-control" id="about" name="about" >{{ $data->about }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Siswa</label><br>
                        <input type="file" class="form-control-file" id="foto" name="foto" >
                        <img src="{{ asset('/template/img/'.$data->foto) }}" width="300" class="img-thumbnail">
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