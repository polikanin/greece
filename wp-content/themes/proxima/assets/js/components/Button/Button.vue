<template>
    <div :class="btnClass ?? 'vp-btn'">
        <button :class="`${btnClass??'vp-btn'}--inner ${btnClass??'vp-btn'}--up`" :disabled="btnDisabled">
            <slot name="left"></slot>
            <slot></slot>
            <slot name="right"></slot>
        </button>
        <button :class="`${btnClass??'vp-btn'}--inner ${btnClass??'vp-btn'}--down`" :disabled="btnDisabled">
            <slot name="left"></slot>
            <slot></slot>
            <slot name="right"></slot>
        </button>
    </div>
</template>

<script>
export default {
    name: "Button",
    props: ['icon', 'text', 'btnClass', 'btnDisabled'],
    data() {
        return {}
    },
    mounted() {

    },
    methods: {}
}
</script>

<style lang="scss" scoped>
.vp-accordion {
    &--head {

    }

    &--body {
        overflow: hidden;
    }

    &-enter,
    &-leave-to {
        opacity: 0;
    }

    &-enter-active,
    &-leave-active {
        transition: 0.5s;
    }
}
</style>