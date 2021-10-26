@extends('layouts.admin.index')
@section('title')
    Data Pendaftar
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
                                <button type="button" class="btn btn-primary btn-sm float-right" id="createNewItem"><i
                                        class="fas fa-plus mr-2"></i>Buat Baru</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Invoice</th>
                                            <th>Email Peserta</th>
                                            <th>Nama Team</th>
                                            <th>Status</th>
                                            <th>Tingkatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Invoice</th>
                                            <th>Email Peserta</th>
                                            <th>Nama Team</th>
                                            <th>Status</th>
                                            <th>Tingkatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
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

    {{-- modal buat --}}
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('pendaftaran.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label for="nama_team" class="form-label">Nama Team </label>
                                    <input type="text" name="nama_team" class="form-control" id="nama_team"
                                        placeholder="E.g Aligator" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label for="nama_ketua" class="form-label">Nama Ketua Team</label>
                                    <input type="text" name="nama_ketua" class="form-control" id="nama_ketua"
                                        placeholder="E.g Setiawan" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <div class="form-group">
                                        <label>Tingkatan</label>
                                        <select class="form-control" name="kategori_id">
                                            <option aria-readonly="true">Pilih Tingkatan</option>
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
                                        <label class="custom-file-label" for="customFile">upload</label>
                                    </div>
                                    <button type="button" class="btn btn-secondary add_2 ml-2"><i
                                            class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="anggota_2 mt-2">
                                <p class="text-muted mb-2">Anggota 2</p>
                                <div class="d-flex justify-content-between">
                                    <input type="text" name="anggota_2" class="form-control mr-2" id="anggota_2"
                                        placeholder="E.g Budi skuy" autocomplete="off">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="berkas_anggota_2" id="customFile">
                                        <label class="custom-file-label" for="customFile">upload</label>
                                    </div>
                                    <button type="button" class="btn btn-danger remove_2 ml-2"><i
                                        class="fas fa-times-circle"></i></button>
                                </div>
                            </div>
                            <div class="anggota_3 mt-2">
                                <p class="text-muted mb-2">Anggota 3</p>
                                <div class="d-flex justify-content-between">
                                    <input type="text" name="anggota_3" class="form-control mr-2" id="anggota_3"
                                        placeholder="E.g Budi skuy" autocomplete="off">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="berkas_anggota_3" id="customFile">
                                        <label class="custom-file-label" for="customFile">upload</label>
                                    </div>
                                    <button type="button" class="btn btn-danger remove_3 ml-2"><i
                                        class="fas fa-times-circle"></i></button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-secondary tombol float-right" id="saveBtn" type="submit"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css-tambahan')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('js-tambahan')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Page specific script -->
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
        $(document).ready(function() {
            $('.summernote').summernote();
        });
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('pendaftaran.index') }}",
                pageLength: 5,
                lengthMenu: [5, 10, 20, 50, 100, 200, 500],
                responsive: true,
                lengthChange: true,
                autoWidth: false,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'invoice',
                        name: 'invoice'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'nama_team',
                        name: 'nama_team'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'tingkatan',
                        name: 'tingkatan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
            $('#createNewItem').click(function() {
                $('#saveBtn').val("create-Item");
                $('#Item_id').val('');
                $('#ItemForm').trigger("reset");
                $('#modelHeading').html("Tambah Pendaftar");
                $('.tombol').html("Submit");
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '.deleteItem', function() {

                var Item_id = $(this).data("id");
                var url = $(this).data("url");
                Swal.fire({
                    title: 'Apakah Anda Yakin ?',
                    text: "Anda Akan Menghapus data Ini !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus Segera'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Selamat",
                                        text: response.success
                                    });
                                    $('#ItemForm').trigger("reset");
                                    $('#ajaxModel').modal('hide');
                                    table.draw();
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Mohon Maaf !",
                                        text: response.error
                                    });
                                }
                            },
                            error: function() {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Something went wrong!"
                                });
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection
