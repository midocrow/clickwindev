<template>
  <div class="container">
    <form @submit.prevent="submit">
      <div class="card is-black" :style="{ 'background-color': 'black' }">
        <div class="card-content">
          <div class="media">
            <div class="media-left">
              <span
                :style="{
                                    'background-image': color,
                                    width: '145px',
                                    color: 'white'
                                }"
                :class="
                                    zone == 'red'
                                        ? 'tag is-danger is-medium'
                                        : zone == 'green'
                                        ? 'tag is-success is-medium'
                                        : 'tag is-link is-medium'
                                "
              >{{ title }}</span>
            </div>
            <div class="media-content"></div>
            <div class="media-right">
              <span class="tag is-warning is-medium">
                <transition name="bounce">
                  <p id="pp" v-if="show">
                    {{
                    zone == "red"
                    ? "+10"
                    : zone == "green"
                    ? "+1"
                    : "+15"
                    }}
                  </p>
                </transition>
                <img
                  style="width:20px;margin-left:3px;margin-bottom:1.5px;"
                  src="/storage/cwin.png"
                />
              </span>
            </div>
          </div>

          <div class="content">
            <div class="field has-addons">
              <div class="control is-large is-expanded">
                <input
                  style="background-color:transparent;color:lightgrey;"
                  class="input is-rounded"
                  type="text"
                  v-model="fields.link"
                  placeholder="https://www.link.com"
                  disabled
                />
              </div>
              <div class="control">
                <a
                  class="button has-background-grey-lighter is-rounded"
                  href="javascript:void()"
                  @click="open()"
                >
                  <span class="icon">
                    <i class="fas fa-window-restore"></i>
                  </span>
                  <span>Open</span>
                </a>
              </div>
            </div>

            <div class="columns">
              <div class="column is-6 is-offset-3">
                <div class="field has-addons">
                  <div
                    :class="
                                            isloading
                                                ? 'control is-medium  is-loading'
                                                : 'control is-medium '
                                        "
                  >
                    <input
                      :id="zone"
                      style="font-size:18px;"
                      :class="
                                                isError
                                                    ? 'input is-medium is-rounded is-danger'
                                                    : 'input has-background-light is-medium is-rounded'
                                            "
                      type="text"
                      v-model="fields.code"
                      placeholder="Confirm tracking code"
                      required
                      maxlength="16"
                      minlength="16"
                      size="16"
                    />
                  </div>
                  <div class="control">
                    <button
                      id="bs"
                      style="font-size:18px;color:black;"
                      class="button is-medium is-warning is-rounded"
                      type="submit"
                    >
                      <span>Submit</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="media">
              <div class="media-left">
                <div class="control">
                  <div class="tags has-addons">
                    <span class="tag is-white">
                      {{
                      fields.name
                      }}
                    </span>
                    <span class="tag has-background-grey-lighter">{{ fields.count }}</span>
                  </div>
                </div>
              </div>
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
        link: "",
        zone: this.zone
      },
      show: true,
      count: 0,
      points: "203",
      isloading: false,
      isError: false,
      errors: {}
    };
  },
  mounted() {
    // console.log("Component mounted " + this.fields.zone);
    this.load();
  },
  methods: {
    open() {
      // console.log(this.fields.link);
      window.value = this.zone;
      window.open(this.fields.link);
    },
    load() {
      axios
        .get("/load", {
          params: {
            link: this.fields.link,
            zone: this.fields.zone
          }
        })
        .then(response => {
          //console.log(response.data[0]);

          this.fields.link = response.data[0].link;
          this.fields.code = response.data[0].code;

          this.fields.name = response.data[0].name;
          this.fields.count = response.data[1] + 1;
          this.isloading = false;
        })
        .catch(error => {
          this.isloading = false;
          this.isError = true;
          //console.log(error.response);
        });
    },
    updatePoints() {},
    submit() {
      this.isloading = true;
      axios
        .post("/check", this.fields)
        .then(response => {
          //alert("Message sent!");
          this.isError = false;
          this.fields.code = response.data[0].code;
          //console.log(response.data);

          this.show = !this.show;
          setTimeout(() => {
            this.show = !this.show;
          }, 100);

          switch (this.zone) {
            case "red":
              this.$store.commit("changePoints", this.$store.state.points + 10);
              break;
            case "green":
              this.$store.commit("changePoints", this.$store.state.points + 1);
              break;
            case "blue":
              this.$store.commit("changePoints", this.$store.state.points + 15);
              break;
            default:
              this.$store.commit("changePoints", this.$store.state.points + 1);
              break;
          }
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
          grapes: "Absence of adds in the link",
          moquito: "Link over Link",
          other: "Other raisons"
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
