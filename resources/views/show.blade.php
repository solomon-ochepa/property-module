<x-guest-layout :$head>
    <div class="page-banner-section section"
        style="background-image: {{ $property->media(['image', 'featured'])->first()->getUrl() }}">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="page-banner-title">{!! $property->title !!}</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('property.index') }}">Properties</a></li>
                        <li class="active">{!! $property->title !!}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div
        class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 order-1 mb-sm-50 mb-xs-50">
                    <div class="row">
                        <div class="single-property col-12">
                            <div class="property-inner">
                                <div class="head mb-3">
                                    <div class="left">
                                        <h1 class="title">{{ $property->title }}</h1>
                                        <span class="location small">
                                            <i class="fa fa-map-marker-alt me-1"></i>
                                            {{ $property->address->address }}
                                        </span>
                                    </div>

                                    <div class="right">
                                        <div class="type-wrap">
                                            <span class="price">NGN
                                                {{ number_format($property->price, 2) }}
                                                @if ($property->type == 'rent' && $property->duration)
                                                    <span>{{ $property->duration }}</span>
                                                @endif
                                            </span>

                                            <span class="type">For {{ $property->type ?? 'sale' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="image mb-4">
                                    <div class="single-property-gallery">
                                        @foreach ($property->media(['image'])->get() as $media)
                                            <div class="item">
                                                <img src="{{ $media->getUrl() }}" alt="Image">
                                            </div>
                                        @endforeach
                                    </div>

                                    @if ($property->media(['image'])->count() > 1)
                                        <div class="single-property-thumb">
                                            @foreach ($property->media(['image'])->get() as $media)
                                                <div class="item">
                                                    <img src="{{ $media->getUrl() }}" alt="Image">
                                                </div>
                                            @endforeach
                                        </div>

                                    @endif
                                </div>

                                <div class="content">
                                    @if ($property->description)
                                        <section class="mb-4">
                                            <h3 class="border-bottom mb-1">About</h3>

                                            {{ $property->description }}
                                        </section>
                                    @endif

                                    @if ($property->attributables)
                                        <section class="mb-4">
                                            <h3 class="border-bottom">Features</h3>
                                            <div class="justify-content-start text-start">
                                                @foreach ($property->attributables as $attributable)
                                                    <span class="btn btn-sm mb-2 rounded-pill">
                                                        @if ($attributable->attribute->icon)
                                                            <i class="{{ $attributable->attribute->icon }} me-2"></i>
                                                        @else
                                                            <i class="fa fa-tag"></i>
                                                        @endif

                                                        @if ($attributable->option->value and !in_array($attributable->option->value, ['true', 'false']))
                                                            {{ $attributable->attribute->name }} &middot;
                                                            {{ $attributable->option->value }}
                                                        @elseif ($attributable->option->value === 'false')
                                                            <del>{{ $attributable->attribute->name }}</del>
                                                            <i class="fa fa-times ms-2"></i>
                                                        @else
                                                            {{ $attributable->attribute->name }}
                                                            <i class="fa fa-check ms-2"></i>
                                                        @endif
                                                    </span>
                                                @endforeach
                                            </div>
                                        </section>
                                    @endif

                                    <div class="row">
                                        {{-- Video --}}
                                        @if ($property->hasMedia('video'))
                                            <div class="col-12 mb-30">
                                                <h3>Video</h3>
                                                <div class="embed-responsive ratio ratio-16x9">
                                                    <iframe class="embed-responsive-item"
                                                        src="{{ $property->media('video')->first()->getUrl() }}"></iframe>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- Location --}}
                                        {{-- <div class="col-12">
                                            <h3>Location</h3>
                                            <div class="embed-responsive ratio ratio-16x9">
                                                <div id="single-property-map" class="embed-responsive-item google-map"
                                                    data-lat="40.740178" data-Long="-74.190194"></div>
                                            </div>
                                        </div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="comment-wrap col-12">
                            {{-- <h3>3 Feedback</h3> --}}

                            {{-- <ul class="comment-list">
                                <li>
                                    <div class="comment">
                                        <div class="image"><img src="/assets/guest/images/review/review-1.jpg"
                                                alt="">
                                        </div>
                                        <div class="content">
                                            <h5>Alvaro Santos</h5>
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <span class="time">10 August, 2022 | 10 Min ago</span>
                                                <a href="#" class="reply">reply</a>
                                            </div>
                                            <div class="decs">
                                                <p>But I must explain to you how all this mistaken idea of
                                                    denouncing pleasure and ising pain borand I will give you a
                                                    complete account of the system</p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="child-comment">
                                        <li>
                                            <div class="comment">
                                                <div class="image"><img src="/assets/guest/images/review/review-2.jpg"
                                                        alt="">
                                                </div>
                                                <div class="content">
                                                    <h5>Silvia Anderson</h5>
                                                    <div class="d-flex flex-wrap justify-content-between">
                                                        <span class="time">10 August, 2022 | 25 Min ago</span>
                                                        <a href="#" class="reply">reply</a>
                                                    </div>
                                                    <div class="decs">
                                                        <p>But I must explain to you how all this mistaken idea
                                                            of denouncing pleasure and ising pain borand I will
                                                            give you a complete account of the system</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="comment">
                                        <div class="image"><img src="/assets/guest/images/review/review-3.jpg"
                                                alt="">
                                        </div>
                                        <div class="content">
                                            <h5>Nicolus Christopher</h5>
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <span class="time">10 August, 2022 | 35 Min ago</span>
                                                <a href="#" class="reply">reply</a>
                                            </div>
                                            <div class="decs">
                                                <p>But I must explain to you how all this mistaken idea of
                                                    denouncing pleasure and ising pain borand I will give you a
                                                    complete account of the system</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul> --}}

                            <h3>Leave a Feedback</h3>

                            <div class="comment-form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-30">
                                            <input disabled type="text" placeholder="Name">
                                        </div>
                                        <div class="col-md-6 col-12 mb-30">
                                            <input disabled type="email" placeholder="Email">
                                        </div>
                                        <div class="col-12 mb-30">
                                            <textarea disabled placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button disabled class="btn">send now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 order-2 pl-30 pl-sm-15 pl-xs-15">
                    {{-- <div class="sidebar">
                        <h4 class="sidebar-title">
                            <span class="text">Search Property</span><span class="shape"></span>
                        </h4>

                        <div class="property-search sidebar-property-search">
                            <form action="#">
                                <div>
                                    <input type="text" placeholder="Location">
                                </div>

                                <div>
                                    <select class="nice-select">
                                        <option>All Cities</option>
                                        <option>Athina</option>
                                        <option>Austin</option>
                                        <option>Baytown</option>
                                        <option>Brampton</option>
                                        <option>Cedar Hill</option>
                                        <option>Chester</option>
                                        <option>Chicago</option>
                                        <option>Coleman</option>
                                        <option>Corpus Christi</option>
                                        <option>Dallas</option>
                                        <option>distrito federal</option>
                                        <option>Fayetteville</option>
                                        <option>Galveston</option>
                                        <option>Jersey City</option>
                                        <option>Los Angeles</option>
                                        <option>Midland</option>
                                        <option>New York</option>
                                        <option>Odessa</option>
                                        <option>Reno</option>
                                        <option>San Angelo</option>
                                        <option>San Antonio</option>
                                    </select>
                                </div>

                                <div>
                                    <select class="nice-select">
                                        <option>For Rent</option>
                                        <option>For Sale</option>
                                    </select>
                                </div>

                                <div>
                                    <select class="nice-select">
                                        <option>Type</option>
                                        <option>Apartment</option>
                                        <option>Cafe</option>
                                        <option>House</option>
                                        <option>Restaurant</option>
                                        <option>Store</option>
                                        <option>Villa</option>
                                    </select>
                                </div>

                                <div>
                                    <select class="nice-select">
                                        <option>Bedrooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                </div>

                                <div>
                                    <select class="nice-select">
                                        <option>Bathrooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                </div>

                                <div>
                                    <div id="search-price-range"></div>
                                </div>

                                <div>
                                    <button>search</button>
                                </div>

                            </form>
                        </div>
                    </div> --}}

                    {{-- <livewire:property::sidebar.top-agents :property="$property" /> --}}
                    <livewire:property::sidebar.featured-properties :property="$property" />
                    <livewire:property::sidebar.tags :property="$property" />
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
