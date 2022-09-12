@extends('superadmin-side.setup.master')

@section('content')

    <style>
        #fc {
            margin-bottom: -12px;
        }
    </style>

    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Feature List</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Feature</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Feature List
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
                        <h4 class="text-success h4">Feature List</h4>

                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_feature">Add
                            Feature</button>
                    </div>
                </div>
                <table class="table hover multiple-select-row nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sub Category</th>
                            <th scope="col">Features</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="featureTable">

                    </tbody>
                </table>
            </div>
            <!-- Bordered table End -->

        </div>



        {{-- Add Sub Category Feature Modal Start --}}
        <div class="modal fade" id="add_feature" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Add Feature
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="" method="POST" class="needs-validation" novalidate id="add_feature_form">
                        {{-- @csrf --}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Sub Category</label>
                                <select name="subcate_id" class="form-control" required>
                                    <option value="" selected disabled>Choose</option>
                                    @isset($data['sub_categories'])
                                        @foreach ($data['sub_categories'] as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div class="invalid-feedback">
                                    Please Select Sub Category.
                                </div>
                            </div>

                            <table class="table" id="new_row">
                                <tr>
                                    <td class="border-0">
                                        <div class="form-group" id="fc">
                                            <label>Feature</label>
                                            <input type="text" name="feature[]" class="form-control"
                                                placeholder="Feature" required>
                                            <div class="invalid-feedback">
                                                Please Enter Feature.
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-0">
                                        <button type="button" class="btn btn-success btn-sm add_more"
                                            style="margin-top: 40px;"><i class="icon-copy fi-plus"></i></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-success save_feature">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Add Sub Category Feature Modal End --}}


        {{-- Edit Category Feature Modal Start --}}
        <div class="modal fade" id="edit_feature_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Edit Feature
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="" method="POST" class="needs-validation" novalidate id="edit_feature_form">
                        <input type="hidden" name="feature_id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Sub Category</label>
                                <select name="subcate_id" class="form-control" required>
                                </select>
                                <div class="invalid-feedback">
                                    Please Select Sub Category.
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Feature</label>
                                <input type="text" name="feature" class="form-control" placeholder="Feature"
                                    required>
                                <div class="invalid-feedback">
                                    Please Enter Feature.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-success update_feature">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Edit Category Feature Modal End --}}


    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {

            getSubCategoryFeature();



            // Add New Row
            $('#new_row').on('click', '.add_more', function() {
                var html1 = '';
                html1 += ' <tr class="secondRow">' +
                    '<td class="border-0">' +
                    '<div class="form-group" id="fc">' +
                    '<label>Feature</label>' +
                    '<input type="text" name="feature[]" class="form-control" placeholder="Feature" required>' +
                    '<div class="invalid-feedback">Please Enter Feature.</div>' +
                    '</div>' +
                    '</td>' +
                    '<td class="border-0">' +
                    '<button type="button" class="btn btn-danger btn-sm remove_row" style="margin-top: 40px;"><i class="icon-copy fi-minus"></i></button>' +
                    '</td>' +
                    '</tr>';
                $('#new_row').append(html1);
            });

            // Remove New Row
            $("#new_row").on('click', '.remove_row', function() {

                $(this).closest('tr').remove();
            });

            // Get Sub Category Feature
            function getSubCategoryFeature() {

                $.ajax({

                    url: '{{ url('/get-feature') }}',
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
                                '<td>' + data[i].subcat['name'] + '</td>' +
                                '<td>' + data[i].feature + '</td>' +
                                '<td style="">' +
                                '<div class="table-actions">' +
                                '<a href="#" data-color="#265ed7" style="color: #0b8865;" data="' +
                                data[i].id +
                                '" class="edit_feature"><i class="icon-copy dw dw-edit2"></i></a>' +
                                '<a href="#" data-color="#e95959" style="color: rgb(233, 89, 89);" data="' +
                                data[i].id +
                                '" class="delete_feature"><i class="icon-copy dw dw-delete-3 ml-2"></i></a>' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#featureTable').html(html);

                    },
                    error: function() {
                        toastr.error('something went wrong');
                    }

                });
            }

            //Add Sub Category Feature
            $('#add_feature_form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData($('#add_feature_form')[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ url('store-feature') }}",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.save_feature').text('Saving...');
                        $(".save_feature").prop("disabled", true);
                    },
                    success: function(response) {

                        if (response.status == 200) {

                            // Remove New Row
                            $('.secondRow').remove();
                            toastr.success(response.success);
                            $('.save_feature').text('Save');
                            $(".save_feature").prop("disabled", false);
                            $("#add_feature").modal('hide');
                            $('#add_feature_form')[0].reset();
                            getSubCategoryFeature();

                        }

                        if (response.errors) {
                            $('.save_feature').text('Save');
                            $(".save_feature").prop("disabled", false);
                            toastr.error(response.errors);
                        }
                    },
                    error: function() {
                        $('.save_feature').text('Save');
                        $(".save_feature").prop("disabled", false);
                        toastr.error('something went wrong');
                    },
                });

            });

            //Edit Sub Category Feature
            $('#featureTable').on('click', '.edit_feature', function(e) {
                e.preventDefault();

                $('select[name="subcate_id"]').empty();

                var id = $(this).attr('data');

                $('#edit_feature_modal').modal('show');

                $.ajax({

                    type: 'ajax',
                    method: 'get',
                    url: '{{ url('edit-feature') }}',
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {

                        $('input[name=feature_id]').val(data.feature.id);
                        $.each(data.sub_category, function(key, sub_category) {

                            $('select[name="subcate_id"]')
                                .append(
                                    `<option value="${sub_category.id}" ${sub_category.id == data.feature.subcate_id ? 'selected' : ''}>${sub_category.name}</option>`
                                )
                        });
                        $('input[name=feature]').val(data.feature.feature);
                    },

                    error: function() {

                        toastr.error('something went wrong');

                    }

                });

            });

            //Update Sub Category Feature
            $('.update_feature').on('click', function(e) {
                e.preventDefault();


                let EditFormData = new FormData($('#edit_feature_form')[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ url('update-feature') }}",
                    data: EditFormData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function() {
                        $('.update_feature').text('Saving...');
                        $(".update_feature").prop("disabled", true);
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            $('#edit_feature_modal').modal('hide');
                            $('.update_feature').text('Save changes');
                            $(".update_feature").prop("disabled", false);
                            toastr.success(response.success);
                            getSubCategoryFeature();
                        }

                        if (response.errors) {
                            $('.update_feature').text('Save changes');
                            $(".update_feature").prop("disabled", false);
                            toastr.error(response.errors);
                        }
                    },
                    error: function() {
                        toastr.error('something went wrong');
                        $('.update_feature').text('Save changes');
                        $(".update_feature").prop("disabled", false);
                    }
                });

            });

            // Delete Sub Category Feature
            $('#featureTable').on('click', '.delete_feature', function(e) {
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
                            url: "{{ url('delete-feature') }}",
                            data: {
                                id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: "json",
                            success: function(response) {

                                toastr.success(response.success);
                                getSubCategoryFeature();
                            }
                        });
                    }
                })

            });



        });
    </script>
@endsection
