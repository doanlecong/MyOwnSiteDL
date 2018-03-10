<template>
    <div class="container">
        <div>
            <transition class="fade">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<script>
    export default {
        name : 'App.vue',
    }
</script>

<style scoped>
    .fade-enter-active,.fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-active {
        opacity: 0;
    }
</style>