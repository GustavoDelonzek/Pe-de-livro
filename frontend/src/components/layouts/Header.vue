<template>
    <div class="p-5 bg-[#BFD8AF] text-[#466149] shadow-2xl shadow-[#fff] mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <RouterLink to="/" class="flex items-center"> <img class="w-12 h-12 object-contain mr-2" src="@/assets/images/LogoPrincipal.png"> <span class="text-2xl font-bold font-serif"> Pé de Livro      </span></RouterLink>
      </div>
  
      <nav class="hidden md:flex space-x-8 mx-auto">
        <RouterLink to="/shop" class="text-md font-medium hover:text-gray-500 font-serif">Shop</RouterLink>
        <RouterLink to="/contact" class="text-md font-medium hover:text-gray-500 font-serif">Contact</RouterLink>
        <RouterLink to="/favorites" class="text-md font-medium hover:text-gray-500 font-serif">Favorites</RouterLink>
      </nav>
  
      <div class="flex justify-center items-center gap-3">
        <RouterLink to="/cart" class="text-lg hover:text-gray-500 font-semibold relative">
          <ShoppingCart />
          <span v-if="cartItemCount > 0" class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">
            {{ cartItemCount }}
          </span>
        </RouterLink>
  
        
  
        <RouterLink to="/login" class="text-lg hover:text-gray-500 font-semibold">Login</RouterLink>
      </div>
  
      <div class="md:hidden flex items-center space-x-3">
        <button @click="toggleMenu" class="text-xl text-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
        <div v-if="isMenuOpen" class="absolute top-20 right-5 bg-white shadow-lg rounded-md w-48 p-4 flex flex-col space-y-4">
          <RouterLink to="/shop" class="text-md font-medium hover:text-gray-500">Shop</RouterLink>
          <RouterLink to="/contact" class="text-md font-medium hover:text-gray-500">Contact</RouterLink>
          <RouterLink to="/favorites" class="text-md font-medium hover:text-gray-500">Favorites</RouterLink>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { RouterLink } from 'vue-router';
  import { ShoppingCart } from 'lucide-vue-next';
  
  export default {
    name: "Header",
    components: { ShoppingCart },
    data() {
      return {
        isMenuOpen: false,
        isDropdownOpen: false
      };
    },
    methods: {
      toggleMenu() {
        this.isMenuOpen = !this.isMenuOpen;
      },
      toggleUserDropdown() {
        this.isDropdownOpen = !this.isDropdownOpen;
      }
    }
  };
  </script>