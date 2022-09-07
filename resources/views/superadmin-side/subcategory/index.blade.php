@extends('superadmin-side.setup.master')


@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Sub Category List</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Sub Category</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Sub Category List
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
                        <h4 class="text-success h4">Sub Category List</h4>

                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_sub_cate">Add
                            Sub Category</button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Sub Category</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="subCategoryTable">

                    </tbody>
                </table>
            </div>
            <!-- Bordered table End -->

        </div>



        {{-- Add Sub Category Modal Start --}}
        <div class="modal fade" id="add_sub_cate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Add Sub Category
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="" method="POST" class="needs-validation" novalidate id="add_sub_category_form">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="cate_id" class="form-control" required>
                                    <option value="" selected disabled>Choose</option>
                                    @isset($data['categories'])
                                        @foreach ($data['categories'] as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div class="invalid-feedback">
                                    Please Select Category.
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Sub Category</label>
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
                            <button type="submit" class="btn btn-success save_sub_category">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Add Sub Category Modal End --}}


        {{-- Edit Category Modal Start --}}
        <div class="modal fade" id="edit_sub_cat_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Edit Sub Category
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="" method="POST" class="needs-validation" novalidate id="edit_sub_category_form">
                        <input type="hidden" name="sub_category_id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="cate_id" class="form-control" required>
                                </select>
                                <div class="invalid-feedback">
                                    Please Select Category.
                                </div>
                            </div>
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
                            <button type="submit" class="btn btn-success update_sub_category">
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
    <script>
        $(document).ready(function() {

            getSubCategory();

            // Get Sub Category
            function getSubCategory() {

                $.ajax({

                    url: '{{ url('/get-sub-category') }}',
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
                                '<td>' + data[i].category.name + '</td>' +
                                '<td>' + data[i].name + '</td>' +
                                '<td style="">' +
                                '<div class="table-actions">' +
                                '<a href="#" data-color="#265ed7" style="color: #0b8865;" data="' +
                                data[i].id +
                                '" class="edit_sub_category"><i class="icon-copy dw dw-edit2"></i></a>' +
                                '<a href="#" data-color="#e95959" style="color: rgb(233, 89, 89);" data="' +
                                data[i].id +
                                '" class="delete_sub_category"><i class="icon-copy dw dw-delete-3 ml-2"></i></a>' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                        }


                        $('#subCategoryTable').html(html);

                    },
                    error: function() {
                        toastr.error('something went wrong');
                    }

                });
            }

            //Add Sub Category
            $('#add_sub_category_form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData($('#add_sub_category_form')[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ url('store-sub-category') }}",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.save_sub_category').text('Saving...');
                        $(".save_sub_category").prop("disabled", true);
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            toastr.success(response.message);
                            $('.save_sub_category').text('Save');
                            $(".save_sub_category").prop("disabled", false);
                            $("#add_sub_cate").modal('hide');
                            $('#add_sub_category_form')[0].reset();
                            getSubCategory();
                        }

                        if (response.errors) {
                            $('.save_sub_category').text('Save');
                            $(".save_sub_category").prop("disabled", false);
                            toastr.error(response.errors);
                        }
                    },
                    error: function() {
                        $('.save_sub_category').text('Save');
                        $(".save_sub_category").prop("disabled", false);
                        toastr.error('something went wrong');
                    },
                });

            });

            //Edit Sub Category
            $('#subCategoryTable').on('click', '.edit_sub_category', function(e) {
                e.preventDefault();

                $('select[name="cate_id"]').empty();

                var id = $(this).attr('data');

                $('#edit_sub_cat_modal').modal('show');

                $.ajax({

                    type: 'ajax',
                    method: 'get',
                    url: '{{ url('edit-sub-category') }}',
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {

                        $('input[name=sub_category_id]').val(data.sub_category.id);
                        $.each(data.category, function(key, category) {

                            $('select[name="cate_id"]')
                                .append(
                                    `<option value="${category.id}" ${category.id == data.sub_category.cate_id ? 'selected' : ''}>${category.name}</option>`
                                )
                        });
                        $('input[name=name]').val(data.sub_category.name);
                    },

                    error: function() {

                        toastr.error('something went wrong');

                    }

                });

            });

            //Update Sub Category
            $('.update_sub_category').on('click', function(e) {
                e.preventDefault();


                let EditFormData = new FormData($('#edit_sub_category_form')[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ url('update-sub-category') }}",
                    data: EditFormData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function() {
                        $('.update_sub_category').text('Saving...');
                        $(".update_sub_category").prop("disabled", true);
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            $('#edit_sub_cat_modal').modal('hide');
                            $('.update_sub_category').text('Save changes');
                            $(".update_sub_category").prop("disabled", false);
                            toastr.success(response.message);
                            getSubCategory();
                        }

                        if (response.errors) {
                            $('.update_sub_category').text('Save changes');
                            $(".update_sub_category").prop("disabled", false);
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
            $('#subCategoryTable').on('click', '.delete_sub_category', function(e) {
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
                            url: "{{ url('delete-sub-category') }}",
                            data: {
                                id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: "json",
                            success: function(response) {

                                toastr.success(response.message);
                                getSubCategory();
                            }
                        });
                    }
                })

            });

        });
    </script>
@endsection
