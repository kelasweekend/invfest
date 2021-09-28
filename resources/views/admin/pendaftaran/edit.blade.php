@extends('layouts.admin.index')
@section('title')
    Edit Data Pendaftar
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1>@yield('title')</h1> --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    INVOICE NUMBER : {{ $data->invoice }}
                                    @if ($data->status == '0')
                                        <input type="checkbox" name="my-checkbox" data-bootstrap-switch>
                                    @else
                                        <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="nama_team" class="col-sm-2 col-form-label">Nama Team</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" disabled readonly
                                                value="{{ $data->nama_team }}" id="nama_team" placeholder="Nama Team">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_ketua" class="col-sm-2 col-form-label">Nama Ketua</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" disabled readonly
                                                value="{{ $data->nama_ketua }}" id="nama_team" placeholder="Nama Team">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="instansi" class="col-sm-2 col-form-label">Asal Instansi</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" disabled readonly
                                                value="{{ $data->instansi }}" id="nama_team" placeholder="Nama Team">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tingkatan" class="col-sm-2 col-form-label">Tingkatan Yang
                                            diambil</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" disabled readonly
                                                value="{{ $data->tingkatan }}" id="nama_team" placeholder="Nama Team">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="berkas_pendamping" class="col-sm-2 col-form-label">Nama
                                            Pendamping</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="email" class="form-control" disabled readonly
                                                        value="{{ $data->nama_pendamping }}" id="nama_team"
                                                        placeholder="Tidak Ada Pendamping">
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-secondary">Unduh Berkas</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="anggota_1" class="col-sm-2 col-form-label">Nama Anggota 1</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="email" class="form-control" disabled readonly
                                                        value="{{ $data->anggota_1 }}" id="nama_team"
                                                        placeholder="Nama Team">
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-secondary">Unduh Berkas</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="anggota_2" class="col-sm-2 col-form-label">Nama Anggota 2</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="email" class="form-control" disabled readonly
                                                        value="{{ $data->anggota_2 }}" id="nama_team"
                                                        placeholder="Tidak Ada Anggota">
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-secondary">Unduh Berkas</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="anggota_3" class="col-sm-2 col-form-label">Nama Anggota 3</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="email" class="form-control" disabled readonly
                                                        value="{{ $data->anggota_3 }}" id="nama_team"
                                                        placeholder="Tidak Ada Anggota">
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-secondary">Unduh Berkas</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label for="status" class="col-md-6 col-form-label">Status Pendaftaran</label>
                                            @if ($data->status == '0')
                                                <span class="badge badge-warning">Pending</span>
                                            @else
                                                <span class="badge badge-success">Disetujui</span>
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <label for="status" class="col-md-6 col-form-label">Status Pendaftaran</label>
                                            @if ($data->bukti_pembayaran == null)
                                                <span class="badge badge-danger">Belum Pembayaran</span>
                                            @else
                                                <span class="badge badge-success">Disetujui</span>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('js-tambahan')
    <!-- Bootstrap Switch -->
    <script src="{{ asset('backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script>
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    </script>
@endsection
