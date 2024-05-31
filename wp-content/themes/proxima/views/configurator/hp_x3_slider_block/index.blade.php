<div id="{{ $section_id }}"
     class="vp-x3-slider-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {!! $title !!}
            </h2>
        @endif
        <div class="vp-x3-slider-block--head">
            <div class="">

                @if($subtitle)
                    <div class="vp-text">
                        {!! $subtitle !!}
                    </div>
                @endif
            </div>
            @if($text)
                <div class="vp-text vp-hidden-sm">
                    {!! $text !!}
                </div>
            @endif
        </div>
    </div>

    @if($items)
        <swiper
                :modules="modules"
                :slides-per-view="'auto'"
                :centeredSlides="true"
                :loop="true"
                :speed="1000"
                :autoplay="{
                        delay: 2000,
                        pauseOnMouseEnter: true
                    }"
                :pagination="{ clickable: true }"
                :breakpoints="{
          '320': {
            spaceBetween: 0,
            slidesPerView: 1,
          },
          '768': {
            spaceBetween: 24,
            slidesPerView: 2,
          },
          '960': {
            spaceBetween: 24,
            slidesPerView: 3,
          },
          '1280': {
            spaceBetween: 0,
            slidesPerView: 'auto',
          }
      }"
                @slide-change-transition-end="onSlideChange"
                @slide-change-transition-start="start"
        >
            @foreach($items as $item)
                <swiper-slide>
                    <div class="vp-item" data-badge-slide="badge-x3-slider-block">
                        <div class="vp-item--title">
                            {{ $item['title'] }}
                        </div>
                        <div class="vp-item--text">
                            {!! $item['text'] !!}
                        </div>
                    </div>
                </swiper-slide>
            @endforeach
            @foreach($items as $item)
                <swiper-slide>
                    <div class="vp-item" data-badge-slide="badge-x3-slider-block">
                        <div class="vp-item--title">
                            {{ $item['title'] }}
                        </div>
                        <div class="vp-item--text">
                            {!! $item['text'] !!}
                        </div>
                    </div>
                </swiper-slide>
            @endforeach
        </swiper>
    @endif

    <div class="wrapper">
        @if($text)
            <div class="vp-text vp-show-sm">
                {!! $text !!}
            </div>
        @endif
    </div>
</div>