@extends('layouts.app')

@section('title', 'Organizations')

@section('content')
    <div class="container">

        <h1>Local Tech Organizations</h1>

        <div class="row">
            @if($inactiveOrgs->count() == 0)
                <div class="col-md-3"></div>
            @endif
            <div class="col-md-6">
                @foreach ($activeOrgs as $cat_inc => $category)
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-primary">
                            <h2>
                                <div class="pull-right">
                                    {{$category->count()}}
                                </div>
                                {{$category[0]->category->label}}
                            </h2>
                        </li>

                        @foreach($category as $org)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ $org->url}}" target="_blank" title="Homepage">{{ $org->title }}</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{$org->event_calendar_uri }}" target="_blank">Events Site</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    @if($cat_inc < count($activeOrgs))
                        <hr class="hidden"/>
                    @endif
                @endforeach
            </div>

            @if($inactiveOrgs)
            <div class="col-md-6">
                <h2>Inactive Organizations</h2>

                <ul>
                    @foreach ($inactiveOrgs as $org)
                        <li>
                            <a class="" href="{{ $org->url }}" target="_blank">{{ $org->title }}</a>
                            {{ $org->city }}
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <ul>
            <li>This data is sourced from <a href="https://data.openupstate.org" target="_blank">a community-curated REST API</a>.</li>
            <li>To contribute to this project, please connect with <a href="https://codeforgreenville.org" target="_blank">Code For Greenville.</a></li>
            <li>To suggest an addition or update to the data, please submit a <a href="https://data.openupstate.org/contact/suggestions">suggestion</a>.</li>
        </ul>

    </div>
@endsection
