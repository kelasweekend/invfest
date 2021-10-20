@extends('layouts.home')
@section('title')
    Terima Kasih Telah Konfirmasi Pendaftaran
@endsection


@section('content')
    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <img src="{{ asset('frontend/img/success.svg') }}" class="w-75 mt-5 mx-auto d-block"
                        alt="alternative" />
                </div>
                <div class="col-md-5">
                    <div class="title-page">
                        <h4 class="font-weight-bolder text-center mb-4 mt-5">
                            Terima Kasih
                        </h4>
                        <h3 class="font-weight-bolder text-center">Telah Konfirmasi Pembayaran, Silahkan Check Status Team
                            anda Secara Berkala</h3>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header -->
@endsection
