<template>
  
  <!-- <div class="back-img" :style="`background-image: url('${appUrl}/images/background/default-background.jpg')`"> -->
  <div>
      <div style="height: 200px;"></div>
    <div class="container-fluid" style="padding:20;">
      <div class="row justify-content-center">
        <div
          class="col-md-5 "
          style="background-color: #ffe2c0; 
          background-image: url(images/background/default-background.jpg)"
        >
          <div style="height: 200px;"></div>
          <div
            class="row align-items-center"
            style="background-color: rgba(255, 255, 255, 0.5); margin: 0;"
          >
            <h3 style="text-align: center;">
              <strong
                >Bakery Inventory Management and Sales Tracking System</strong
              >
            </h3>
          </div>
          <div style="height: 200px;"></div>
        </div>
        <!-- <div
          class="col-12 col-md-6 offset-md-6 col-lg-4 offset-lg-8 col-xl-4 offset-xl-8 pl-0"
        > -->
        <div class="col-md-5" style="background-color: #ffe2c0;">
            <div style="height: 50px;"></div>
          <div>
            <form class="">
              <div class="text-center mb-4 application-logo" >
                <img
                  :src="publicPath + '/uploads/logo/' + appLogo"
                  alt=""
                  class="img-fluid logo"
                />
              </div>
              <div class="form-row">
                <div class="form-group col-12">
                  <label class="text-center d-block">
                    {{ trans("lang.sign_in_to_your_dashboard") }}
                  </label>
                </div>
              </div>
              <div v-if="alertMessage.length > 0" class="alertBranch">
                <div class="alert alert-warning alertBranch" role="alert">
                  {{ alertMessage }}
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-12">
                  <label for="email"> {{ trans("lang.login_email") }}</label>
                  <input
                    id="email"
                    v-validate="'required'"
                    v-model="email"
                    type="email"
                    name="email"
                    class="form-control"
                    :placeholder="trans('lang.enter_email')"
                    :class="{ 'is-invalid': submitted && errors.has('email') }"
                  />
                  <div
                    class="heightError"
                    v-if="submitted && errors.has('email')"
                  >
                    <small class="text-danger" v-show="errors.has('email')">
                      {{ errors.first("email") }}
                    </small>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-12">
                  <label for="password">{{
                    trans("lang.login_password")
                  }}</label>
                  <input
                    id="password"
                    v-validate="'required'"
                    ref="password"
                    v-model="password"
                    name="password"
                    type="password"
                    class="form-control"
                    :placeholder="trans('lang.enter_password')"
                    :class="{
                      'is-invalid': submitted && errors.has('password'),
                    }"
                  />
                  <div class="heightError">
                    <small class="text-danger" v-show="errors.has('password')">
                      {{ errors.first("password") }}
                    </small>
                  </div>
                </div>
              </div>
              <div class="form-row loginButton">
                <div class="form-group col-12">
                  <common-submit-button
                    class="btn-block text-center auth-button"
                    :buttonLoader="buttonLoader"
                    :isDisabled="isDisabled"
                    :isActiveText="isActiveText"
                    buttonText="login"
                    v-on:submit="loginPost"
                  />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-12">
                  <a href="#" @click="forgetPassword" class="bluish-text">
                    <i class="fa fa-lock" />
                    {{ trans("lang.forgot_password") }}
                  </a>
                </div>
                <div class="form-group col-12">
                  <a href="#" @click="toRregister" class="bluish-text">
                    <i class="fa fa-lock" />
                    {{ trans("lang.register") }}
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axiosGetPost from "../../helper/axiosGetPostCommon";
export default {
  extends: axiosGetPost,
  props: ["checkemail", "checkpass"],
  data() {
    return {
      email: this.checkemail,
      name: "",
      password: this.checkpass,
      remember: true,
      buttonLoader: false,
      isActiveText: false,
      isDisabled: false,
      preLoaderType: "load",
      hidePreLoader: false,
      isActive: "active",
      alertMessage: "",
      submitted: false,
    };
  },
  methods: {
    loginPost() {
      (this.submitted = true),
        this.$validator.validateAll().then((result) => {
          if (result) {
            this.inputFields = {
              email: this.email,
              password: this.password,
            };
            this.buttonLoader = true;
            this.isDisabled = true;
            this.isActiveText = true;
            this.loginPostMethod("/", {
              email: this.email,
              password: this.password,
            });
          }
        });
    },
    forgetPassword() {
      let instance = this;
      instance.redirect("/password/reset");
    },
    toRregister(){
      let instance = this;
      instance.redirect("register");
    },
    loginPostSucces(response) {
      let instance = this;
      instance.redirect("/dashboard");
    },
    loginPostError(response) {
      let instance = this;
      instance.buttonLoader = false;
      instance.isDisabled = false;
      instance.isActiveText = false;
      instance.alertMessage = response.data.errors.email[0];
    },
  },
};
</script>
