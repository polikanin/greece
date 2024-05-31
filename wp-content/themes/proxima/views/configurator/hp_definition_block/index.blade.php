@php($bg = $bg ?? false)
<div id="{{ $section_id }}"
     class="vp-definition-block"
     @if($bg) style="background-image: url('{{ $bg['url'] }}')" @endif
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {!! $title !!}
            </h2>
        @endif

        @if($items)
            <div class="vp-items">
                @foreach($items as $item)
                    <div class="vp-item">
                        <div class="vp-item--img">
                            {!! get_image_html($item['icon'], 'full') !!}
                        </div>
                        <div class="vp-item--text">
                            {{ $item['text'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>