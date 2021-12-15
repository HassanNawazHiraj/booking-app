<template>
  <div class="form">
    <div class="mb-3">
      <!-- name -->
      <input
        type="text"
        class="form-control"
        v-model="name"
        placeholder="Your Name"
        :disabled="loading"
      />
      <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
    </div>
    <!-- date & time -->
    <div class="mb-3 row">
      <div class="col-lg-6">
        <input
          type="date"
          v-model="book_date"
          class="form-control"
          placeholder="Pick a day"
          :disabled="loading"
        />
        <span class="text-danger" v-if="errors.book_date">{{
          errors.book_date[0]
        }}</span>
      </div>
      <div class="col-lg-6">
        <input
          type="time"
          v-model="book_time"
          class="form-control"
          placeholder="Pick a day"
          :disabled="loading"
        />
        <span class="text-danger" v-if="errors.book_time">{{
          errors.book_time[0]
        }}</span>
      </div>
    </div>
    <!-- your message -->
    <div class="mb-3">
      <textarea
        v-model="message"
        rows="4"
        class="form-control"
        style="resize: none"
        placeholder="Your Message"
        :disabled="loading"
      ></textarea>
      <span class="text-danger" v-if="errors.message">{{
        errors.message[0]
      }}</span>
    </div>
    <button
      :disabled="loading"
      class="btn btn-dark px-5 mt-1"
      v-on:click="save()"
    >
      Place Booking
    </button>
    <p class="text-secondary" v-if="loading">Loading...</p>
    <p class="text-success" v-show="success_text">Booking created!</p>
  </div>
</template>
<script>
export default {
  data() {
    return {
      name: "",
      book_date: "",
      book_time: "",
      message: "",
      success_text: false,
      loading: false,
      errors: {},
    };
  },
  methods: {
    save: function () {
      this.errors = {};
      this.loading = true;
      axios
        .post("/api/bookings", {
          name: this.name,
          book_date: this.book_date,
          book_time: this.book_time,
          message: this.message,
        })
        .then((res) => {
          this.success_text = true;
          setTimeout(() => {
            this.success_text = false;
          }, 2000);

          this.name = "";
          this.book_date = "";
          this.book_time = "";
          this.message = "";
          this.$emit('booking-created')
        })
        .catch((err) => {
          if (err.response.data && err.response.data.errors) {
            this.errors = err.response.data.errors;
          } else {
            alert("Could not submit");
          }
        })
        .finally(() => {
          this.loading = false;
        });
    },
  },
};
</script>
