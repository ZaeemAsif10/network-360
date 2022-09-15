@extends('admin-side.setup.master')

@section('content')

    <main class="pv3 pv4-ns">
        <div class="settings">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="main-dashboard-form">
                            <div class="mb-5">
                                <!-- Title -->
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <h4 class="with-actions">Agent Property Details</h4>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="container mt-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="data:audio/mpeg;base64,{{ $data['agent_details']->cover_image ?? '' }}"
                                                width="65%" alt="">
                                        </div>
                                        <div class="col-md-6">
                                            <video
                                                src="{{ asset('storage/app/public/uploads/property/' . $data['agent_details']->video ?? '') }}"
                                                width="100%" controls>
                                            </video>
                                        </div>
                                    </div>

                                    @if (count($data['agent_details_values']) > 0)
                                        <div class="row mt-5">
                                            <hr>
                                            <h4>Agent Property Values</h4>

                                            <div class="alert alert-dark mt-2" role="alert">
                                                @foreach ($data['agent_details_values'] as $value)
                                                    <span
                                                        class="badge badge-pill badge-success">{{ $value->values ?? '' }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    @if (count($data['agent_details_images']) > 0)
                                        <div class="row mt-4">
                                            <hr>
                                            <h4>Agent Property Images</h4>
                                            @foreach ($data['agent_details_images'] as $image)
                                                <div class="col-md-2 mt-3">
                                                    <img src="{{ asset('storage/app/public/uploads/property/images/' . $image->multi_images ?? '') }}"
                                                        class="img-fluid multi" width="100%" alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                </div>
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
                                    data[i].id + '">' +
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
