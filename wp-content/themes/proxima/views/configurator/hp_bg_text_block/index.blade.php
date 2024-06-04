<div id="{{ $section_id }}"
     class="vp-bg-text-block"
     @if($background) style="background-image: url('{{ $background['url'] }}')" @endif
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {!! $title !!}
            </h2>
        @endif
        @if($text)
            <div class="vp-text">
                {!! $text !!}
            </div>
        @endif
    </div>
</div>