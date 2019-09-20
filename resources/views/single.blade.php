@extends('layouts.app')

@section('title', "$post->title")
@section('description', "$post->meta_description")
@section('keywords', "$post->meta_keywords")
@section('url', ''.Request::url())
@section('type', "article")
@section('image', ''.asset('storage/'.$post->image))
@section('imageWidth', "500")
@section('imageHeight', "280")

@section('content')
    
    <section>
        <div class="uk-container uk-background-default uk-padding">
            <div class="header">
                <div class="uk-container uk-container-small">
                    <h4 class="uk-text-muted uk-text-center">{{  date('m.d.y', strtotime($post->created_at)) }}</h4>
                    <h1 class="uk-text-center">{{ $post->title }}</h1>
                    <h3>{{ $post->excerpt }}</h3>
                </div>
            </div>
            <div class="uk-margin-large-top">
                <!-- large image -->
                <div class="uk-container">
                    <div class="uk-position-relative uk-visible-toggle uk-light" data-uk-slideshow="ratio: 7:3; animation: push; min-height: 270;">
                        <ul class="uk-slideshow-items">
                            <li>
                                <img data-src="{{ asset('storage/' . $post->image) }}" style="max-width: 100%; width: 100%; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;" data-uk-img="target: !.uk-slideshow-items" alt="" data-uk-cover>
                            </li>
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-previous="ratio: 1.5" data-uk-slideshow-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-next="ratio: 1.5" data-uk-slideshow-item="next"></a>
                    </div>
                </div>
			<!-- /large image -->
            </div>
            <div class="uk-container uk-container-small">
                <div class="uk-margin-large-top">
                    <div class="uk-text-justify">
                        {!! $post->body !!}
                        <div class="uk-margin-large-top">
                            <h6>Tags: <b>{{ $post->meta_keywords }}</b></h6>
                        </div>
                        <hr>
                        <hr>
                        <div id="disqus_thread"></div>
                        <script>
                            var disqus_config = function () {
                            this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = {{ $post->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://jadeezebb.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
                </div>
            </div>
            <section class="uk-section uk-margin-medium-top">
                <div class="uk-container">
                    <h5 class="uk-text-uppercase">Related Articles</h5>
                    <div class="uk-child-width-expand@m" uk-grid>
                        @foreach ($moreArticles as $item)
                            <div>
                                <a href="{{ route('single', $item->slug) }}">
                                    <div class="uk-card uk-card-default">
                                        <div class="uk-card-body uk-padding">
                                            <h3 class="uk-card-title">{{ $item->title }}</h3>
                                            <p>{{ $item->excerpt }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- BOTTOM BAR -->
    @if ($next != null)
	<div class="uk-section uk-section-xsmall uk-section-default uk-position-bottom uk-position-fixed" style="border-top: 1px solid #f2f2f2">
        <div class="uk-container uk-container-small uk-text-small">
            <div>
                <a href="{{ route('single', $next->slug) }}" class="uk-link-reset"><span data-uk-icon="icon: arrow-right"></span> <strong>Next article</strong>
                <span class="uk-visible@s">- {{ $next->title }}</span></a>
            </div>
        </div>
    </div>
    @endif
    <!-- /BOTTOM BAR -->

@endsection