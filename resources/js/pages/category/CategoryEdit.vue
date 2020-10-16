<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Edit Category (id: {{ category.id }})</h3>

                <form>
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            id="category"
                            name="category"
                            placeholder="Enter category"
                            v-model="category.title"
                        >
                        <small class="invalid-feedback d-block" >{{ titleErrMessage }}</small>
                        <small id="emailHelp" class="form-text text-muted">Short name of the category</small>
                    </div>

                    <button
                        class="btn btn-primary"
                        @click="updateCategory"
                        :disabled="!disabled"
                    >Update</button>

                    <a class="btn btn-dark" @click="cancel">Cancel</a>
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
                    id: '',
                    title: '',
                },
                titleErrMessage: '',
                isErr: false,
                disabledButton: false
            }
        },
        methods: {
            async  loadCategoryInfo() {
                await CategoryDataService.get(this.$route.params.id)
                    .then(r => {
                        this.category = r.data.data;
                    }).catch(e => {
                        console.log('Something wrong...');
                    });
            },
            updateCategory(e) {
                e.preventDefault();
                let data = {title: this.category.title}

                CategoryDataService.update(this.$route.params.id, data)
                    .then(r => {
                        this.isErr = false;
                        this.$router.push({name: 'CategoryList'});
                    }).catch(e => {
                        this.isError = true;
                        if(e.response.data.message && e.response.data.errors) {
                            const keys = Object.keys(e.response.data.errors);
                            this.titleErrMessage = e.response.data.errors[keys[0]][0];
                        }
                    });
            },
            cancel() {
                this.$router.push({name: 'CategoryList'})
            }
        },
        computed: {
            disabled() {
                return this.category.title.length > 2;
            }
        },
        mounted() {
            this.loadCategoryInfo();
        }
    }
</script>

<style scoped>

</style>
