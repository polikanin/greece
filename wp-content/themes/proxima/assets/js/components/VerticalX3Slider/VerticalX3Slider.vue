<template>
    <div class="vp-vertical-x3--swiper" v-if="slides">
        <swiper
            :modules="modules"
            :speed="1000"
            :autoplay="{
                        delay: 1500,
                        pauseOnMouseEnter: true
                    }"
            :loop="true"
            :pagination="{ clickable: true }"
            :breakpoints="{
      '320': {
        slidesPerView: 1,
        direction: 'horizontal',
        autoplay: false,
      },
      '769': {
        slidesPerView: 3,
        direction: 'horizontal',
        autoplay: false,
      },
      '961': {
        slidesPerView: 3,
        direction: 'vertical',
      },
    }"
        >
            <swiper-slide v-for="(slide, index) in slides">
                <div class="vp-vertical-slide" data-badge-slide="badge-options-block">
                    <div class="vp-vertical-slide--title">
                        {{ slide.title }}
                    </div>
                    <div class="vp-vertical-slide--img">
                        <img :src="slide.icon" alt="">
                    </div>
                    <div class="vp-vertical-slide--text" v-html="slide.text">
                    </div>
                </div>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>
import {Autoplay, EffectFade, Pagination} from 'swiper/modules';

export default {
    name: "VerticalSlider",
    props: ['slides'],
    data() {
        return {
            modules: [EffectFade, Autoplay, Pagination],
            activeSlide: 0,
        }
    },
    mounted() {
        let self = this
    },
    methods: {

    }
}
</script>

<style scoped>

</style>