<template>
    <div class="carousel">
        <div class="rotate-left"></div>
        <div id="vids">
            <yt-video v-for="(vid, i) of videoList" :key="i" :vidId="vid"></yt-video>
        </div>
        <div class="rotate-right"></div>
    </div>
</template>

<script src="./script.js"></script>

<style lang="scss" scoped src="./style.scss"></style>