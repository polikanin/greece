<template>
    <div class="vp-dropdown">
        <div class="vp-dropdown--value" @click="isOpen = !isOpen">
            <template v-if="selected">
                <img v-show="selected.icon" :src="selected.icon">
                {{ selected.value }}

                <div class="vp-dropdown--value-arr" :class="{'active': isOpen}">
                    <vp-icon type="arrow-down"></vp-icon>
                </div>
            </template>
        </div>
        <div class="vp-dropdown--menu" v-show="isOpen">
            <div class="vp-dropdown--menu-inner">
                <div class="vp-dropdown--menu-item" @click="select(item)" v-for="item in list">
                    <img v-show="item.icon" :src="item.icon">
                    <span class="vp-dropdown--menu-item--val">{{ item.value }}</span>
                    <span class="vp-dropdown--menu-item--name">{{ item.name }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios'

export default {
    name: "Button",
    props: ['list'],
    data() {
        return {
            selected: false,
            isOpen: false
        }
    },
    mounted() {
        let self = this

        if (self.list.length > 0) {
            axios.get("https://ipinfo.io/?token=9381d644f087f7")
                .then(function (response) {
                    let payload = response.data
                    if(self.list[0].countryCode){
                        let currentCountry = self.list.find(item => {
                            return item.countryCode.toLowerCase() === payload.country.toLowerCase()
                        })
                        if(!currentCountry){
                            self.select(self.list[0])
                        }
                        else{
                            self.list.splice(self.list.indexOf(currentCountry), 1)
                            self.list.unshift(currentCountry)
                        }
                    }
                    else if(self.list[0].mask){
                        let currentCountry = self.list.find(item => {
                            return item.mask.toLowerCase() === Intl.DateTimeFormat().resolvedOptions().timeZone.toLowerCase()
                        })
                        if(!currentCountry){
                            self.select(self.list[0])
                        }
                        else{
                            self.list.splice(self.list.indexOf(currentCountry), 1)
                            self.list.unshift(currentCountry)
                        }
                    }
                })
                .catch(error => {

                })
                .finally(() => {
                    self.select(self.list[0])
                })
        }

        window.addEventListener('click', function (e) {
            if (!e.target.closest('.vp-dropdown')) {
                self.isOpen = false
            }
        })
    },
    methods: {
        select(item) {
            this.selected = item
            this.isOpen = false
            this.$emit('select', item)
        }
    }
}
</script>

<style lang="scss" scoped>

</style>