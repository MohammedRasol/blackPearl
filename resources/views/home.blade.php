@extends('layouts.app')
@section('title')
    Home
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
                            @foreach ($categories as $item)
                                <li><a href="{{ 'category/' . $item->id }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">

                                <input type="text" placeholder="What are you looking for?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>704-768-7449</h5>
                                <span>24/7 Support</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{ asset('img/hero/banner.jpg') }}">
                        <div class="hero__text">
                            <span>FRESH FRUIT</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section END -->

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($categories as $item)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg"
                                data-setbg="{{ asset('img/product/details/' . $item->logo) }}">
                                <h5><a href="#">{{ $item->name }}</a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section END -->

    <!-- Featured Section -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Products</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li data-filter="*" class="active">All
                            </li>
                            @foreach ($categories as $item)
                                <li data-filter=".{{ $item->name }}">{{ $item->name }}
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row featured__filter">
                <!-- 8 items/products -->
                @foreach ($categories as $item)
                    @if ($item->sub_category != '')
                        @foreach ($item->sub_category as $subCat)
                            @foreach ($subCat->products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 mix  {{ $item->name }}  {{ $product->name }}">
                                    <div class="featured__item">
                                        <div class="featured__item__pic set-bg"
                                            data-setbg="{{ asset('img/product/logo/' . $product->logo) }}">
                                            <ul class="featured__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="featured__item__text">
                                            <h6><a href="#">{{ $product->name }}</a></h6>
                                            <h5>${{ $product->price }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endif
                @endforeach


            </div>
        </div>
    </section>
    <!-- Featured Section END -->

    <!-- Banner -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('img/banner/banner-1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('img/banner/banner-2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner END -->

    <!-- Latest/Top Rated/Review Products Section -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <!-- Latest Products -->
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($specialProduct as $key => $item)
                                @foreach ($item->products as $product)
                                    @if ($key % 3 == 0 && $key != '')
                                        <div class="latest-prdouct__slider__item">
                                    @endif

                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('img/product/logo/' . $product->logo) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>2</h6>
                                            <span>${{ $product->price }}</span>
                                        </div>
                                    </a>

                                    @if ($key % 3 == 0 && $key != '')
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <!-- Top Rated Products -->
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-product__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>1</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>2</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('img/latest-product/lp-3.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>3</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>4</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>5</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('img/latest-product/lp-3.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>6</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <!-- Review Products -->
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-product__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>1</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>2</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('img/latest-product/lp-3.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>3</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>4</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>5</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('img/latest-product/lp-3.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>6</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Latest/Top Rated/Review Products Section END -->

    <!-- Blog Section -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('img/blog/blog-1.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('img/blog/blog-2.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('img/blog/blog-2.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section END -->
@endsection
