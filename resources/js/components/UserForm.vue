<template>
  <div class="container">
    <form @submit.prevent="submit">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" v-model="fields.name" />
        <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
      </div>

      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" id="email" v-model="fields.email" />
        <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
      </div>

      <div class="form-group">
        <label for="message">Message</label>
        <textarea
          class="form-control"
          id="message"
          name="message"
          rows="5"
          v-model="fields.message"
        ></textarea>
        <div v-if="errors && errors.message" class="text-danger">{{ errors.message[0] }}</div>
      </div>

      <vue-ladda
        type="submit"
        button-class="btn btn-primary"
        data-style="zoom-in"
        :loading="isloading"
      >Send message</vue-ladda>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isloading: false,
      fields: {},
      errors: {}
    };
  },
  methods: {
    submit() {
      this.isloading = true;
      this.errors = {};
      axios
        .post("/submit", this.fields)
        .then(response => {
          //alert("Message sent!");
          Swal.fire({
            //position: "top-end",
            icon: "success",
            title: "Check your inbox !",
            showConfirmButton: false,
            timer: 1500
          });
          this.isloading = false;
        })
        .catch(error => {
          this.isloading = false;
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
    }
  }
};
</script>
