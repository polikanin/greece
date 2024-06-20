<template>
    <h2 class="vp-title" v-if="title && (link || subtitle)" v-html="title">

    </h2>
    <h2 class="vp-subtitle" v-if="title && link" v-html="subtitle">

    </h2>

    <div class="vp-new-step-block--head">
        <vp-button v-if="link" @click.prevent="openModal(link['url'])">
            <vp-icon type="subtitle"></vp-icon>
            <span class="vp-btn--text">{{ link['title'] }}</span>
        </vp-button>

        <h2 class="vp-subtitle" v-if="!link && subtitle" v-html="subtitle">

        </h2>

        <h2 class="vp-title" v-if="!link && !subtitle && title" v-html="title">

        </h2>

        <div class="vp-new-step-block--ctrl vp-hidden-mob" :class="{'set-ellipse': slides.length > 6}">
            <div class="vp-swiper-button-prev swiper-button-disabled">
                <vp-icon type="arrow-left"></vp-icon>
            </div>
            <div class="vp-swiper-pagination" v-if="!isMobile && isPagination"></div>
            <div class="vp-swiper-button-next">
                <vp-icon type="arrow-right"></vp-icon>
            </div>
        </div>
    </div>

    <swiper
        v-if="slides && isLoad"
        :modules="modules"
        :navigation="{
                        nextEl: '#'+ id + ' .vp-swiper-button-next',
                        prevEl: '#'+ id + ' .vp-swiper-button-prev',
                     }"
        :pagination="pagination"
        :breakpoints="{
                      '320': {
                        slidesPerView: 1,
                        autoHeight: true,
                        spaceBetween: 20
                      },
                      '560': {
                        slidesPerView: 1,
                        spaceBetween: 20
                      },
                      '661': {
                        slidesPerView: 'auto',
                        spaceBetween: 64
                      },
                    }"
    >
        <swiper-slide v-for="(slide, index) in slides">
            <div class="vp-fund-slide" :class="{'vp-fund-slide--special': slide.special_design}">
                <div class="vp-fund-slide--index"
                     :class="{'vp-hidden-mob': !labelOnMobile}"
                >
                    <div class="">
                        {{ index + 1 }}
                    </div>
                </div>

                <div class="vp-fund-slide--slider" v-show="!slide.special_design" :id="id + '_slider_' + index">
                    <swiper
                        v-if="isLoad"
                        :modules="modules"
                        :navigation="{
                        nextEl: '#'+ id + '_slider_' + index + ' .vp-fund-slide--button-next',
                        prevEl: '#'+ id + '_slider_' + index + ' .vp-fund-slide--button-prev',
                     }"
                        :pagination="{
                            el: '#'+ id + '_slider_' + index + ' .vp-fund-slide--pagination',
                        }"
                    >
                        <swiper-slide v-for="item in slide['slider']">
                            <img :src="item.url" alt="">
                        </swiper-slide>
                    </swiper>

                    <div class="vp-fund-slide--ctrl">
                        <div class="vp-fund-slide--button-prev">
                            <vp-icon type="arrow-left"></vp-icon>
                        </div>
                        <div class="vp-fund-slide--pagination"></div>
                        <div class="vp-fund-slide--button-next">
                            <vp-icon type="arrow-right"></vp-icon>
                        </div>
                    </div>
                </div>

                <div class="vp-fund-slide--head" v-show="!slide.special_design">
                    <div class="vp-fund-slide--title" v-html="slide['description']">

                    </div>
                </div>
                <div class="vp-fund-slide--body" v-show="!slide.special_design" v-if="slide['options']">
                    <div class="vp-fund-slide--items">
                        <template v-for="point in slide['options']">
                            <div class="vp-fund-slide--item-title" v-html="point['title']">

                            </div>
                            <div class="vp-fund-slide--item-value" v-html="point['value']">

                            </div>
                        </template>
                    </div>
                </div>

                <div class="vp-fund-slide--special-container"
                     v-show="slide.special_design"
                     @click.prevent="openModal(slide['link']['url'])"
                >
                    <div class="vp-fund-slide--layout" v-html="slide['text']">

                    </div>
                    <div class="vp-fund-slide--img">
                        <img :src="slide.image.url" alt="">
                    </div>
                </div>
            </div>
        </swiper-slide>

        <swiper-slide class="vp-last-slide vp-hidden-mob"></swiper-slide>
    </swiper>

    <div class="vp-fund-step-block--ctrl vp-show-mob" :class="{'set-ellipse': slides.length > 6}">
        <div class="vp-swiper-button-prev swiper-button-disabled">
            <vp-icon type="arrow-left"></vp-icon>
        </div>
        <div class="vp-swiper-pagination" v-if="isMobile && isPagination"></div>
        <div class="vp-swiper-button-next">
            <vp-icon type="arrow-right"></vp-icon>
        </div>
    </div>
</template>

<script>
import { Pagination, Navigation } from 'swiper/modules';
import 'swiper/css/pagination';
import 'swiper/css/navigation';

export default {
    name: "HorizontalX3Slider",
    props: ['slides', 'title', 'subtitle', 'link', 'id', 'isPagination'],
    data() {
        return {
            isLoad: false,
            isMobile: false,
            modules: [Pagination, Navigation],
            activeSlide: 0,
            slider: false,
            pagination: {
                el: '#'+ this.id + ' .vp-swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + '</span>';
                },
            },
        }
    },
    mounted() {
        let self = this;

        if(window.innerWidth < 661){
            self.isMobile = true
        }

        setTimeout(function () {
            self.isLoad = true
        }, 100)

        window.addEventListener('resize', function(){
            self.isLoad = false
            if(window.innerWidth < 661){
                self.isMobile = true
            }
            else {
                self.isMobile = false
            }

            setTimeout(function (){
                self.isLoad = true
            }, 100)
        })
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
        openModal(id) {
            this.$emit('open-modal', id);
        }
    }
}
</script>

<style scoped>

</style>