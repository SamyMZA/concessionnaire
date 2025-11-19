<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger" v-if="error">
                    {{ error }}
                </div>

                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form @submit.prevent="handleSubmit">
                            <div class="form-group row">
                                <label
                                    class="col-sm-4 col-form-label text-md-right"
                                    >Name</label
                                >
                                <div class="col-md-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="name"
                                        required
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                            <br />

                            <div class="form-group row">
                                <label
                                    class="col-sm-4 col-form-label text-md-right"
                                    >Email</label
                                >
                                <div class="col-md-6">
                                    <input
                                        type="email"
                                        class="form-control"
                                        v-model="email"
                                        required
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                            <br />

                            <div class="form-group row">
                                <label
                                    class="col-md-4 col-form-label text-md-right"
                                    >Password</label
                                >
                                <div class="col-md-6">
                                    <input
                                        type="password"
                                        class="form-control"
                                        v-model="password"
                                        required
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                            <br />

                            <div class="form-group row">
                                <label
                                    class="col-md-4 col-form-label text-md-right"
                                    >Confirm Password</label
                                >
                                <div class="col-md-6">
                                    <input
                                        type="password"
                                        class="form-control"
                                        v-model="c_password"
                                        required
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                            <br />

                            <div class="form-group row">
                                <!-- widget container -->
                                <div
                                    ref="recaptchaWrapper"
                                    class="col-md-6"
                                ></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary">
                                        Register
                                    </button>
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
const name = ref("");
const email = ref("");
const password = ref("");
const c_password = ref("");
const error = ref(null);
const loading = ref(false);

const recaptchaWidgetId = ref(null);
const recaptchaToken = ref(null);
const recaptchaWrapper = ref(null);

const SITE_KEY =
    process.env.MIX_RECAPTCHA_SITE_KEY || window.RECAPTCHA_SITE_KEY || "";

function renderRecaptcha() {
    if (!window.grecaptcha || !recaptchaWrapper.value) return;
    if(recaptchaWidgetId.value !== null) {
        try { window.grecaptcha.reset(recaptchaWidgetId.value); catch { }
        return;
    }
    recaptchaWidgetId.value = window.grecaptcha.render(recaptchaWrapper.value, {
        'sitekey':SITE_KEY, 'callback': (token) => {
            recaptchaToken.value = token;
        },
        'expired-callback':() => { recaptchaToken.value = null; }
    });
}

onMounted(() => {
    let tries = 0;
    const interval = setInterval(() => {
        if (window.grecaptcha && window.grecaptcha.render) {
            renderRecaptcha();
            clearInterval(interval);
        } else if (tries++ > 20) {
            clearInterval(interval);
            console.warn('reCAPTCHA not loaded');
        }
    }, 300);
});

onBeforeUnmount(() => {
    if (recaptchaWidgetId.value !== null && window.grecaptcha && window.grecaptcha.reset) {
        window.grecaptcha.reset(recaptchaWidgetId.value);
    }
});

error.value = null;
if (!recaptchaToken.value) {
    error.value = 'Merci de confirmer que vous n\'êtes pas un robot.';
    return;
}

export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            c_password: "",
            error: null,
        };
    },
    methods: {
        async handleSubmit() {
            this.error = null;

            try {
                await axios.get("/sanctum/csrf-cookie");

                const res = await axios.post("/api/register", {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    c_password: this.c_password,
                });

                if (res.data.success) {
                    this.$router.push("/login");
                }
            } catch (err) {
                if (err.response && err.response.status === 422) {
                    // Laravel validation errors
                    this.error = Object.values(err.response.data.errors)
                        .flat()
                        .join(" ");
                } else {
                    this.error = "Erreur lors de l'inscription";
                }
            }
        },
    },
};
</script>
