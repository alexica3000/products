<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>New Product</h3>

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
                        type="submit"
                        class="btn btn-primary"
                        @click="addProduct"
                        :disabled="!disabled"
                    >Add</button>
                    <a class="btn btn-dark" href="#" @click="cancel">Cancel</a>
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
                    title: '',
                    description: '',
                    price: '',
                    categories_id: []
                }
            }
        },
        methods: {
            addProduct(e) {
                e.preventDefault();
                this.product.categories_id = [13];

                ProductDataService.create(this.product)
                    .then(r => {
                        this.$router.push({name: 'ProductList'});
                    }).catch(e => {
                        console.log(e.response.data);
                    });
            },
            cancel() {
                this.$router.push({name: 'ProductList'})
            }
        },
        computed: {
            disabled: function() {
                return this.product.title.length > 3 &&
                    this.product.description.length > 3 &&
                    this.product.price > 0;
            }
        }
    }
</script>

<style scoped>

</style>
