<template>
    <div class="vp-advantages-block--head">
        <vp-button @click.prevent="openModal('##quiz')" class="vp-hidden-sm">
            <vp-icon type="subtitle"></vp-icon>
            <span class="vp-btn--text">More Information from Fund Advisors</span>
        </vp-button>

        <div class="vp-advantages-block--ctrl">
            <div class="vp-swiper-button-prev">
                <vp-icon type="arrow-left"></vp-icon>
            </div>
            <div class="vp-swiper-button-next">
                <vp-icon type="arrow-right"></vp-icon>
            </div>
        </div>
    </div>
    <div class="vp-horizontal--swiper" v-if="slides">
        <swiper
            :navigation="{
                nextEl: '#'+ id + ' .vp-swiper-button-next',
                prevEl: '#'+ id + ' .vp-swiper-button-prev',
            }"
            :space-between="24"
            :modules="modules"
            :slides-per-view="'auto'"
        >
            <swiper-slide v-for="(slide, index) in slides">
                <div class="vp-item" :class="{'vp-item--special': slide.special}">
                    <div class="vp-item--inner">
                        <div class="vp-item--title" v-show="!slide.special">
                            #{{ index+1 }}
                        </div>
                        <div class="vp-item--img">
                            <img :src="slide.image" alt="">
                        </div>
                    </div>
                    <div class="vp-item--container">
                        <div class="vp-item--text" v-html="slide.text">

                        </div>
                        <vp-link v-show="!slide.special" @click.prevent="openModal('##quiz')">
                            {{ slide.link.title }}
                        </vp-link>
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
    props: ['slides', 'title', 'subtitle', 'id'],
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
        openModal(n){
            this.$emit('open-modal', n);
        }
    }
}
</script>

<style scoped>

</style>