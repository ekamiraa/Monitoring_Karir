@extends('layouts.master')

@section('title', 'Sistem Monitoring Karir')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Data Employee</h1>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end px-4">
        <a href="{{ url('admin/import-employee') }}" class="btn btn-warning mb-4">
            <i class="bi bi-file-earmark-arrow-up"></i>
            Import Data
        </a>
    </div>
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>No Handphone</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>No Handphone</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nomor_ktp }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->jk }}</td>
                                    <td>{{ $row->tempat_lahir }}</td>
                                    <td>{{ Carbon\Carbon::parse($row->tgl_lahir)->format('d-m-Y') }}</td>
                                    <td>0{{ $row->no_handphone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection