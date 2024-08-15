@extends('layouts.master')

@section('title', 'Sistem Monitoring Karir')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Import Data Pegawai</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Masukkan File Excel</label>
                        <form action="{{ url('admin/import-employee') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input class="form-control" type="file" id="formFile" name="import-file">
                                <button class="btn btn-primary" type="submit">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection