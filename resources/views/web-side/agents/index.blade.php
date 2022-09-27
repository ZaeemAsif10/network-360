@extends('web-side.setup.master')

@section('content')

    <div id="app">

        <section class="main-homes">
            <div class="bgheadproject hidden-xs" style="background: url('{{ asset('public/assets/images/banner-du-an.jpg') }}')">
                <div class="description">
                    <div class="container-fluid w90">
                        <h1 class="text-center">Agents</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Agents</li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="container-fluid w90 padtop30">
                <div class="rowm10">
                    <div class="container-fluid">
                        <div class="row rowm10 list-agency">

                            @if (count($data['agents']))
                                @foreach ($data['agents'] as $agent)
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="agents-grid">

                                            <div class="agents-grid-wrap">

                                                <div class="fr-grid-thumb">
                                                    <a href="{{ url('view-agent-detail/'.$agent->id) }}">
                                                        <img src="{{ asset('storage/app/public/uploads/agents/'.$agent->image) }}" class="img-fluid mx-auto"
                                                            alt="Cristobal Bartoletti">
                                                    </a>
                                                </div>

                                                <div class="fr-grid-detail">
                                                    <div class="fr-grid-detail-flex">
                                                        <h5 class="fr-can-name">
                                                            <a href="#">{{ $agent->name }}</a>
                                                        </h5>
                                                    </div>
                                                    <div class="fr-grid-detail-flex-right">
                                                        <div class="agent-email"><a href="mailto:john.smith@botble.com"><i
                                                                    class="fa fa-envelope"></i></a></div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="fr-grid-info">
                                                <ul>
                                                    <li><strong>Phone:</strong> {{ $agent->phone }}</li>
                                                    <li><strong>Email:</strong> {{ $agent->email }}</li>
                                                </ul>
                                            </div>

                                            @php
                                                $agent_property = \App\Models\Property::where('agent_id', $agent->id)->count();
                                            @endphp
                                            <div class="fr-grid-footer">
                                                <div class="fr-grid-footer-flex">
                                                    <span class="fr-position"><i class="fa fa-home"></i>{{ $agent_property }} properties</span>
                                                </div>
                                                <div class="fr-grid-footer-flex-right">
                                                    <a href="{{ url('view-agent-detail/'.$agent->id) }}" class="prt-view" tabindex="0">View</a>
                                                </div>
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
        <br>
        <br>
    </div>
@endsection
