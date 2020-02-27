@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                Tambah Jenis Hobi
                </div>
                <div class="card-body">
                    <form action="{{route('hobi.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Hobi</label>
                            <input type="text" name="hobi" class="form-control" required>
                        </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
