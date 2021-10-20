@extends('layouts.home')
@section('title')
    Track Team Anda
@endsection

@section('content')
    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('frontend/img/track.png') }}" class="w-75 mt-5 mx-auto d-block" alt="alternative" />
                </div>
                <div class="col-md-7">
                    <h4 class="font-weight-bolder text-center mb-2 mt-5">
                        Check Status Team Anda
                    </h4>
                    <div class="card shadow-sm p-4">
                        @if (empty($status))
                            <form class="mt-2" action="{{ route('track') }}" method="POST">
                                @csrf
                                @if ($errors->all())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Warning !</strong> {{ $error }}
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                                @if ($message = Session::get('salah'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Warning !</strong> {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <p class="text-center text-muted">Silahkan masukan Token yang ada di Email Pendaftaran</p>
                                <div class="form-group">
                                    <input type="text" name="invoice" class="form-control" id="inputNamaTim"
                                        placeholder="Masukan token pendaftaran anda" />
                                </div>
                                <button type="submit" class="btn primary-color btn-rounded btn-block">
                                    Submit
                                </button>
                            </form>
                        @else
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Nama Team</td>
                                        <td>:</td>
                                        <td>{{ $status->nama_team }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ketua Team</td>
                                        <td>:</td>
                                        <td>{{ $status->nama_ketua }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tingkatan</td>
                                        <td>:</td>
                                        <td>{{ $status->tingkatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>
                                            @if ($status->status == '0')
                                                <span class="badge badge-danger">Belum Konfirmasi</span>
                                            @else
                                                <span class="badge badge-success">Terkonfirmasi</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bukti Pembayaran</td>
                                        <td>:</td>
                                        <td>
                                            @if ($status->bukti_pembayaran == '')
                                                <span class="badge badge-danger">Belum Membayar</span>
                                            @else
                                                <span class="badge badge-success">Terkonfirmasi</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @if ($status->status == '0')
                                @if ($status->bukti_pembayaran == '')
                                    <a href="{{ route('sukses_daftar') }}" class="btn btn-secondary">Konfirmasi
                                        Pembayaran</a>
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header -->
@endsection
