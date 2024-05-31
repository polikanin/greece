<div id="{{ $section_id }}"
     class="vp-linear-slider-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {!! $title !!}
            </h2>
        @endif

        @include('components.button', ['button' => $link, 'iconImg' => 'user-tag'])

        @if($subtitle)
            <h3 class="vp-subtitle">
                {!! $subtitle !!}
            </h3>
        @endif
    </div>

    <div class="vp-linear-slider--container">
        @if($items_left)
            <swiper
                    :modules="modules"
                    :slides-per-view="'auto'"
                    :loop="true"
                    :allow-touch-move="false"
                    :autoplay="{
                        delay: 0,
                        disableOnInteraction: false
                    }"
                    :speed="swiperAutoplaySpeed"
            >
                @foreach($items_left as $item)
                    <swiper-slide>
                        <div class="vp-linear-slide">
                            <div class="vp-linear-slide--img">
                                {!! get_svg_content($item['icon']) !!}
                            </div>
                            <div class="vp-linear-slide--text">
                                {!! $item['text'] !!}
                            </div>
                        </div>
                    </swiper-slide>
                @endforeach
                @foreach($items_left as $item)
                    <swiper-slide>
                        <div class="vp-linear-slide">
                            <div class="vp-linear-slide--img">
                                {!! get_svg_content($item['icon']) !!}
                            </div>
                            <div class="vp-linear-slide--text">
                                {!! $item['text'] !!}
                            </div>
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper>
        @endif
        @if($items_left)
            <swiper
                    dir="rtl"
                    :modules="modules"
                    :slides-per-view="'auto'"
                    :loop="true"
                    :allow-touch-move="false"
                    :autoplay="{
                        delay: 0,
                        disableOnInteraction: false
                    }"
                    :speed="swiperAutoplaySpeed"
            >
                @foreach($items_left as $item)
                    <swiper-slide>
                        <div class="vp-linear-slide">
                            <div class="vp-linear-slide--img">
                                {!! get_svg_content($item['icon']) !!}
                            </div>
                            <div class="vp-linear-slide--text">
                                {!! $item['text'] !!}
                            </div>
                        </div>
                    </swiper-slide>
                @endforeach
                @foreach($items_left as $item)
                    <swiper-slide>
                        <div class="vp-linear-slide">
                            <div class="vp-linear-slide--img">
                                {!! get_svg_content($item['icon']) !!}
                            </div>
                            <div class="vp-linear-slide--text">
                                {!! $item['text'] !!}
                            </div>
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper>
        @endif
    </div>
</div>