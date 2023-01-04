<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="row">
                        <div
                            class="col"
                            v-for="item in database"
                            :key="item.id"
                        >
                            <div class="card" style="width: 18rem">
                                <img
                                    :src="item.image"
                                    class="card-img-top"
                                    width="18"
                                    height="400"
                                />
                                <div class="card-body">
                                    <h5 class="card-title text-truncate mt-2">
                                        {{ item.name }}
                                    </h5>
                                    <p class="card-text text-truncate mt-2">
                                        {{ item.description }}
                                    </p>
                                    <p class="card-text">
                                        ราคา {{ item.price }} ฿
                                    </p>
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
