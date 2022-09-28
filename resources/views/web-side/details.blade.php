@extends('web-side.setup.master')

@section('content')
    <div id="app">
        <main class="detailproject bg-white">
            <div data-property-id="14"></div>

            <div class="boxsliderdetail">
                <div class="slidetop">
                    <div class="owl-carousel" id="listcarousel">
                        @if (count($data['details_images']) > 0)
                            @foreach ($data['details_images'] as $image)
                                <div class="item">
                                    <img src="{{ asset('storage/app/public/uploads/property/images/' . $image->multi_images) }}"
                                        class="showfullimg">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>

            <div class="container-fluid w90 padtop20">
                <h1 class="titlehouse">{{ $data['details']->name ?? '' }}</h1>
                <p class="pricehouse"> {{ number_format($data['details']->price, 2) }}
                    @if ($data['details']->property_type == 1)
                        <span class="label-success status-label">Selling</span>
                    @elseif($data['details']->property_type == 2)
                        <span class="label-success status-label">Buy</span>
                    @elseif($data['details']->property_type == 3)
                        <span class="label-success status-label">Rent</span>
                    @endif
                </p>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row pt-3">

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="headifhouse">Features</h5>
                                @if (count($data['details_features']) > 0)
                                    <div class="row">
                                        @foreach ($data['details_features'] as $key => $feature)
                                            <div class="col-sm-3">
                                                <p><img src="{{ asset('storage/app/storage/app/public/uploads/icons/' . $feature->icon) }}"
                                                        width="20%" alt="">
                                                    <strong>{{ $feature->feature ?? '' }}</strong></p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="mt-3">
                            <h5 class="headifhouse">Property video</h5>
                            <div class="row justify-content-center">
                                <div class="px-3 position-relative overlay-icon w-100">
                                    <video
                                        src="{{ asset('storage/app/public/uploads/property/' . $data['details']->video ?? '') }}"
                                        width="100%" controls>
                                    </video>

                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="socials mb-3 pb-2 border-bottom w-100">
                            <span>Share this property:</span>
                            <ul>
                                <li>
                                    <a href="#" target="_blank" title="Share on Facebook"><i
                                            class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#" title="Share on Linkedin" target="_blank"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" title="Share on Twitter"><i
                                            class="fab fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="boxright p-3">
                            <div class="head">
                                Contact agency
                            </div>

                            <div class="row rowm10 itemagent">
                                <div class="col-lg-4 colm10">
                                    <a href="http://localhost/FlexHome/public/agents/kameronkovacek">
                                        <img src="http://localhost/FlexHome/public/storage/accounts/1-150x150.jpg"
                                            alt="Cade Lowe" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="col-lg-8 colm10">
                                    <div class="info">
                                        <p>
                                            <strong>
                                                <a href="http://localhost/FlexHome/public/agents/kameronkovacek">Cade
                                                    Lowe</a>
                                            </strong>
                                        </p>
                                        <p class="mobile">+18602354265</p>
                                        <p>rmurazik@hotmail.com</p>
                                        <p><span class="fas fa-arrow-circle-right"></span> <a
                                                href="http://localhost/FlexHome/public/agents/kameronkovacek">More
                                                properties by this agent</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="boxright p-3">
                            <form action="http://localhost/FlexHome/public/send-consult" method="post" id="contact-form"
                                class="generic-form">
                                <input type="hidden" name="_token" value="Eo2iGm2CaeQmv1m1KY79Q2cuItE4Tf4waVwLNydq">
                                <input type="hidden" value="property" name="type">
                                <input type="hidden" value="14" name="data_id">
                                <div class="head">Contact</div>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name *"
                                        data-validation-engine="validate[required]"
                                        data-errormessage-value-missing="Please enter name!">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone *"
                                        data-validation-engine="validate[required]"
                                        data-errormessage-value-missing="Please enter phone number!">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control " placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject *"
                                        value="5 room luxury penthouse for sale in Kuala Lumpur" readonly>
                                </div>
                                <div class="form-group">
                                    <textarea name="content" class="form-control" rows="5" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-orange btn-block">Send</button>
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="alert alert-success text-success text-left" style="display: none;">
                                    <span></span>
                                </div>
                                <div class="alert alert-danger text-danger text-left" style="display: none;">
                                    <span></span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <br>
                <h5 class="headifhouse">Related properties</h5>
                <div class="projecthome mb-3">
                </div>
                <div class="slidebot">
                    <div class="row">
                        <div class="col-12 col-md-12 col-sm-12">
                            <div>
                                <div id="listcarouselthumb" class="owl-carousel owl-loaded owl-drag">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(-1082px, 0px, 0px); transition: all 0.25s ease 0s; width: 2599px;">
                                            @foreach ($data['sub_cates'] as $sub_cate)
                                                <div class="owl-item cloned">


                                                    <div rel="3" class="item cthumb">

                                                        <img src="data:audio/mpeg;base64,{{ $sub_cate->cover_image ?? '' }}"
                                                            rel="3" class="showfullimg">

                                                        <ul class="item-price-wrap hide-on-list">
                                                            <li class="h-type">
                                                                <span>{{ $sub_cate->subcategory->name }}</span>
                                                            </li>
                                                            <li class="item-price">
                                                                {{ number_format($sub_cate->price, 2) }}
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="owl-nav"><button type="button" role="presentation"
                                                class="owl-prev"><i
                                                    class="fas fa-chevron-left ar-prev"></i></button><button
                                                type="button" role="presentation" class="owl-next"><i
                                                    class="fas fa-chevron-right ar-next"></i></button></div>
                                        <div class="owl-dots disabled"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>

        <script id="traffic-popup-map-template" type="text/x-custom-template">
    <div>
    <table width="100%">
        <tr>
            <td width="90">
                <div class="blii"><img src="http://localhost/FlexHome/public/storage/properties/6-2-150x150.jpg" width="80" alt="5 room luxury penthouse for sale in Kuala Lumpur">
                    <div class="status"><span class="label-success status-label">Selling</span></div>
                </div>
            </td>
            <td>
                <div class="infomarker">
                    <h5><a href="http://localhost/FlexHome/public/properties/villa-for-sale-in-lavanya-residences" target="_blank">5 room luxury penthouse for sale in Kuala Lumpur</a></h5>
                    <div class="text-info"><strong>$1.59million </strong></div>
                    <div>Anaheim, California</div>
                    <div>
                        <span>377 m²</span> &nbsp; &nbsp;
                        <span>
                            <i><img src="http://localhost/FlexHome/public/themes/flex-home/images/bed.svg" alt="icon"></i>
                            <i class="vti">5</i></span> &nbsp; &nbsp; <span>
                            <i><img src="http://localhost/FlexHome/public/themes/flex-home/images/bath.svg" alt="icon"></i>
                            <i class="vti">7</i>
                        </span>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>

</script>

    </div>
@endsection
