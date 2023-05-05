<template>
    <div>
        <form class="needs-validation mt-3" v-if="!successReg" novalidate @submit.prevent="submitForm">
            <div class="alert alert-danger" role="alert" v-if="errorMessage !== ''">
                {{ errorMessage }}
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Ім'я</label>
                    <input type="text" class="form-control" id="name" v-model="name" :class="{'is-invalid': nameError}"
                           required>
                    <div class="invalid-feedback" v-if="nameError">{{ nameError }}</div>
                </div>
                <div class="col-md-6">
                    <label for="surname" class="form-label">Прізвище</label>
                    <input type="text" class="form-control" id="surname" v-model="surname"
                           :class="{'is-invalid': surnameError}" required>
                    <div class="invalid-feedback" v-if="surnameError">{{ surnameError }}</div>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" v-model="email" :class="{'is-invalid': emailError}"
                           required>
                    <div class="invalid-feedback" v-if="emailError">{{ emailError }}</div>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" v-model="password"
                           :class="{'is-invalid': passwordError}" required>
                    <div class="invalid-feedback" v-if="passwordError">{{ passwordError }}</div>
                </div>
                <div class="col-12">
                    <label for="confirm-password" class="form-label">Повторіть пароль</label>
                    <input type="password" class="form-control" id="confirm-password"
                           :class="{'is-invalid': confirmPasswordError}" v-model="confirmPassword" required>
                    <div class="invalid-feedback" v-if="confirmPasswordError">{{ confirmPasswordError }}</div>
                </div>
            </div>
            <button class="btn btn-primary mt-3" type="submit">Відправити</button>
        </form>
        <div class="alert alert-success mt-5" role="alert" v-if="successReg">
            Реєстрація пройшла успішно!
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            submitting: false,
            successMessage: '',
            errorMessage: '',
            name: '',
            surname: '',
            email: '',
            password: '',
            confirmPassword: '',
            nameError: '',
            surnameError: '',
            emailError: '',
            passwordError: '',
            confirmPasswordError: '',
            successReg: false
        }
    },
    methods: {
        async submitForm() {
            this.validateForm();
            if (!this.nameError && !this.surnameError && !this.emailError && !this.passwordError && !this.confirmPasswordError) {
                this.submitting = true;
                const formData = new FormData();
                formData.append('name', this.name);
                formData.append('surname', this.surname);
                formData.append('email', this.email);
                formData.append('password', this.password);
                formData.append('password_confirmation', this.confirmPassword);
                try {
                    const result = await $.ajax({
                        url: 'add-user',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false
                    });
                    this.successReg = true;
                    this.successMessage = 'Дякуємо за ваше повідомлення!';
                    this.name = '';
                    this.surname = '';
                    this.email = '';
                    this.password = '';
                    this.confirmPassword = '';
                } catch (error) {
                    this.errorMessage = error.responseJSON.message;
                }
                this.submitting = false;
            }
        },
        validateForm() {
            this.nameError = '';
            this.surnameError = '';
            this.emailError = '';
            this.passwordError = '';
            this.confirmPasswordError = '';

            if (!this.name) {
                this.nameError = 'Будь ласка, введіть своє ім\'я.';
            }
            if (!this.surname) {
                this.surnameError = 'Будь ласка, введіть своє прізвище.';
            }
            if (!this.email) {
                this.emailError = 'Будь ласка, введіть свій email.';
            } else if (!this.validEmail(this.email)) {
                this.emailError = 'Будь ласка, введіть коректний email.';
            }
            if (!this.password) {
                this.passwordError = 'Будь ласка, введіть свій пароль.';
            } else if (this.password.length < 8) {
                this.passwordError = 'Ваш пароль повинен містити щонайменше 8 символів.';
            }
            if (!this.confirmPassword) {
                this.confirmPasswordError = 'Будь ласка, повторіть свій пароль.';
            } else if (this.password !== this.confirmPassword) {
                this.confirmPasswordError = 'Паролі не співпадають.';
            }
        },
        validEmail(email) {
            // Перевірка, чи введений email є коректним
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
    }
}
</script>

