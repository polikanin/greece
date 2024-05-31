<div id="{{ $section_id }}"
     class="vp-fund-block"
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
        <div class="vp-fund-block--head">
            @if($link)
                <vp-button @click.prevent="modal.id = '{{ $link['url'] }}'">
                    <vp-icon type="subtitle"></vp-icon>
                    <span class="vp-btn--text">{{ $link['title'] }}</span>
                </vp-button>
            @endif

            <div class="vp-fund-block--ctrl vp-hidden-sm">
                <div class="vp-swiper-button-prev swiper-button-disabled">
                    <svg class="vp-icon">
                        <use xlink:href="/wp-content/themes/proxima/assets/images/sprite.svg#arrow-left"></use>
                    </svg>
                </div>
                <div id="vp-swiper-pagination" class="vp-swiper-pagination"></div>
                <div class="vp-swiper-button-next">
                    <svg class="vp-icon">
                        <use xlink:href="/wp-content/themes/proxima/assets/images/sprite.svg#arrow-right"></use>
                    </svg>
                </div>
            </div>
        </div>

        @if($slider)
                <swiper
                        class="vp-hidden-sm"
                        :modules="modules"
                        :slides-per-view="'auto'"
                        :space-between="24"
                        :navigation="{
        nextEl: '.vp-swiper-button-next',
        prevEl: '.vp-swiper-button-prev',
      }"
                        :pagination="{
              type: 'fraction',
              el: '#vp-swiper-pagination',
                clickable: true,
            }"
                >
                    @foreach($slider as $item)
                        <swiper-slide>
                            <div class="vp-fund-slide">
                                <div class="vp-fund-slide--body">
                                    <div class="vp-fund-slide--label">
                                        <span>
                                            <span class="vp-show-sm"> {{ $label }}</span> #{{ $loop->index+1 }}
                                        </span>
                                    </div>
                                    <div class="vp-fund-slide--subtitle">
                                        {!! $item['subtitle'] !!}
                                    </div>
                                    <div class="vp-fund-slide--text">
                                        {!! $item['text'] !!}
                                    </div>
                                    @if($item['points'])
                                        <div class="vp-fund-slide--items">
                                            @foreach($item['points'] as $point)
                                                <div class="vp-fund-slide--item">
                                                    <div class="vp-fund-slide--item-title">
                                                        {!! $point['title'] !!}
                                                    </div>
                                                    <div class="vp-fund-slide--item-value">
                                                        {!! $point['value'] !!}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="vp-fund-slide--head">

                                    <div class="vp-fund-slide--title">
                                        {!! $item['title'] !!}
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                    @endforeach
                </swiper>

                <div class="vp-items vp-show-sm" :class="{active: isShowMore}">
                    @foreach($slider as $item)
                        <vp-accordion class="vp-item">
                            <template #head>
                                <div class="vp-item--head">
                                    <div class="vp-item--title">
                                         <span>
                                            {{ $label }} <span class="vp-show-sm"> {{ $sm_label }}</span> #{{ $loop->index+1 }}
                                        </span>
                                        <vp-icon type="arrow-down"></vp-icon>
                                    </div>
                                </div>
                            </template>

                            <template #body>
                                <div class="vp-item--body">
                                    <div class="vp-fund-slide--title">
                                        {!! $item['title'] !!}
                                    </div>

                                    <div class="vp-fund-slide--body">
                                        <div class="vp-fund-slide--subtitle">
                                            {!! $item['subtitle'] !!}
                                        </div>
                                        <div class="vp-fund-slide--text">
                                            {!! $item['text'] !!}
                                        </div>
                                        @if($item['points'])
                                            <div class="vp-fund-slide--items">
                                                @foreach($item['points'] as $point)
                                                    <div class="vp-fund-slide--item">
                                                        <div class="vp-fund-slide--item-title">
                                                            {!! $point['title'] !!}
                                                        </div>
                                                        <div class="vp-fund-slide--item-value">
                                                            {!! $point['value'] !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </template>
                        </vp-accordion>
                    @endforeach
                </div>

                @if(count($slider) > 4)
                <div class="vp-items--show-more vp-show-sm" v-show="!isShowMore">
                    <a href="" @click.prevent="showMore">Show More</a>
                </div>
                @endif
        @endif
    </div>
</div>