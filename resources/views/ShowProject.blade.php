@if ($data->isEmpty())
    <h6 class="text-center"> Siswa Belum Memiliki Project </h6>                   
@else
    @foreach ($data as $item)
        <div class="card">
            <div class="card-header">
                <strong>
                {{ $item->nama_projek }}
                </strong>
            </div>
            <div class="card-body">
                <h6>Tanggal Project :</h6>
                <p>{{ $item->tanggal }}</p>
                <h6>Deskripsi Project :</h6>
                <p>{{ $item->deskripsi }}</p>
            </div>
            <div class="card-footer text-right">
                <a href="" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            </div>
        </div><br>
    @endforeach
@endif