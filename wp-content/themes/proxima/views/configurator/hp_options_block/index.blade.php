<div id="{{ $section_id }}"
     class="vp-options-block"
>
    <div class="wrapper">
        <div class="vp-container">
            <div class="vp-container--left">
                <div class="">
                    @if($title)
                        <h2 class="vp-title">
                            {!! $title !!}
                        </h2>
                    @endif
                    @include('components.button', ['button' => $button, 'iconImg' => 'export'])
                </div>
                <div class="">
                    @if($subtitle)
                        <p class="vp-subtitle">
                            {!! $subtitle !!}
                        </p>
                    @endif
                    @if($text)
                        <div class="vp-text vp-hidden-md">
                            {!! $text !!}
                        </div>
                    @endif
                </div>
            </div>
            <div class="vp-container--right">
                @if($program)
                    <vertical-x3-slider :slides="{{ json_encode($program) }}"></vertical-x3-slider>
                @endif
            </div>

            <div class="vp-text vp-show-md">
                {!! $text !!}
            </div>
        </div>
    </div>
</div>