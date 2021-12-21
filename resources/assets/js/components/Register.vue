<template>
    <div class="vue-tempalte">
        <form>
            <h3>Sign Up</h3>

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="fullname" class="form-control form-control-lg"/>
            </div>

            <div class="form-group">
                <label>Email address</label>
                <input type="email" name="email" class="form-control form-control-lg" />
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control form-control-lg" />
            </div>

            <button type="submit" class="btn btn-dark btn-lg btn-block">Sign Up</button>

        </form>
    </div>
</template>

<script>
export default {
    props: {
        userId: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            error: false,
            successful: false,
            errors: []
        };
    },
    methods: {
        create() {
            const formData = new FormData();
            formData.append("name", this.$refs.name.value);
            formData.append("email", this.$refs.email.value);
            formData.append("password", this.$refs.password.value);
            axios
                .post("/api/posts", formData)
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                })
                .catch(error => {
                    if (!_.isEmpty(error.response)) {
                        if ((error.response.status = 422)) {
                            this.errors = error.response.data.errors;
                            this.successful = false;
                            this.error = true;
                        }
                    }
                });
            this.$refs.name.value = "";
            this.$refs.email.value = "";
        }
    }
};
</script>


<!--<script>-->
<!--import { mapActions } from "vuex";-->
<!--export default {-->
<!--    name: "Register",-->
<!--    components: {},-->
<!--    data() {-->
<!--        return {-->
<!--            form: {-->
<!--                email: "",-->
<!--                fullname: "",-->
<!--                password: "",-->
<!--            },-->
<!--            showError: false-->
<!--        };-->
<!--    },-->
<!--    methods: {-->
<!--        ...mapActions(["Register"]),-->
<!--        async submit() {-->
<!--            try {-->
<!--                await this.Register(this.form);-->
<!--                this.$router.push("/posts");-->
<!--                this.showError = false-->
<!--            } catch (error) {-->
<!--                this.showError = true-->
<!--            }-->
<!--        },-->
<!--    },-->
<!--};-->
<!--</script>-->
