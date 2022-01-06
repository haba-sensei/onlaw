<template>
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <div class="content-header row"></div>
      <div class="content-body">
        <div class="auth-wrapper auth-v2">
          <div class="m-0 auth-inner row">
            <div class="p-5 d-none d-lg-flex col-lg-8 align-items-center">
              <div
                class="
                  px-5
                  w-100
                  d-lg-flex
                  align-items-center
                  justify-content-center
                "
              >
                <img
                  class="img-fluid"
                  src="https://pixinvent.com/demo/vuexy-vuejs-laravel-admin-template/demo-1/images/pages/forgot-password-v2-dark.svg"
                  alt="Forgot Password V2"
                />
              </div>
            </div>
            <!-- /Left Text-->
            <!-- Login-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
              <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title fw-bold mb-1">Perdida de Password 🔒</h2>
                <p class="card-text mb-2">
                  Ingresa tu email para enviarte un mail para resetear tu
                  password.
                </p>
                <form
                  class="auth-forgot-password-form mt-2"
                  @submit.prevent="submit"
                >
                  <br />
                  <div class="mb-1">
                    <label class="form-label" for="email">Email</label>
                    <input
                      class="form-control"
                      id="email"
                      type="email"
                      name="email"
                      placeholder="john@example.com"
                      aria-describedby="email"
                      autofocus=""
                      tabindex="1"
                      v-model="credentials.email"
                    />
                  </div>
                  <button class="btn btn-primary w-100" tabindex="2">
                    <spinner
                      v-if="isLoading"
                      size="20"
                      line-fg-color="#FAA420"
                    ></spinner>
                    <span v-else>Resetear Password</span>
                  </button>
                </form>
                <br />
                <p class="text-center mt-2">
                  <router-link class="d-flex align-items-center" to="/login">
                    <feather-icon icon="ChevronLeftIcon" size="18" />
                    <span>Regresar al login</span>
                  </router-link>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import Spinner from "vue-simple-spinner";
export default {
  name: "ForgotPassword",
  components: {
    Spinner,
  },
  data() {
    return {
      credentials: {
        email: "abogado1@onlaw.com",
      },
      errors: [],
      showError: false,
    };
  },
  computed: {
    isLoading: function () {
      return this.$store.state.status;
    },
  },
  methods: {
    ...mapActions(["resetPassword"]),
    submit: function () {
      this.$store
        .dispatch("resetPassword", this.credentials)
        .then(() => console.log("success"))
        .catch((err) => console.log(err));
    },
  },
};
</script>
