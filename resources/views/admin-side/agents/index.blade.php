@extends('admin-side.setup.master')

@section('content')

    <main class="pv3 pv4-ns">
        <div class="container">
            <div class="alert alert-warning">Please add your credit to create your own posts here:
                <a href="#">Add credit</a>
            </div>
        </div>
        <br>
        <div class="container page-content" style="background: none">
            <div class="table-wrapper">
                
                <div class="portlet light bordered portlet-no-padding">
                    <div class="portlet-title">
                        <div class="caption w-100">
                            <div class="wrapper-action" style="float: right; margin-right: 10px;">
                                <a href="{{ url('create-agents-property') }}" class="btn btn-primary">Create Property</a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive  " style="overflow-x: inherit">
                            <table class="table table-striped table-hover vertical-middle"
                                id="botble-real-estate-tables-account-property-table">
                                <thead>
                                    <tr>
                                        <th title="ID">ID</th>
                                        <th title="Name">Name</th>
                                        <th title="Sub Category">Sub Category</th>
                                        <th title="Price">Price</th>
                                        <th title="Property Type">Property Type</th>
                                        <th title="Status">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($data['agent_properties'])
                                        @foreach ($data['agent_properties'] as $key => $agent_property)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $agent_property->name }}</td>
                                                <td>{{ $agent_property->subcategory->name }}</td>
                                                <td>{{ $agent_property->price }}</td>
                                                <td>
                                                    @if ($agent_property->property_type == 1)
                                                        <span class="badge badge-pill badge-success">Sale</span>
                                                    @elseif($agent_property->property_type == 2)
                                                        <span class="badge badge-pill badge-primary">Buy</span>
                                                    @elseif($agent_property->property_type == 3)
                                                        <span class="badge badge-pill badge-warning">Rent</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($agent_property->status == 0)
                                                        <span class="badge badge-pill badge-danger">UnAvailable</span>
                                                    @elseif($agent_property->status == 1)
                                                        <span class="badge badge-pill badge-success">Available</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // alert('d');
        });
    </script>
@endsection
