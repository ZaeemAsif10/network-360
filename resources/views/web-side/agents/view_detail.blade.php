@extends('web-side.setup.master')

@section('content')

    <div id="app">

        <section class="main-homes">
            <div class="bgheadproject hidden-xs"
                style="background: url('{{ asset('public/assets/images/banner-du-an.jpg') }}');">
                <div class="description">
                    <div class="container-fluid w90">
                        <h1 class="text-center">Cristobal Bartoletti</h1>
                        <p class="text-center">ALL RETURNED FROM HIM TO.</p>
                        <ul class="breadcrumb"></ul>
                    </div>
                </div>
            </div>
            <div class="container-fluid w90 padtop30">
                <div class="rowm10">
                    <h5 class="headifhouse">Agent info</h5>
                    <div>
                        <div style="float: left; padding-right: 15px;"><a href="#"><img
                                    src="{{ asset('storage/app/public/uploads/agents/' . $data['details']->image) }}"
                                    alt="Cristobal Bartoletti" class="img-thumbnail" width="220px"></a></div>
                        <div style="float: left;">
                            <h4>Cristobal Bartoletti</h4>
                            <p><strong>Email</strong>: {{ $data['details']->email }}</p>
                            <p><strong>Phone</strong>: {{ $data['details']->phone }}</p>
                            <p><strong>Joined on</strong>: {{ $data['details']->joined_date }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div> <br>
                    <h5 class="headifhouse">Properties by this agent</h5>
                    <div class="projecthome px-2">
                        <div class="row">
                            @if (count($data['pro_by_agents']) > 0)
                                @foreach ($data['pro_by_agents'] as $pro_by_agent)
                                    <div class="col-6 col-sm-6 col-md-3 colm10">
                                        <div data-lat="43.982274" data-long="-76.182356" class="item">
                                            <div class="blii">
                                                <div class="img"><img
                                                        src="data:audio/mpeg;base64,{{ $pro_by_agent->cover_image ?? '' }}"
                                                        alt="Villa for sale at Bermuda Dunes" class="thumb"></div> <a
                                                    href="{{ url('home-details/' . $pro_by_agent->id) }}"
                                                    class="linkdetail"></a>
                                                <div class="status">
                                                    @if ($pro_by_agent->property_type == 1)
                                                        <span class="label-success status-label">Selling</span>
                                                    @elseif($pro_by_agent->property_type == 2)
                                                        <span class="label-success status-label">Buy</span>
                                                    @elseif($pro_by_agent->property_type == 3)
                                                        <span class="label-success status-label">Rent</span>
                                                    @endif
                                                </div>
                                                <ul class="item-price-wrap hide-on-list">
                                                    <li class="h-type">
                                                        <span>{{ $pro_by_agent->subcategory->name ?? '' }}</span>
                                                    </li>
                                                    <li class="item-price">{{ number_format($pro_by_agent->price, 2) }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="description"><a
                                                    href="{{ url('home-details/' . $pro_by_agent->id) }}">
                                                    <h5>{{ $pro_by_agent->name ?? '' }}</h5>
                                                </a>
                                                <p class="threemt bold500"><span data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Number of rooms"><i><img
                                                                src="{{asset('public/assets/images/bed.svg')}}"
                                                                alt="icon"></i> <i class="vti">6</i></span> <span
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Number of rest rooms"><i><img
                                                                src="{{asset('public/assets/images/bath.svg')}}"
                                                                alt="icon"></i> <i class="vti">7</i></span> <span
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Square"><i><img
                                                                src="{{asset('public/assets/images/area.svg')}}"
                                                                alt="icon"></i> <i class="vti">377 m²</i></span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
