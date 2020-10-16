<template>
    <div>
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2>Categories</h2>
                        <h5><span v-if="currentCategory.title">{{ currentCategory.title }}</span></h5>
                    </div>
                    <div class="col text-right">
                        <router-link class="btn btn-primary" :to="{name: 'CategoryAdd'}">New category</router-link>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col" style="width:50%">Category</th>
                            <th scope="col">Subcategories</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(category, index) in categories">
                            <th>{{ category.id }}</th>
                            <td>{{ category.title }}</td>
                            <td>
                                <div v-if="checkIsSubcategories(category.count_subcategories)">
                                    <router-link
                                        :to="{name: 'CategoryList', params: {category_id: category.id}}"
                                    >{{ category.count_subcategories }}</router-link>
                                </div>
                            </td>
                            <td>
                                <router-link :to="{name: 'CategoryEdit', params: {id: category.id}}">
                                    <button
                                        type="button"
                                        class="btn btn-warning btn-sm"
                                    >Edit</button>
                                </router-link>
                                <button
                                    type="button"
                                    class="btn btn-danger btn-sm"
                                    @click="deleteCategory($event, category.id)"
                                >Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</template>

<script>
    import CategoryDataService from "../../routes/services/CategoryDataService";

    export default {
        data() {
            return {
                loadingComponent: false,
                category_id: null,
                categories: [],
                currentCategory: {
                    title: ''
                }
            }
        },
        methods: {
            async retrieveCategories() {
                await CategoryDataService.getAll(this.$route.params.category_id)
                    .then(r => {
                        this.categories = r.data.data;
                    }).catch(e => {
                        console.log('Something wrong...');
                    }).finally(() => {
                        this.loadingComponent = false;
                    });
            },
            async deleteCategory(e, id) {
                await CategoryDataService.delete(id)
                    .then(r => {
                        const index = this.categories.findIndex(v => v.id === r.data.id);
                        if (index > -1) this.$delete(this.categories, index);
                    }).catch(e => {
                        console.log('Someting wrong...');
                    });
            },
            async getCurrentCategory() {
                this.currentCategory.title = '';
                if(!this.$route.params.category_id) return;

                await CategoryDataService.get(this.$route.params.category_id)
                    .then(r => {
                        this.currentCategory = r.data.data;
                    }).catch(e => {
                        console.log(e.response.data);
                    });
            },
            checkIsSubcategories(count_subcategories) {
                return count_subcategories > 0;
            }
        },
        mounted(){
            this.retrieveCategories();
            this.getCurrentCategory();
        },
        watch: {
            "$route"() {
                this.retrieveCategories();
                this.getCurrentCategory();
            }
        }
    }
</script>

<style scoped>

</style>
