<template>
    <div class="row">
        <div class="col-md-6 d-block mx-auto">
            <div class="card border-primary justify-content-center">
                

                <div class="card-body">
                    <list-view :items="items" v-on:reloadlist="getList()"></list-view>
                    <add-item-form v-on:reloadlist="getList()"></add-item-form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AddItemForm from "./AddItemForm.vue"
import ListView from "./ListView.vue"

export default {
    components: { AddItemForm, ListView, },

    data: function() {
        return {
            items: []
        };
    },

    methods: {
        getList() {
            axios
                .get(`items`)
                .then((responce) => {
                    this.items = responce.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    },

    created() {
        this.getList();
    }
};
</script>
