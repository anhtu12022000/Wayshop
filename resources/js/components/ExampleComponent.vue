<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                   <div class="text-center p-5">
                       <vue-goodshare-facebook
                        page_url="http://dailyshop.com/"
                        image="http://dailyshop.com/front_assets/image/logo.jpg"
                        title_social="Facebook"
                        button_design="outline"
                        has_counter
                        has_icon
                      ></vue-goodshare-facebook>
                   </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueGoodshareFacebook from "vue-goodshare/src/providers/Facebook.vue";
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            VueGoodshareFacebook
        }
    }
</script>
