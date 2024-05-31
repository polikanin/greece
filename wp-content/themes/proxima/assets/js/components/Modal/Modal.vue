<template>
    <transition name="vp-modal">
        <div class="vp-modal">
            <div class="vp-modal--mask" @click="$emit('close')"></div>
            <div class="vp-modal--wrapper">
                <div class="vp-modal--container">


                    <slot name="header">

                    </slot>


                    <div class="vp-modal--body">
                        <slot name="body">

                        </slot>
                    </div>

                    <div class="vp-modal--footer">
                        <slot name="footer">

                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "Dialog"
}
</script>

<style scoped>

</style>