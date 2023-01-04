<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-16">
        <div class="card border" style="max-width: 400rem;">
          <div class="row">
            <div class="col" v-for="item in database" :key="item.id">
              <div class="-white bg-card text " style="width: 25.6rem">
                <img :src="item.image" class="card-img-top" width="18.75rem" height="400rem" />
                <div class="card-body">
                  <h5 class="card-title text-truncate mt-2">{{ item.name }}</h5>
                  <p class="card-text text-truncate mt-2">
                    {{ item.description }}
                  </p>
                  <p class="card-text"> ฿ {{ item.price }} </p>
                  <div class="text-center">
                    <button
                      type="button"
                      @click="Dio(item.id)"
                      class="btn btn-warning"
                      data-bs-toggle="modal"
                      data-bs-target="#exampleModal"
                    >
                      ใส่ตระกร้า
                    </button>
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
                      <h5 class="modal-title" id="exampleModalLabel">
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
                      <p> ราคา {{ price }} บาท </p>
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-danger"
                        data-bs-dismiss="modal"
                      >
                        Close
                      </button>
                      <button
                        type="button"
                        @click="buyItem()"
                        class="btn btn-warning"
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
  methods:{
      Dio(id){
         axios.get(`/api/product/show/${id}`).then((data) => {
        (this.Id = data.data.id),
          (this.name = data.data.name),
          (this.image = data.data.image),
          (this.price = data.data.price),
          (this.description = data.data.description);
      });
      },
      buyItem(){
          const confirmBuy = confirm("คุณต้องการซื้อสินค้าหรือไม่??")
          if(confirmBuy){
              alert("ซื้อสินค้าเสร็จสิ้น")
          }else{
              alert("คุณได้ยกเลิกการสั่งซื้อสินค้าแล้ว!!")
          }
      }
  }
};
</script>

<style lang="scss" scoped>
</style>