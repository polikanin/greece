<div id="{{ $section_id }}"
     class="vp-vertical-slider-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {{ $title }}
            </h2>
        @endif
        @if($subtitle)
            <p class="vp-text">
                {{ $subtitle }}
            </p>
        @endif
        @if($image)
            <div class="vp-img-container">
                {!! get_image_html($image, 'full') !!}
            </div>
        @endif

        <vertical-slider :slides="{{ json_encode($slider) }}"></vertical-slider>
    </div>
</div>