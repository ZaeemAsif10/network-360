@extends('web-side.setup.master')

@section('content')

    <div class="home_banner" style="background-image: url(storage/banner/banner.jpg)">
        <div class="topsearch">
            <h1 class="text-center text-white mb-4 banner-text-description">Find your favorite Home
            </h1>
        </div>
    </div>


    <div id="app">
        <div id="ismain-homes">
            <div>
                <div class="padtop70">
                    <div class="box_shadow">
                        <div class="container-fluid w90">
                            <div class="homehouse projecthome">
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Properties For Rent</h2>
                                        <p>Below is a list of properties that are currently up for sale</p>
                                    </div>
                                </div>
                                <div class="row rowm10">
                                    <!---->
                                    <!---->

                                    @if (count($data['properties']) > 0)
                                        @foreach ($data['properties'] as $property)
                                            <div class="col-sm-4 col-md-3 colm10">
                                                <div class="item" data-lat="42.504328" data-long="-76.341293">
                                                    <div class="blii">
                                                        <div class="img">
                                                            <img class="thumb"
                                                                src="data:audio/mpeg;base64,{{ $property->cover_image ?? '' }}"
                                                                alt="5 room luxury penthouse for sale in Kuala Lumpur">
                                                        </div>
                                                        <a href="{{ url('home-details/'.$property->id) }}"
                                                            class="linkdetail"></a>
                                                        <div class="status">
                                                            @if ($property->property_type == 1)
                                                                <span class="label-success status-label">Selling</span>
                                                            @elseif($property->property_type == 2)
                                                                <span class="label-success status-label">Buy</span>
                                                            @elseif($property->property_type == 3)
                                                                <span class="label-success status-label">Rent</span>
                                                            @endif

                                                        </div>
                                                        <ul class="item-price-wrap hide-on-list">
                                                            <li class="h-type">
                                                                <span>{{ $property->subcategory->name }}</span>
                                                            </li>
                                                            <li class="item-price">{{ number_format($property->price, 2) }}
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="description">
                                                        <a href="#" class="text-orange heart add-to-wishlist"
                                                            data-id="14" title="I care about this property!!!"><i
                                                                class="far fa-heart"></i></a>
                                                        <a href="properties/villa-for-sale-in-lavanya-residences">
                                                            <h5>{{ $property->name }}</h5>
                                                            {{-- <p class="dia_chi"><i class="fas fa-map-marker-alt"></i>
                                                                Anaheim,
                                                                California</p> --}}
                                                        </a>
                                                        

                                                        

                                                        
                                                            <p class="threemt bold500">
                                                                <span data-toggle="tooltip" data-placement="top"
                                                                    data-original-title="Number of rooms">
                                                                    <i><img src="{{ asset('public/assets/images/bed.svg') }}"
                                                                            alt="icon"></i> <i
                                                                        class="vti">6</i> </span>
                                                                <span data-toggle="tooltip" data-placement="top"
                                                                    data-original-title="Number of rest rooms"> <i><img
                                                                            src="{{ asset('public/assets/images/bath.svg') }}"
                                                                            alt="icon"></i> <i
                                                                        class="vti">7</i></span>
                                                                <span data-toggle="tooltip" data-placement="top"
                                                                    data-original-title="Square"> <i><img
                                                                            src="{{ asset('public/assets/images/area.svg') }}"
                                                                            alt="icon"></i> <i class="vti">377 m²</i>
                                                                </span>
                                                            </p>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div>
                <div class="box_shadow">
                    <div class="container-fluid w90">
                        <div class="homehouse projecthome">
                            <div class="row">
                                <div class="col-12">
                                    <h2>Properties For Sale</h2>
                                    <p>Below is a list of properties that are currently up for sale</p>
                                </div>
                            </div>
                            <div class="row rowm10">
                                <!---->
                                <!---->
                                <div class="col-sm-4 col-md-3 colm10">
                                    <div class="item" data-lat="42.504328" data-long="-76.341293">
                                        <div class="blii">
                                            <div class="img">
                                                <img class="thumb" src="storage/properties/6-2-410x270.jpg"
                                                    alt="5 room luxury penthouse for sale in Kuala Lumpur">
                                            </div>
                                            <a href="#" class="linkdetail"></a>
                                            <div class="media-count-wrapper">
                                                <div class="media-count">
                                                    <img src="images/media-count.svg" alt="media">
                                                    <span>6</span>
                                                </div>
                                            </div>
                                            <div class="status"><span class="label-success status-label">Selling</span>
                                            </div>
                                            <ul class="item-price-wrap hide-on-list">
                                                <li class="h-type"><span>Land</span></li>
                                                <li class="item-price">$1.59million </li>
                                            </ul>
                                        </div>

                                        <div class="description">
                                            <a href="#" class="text-orange heart add-to-wishlist" data-id="14"
                                                title="I care about this property!!!"><i class="far fa-heart"></i></a>
                                            <a href="#">
                                                <h5>5 room luxury penthouse for sale in Kuala Lumpur</h5>
                                                <p class="dia_chi"><i class="fas fa-map-marker-alt"></i> Anaheim,
                                                    California</p>
                                            </a>
                                            <p class="threemt bold500">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rooms">
                                                    <i><img src="images/bed.svg" alt="icon"></i> <i
                                                        class="vti">5</i>
                                                </span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rest rooms"> <i><img
                                                            src="images/bath.svg" alt="icon"></i> <i
                                                        class="vti">7</i></span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Square"> <i><img src="images/area.svg"
                                                            alt="icon"></i> <i class="vti">377 m²</i> </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 colm10">
                                    <div class="item" data-lat="42.813772" data-long="-76.615855">
                                        <div class="blii">
                                            <div class="img">
                                                <img class="thumb" src="storage/properties/5-2-410x270.jpg"
                                                    alt="Luxury Apartments in Singapore for Sale">
                                            </div>
                                            <a href="#" class="linkdetail"></a>
                                            <div class="media-count-wrapper">
                                                <div class="media-count">
                                                    <img src="images/media-count.svg" alt="media">
                                                    <span>5</span>
                                                </div>
                                            </div>
                                            <div class="status"><span class="label-success status-label">Selling</span>
                                            </div>
                                            <ul class="item-price-wrap hide-on-list">
                                                <li class="h-type"><span>Villa</span></li>
                                                <li class="item-price">$918,000</li>
                                            </ul>
                                        </div>

                                        <div class="description">
                                            <a href="#" class="text-orange heart add-to-wishlist" data-id="13"
                                                title="I care about this property!!!"><i class="far fa-heart"></i></a>
                                            <a href="#">
                                                <h5>Luxury Apartments in Singapore for Sale</h5>
                                                <p class="dia_chi"><i class="fas fa-map-marker-alt"></i> San Francisco,
                                                    California</p>
                                            </a>
                                            <p class="threemt bold500">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rooms">
                                                    <i><img src="images/bed.svg" alt="icon"></i> <i
                                                        class="vti">2</i>
                                                </span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rest rooms"> <i><img
                                                            src="images/bath.svg" alt="icon"></i> <i
                                                        class="vti">2</i></span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Square"> <i><img src="images/area.svg"
                                                            alt="icon"></i> <i class="vti">78 m²</i> </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 colm10">
                                    <div class="item" data-lat="42.812299" data-long="-76.137607">
                                        <div class="blii">
                                            <div class="img">
                                                <img class="thumb" src="storage/properties/79-410x270.jpg"
                                                    alt="Private Estate Magnificent Views">
                                            </div>
                                            <a href="properties/private-estate-magnificent-views" class="linkdetail"></a>
                                            <div class="media-count-wrapper">
                                                <div class="media-count">
                                                    <img src="images/media-count.svg" alt="media">
                                                    <span>7</span>
                                                </div>
                                            </div>
                                            <div class="status"><span class="label-success status-label">Selling</span>
                                            </div>
                                            <ul class="item-price-wrap hide-on-list">
                                                <li class="h-type"><span>Commercial property</span></li>
                                                <li class="item-price">$694,000</li>
                                            </ul>
                                        </div>

                                        <div class="description">
                                            <a href="#" class="text-orange heart add-to-wishlist" data-id="9"
                                                title="I care about this property!!!"><i class="far fa-heart"></i></a>
                                            <a href="#">
                                                <h5>Private Estate Magnificent Views</h5>
                                                <p class="dia_chi"><i class="fas fa-map-marker-alt"></i> San Francisco,
                                                    California</p>
                                            </a>
                                            <p class="threemt bold500">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rooms">
                                                    <i><img src="images/bed.svg" alt="icon"></i> <i
                                                        class="vti">3</i>
                                                </span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rest rooms"> <i><img
                                                            src="images/bath.svg" alt="icon"></i> <i
                                                        class="vti">1</i></span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Square"> <i><img src="images/area.svg"
                                                            alt="icon"></i> <i class="vti">2000 m²</i> </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 colm10">
                                    <div class="item" data-lat="42.928003" data-long="-74.902172">
                                        <div class="blii">
                                            <div class="img">
                                                <img class="thumb" src="storage/properties/24-1-410x270.jpg"
                                                    alt="Osaka Heights Apartment">
                                            </div>
                                            <a href="#" class="linkdetail"></a>
                                            <div class="media-count-wrapper">
                                                <div class="media-count">
                                                    <img src="images/media-count.svg" alt="media">
                                                    <span>4</span>
                                                </div>
                                            </div>
                                            <div class="status"><span class="label-success status-label">Selling</span>
                                            </div>
                                            <ul class="item-price-wrap hide-on-list">
                                                <li class="h-type"><span>Villa</span></li>
                                                <li class="item-price">$150,000</li>
                                            </ul>
                                        </div>

                                        <div class="description">
                                            <a href="#" class="text-orange heart add-to-wishlist" data-id="8"
                                                title="I care about this property!!!"><i class="far fa-heart"></i></a>
                                            <a href="#">
                                                <h5>Osaka Heights Apartment</h5>
                                                <p class="dia_chi"><i class="fas fa-map-marker-alt"></i> San Francisco,
                                                    California</p>
                                            </a>
                                            <p class="threemt bold500">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rooms">
                                                    <i><img src="images/bed.svg" alt="icon"></i> <i
                                                        class="vti">2</i>
                                                </span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rest rooms"> <i><img
                                                            src="images/bath.svg" alt="icon"></i> <i
                                                        class="vti">2</i></span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Square"> <i><img src="images/area.svg"
                                                            alt="icon"></i> <i class="vti">110 m²</i> </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 colm10">
                                    <div class="item" data-lat="43.982274" data-long="-76.182356">
                                        <div class="blii">
                                            <div class="img">
                                                <img class="thumb" src="storage/properties/411-410x270.jpg"
                                                    alt="Villa for sale at Bermuda Dunes">
                                            </div>
                                            <a href="#" class="linkdetail"></a>
                                            <div class="media-count-wrapper">
                                                <div class="media-count">
                                                    <img src="images/media-count.svg" alt="media">
                                                    <span>4</span>
                                                </div>
                                            </div>
                                            <div class="status"><span class="label-success status-label">Selling</span>
                                            </div>
                                            <ul class="item-price-wrap hide-on-list">
                                                <li class="h-type"><span>Condo</span></li>
                                                <li class="item-price">$1.3million </li>
                                            </ul>
                                        </div>

                                        <div class="description">
                                            <a href="#" class="text-orange heart add-to-wishlist" data-id="4"
                                                title="I care about this property!!!"><i class="far fa-heart"></i></a>
                                            <a href="#">
                                                <h5>Villa for sale at Bermuda Dunes</h5>
                                                <p class="dia_chi"><i class="fas fa-map-marker-alt"></i> Alhambra,
                                                    California</p>
                                            </a>
                                            <p class="threemt bold500">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rooms">
                                                    <i><img src="images/bed.svg" alt="icon"></i> <i
                                                        class="vti">4</i>
                                                </span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rest rooms"> <i><img
                                                            src="images/bath.svg" alt="icon"></i> <i
                                                        class="vti">3</i></span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Square"> <i><img src="images/area.svg"
                                                            alt="icon"></i> <i class="vti">480 m²</i> </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 colm10">
                                    <div class="item" data-lat="43.722299" data-long="-75.466082">
                                        <div class="blii">
                                            <div class="img">
                                                <img class="thumb" src="storage/properties/31-410x270.jpg"
                                                    alt="Stunning French Inspired Manor">
                                            </div>
                                            <a href="#" class="linkdetail"></a>
                                            <div class="media-count-wrapper">
                                                <div class="media-count">
                                                    <img src="images/media-count.svg" alt="media">
                                                    <span>6</span>
                                                </div>
                                            </div>
                                            <div class="status"><span class="label-success status-label">Selling</span>
                                            </div>
                                            <ul class="item-price-wrap hide-on-list">
                                                <li class="h-type"><span>Villa</span></li>
                                                <li class="item-price">$1.7million </li>
                                            </ul>
                                        </div>

                                        <div class="description">
                                            <a href="#" class="text-orange heart add-to-wishlist" data-id="3"
                                                title="I care about this property!!!"><i class="far fa-heart"></i></a>
                                            <a href="#">
                                                <h5>Stunning French Inspired Manor</h5>
                                                <p class="dia_chi"><i class="fas fa-map-marker-alt"></i> San Francisco,
                                                    California</p>
                                            </a>
                                            <p class="threemt bold500">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rooms">
                                                    <i><img src="images/bed.svg" alt="icon"></i> <i
                                                        class="vti">4</i>
                                                </span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rest rooms"> <i><img
                                                            src="images/bath.svg" alt="icon"></i> <i
                                                        class="vti">3</i></span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Square"> <i><img src="images/area.svg"
                                                            alt="icon"></i> <i class="vti">450 m²</i> </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 colm10">
                                    <div class="item" data-lat="43.819483" data-long="-76.703637">
                                        <div class="blii">
                                            <div class="img">
                                                <img class="thumb" src="storage/properties/23-410x270.jpg"
                                                    alt="Property For sale , Johannesburg, South Africa">
                                            </div>
                                            <a href="#" class="linkdetail"></a>
                                            <div class="media-count-wrapper">
                                                <div class="media-count">
                                                    <img src="images/media-count.svg" alt="media">
                                                    <span>4</span>
                                                </div>
                                            </div>
                                            <div class="status"><span class="label-success status-label">Selling</span>
                                            </div>
                                            <ul class="item-price-wrap hide-on-list">
                                                <li class="h-type"><span>House</span></li>
                                                <li class="item-price">$800,000</li>
                                            </ul>
                                        </div>

                                        <div class="description">
                                            <a href="#" class="text-orange heart add-to-wishlist" data-id="2"
                                                title="I care about this property!!!"><i class="far fa-heart"></i></a>
                                            <a href="#">
                                                <h5>Property For sale , Johannesburg, South Africa</h5>
                                                <p class="dia_chi"><i class="fas fa-map-marker-alt"></i> Oakland,
                                                    California</p>
                                            </a>
                                            <p class="threemt bold500">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rooms">
                                                    <i><img src="images/bed.svg" alt="icon"></i> <i
                                                        class="vti">4</i>
                                                </span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rest rooms"> <i><img
                                                            src="images/bath.svg" alt="icon"></i> <i
                                                        class="vti">4</i></span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Square"> <i><img src="images/area.svg"
                                                            alt="icon"></i> <i class="vti">800 m²</i> </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 colm10">
                                    <div class="item" data-lat="43.954366" data-long="-76.204832">
                                        <div class="blii">
                                            <div class="img">
                                                <img class="thumb" src="storage/properties/1-410x270.jpg"
                                                    alt="3 Beds Villa Calpe, Alicante">
                                            </div>
                                            <a href="#" class="linkdetail"></a>
                                            <div class="media-count-wrapper">
                                                <div class="media-count">
                                                    <img src="images/media-count.svg" alt="media">
                                                    <span>4</span>
                                                </div>
                                            </div>
                                            <div class="status"><span class="label-success status-label">Selling</span>
                                            </div>
                                            <ul class="item-price-wrap hide-on-list">
                                                <li class="h-type"><span>Villa</span></li>
                                                <li class="item-price">$700,000</li>
                                            </ul>
                                        </div>

                                        <div class="description">
                                            <a href="#" class="text-orange heart add-to-wishlist" data-id="1"
                                                title="I care about this property!!!"><i class="far fa-heart"></i></a>
                                            <a href="#">
                                                <h5>3 Beds Villa Calpe, Alicante</h5>
                                                <p class="dia_chi"><i class="fas fa-map-marker-alt"></i> San Francisco,
                                                    California</p>
                                            </a>
                                            <p class="threemt bold500">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rooms">
                                                    <i><img src="images/bed.svg" alt="icon"></i> <i
                                                        class="vti">3</i>
                                                </span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Number of rest rooms"> <i><img
                                                            src="images/bath.svg" alt="icon"></i> <i
                                                        class="vti">3</i></span>
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Square"> <i><img src="images/area.svg"
                                                            alt="icon"></i> <i class="vti">600 m²</i> </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
    
@endsection
