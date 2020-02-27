@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Data Mahasiswa
                    <a href="{{route('mahasiswa.create')}}"
                        class="float-right">
                        Tambah Data Mahasiswa
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Nama Dosen</th>
                                    <th>Aksi</th>
                                </tr>    
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($mhs as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->nim}}</td>
                                    <td>{{$data->namadosen}}</td>
                                    <td>
                                    <form action="{{route('mahasiswa.destroy',$data->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('mahasiswa.show',$data->id)}}">Lihat</a>|
                                    <a href="{{route('mahasiswa.edit',$data->id)}}">Edit</a> |
                                    <button type="submit" onclick="return('Apakah Anda Yakin ?')">Hapus</button>
                                    </form>  
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>     
                        </tabel>
                    </div>
                </div>
            </div>
@endsection