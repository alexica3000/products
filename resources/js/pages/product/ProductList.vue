<template>
    <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h3>Products</h3>
                    </div>

                    <div class="col text-right">
                        <router-link class="btn btn-primary" :to="{name: 'ProductAdd'}">New product</router-link>
<!--                        <a class="btn btn-primary" href="#">New product</a>-->
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
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(product, index) in products">
                            <th>{{ index + 1 }}</th>
                            <td>{{ product.title }}</td>
                            <td>{{ product.description }}</td>
                            <td>{{ product.price }}</td>
                            <td>
    <!--                            @foreach ($product->categories as $category)-->
    <!--                            <div><a href="{{ route('cat.product', $category->id) }}">{{ $category->title }}</a></div>-->
    <!--                            @endforeach-->
                            </td>
                            <td>Edit | Delete</td>
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
