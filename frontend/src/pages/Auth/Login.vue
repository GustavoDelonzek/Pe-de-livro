<template>
    <section class="bg-[#466149] p-6 min-h-screen flex items-center justify-center">
      <div class="bg-[#BFD8AF] shadow-[#BFD8AF] flex rounded-2xl max-h-screen shadow-md max-w-4xl w-full p-5 items-center">
        
        <div class="md:w-1/2 px-8 md:px-16 w-full">
          <h2 class="font-serif text-3xl text-[#466149]">LOGIN</h2>
          <p class="text-md mt-4 text-[#466149]">Bem vindo de volta à nossa livraria</p>
  
          <form class="flex flex-col gap-4" @submit.prevent="login">
            <div>
              <input 
                class="p-2 mt-8 rounded-xl border bg-gray-100 w-full" 
                placeholder="Email" 
                id="email" 
                v-model="email" 
                type="email" 
                @input="validateEmail" 
                required
              >
              <span v-if="emailError" class="text-red-500 text-sm">{{ emailError }}</span>
            </div>
  
            <div class="relative">
              <input 
                class="p-2 rounded-xl border bg-gray-100 w-full" 
                id="password" 
                v-model="password" 
                type="password" 
                placeholder="Senha" 
                required
              >
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
              </svg>
            </div>
  
            <button 
              class="bg-[#466149] rounded-xl text-white py-2 hover:scale-105 duration-300" 
              :disabled="!!emailError"
            >
              Entrar
            </button>
          </form>
  
          <p v-if="errorMessage" class="text-red-500 text-sm mt-2">{{ errorMessage }}</p>
  
          <div class="mt-4 flex justify-between items-center">
            <p class="text-[#466149] text-md">Não possui uma conta?</p>
            <RouterLink 
              to="/register" 
              class="py-2 px-5 text-xs bg-[#6d9170] text-[#fff] rounded-xl hover:scale-110 duration-300"
            >
              Registrar-se
            </RouterLink>
          </div>
        </div>
  
        <div class="md:block hidden w-1/2 h-[600px] relative shadow-2xl">
          <img 
            class="rounded-2xl absolute inset-0 w-full h-full" 
            src="@/assets/images/Imagem-login.jpg" 
            alt="Imagem de login"
          >
        </div>
      </div>
    </section>
  </template>
  
  <script lang="ts">
  
  </script>
  