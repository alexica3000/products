<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Edit Category</h3>

                <form @submit="addCategory">
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            id="category"
                            name="category"
                            placeholder="Enter category"
                            v-model="categoryName"
                        >
                        <small class="invalid-feedback d-block" >{{ titleErrMessage }}</small>
                        <small id="emailHelp" class="form-text text-muted">Short name of the category</small>
                    </div>

                    <button
                        class="btn btn-primary"
                        @click="addCategory"
                        :disabled="!disabled"
                    >Add</button>

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
                categoryName: '',
                titleErrMessage: '',
                isErr: false
            }
        },
        methods: {
            addCategory(e) {
                e.preventDefault();

                CategoryDataService.create({title: this.categoryName})
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
            disabled: function() {
                return this.categoryName.length > 3;
            }
        }
    }
</script>

<style scoped>

</style>
