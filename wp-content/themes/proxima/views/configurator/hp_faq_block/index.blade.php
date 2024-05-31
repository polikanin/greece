<div id="{{ $section_id }}"
     class="vp-faq-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {{ $title }}
            </h2>
        @endif
        @if($text)
            <div class="vp-text">
                {!! $text !!}
            </div>
        @endif

        @if($items)
            <div class="vp-items">
                @foreach($items as $item)
                    <vp-accordion class="vp-item">
                        <template #head>
                            <div class="vp-item--head">
                                <div class="vp-item--title">
                                    {{ $item['title'] }}
                                </div>
                                <div class="vp-item--icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.9181 8.91016L13.3981 15.4302C12.6281 16.2002 11.3681 16.2002 10.5981 15.4302L4.07812 8.91016" stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </template>
                        <template #body>
                            <div class="vp-item--body">
                                <div class="vp-item--text">
                                    {!! $item['text'] !!}
                                </div>
                            </div>
                        </template>
                    </vp-accordion>
                @endforeach
            </div>
        @endif
    </div>
</div>