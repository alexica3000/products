<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>New Category</h3>

                <form @submit="addCategory">
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            id="category"
                            name="category"
                            placeholder="Enter category"
                            v-model="category.title"
                        >
                        <small class="form-text text-muted">Short name of the category</small>
                    </div>

                    <select class="form-control" @change="selectCategory">
                        <option value="">Select parent category</option>
                        <option
                            v-for="cat in categories"
                            :value="cat.id"
                        >{{ cat.title }} - id: {{ cat.id }}</option>
                    </select>
                    <small class="form-text text-muted">Select parent category</small>

                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="addCategory"
                        :disabled="!disabled"
                    >Add</button>

                    <button
                        type="button"
                        class="btn btn-dark"
                        @click="goToCategoriesPage"
                    >Cancel</button>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import CategoryList from "./CategoryList";
    import CategoryDataService from "../../routes/services/CategoryDataService";

    export default {
        data() {
            return {
                category: {
                    title: '',
                    p_id: null
                },
                categories: []
            }
        },
        methods: {
            async addCategory() {
                await CategoryDataService.create(this.category)
                    .then(r => {
                        this.goToCategoriesPage();
                    }).catch(e => {
                        console.log(e.response.data);
                    });
            },
            async loadCategories() {
                await CategoryDataService.getAll()
                    .then(r => {
                        this.categories = r.data.data;
                    }).catch(e => {
                        console.log(e.response.data);
                    })
            },
            goToCategoriesPage() {
                !this.fromRoute || !this.fromRoute.name || !this.fromRoute.params
                    ? this.$router.push({name: 'CategoryList'})
                    : this.$router.push({name: this.fromRoute.name, params: this.fromRoute.params});
            },
            selectCategory(e) {
                this.category.p_id = e.target.value;
            }
        },
        computed: {
            disabled: function() {
                return this.category.title.length > 2;
            }
        },
        mounted() {
            this.loadCategories();
        },
        beforeRouteEnter (to, from, next) {
            next(vm => {
                vm.fromRoute = from;
            })
        }
    }
</script>

<style scoped>

</style>
