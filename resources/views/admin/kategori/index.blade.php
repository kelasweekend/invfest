@extends('layouts.admin.index')
@section('title')
    Kategori Lomba
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
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
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
                                            <th>Nama kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama kategori</th>
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
                    <form method="POST" enctype="multipart/form-data" id="laravel-ajax-file-upload"
                        action="javascript:void(0)">
                        <div class="mb-2">
                            <label for="nama_kategori" class="form-label">Title </label>
                            <input type="text" name="nama_kategori" class="form-control" id="nama_kategori"
                                placeholder="E.g IF 07 K" autocomplete="off" required>
                        </div>
                        <div class="mb-2">
                            <label for="pelajaran" class="form-label">Upload Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="file" required>
                                <label class="custom-file-label" for="file">Pilih Image</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="body">Deskripsi singkat</label>
                            <textarea class="form-control" name="deskripsi" id="description" required></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="pelajaran" class="form-label">Upload Rulebook</label>
                            <div class="custom-file">
                                <input type="file" name="rulebook" class="custom-file-input" id="file" required>
                                <label class="custom-file-label" for="file">Pilih rulebook</label>
                            </div>
                        </div>
                        <button class="btn btn-secondary tombol float-right" id="saveBtn" value="create"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="viewmodalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewmodalLabel">Edit Rule Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection


@section('css-tambahan')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('js-tambahan')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('textarea').summernote();
        });
    </script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Page specific script -->
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kategori.index') }}",
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
                        data: 'nama_kategori',
                        name: 'nama_kategori'
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
                $('#modelHeading').html("Buat Kategori");
                $('.tombol').html("Submit");
                $('#ajaxModel').modal('show');
            });

            $('#laravel-ajax-file-upload').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('kategori.store') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        this.reset();
                        Swal.fire({
                            icon: "success",
                            title: "Selamat",
                            text: data.success
                        });
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    },
                    error: function(data) {
                        Swal.fire({
                            icon: "error",
                            title: "Peringatan !",
                            text: data.error
                        });
                    }
                });
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

        $('body').on('click', '.edit', function() {
            console.log($(this).data('url'))
            let url = $(this).data('url')
            $.ajax({
                type: "GET",
                url: `${url}`,
                success: function(data) {
                    $('#viewmodal').find('.modal-body').html(data)
                    $('#viewmodal').modal('show')
                }
            });
        });
    </script>
@endsection
