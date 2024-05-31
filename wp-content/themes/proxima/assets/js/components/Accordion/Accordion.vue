<template>
  <div class="vp-accordion">
    <div class="vp-accordion--head" :class="{active: show}" @click="toggle">
      <slot name="head"></slot>
    </div>
    <transition name="vp-accordion"
                v-on:before-enter="beforeEnter" v-on:enter="enter"
                v-on:before-leave="beforeLeave" v-on:leave="leave">
      <div class="vp-accordion--body" v-show="show">
        <slot name="body"></slot>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: "accordeon",
  props: ['isShow'],
  data(){
    return {
      show: false
    }
  },
  mounted (){
      if(this.isShow){
          this.show = this.isShow
      }
  },
  methods: {
    toggle: function() {
      this.show = !this.show;
    },
    beforeEnter: function(el) {
      el.style.height = '0';
    },
    enter: function(el) {
      el.style.height = el.scrollHeight + 1 + 'px';
    },
    beforeLeave: function(el) {
      el.style.height = el.scrollHeight + 1 + 'px';
    },
    leave: function(el) {
      el.style.height = '0';
      el.style.padding = '0';
    }
  }
}
</script>

<style lang="scss" scoped>
.vp-accordion{
  &--head{

  }

  &--body{
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