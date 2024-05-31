@push('css')
    <style>
        @font-face {
            font-family: 'Outfit';
            src: url('/wp-content/themes/proxima/assets/fonts/Outfit-Light.woff') format('woff');
            font-weight: 300;
            font-display: swap;
        }

        @font-face {
            font-family: 'Outfit';
            src: url('/wp-content/themes/proxima/assets/fonts/Outfit-Regular.woff') format('woff');
            font-weight: 400;
            font-display: swap;
        }

        @font-face {
            font-family: 'Outfit';
            src: url('/wp-content/themes/proxima/assets/fonts/Outfit-Medium.woff') format('woff');
            font-weight: 500;
            font-display: swap;
        }

        @font-face {
            font-family: 'Mulish';
            src: url('/wp-content/themes/proxima/assets/fonts/Mulish-Medium.woff') format('woff');
            font-weight: 500;
            font-display: swap;
        }

        @font-face {
            font-family: 'Gilroy';
            src: url('/wp-content/themes/proxima/assets/fonts/Gilroy-Medium.woff') format('woff');
            font-weight: 500;
            font-display: swap;
        }

        @font-face {
            font-family: 'Gilroy';
            src: url('/wp-content/themes/proxima/assets/fonts/Gilroy-Regular.woff') format('woff');
            font-weight: 400;
            font-display: swap;
        }

        @font-face {
            font-family: 'Gilroy';
            src: url('/wp-content/themes/proxima/assets/fonts/Gilroy-Bold.woff') format('woff');
            font-weight: 700;
            font-display: swap;
        }

    </style>
@endpush

@php($phone_code = get_field('phone_code', 'options'))
@php($timelines = get_field('timeline', 'options'))
@php($error_messages = get_field('error_messages', 'options'))
@php($form_fields = get_field('form_fields', 'options'))
@php($portal_id = get_field('portal_id', 'options'))
@php($form_id = get_field('form_id', 'options'))

@include('components.critical')

<style>
    .vp-preloader{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #1e1e1e;
        z-index: 10000000000;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.3s;
    }

    .vp-preloader.page-load{
        transform: scale(1.05);
        opacity: 0;
        pointer-events: none;
    }
    /* HTML: <div class="loader"></div> */
    .loader {
        width: 50px;
        aspect-ratio: 1;
        --_c:no-repeat radial-gradient(farthest-side,#e9a900 92%,#0000);
        background:
                var(--_c) top,
                var(--_c) left,
                var(--_c) right,
                var(--_c) bottom;
        background-size: 12px 12px;
        animation: l7 1s infinite;
    }
    @keyframes l7 {to{transform: rotate(.5turn)}}
</style>

<div class="vp-preloader">
    <div class="loader"></div>
</div>

<script>
    window.portal_id = '{{ $portal_id }}'
    window.form_id = '{{ $form_id }}'

    window.VpErrorMsg = {
        @foreach($error_messages as $msg)
                {{ $msg['label'] }}: '{!! $msg['text'] !!}',
        @endforeach
    }
    window.VpFormFields = {
        @foreach($form_fields as $field)
                {{ $field['label'] }}: [
            @foreach($field['values'] as $val)
                    '{!! $val['text'] !!}',
            @endforeach
        ],
        @endforeach
    }
</script>

<div id="vp-app">
    <header class="vp-header">
        <div class="wrapper">
            <div class="vp-container">
                @php($image = get_field('logo', 'options'))

                <a href="/" class="vp-logo">
                    {!! get_image_html($image, 'full') !!}
                </a>

                {!! wp_nav_menu( [
                    'theme_location'  => 'primary',
                    'menu_id'         => 'header-menu',
                    'container_class' => 'vp-menu',
                    'depth'           => 2,
                ] ); !!}

                @include('components.button', ['button' => [
                    'url'=> '##quiz',
                    'title' => 'Speak with an expert'
                    ], 'class' => 'vp-btn--simple',])

                <button class="vp-menu-btn"
                        aria-label="Menu open"
                        :class="{active: isMenu}"
                        @click.prevent="toggleMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>