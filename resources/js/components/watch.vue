<template>
    <div>
        <iframe
            width="600"
            height="400"
            :src="link"
            frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            v-on:load="doit()"
            allowfullscreen
        ></iframe>

        <div class="columns">
            <div class="column is-6 is-offset-3">
                <span class="title is-2">{{ count }}</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {},
    props: ["link"],
    data() {
        return {
            count: 0
        };
    },
    methods: {
        doit() {
            var interval = setInterval(() => {
                if (this.count == 9) {
                    clearInterval(interval);
                    this.load();
                }
                this.count = this.count + 1;
            }, 1000);
        },
        load() {
            axios
                .get("/getgoldcode")
                .then(response => {
                    console.log(response.data);
                    this.code = response.data;
                    this.count = this.code;
                })
                .catch(error => {
                    this.isloading = false;
                    this.isError = true;
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    }
                });
        }
    }
};
</script>
