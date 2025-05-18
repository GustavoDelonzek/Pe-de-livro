<template>
  <section class="bg-[#466149] p-6 min-h-screen flex items-center justify-center">
    <div
      class="bg-[#BFD8AF] shadow-[#BFD8AF] flex rounded-2xl max-h-screen shadow-md max-w-4xl w-full p-5 items-center">
      <div class="md:block hidden w-1/2 h-[600px] relative shadow-2xl">
        <img class="rounded-2xl absolute inset-0 w-full  h-full " src="@/assets/images/Imagem-login.jpg" alt="Imagem de login">
      </div>
      <div class="md:w-1/2 px-8 md:px-16 w-full">
        <h2 class="font-serif text-3xl text-[#466149]">REGISTRO</h2>
        <p class="text-md mt-4 text-[#466149]">Crie sua conta e seja bem vindo!</p>

        <form class="flex flex-col gap-4" @submit.prevent="submit">

          <div>
            <input class="p-2 mt-4 bg-gray-100 rounded-xl border w-full" placeholder="Nome" v-model="data.name"
              type="text" @input="validateName" required>
            <span v-if="nameError" class="text-red-500 text-sm">{{ nameError }}</span>
          </div>
          <hr class="border-t-2 border-[#466149] " />

          <div>
            <input class="p-2 mt-2 bg-gray-100 rounded-xl border w-full" placeholder="Email" v-model="data.email"
              type="email" @input="validateEmail"  required>
            <span v-if="emailError" class="text-red-500 text-sm">{{ emailError }}</span>
          </div>

          <div class="relative">
            <input  @input="validatePasswordConfirmation"   class="p-2 rounded-xl bg-gray-100 border w-full" placeholder="Senha" v-model="data.password"
              type="password" required>
          </div>


          <div class="relative">
            <input  class="p-2 rounded-xl bg-gray-100 border w-full"  placeholder="Confirme sua senha"
              v-model="data.password_confirmation" type="password" @input="validatePasswordConfirmation"  required>
              <span v-if="passwordError" class="text-red-500 text-sm">{{ passwordError }}</span>
          </div>


          <button class="bg-[#466149] rounded-xl text-white py-2 hover:scale-105 duration-300"
            :disabled="!!nameError || !!emailError || !!passwordError">
            Cadastrar
          </button>
        </form>

        <div class="mt-3 flex justify-between items-center">
          <p class="text-[#466149] text-md">Já tem uma conta?</p>
          <RouterLink to="/login"
            class="py-2 px-5 text-xs bg-[#6d9170] text-[#fff] rounded-xl hover:scale-110 duration-300">
            Entrar
          </RouterLink>
        </div>
      </div>
    </div>
  </section>
</template>

<script lang="ts">
import { reactive, ref } from 'vue';
import { useRouter } from 'vue-router';

export default {
  name: "Register",
  setup() {
    const data = reactive({
      name: '',
      email: '',
      password: '',
      password_confirmation: ''
    });

    const nameError = ref<string | null>(null);
    const emailError = ref<string | null>(null);
    const passwordError = ref<string | null>(null);

    const validateName = () => {
      const regex = /^[a-zA-Z0-9._-]{3,20}$/;
      if (!regex.test(data.name)) {
        nameError.value = "O nome deve ter entre 3 e 20 caracteres e conter apenas letras, números, '.', '_' ou '-'.";
      } else {
        nameError.value = null;
      }
    };

    const validateEmail = () => {
      const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!regex.test(data.email)) {
        emailError.value = "Insira um endereço de email válido.";
      } else {
        emailError.value = null;
      }
    };

    const validatePasswordConfirmation = () => {
      if (data.password !== data.password_confirmation) {
        passwordError.value = "As senhas não coincidem.";
      } else {
        passwordError.value = null;
      }
    };

    const router = useRouter();

    const submit = async () => {
      if (nameError.value || emailError.value) {
        alert("Corrija os erros antes de enviar!");
        return;
      }

      await fetch('http://localhost:8000/api/register', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
      });
      await router.push('/login');
    };

    return {
      data,
      nameError,
      emailError,
      passwordError,
      validateName,
      validateEmail,
      validatePasswordConfirmation,
      submit
    };
  }
};
</script>
