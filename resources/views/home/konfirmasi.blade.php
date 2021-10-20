@extends('layouts.home')
@section('title')
    Pendaftaran Berhasil
@endsection

@section('content')
    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('frontend/img/payment.svg') }}" class="w-75 mt-5 mx-auto d-block"
                        alt="alternative" />
                </div>
                <div class="col-md-6">
                    <h4 class="font-weight-bolder text-center mb-4 mt-5">
                        Konfirmasi Pembayaran
                    </h4>
                    <div class="card shadow-sm p-4">
                        <form class="mt-2" action="{{ route('konfirmasi') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($errors->all())
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Warning !</strong>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($message = Session::get('salah'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Warning !</strong> {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <p class="text-center text-muted">Silahkan masukan Token yang ada di Email Pendaftaran</p>
                            <div class="form-group">
                                <label for="invoice">Masukan Kode Invoice</label>
                                <input type="text" name="invoice" class="form-control" id="invoice"
                                    placeholder="Masukan token pendaftaran anda" required />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pembayaran">Pilih Bank Transfer</label>
                                        <select class="form-control" id="pembayaran" name="bank" required>
                                            <option value="">Pilih Pembayaran</option>
                                            @foreach ($pay as $harga)
                                                <option value="{{ $harga->id }}">{{ $harga->nama_bank }} |
                                                    {{ $harga->nomor_rekening }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="costumFile">Upload Bukti Pembayaran</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image" required>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn primary-color btn-rounded btn-block">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header -->
@endsection
