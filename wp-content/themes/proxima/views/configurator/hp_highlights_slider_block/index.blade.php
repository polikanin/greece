<div id="{{ $section_id }}"
     class="vp-highlights-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {!! $title !!}
            </h2>
        @endif
        @if($subtitle)
            <h2 class="vp-subtitle">
                {!! $subtitle !!}
            </h2>
        @endif
        @if($link)
            <vp-button @click.prevent="modal.id = '{{ $link['url'] }}'">
                <vp-icon type="subtitle"></vp-icon>
                <span class="vp-btn--text">{{ $link['title'] }}</span>
            </vp-button>
        @endif

        @if($highlights)
            <div class="vp-items vp-hidden-sm">
                @foreach($highlights as $highlight)
                    <div class="vp-item">
                        <a href="{{ $highlight['link']['url'] }}" class="vp-item--head">
                            <div class="vp-item--title">
                                {{ $highlight['title'] }}
                            </div>
                            <div class="vp-item--subtitle">
                                {!! $highlight['description'] !!}
                            </div>
                        </a>

                        <div class="vp-item--body">
                            @foreach($highlight['items'] as $item)
                                <div class="vp-item--block">
                                    <div class="vp-item--quote">
                                        {{ $item['title'] }}
                                    </div>
                                    <div class="vp-item--text">
                                        {!! $item['text'] !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="vp-items vp-show-sm">
                @foreach($highlights as $highlight)
                    <vp-accordion class="vp-item">
                        <template #head>
                            <div class="vp-item--head">
                                <div class="vp-item--title">
                                    @if($highlight['link'])
                                        <a href="{{ $highlight['link']['url'] }}">
                                            @endif
                                            {{ $highlight['title'] }}
                                            @if($highlight['link'])
                                        </a>
                                    @endif
                                    <vp-icon type="arrow-down"></vp-icon>
                                </div>
                                <div class="vp-item--subtitle">
                                    @if($highlight['link'])
                                        <a href="{{ $highlight['link']['url'] }}">
                                            @endif
                                            {!! $highlight['description'] !!}
                                            @if($highlight['link'])
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </template>

                        <template #body>
                            <div class="vp-item--body">
                                @foreach($highlight['items'] as $item)
                                    <div class="vp-item--block">
                                        <div class="vp-item--quote">
                                            {{ $item['title'] }}
                                        </div>
                                        <div class="vp-item--text">
                                            {!! $item['text'] !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </template>
                    </vp-accordion>
                @endforeach
            </div>
        @endif
    </div>
</div>