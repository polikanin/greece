@php($bg = $bg ?? false)
<div id="{{ $section_id }}"
     class="vp-about-block"
     @if($bg) style="background-image: url('{{ $bg }}')" @endif
>
    <div class="wrapper">
        @if($items)
            <div class="vp-items vp-hidden-sm">
                @foreach($items as $item)
                    @if(($loop->index+1) % 3  == 1 )
                        <div class="vp-item--row">
                            @endif
                            <div class="vp-item">
                                <div class="vp-item--img">
                                    {!! get_image_html($item['icon'], 'full') !!}
                                </div>
                                <div class="vp-item--text">
                                    {!! $item['text'] !!}
                                </div>
                            </div>
                            @if(($loop->index+1) % 3  == 1 )
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="vp-items vp-show-sm">
                @foreach($items as $item)
                    <div class="vp-item">
                        <div class="vp-item--img">
                            {!! get_image_html($item['icon'], 'full') !!}
                        </div>
                        <div class="vp-item--text">
                            {!! $item['text'] !!}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>