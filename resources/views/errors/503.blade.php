@extends('layouts.maintenance')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
@section('content')

    <section class="uk-section uk-section-small">
        <div class="uk-container uk-padding-large uk-text-center">
            <h1>Sorry! Website under maintenance.</h1>           
        </div>
    </section>

@endsection