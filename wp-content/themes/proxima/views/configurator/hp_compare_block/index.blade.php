<div id="{{ $section_id }}"
     class="vp-compare-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {{ $title }}
            </h2>
        @endif

        @if($items)
            <div class="vp-items">
                @foreach($items as $item)
                    <div class="vp-item">
                        <div class="vp-item--inner">
                            <div class="vp-item--head">
                                {!! get_image_html($item['image'], 'full') !!}
                                <div class="vp-item--quote">
                                    {{ $item['quote'] }}
                                </div>
                                <div class="vp-item--country">
                                    {{ $item['country'] }}
                                </div>
                            </div>
                            <div class="vp-item--price">
                                {{ $item['minimum_price'] }}
                                <span>{{ $item['minimum_price_label'] }}</span>
                            </div>

                            <div class="vp-item--list">
                                @foreach($item['points'] as $point)
                                    <div class="vp-item--list-el">
                                        <div class="vp-item--list-el--icon">
                                            {!! get_image_html($point['icon'], 'full') !!}
                                        </div>
                                        <div class="vp-item--list-el--text">
                                            {{ $point['title'] }}

                                            @if($point['text'])
                                                <span>{{ $point['text'] }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>