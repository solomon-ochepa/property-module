<div class="sidebar">
    @if (isset($featuredProperties) and $featuredProperties->count())
        <h4 class="sidebar-title">
            <span class="text">Feature Property</span><span class="shape"></span>
        </h4>

        <div class="sidebar-property-list">
            @forelse ($featuredProperties as $item)
                <div class="sidebar-property">
                    <div class="image">
                        <span class="type">For {{ $item->type }}</span>
                        <a href="{{ route('property.show', ['property' => $item->id]) }}">
                            <img src="{{ $item->media('image')->first()->getUrl() }}" alt="Image">
                        </a>
                    </div>
                    <div class="content">
                        <h5 class="title">
                            <a href="{{ route('property.show', ['property' => $item->id]) }}">{{ $item->title }}</a>
                        </h5>
                        <span class="location">
                            <i class="fa fa-map-marker me-1"></i>
                            {{ $item->address->address }}
                        </span>
                        <span class="price">
                            N {{ number_format($item->price, 2) }}
                            @if ($item->type == 'rent' and $item->duration)
                                <span>Month</span>
                            @endif
                        </span>
                    </div>
                </div>

            @empty
            @endforelse
        </div>

    @endif
</div>
