<template>
  <div class="container">
    <form @submit.prevent="submit">
      <div class="card" :style="{'background-color': 'black' }">
        <div class="card-content">
          <div class="media">
            <div class="media-left">
              <p class="title is-4" style="font-family:Bitter,serif;">
                <span
                  class="tag is-warning is-medium"
                  :style="{'background-image': color,'color':'white','width':'145px'}"
                >{{ title }}</span>
              </p>
            </div>
            <div class="media-content"></div>
            <div class="media-right">
              <span class="tag is-warning is-medium">
                <transition name="bounce">
                  <p id="pp" v-if="show">+20</p>
                </transition>
                <img src="/storage/cwin.png" width="55px" />
              </span>
            </div>
          </div>

          <div class="content">
            <div class="field">
              <div class="control">
                <a
                  class="button is-light is-rounded is-fullwidth"
                  href="javascript:void()"
                  @click="open()"
                >
                  <span class="icon">
                    <i class="fas fa-window-restore"></i>
                  </span>
                  <span>Open vip link</span>
                </a>
              </div>
            </div>

            <div class="columns">
              <div class="column is-6 is-offset-3">
                <div class="field has-addons">
                  <div :class="isloading ? 'control is-medium  is-loading' : 'control is-medium '">
                    <input
                      :id="zone"
                      style="font-size:18px;"
                      :class="isError ? 'input is-medium is-rounded is-danger' : 'input is-medium is-rounded'"
                      type="text"
                      v-model="fields.code"
                      placeholder="Confirm tracking code"
                    />
                  </div>
                  <div class="control">
                    <button
                      id="bs"
                      style="font-size:18px;"
                      class="button is-warning is-medium is-rounded"
                      type="submit"
                    >
                      <span>Submit</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="media">
              <div class="media-left"></div>
              <div class="media-content"></div>
              <div class="media-right">
                <div class="field has-addons">
                  <div class="control">
                    <a @click="skip()" class="button is-light is-small is-rounded">
                      <span class="icon">
                        <i class="fas fa-forward"></i>
                      </span>
                      <span>Skip</span>
                    </a>
                  </div>
                  <div class="control">
                    <a
                      @click="report()"
                      class="button has-background-grey-lighter is-small is-rounded"
                    >
                      <span class="icon">
                        <i class="fas fa-exclamation-circle"></i>
                      </span>
                      <span>Report</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: ["zone", "title", "color"],
  data() {
    return {
      link: "",
      fields: {
        link: "/home",
        zone: this.zone
      },
      show: true,
      points: "203",
      isloading: false,
      isError: false,
      errors: {}
    };
  },
  mounted() {
    console.log("Component mounted " + this.fields.zone);
    this.load();
  },
  methods: {
    open() {
      console.log(this.fields.link);
      window.value = this.zone;
      window.open("/watch" + this.fields.link + "?autoplay=1");
    },
    load() {
      axios
        .get("/getgoldlink", {
          params: {
            link: this.fields.link,
            zone: this.fields.zone
          }
        })
        .then(response => {
          console.log(response.data);

          this.fields.link = "?link=" + response.data;
          //this.fields.code = response.data;
          this.isloading = false;
        })
        .catch(error => {
          this.isloading = false;
          this.isError = true;
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
    },
    updatePoints() {},
    submit() {
      this.isloading = true;
      axios
        .post("/checkgoldlink", this.fields)
        .then(response => {
          //alert("Message sent!");
          this.isError = false;
          this.fields.code = response.data[0].code;
          console.log(response.data);

          this.show = !this.show;
          setTimeout(() => {
            this.show = !this.show;
          }, 100);
          this.$store.commit("changePoints", this.$store.state.points + 20);
          this.isloading = false;
          this.fields.code = "";
          this.load();
        })
        .catch(error => {
          this.isloading = false;
          this.isError = true;
          Swal.fire({
            //position: "top-end",
            icon: "error",
            title: "Code is incorect!",
            showConfirmButton: false,
            timer: 500
          });

          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
    },
    skip: function() {
      this.isloading = true;
      axios
        .post("/skiplink", this.fields)
        .then(response => {
          this.load();
        })
        .catch(error => {
          this.isloading = false;
          this.isError = true;

          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
    },
    report: async function() {
      const { value: fruit } = await Swal.fire({
        title: "What's wrong with this link",
        input: "select",
        html: "<textarea class='textarea' placeholder='Explain'></textarea>",
        inputOptions: {
          apples: "Inappropriate content",
          bananas: "Absence of tracking code",
          oranges: "Other raisons"
        },
        inputPlaceholder: "Select something",
        showCancelButton: true,
        confirmButtonColor: "#ffd419"
      });

      if (fruit) {
        Swal.fire(`thanks for helping!`);
      }
    }
  }
};
</script>

<style scoped>
.card {
  border-radius: 10px;
}
p {
  color: white;
  font-family: "Anton", sans-serif;
}
#pp {
  color: black;
  font-family: "Bangers", sans-serif;
}
.bounce-enter-active {
  animation: bounce-in 0.5s;
}
.bounce-leave-active {
  animation: bounce-in 0.5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(2);
  }
  100% {
    transform: scale(1);
  }
}
::-moz-placeholder {
  font-size: 16px;
  opacity: 0.5;
}
::placeholder {
  font-size: 17px;
  opacity: 0.5;
}
#bs:hover {
  background-color: #f3ca12;
}
a:hover {
  color: unset;
}
</style>

