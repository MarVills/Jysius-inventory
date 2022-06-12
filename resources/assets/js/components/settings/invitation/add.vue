<template>
    <!-- <div v-if="this.showModal"> -->
    <div>
        <div class="modal-layout-header">
            <div class="row">
                <div class="col-10">
                    <h5 class="m-0" v-if="id">{{ trans('lang.change_user_role') }}</h5>
                    <h5 class="m-0" v-else>{{ trans('lang.add_user') }}</h5>
                </div>

                <div class="col-2 text-right">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="">
                        <i class="la la-close icon-modal-cross"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="modal-layout-content">
            <pre-loader v-if="!hidePreLoader" class="small-loader-container"></pre-loader>

            <form class="form-row" v-else>
                <!-- First name -->
                 <div class="form-group col-md-12" v-if="!id">
                    <label>{{ trans('lang.first_name') }}</label>
                    <input
                        id="first-name"
                        v-validate="'required'"
                        name="first name"
                        class="form-control"
                        type="text"
                        v-model="user_data.firstName"
                        :placeholder="trans('lang.enter_first_name')"
                        :class="{ 'is-invalid': submitted && errors.has('email') }"
                    />
                    <div class="heightError" v-if="submitted && errors.has('email')">
                        <small
                            class="text-danger"
                            v-show="errors.has('first name')"
                        >{{ errors.first('first name') }}</small>
                    </div>
                </div>
               
                <!-- Last name -->
                <div class="form-group col-md-12" v-if="!id">
                    <label>{{ trans('lang.last_name') }}</label>
                    <input
                        id="last-name"
                        v-validate="'required'"
                        name="last name"
                        class="form-control"
                        type="text"
                        v-model="user_data.lastName"
                        :placeholder="trans('lang.enter_last_name')"
                    />
                    <div class="heightError" >
                        <small
                            class="text-danger"
                            v-show="errors.has('last name')"
                        >{{ errors.first('last name') }}</small>
                    </div>
                </div>
                
                <!-- Email -->
                <div class="form-group col-md-12" v-if="!id">
                    <label for="invitation-email">{{ trans('lang.login_email') }}</label>
                    <input
                        id="email"
                        v-validate="'required'"
                        name="email"
                        class="form-control"
                        type="email"
                        v-model="user_data.email"
                        :placeholder="trans('lang.enter_email')"
                        
                    />
                    <div class="heightError" >
                        <small
                            class="text-danger"
                            v-show="errors.has('email')"
                        >{{ errors.first('email') }}</small>
                    </div>
                </div>
                <div class="form-group col-md-12" v-else>
                    <label>{{ trans('lang.name') }}</label>
                    <h6 class="m-0">{{ name }}</h6>
                </div>
                
                <!-- Password -->
                <div class="form-group col-12">
                  <label for="password">{{
                    trans("lang.login_password")
                  }}</label>
                  <input
                    id="password"
                    v-validate="'required'"
                    ref="password"
                    v-model="user_data.password"
                    name="password"
                    type="password"
                    class="form-control"
                    :placeholder="trans('lang.enter_password')"
                  
                  />
                  <div class="heightError">
                    <small class="text-danger" v-show="errors.has('password')">
                      {{ errors.first("password") }}
                    </small>
                  </div>
                </div>
              
                <div class="form-group margin-top col-md-12">
                    <label for="roles">{{ trans('lang.role') }}</label>
                    <select
                        v-model="user_data.roleId"
                        v-validate="'required'"
                        name="addAs"
                        data-vv-as="role"
                        id="add-roles"
                        class="custom-select"
                        :placeholder="trans('lang.choose_one')"
                    >
                        <option value disabled selected>{{ trans('lang.choose_one') }}</option>
                        <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.title }}</option>
                    </select>
                    <div class="heightError">
                        <small
                            class="text-danger"
                            v-show="errors.has('addAs')"
                        >{{ errors.first('addAs') }}</small>
                    </div> 
                </div>

                <div v-if="branches.length > 1 || id" class="form-group margin-top col-md-12">
                    <label>{{ trans('lang.branch') }}</label>

                    <div v-for="branch in branches" :key="branch.id" class="custom-control custom-checkbox">
                        <input
                            type="checkbox"
                            class="custom-control-input"
                            :id="branchId+branch.id"
                            v-model="user_data.branchPermission"
                            :value="branch.id"
                            style="z-index:10;"
                        />
                        <label class="custom-control-label" :for="branch.id">{{ branch.name }}</label>
                        <br/>
                    </div>
                </div>
                <!-- @submmit.prevent="addUser()"
                @click.prevent="addUser()" -->
               

                <div class="col-12">
                    <button
                        class="btn app-color mobile-btn"
                        type="submit"
                        data-dismiss="modal"
                        @click.prevent="addUser()"
                        
                    >{{ id ? trans("lang.save") : trans("lang.add_button") }}
                    </button>
                    <button
                        class="btn cancel-btn mobile-btn"
                        data-dismiss="modal"
                        @click.prevent
                    >{{ trans('lang.cancel') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axiosGetPost from "../../../helper/axiosGetPostCommon";

export default {
    props: ["id", "modalID"],
    extends: axiosGetPost,

    data() {
        return {
            showModal: true,
            submitted: false,
            branchId: "10", 
            branches : [],
            //branchPermission : [],
           "user_data": {
                'firstName': "",
                'lastName': "",
                'email': "",
                'password': "",
                'roleId': "",
                'branchPermission': [],
                // 'userType': "",

           }
            
        };
    },

    created() {
        this.getRolesData();
        this.getBranchData();
        if (this.id) {
            this.getUserData("/get-user/" + this.id);
        }
    },

    methods: {
        // close() {
        //     this.$emit('close');
        // },
        addUser() {
            // alert('Data saved successfully');
            // console.log("adduser is called", this.user_data);
            let instance = this;
            this.submitted = true;
            // console.log("data here : ", this.user_data.first_name, this.user_data.last_name)
            // console.log("Something");
            console.log("branch: "+ this.user_data.branchPermission);
            // this.postDataMethod("/add-user", this.user_data);
            // axios.post("/add-user", this.user_data).then(
                
            //     // response => {}
            //     console.log("This works !!")
            // ).catch(error => {
               
            //     console.log("Error on adding user.",  error);
               
            // });

           
            this.$validator.validateAll().then(result => {
                if (result) {
                        this.postDataMethod("/add-user", this.user_data);
                        // this.$emit('close');
                        // $(this.modalID).modal("hide");
                        // this.isModalVisible = false;
                        //this.showModal = false;
                    }
            });
            
        },
        postDataThenFunctionality() {
            $(this.modalID).modal("hide");
            this.$hub.$emit("reloadDataTable");
        },
        postDataCatchFunctionality() {
            this.hidePreLoader = true;
        },
        getRolesData() {
            let instance = this;
            instance.setPreLoader(false);
            instance.axiosGet(
                "/all-role-id",
                function (response) {
                    instance.roles = response.data;
                    // console.log("Roles : "+instance.roles);
                    instance.setPreLoader(true);
                },
                function () {
                    instance.setPreLoader(true);
                }
            );
        },
        getBranchData() {
            let instance = this;

            instance.axiosGet(
                "/branches",
                function (response) {
                    instance.branches = response.data;
                    instance.setPreLoader(true);
                },
                function () {
                    instance.setPreLoader(true);
                }
            );
        },

        is_disable() {
            this.is_disabled = true;
        },
        getUserData(route) {
            let instance = this;
            this.setPreLoader(false);
            this.axiosGet(
                route,
                function (response) {
                    instance.name =
                        response.data.rowUser.first_name +
                        " " +
                        response.data.rowUser.last_name;
                    instance.addAs = response.data.rowUser.role_id;
                    instance.branchPermission = response.data.branchId;
                    instance.setPreLoader(true);
                },
                function () {
                    instance.setPreLoader(true);
                }
            );
        }
    }
};
</script>