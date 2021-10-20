@extends('layouts.home')
@section('title')
    Terima Kasih
@endsection

@section('content')
      <!-- Header -->
      <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <img src="{{ asset('frontend/img/karya.svg') }}" class="w-75 mt-5 mx-auto d-block"
                        alt="alternative" />
                </div>
                <div class="col-md-5">
                    <div class="title-page">
                        <h4 class="font-weight-bolder text-center mb-4 mt-5 text-success">
                           Terima Kasih 🥳🥳
                        </h4>
                        <h3 class="text-center text-muted">Karya Team Kamu Sudah Berhasil di Upload</h3>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header -->
@endsection