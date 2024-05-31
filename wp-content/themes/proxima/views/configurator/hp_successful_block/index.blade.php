<div id="{{ $section_id }}"
     class="vp-successful-block"
     @if($background) style="background-image: url('{{ $background['url'] }}')" @endif
>
    <div class="wrapper">
        <div class="vp-successful-block--head">
            @if($title)
                <h2 class="vp-title">
                    {!! $title !!}
                </h2>
            @endif
            @if($text)
                <p class="vp-text">
                    {!! $text !!}
                </p>
            @endif
        </div>

        @if($items)
            <div class="vp-items">
                @foreach($items as $item)
                    <div class="vp-item">
                        <div class="vp-item--inner">
                            <div class="vp-item--title">
                                {{ $item['title'] }}
                            </div>
                            <div class="vp-item--text">
                                {{ $item['text'] }}

                                <div class="vp-item--dots">
                                    @foreach(range(1, $loop->index + 1) as $i)
                                        <span></span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>