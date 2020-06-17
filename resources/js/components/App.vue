<template>
  <div>
    <section class="hero is-dark is-fullheight">
      <!-- Hero head: will stick at the top -->
      <div class="hero-head">
        <navbar></navbar>
      </div>

      <!-- Hero content: will be in the middle -->
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="container">
            <transition name="slide-fade" mode="out-in">
              <router-view />
            </transition>
          </div>
        </div>
      </div>

      <!-- Hero footer: will stick at the bottom -->
      <div class="hero-foot">
        <nav class="tabs">
          <div class="container">
            <ul>
              <li class="is-active">
                <a>Overview</a>
              </li>
              <li>
                <a>Modifiers</a>
              </li>
              <li>
                <a>Grid</a>
              </li>
              <li>
                <a>Elements</a>
              </li>
              <li>
                <a>Components</a>
              </li>
              <li>
                <a>Layout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </section>
  </div>
</template>
<script>
export default {};
</script>
<style scoped>
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
  transition: all 0.3s ease;
}
.slide-fade-leave-active {
  transition: all 0.2s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>
