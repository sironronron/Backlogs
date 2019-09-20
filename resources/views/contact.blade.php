@extends('layouts.app')

@section('title', "Contact me!")
@section('description', "Description Here")
@section('keywords', 'Keyword 1, Keyword 2, Keyword 3')
@section('url', ''.Request::url())
@section('type', "website")
@section('image', "https://res.cloudinary.com/dmfivoe4m/image/upload/c_scale,h_196,w_616/v1568905969/JadeEzebb/logo2_ra6osa.png")
@section('imageWidth', "500")
@section('imageHeight', "280")

@section('content')
    
    <section >
        <div class="uk-container uk-background-default uk-padding">
            <h1 class="uk-text-center">Contact Us!</h1>
            <div class="uk-margin-medium-top">
                <div class="uk-flex uk-flex-center">
                    <div class="uk-width-1-2@m">
                        @if(Session::has('success'))
                            <div class="uk-alert-success" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                        
                        <form action="{{ route('contactus.store') }}" method="POST">
                            @csrf
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Name <span class="uk-text-danger">*</span></label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" name="name" id="form-stacked-text" type="text">
                                    <span class="uk-margin-small-top uk-text-danger"><small>{{ $errors->first('name') }}</small></span>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Email <span class="uk-text-danger">*</span></label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" name="email" id="form-stacked-text" type="email">
                                    <span class="uk-margin-small-top uk-text-danger"><small>{{ $errors->first('email') }}</small></span>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Message <span class="uk-text-danger">*</span></label>
                                <div class="uk-form-controls">
                                    <textarea name="message" class="uk-textarea" id="message" cols="30" rows="4"></textarea>
                                    <span class="uk-margin-small-top uk-text-danger"><small>{{ $errors->first('message') }}</small></span>
                                </div>
                            </div>
                            <div class="uk-margin">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                <span class="uk-margin-small-top uk-text-danger"><small>{{ $errors->first('g-recaptcha-response') }}</small></span>
                            </div>
                            <div class="uk-text-center">
                                <button class="uk-button uk-button-pink">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection