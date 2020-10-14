<template>
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3>Products</h3>
                </div>

<!--                @if (Auth::check())-->
<!--                <div class="col text-right">-->
<!--                    <a class="btn btn-primary" href="{{ route('product.create') }}">New product</a>-->
<!--                </div>-->
<!--                @endif-->
            </div>
        </div>

        <div class="card-body">

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
                        <td>
<!--                            <a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a>-->
                        </td>
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

<style>

</style>
