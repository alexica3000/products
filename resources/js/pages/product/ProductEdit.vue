<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Edit Product (id: {{ product.id }})</h3>

                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product" name="product" placeholder="Enter product" v-model="product.title">
                        <small id="nameHelp" class="form-text text-muted">Short name of the product</small>

                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" v-model="product.description"></textarea>
                        <small id="descriptionHelp" class="form-text text-muted">Short description</small>

                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" v-model="product.price">
                        <small id="priceHelp" class="form-text text-muted">Price of the product</small>
                    </div>

                    <div>
                        <h4>Select categories:</h4>
                        <ul>
                            <!--                            @foreach ($categories as $category)-->
                            <!--                            @if($category->parent == 0 )-->
                            <!--                            @include('components.category', $category)-->
                            <!--                            @endif-->
                            <!--                            @endforeach-->
                        </ul>
                    </div>
                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="updateProduct"
                        :disabled="!disabled"
                    >Update</button>
                    <button
                        type="button"
                        class="btn btn-dark"
                        @click="cancel"
                    >Cancel</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import ProductDataService from "../../routes/services/ProductDataService";

    export default {
        data() {
            return {
                product: {
                    id: '',
                    title: '',
                    description: '',
                    price: '',
                    categories_id: [13, 14]
                },
                disabledButton: false
            }
        },
        methods: {
            async loadProductInfo() {
                await ProductDataService.get(this.$route.params.id)
                    .then(r => {
                        this.product = r.data.data;
                    }).catch(e => {
                        console.log('Something wrong...');
                    });
            },
            updateProduct(e) {
                ProductDataService.update(this.$route.params.id, this.product)
                    .then(r => {
                        this.$router.push({name: 'ProductList'});
                    }).catch(e => {
                        console.log(e.response);
                    });
            },
            cancel() {
                this.$router.push({name: 'ProductList'})
            }
        },
        computed: {
            disabled() {
                return this.product.title.length > 4;
            }
        },
        mounted() {
            this.loadProductInfo();
        }
    }
</script>

<style scoped>

</style>
