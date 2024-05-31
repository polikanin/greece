<div class="vp-privacy-policy">
    <div class="wrapper">
        <h1 class="vp-title">
            {!! $title !!}
        </h1>
        <h2 class="vp-subtitle">
            {!! $subtitle !!}
        </h2>
        <div class="vp-privacy-policy--content">
            @foreach($content as $block)
                @if($block['type'] === 'text')
                    <div class="vp-privacy-policy--text">
                        {!! $block['text'] !!}
                    </div>
                @endif
                @if($block['type'] === 'table')
                    <div class="vp-privacy-policy--table">
                        @foreach($block['table'] as $tr)
                            <div class="vp-privacy-policy--table-row">
                                <div class="vp-privacy-policy--table-col">
                                    {!! $tr['col_1'] !!}
                                </div>
                                <div class="vp-privacy-policy--table-col">
                                    {!! $tr['col_2'] !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>