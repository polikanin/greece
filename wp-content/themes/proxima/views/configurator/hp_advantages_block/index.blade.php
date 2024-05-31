<div id="{{ $section_id }}"
     class="vp-advantages-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {!! $title !!}
            </h2>
        @endif

        @if($items)
            <div class="vp-items">
                @foreach($items as $item)
                    <div class="vp-item">
                        <div class="vp-item--inner">
                            <div class="vp-item--text">
                                {!! $item['text'] !!}
                            </div>
                            <div class="vp-item--title">
                                {{ $item['value'] }}
                            </div>
                        </div>
                        <div class="vp-item--img">
                            {!! get_image_html($item['image'], 'full') !!}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>