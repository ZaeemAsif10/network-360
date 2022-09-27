@extends('web-side.setup.master')

@section('content')
    <div id="app">

        <section class="main-homes">
            <div class="bgheadproject hidden-xs"
                style="background: url('{{ asset('public/assets/images/banner-du-an.jpg') }}')">
                <div class="description">
                    <div class="container-fluid w90">
                        <h1 class="text-center">Discover our projects</h1>
                        <p class="text-center">We make the best choices with the hottest and most prestigious projects,
                            please visit the details below to find out more</p>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="http://localhost/FlexHome/public">Home</a></li>
                            <li class="breadcrumb-item active">Projects</li>
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
                                                <div class="location-input"
                                                    data-url="http://localhost/FlexHome/public/ajax/cities"
                                                    style="position: relative;">
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
                                                                    <option value="6"> Commercial property</option>
                                                                </select>
                                                                <i class="fas fa-angle-down"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="dropdown-item">
                                                        <div class="form-group">
                                                            <label for="select-blocks" class="control-label">Number of
                                                                blocks</label>
                                                            <div class="select--arrow">
                                                                <select name="blocks" id="select-blocks"
                                                                    class="form-control">
                                                                    <option value="">-- Select --</option>
                                                                    <option value="1">1 block</option>
                                                                    <option value="2">2 blocks</option>
                                                                    <option value="3">3 blocks</option>
                                                                    <option value="4">4 blocks</option>
                                                                    <option value="5">5+ blocks</option>
                                                                </select>
                                                                <i class="fas fa-angle-down"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item">
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
                                        <div class="col-lg-2 col-md-4 px-1">
                                            <div class="form-group">
                                                <label for="select-floor" class="control-label">Floors</label>
                                                <div class="select--arrow">
                                                    <select name="floor" id="select-floor" class="form-control">
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
                                        <div class="col-lg-2 col-md-4 px-1">
                                            <label for="select-type" class="control-label">Flat range</label>
                                            <div class="dropdown mb-2">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuFlat" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span>All squares</span>
                                                </button>
                                                <div class="dropdown-menu" style="min-width: 20em;"
                                                    aria-labelledby="dropdownMenuFlat">
                                                    <div class="dropdown-item">
                                                        <div class="form-group min-max-input"
                                                            data-calc="[{&quot;number&quot;:0,&quot;label&quot;:&quot;__value__ &quot;}]"
                                                            data-all="All flats">
                                                            <div class="row">
                                                                <div class="col-5 pr-1">
                                                                    <label for="min_flat" class="control-label">Flat
                                                                        from</label>
                                                                    <input type="number" name="min_flat"
                                                                        class="form-control min-input" id="min_flat"
                                                                        value="" placeholder="From" min="0"
                                                                        step="1">
                                                                    <span class="position-absolute min-label"></span>
                                                                </div>
                                                                <div class="col-5 px-1">
                                                                    <label for="max_flat" class="control-label">Flat
                                                                        to</label>
                                                                    <input type="number" name="max_flat"
                                                                        class="form-control max-input" id="max_flat"
                                                                        value="" placeholder="To" min="0"
                                                                        step="1">
                                                                    <span class="position-absolute max-label"></span>
                                                                </div>
                                                                <div class="col-2 px-0" style="align-self: flex-end">
                                                                    <button class="btn btn-primary">OK</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul class="list-of-suggetions mt-4">
                                                            <li data-value="0-20">&lt; 30</li>
                                                            <li data-value="20-50">20 - 50</li>
                                                            <li data-value="50-100">50 - 100</li>
                                                            <li data-value="100-150">100 - 150</li>
                                                            <li data-value="150-200">150 - 200</li>
                                                            <li data-value="200-300">200 - 300</li>
                                                            <li data-value="300-0">&gt; 300</li>
                                                            <li data-value="">All flats</li>
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
                            <div class="col-md-12">
                                <div class="shop__sort bg-light p-2 round">
                                    <div class="row">
                                        <div class="col-toggle-filter col-12 col-xs-2 col-sm-2 d-md-none my-1 pr-sm-1">
                                            <div class="toggle-filter-offcanvas bg-light toggle-filter-mobile">
                                                <i class="fal fa-filter mr-1"></i> <span
                                                    class="toggle-filter-name d-block d-xs-none d-sm-block d-md-block">Filter</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="data-listing mt-2">

                                    <div class="row">

                                        @if (count($data['projects']) > 0)
                                            @foreach ($data['projects'] as $project)
                                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 colm10">
                                                    <div class="item">
                                                        <div class="blii">
                                                            <div class="img"><img class="thumb" src="{{ asset('storage/app/public/uploads/project/'.$project->image ?? '') }}"
                                                                    alt="The Avila Apartments">
                                                            </div>
                                                            <ul class="item-price-wrap hide-on-list">
                                                                <li class="h-type"><span>{{ $project->subcategory->name }}</span></li>
                                                            </ul>
                                                        </div>

                                                        <div class="description">

                                                            <h5>{{ $project->title ?? '' }}</h5>
                                                            <p class="dia_chi"><i class="fas fa-map-marker-alt mr-2"></i>{{ $project->location ?? ''  }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <br>

    </div>
@endsection
