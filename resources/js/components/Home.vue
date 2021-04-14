<template>
  <section class>
    <div class>
      <span class="has-text-light has-text-weight-bold is-size-1">Your link</span>
      <br />
      <br />
      <br />
      <div class="columns">
        <div class="column is-two-thirds">
          <img
            v-if="false"
            src="/storage/CW2.png"
            alt="FaultHero: automatic reporting and notification"
          />

          <span
            :class="
                            expired
                                ? 'has-text-danger  has-text-light has-text-weight-bold is-size-3'
                                : 'has-text-light  has-text-light has-text-weight-bold is-size-3'
                        "
          >
            {{
            expired ? "Link was expired" : "Expiration time"
            }}
          </span>
          <filpcountdown :deadline="edit_time"></filpcountdown>
        </div>

        <div class="column">
          <div v-if="edit === false && currentlink !== ''">
            <div class="field" v-if="currentlink !== ''">
              <label class="label is-large">Current link</label>
              <div class="control has-icons-right">
                <input
                  v-model="currentlink"
                  type="text"
                  placeholder="Add your link"
                  class="input is-large"
                />
                <span @click="copy()" class="icon is-right is-medium is-active">
                  <i class="fas fa-copy"></i>
                </span>
              </div>
            </div>

            <div class="field is-centered" v-if="edit === false">
              <div class="control">
                <button id="bs" @click="edit = true" class="button is-large is-warning">Edit</button>
              </div>
            </div>
          </div>
          <!--  <h3
            class="has-text-light has-text-weight-bold is-size-1"
          >{{ currentlink == "" ? "Add a link" : "Update link" }}</h3>-->

          <div v-if="currentlink === '' || edit === true">
            <div class="field" v-if="step == 1">
              <label class="label is-large">Link</label>
              <div class="control">
                <input
                  v-model="newlink"
                  type="text"
                  placeholder="e.g. bruce@batcave.io"
                  class="input is-large"
                />
              </div>
            </div>

            <div class="field" v-if="step == 0">
              <label class="label is-large">Tracking code</label>
              <div class="control has-icons-right">
                <input
                  id="code"
                  v-model="code"
                  type="text"
                  placeholder="e.g. ***********"
                  class="input is-large"
                />
                <span @click="copy()" class="icon is-right is-medium is-active">
                  <i class="fas fa-copy"></i>
                </span>
              </div>
            </div>

            <div class="field">
              <div class="control">
                <button
                  id="bs"
                  @click="handle()"
                  class="button is-large is-warning"
                >{{ step == 0 ? "Next" : "Submit" }}</button>
                <button
                  id="back"
                  v-if="step == 1"
                  @click="back()"
                  class="button is-large is-dark"
                >Back</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <article class="message is-danger">
        <div class="message-header">
          <p>Keep in mind</p>
        </div>
        <div class="message-body">
          <div class="columns">
            <div class="column is-three-quarters">
              <p id="war">
                - You should use Twitter for making your adding
                link.
                <br />- Putting link over link is not allowed.
                <br />- Your link should be updated every 24
                hours.
                <br />- The ranking link will be updated
                automatically by the system every 24 hours.
              </p>
              <p id="more">
                <a href="#">Read more</a>
              </p>
            </div>
            <div class="column">
              <img id="img" src="/storage/warning-sign.png" width="85px" />
            </div>
          </div>
        </div>
      </article>
    </div>
  </section>
</template>

<script>
export default {
  mounted() {
    //this.getlink();
    this.generatecode();
    if (this.expired) this.currentlink = "";
    //if (this.currentlink == undefined) this.step = 1;
  },
  props: ["currentlink", "edit_time", "expired"],
  data() {
    return {
      newlink: "",
      code: "",
      step: 0,
      edit: false,
      deadline: ""
    };
  },
  methods: {
    generatecode: function() {
      axios
        .get("/generatecode")
        .then(response => {
          this.code = response.data;
        })
        .catch(error => {});
    },
    getlink: function() {
      axios
        .get("/getlink")
        .then(response => {
          this.link = response.data[0].link;
          this.code = response.data[0].code;
        })
        .catch(error => {});
    },
    handle: function() {
      if (this.step == 0) this.step = 1;
      else this.submit();
    },
    back: function() {
      this.step = 0;
    },
    copy: function() {
      let CodeToCopy = document.querySelector("#code");
      CodeToCopy.setAttribute("type", "text"); // 不是 hidden 才能複製
      CodeToCopy.select();
      try {
        var successful = document.execCommand("copy");
      } catch (err) {
        alert("Oops, unable to copy");
      }
      window.getSelection().removeAllRanges();
    },
    submit: function() {
      axios
        .post("/addlink", { link: this.newlink, code: this.code })
        .then(response => {
          this.currentlink = this.newlink;
          this.step = 0;
          Swal.fire({
            //position: "top-end",
            icon: "success",
            title: "Link  added successfully !",
            showConfirmButton: false,
            timer: 1000
          });
          location.replace("/link");
        })
        .catch(error => {
          Swal.fire({
            //position: "top-end",
            icon: "error",
            title: "Link is invalid!",
            showConfirmButton: false,
            timer: 1000
          });
        });
    }
  }
};
</script>
<style scoped>
.label {
  color: white;
  text-align: left;
  font-family: "Crete Round";
}
.input {
  background-color: gray;
}
.control .icon {
  pointer-events: initial;
}
#bs:hover {
  background-color: orange;
}
#bs {
  margin-left: 35%;
}
.message-body {
  text-align: start;
  text-shadow: 0px 0px 0px rgba(17, 17, 17, 0.72);
  color: black;
}
#war {
  color: black;
}
#img {
  margin-left: 30%;
}
#more {
  margin-left: 60%;
  margin-top: 2%;
}
#back {
  margin-left: 38%;
}
</style>
