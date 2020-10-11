<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>New Category</h3>

                <form method="post" action="#">
                    <div class="form-group">
                        <input type="text" class="form-control" id="category" name="category" placeholder="Enter category">
                        <small id="emailHelp" class="form-text text-muted">Short name of the category</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a class="btn btn-dark">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>
