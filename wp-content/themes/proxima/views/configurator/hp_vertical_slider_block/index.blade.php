<div id="{{ $section_id }}"
     class="vp-vertical-slider-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {!! $title !!}
            </h2>
        @endif
        @if($subtitle)
            <p class="vp-text">
                {!! $subtitle !!}
            </p>
        @endif
        <div class="vp-vertical-slider-block--wrapper">
            @if($image)
                <div class="vp-img-container vp-hidden-sm">
                    {!! get_image_html($image, 'full') !!}
                </div>
            @endif
            @if($slider)
                <div class="vp-container">
                    <div class="vp-vertical-slider-block--preview">
                        <div class="vp-vertical-slider-block--preview-progress"><span></span></div>
                        <div class="vp-vertical-slider-block--preview-items">
                            @foreach($slider as $slide)
                                <div class="vp-vertical-slide--btn"
                                     @if($loop->index > 0) data-animated-btn @endif
                                >
                                    <div class="vp-vertical-slide--btn-index">
                                        @if($loop->index + 1 < 10)
                                            0{{ $loop->index + 1 }}
                                        @else
                                            {{ $loop->index + 1 }}
                                        @endif
                                    </div>
                                    {{ $slide['title'] }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="vp-vertical-slider-block--swiper">
                        @foreach($slider as $slide)
                            <div class="vp-vertical-slide" @if($loop->index > 0) data-animated-slide @endif>
                                <div class="vp-vertical-slide--img">
                                    <img src="{{ $slide['image'] }}" alt="">
                                </div>
                                <div class="vp-vertical-slide--block">
                                    <div class="vp-vertical-slide--title">
                                        {{ $slide['title'] }}
                                    </div>
                                    <div class="vp-vertical-slide--text">
                                        {{ $slide['text'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>