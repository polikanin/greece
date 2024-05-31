<template>
    <div class="vp-testimonials-block--head">
        <h2 class="vp-title" v-html="title">

        </h2>

        <div class="vp-testimonials-block--ctrl">
            <div class="vp-swiper-button-prev">
                <vp-icon type="arrow-left"></vp-icon>
            </div>
            <div class="vp-swiper-pagination"></div>
            <div class="vp-swiper-button-next">
                <vp-icon type="arrow-right"></vp-icon>
            </div>
        </div>
    </div>

    <div class="vp-horizontal--swiper" v-if="slides">
        <swiper
            :slides-per-view="3"
            :spaceBetween="32"
            @swiper="getRef"
            @slide-change="onSlideChange"
            :modules="modules"
            :navigation="{
                nextEl: '#'+ id + ' .vp-swiper-button-next',
                prevEl: '#'+ id + ' .vp-swiper-button-prev',
            }"
            :pagination="{
                type: 'fraction',
                el: '#'+ id + ' .vp-swiper-pagination',
                clickable: true,
            }"
            :breakpoints="{
                '320': {
                    slidesPerView: 1,
                    autoHeight: true,
                },
                '769': {
                    slidesPerView: 2,
                    autoHeight: true,
                },
                '960': {
                    slidesPerView: 3,
                    autoHeight: false,
                },
            }"
        >
            <swiper-slide v-for="(slide, index) in slides">
                <div class="vp-horizontal-slide">
                    <div class="vp-horizontal-slide--head">
                        <div class="vp-horizontal-slide--img">
                            <img :src="slide.icon" alt="">
                        </div>
                        <div class="vp-horizontal-slide--name">
                            {{ slide.name }}
                        </div>
                    </div>
                    <div class="vp-horizontal-slide--title">
                        {{ slide.title }}
                    </div>
                    <div class="vp-horizontal-slide--text">
                        {{ slide.text }}
                    </div>
                </div>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>
import {Pagination, Navigation} from 'swiper/modules';
import 'swiper/css/pagination';
import 'swiper/css/navigation';

export default {
    name: "HorizontalX3Slider",
    props: ['slides', 'title', 'id'],
    data() {
        return {
            modules: [Pagination, Navigation],
            activeSlide: 0,
            slider: false
        }
    },
    mounted() {

    },
    methods: {
        getRef(e) {
            this.slider = e
        },
        onSlideChange(e) {
            this.activeSlide = e.activeIndex
            if (this.$refs.preview && this.$refs.preview.scrollEl && this.$refs['preview_btn_' + e.activeIndex] && this.$refs['preview_btn_' + e.activeIndex][0]) {
                let scrollTop = this.$refs['preview_btn_' + e.activeIndex][0].offsetTop
                this.$refs.preview.scrollEl.scroll(0, scrollTop);
            }
        },
        setActiveSlider(index) {
            this.activeSlide = index
            this.slider.slideTo(index)
        },
    }
}
</script>

<style scoped>

</style>