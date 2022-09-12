@extends('superadmin-side.setup.master')


@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Create Property</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('superadmin/create-property') }}">Property</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Create Property
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
                        <h4 class="text-success h4">Create Property</h4>

                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-success">Property List</button>
                    </div>
                </div>

                <form action="{{ url('store-property') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
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
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                                <div class="invalid-feedback">
                                    Please Enter Name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" placeholder="Enter Price" required>
                                <div class="invalid-feedback">
                                    Please Enter Price.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cover Image</label>
                                <input type="file" name="cover_image" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please Choose Cover Image.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Video</label>
                                <input type="file" name="video" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please Choose Video.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="multi_images[]" class="form-control" multiple  required accept="image/*">
                                <div class="invalid-feedback">
                                    Please Choose Multiple Images.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="FeatureSection">

                    </div>

                    <div class="row text-center">
                        <div class="col-md-12">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>

                </form>

            </div>
            <!-- Bordered table End -->

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {


            $('select[name=subcate_id]').change(function() {

                var subcate_id = $('select[name=subcate_id]').val();

                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: '{{ url('get-sub-cate-feature') }}',
                    data: {
                        subcate_id: subcate_id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {

                        var html = '';
                        var i;
                        if (data.length > 0) {
                            for (i = 0; i < data.length; i++) {
                                html += '<div class="col-sm-4">' +
                                    '<div class="form-group">' +
                                    '<label>' + data[i].feature + '</label>' +
                                    '<input class="form-control" type="hidden" name="subcate_id[]" value="' +
                                    data[i].id + '">' +
                                    '<input class="form-control" type="text" name="value[]" placeholder="' +
                                    data[i].feature + '"  required>' +
                                    '<div class="invalid-feedback">Please Enter Value.</div>'+
                                    '</div>' +
                                    '</div>';
                            }
                        }
                        $('#FeatureSection').html(html);
                    },

                    error: function() {
                        toastr.error('Database error');
                    }

                });
            });


        });
    </script>
@endsection
