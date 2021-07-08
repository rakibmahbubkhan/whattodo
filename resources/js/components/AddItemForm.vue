<template>
    <div class="d-flex justify-content-center">
        <form class="d-flex inline-item">
            <input class="form-control mr-sm-2" type="text" placeholder="Type" v-model="item.name"/>
            <a @click="addItem()" class="btn btn-outline-success my-2 my-sm-0" :class="[item.name ? 'active' : 'disabled']" >
                <font-awesome-icon icon="plus-square" />
            </a>
        </form>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            item: {
                name: "",
            }
        };
    },

    methods: {
        addItem() {
            if (this.item.name == "") {
                return;
            }

            axios
                .post(`item/store`, {
                    item: this.item
                })
                .then((responce) => {
                    if (responce.status == "201") {
                        this.item.name == "";
                        this.$emit('reloadlist');
                    }
                })

                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>
