@extends('superadmin-side.setup.master')


@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Property List</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('property-list') }}">Property</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Property List
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
                        <h4 class="text-success h4">Property List</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('superadmin/create-property') }}" class="btn btn-success">Property Add</a>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Sub Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Property Type</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="propertyTable">
                        @isset($data['properties'])
                            @foreach ($data['properties'] as $key => $property)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $property->name }}</td>
                                    <td>{{ $property->subcategory->name }}</td>
                                    <td>{{ $property->price }}</td>
                                    <td class="text-center">
                                        @if ($property->property_type == 1)
                                            <span class="badge badge-pill badge-success">Sale</span>
                                        @elseif($property->property_type == 2)
                                            <span class="badge badge-pill badge-primary">Buy</span>
                                        @elseif($property->property_type == 3)
                                            <span class="badge badge-pill badge-warning">Rent</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if ($property->status == 0)
                                            <span class="badge badge-pill badge-danger">UnAvailable</span>
                                        @elseif($property->status == 1)
                                            <span class="badge badge-pill badge-success">Available</span>
                                        @endif
                                    </td>

                                    <td class="child text-center" colspan="6">
                                        <ul data-dtr-index="0" class="dtr-details">
                                            <li data-dtr-index="6" data-dt-row="0" data-dt-column="6"><span class="dtr-data">
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                            href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="{{ url('property-details/'.$property->id) }}"><i class="dw dw-eye"></i>
                                                                View</a>
                                                            <a class="dropdown-item change_status" href="javascript:void(0)" data="{{ $property->id }}"><i
                                                                    class="icon-copy fa fa-circle-o-notch"
                                                                    aria-hidden="true"></i>
                                                                Status Change</a>
                                                        </div>
                                                    </div>
                                                </span></li>
                                        </ul>
                                    </td>

                                </tr>
                            @endforeach
                        @endisset
                        <tr></tr>
                    </tbody>
                </table>

            </div>
            <!-- Bordered table End -->

        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {

            //status update
            $('#propertyTable').on('click', '.change_status', function() {

                var id = $(this).attr('data');

                $.ajax({
                    url: '{{ url('/status-update') }}',
                    type: 'get',
                    async: false,
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        }

                    },
                    error: function() {
                        toastr.error('something went wrong');
                    }

                });

            });

        });
    </script>
@endsection
