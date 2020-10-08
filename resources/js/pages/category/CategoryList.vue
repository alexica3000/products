<template>
    <div>
        CategoryList
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
            }
        },
        mounted(){
            this.retrieveCategories();
        },
    }
</script>

<style scoped>

</style>
