<template>

    <body>

    <div class="grid"></div>

    <template id="card-template">
        <div class="card">
            <div class="header">
                <img class="header-img skeleton" src="https://source.unsplash.com/100x100/?nature" />
                <div class="title" data-title>
                    <div class="skeleton skeleton-text"></div>
                    <div class="skeleton skeleton-text"></div>
                </div>
            </div>
            <div data-body>
                <div class="skeleton skeleton-text"></div>
                <div class="skeleton skeleton-text"></div>
                <div class="skeleton skeleton-text"></div>
                <div class="skeleton skeleton-text"></div>
            </div>
        </div>
    </template>
    </body>
</template>
<script>
export default {
    data(){
        return{
            msg:"FU"
        }
    },
    mounted(){
        console.log("MOUNTED")
    }
}

</script>
<style>
@import "../assets/styles/sekeleton.css";
</style>
