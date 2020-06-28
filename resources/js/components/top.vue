<template>
  <div class="toolbar is-hidden-mobile" ng-show="show_demo">
    <article class="panel is-warning">
      <div class="panel-heading">
        <div class="field has-addons">
          <div class="control is-expanded">
            <span>Top 10 this week</span>
            <span
              :style="{
                                'font-weight': 'lighter',
                                'font-size': '12px'
                            }"
            >(12/05/20)</span>
            <br />
            <div class="tags has-addons" :style="{ 'padding-top': '5px' }">
              <span class="tag is-white">Your global ranking</span>
              <span class="tag has-background-grey-lighter">
                {{
                rankall
                }}
              </span>
            </div>
          </div>
          <div class="control">
            <button class="button is-warning" v-on:click="isshowen = !isshowen">
              <span style="position:right;" class="icon">
                <i
                  :class="
                                        isshowen
                                            ? 'fas fa-minus'
                                            : 'fas fa-angle-up'
                                    "
                  aria-hidden="true"
                ></i>
              </span>
            </button>
          </div>
        </div>
      </div>

      <div id="willbeshown" v-if="isshowen">
        <p class="panel-tabs">
          <a class="is-active">
            <span class="tag has-background-grey-lighter" :style="{ width: '55px' }">All</span>
          </a>
          <a>
            <span
              class="tag is-danger"
              :style="{
                                'background-image':
                                    'linear-gradient(to top, #ff0844 0%, #ffb199 100%)',
                                width: '60px'
                            }"
            >Premium</span>
          </a>
          <a>
            <span
              class="tag is-info"
              :style="{
                                'background-image':
                                    'linear-gradient(to top, #00c6fb 0%, #005bea 100%)',
                                width: '60px'
                            }"
            >Bonus</span>
          </a>
          <a>
            <span
              class="tag is-success"
              :style="{
                                'background-image':
                                    'linear-gradient(to top, #0ba360 0%, #3cba92 100%)',
                                width: '60px'
                            }"
            >Basique</span>
          </a>
        </p>
        <!--
  <div class="panel-block">
    <p class="control has-icons-left">
      <input class="input is-warning" type="text" placeholder="Search">
      <span class="icon is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
    </p>
  </div>
        -->
        <a v-for="(user, index) in topusers" class="panel-block" :key="index">
          <span class="panel-icon">{{ index + 1 }}</span>
          <div class="field">
            <div class="control is-expanded">
              <span>{{ user.name + " " }}</span>
            </div>
            <div class="control is-expanded">
              <span class="tag is-warning">
                {{ user.points }}
                <span class="icon is-right">
                  <img
                    style="width:16px;margin-left:5px;margin-bottom:1px;"
                    src="/storage/cwin.png"
                  />
                </span>
              </span>
              <span :style="{ 'margin-left': '120px' }">
                <button
                  class="button is-small is-white is-light has-tooltip-warning has-tooltip-left has-toolti-multiline"
                  data-tooltip="Passed to premium"
                >
                  <img src="/storage/pub/prize.png" width="20px" />
                </button>
              </span>
            </div>
          </div>
        </a>
      </div>
    </article>
  </div>
</template>

<script>
export default {
  props: ["zone", "title", "color", "rankall"],
  data() {
    return {
      isshowen: false,
      topusers: []
    };
  },
  mounted() {
    this.gettopten();
  },
  methods: {
    gettopten: function() {
      axios
        .get("/gettopten")
        .then(response => {
          this.topusers = response.data;
        })
        .catch(error => {});
    }
  }
};
</script>

<style scoped>
.toolbar {
  position: fixed;
  right: 10px;
  bottom: 10px;
  z-index: 1000000;
  max-width: 300px;
}

.toolbar .panel {
  width: 300px;
}

.toolbar .info {
  margin-top: 5px;
}
.panel {
  background-color: white;
}

article {
  height: 100%;
}
#willbeshown {
  height: 250px;
  display: flex;
  overflow-y: auto;
  flex-direction: column;
}
span {
  font-family: "Bitter", sans-serif;
}
</style>
