<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form @submit.stop.prevent="AddPro()">
          <label for="name" class="form-label">Name</label>
          <input
            v-model="name"
            type="text"
            class="form-control"
            id="name"
            placeholder="Product Name"
          />
          <label for="image" class="form-label">Image</label>
          <input
            v-model="image"
            type="text"
            class="form-control"
            id="image"
            placeholder="Image URL"
          />
          <label for="price" class="form-label">Price</label>
          <input
            v-model="price"
            type="number"
            class="form-control"
            id="price"
            placeholder="Price"
          />
          <label for="description" class="form-label">Description</label>
          <textarea
            class="form-control"
            id="description"
            rows="3"
            v-model="description"
          ></textarea>
          <br />
          <button class="btn btn-success" type="submit">Save</button>
          <a href="/admin" class="btn btn-outline-light">Back to Admin</a>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      image: "",
      price: "",
      description: "",
    };
  },
  methods: {
    AddPro() {
      axios
        .post("/api/product/store", {
          name: this.name,
          image: this.image,
          price: this.price,
          description: this.description,
        })
        .then(() => {
          alert("Save Success");
          window.location.reload();
        })
        .catch((error) => alert("Save Fail"));
    },
  },
};
</script>

<style lang="scss" scoped>
</style>