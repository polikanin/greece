<div id="vp-new-step-block_{{$index}}"
     class="vp-new-step-block"
>
    <div class="wrapper">
        @if($slider)
                <step-slider
                            @open-modal="modal.id = $event"
                            :title="`{{ $title }}`"
                            :has-hash="`{{ $is_number_with }}`"
                            :label="`{{ $label }}`"
                            :mobile-label="`{{ $sm_label }}`"
                            :id="`vp-new-step-block_{{$index}}`"
                            :is-pagination="`{{ $is_pagination }}`"
                            :subtitle="`{{ $subtitle }}`"
                            :link="{{ json_encode($link) }}"
                            :slides="{{ json_encode($slider) }}"
                ></step-slider>
        @endif
    </div>
</div>