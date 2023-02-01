<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table caption-top">
                    <caption>
                        <a href="/create" class="btn btn-purple darken-3"
                            >Create Product</a
                        >
                    </caption>
                    
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in database" :key="item.id">
                            <td>{{ item.id }}</td>
                            <td width="100px">
                                <img :src="item.image" width="100%" alt="" />
                            </td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.price }}</td>
                            <td>{{ item.description }}</td>
                            <td>
                                <button
                                    @click="showmodal(item.id)"
                                    type="button"
                                    class="btn btn-success"
                                    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"
                                >
                                    แก้ไข
                                </button>
                            </td>
                            <td>
                                <button
                                    class="btn btn-danger"
                                    @click="deletepro(item.id)"
                                >
                                    ลบ
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div
                    class="modal fade"
                    id="staticBackdrop"
                    data-bs-backdrop="static"
                    data-bs-keyboard="false"
                    tabindex="-1"
                    aria-labelledby="staticBackdropLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5
                                    class="modal-title"
                                    id="staticBackdropLabel"
                                >
                                    Update Product
                                </h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <form @submit.stop.prevent="updatepro()">
                                    <label for="name" class="form-label"
                                        >Name</label
                                    >
                                    <input
                                        v-model="name"
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        placeholder="Product Name"
                                    />
                                    <label for="image" class="form-label"
                                        >Image</label
                                    >
                                    <input
                                        v-model="image"
                                        type="text"
                                        class="form-control"
                                        id="image"
                                        placeholder="Image URL"
                                    />
                                    <label for="price" class="form-label"
                                        >Price</label
                                    >
                                    <input
                                        v-model="price"
                                        type="number"
                                        class="form-control"
                                        id="price"
                                        placeholder="Price"
                                    />
                                    <label for="description" class="form-label"
                                        >Description</label
                                    >
                                    <textarea
                                        class="form-control"
                                        id="description"
                                        rows="3"
                                        v-model="description"
                                    ></textarea>
                                    <br />
                                    <div class="modal-footer">
                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal"
                                        >
                                            Close
                                        </button>
                                        <button
                                            type="submit"
                                            class="btn btn-success"
                                        >
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            database: [],
            Id: "",
            name: "",
            image: "",
            price: "",
            description: "",
        };
    },
    methods: {
        deletepro(id) {
            const confirmdelete = confirm("Confirm Delete!!");
            if (confirmdelete == true) {
                axios
                    .delete(`/api/product/delete/${id}`)
                    .then(() => {
                        alert("Delete Complete");
                        window.location.reload();
                    })
                    .catch((error) => alert("Delete Fail"));
            }
        },
    },
    methods: {
        showmodal(id) {
            axios.get(`/api/product/show/${id}`).then((data) => {
                (this.Id = data.data.id),
                    (this.name = data.data.name),
                    (this.image = data.data.image),
                    (this.price = data.data.price),
                    (this.description = data.data.description);
            });
        },
        updatepro() {
            axios
                .post(`/api/product/update/${this.Id}`, {
                    name: this.name,
                    image: this.image,
                    price: this.price,
                    description: this.description,
                })
                .then(() => {
                    alert("Update Complete!!");
                    window.location.reload();
                })
                .catch((error) => alert("Update Fail"));
        },
    },
    mounted() {
        axios.get("api/product").then((data) => {
            this.database = data.data;
        });
    },
};
</script>

<style lang="scss" scoped></style>
