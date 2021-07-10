<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <button @click="updateCart('item-name')">add item name</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        // name:"AddCart",
        methods:{
            updateCart(name){
                // console.log(name);
                axios
                    .get(`http://localhost:8000/add/${name}`)
                    .then((response) => {
                        // console.dir(response.data);
                    });
                this.$emit('changeTitle');
            }
        }
    }
</script>
