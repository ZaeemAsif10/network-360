@extends('superadmin-side.setup.master')


@section('content')
    <style>
        .multi {
            height: 22vh;
        }
    </style>

    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Property Details</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('property-list') }}">Property</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Property Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <!-- Bordered table  start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-success h4">Property Details</h4>
                    </div>
                </div>
            </div>
            <!-- Bordered table End -->

            <div class="product-wrap">
                <div class="product-detail-wrap mb-30">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="product-detail-desc pd-20 card-box height-100-p">
                                <h4 class="mb-20 pt-20">Image</h4>
                                <img src="data:audio/mpeg;base64,{{ $data['details']->cover_image ?? '' }}" width="100%"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="product-detail-desc pd-20 card-box height-100-p">
                                <h4 class="mb-20 pt-20">Video</h4>
                                <video src="{{ asset('storage/app/public/uploads/property/' . $data['details']->video ?? '' ) }}"
                                    width="100%" controls>
                                </video>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">

                    <div class="clearfix">
                        <h4 class="text-success h4">Property Values</h4>
                        @if(count($data['details_values']) > 0)
                            @foreach ($data['details_values'] as $value)
                                <span class="badge badge-pill badge-success">{{ $value->values ?? '' }}</span>
                            @endforeach
                        @endif
                    </div>

                </div>

                <div class="pd-20 card-box mb-30">

                    <div class="clearfix mb-20">
                        <h4 class="text-success h4">Property Images</h4>
                        <ul class="row">
                            @isset($data['details_images'])
                                @foreach ($data['details_images'] as $image)
                                    <li class="col-lg-2 col-md-6 col-sm-12 mt-3">
                                        <div class="product-box">
                                            <div class="producct-img">
                                                <img src="{{ asset('storage/app/public/uploads/property/images/' . $image->multi_images ?? '' ) }}"
                                                    class="img-fluid multi" width="100%" alt="">
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {



        });
    </script>
@endsection
