<div id="vp-advantages-block_{{$index}}"
     class="vp-advantages-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {!! $title !!}
            </h2>
        @endif
        @if($subtitle)
            <h2 class="vp-subtitle">
                {!! $subtitle !!}
            </h2>
        @endif

        @if($items)
            <div class="">
                <horizontal-x3-v2-slider
                        :id="`vp-advantages-block_{{$index}}`"
                        @open-modal="modal.id = $event"
                        :slides="{{ json_encode($items) }}"
                ></horizontal-x3-v2-slider>
            </div>
        @endif
    </div>
</div>