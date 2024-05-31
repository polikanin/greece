<div id="{{ $section_id }}"
     class="vp-4-items-block"
     @if($background) style="background-image: url('{{ $background['url'] }}')" @endif
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {!! $title !!}
            </h2>
        @endif

        @if($items)
            <div class="vp-items @if(count($items)/3 > 1)vp-hidden-sm @endif">
                @foreach($items as $item)
                    <div class="vp-item">
                        <div class="vp-item--inner">
                            <div class="vp-item--title">
                                {{ $item['title'] }}
                            </div>
                            <div class="vp-item--text">
                                {!! $item['text'] !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

            @if($items && count($items)/3 > 1)
                <swiper
                        class="vp-show-sm"
                        :modules="modules"
                        :slides-per-view="1"
                        :pagination="{ clickable: true }"
                >
                    @foreach(range(1, count($items)/3) as $i)
                        <swiper-slide>
                            @foreach($items as $item)
                                @if($loop->index >= ($i - 1) * 3 and $loop->index < $i * 3)
                                    <div class="vp-item">
                                        <div class="vp-item--inner">
                                            <div class="vp-item--title">
                                                {{ $item['title'] }}
                                            </div>
                                            <div class="vp-item--text">
                                                {!! $item['text'] !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </swiper-slide>
                    @endforeach
                </swiper>
            @endif
    </div>
</div>