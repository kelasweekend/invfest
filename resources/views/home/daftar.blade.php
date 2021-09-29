<!DOCTYPE html>
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
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}" />
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
                <img src="{{asset('frontend/img/pendaftaran.png')}}" class="details-img my-auto p-5 w-75" alt="alternative" />
            </div>
        </div>

        <div class="col-lg-7 col-md-12 overflow-auto pb-5">
            <div class="px-3 px-md-5 h-100">
                <a class="navbar-brand" href="index.html">
                    <img src="{{asset('frontend/img/logo.png')}}" width="120" class="d-inline-block align-top position-relative"
                        alt="" />
                </a>
                <hr class="mt-0" />
                <h2>Pendaftaran Tim</h2>
                <form class="mt-2" action="{{ route('daftar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-sm-12 col-md">
                            <div class="form-group">
                                <label for="inputNamaTim">Email</label>
                                <input type="email" class="form-control" id="inputNamaTim"
                                    placeholder="example@mail.com" name="email"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md">
                            <div class="form-group">
                                <label for="inputNamaTim">Asal Institusi</label>
                                <input type="text" class="form-control" id="inputNamaTim"
                                    placeholder="Masukan Nama Institusi" name="asal_instansi" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md">
                            <div class="form-group">
                                <label for="inputNamaTim">Nama Tim</label>
                                <input type="text" class="form-control" id="inputNamaTim"
                                    placeholder="Masukan Nama Tim" name="nama_team" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md">
                            <div class="form-group">
                                <label for="inputNamaKetua">Nama Ketua</label>
                                <input type="text" class="form-control" id="inputNamaKetua"
                                    placeholder="Masukan Nama Ketua" name="nama_ketua" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-12 col-md">
                            <div class="form-group">
                                <label for="inputAnggotaSatu">Anggota Satu</label>
                                <input type="text" class="form-control" id="inputAnggotaSatu"
                                    placeholder="Masukan Nama Anggota" name="anggota_1" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md">
                            <div class="form-group">
                                <label for="inputAnggotaDua">Anggota Dua</label>
                                <input type="text" class="form-control" id="inputAnggotaDua"
                                    placeholder="Masukan Nama Anggota" name="anggota_2" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-12 col-md">
                            <div class="form-group">
                                <label for="inputTingkatan">Tingkatan</label>
                                <select id="inputTingkatan" class="form-control" name="tingkatan">
                                    <option selected>Choose...</option>
                                    <option>SMA/SMK</option>
                                    <option>Universitas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md">
                            <div class="form-group">
                                <label for="inputKategori">Kategori</label>
                                <select id="inputKategori" class="form-control" name="kategori">
                                    <option selected>Choose...</option>
                                    @foreach ($kategori as $lomba)
                                    <option value="{{$lomba->id}}">{{$lomba->nama_kategori}}</option>
                                    @endforeach
                                </select>
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
</body>

</html>
