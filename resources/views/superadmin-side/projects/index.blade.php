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
                            <h4>Project List</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('admin/project-list') }}">Project</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Project List
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
                        <h4 class="text-success h4">Project List</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('admin/create-project') }}" class="btn btn-success">Project Add</a>
                    </div>
                </div>

                <table class="table table-bordered" id="projectTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Sub Category</th>
                            <th scope="col">Location</th>
                            <th scope="col">Image</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data['projects']) > 0)
                            @foreach ($data['projects'] as $key => $project)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $project->title ?? '' }}</td>
                                    <td>{{ $project->subcategory->name ?? '' }}</td>
                                    <td>{{ $project->location ?? '' }}</td>
                                    <td>
                                        <img src="{{ asset('storage/app/public/uploads/project/' . $project->image ?? '') }}"
                                            width="15%" alt="">
                                    </td>
                                    <td style="">
                                        <div class="table-actions">
                                            <a href="{{ url('admin/edit-project/' . $project->id) }}" data-color="#265ed7"
                                                style="color: #0b8865;"><i class="icon-copy dw dw-edit2"></i></a>
                                            <a href="#" data="{{ $project->id }}" data-color="#e95959"
                                                style="color: rgb(233, 89, 89);" class="delete_project"><i
                                                    class="icon-copy dw dw-delete-3 ml-2"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        <tr></tr>
                    </tbody>
                </table>

            </div>
            <!-- Bordered table End -->

        </div>


    </div>
@endsection


@section('scripts')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {

            


            // Delete Agent
            $('#projectTable').on('click', '.delete_project', function(e) {
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
                            url: "{{ url('admin/delete-project') }}",
                            data: {
                                id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: "json",
                            success: function(response) {

                                toastr.success(response.message);
                                setTimeout(() => {
                                    window.location.reload();
                                }, 1000);

                            }
                        });
                    }
                })

            });

        });
    </script>
@endsection
