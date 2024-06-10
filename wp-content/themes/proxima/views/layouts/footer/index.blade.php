<div class="vp-support">
    <div class="wrapper">
        <div class="vp-container">
            <div class="vp-support--head">
                <h2 class="vp-subtitle">
                    Need Support Getting the Golden Visa?
                </h2>
                <p class="vp-text">
                    Book an appointment with our consultants and take your first step today
                </p>
            </div>

            @include('components.button', ['button' => [
                'url'=> '##quiz',
                'title' => 'Scedule Your Free Video Call',
                ], 'iconImg' => 'video'])
        </div>
    </div>
</div>


@php($image = get_field('logo', 'options'))
@php($locations = get_field('locations', 'options'))
@php($copyright = get_field('copyright', 'options'))
@php($disclaimer_text = get_field('preview_text', 'options'))
@php($terms_and_conditions_link = get_field('terms_and_conditions_link', 'options'))
@php($privacy_policy_link = get_field('privacy_policy_link', 'options'))
@php($copy_text = get_field('copy_text', 'options'))

<transition name="vp-copy">
    <div class="vp-copy-msg" v-show="showClipBoardNotice">
        {!! $copy_text !!}
    </div>
</transition>

<footer class="vp-footer">
    <div class="wrapper">
        <div class="vp-footer--logo">
            {!! get_image_html($image, 'full') !!}
        </div>

        <div class="vp-container">
            <div class="vp-footer--col">
                @if($locations)
                    <div class="vp-locations">
                        @foreach($locations as $item)
                            <div class="vp-locations--item">
                                <div class="vp-locations--item-head">
                                    <vp-icon type="location"></vp-icon>
                                    {{ $item['country'] }}
                                </div>
                                <div class="vp-locations--item-body">
                                    <div class="vp-locations--item-text">
                                        {{ $item['city'] }}
                                    </div>
                                    <div class="vp-locations--item-text">
                                        {{ $item['address'] }}
                                    </div>
                                </div>
                            </div>
                            {{--                            <vp-accordion class="vp-locations--item">--}}
                            {{--                                <template #head>--}}
                            {{--                                    <div class="vp-locations--item-head">--}}
                            {{--                                        <vp-icon type="location"></vp-icon>--}}
                            {{--                                        {{ $item['country'] }}--}}
                            {{--                                    </div>--}}
                            {{--                                </template>--}}
                            {{--                                <template #body>--}}
                            {{--                                    <div class="vp-locations--item-body">--}}
                            {{--                                        <div class="vp-locations--item-text">--}}
                            {{--                                            {{ $item['city'] }}--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="vp-locations--item-text">--}}
                            {{--                                            {{ $item['address'] }}--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </template>--}}
                            {{--                            </vp-accordion>--}}
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="vp-footer--col vp-hidden-sm">
                <div class="vp-footer--title">
                    Disclaimer
                </div>
                <div class="vp-footer--excerpt">
                    {!! $disclaimer_text !!}
                    <br>
                    <a href="" @click.prevent="modal.id = '##disclamer'">
                        Please read our full disclaimer.
                    </a>
                </div>
            </div>
            <div class="vp-footer--col vp-show-sm">
                <div class="vp-locations--item">
                    <div class="vp-footer--title">
                        Disclaimer
                    </div>
                    <div class="vp-footer--excerpt">
                        {!! $disclaimer_text !!}
                        <br>
{{--                        <a href="" @click.prevent="modal.id = '##disclamer'">--}}
{{--                            Please read our full disclaimer.--}}
{{--                        </a>--}}
                    </div>
                </div>
            </div>
            <div class="vp-footer--col">
                <div class="vp-footer--title">
                    Quick links
                </div>
                {!! wp_nav_menu( [
                'theme_location'  => 'footer',
                'menu_id'         => 'footer-menu',
                'container_class' => 'vp-menu vp-hidden-sm',
                'depth'           => 2,
            ] ); !!}
                {!! wp_nav_menu( [
                'theme_location'  => 'footer_tiny',
                'menu_id'         => 'footer-menu-2',
                'container_class' => 'vp-menu vp-show-sm',
                'depth'           => 2,
            ] ); !!}
            </div>
        </div>


        {{--        <div class="vp-footer--col">--}}
        {{--            @php($post = get_post(173))--}}

        {{--            {{ $post->post_excerpt }}--}}
        {{--        </div>--}}
    </div>
</footer>

<div class="vp-footer--bottom">
    <div class="wrapper">
        <div class="vp-container">
            <p class="vp-text">
                {{ $copyright }}
            </p>
            <p class="vp-text">
                @if($terms_and_conditions_link)
                    <a href="{{ $terms_and_conditions_link['url'] }}"
                       target="{{ $terms_and_conditions_link['target'] }}">
                        {{ $terms_and_conditions_link['title'] }}
                    </a>
                @endif
                @if($terms_and_conditions_link and $privacy_policy_link)
                    |
                @endif
                @if($privacy_policy_link)
                    <a href="{{ $privacy_policy_link['url'] }}" target="{{ $privacy_policy_link['target'] }}">
                        {{ $privacy_policy_link['title'] }}
                    </a>
                @endif
            </p>
        </div>
    </div>
</div>

<button class="vp-top-btn" ref="top-btn" aria-label="top btn" :class="{active: topBtnActive}" @click.prevent="goToTop">
    <vp-icon type="arrow-narrow-up"></vp-icon>
</button>

<vp-quiz :is-open="modal.id === '##quiz'" @close="closeQuiz"
         @send-form="sendForm"
         terms="@if($terms_and_conditions_link){{ $terms_and_conditions_link['url'] }}@endif"
         privacy="@if($privacy_policy_link){{ $privacy_policy_link['url'] }}@endif"
></vp-quiz>

<vp-modal v-show="modal.id === '##disclamer'" class="vp-modal--big" @close="modal.id = false">
    @php($disclaimer_title = get_field('disclaimer_title', 'options'))
    @php($disclaimer_subtitle = get_field('disclaimer_subtitle', 'options'))
    @php($disclaimer_text = get_field('disclaimer_text', 'options'))
    @php($disclaimer_list = get_field('disclaimer_list', 'options'))
    <template #header>
        <div class="vp-modal--header">
            <h2 class="vp-disclaimer--title">
                {{ $disclaimer_title }}
            </h2>

            <div class="vp-modal--close" @click="modal.id = false">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 5L5 15M5 5L15 15" stroke="currentColor" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </template>
    <template #body>
        <div class="vp-modal--body">
            <div class="vp-disclaimer--subtitle">
                {!! $disclaimer_subtitle !!}
            </div>

            <div class="vp-disclaimer--list">
                <div class="vp-disclaimer--list-inner">
                    @foreach($disclaimer_list as $item)
                        <div class="vp-disclaimer--list-item">
                            <div class="vp-disclaimer--list-item--title">
                                {{ $item['title'] }}
                            </div>
                            <div class="vp-disclaimer--list-item--text">
                                {{ $item['text'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="vp-disclaimer--text">
                {!! $disclaimer_text !!}
            </div>

            <div class="vp-modal--navigation">
                <vp-button @click="modal.id = '##quiz'">
                    <vp-icon type="user-tag"></vp-icon>
                    <span class="vp-btn--text">Contact Our Team of Experts</span>
                </vp-button>
            </div>
        </div>
    </template>
</vp-modal>

<transition name="vp-menu-anim">
    <div class="vp-offcanvas" v-show="isMenu">
        <div class="vp-offcanvas--layout">

        </div>
        <div class="vp-offcanvas--menu">
            <div class="vp-offcanvas--menu-head">
                @php($image = get_field('logo', 'options'))

                <a href="/" class="vp-offcanvas--menu-logo">
                    {!! get_image_html($image, 'full') !!}
                </a>

                <button class="vp-menu-btn"
                        aria-label="menu close"
                        :class="{active: isMenu}"
                        @click.prevent="hideMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            {!! wp_nav_menu( [
               'theme_location'  => 'primary_mobile',
               'container_class' => 'vp-menu',
               'depth'           => 2,
           ] ); !!}

            <div class="vp-offcanvas--menu-footer">
                @include('components.button', ['button' => [
                         'url'=> '##quiz',
                         'title' => 'Free Video Consultation',
                         ], 'iconImg' => 'video'])

                <p class="vp-offcanvas--menu-text">
                    @if($terms_and_conditions_link)
                        <a href="{{ $terms_and_conditions_link['url'] }}"
                           target="{{ $terms_and_conditions_link['target'] }}">
                            {{ $terms_and_conditions_link['title'] }}
                        </a>
                    @endif
                    @if($terms_and_conditions_link and $privacy_policy_link)
                        |
                    @endif
                    @if($privacy_policy_link)
                        <a href="{{ $privacy_policy_link['url'] }}" target="{{ $privacy_policy_link['target'] }}">
                            {{ $privacy_policy_link['title'] }}
                        </a>
                    @endif
                </p>
                <p class="vp-offcanvas--menu-text">
                    {{ $copyright }}
                </p>
            </div>
        </div>
    </div>
</transition>
</div>