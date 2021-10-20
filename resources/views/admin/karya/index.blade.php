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
                                            <th>Invoice</th>
                                            <th>Nama Team</th>
                                            <th>Nama Lomba</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Invoice</th>
                                            <th>Nama Team</th>
                                            <th>Nama Lomba</th>
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
@endsection


@section('css-tambahan')
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
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('karya.index') }}",
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
                        data: 'nama_team',
                        name: 'nama_team'
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
