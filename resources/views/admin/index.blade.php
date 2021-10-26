@extends('layouts.admin.index')
@section('title')
    Admin Dashboard
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
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
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (Session::has('errors'))
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                        @endforeach
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah Pendaftar</span>
                                <span class="info-box-number">{{ $pendaftar }} Team</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah Karya</span>
                                <span class="info-box-number">{{ $karya }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="far fa-clock"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tanggal Penutupan</span>
                                <span class="info-box-number">{{ $web->pengumpulan }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-bookmark"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Kategori Lomba</span>
                                <span class="info-box-number">{{ $kategori }} Item</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>

                {{-- wejangan heula --}}
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Wejangan IT Team</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                Selamat datang di dashboard admin Invfest, Silahkan setting keperluan website sesuai yang
                                ingin dibutuhkan, semua informasi website dapat di ubah melalui panel admin ini.
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <p class="text-danger">Harap mematuhi aturan yang telah ditetapkan system ini.</p>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                {{-- setting web heula --}}
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Setting Web</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <form role="form" action="{{ route('home.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Nama Event">Nama Event</label>
                                                <input type="text" class="form-control" id="Nama Event"
                                                    value="{{ $web->title }}" name="title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="Nama Event">Heading Event</label>
                                                <input type="text" class="form-control" id="Nama Event"
                                                    value="{{ $web->heading }}" name="heading" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Tentang Event</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            name="deskripsi">{{ $web->deskripsi }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Nomor Panitia">Nomor Panitia</label>
                                                <input type="number" class="form-control" id="Nomor Panitia"
                                                    value="{{ $web->nomor }}" name="nomor" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Email_panitia">Email Panitia</label>
                                                <input type="email" class="form-control" id="Email_panitia"
                                                    value="{{ $web->email }}" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pengumpulan">Tanggal Pengumpulan</label>
                                                <input type="date" class="form-control" id="pengumpulan"
                                                    value="{{ $web->pengumpulan }}" name="pengumpulan" required>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <label>Logo Atas</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="logo_atas"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Logo Bawah</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="logo_bawah"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div> --}}
                                    </div>

                                    @if ($web->maintenance == '1')
                                        <div class="form-check mt-3">
                                            <input type="checkbox" checked class="form-check-input" id="maintenance"
                                                name="maintenance">
                                            <label class="form-check-label" for="maintenance">Maintenace Mode</label>
                                        </div>
                                    @else
                                        <div class="form-check mt-3">
                                            <input type="checkbox" class="form-check-input" id="maintenance"
                                                name="maintenance">
                                            <label class="form-check-label" for="maintenance">Maintenace Mode</label>
                                        </div>
                                    @endif
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('css-tambahan')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('js-tambahan')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#exampleFormControlTextarea1').summernote();
        });
    </script>
@endsection
