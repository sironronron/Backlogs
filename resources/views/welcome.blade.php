@extends('layouts.app')

@section('title', "Welcome to my blog!")
@section('description', "Description Here")
@section('keywords', 'Keyword 1, Keyword 2, Keyword 3')
@section('url', ''.Request::url())
@section('type', "website")
@section('image', "https://res.cloudinary.com/dmfivoe4m/image/upload/c_scale,h_196,w_616/v1568905969/JadeEzebb/logo2_ra6osa.png")
@section('imageWidth', "500")
@section('imageHeight', "280")

@section('content')
    {{-- Main Body  --}}
    <section class="">
        <div class="uk-container uk-background-default uk-padding">
            
            {{-- // Slideshow  --}}
            <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slideshow="animation: push; ">
                <ul class="uk-slideshow-items">
                    @foreach($featuredPosts as $data)
                        <li>
                            <img src="{{ asset('storage/'.$data->thumbnail('medium')) }}" alt="" uk-cover>
                            <div class="uk-position-center uk-position-small uk-text-center uk-background-default uk-padding uk-box-shadow-large">
                                <h2 class="uk-margin-remove">{{ $data->title }}</h2>
                                <a href="{{ route('single', $data->slug) }}" class="uk-button uk-button-link uk-text-secondary uk-margin-small-top">Read More</a>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="uk-light">
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                </div>

            </div>

            {{-- Latest Blogs  --}}
            <div class="uk-margin-large-top">
                <div class="uk-grid" data-ukgrid>
                    <div class="uk-width-2-3@m">
                        @foreach($posts as $post)
                        <div class="uk-margin-medium-bottom">
                            <div class="uk-text-center header">
                                <h4 class="uk-text-muted">{{  date('m.d.y', strtotime($post->created_at)) }}</h4>
                                <h1 class="uk-text-dark uk-margin-medium-bottom uk-text-capitalize"><a href="{{ route('single', $post->slug) }}" class="uk-text-secondary">{{ $post->title }}</a></h1>
                            </div>
                            <div class="image">
                                <img src="{{ asset('storage/'.$post->thumbnail('medium')) }}" alt="">
                            </div>
                            <div class="content uk-margin-medium-top">
                                <h4 style="font-weight: 550">{{ $post->excerpt }}</h4>
                                <div class="uk-text-center uk-margin-large-top">
                                    <a href="{{ route('single', $post->slug) }}" class="uk-button uk-button-pink">READ MORE</a>
                                </div>
                            </div>
                            <hr class="uk-hidden@m">
                            <div class="uk-card uk-card-body uk-background-muted uk-padding-small uk-margin-medium-top uk-visible@m">
                                <div class="uk-flex uk-flex-between">
                                    <div>
                                        <span class="uk-text-uppercase" style="font-size: 11px; letter-spacing: 2px; font-weight: 600; color: #000;">LABELS: {{ $post->category->name }}</span>
                                    </div>
                                    <div>
                                        <span class="uk-text-uppercase" style="font-size: 11px; letter-spacing: 2px; font-weight: 600; color: #000;">
                                            <a href="{{ route('single', $post->slug) }}#disqus_thread">Comment</a>
                                        </span>
                                    </div>
                                    <div>
                                        <span class="uk-text-uppercase" style="font-size: 11px; letter-spacing: 2px; font-weight: 600; color: #000;">
                                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: facebook; ratio: 0.7"></span></a>
                                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: twitter; ratio: 0.7"></span></a>
                                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: instagram; ratio: 0.7"></span></a>
                                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: pinterest; ratio: 0.7"></span></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                    <div class="uk-width-1-3@m">

                        {{-- // Profile  --}}
                        <div class="uk-text-center">
                            <img src="https://s9.postimg.cc/ab94ep2vj/profile2.jpg" class="uk-border-circle uk-align-center" style="width: 250px; height: 250px;" alt="">
                            <h2 class="uk-text-secondary uk-margin-medium-bottom"><b>Welcome!</b></h2>
                            <h4 class="uk-margin-remove-top">
                                This is where you write a short bio about yourself. Let your readers know who you are, where you're from and what your blog is about.
                            </h4>
                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: facebook; ratio: 1.2"></span></a>
                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: twitter; ratio: 1.2"></span></a>
                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: instagram; ratio: 1.2"></span></a>
                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: pinterest; ratio: 1.2"></span></a>
                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: mail; ratio: 1.2"></span></a>
                        </div>

                        {{-- // Featured Post --}}
                        <div class="uk-card uk-card-body uk-background-pink uk-padding-small uk-margin-medium-top uk-text-center">
                            <h5 class="uk-text-uppercase">Popular Posts</h5>
                        </div>
                        <div class="uk-margin-medium-top">
                            <ul class="uk-list">
                                @foreach($popularPosts as $post)
                                    @if ($post->views_count != 0)
                                        <li>
                                            <a href="{{ route('single', $post->slug) }}">{{ $post->title }}</a>
                                            <div class="uk-flex uk-flex-between">
                                                <div>
                                                    <h6>Labels: {{ $post->meta_keywords }}</h6>
                                                </div>
                                            </div>
                                            <hr>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        {{-- // Featured Post --}}
                        <div class="uk-card uk-card-body uk-background-pink uk-padding-small uk-margin-medium-top uk-text-center">
                            <h5 class="uk-text-uppercase">Subscribe to our Newsletter</h5>
                        </div>

                        @if(Session::has('success'))
                            <div class="uk-alert-success" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        @if(Session::has('failure'))
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p>{{ Session::get('failure') }}</p>
                            </div>
                        @endif

                        <form action="{{ route('newsletter.subscribe') }}" method="POST">
                            @csrf
                            <div class="uk-margin">
                                <input type="email" class="uk-input" name="email" placeholder="E-mail Address">
                            </div>
                            <button class="uk-button uk-button-pink">Subscribe</button>
                        </form>


                    </div>
                </div>
            </div>
            <div class="uk-card uk-card-body uk-background-muted uk-text-center uk-padding-small">
                <h6><b>FOLLOW @Unicorrnss</b></h6>
            </div>
        </div>
    </section>

@endsection