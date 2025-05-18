import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../pages/Home/index.vue'),
      meta: {
        title: 'Home'
      }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../pages/Auth/Login.vue'),
      meta: {
        title: 'Login'
      }
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../pages/Auth/Register.vue'),
      meta: {
        title: 'Register'
      }
    },
  ]
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title;
  next();
});

export default router
