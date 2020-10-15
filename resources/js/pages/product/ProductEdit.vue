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
                            <li v-for="category in categories">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            :value="category.id"
                                            v-model="selectedCategoriesId"
                                        >
                                    {{ category.title }}</label>
                                </div>
                            </li>
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
    import CategoryDataService from "../../routes/services/CategoryDataService";

    export default {
        data() {
            return {
                product: {
                    id: '',
                    title: '',
                    description: '',
                    price: '',
                    categories: []
                },
                categories: [],
                selectedCategoriesId: [],
                disabledButton: false,
            }
        },
        methods: {
            async loadProductInfo() {
                await ProductDataService.get(this.$route.params.id)
                    .then(r => {
                        this.product = r.data.data;
                        this.getSelectedCategories();
                    }).catch(e => {
                        console.log('Something wrong...');
                    });
            },
            async loadCategoriesInfo() {
                await CategoryDataService.getAll()
                    .then(r => {
                        this.categories = r.data.data;
                    }).catch(e => {
                        console.log(e.response.data);
                    });
            },
            async updateProduct() {
                this.product.categories_id = this.selectedCategoriesId;

                await ProductDataService.update(this.$route.params.id, this.product)
                    .then(r => {
                        this.$router.push({name: 'ProductList'});
                    }).catch(e => {
                        console.log(e.response.data);
                    });
            },
            cancel() {
                this.$router.push({name: 'ProductList'})
            },
            getSelectedCategories() {
                this.selectedCategoriesId = this.product.categories.map(el => el.id);
            }
        },
        computed: {
            disabled() {
                return this.product.title.length > 4;
            },
        },
        components: {

        },
        mounted() {
            this.loadProductInfo();
            this.loadCategoriesInfo();
        }
    }
</script>

<style scoped>

</style>
