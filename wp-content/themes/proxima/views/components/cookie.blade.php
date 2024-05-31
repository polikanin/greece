<div id="cookie-notice" role="dialog"
     aria-label="{{$options['aria_label']}}"
     class="cookie-revoke-hidden cn-position-bottom cn-effect-fade cookie-notice-visible"
>
    <div class="cookie-notice-container">

        <div class="cookie-notice-title">
            ATTENTION:
        </div>

        <div class="cookie-notice-text">
            {{$options['see_more'] ? do_shortcode( $options['message_text'] ) : $options['message_text'] }}
        </div>

        <div class="cookie-notice-footer">
            @if($options['see_more'])
                <a href="{{ get_permalink($options['see_more_opt']['id']) }}" target="_blank"
                   class="cookie-notice-more">
                    {{ $options['see_more_opt']['text'] }}
                </a>
            @endif

            @include('components.button', ['button' => [
    'url'=> '##',
             'title' => $options['accept_text']
             ], 'add_class' => 'cn-set-cookie',])

            @include('components.button', ['button' => [
    'url'=> '##',
             'id' => 'cn-close-notice',
             'title' => 'Reject',
             ], 'class' => 'vp-btn--simple',])
        </div>
    </div>
</div>