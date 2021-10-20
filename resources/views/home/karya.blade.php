@extends('layouts.home')
@section('title')
    Upload Karya Lomba
@endsection

@section('content')
     <!-- Header -->
     <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('frontend/img/upload.svg') }}" class="w-75 mt-5 mx-auto d-block" alt="alternative" />
                </div>
                <div class="col-md-6">
                    <h4 class="font-weight-bolder text-center mb-2 mt-5">
                        Upload Karya Lomba
                    </h4>
                    <div class="card shadow-sm p-4">
                        <form class="mt-2" action="{{ route('upload_karya') }}" method="POST">
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
                                <label for="inputNamaTim">Invoice Team</label>
                                <input type="text" name="invoice" class="form-control" id="inputNamaTim"
                                    placeholder="Masukan token pendaftaran anda" required/>
                            </div>
                            <div class="form-group">
                                <label for="link_karya">Link Karya</label>
                                <input type="text" name="link" class="form-control" id="link_karya"
                                    placeholder="Masukan Karya anda"  required/>
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