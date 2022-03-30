<template>
  <div class="container">
    <div class="row" id="pizza_result">
      <div class="col col-md-8">
        <h2 id="creator-header">Create your pizza!</h2>
        <img id="empty-pizza" src="images/empty-pizza.png" alt="empty pizza" />
      </div>
      <div class="col col-md-4">
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            id="disabledFieldsetCheck"
            disabled=""
            checked=""
          />
          <label class="form-check-label" for="disabledFieldsetCheck"
            >Tomato Sauce</label
          >
        </div>

        <h3>Vegetables</h3>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Bell Pepper</label>
        </div>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Red Pepper</label>
        </div>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Mushrooms</label>
        </div>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Zucchini</label>
        </div>

        <h3>Meat</h3>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Spicy Minced Meat</label>
        </div>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Pulled Pork</label>
        </div>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Shawarma (Lamb)</label>
        </div>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Chicken</label>
        </div>

        <h3>Herbs</h3>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Basil</label>
        </div>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Parsley</label>
        </div>

        <h3>Cheese</h3>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Gouda Cheese</label>
        </div>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Provolone</label>
        </div>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Gorgonzola</label>
        </div>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Parmesan</label>
        </div>
        <div class="form-check">
          <input
            id="ingredient1"
            name="ingredient1"
            type="checkbox"
            class="form-check-input"
            required=""
          />
          <label class="form-check-label" for="credit">Mozzarella</label>
        </div>

        <button class="btn btn-primary btn-lg mt-5 btn-creator">
          <a href="cart">Add to cart</a>
        </button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Creator",
};
</script>
