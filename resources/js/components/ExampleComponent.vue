<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark my-5">
            <div class="navbar-nav">
                <div class="d-flex inline">
                <router-link to="/vue" class="nav-item nav-link mr-2">About</router-link>
                <router-link to="/add" class="nav-item nav-link mr-2">Add Cart</router-link>
                </div>
            </div>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header text-primary">Add to cart no.:  {{title}}</h3>
                        
                    <div class="card-body">
                        <br/>
                            <router-view v-on:changeTitle="cartNo"></router-view>
                        <!-- <AddCart v-on:changeTitle="cartNo"/> -->
                    </div>
                </div>
            </div>
        </div>
        <button @click="saveCookies">save token / data in cookies using api</button>
        <button @click="getCookie">get token / data in cookies using api</button>
    </div>
</template>

<script>
// import AddCart from './addCart.vue'// ata hoyato vue js lagte pare kintu laravel-vue lage na

    export default {
        // name:"example-component",// ata hoyato vue js lagte pare kintu laravel-vue lage na
        mounted() {
            this.getAddNo();
        },
        data(){
            return{
                title:''
            }
        },
        methods:{
            cartNo(){
                this.getAddNo();
                // this.title="update tilte";
            },
            getAddNo(){
                axios
                .get(`http://localhost:8000/addno`)
                .then((response) => {
                    // console.log(response.data);
                    this.title=response.data
                });
            },
            saveCookies(){
                axios
                .get(`/api/saveCookies`)
                .then((response) => {
                    console.log(response.data);
                });
            },
            getCookie(){
                axios
                .get(`/api/getCookie`)
                .then((response) => {
                    console.log(response.data);
                });
            }
        }
    }
</script>
