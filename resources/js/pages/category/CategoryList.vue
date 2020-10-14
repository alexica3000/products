<template>
    <div>
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h1>Categories</h1>
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
                            <th scope="col">#</th>
                            <th scope="col" style="width:70%">Category</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(category, index) in categories">
                            <th>{{ index + 1 }}</th>
                                <td>
                                    {{ category.title }}
    <!--                                @if($category->parent == 0 )-->
    <!--                                @include('components.allcat', $category)-->
    <!--                                @endif-->
                                </td>
                            <td>
                                <router-link :to="{name: 'CategoryEdit', params: {id: category.id}}">Edit</router-link> |
                                <a href="#" @click="deleteCategory($event, category.id)">Delete</a>
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
                categories: []
            }
        },
        methods: {
            async retrieveCategories() {
                await CategoryDataService.getAll()
                    .then(r => {
                        this.categories = r.data.data;
                    }).catch(e => {
                        console.log('Something wrong...');
                    }).finally(() => {
                        this.loadingComponent = false;
                    });
            },
            async deleteCategory(e, id) {
                e.preventDefault();

                await CategoryDataService.delete(id)
                    .then(r => {
                        const index = this.categories.findIndex(v => v.id === r.data.id);
                        if (index > -1) this.$delete(this.categories, index);
                    }).catch(e => {
                        console.log('Someting wrong...');
                    });
            }
        },
        mounted(){
            this.retrieveCategories();
        },
    }
</script>

<style scoped>

</style>
