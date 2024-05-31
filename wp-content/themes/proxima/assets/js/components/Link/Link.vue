<template>
    <button class="vp-link">
        <slot></slot>
        <vp-icon type="link"></vp-icon>
    </button>
</template>

<script>
export default {
    name: "Link",
    props: ['icon', 'text', 'btnClass', 'btnDisabled'],
    data() {
        return {}
    },
    mounted() {

    },
    methods: {}
}
</script>