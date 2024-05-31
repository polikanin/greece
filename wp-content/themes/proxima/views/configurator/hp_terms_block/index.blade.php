<div id="{{ $section_id }}"
     class="vp-terms-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {{ $title }}
            </h2>
        @endif
    </div>

    @if($items)
        <div class="vp-items">
            @foreach($items as $item)
                <div class="vp-item">
                    <div class="wrapper">
                        <vp-accordion>
                            <template #head>
                                <div class="vp-item--head">
                                    <div class="vp-item--title">
                                        {{ $item['title'] }}
                                    </div>
                                    <div class="vp-item--icon">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0013 6.66675V25.3334M6.66797 16.0001H25.3346" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.66797 16H25.3346" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>