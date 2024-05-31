@php($bg = $bg ?? false)
<div id="{{ $section_id }}"
     class="vp-government-block"
     @if($bg) style="background-image: url('{{ $bg['url'] }}')" @endif
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {{ $title }}
            </h2>
        @endif
        @if($text)
            <div class="vp-text">
                {!! $text !!}
            </div>
        @endif

        @if($items)
            <div class="vp-items">
                @foreach($items as $item)
                    <div class="vp-item">
                        <div class="vp-item--head">
                            @if($item['title'])
                                <div class="vp-item--subtitle">
                                    {!! $item['title'] !!}
                                </div>
                            @endif
                            <div class="vp-item--index">
                                @foreach(range(1, $loop->index + 1) as $i)
                                    <span></span>
                                @endforeach
                            </div>
                        </div>
                        @if($item['value'])
                            <div class="vp-item--title">
                                {!! $item['value'] !!}
                            </div>
                        @endif
                        @if($item['text'])
                            <div class="vp-item--text">
                                {!! $item['text'] !!}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>