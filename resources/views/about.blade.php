@extends('layouts.app')

@section('title', "$page->title")
@section('description', "$page->meta_description")
@section('keywords', "$page->meta_keywords")
@section('url', ''.Request::url())
@section('type', "website")
@section('image', "$page->image")
@section('imageWidth', "500")
@section('imageHeight', "280")

@section('content')

    <section class="uk-section uk-section-small">
        <div class="uk-container uk-padding uk-background-default">
            <h2 class="uk-text-center">{{ $page->title }}</h2>
            <div class="uk-margin-large-top">
                <div class="uk-container uk-container-small">
                    {!! $page->body !!}
                </div>
            </div>
        </div>
    </section>

@endsection