@extends('layouts.home')
@section('title')
    Sedang Dalam Perbaikan
@endsection

@section('content')
     <!-- Header -->
     <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <img src="{{ asset('frontend/img/maintenance.svg') }}" class="w-75 mt-5 mx-auto d-block"
                        alt="alternative" />
                </div>
                <div class="col-md-5">
                    <div class="title-page">
                        <h4 class="font-weight-bolder text-center mb-4 mt-5 text-danger">
                            🥵 Maintenance 🥵
                        </h4>
                        <h3 class="text-center text-muted">Mohon Maaf Akses Saat isi dibatasi, Terima Kasih</h3>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header -->
@endsection