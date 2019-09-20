@extends('layouts.app')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))

@section('content')

    <section class="uk-section uk-section-small">
        <div class="uk-container uk-padding-large uk-text-center">
            <h1>Sorry! Something happened.</h1>
        </div>
    </section>

@endsection