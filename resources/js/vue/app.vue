<template>
  <div>
    <header class="bg-primary text-white">
      <div class="container">
        <img src="/images/logo.png" class="py-4 text-uppercase" alt="" />
        <h1 class="d-flex align-items-center flex-column text-uppercase">
          Example demo
        </h1>
      </div>
    </header>
    <main>
      <div class="container">
        <!-- 01 -->
        <div class="post">
          <p class="post-number">01</p>
          <h3 class="text-uppercase">heading</h3>
          <p class="post-text col-md-6 mt-5">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
            erat.
          </p>
          <a class="btn btn-outline-dark px-5 mt-5" href="#booking-form">Book Now</a>
        </div>
        <!-- 02 -->
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <img
              class="image-max-width"
              src="/images/image-water.png"
              width="500px"
              alt=""
            />
          </div>

          <div class="col-lg-6 col-sm-12">
            <p class="post-number">02</p>
            <p class="post-text2 col-md-6">
              Lorem ipsum dolor sit amet, consetetur.
            </p>
          </div>
        </div>

        <div class="margin-y150"></div>

        <!-- 03 -->
        <div class="row">
          <div class="post col-lg-4">
            <p class="post-number">03</p>
            <h3 class="text-uppercase post-heading-with-text">heading</h3>
            <p class="post-heading2 mt-5">
              Lorem ipsum dolor sit amet, consetetur.
            </p>
            <p class="post-text3">
              Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
              nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
              erat, sed diam voluptua, vero eos et accusam et justo duo dolores
              et ea rebum.
            </p>
          </div>
          <div class="col-lg-4 offset-lg-1" id="booking-form">
            <booking-form
              v-on:booking-created="get_bookings()"
            ></booking-form>
          </div>
        </div>

        <!-- post listing -->
        <booking-list :bookings="bookings"></booking-list>

        <div class="margin-y150"></div>
      </div>
    </main>
    <footer class="text-white bg-black">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <img src="/images/logo.png" alt="logo" />
            <p class="mt-5">
              Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
              nonumy.
            </p>
            <a class="text-uppercase mt-5 footer-book-now" href="#booking-form">book now</a>
          </div>
          <div class="col-lg-1 offset-lg-2 mb-5">
            <p class="footer-menu text-uppercase">menu</p>
            <div class="mt-3">
              <p class="text-secondary mb-1">Heading</p>
              <p class="text-secondary mb-1">Heading</p>
              <p class="text-secondary mb-1">Heading</p>
              <p class="text-secondary mb-1">Heading</p>
            </div>
          </div>
          <div class="col-lg-1 offset-lg-1 mb-5">
            <p class="footer-menu text-uppercase">menu</p>
            <div class="mt-3">
              <p class="text-secondary mb-1">Heading</p>
              <p class="text-secondary mb-1">Heading</p>
              <p class="text-secondary mb-1">Heading</p>
            </div>
          </div>
          <div class="col-lg-1 offset-lg-1 mb-5">
            <p class="footer-menu text-uppercase">menu</p>
            <div class="mt-3">
              <p class="text-secondary mb-1">Heading</p>
              <p class="text-secondary mb-1">Heading</p>
            </div>
          </div>
          <div class="col-lg-1 offset-lg-1 mb-5">
            <p class="footer-menu text-uppercase">menu</p>
            <div class="mt-3">
              <p class="text-secondary mb-1">Heading</p>
              <p class="text-secondary mb-1">Heading</p>
              <p class="text-secondary mb-1">Heading</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import BookingForm from "./components/BookingForm.vue";
import BookingList from "./components/BookingList.vue";
export default {
  components: { BookingForm, BookingList },
  data() {
    return {
      bookings: [],
    };
  },
  mounted() {
    this.get_bookings();
  },
  methods: {
    get_bookings() {
      axios
        .get("/api/bookings")
        .then((res) => {
          this.bookings = res.data;
        })
        .catch((err) => {
          alert("Couldn't load bookings");
        });
    },
  },
};
</script>
