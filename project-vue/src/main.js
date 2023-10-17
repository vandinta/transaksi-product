import Vue from 'vue'
import App from './App.vue'
import router from './router'
import VueToast from 'vue-toast-notification';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import './assets/css/main.css'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'vue-toast-notification/dist/theme-bootstrap.css';

Vue.use(VueToast)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
