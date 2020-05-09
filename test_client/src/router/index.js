import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../components/auth/login.vue'
import AppLayout from '../components/admin/AppLayout.vue'
import Admin from '../components/admin/admin.vue'
import Productos from '../components/admin/productos.vue'
import store from '../store'

const ifNotAuthenticated = (to, from, next) => {
  if (!store.getters.isAuthenticated) {
    next()
    return
  }
  next('/admin/admin')
}

const ifAuthenticated = (to, from, next) => {
 if (store.getters.isAuthenticated) {
    next()
    return
  }
  next('/')
}


Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Login',
    component: Login,
    beforeEnter: ifNotAuthenticated,
  },
  {
    path: '/admin',
    name: 'Admin',
    component: AppLayout,
    beforeEnter: ifAuthenticated,
    children: [
        {
          name: 'admin',
          path: 'admin',
          component: Admin,
        },
         {
          name: 'productos',
          path: 'productos',
          component:  Productos,
        },
        ],
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
