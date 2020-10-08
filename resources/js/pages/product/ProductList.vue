<template>
    <div>
        ProductList
    </div>
</template>

<script>
    import ProductDataService from "../../routes/services/ProductDataService";

    export default {
        data() {
            return {
                loadingComponent: false,
                products: []
            }
        },
        methods: {
            async retrieveProducts() {
                await ProductDataService.getAll()
                    .then(r => {
                        this.products = r.data.data;
                        console.log(this.products);
                    }).catch(e => {
                        console.log('Something wrong...');
                    }).finally(() => {
                        this.loadingComponent = false;
                    });
            }
        },
        mounted(){
            this.retrieveProducts();
        },
    }
</script>

<style>

</style>
