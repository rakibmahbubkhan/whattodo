<template>
    <div class="form-check bg-warning py-3 px-5 rounded">
        <input
            class="form-check-input"
            type="checkbox"
            v-on:change="updateCheck()"
            v-model="item.completed"
        />
        <h4 :class="[item.completed ? 'completed' : '', 'itemText']">
            {{ item.name }}
        </h4>
        <button @click="removeItem()" class="btn btn-outline-danger">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
export default {
    props: ["item"],

    methods: {
        updateCheck() {
            axios
                .put(`item/` + this.item.id, {
                    item: this.item
                })

                .then(response => {
                    if (response.status == 200) {
                        this.$emit("itemchanged");
                    }
                })

                .catch(error => {
                    console.log(error);
                });
        },

        removeItem() {
            axios
                .delete(`item/` + this.item.id)
                .then(response => {
                    if (response.status == 200) {
                        this.$emit("itemchanged");
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>
