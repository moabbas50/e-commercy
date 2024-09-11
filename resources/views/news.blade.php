@extends('layout.master')

@section('content')
    <div class="latest-news pt-150 pb-150">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> News</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($news as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-news">
                            <a href="single-news.html">
                                <div class="latest-news-bg news-bg-1"></div>
                            </a>
                            <div class="news-text-box">
                                <h3>{{ $item->title }}</h3>
                                <p class="blog-meta">
                                    <span class="date"><i class="fas fa-calendar"></i>{{ $item->created_at }}</span>
                                </p>
                                <p class="excerpt">{{ $item->content }}</p>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            {{-- <div class="row">
            <div class="col-lg-12 text-center">
                <a href="news.html" class="boxed-btn">More News</a>
            </div>
        </div> --}}
        </div>
    </div>
@endsection
