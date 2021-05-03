<template>
    <div class="container">
        <div class="columns">
            <div class="column is-2 is-hidden-mobile">
                
            </div>
            <div class="column is-8">
                <zonegold
                    zone="gold"
                    color="linear-gradient(to right, #f3a121 0%, #fee140 100%)"
                    title="VIP Zone"
                /><br>
                <zone
                    zone="red"
                    color="linear-gradient(to top, #ff0844 0%,#f5576c 100%)"
                    title="Premium Zone"
                /><br>
                <zone
                    zone="blue"
                    color="linear-gradient(to top, #00c6fb 0%, #005bea 100%)"
                    title="Bonus Zone"
                /><br>
                <zone
                    zone="green"
                    color="linear-gradient(to top, #0ba360 0%, #3cba92 100%)"
                    title="Normal Zone"
                />
            </div>
            <div class="column is-2 is-hidden-mobile">
                
            </div>
        </div>
    </div>
</template>

<style scoped>
figure {
    margin-left: 60px;
    margin-right: 60px;
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>
