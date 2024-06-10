@php($bg = $bg ?? false)
<div id="{{ $section_id }}"
     class="vp-hello-block {{ $block_type }}"
     @if($bg) style="background-image: url('{{ $bg['url'] }}')" @endif
>
    <div class="wrapper">
        <div class="vp-hello-block--grid">
            <div class="vp-hello-block--col">
                @if($title)
                    <h1 class="vp-title">
                        {!! $title !!}
                    </h1>
                @endif
            </div>

            @if($block_type === 'type_1')
                <div class="vp-hello-block--col vp-hidden-sm">

                </div>
                <div class="vp-hello-block--col vp-hidden-sm">

                </div>
                <div class="vp-hello-block--col">
                    <div class="vp-hello-block--content">
                        @if($text)
                            <div class="vp-text">
                                {!! $text !!}
                            </div>
                        @endif

                        @if($link)
                            @include('components.button', ['button' => $link, 'iconId' => $icon])
                        @endif
                    </div>
                </div>
            @endif

            @if($block_type === 'type_2')
                <div class="vp-hello-block--col vp-hidden-sm">

                </div>
                <div class="vp-hello-block--col">
                    @if($items)
                        <div class="vp-items vp-hidden-sm">
                            @foreach($items as $item)
                                @if($loop->index < 2)
                                    <div class="vp-item">
                                        <div class="vp-item--index">
                                            @if($loop->index + 1 < 10)
                                                0{{ $loop->index + 1 }}
                                            @else
                                                {{ $loop->index + 1 }}
                                            @endif
                                        </div>
                                        <div class="vp-item--text">
                                            {!! $item['text'] !!}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if($items)
                        <div class="vp-items vp-show-sm">
                            <div class="vp-items--head">
                                @foreach($items as $item)
                                    <div class="vp-item">
                                        <div class="vp-item--index"
                                             :class="{active: helloActiveSlide == '{{ $loop->index }}'}"
                                             @click="setHelloSlide('{{ $loop->index }}')">
                                            @if($loop->index + 1 < 10)
                                                0{{ $loop->index + 1 }}
                                            @else
                                                {{ $loop->index + 1 }}
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <swiper
                                    @swiper="getRef"
                                    @slide-change="onHelloSlideChange"
                                    :space-between="8"
                                    :modules="modules"
                                    :slides-per-view="1"
                            >
                                @foreach($items as $item)
                                    <swiper-slide>
                                        <div class="vp-item">
                                            <div class="vp-item--text">
                                                {!! $item['text'] !!}
                                            </div>
                                        </div>
                                    </swiper-slide>
                                @endforeach
                            </swiper>
                        </div>
                    @endif


                    <div class="vp-hello-block--content">
                        @if($link)
                            @include('components.button', ['button' => $link, 'iconId' => $icon])
                        @endif
                    </div>
                </div>
                <div class="vp-hello-block--col vp-hidden-sm">
                    <div class="vp-items">
                        @if($items)
                            @foreach($items as $item)
                                @if($loop->index > 1)
                                    <div class="vp-item">
                                        <div class="vp-item--index">
                                            @if($loop->index + 1 < 10)
                                                0{{ $loop->index + 1 }}
                                            @else
                                                {{ $loop->index + 1 }}
                                            @endif
                                        </div>
                                        <div class="vp-item--text">
                                            {!! $item['text'] !!}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif

            @if($block_type === 'type_3')
                <div class="vp-hello-block--col">

                </div>
                <div class="vp-hello-block--col">

                </div>
                <div class="vp-hello-block--col">
                    <div class="vp-hello-block--contact">
                        @if($subtitle)
                            <p class="vp-subtitle">
                                {!! $subtitle !!}
                            </p>
                        @endif
                        @if($type_3_text)
                            <p class="vp-text">
                                {{ $type_3_text }}
                            </p>
                        @endif
                        @if($label)
                            <p class="vp-label">
                                {{ $label }}
                            </p>
                        @endif
                        <div class="vp-mail-link" @click="copyToClipBoard('{{ $email }}')">
                            <vp-icon type="sms"></vp-icon>
                            {{ $email }}
                        </div>
                    </div>
                </div>
            @endif

            @if($block_type === 'type_4')
                <div class="vp-hello-block--col vp-hidden-sm">
                    <div class="vp-items-type_4">
                        @if($items_type_4)
                            @foreach($items_type_4 as $item)
                                @if($loop->index > 3)
                                    <div class="vp-item">
                                        <div class="vp-item--text">
                                            {{ $item['text'] }}
                                        </div>
                                        <div class="vp-item--title">
                                            {!! $item['title'] !!}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="vp-hello-block--col vp-hidden-sm">
                    <div class="vp-items-type_4">
                        @if($items_type_4)
                            @foreach($items_type_4 as $item)
                                @if($loop->index < 4)
                                    <div class="vp-item">
                                        <div class="vp-item--text">
                                            {{ $item['text'] }}
                                        </div>
                                        <div class="vp-item--title">
                                            {!! $item['title'] !!}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="vp-hello-block--col">
                    <div class="vp-hello-block--content">
                        @if($text)
                            <p class="vp-text">
                                {!! $text !!}
                            </p>
                        @endif

                        @if($link)
                            @include('components.button', ['button' => $link, 'iconId' => $icon])
                        @endif
                    </div>
                    @if($items_type_4)
                        <div class="vp-items-type_4 vp-show-sm">
                            <swiper
                                    :space-between="8"
                                    :modules="modules"
                                    :slides-per-view="1"
                            >
                                @foreach($items_type_4 as $item)
                                    <swiper-slide>
                                        <div class="vp-item">
                                            <div class="vp-item--text">
                                                {{ $item['text'] }}
                                            </div>
                                            <div class="vp-item--title">
                                                {{ $item['title'] }}
                                            </div>
                                        </div>
                                    </swiper-slide>
                                @endforeach
                            </swiper>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>