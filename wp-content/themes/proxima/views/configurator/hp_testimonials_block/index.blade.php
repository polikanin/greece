<div id="vp-testimonials-block_{{$index}}"
     class="vp-testimonials-block"
>
    <div class="wrapper">
        @if($testimonials)
            <horizontal-x3-slider
                    :id="`vp-testimonials-block_{{$index}}`"
                    :title="`{{ $title }}`"
                    :slides="{{ json_encode($testimonials) }}"></horizontal-x3-slider>
        @endif
    </div>
</div>