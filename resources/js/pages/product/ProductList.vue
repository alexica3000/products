<template>
    <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h3>Products</h3>
                    </div>

                    <div class="col text-right">
                        <router-link class="btn btn-primary" :to="{name: 'ProductAdd'}">New product</router-link>
                    </div>
                </div>
            </div>

            <div class="spinner-border" role="status" v-if="loadingComponent">
                <span class="sr-only">Loading...</span>
            </div>

            <div class="card-body" v-else>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(product, index) in products">
                            <th>{{ product.id }}</th>
                            <td>{{ product.title }}</td>
                            <td>{{ product.description }}</td>
                            <td>{{ product.price }}</td>
                            <td>
                                <div v-for="category in product.categories">
                                    {{ category.title }} (id: {{ category.id }})
                                </div>
                            </td>
                            <td>
                                <router-link :to="{name: 'ProductEdit', params: {id: product.id}}">
                                    <button
                                        type="button"
                                        class="btn btn-warning btn-sm"
                                        @click=""
                                    >Edit</button>
                                </router-link>

                                <button
                                    type="button"
                                    class="btn btn-danger btn-sm"
                                    @click="deleteProduct($event, product.id)"
                                >Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
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
                this.loadingComponent = true;

                await ProductDataService.getAll()
                    .then(r => {
                        this.products = r.data.data;
                    }).catch(e => {
                        console.log('Something wrong...');
                    }).finally(() => {
                        this.loadingComponent = false;
                    });
            },
            async deleteProduct(e, id) {
                await ProductDataService.delete(id)
                    .then(r => {
                        const index = this.products.findIndex(v => v.id === r.data.id);
                        if (index > -1) this.$delete(this.products, index);
                    }).catch(e => {
                        console.log(e.response);
                    });
            }
        },
        mounted(){
            this.retrieveProducts();
        },
    }
</script>

<style scoped>
    .spinner-border {
        margin: 30px;
    }
</style>
