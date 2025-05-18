<script setup>
import Header from '@/components/layouts/Header.vue'
import { ref, watchEffect } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()

const isLoginPage = ref(false)
const isRegisterPage = ref(false)
const isAdminRoute = ref(false)

watchEffect(() => {
  isLoginPage.value = route.path === '/login'
  isRegisterPage.value = route.path === '/register'
  isAdminRoute.value = route.path.startsWith('/admin')
})
</script>

<template>
  <Header v-if="!isLoginPage && !isRegisterPage && !isAdminRoute" />
  <router-view />
</template>
