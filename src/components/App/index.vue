<template>
    <div class="app">
        <carousel></carousel>
        <div class="d-flex justify-content-end align-items-center">
            <a :href="`https://www.youtube.com/playlist?list=${playlistId}`" class="btn btn-primary mr-4" target="_blank">View Full Playlist</a>
        </div>
    </div>
</template>

<script src="./script.js"></script>

<style lang="scss" scoped src="./style.scss"></style>