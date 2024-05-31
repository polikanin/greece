<div id="{{ $section_id }}">

    <h3>{{ $title }}</h3>

    <div>

        @if($side === 'left')
            {!! get_image_html($image, 'full', [ 'class' => 'r140:order-1 w-2/5 r140:w-4/5' ]) !!}
        @endif

        <div>
            <span>{{ $block['title'] }}</span>

            <div>
                {!! $block['content'] !!}

                @if(!empty($block['btn']['title']))
                    <a href="{!! $block['btn']['url'] !!}" target="{{ $block['btn']['target'] }}">{{ $block['btn']['title'] }}</a>
                @endif
            </div>
        </div>

        @if($side === 'right')
            {!! get_image_html($image, 'full', [ 'class' => 'r140:order-1 w-2/5 r140:w-4/5' ]) !!}
        @endif

    </div>

</div>