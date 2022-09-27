@extends('superadmin-side.setup.master')


@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Create Project</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('admin/create-property') }}">Project</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Create Project
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
                        <h4 class="text-success h4">Create Project</h4>

                    </div>
                    <div class="pull-right">
                        <a href="{{ url('admin/project-list') }}" class="btn btn-success">Project List</a>
                    </div>
                </div>

                <form action="{{ url('admin/store-project') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sub Category</label>
                                <select name="subcat_id" class="form-control" required>
                                    <option value="" selected disabled>Choose</option>
                                    @isset($data['sub_categories'])
                                        @foreach ($data['sub_categories'] as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div class="invalid-feedback">
                                    Please Choose Sub Category.
                                </div>
                                @if ($errors->has('subcat_id'))
                                    <span class="text-danger">{{ $errors->first('subcat_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title"
                                    required>
                                <div class="invalid-feedback">
                                    Please Enter Title.
                                </div>
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" name="location" class="form-control" id="location"
                                    placeholder="Enter Location" required>
                                <div class="invalid-feedback">
                                    Please Enter Location.
                                </div>
                                @if ($errors->has('location'))
                                    <span class="text-danger">{{ $errors->first('location') }}</span>
                                @endif
                                <div>
                                    <p>
                                        <input type="hidden" id="lat" name="lat" readonly />
                                    </p>
                                    <p>
                                        <input type="hidden" id="long" name="long" readonly />
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please Choose Image.
                                </div>
                                @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>

                </form>

            </div>
            <!-- Bordered table End -->

        </div>
    </div>
@endsection

@section('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyAY904LGu2DEpfjOloBWBtPof8Zx8e6gyQ&libraries=places">
    </script>

    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                // place variable will have all the information you are looking for.
                document.getElementById("lat").value = place.geometry['location'].lat();
                document.getElementById("long").value = place.geometry['location'].lng();
            });
        }
    </script>
@endsection
