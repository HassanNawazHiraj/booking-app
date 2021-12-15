<template>
  <div class="row g-5">
    <div
      class="col-lg-4 col-sm-12 offset-lg-1"
      v-for="booking in bookings"
      :key="booking.id"
    >
      <p class="post-number">{{ booking.id + 1 < 10 ? "0" + (booking.id + 1) : booking.id + 1 }}</p>
      <p class="booking-post-text">{{ booking.name }}</p>
      <p class="booking-post-text">
        {{ moment(booking.book_date).format("LL") }}
      </p>
      <p class="booking-post-text">
        {{ moment(booking.book_time, "HH:mm:ss").format("hh:mma") }}
      </p>
      <p class="booking-post-description mt-3">
        {{ booking.message }}
      </p>
    </div>

    <div class="offset-lg-2"></div>
  </div>
</template>
<script>
import moment from "moment";
export default {
  props: ["bookings"],
  mounted() {},
  methods: {
    moment() {
      return moment();
    },
  },
};
</script>
