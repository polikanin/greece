<div id="vp-fund-step-block_{{$index}}"
     class="vp-fund-step-block"
>
    <div class="wrapper">
        @if($slider)
                <fund-slider
                            @open-modal="modal.id = $event"
                            :title="`{{ $title }}`"
                            :has-hash="`{{ $is_number_with }}`"
                            :label="`{{ $label }}`"
                            :mobile-label="`{{ $sm_label }}`"
                            :id="`vp-fund-step-block_{{$index}}`"
                            :label-on-mobile="`{{ $show_label_on_mobile }}`"
                            :subtitle="`{{ $subtitle }}`"
                            :link="{{ json_encode($link) }}"
                            :slides="{{ json_encode($slider) }}"
                ></fund-slider>
        @endif
    </div>
</div>