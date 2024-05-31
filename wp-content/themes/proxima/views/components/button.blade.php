@php($iconId = $iconId ?? false)
@php($iconImg = $iconImg ?? false)
@php($class = $class ?? false)

@if($button && $button['url'])
    @if(strpos($button['url'], '##') !== false)
        <div class="{{ $class? : 'vp-btn' }} {{$add_class}}" @click.prevent="modal.id = '{{ $button['url'] }}'">
            <button class="{{ $class? : 'vp-btn' }}--inner {{ $class? : 'vp-btn' }}--up">
                @if($iconId)
                    <span class="vp-icon">
                        {!! get_svg_content($iconId) !!}
                    </span>
                @endif
                @if($iconImg)
                    <vp-icon type="{{ $iconImg }}"></vp-icon>
                @endif
                <span class="vp-btn--text">
                    {{ $button['title'] }}
                </span>
            </button>
            <button class="{{ $class? : 'vp-btn' }}--inner {{ $class? : 'vp-btn' }}--down {{$add_class}}">
                @if($iconId)
                    <span class="vp-icon">
                        {!! get_svg_content($iconId) !!}
                    </span>
                @endif
                @if($iconImg)
                    <vp-icon type="{{ $iconImg }}"></vp-icon>
                @endif
                <span class="vp-btn--text">
                    {{ $button['title'] }}
                </span>
            </button>
        </div>
    @else
        <div class="{{ $class? : 'vp-btn' }}">
            <a
                    class="{{ $class? : 'vp-btn' }}--inner {{ $class? : 'vp-btn' }}--up"
                    href="{{ $button['url'] }}"
                    {{ ( $button['target'] ) ? 'target="_blank"' : '' }}
            >
                @if($iconId)
                    <span class="vp-icon">
                        {!! get_svg_content($iconId) !!}
                    </span>
                @endif
                @if($iconImg)
                    <vp-icon type="{{ $iconImg }}"></vp-icon>
                @endif
                <span class="vp-btn--text">
                    {{ $button['title'] }}
                </span>
            </a>
            <a
                    class="{{ $class? : 'vp-btn' }}--inner {{ $class? : 'vp-btn' }}--down"
                    href="{{ $button['url'] }}"
                    {{ ( $button['target'] ) ? 'target="_blank"' : '' }}
            >
                @if($iconId)
                    <span class="vp-icon">
                        {!! get_svg_content($iconId) !!}
                    </span>
                @endif
                @if($iconImg)
                    <vp-icon type="{{ $iconImg }}"></vp-icon>
                @endif
                <span class="vp-btn--text">
                    {{ $button['title'] }}
                </span>
            </a>
        </div>
    @endif
@endif