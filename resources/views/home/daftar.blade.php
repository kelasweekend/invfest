{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0" />
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <title>REGISTER</title>
</head>

<body class="bg-light">
    <!-- Bottom Navbar -->
    <nav class="
				navbar navbar-light navbar-expand
				p-0
				d-md-none d-lg-none d-xl-none
				fixed-bottom
				top-shadow
			"
        id="bottomNav">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a href="index.html" class="nav-link"><i class="fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="tracking.html" class="nav-link"><i class="fas fa-info"></i>
                    <p>Tracking</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="register.html" class="nav-link active"><i class="fas fa-user"></i>
                    <p>Register</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- End of Bottom Navbar -->

    <div class="row pb-5 pb-md-0 vh-100 register">
        <div class="col-5 h-100 d-none d-lg-block overflow-hidden" style="background-color: #7e57c2">
            <div class="h-100 d-flex justify-content-center">
                <img src="{{ asset('frontend/img/pendaftaran.png') }}" class="details-img my-auto p-5 w-75"
                    alt="alternative" />
            </div>
        </div>

        <div class="col-lg-7 col-md-12 overflow-auto pb-5">
            <div class="px-3 px-md-5 h-100">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('frontend/img/logo.png') }}" width="120"
                        class="d-inline-block align-top position-relative" alt="" />
                </a>
                <hr class="mt-0" />
                <form class="form-horizontal" method="POST" action="{{ route('daftar') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="email" class="form-label">Email Aktif</label>
                                <input type="email" name="email" class="form-control" id="nama_ketua"
                                    placeholder="E.g Setiawan@gmail.com" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <div class="form-group">
                                    <label>kategori</label>
                                    <select class="form-control" name="kategori_id">
                                        <option aria-readonly="true">Pilih kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="nama_team" class="form-label">Nama Team </label>
                                <input type="text" name="nama_team" class="form-control" id="nama_team"
                                    placeholder="E.g Aligator" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="nama_ketua" class="form-label">Nama Ketua Team</label>
                                <input type="text" name="nama_ketua" class="form-control" id="nama_ketua"
                                    placeholder="E.g Setiawan" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="instansi" class="form-label">Asal Instansi</label>
                                <input type="text" name="instansi" class="form-control" id="instansi"
                                    placeholder="E.g Aligator" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <div class="form-group">
                                    <label>Tingkatan</label>
                                    <select class="form-control" name="tingkatan" onchange="getval(this);">
                                        <option aria-readonly="true">Pilih Tingkatan</option>
                                        <option value="sma/smk">SMA / SMK Sederajat</option>
                                        <option value="kuliah">Universitas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-none" id="pendamping">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="nama_pendamping" class="form-label">Nama Pendamping Team</label>
                                <input type="text" name="nama_pendamping" class="form-control" id="nama_pendamping"
                                    placeholder="E.g Budi skuy" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <div class="form-group">
                                    <label class="form-label">Berkas Pendamping Team</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="berkas_pendamping"
                                            id="customFile">
                                        <label class="custom-file-label" for="customFile">KTP Pendamping</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="anggota_1">
                            <p class="text-muted mb-2">Anggota 1</p>
                            <div class="d-flex justify-content-between">
                                <input type="text" name="anggota_1" class="form-control mr-2" id="anggota_1"
                                    placeholder="E.g Budi skuy" autocomplete="off" required>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="berkas_anggota_1" id="customFile"
                                        required>
                                    <label class="custom-file-label" for="customFile">upload berkas</label>
                                </div>
                            </div>
                        </div>
                        <div class="anggota_2 mt-2">
                            <p class="text-muted mb-2">Anggota 2</p>
                            <div class="d-flex justify-content-between">
                                <input type="text" name="anggota_2" class="form-control mr-2" id="anggota_2"
                                    placeholder="E.g Budi skuy" autocomplete="off">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="berkas_anggota_2"
                                        id="customFile">
                                    <label class="custom-file-label" for="customFile">upload berkas</label>
                                </div>
                            </div>
                        </div>
                        <div class="anggota_3 mt-2">
                            <p class="text-muted mb-2">Anggota 3</p>
                            <div class="d-flex justify-content-between">
                                <input type="text" name="anggota_3" class="form-control mr-2" id="anggota_3"
                                    placeholder="E.g Budi skuy" autocomplete="off">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="berkas_anggota_3"
                                        id="customFile">
                                    <label class="custom-file-label" for="customFile">upload berkas</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-secondary tombol float-right mt-3" type="submit">Submmit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function getval(sel) {
            if (sel.value == "sma/smk") {
                $("#pendamping").removeClass("d-none");
                console.log('sma/smk :)')
            } else {
                $("#pendamping").addClass("d-none");
                console.log('Universitas')
            }
            // alert(sel.value);
        }
    </script>
</body>

</html> --}}

@extends('layouts.home')
@section('title')
    Daftar Team Baru
@endsection

@section('content')
    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('frontend/img/pendaftaran.png') }}" class="img-fluid w-75 mx-auto d-block mt-5"
                        alt="Header Img" />
                </div>
                <div class="col-sm-12 col-md-6 order-md-last">
                    <h4 class="font-weight-bolder">
                        Mulai Daftarkan Team Terbaik Anda
                    </h4>
                    <a href="#daftar" class="btn primary-color btn-rounded"><i class="fas fa-plus mr-1"></i> Daftar</a>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header -->
    <section class="mt-5 mb-5" id="daftar">
        <div class="container">
            <div class="card rounded p-4 shadow-sm">
                <form class="form-horizontal" method="POST" action="{{ route('daftar') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="email" class="form-label">Email Aktif</label>
                                <input type="email" name="email" class="form-control" id="nama_ketua"
                                    placeholder="E.g Setiawan@gmail.com" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <div class="form-group">
                                    <label>kategori</label>
                                    <select class="form-control" name="kategori_id">
                                        <option aria-readonly="true">Pilih kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="nama_team" class="form-label">Nama Team </label>
                                <input type="text" name="nama_team" class="form-control" id="nama_team"
                                    placeholder="E.g Aligator" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="nama_ketua" class="form-label">Nama Ketua Team</label>
                                <input type="text" name="nama_ketua" class="form-control" id="nama_ketua"
                                    placeholder="E.g Setiawan" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="instansi" class="form-label">Asal Instansi</label>
                                <input type="text" name="instansi" class="form-control" id="instansi"
                                    placeholder="E.g Aligator" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <div class="form-group">
                                    <label>Tingkatan</label>
                                    <select class="form-control" name="tingkatan" onchange="getval(this);">
                                        <option aria-readonly="true">Pilih Tingkatan</option>
                                        <option value="sma/smk">SMA / SMK Sederajat</option>
                                        <option value="kuliah">Universitas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-none" id="pendamping">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="nama_pendamping" class="form-label">Nama Pendamping Team</label>
                                <input type="text" name="nama_pendamping" class="form-control" id="nama_pendamping"
                                    placeholder="E.g Budi skuy" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <div class="form-group">
                                    <label class="form-label">Berkas Pendamping Team</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="berkas_pendamping"
                                            id="customFile">
                                        <label class="custom-file-label" for="customFile">KTP Pendamping</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="anggota_1">
                            <p class="text-muted mb-2">Anggota 1</p>
                            <div class="d-flex justify-content-between">
                                <input type="text" name="anggota_1" class="form-control mr-2" id="anggota_1"
                                    placeholder="E.g Budi skuy" autocomplete="off" required>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="berkas_anggota_1" id="customFile"
                                        required>
                                    <label class="custom-file-label" for="customFile">upload berkas</label>
                                </div>
                            </div>
                        </div>
                        <div class="anggota_2 mt-2">
                            <p class="text-muted mb-2">Anggota 2</p>
                            <div class="d-flex justify-content-between">
                                <input type="text" name="anggota_2" class="form-control mr-2" id="anggota_2"
                                    placeholder="E.g Budi skuy" autocomplete="off">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="berkas_anggota_2" id="customFile">
                                    <label class="custom-file-label" for="customFile">upload berkas</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-secondary tombol float-right mt-3" type="submit">Submmit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
