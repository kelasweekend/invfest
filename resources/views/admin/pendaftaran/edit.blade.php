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
                                        <form id="form" action="{{ route('pendaftaran.update', $data->invoice) }}"
                                            method="POST">
                                            @csrf
                                            <label for="checkbox">ACC Peserta ? </label>
                                            <input type="checkbox" name="status" id="checkbox">
                                        </form>
                                    @else
                                        <form id="form" action="{{ route('pendaftaran.update', $data->invoice) }}"
                                            method="POST">
                                            @csrf
                                            <label for="checkbox">Non ACC Peserta ? </label>
                                            <input type="checkbox" name="matikan" id="checkbox">
                                        </form>
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
                                        <label for="nama_ketua" class="col-sm-2 col-form-label">Nomor Whatsapp</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" disabled readonly
                                                value="{{ $data->nomor_wa }}" id="nama_team" placeholder="Nama Team">
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
                                            @if ($data->tingkatan == 'sma/smk')
                                                <input type="email" class="form-control" disabled readonly value="Sekolah"
                                                    id="nama_team" placeholder="Nama Team">
                                            @else
                                                <input type="email" class="form-control" disabled readonly
                                                    value="Universitas" id="nama_team" placeholder="Nama Team">
                                            @endif
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
                                                    <a @if ($data->berkas_pendamping != '')href="{{ asset('assets/pendamping/' . $data->berkas_pendamping) }}"@endif target="__blank"
                                                        class="btn btn-secondary">Unduh Berkas</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="berkas_pendamping" class="col-sm-2 col-form-label">Nama Ketua</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" class="form-control" disabled readonly
                                                        value="{{ $data->nama_ketua }}" id="nama_team"
                                                        placeholder="Tidak Ada Pendamping">
                                                </div>
                                                <div class="col-2">
                                                    <a href="{{ asset('assets/anggota/' . $data->berkas_ketua) }}"
                                                        target="__blank" class="btn btn-secondary">Unduh Berkas</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                    <a @if ($data->berkas_anggota_1 != '')href="{{ asset('assets/anggota/' . $data->berkas_anggota_1) }}"@endif target="__blank"
                                                        class="btn btn-secondary">Unduh Berkas</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="anggota_2" class="col-sm-2 col-form-label">Nama Anggota 2</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" class="form-control" disabled readonly
                                                        value="{{ $data->anggota_2 }}" id="nama_team"
                                                        placeholder="Tidak Ada Anggota">
                                                </div>
                                                <div class="col-2">
                                                    <a @if ($data->berkas_anggota_2 != '')href="{{ asset('assets/anggota/' . $data->berkas_anggota_2) }}"@endif target="__blank"
                                                        class="btn btn-secondary">Unduh Berkas</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="anggota_3" class="col-sm-2 col-form-label">Bukti Pembayaran</label>
                                        <div class="col-sm-10">
                                            <a @if ($data->bukti_pembayaran != '')href="{{ asset('assets/bukti_pembayaran/' . $data->bukti_pembayaran) }}"@endif target="__blank" class="btn btn-secondary">Unduh
                                                Berkas</a>
                                        </div>
                                    </div>
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
                                            <label for="status" class="col-md-6 col-form-label">Status Pembayaran</label>
                                            @if ($data->bukti_pembayaran == null)
                                                <span class="badge badge-danger">Belum Pembayaran</span>
                                            @else
                                                <span class="badge badge-success">Sudah Upload Bukti</span>
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
    <script type="text/javascript">
        $(function() {
            $('#checkbox').on('change', function() {
                Swal.fire({
                    title: 'Apakah Kamu Yakin ?',
                    text: "Status Team Akan Berubah dibagian bawah",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Setujui'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form').submit();
                    }
                })
            });
        });
    </script>
@endsection
