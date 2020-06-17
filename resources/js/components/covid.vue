<template>
  <div class="container">
    <div class="columns">
      <div class="column is-full">
        <div id="clock">
          <p class="date">{{ date }}</p>
          <p class="cases">{{ cases }}</p>
          <p class="dead">{{ dead }}</p>
          <p class="recovred">{{ recovred }}</p>
          <p class="text">COVID19 UPDATES with Vue.js</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("mounted...");
    this.date = new Date().toLocaleString() + "";
    this.display();
  },
  data() {
    return {
      url: "https://www.google.com/covid19-map/",
      date: "...",
      cases: "...",
      dead: "..",
      recovred: "."
    };
  },
  methods: {
    load: function() {
      console.log("ok");
    },
    display: function() {
      axios("/get")
        .then(response => {
          const html = response.data;
          console.log(html);
          this.cases = html[1];
          this.dead = html[4];
          this.recovred = html[3];
        })
        .catch(console.error);
    }
  }
};
</script>

<style scoped>
p {
  margin: 0;
  padding: 0;
}

#clock {
  font-family: "Share Tech Mono", monospace;
  color: #ffffff;
  text-align: center;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  color: #daf6ff;
  text-shadow: 0 0 20px #0aafe6, 0 0 20px rgba(10, 175, 230, 0);
}
#clock .cases {
  letter-spacing: 0.05em;
  font-size: 80px;
  text-shadow: 0 0 20px #f0e11b, 0 0 20px rgba(10, 175, 230, 0);
  color: yellow;
}
#clock .dead {
  letter-spacing: 0.05em;
  font-size: 80px;
  text-shadow: 0 0 20px #f12207, 0 0 20px rgba(10, 175, 230, 0);
  color: red;
}
#clock .recovred {
  letter-spacing: 0.05em;
  font-size: 80px;
  text-shadow: 0 0 20px #2fe63e, 0 0 20px rgba(10, 175, 230, 0);
  color: #2fe63e;
}

#clock .text {
  font-size: 12px;
  padding: 20px 0 0;
}
</style>
