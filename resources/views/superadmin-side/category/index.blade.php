@extends('superadmin-side.setup.master')


@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection


@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Category List</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Category</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Category List
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <!-- Bordered table  start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-success h4">Category List</h4>

                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Medium-modal">Add
                            Category</button>
                    </div>
                </div>
                <table class="table table-bordered" id="categoryTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- Bordered table End -->

        </div>



        {{-- Add Category Modal Start --}}
        <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Add Category
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="" method="POST" class="needs-validation" novalidate id="add_category_form">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                                <div class="invalid-feedback">
                                    Please Enter Name.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-success save_category">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Add Category Modal End --}}


        {{-- Edit Category Modal Start --}}
        <div class="modal fade" id="edit_cat_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Edit Category
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="" method="POST" class="needs-validation" novalidate id="edit_category_form">
                        <input type="hidden" name="category_id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                                <div class="invalid-feedback">
                                    Please Enter Name.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-success update_category">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Edit Category Modal End --}}


    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {

            getCategory();

            $('#categoryTable').DataTable();

            // Get Category
            function getCategory() {

                $.ajax({

                    url: '{{ url('/get-category') }}',
                    type: 'get',
                    async: false,
                    dataType: 'json',

                    success: function(data) {

                        var html = '';
                        var i;
                        var c = 0;

                        for (i = 0; i < data.length; i++) {

                            c++;
                            html += '<tr> ' +
                                '<th>' + c + '</th>' +
                                '<td>' + data[i].name + '</td>' +
                                '<td style="">' +
                                '<div class="table-actions">' +
                                '<a href="#" data-color="#265ed7" style="color: #0b8865;" data="' +
                                data[i].id +
                                '" class="edit_category"><i class="icon-copy dw dw-edit2"></i></a>' +
                                '<a href="#" data-color="#e95959" style="color: rgb(233, 89, 89);" data="' +
                                data[i].id +
                                '" class="delete_category"><i class="icon-copy dw dw-delete-3 ml-2"></i></a>' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                        }


                        $('tbody').html(html);

                    },
                    error: function() {
                        toastr.error('something went wrong');
                    }

                });
            }

            //Add Category
            $('#add_category_form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData($('#add_category_form')[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ url('store-category') }}",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.save_category').text('Saving...');
                        $(".save_category").prop("disabled", true);
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            toastr.success(response.message);
                            $('.save_category').text('Save');
                            $(".save_category").prop("disabled", false);
                            $("#Medium-modal").modal('hide');
                            $('#add_category_form').find('input').val("");
                            getCategory();
                        }

                        if (response.errors) {
                            $('.save_category').text('Save');
                            $(".save_category").prop("disabled", false);
                            toastr.error(response.errors);
                        }
                    },
                    error: function() {
                        $('.save_category').text('Save');
                        $(".save_category").prop("disabled", false);
                        toastr.error('something went wrong');
                    },
                });

            });

            //Edit Category
            $('#categoryTable').on('click', '.edit_category', function(e) {
                e.preventDefault();

                var id = $(this).attr('data');

                $('#edit_cat_modal').modal('show');

                $.ajax({

                    type: 'ajax',
                    method: 'get',
                    url: '{{ url('edit-category') }}',
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {

                        $('input[name=category_id]').val(data.category.id);
                        $('input[name=name]').val(data.category.name);
                    },

                    error: function() {

                        toastr.error('something went wrong');

                    }

                });

            });

            //Update Category
            $('.update_category').on('click', function(e) {
                e.preventDefault();


                let EditFormData = new FormData($('#edit_category_form')[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ url('update-category') }}",
                    data: EditFormData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function() {
                        $('.update_category').text('Saving...');
                        $(".update_category").prop("disabled", true);
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            $('#edit_cat_modal').modal('hide');
                            $('#edit_category_form').find('input').val("");
                            $('.update_category').text('Save changes');
                            $(".update_category").prop("disabled", false);
                            toastr.success(response.message);
                            getCategory();
                        }

                        if (response.errors) {
                            $('.update_category').text('Save changes');
                            $(".update_category").prop("disabled", false);
                            toastr.error(response.errors);
                        }
                    },
                    error: function() {
                        toastr.error('something went wrong');
                        $('.update_category').text('Save changes');
                        $(".update_category").prop("disabled", false);
                    }
                });

            });

            // Delete Category
            $('#categoryTable').on('click', '.delete_category', function(e) {
                e.preventDefault();

                var id = $(this).attr('data');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to Delete this Data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: "{{ url('delete-category') }}",
                            data: {
                                id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: "json",
                            success: function(response) {

                                toastr.success(response.message);
                                getCategory();
                            }
                        });
                    }
                })

            });

        });
    </script>
@endsection
