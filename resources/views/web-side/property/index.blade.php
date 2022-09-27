@extends('web-side.setup.master')

@section('content')
    <div id="app">

        <section class="main-homes pb-3">
            <div class="bgheadproject hidden-xs"
                style="background: url('{{ asset('public/assets/images/banner-du-an.jpg') }}')">
                <div class="description">
                    <div class="container-fluid w90">
                        <h1 class="text-center">Properties</h1>
                        <p class="text-center">Each place is a good choice, it will help you make the right decision, do
                            not miss the opportunity to discover our wonderful properties.</p>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Properties</li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="container-fluid w90 padtop30">
                <div class="projecthome">
                    <form action="#" method="get" id="ajax-filters-form">

                        <div class="search-box">
                            <div class="screen-darken"></div>
                            <div class="search-box-content">
                                <div class="d-md-none bg-primary p-2">
                                    <span class="text-white">Filter</span>
                                    <span class="float-right toggle-filter-offcanvas text-white">
                                        <i class="far fa-times-circle"></i>
                                    </span>
                                </div>
                                <div class="search-box-items">
                                    <div class="row ml-md-0 mr-md-0">
                                        <div class="col-xl-3 col-lg-2 col-md-4 px-1">
                                            <div class="form-group">
                                                <label for="keyword" class="control-label">Keyword</label>
                                                <div class="input-has-icon">
                                                    <input type="text" id="keyword" class="form-control" name="k"
                                                        value="" placeholder="Enter keyword...">
                                                    <i class="far fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 px-1">
                                            <div class="form-group" style="position: relative;">
                                                <input type="hidden" name="city_id">
                                                <label for="location" class="control-label">Location</label>
                                                <div class="location-input" data-url="#" style="position: relative;">
                                                    <div class="input-has-icon">
                                                        <input class="select-city-state form-control" id="location"
                                                            name="location" value="" placeholder="City, State"
                                                            autocomplete="off">
                                                        <i class="far fa-location"></i>
                                                    </div>
                                                    <div class="spinner-icon">

                                                    </div>
                                                    <div class="suggestion">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-2 col-md-4 px-1">
                                            <label for="select-type" class="control-label">Choices</label>
                                            <div class="dropdown mb-2 select-dropdown"
                                                data-text-default="Type, category...">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuChoise" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span>Type, category...</span>
                                                </button>
                                                <div class="dropdown-menu keep-open" style="min-width: 20em"
                                                    aria-labelledby="dropdownMenuChoise">
                                                    <div class="dropdown-item">
                                                        <div class="row">
                                                            <div class="col-6 pr-1">
                                                                <div class="form-group">
                                                                    <label for="select-type"
                                                                        class="control-label">Type</label>
                                                                    <div class="select--arrow">
                                                                        <select name="type" id="select-type"
                                                                            class="form-control">
                                                                            <option value="">-- Select --</option>
                                                                            <option value="sale">Sale
                                                                            </option>
                                                                            <option value="rent">Rent
                                                                            </option>
                                                                        </select>
                                                                        <i class="fas fa-angle-down"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 pl-1">
                                                                <div class="form-group">
                                                                    <label for="select-category"
                                                                        class="control-label">Category</label>
                                                                    <div class="select--arrow">
                                                                        <select name="category_id" id="select-category"
                                                                            class="form-control">
                                                                            <option value="">-- Select --</option>
                                                                            <option value="1"> Apartment</option>
                                                                            <option value="2"> Villa</option>
                                                                            <option value="3"> Condo</option>
                                                                            <option value="4"> House</option>
                                                                            <option value="5"> Land</option>
                                                                            <option value="6"> Commercial property
                                                                            </option>
                                                                        </select>
                                                                        <i class="fas fa-angle-down"></i>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item">
                                                        <div class="row">
                                                            <div class="col-6 pr-1">
                                                                <div class="form-group">
                                                                    <label for="select-bedroom"
                                                                        class="control-label">Bedrooms</label>
                                                                    <div class="select--arrow">
                                                                        <select name="bedroom" id="select-bedroom"
                                                                            class="form-control">
                                                                            <option value="">-- Select --</option>
                                                                            <option value="1">
                                                                                1 room
                                                                            </option>
                                                                            <option value="2">
                                                                                2 rooms
                                                                            </option>
                                                                            <option value="3">
                                                                                3 rooms
                                                                            </option>
                                                                            <option value="4">
                                                                                4 rooms
                                                                            </option>
                                                                            <option value="5">5+ rooms</option>
                                                                        </select>
                                                                        <i class="fas fa-angle-down"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 pl-1">
                                                                <div class="form-group">
                                                                    <label for="select-bathroom"
                                                                        class="control-label">Bathrooms</label>
                                                                    <div class="select--arrow">
                                                                        <select name="bathroom" id="select-bathroom"
                                                                            class="form-control">
                                                                            <option value="">-- Select --</option>
                                                                            <option value="1">
                                                                                1 room
                                                                            </option>
                                                                            <option value="2">
                                                                                2 rooms
                                                                            </option>
                                                                            <option value="3">
                                                                                3 rooms
                                                                            </option>
                                                                            <option value="4">
                                                                                4 rooms
                                                                            </option>
                                                                            <option value="5">5+ rooms</option>
                                                                        </select>
                                                                        <i class="fas fa-angle-down"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item">
                                                        <div class="row">
                                                            <div class="col-6 pr-1">
                                                                <div class="form-group">
                                                                    <label for="select-floor"
                                                                        class="control-label">Floors</label>
                                                                    <div class="select--arrow">
                                                                        <select name="floor" id="select-floor"
                                                                            class="form-control">
                                                                            <option value="">-- Select --</option>
                                                                            <option value="1">
                                                                                1 floor
                                                                            </option>
                                                                            <option value="2">
                                                                                2 floors
                                                                            </option>
                                                                            <option value="3">
                                                                                3 floors
                                                                            </option>
                                                                            <option value="4">
                                                                                4 floors
                                                                            </option>
                                                                            <option value="5">5+ floors</option>
                                                                        </select>
                                                                        <i class="fas fa-angle-down"></i>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-6" style="align-self: flex-end">
                                                                <div class="form-group">
                                                                    <div class="col-xs-auto">
                                                                        <button class="btn btn-primary">OK</button>
                                                                        <button type="button"
                                                                            class="btn btn-primary bg-secondary float-right btn-clear">Clear</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-2 col-md-4 px-1 mb-2">
                                            <label for="select-type" class="control-label">Price range</label>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuPrice" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span>All prices</span>
                                                </button>
                                                <div class="dropdown-menu" style="min-width: 20em;"
                                                    aria-labelledby="dropdownMenuPrice">
                                                    <div class="dropdown-item">
                                                        <div class="form-group min-max-input"
                                                            data-calc="[{&quot;number&quot;:1000000000,&quot;label&quot;:&quot;__value__ billion&quot;},{&quot;number&quot;:1000000,&quot;label&quot;:&quot;__value__ million&quot;},{&quot;number&quot;:1000,&quot;label&quot;:&quot;__value__ thousand&quot;},{&quot;number&quot;:0,&quot;label&quot;:&quot;__value__&quot;}]"
                                                            data-all="All prices">
                                                            <div class="row">
                                                                <div class="col-5 pr-1">
                                                                    <label for="min_price" class="control-label">Price
                                                                        from ($)</label>
                                                                    <input type="number" name="min_price"
                                                                        class="form-control min-input" id="min_price"
                                                                        value="" placeholder="From" min="0"
                                                                        step="1">
                                                                    <span class="position-absolute min-label"></span>
                                                                </div>
                                                                <div class="col-5 px-1">
                                                                    <label for="max_price" class="control-label">Price
                                                                        to ($)</label>
                                                                    <input type="number" name="max_price"
                                                                        class="form-control max-input" id="max_price"
                                                                        value="" placeholder="To" min="0"
                                                                        step="1">
                                                                    <span class="position-absolute max-label"></span>
                                                                </div>
                                                                <div class="col-2 px-0 btn-min-max"
                                                                    style="align-self: flex-end">
                                                                    <button class="btn btn-primary">OK</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 px-1 mb-2">
                                            <label for="select-type" class="control-label">Square range</label>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuSquare" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span>All squares</span>
                                                </button>
                                                <div class="dropdown-menu" style="min-width: 20em;"
                                                    aria-labelledby="dropdownMenuSquare">
                                                    <div class="dropdown-item">
                                                        <div class="form-group min-max-input"
                                                            data-calc="[{&quot;number&quot;:0,&quot;label&quot;:&quot;__value__ m\u00b2&quot;}]"
                                                            data-all="All squares">
                                                            <div class="row">
                                                                <div class="col-5 pr-1">
                                                                    <label for="min_square" class="control-label">Square
                                                                        from</label>
                                                                    <input type="number" name="min_square"
                                                                        class="form-control min-input" id="min_square"
                                                                        value="" placeholder="From" step="10"
                                                                        min="0">
                                                                    <span class="position-absolute min-label"></span>
                                                                </div>
                                                                <div class="col-5 px-1">
                                                                    <label for="max_square" class="control-label">Square
                                                                        to</label>
                                                                    <input type="number" name="max_square"
                                                                        class="form-control max-input" id="max_square"
                                                                        value="" placeholder="To" step="10"
                                                                        min="0">
                                                                    <span class="position-absolute max-label"></span>
                                                                </div>
                                                                <div class="col-2 px-0" style="align-self: flex-end">
                                                                    <span class="btn btn-primary">OK</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul class="list-of-suggetions mt-4">
                                                            <li data-value="0-100">&lt; 100 m²</li>
                                                            <li data-value="100-200">100 m² - 200 m²</li>
                                                            <li data-value="200-300">200 m² - 300 m²</li>
                                                            <li data-value="300-400">300 m² - 400 m²</li>
                                                            <li data-value="400-500">400 m² - 500 m²</li>
                                                            <li data-value="500-0">&gt; 500 m²</li>
                                                            <li data-value="">All squares</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-xl-1 col-md-2 px-1 button-search-wrapper"
                                            style="align-self: flex-end;">
                                            <div class="btn-group text-center w-100 ">
                                                <button type="submit" class="btn btn-primary btn-full">Search</button>
                                                <button type="button"
                                                    class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button class="dropdown-item" type="reset">Reset filters</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row rowm10">
                            <div data-class-full="col-lg-12 full-page-content"
                                data-class-left="col-lg-7 left-page-content" id="properties-list"
                                class="col-lg-12 full-page-content">
                                <div class="shop__sort bg-light p-2 round">
                                    <div class="row">
                                        <div class="col-toggle-filter col-12 col-xs-2 col-sm-2 d-md-none my-1 pr-sm-1">
                                            <div class="toggle-filter-offcanvas bg-light toggle-filter-mobile"><i
                                                    class="fal fa-filter mr-1"></i> <span
                                                    class="toggle-filter-name d-block d-xs-none d-sm-block d-md-block">Filter</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="data-listing mt-2">
                                    <div class="row">

                                        @if (count($data['properties']) > 0)
                                            @foreach ($data['properties'] as $property)
                                                <div class="colm10 property-item">
                                                    <div class="item">
                                                        <div class="blii">
                                                            <div class="img">
                                                                <img class="thumb"
                                                                    src="data:audio/mpeg;base64,{{ $property->cover_image ?? '' }}"
                                                                    alt="No Image">
                                                            </div>
                                                            <a href="{{ url('home-details/' . $property->id) }}"
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
                                                                <li class="h-type"><span>{{ $property->subcategory->name }}</span></li>
                                                                <li class="item-price">{{ number_format($property->price, 2) }}</li>
                                                            </ul>
                                                        </div>

                                                        <div class="description">
                                                            <a href="{{ url('home-details/' . $property->id) }}">
                                                                <h5>{{ $property->name }}</h5>
                                                            </a>
                                                            <p class="threemt bold500">
                                                                <span data-toggle="tooltip" data-placement="top"
                                                                    data-original-title="Number of rooms">
                                                                    <i><img src="{{ asset('public/assets/images/bed.svg') }}"
                                                                            alt="icon"></i> <i class="vti">1</i>
                                                                </span>
                                                                <span data-toggle="tooltip" data-placement="top"
                                                                    data-original-title="Number of rest rooms"> <i><img
                                                                            src="{{ asset('public/assets/images/bath.svg') }}"
                                                                            alt="icon"></i> <i
                                                                        class="vti">1</i></span>
                                                                <span data-toggle="tooltip" data-placement="top"
                                                                    data-original-title="Square"> <i><img
                                                                            src="{{ asset('public/assets/images/area.svg') }}"
                                                                            alt="icon"></i> <i class="vti">33
                                                                        m²</i>
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <br>

                                    <div class="col-sm-12">
                                        <nav class="d-flex justify-content-center pt-3"
                                            aria-label="Page navigation example">

                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
