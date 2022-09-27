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
                            <h4>Agents List</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Agent</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Agents List
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
                        <h4 class="text-success h4">Agents List</h4>

                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_agent">Add
                            Agent</button>
                    </div>
                </div>
                <table class="table table-bordered" id="agentTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Joinded Date</th>
                            <th scope="col">Image</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- Bordered table End -->

        </div>



        {{-- Add add_agent Modal Start --}}
        <div class="modal fade" id="add_agent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Add Agent
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="" method="POST" class="needs-validation" novalidate id="add_agent_form">
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                        <div class="invalid-feedback">
                                            Please Enter Name.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                                        <div class="invalid-feedback">
                                            Please Enter Email.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Phone" required>
                                        <div class="invalid-feedback">
                                            Please Enter Phone.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Joined Date</label>
                                        <input type="date" name="joined_date" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please Enter Joined Date.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please Enter Image.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-success save_agent">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Add Category Modal End --}}


        {{-- Edit Category Modal Start --}}
        <div class="modal fade" id="edit_agent_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Edit Agent
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="" method="POST" class="needs-validation" novalidate id="edit_agent_form">
                        <input type="hidden" name="edit_agent_id">
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                        <div class="invalid-feedback">
                                            Please Enter Name.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                                        <div class="invalid-feedback">
                                            Please Enter Email.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Phone" required>
                                        <div class="invalid-feedback">
                                            Please Enter Phone.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Joined Date</label>
                                        <input type="date" name="joined_date" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please Enter Joined Date.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control">
                                        <div class="invalid-feedback">
                                            Please Choose Image.
                                        </div>
                                        <span id="store_image"></span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-success update_agent">
                                Save Changes
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

            getAgent();

            $('#agentTable').DataTable();

            // Get Agent
            function getAgent() {

                $.ajax({

                    url: '{{ url('/get-agent') }}',
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
                                '<td>' + data[i].email + '</td>' +
                                '<td>' + data[i].phone + '</td>' +
                                '<td>' + data[i].joined_date + '</td>' +
                                '<td><img src="{{ asset('storage/app/public/uploads/agents/') }}/' +
                                data[i].image +
                                '" width="80px" height="80px" ></td>' +
                                '<td style="">' +
                                '<div class="table-actions">' +
                                '<a href="#" data-color="#265ed7" style="color: #0b8865;" data="' +
                                data[i].id +
                                '" class="edit_agent"><i class="icon-copy dw dw-edit2"></i></a>' +
                                '<a href="#" data-color="#e95959" style="color: rgb(233, 89, 89);" data="' +
                                data[i].id +
                                '" class="delete_agent"><i class="icon-copy dw dw-delete-3 ml-2"></i></a>' +
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

            //Add Agent
            $('#add_agent_form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData($('#add_agent_form')[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ url('store-agent') }}",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.save_agent').text('Saving...');
                        $(".save_agent").prop("disabled", true);
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            toastr.success(response.message);
                            $('.save_agent').text('Save');
                            $(".save_agent").prop("disabled", false);
                            $("#add_agent").modal('hide');
                            $('#add_agent_form').find('input').val("");
                            getAgent();
                        }

                        if (response.errors) {
                            $('.save_agent').text('Save');
                            $(".save_agent").prop("disabled", false);
                            toastr.error(response.errors);
                        }
                    },
                    error: function() {
                        $('.save_agent').text('Save');
                        $(".save_agent").prop("disabled", false);
                        toastr.error('something went wrong');
                    },
                });

            });

            //Edit Agent
            $('#agentTable').on('click', '.edit_agent', function(e) {
                e.preventDefault();

                var id = $(this).attr('data');

                $('#edit_agent_modal').modal('show');

                $.ajax({

                    type: 'ajax',
                    method: 'get',
                    url: '{{ url('edit-agent') }}',
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {

                        $('input[name=edit_agent_id]').val(data.agent.id);
                        $('input[name=name]').val(data.agent.name);
                        $('input[name=email]').val(data.agent.email);
                        $('input[name=phone]').val(data.agent.phone);
                        $('input[name=joined_date]').val(data.agent.joined_date);

                        //Edit image using ajax...
                        $('#store_image').html(
                            '<img src="{{ asset('storage/app/public/uploads/agents/') }}/' +
                            data.agent.image + '" class="mt-4 ml-4" width="60px" height="70px" />'
                            );
                        $('#store_image').append(
                            '<input type="hidden" name="hidden_image" value="' + data.agent.image + '" />');

                    },

                    error: function() {

                        toastr.error('something went wrong');

                    }

                });

            });

            //Update Agent
            $('.update_agent').on('click', function(e) {
                e.preventDefault();


                let EditFormData = new FormData($('#edit_agent_form')[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ url('update-agent') }}",
                    data: EditFormData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function() {
                        $('.update_agent').text('Saving...');
                        $(".update_agent").prop("disabled", true);
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            $('#edit_agent_modal').modal('hide');
                            $('#edit_agent_form').find('input').val("");
                            $('.update_agent').text('Save changes');
                            $(".update_agent").prop("disabled", false);
                            toastr.success(response.message);
                            getAgent();
                        }

                        if (response.errors) {
                            $('.update_agent').text('Save changes');
                            $(".update_agent").prop("disabled", false);
                            toastr.error(response.errors);
                        }
                    },
                    error: function() {
                        toastr.error('something went wrong');
                        $('.update_agent').text('Save changes');
                        $(".update_agent").prop("disabled", false);
                    }
                });

            });

            // Delete Agent
            $('#agentTable').on('click', '.delete_agent', function(e) {
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
                            url: "{{ url('delete-agent') }}",
                            data: {
                                id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: "json",
                            success: function(response) {

                                toastr.success(response.message);
                                getAgent();

                            }
                        });
                    }
                })

            });

        });
    </script>
@endsection
