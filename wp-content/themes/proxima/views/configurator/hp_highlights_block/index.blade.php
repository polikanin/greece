<div id="{{ $section_id }}"
     class="vp-highlights-block"
>
    <div class="wrapper">
        @if($title)
            <h2 class="vp-title">
                {!! $title !!}
            </h2>
        @endif

        @if($highlights)
            <div class="vp-items vp-hidden-sm">
                @foreach($highlights as $highlight)
                    <div class="vp-item">
                        @php($url = get_permalink())
                        @php($path1 = parse_url($highlight['link']['url'])['path'])
                        @php($path2 = parse_url($url)['path'])
                        <a href="{{ $highlight['link']['url'] }}" class="vp-item--head"
                            @if($path1 === $path2)
                                @click.prevent="modal.id = '##quiz'"
                                    @endif
                        >
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
                            </div>
                        </template>

                        <template #body>
                            <div class="vp-item--subtitle">
                                @if($highlight['link'])
                                    <a href="{{ $highlight['link']['url'] }}">
                                        @endif
                                        {!! $highlight['description'] !!}
                                        @if($highlight['link'])
                                    </a>
                                @endif
                            </div>
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