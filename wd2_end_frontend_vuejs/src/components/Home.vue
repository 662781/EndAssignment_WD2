<template>
  <div class="container">
    <div class="row mt-2" id="cards">
            <div class="col col-md-6">
                <div class="card mt-3">
                    <div class="card-header">
                        <h2>Try the delicious pizzas!</h2>
                    </div>
                    <div class="card-body p-3 homecard">
                        <img src="images/pizza-margarita.png" alt="pizza margarita">
                        <button class="btn btn-primary"><router-link to="/products">Browse</router-link></button>
                    </div>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="card mt-3">
                    <div class="card-header">
                        <h2>Our pasta d'Italia</h2>
                    </div>
                    <div class="card-body p-3 homecard">
                        <img src="images/pasta-bolognese.png" alt="pasta">
                        <button class="btn btn-primary"><router-link to="/products">Browse</router-link></button>
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>

<script>
export default {
  name: "Home",
};
</script>

<style>
</style>