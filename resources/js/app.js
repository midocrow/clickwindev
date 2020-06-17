/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

window.cheerio = require("cheerio");

import Vuex from "vuex";
import VueLadda from "vue-ladda";

import App from "./components/App.vue";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        points: 0
    },
    getters: {},
    mutations: {
        changePoints(state, payload) {
            state.points = payload;
        }
    },
    actions: {}
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("user-form", require("./components/UserForm.vue").default);
Vue.component("navbar", require("./components/navbar.vue").default);
Vue.component("zone", require("./components/zone.vue").default);
Vue.component("chart", require("./components/chart.vue").default);
Vue.component("chart", require("./components/chart.vue").default);
Vue.component("org-chart", require("./components/orgchart.vue").default);
Vue.component("top", require("./components/top.vue").default);
Vue.component("zonegold", require("./components/zonegold.vue").default);
Vue.component("sponsor", require("./components/sponsor.vue").default);
Vue.component("gameplace", require("./components/gameplace.vue").default);
Vue.component("user_link", require("./components/Home.vue").default);
Vue.component("store", require("./components/About.vue").default);
Vue.component("watch", require("./components/watch.vue").default);

Vue.component("vue-ladda", VueLadda);

import filpcountdown from "vue2-flip-countdown";
Vue.component("filpcountdown", filpcountdown);

import { VPopover, VTooltip } from "v-tooltip";
Vue.component("v-popover", VPopover);
Vue.directive("tooltip", VTooltip);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    store,
    el: "#app",
    components: { App }
});