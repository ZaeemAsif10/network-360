@extends('admin-side.setup.master')

@section('content')
    <main class="pv3 pv4-ns">
        <div class="container">
            <div class="alert alert-warning">Please add your credit to create your own posts here:
                <a href="#">Add credit</a>
            </div>
        </div>
        <br>
        <div class="settings">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="main-dashboard-form">
                            <div class="mb-5">
                                <!-- Title -->
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <h4 class="with-actions">Create Agent Property</h4>
                                        <a href="{{ url('agents') }}" class="btn btn-primary" style="float: right; margin-top: -35px;">Property List</a>
                                    </div>
                                </div>

                                <!-- Content -->
                                <form method="POST" action="{{ url('store-agents-property') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Sub Category</label>
                                                <select name="subcat_id" class="form-control" required>
                                                    <option value="" selected disabled>Choose</option>
                                                    @foreach ($data['sub_categories'] as $sub_category)
                                                    <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please Choose Sub Category.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" name="price" class="form-control" placeholder="Enter Price"
                                                    required>
                                                <div class="invalid-feedback">
                                                    Please Enter Price.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select name="property_type" class="form-control" required>
                                                    <option value="" selected disabled>Choose</option>
                                                    <option value="1">Sale</option>
                                                    <option value="2">Buy</option>
                                                    <option value="3">Rent</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please Choose Type.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Cover Image</label>
                                                <input type="file" name="cover_image" class="form-control" id="image-upload" required>
                                                <div class="invalid-feedback">
                                                    Please Choose Cover Image.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Video</label>
                                                <input type="file" name="video" class="form-control" id="video-upload" required>
                                                <div class="invalid-feedback">
                                                    Please Choose Video.
                                                </div>
                                                <div class="text-danger" id="meta"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Images</label>
                                                <input type="file" name="multi_images[]" class="form-control" multiple required
                                                    accept="image/*">
                                                <div class="invalid-feedback">
                                                    Please Choose Multiple Images.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="FeatureSection">

                                        </div>
                                    </div>
                                    <div class="row text-center mt-4">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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

        //Video Upload Validation
        const fileUpload = document.getElementById("video-upload");

        fileUpload.addEventListener("change", event => {
            const resultEl = document.getElementById("meta");
            const file = event.target.files[0];
            const videoEl = document.createElement("video");
            videoEl.src = window.URL.createObjectURL(file);

            // When the video metadata has loaded, check
            // the video width/height
            videoEl.onloadedmetadata = event => {
                resultEl.innerHTML = '';
            }

            // If there's an error, most likely because the file
            // is not a video, display an error.
            videoEl.onerror = () => {
                resultEl.innerHTML = 'Please upload a video file.';
            }
        });



        $('select[name=subcat_id]').change(function() {

            var subcate_id = $('select[name=subcat_id]').val();

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
                                '<input class="form-control" type="hidden" name="subcate_feature_id[]" value="' +
                                data[i].subcate_id + '">' +
                                '<input class="form-control" type="text" name="values[]" placeholder="' +
                                data[i].feature + '"  required>' +
                                '<div class="invalid-feedback">Please Enter Value.</div>' +
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
