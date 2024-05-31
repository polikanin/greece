<template>
    <svg class="vp-icon">
        <use v-if="type" :xlink:href="sw_path+'sprite.svg#'+ type"></use>
        <use width="40px" height="40px" v-else :xlink:href="sw_path+'sprite.svg#empty-type'"></use>
    </svg>
</template>

<script>
export default {
    name: "icon",
    props: ['type'],
    data(){
        return {
            sw_path: '/wp-content/themes/proxima/assets/images/',
            //sw_path: './src/assets/images/',
        }
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>