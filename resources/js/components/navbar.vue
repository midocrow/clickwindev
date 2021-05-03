<template>
  <nav class="navbar is-fixed-top has-background-black" style="background:black;" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" id="logo" href="/">
        <img  src="/storage/logo.png" width="90px" />
      </a>

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
        
<a v-if="logged" class="navbar-item" href="/free" id="item">Refer & Win</a>
            <a v-if="logged" class="navbar-item" href="/coupon" id="item">Coupon code</a>
            <!--
        <div class="navbar-item has-dropdown is-hoverable">
          <a v-if="logged" class="navbar-link is-arrowless" id="item">Free Cwins</a>
          
           

          <div class="navbar-dropdown">
            <a class="navbar-item" href="/free" id="item">Refer & Win</a>
            <a class="navbar-item" href="/coupon" id="item">Coupon code</a>
          </div>
        </div>-->

        <a class="navbar-item" href="/ads" id="item">Advertising</a>
        <a class="navbar-item" href="/contact" id="item">Contact us</a>
        <a class="navbar-item" href="/store" id="item">
          <span
            v-if="logged"
            style="background-image: linear-gradient(to top, #ff0844 0%,#f5576c 100%);width: 145px;color:white;"
            class="tag is-medium"
          >Go Premium</span>
        </a>
        <a class="navbar-item" href="/adver" id="item">
          <span
            v-if="logged"
            style="background-image: linear-gradient(to right, #f3a121 0%, #fee140 100%);width: 145px;color:white;"
            class="tag is-medium"
          >For Ads</span>
        </a>
      </div>

      <div class="navbar-end">
        <div class="navbar-item is-hidden-touch">
          <div class="dropdown is-active is-right">
            <div class="dropdown-trigger" v-if="logged">
              <span @click="shownotification = !shownotification" class="icon is-left is-large">
                <span
                  class="has-badge-rounded has-badge-outlined has-badge-danger"
                  style="background-color:unset;margin-bottom:-8px;"
                  data-badge="8"
                  id="notifi"
                >
                  <i style="font-size: 22px;" class="fas fa-bell"></i>
                </span>
              </span>
            </div>

            <div
              v-if="shownotification"
              class="dropdown-menu is-right"
              id="dropdown-menu2"
              role="menu"
            >
              <div
                class="dropdown-content"
                style=" overflow-x: hidden;background-color:black;margin-top:20px;border-radius:10px;  box-shadow: 0 1px 4px 0 #ffd419, 0 4px 4px 0 rgba(0, 0, 0, 0.19);"
              >
                <div class="tabs is-centered">
                  <ul>
                    <li class="is-active">
                      <a>Personal</a>
                    </li>
                    <li>
                      <a>Community</a>
                    </li>
                  </ul>
                </div>

                <hr class="dropdown-divider" />

                <div style="width:400px;max-height: 300px;overflow: auto;">
                  <div class="dropdown-item">
                    <div class="columns">
                      <div class="column is-2">
                        <figure class="image is-rounded is-48x48">
                          <img src="https://hmp.me/c5md" class="is-rounded" />
                        </figure>
                      </div>
                      <div class="column is-9">
                        <p>
                          This user was kicked out?
                          and he has reclaimed many
                          things
                        </p>

                        <p
                          style="margin-top:10px;color:grey;font-weight:lighter;font-family:arial;"
                        >6 min ago</p>
                      </div>
                      <div class="column is-1">
                        <div class="delete"></div>
                      </div>
                    </div>
                  </div>

                  <hr class="dropdown-divider" style="background-color:grey;" />

                  <div class="dropdown-item">
                    <div class="columns">
                      <div class="column is-2">
                        <figure class="image is-rounded is-48x48">
                          <img src="https://placeimg.com/120/120/any" class="is-rounded" />
                        </figure>
                      </div>
                      <div class="column is-9">
                        <p>
                          This user was kicked out?
                          and he has reclaimed many
                          things
                        </p>

                        <p
                          style="margin-top:10px;color:grey;font-weight:lighter;font-family:arial;"
                        >10 min ago</p>
                      </div>
                      <div class="column is-1">
                        <div class="delete"></div>
                      </div>
                    </div>
                  </div>

                  <hr class="dropdown-divider" style="background-color:grey;" />

                  <div class="dropdown-item">
                    <div class="columns">
                      <div class="column is-2">
                        <figure class="image is-rounded is-48x48">
                          <img src="https://placeimg.com/120/120/any" class="is-rounded" />
                        </figure>
                      </div>
                      <div class="column is-9">
                        <p>
                          This user was kicked out?
                          and he has reclaimed many
                          things
                        </p>

                        <p
                          style="margin-top:10px;color:grey;font-weight:lighter;font-family:arial;"
                        >10 min ago</p>
                      </div>
                      <div class="column is-1">
                        <div class="delete"></div>
                      </div>
                    </div>
                  </div>

                  <hr class="dropdown-divider" style="background-color:grey;" />

                  <div class="dropdown-item">
                    <div class="columns">
                      <div class="column is-2">
                        <figure class="image is-rounded is-48x48">
                          <img src="https://placeimg.com/120/120/any" class="is-rounded" />
                        </figure>
                      </div>
                      <div class="column is-9">
                        <p>
                          This user was kicked out?
                          and he has reclaimed many
                          things
                        </p>

                        <p
                          style="margin-top:10px;color:grey;font-weight:lighter;font-family:arial;"
                        >10 min ago</p>
                      </div>
                      <div class="column is-1">
                        <div class="delete"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--
                                <div
                                    v-for="(notif, index) in vnotifs"
                                    :key="index"
                                    class="dropdown-item"
                                >
                                    <p>{{ notif.data.code }}</p>
                                </div>
                -->
              </div>
            </div>
          </div>
        </div>

        <a v-if="logged" class="navbar-item is-hidden-touch" id="points-menu-item">
          <span class="tag  has-background-grey-lighter is-medium" id="points-menu-item">
            {{ $store.state.points }}
            <span class="icon is-right is-large" id="points-menu-item">
              <img style="width:22px;margin-bottom:0px;border: 1px solid black; border-radius: 50%;" src="/storage/cwin.png" />
            </span>
          </span>
        </a>

        <div
          @click="is_nav_active = !is_nav_active"
          v-if="logged"
          :class="is_nav_active ? 'navbar-item has-dropdown is-active is-hidden-touch' : 'navbar-item has-dropdown is-hidden-touch'"
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
              <img :title="name" :src="'/storage/' + avatar" class="is-rounded" />
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

        <div
          v-if="!logged"
          style="margin-right:30px;"
          class="navbar-item has-dropdown is-hoverable"
        >
          <a class="navbar-link" href="/setlocale/en" id="item">En</a>

          <div class="navbar-dropdown">
            <a class="navbar-item" href="/setlocale/fr" id="item">Fr</a>
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
    this.vnotifs = JSON.parse(this.notifs);
  },
  props: ["logged", "name", "avatar", "zone", "notifs", "rank"],
  data() {
    return {
      showNav: false,
      is_nav_active : false,
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
  background-color: black !important;
}
#points-menu-item {
  pointer-events: none;
}
#points-menu-profile:hover {
  background-color: black;
}
#points-menu-profile.is-active .navbar-link {
    background-color: black;
}
.navbar {
  background: transparent;
}
#item:hover {
  background-color:black;
  color:#f3ca12;;
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
/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: rgb(133, 129, 129);
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #f1f1f1;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #f1f1f1;
}
</style>
