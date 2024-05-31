<div id="{{ $section_id }}"
     class="vp-requirements-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {!! $title !!}
            </h2>
        @endif

        <div class="vp-requirements-block--grid">
            <div class="vp-requirements-block--grid-head">
                {{ $first_col_title }}
            </div>
            <div class="vp-requirements-block--grid-head">
                {{ $second_col_title }}
            </div>
            <div class="vp-requirements-block--grid-col">
                <div class="vp-requirements-block--first">
                    @if($first_col)
                        @foreach($first_col as $item)
                            <div class="vp-item">
                                <div class="vp-item--index">
                                    @if($loop->index + 1 < 10)
                                        0
                                    @endif
                                    {{ $loop->index + 1 }}
                                </div>
                                <div class="vp-item--text">
                                    {!! $item['text'] !!}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="vp-requirements-block--grid-col">
                <div class="vp-requirements-block--second">
                    @if($second_col)
                        @foreach($second_col as $item)
                            <div class="vp-item">
                                <div class="vp-item--text">
                                    {!! $item['text'] !!}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

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