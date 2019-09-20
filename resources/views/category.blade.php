@extends('layouts.app')

@section('title', "$category->name")
@section('description', "$category->description")
@section('keywords', "$category->name")
@section('url', ''.Request::url())
@section('type', "website")
@section('image', "https://res.cloudinary.com/dmfivoe4m/image/upload/c_scale,h_196,w_616/v1568905969/JadeEzebb/logo2_ra6osa.png")
@section('imageWidth', "500")
@section('imageHeight', "280")

@section('content')

    <section>
        <div class="uk-container uk-background-default uk-padding">
            <h1 class="uk-text-center">{{ $category->name }}</h1>
            <div class="uk-container uk-container-small uk-margin-large-top">
                <h2>Posts</h2>
                <ul>
                    @foreach ($posts as $item)
                        <li class="uk-margin-small-bottom">
                            <a href="{{ route('single', $item->slug) }}">{{ $item->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

@endsection