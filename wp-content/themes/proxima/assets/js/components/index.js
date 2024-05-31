import Accordion from './Accordion/Accordion.vue';
import Icon from './Icon/Icon.vue';
import Loader from "./Loader/Loader.vue";
import Modal from "./Modal/Modal.vue";
import Button from "./Button/Button.vue";
import Link from "./Link/Link.vue";
import Dropdown from "./Dropdown/Dropdown.vue";
import FundSlider from "./FundSlider/FundSlider.vue";
import VerticalX3Slider from "./VerticalX3Slider/VerticalX3Slider.vue";
import HorizontalX3Slider from "./HorizontalX3Slider/HorizontalX3Slider.vue";
import HorizontalX3V2Slider from "./HorizontalX3V2Slider/HorizontalX3V2Slider.vue";
import Quiz from "./Quiz/Quiz.vue";
import { Swiper, SwiperSlide } from 'swiper/vue';
import CustomScrollbar from 'custom-vue-scrollbar';
import { MaskInput } from 'vue-3-mask';

let Components

Components = {
    install(Vue) {
        Vue.component('vp-accordion', Accordion);
        Vue.component('vp-icon', Icon)
        Vue.component('vp-loader', Loader)
        Vue.component('vp-modal', Modal)
        Vue.component('vp-quiz', Quiz)
        Vue.component('vp-button', Button)
        Vue.component('vp-link', Link)
        Vue.component('vp-dropdown', Dropdown)
        Vue.component('swiper', Swiper)
        Vue.component('swiper-slide', SwiperSlide)
        Vue.component('custom-scrollbar', CustomScrollbar)
        Vue.component('vertical-x3-slider', VerticalX3Slider)
        Vue.component('fund-slider', FundSlider)
        Vue.component('horizontal-x3-slider', HorizontalX3Slider)
        Vue.component('horizontal-x3-v2-slider', HorizontalX3V2Slider)
        Vue.component('vp-mask', MaskInput);
    }
};

export default Components;
