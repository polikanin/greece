@php( $program = ( empty( $program ) ? [] : $program ) )

<div id="{{ $section_id }}"
     class="vp-program-block"
>
    <div class="wrapper">
        <div class="vp-container" style="--progress: 0%;" data-progress>
            <div class="vp-container--left">
                <div class="vp-container--block @if(count($program) < 4) vp-no-min-height @endif">
                    @if($title)
                        <h2 class="vp-title">
                            {!! $title !!}
                        </h2>
                    @endif
                    @if(count($program) > 4)
                        <div class="vp-progress"></div>
                    @endif
                    @if($button)
                        @include('components.button', ['button' => $button, 'iconImg' => 'user-tag'])
                    @endif
                    @if($text)
                        <p class="vp-text">
                            {!! $text !!}
                        </p>
                    @endif
                </div>
            </div>
            <div class="vp-container--right" data-progress-container>
                @if($program)
                    <div class="vp-items @if(count($program)/4 > 1)vp-hidden-sm @endif">
                        @foreach($program as $item)
                            <div class="vp-item">
                                <div class="vp-item--img">
                                    {!! get_image_html($item['icon'], 'full') !!}
                                </div>
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
            </div>
        </div>
    </div>

    @if($program && count($program)/4 > 1)
        <swiper
                class="vp-show-sm"
                :modules="modules"
                :slides-per-view="1"
                :pagination="{ clickable: true }"
        >
            @foreach(range(1, ceil(count($program)/4)) as $i)
                <swiper-slide>
                    @foreach($program as $item)
                        @if($loop->index >= ($i - 1) * 4 and $loop->index < $i * 4)
                            <div class="vp-item">
                                <div class="vp-item--img">
                                    {!! get_image_html($item['icon'], 'full') !!}
                                </div>
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