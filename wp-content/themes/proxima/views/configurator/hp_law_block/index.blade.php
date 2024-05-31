<div id="{{ $section_id }}"
     class="vp-law-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {!! $title !!}
            </h2>
        @endif

        @if($updates)
            <div class="vp-items">
                @foreach($updates as $item)
                    <div class="vp-item">
                        <div class="vp-item--dot vp-item--dot-top vp-show-sm"></div>
                        <div class="vp-item--dot vp-item--dot-bottom vp-show-sm"></div>
                        <div class="vp-item--container">
                            @if($item['image'])
                                <div class="vp-item--img">
                                    {!! get_image_html($item['image'], 'full') !!}
                                </div>
                            @endif
                        </div>
                        <div class="vp-item--container">
                            @if($item['title'])
                                <div class="vp-item--title">
                                    {!! $item['title'] !!}
                                </div>
                            @endif
                            @if($item['text'])
                                <div class="vp-item--text">
                                    {!! $item['text'] !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>