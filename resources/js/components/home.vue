<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col" v-for="item in database" :key="item.id">
                        <div class="card" style="width: 18rem">
                            <div class="card-body">
                                <img
                                    :src="item.image"
                                    class="card-img-top"
                                    width="18"
                                    height="400"
                                />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-truncate mt-2">
                                    {{ item.name }}
                                </h5>
                                <p class="card-text text-truncate mt-2">
                                    {{ item.description }}
                                </p>
                                <p class="card-text">ราคา {{ item.price }} ฿</p>
                                <div
                                    class="d-grid gap-2"
                                    role="toolbar"
                                    aria-label="Toolbar with button groups"
                                >
                                    <div
                                        class="btn-group mr-2"
                                        role="group"
                                        aria-label="First group"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                        >
                                            1
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                        >
                                            2
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                        >
                                            3
                                        </button>
                                        <button
                                            type="button"
                                            @click="Dio(item.id)"
                                            class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                        >
                                            ใส่ตระกร้า
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="modal fade"
                            id="exampleModal"
                            tabindex="-1"
                            aria-labelledby="exampleModalLabel"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5
                                            class="modal-title"
                                            id="exampleModalLabel"
                                        >
                                            {{ name }}
                                        </h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                        ></button>
                                    </div>
                                    <div class="modal-body" width="100px">
                                        <img :src="image" width="100%" />
                                    </div>
                                    <div class="container">
                                        <p>{{ description }}</p>
                                        <p>ราคา {{ price }} ฿</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal"
                                        >
                                            Close
                                        </button>
                                        <button
                                            type="button"
                                            @click="buyItem()"
                                            class="btn btn-primary"
                                        >
                                            ซื้อสินค้า
                                        </button>
                                    </div>
                                </div>
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
    mounted() {
        axios.get("api/product").then((data) => {
            this.database = data.data;
        });
    },
    methods: {
        Dio(id) {
            axios.get(`/api/product/show/${id}`).then((data) => {
                (this.Id = data.data.id),
                    (this.name = data.data.name),
                    (this.image = data.data.image),
                    (this.price = data.data.price),
                    (this.description = data.data.description);
            });
        },
        buyItem() {
            const confirmBuy = confirm("คุณต้องการซื้อสินค้าหรือไม่??");
            if (confirmBuy) {
                alert("ซื้อสินค้าเสร็จสิ้น");
            } else {
                alert("คุณได้ยกเลิกการสั่งซื้อสินค้าแล้ว!!");
            }
        },
    },
};
</script>

<style lang="scss" scoped></style>
