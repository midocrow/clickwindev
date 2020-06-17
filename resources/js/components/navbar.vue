<template>
  <nav class="navbar is-fixed-top is-black" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" id="logo" href="/home">
        <img id="img" src="/storage/CW2.png" width="85px" />
      </a>

      <a v-if="logged" class="navbar-item is-right is-hidden-desktop" id="points-menu-item">
        <span class="tag is-warning is-large">
          {{ $store.state.points }}
          <span class="icon is-right is-large">
            <img src="/storage/cwin.png" />
          </span>
        </span>
      </a>

      <div v-if="logged" class="navbar-item has-dropdown is-hidden-desktop is-hoverable">
        <a class="navbar-link is-arrowless">
          <figure
            class="image is-48x48"
            :style="{
                            padding: '0rem',
                            border: '5px solid transparent',
                            background:
                                'linear-gradient(to right, white, white),' +
                                color,
                            'background-clip': 'padding-box, border-box',
                            'background-origin': 'padding-box, border-box'
                        }"
          >
            <img :src="'/storage/' + avatar" class="is-rounded" />
          </figure>
          <span
            class="tag is-black"
            :style="{
                            'margin-left': '5px',
                            'background-image': color
                        }"
          >{{ rank }}</span>
        </a>
      </div>

      <a
        v-on:click="showNav = !showNav"
        role="button"
        class="navbar-burger burger"
        aria-label="menu"
        aria-expanded="false"
        data-target="navbarBasicExample"
      >
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" :class="showNav ? 'navbar-menu  is-active' : 'navbar-menu'">
      <div class="navbar-start">
        <a
          v-if="logged"
          v-on:click="onMenuItemClicked"
          class="navbar-item"
          href="/link"
          id="item"
        >Add link</a>
        <a v-if="logged" class="navbar-item" href="/store" id="item">Premium & Cwins</a>

        <div class="navbar-item has-dropdown is-hoverable">
          <a v-if="logged" class="navbar-link is-arrowless" id="item">Free Cwins</a>

          <div class="navbar-dropdown">
            <a class="navbar-item" href="/free" id="item">Refer & Win</a>
            <a class="navbar-item" href="/coupon" id="item">Coupon code</a>
          </div>
        </div>

        <a class="navbar-item" href="/ads" id="item">Advertising</a>
        <a class="navbar-item" href="/contact" id="item">Contact us</a>

        <div class="is-hidden-desktop">
          <a class="navbar-item" href="/profile">
            <span class="icon is-left is-medium">
              <i class="fas fa-user-cog"></i>
            </span>
            Profile
          </a>
          <a class="navbar-item" href="/settings">
            <span class="icon is-left is-medium">
              <i class="fas fa-cog"></i>
            </span>
            Settings
          </a>
          <hr class="navbar-divider" />
          <a class="navbar-item" v-if="logged" href="#" v-on:click="logout">
            <span class="icon is-left is-medium">
              <i class="fas fa-sign-out-alt"></i>
            </span>
            Log out
          </a>
        </div>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="dropdown is-active">
            <div class="dropdown-trigger" v-if="logged">
              <span
                @mouseenter="
                                    shownotification = !shownotification
                                "
                @mouseleave="
                                    shownotification = !shownotification
                                "
                class="icon is-left is-medium"
              >
                <i class="fas fa-bell"></i>
              </span>
            </div>

            <div v-if="shownotification " class="dropdown-menu" id="dropdown-menu2" role="menu">
              <div class="dropdown-content">
                <div class="dropdown-item">
                  <p>New notificatons.</p>
                </div>

                <hr class="dropdown-divider" />

                <div v-for="(notif, index) in vnotifs" :key="index" class="dropdown-item">
                  <p>{{ notif.data.code }}</p>
                </div>

                <a href="#" class="dropdown-item">New notificatons</a>
              </div>
            </div>
          </div>
        </div>

        <a v-if="logged" class="navbar-item is-hidden-touch" id="points-menu-item">
          <span class="tag is-warning is-large" id="points-menu-item">
            {{ $store.state.points }}
            <span class="icon is-right is-large" id="points-menu-item">
              <img src="/storage/cwin.png" />
            </span>
          </span>
        </a>

        <div
          v-if="logged"
          class="navbar-item has-dropdown is-hoverable is-hidden-touch"
          id="points-menu-profile"
        >
          <a class="navbar-link" id="points-menu-profile">
            <figure
              class="image is-48x48"
              :style="{
                                padding: '0rem',
                                border: '5px solid transparent',
                                background:
                                    'linear-gradient(to right, white, white),' +
                                    color,
                                'background-clip': 'padding-box, border-box',
                                'background-origin': 'padding-box, border-box'
                            }"
            >
              <img :src="'/storage/' + avatar" class="is-rounded" />
            </figure>
            <span
              class="tag is-black"
              :style="{
                                'margin-left': '5px',
                                'background-image': color
                            }"
            >{{ rank }}</span>
          </a>

          <div class="navbar-dropdown">
            <a class="navbar-item" href="/profile">
              <span class="icon is-left is-medium">
                <i class="fas fa-user-cog"></i>
              </span>
              Profile
            </a>
            <a class="navbar-item" href="/settings">
              <span class="icon is-left is-medium">
                <i class="fas fa-cog"></i>
              </span>
              Settings
            </a>
            <hr class="navbar-divider" />
            <a class="navbar-item" v-if="logged" href="#" v-on:click="logout">
              <span class="icon is-left is-medium">
                <i class="fas fa-sign-out-alt"></i>
              </span>
              Log out
            </a>
          </div>
          <form
            ref="logout_form"
            id="logout_form"
            action="/logout"
            method="POST"
            style="display: none;"
            @click:prevent="logout"
          >
            <slot></slot>
          </form>
        </div>

        <div class="navbar-item">
          <div class="buttons">
            <a v-if="!logged" class="button is-warning is-outlined" href="/register">
              <strong>Sign up</strong>
            </a>
            <a v-if="!logged" class="button is-white is-outlined" href="/login">Log in</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  mounted() {
    this.loadpoints();
    console.log(this.rank + " o");
    this.vnotifs = JSON.parse(this.notifs);
  },
  props: ["logged", "name", "avatar", "zone", "notifs", "rank"],
  data() {
    return {
      showNav: false,
      islogged: this.logged,
      shownavlist: false,
      shownotification: false,
      vnotifs: [],
      color:
        this.zone == "red"
          ? "linear-gradient(to top, #ff0844 0%, #ffb199 100%)"
          : this.zone == "blue"
          ? "linear-gradient(to top, #00c6fb 0%, #005bea 100%)"
          : "linear-gradient(to top, #0ba360 0%, #3cba92 100%)"
    };
  },
  methods: {
    onMenuItemClicked: function(e) {
      //e.target.style.color = "red";
    },
    logout: function(event) {
      this.$refs.logout_form.submit();
    },
    loadpoints: function() {
      axios
        .get("/loadpoints")
        .then(response => {
          this.points = response.data[0].points;
          this.$store.commit("changePoints", parseInt(this.points));
        })
        .catch(error => {});
    }
  }
};
</script>
<style scoped>
.border-gradient-rounded {
  padding: 0.5rem;
  border: 5px solid transparent;
  border-radius: 7px;
  background: linear-gradient(to right, white, white),
    linear-gradient(to top, #ff0844 0%, #ffb199 100%);
  background-clip: padding-box, border-box;
  background-origin: padding-box, border-box;
}
.navbar-brand.left-burger {
  align-items: flex-start;
}

.navbar-brand.left-burger .navbar-burger {
  margin-left: 0;
  margin-right: 0;
}
.image {
  border-radius: 25px;
  padding: 2px;
}
#logo:hover {
  background-color: transparent;
}
.icon {
  pointer-events: initial;
}
#points-menu-item:hover {
  background-color: unset !important;
}
#points-menu-item {
  pointer-events: none;
}
#points-menu-profile:hover {
  background-color: black;
}

.navbar {
  background: black;
}
#item:hover {
  background-color: black;
}
.navbar-dropdown {
  background: black;
}
.navbar-menu:hover {
  background: black;
}

navbar-menu {
  background: black !important;
}
</style>
