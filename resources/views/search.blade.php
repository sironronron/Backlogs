@extends('layouts.app')

@section('title', "Searched for '$search'")

@section('content')
    <section>
        <div class="uk-container uk-background-default uk-padding">
            <div class="uk-container uk-container-small">
                <h1 class="uk-text-center">You searched for '{{ $search }}'</h1>
                <div class="uk-margin-large-top">
                    @if ($searchResults->isEmpty())
                        <h3>Sorry, no results found for the term <b>"{{ $search }}"</b></h3>
                    @else
                        @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                        <h2>{{ ucwords($type) }}</h2>
                        <ul class="list-unstyled">
                            @foreach($modelSearchResults as $searchResult)
                                <li class="uk-margin-small-bottom">
                                    <a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection