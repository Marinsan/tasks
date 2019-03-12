
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import './bootstrap'
import AppComponent from './components/App.vue'
import ExampleComponent from './components/ExampleComponent.vue'
import Tasks from './components/Tasks.vue'
import Tasques from './components/Tasques.vue'
import Tags from './components/Tags.vue'
import LoginForm from './components/LoginForm.vue'
import RegisterForm from './components/RegisterForm.vue'
import UserList from './components/UserList.vue'
import UserSelect from './components/UserSelect.vue'
import permissions from './plugins/permissions'
import snackbar from './plugins/snackbar'
import confirm from './plugins/confirm'
import Impersonate from './components/Impersonate'
import TaskCreate from './components/TaskCreate'
import GitInfo from './components/git/GitInfoComponent'
import Color from './components/ColorPicker'
import Profile from './components/Profile'
import VueTimeago from 'vue-timeago'
import TreeView from 'vue-json-tree-view'
import Changelog from './components/changelog/ChangelogComponent.vue'
import NavigationMenu from './components/NavigationMenu'
import NavigationProfile from './components/NavigationProfile'
import Toolbar from './components/Toolbar.vue'
import '@mdi/font/css/materialdesignicons.css'
import NotificationsWidget from './components/notifications/NotificationsWidget'
import ServiceWorker from './components/ServiceWorker'
import Notifications from './components/notifications/Notifications'
import UserSelectComponent from './components/users/UsersSelectComponent'
import ShareFab from './components/ShareFab'
import GpsFeature from './components/features/GpsFeature'
import Vibrate from './components/features/Vibrate'
import Battery from './components/features/Battery'
import Memory from './components/features/Memory'
import Speed from './components/features/Speed'
import ImgWebp from './components/ImgWebp'
import VParallaxWebp from './components/VParallaxWebp'
import Online from './components/features/OnlineNet'
import Orientation from './components/features/Orientation'
import ScreenOL from './components/features/ScreenOL'
import NewsLetterSubscriptionCard from './components/NewsLetterSubscriptionCard'
import Newsletters from './components/newsletters/Newsletters'
import Clock from './components/clock/Clock'

// Imatges

import '../img/background.webp'
import '../img/background.jpg'
import '../img/background_parallax.jpg'
import '../img/background_parallax.webp'
import '../img/background_user.jpeg'
import '../img/snackbar.jpg'
import '../img/snackbar.webp'
import '../img/oficina.jpg'
import '../img/oficina.webp'

import 'typeface-montserrat/index.css'
import 'typeface-roboto/index.css'
import 'typeface-raleway/index.css'


window.Vue = Vue
window.Vuetify = Vuetify
window.Vue.use(permissions)
window.Vue.use(snackbar)
window.Vue.use(confirm)

Vue.use(Vuetify, {
  iconfont: 'mdi'
})

// Changelog
window.Vue.component('changelog', Changelog)

const PRIMARY_COLOR_KEY = 'PRIMARY_COLOR_KEY'
const SECONDARY_COLOR_KEY = 'SECONDARY_COLOR_KEY'

const primaryColor = window.localStorage.getItem(PRIMARY_COLOR_KEY) || '#2BB0ED'
const secondaryColor = window.localStorage.getItem(SECONDARY_COLOR_KEY) || '#616E7C'

window.Vue.use(window.Vuetify, {
  theme: {
    primary: {
      base: primaryColor,
      lighten1: '#40C3F7',
      lighten2: '#5ED0FA',
      lighten3: '#81DEFD',
      lighten4: '#B3ECFF',
      lighten5: '#E3F8FF',
      darken1: '#1992D4',
      darken2: '#127FBF',
      darken3: '#0B69A3',
      darken4: '#035388'
    },
    secondary: {
      base: secondaryColor,
      lighten1: '#7B8794',
      lighten2: '#9AA5B1',
      lighten3: '#CBD2D9',
      lighten4: '#E4E7EB',
      lighten5: '#F5F7FA',
      darken1: '#52606D',
      darken2: '#3E4C59',
      darken3: '#323F4B',
      darken4: '#1F2933'
    },
    accent: {
      base: '#DA127D',
      lighten1: '#E8368F',
      lighten2: '#F364A2',
      lighten3: '#FF8CBA',
      lighten4: '#FFB8D2',
      lighten5: '#FFE3EC',
      darken1: '#BC0A6F',
      darken2: '#A30664',
      darken3: '#870557',
      darken4: '#620042'
    },
    error: {
      base: '#E12D39',
      lighten1: '#EF4E4E',
      lighten2: '#F86A6A',
      lighten3: '#FF9B9B',
      lighten4: '#FFBDBD',
      lighten5: '#FFE3E3',
      darken1: '#CF1124',
      darken2: '#AB091E',
      darken3: '#8A041A',
      darken4: '#610316'
    },
    // Taken from palete 3
    success: {
      base: '#F0B429',
      lighten1: '#F7C948',
      lighten2: '#FADB5F',
      lighten3: '#FCE588',
      lighten4: '#FFF3C4',
      lighten5: '#FFFBEA',
      darken1: '#DE911D',
      darken2: '#CB6E17',
      darken3: '#B44D12',
      darken4: '#8D2B0B'
    },
    grey: {
      base: '#27AB83',
      lighten1: '#3EBD93',
      lighten2: '#65D6AD',
      lighten3: '#8EEDC7',
      lighten4: '#C6F7E2',
      lighten5: '#EFFCF6',
      darken1: '#199473',
      darken2: '#147D64',
      darken3: '#0C6B58',
      darken4: '#014D40'
    }
  }
})

window.axios.interceptors.response.use((response) => {
  return response
}, function (error) {
  if (window.disableInterceptor) return Promise.reject(error)
  if (error && error.response) {
    // Refresh CSRF TOKEN
    // dAMpDXBRrjVJ2TKewouYHgOeozZmW72EiAt5K1jY
    console.log('PROVA ###############')
    if (error.response.status === 419) {
      console.log('419 error intercepted!!!!!')
      return window.helpers.getCsrfToken().then((token) => {
        console.log('TOKEN OBTAINED:')
        console.log(token)
        window.helpers.updateCsrfToken(token)
        console.log('csrf token updated!')
        error.config.headers['X-CSRF-TOKEN'] = token
        console.log('resend request!!!')
        return window.axios.request(error.config)
      }).catch(e => {
        console.log("NO s'ha pogut obtenir el CSRFTOKEN")
        console.log(e)
      })
    }
    console.log('1')
    if (error.response.status === 401) {
      window.Vue.prototype.$snackbar.showError("No heu entrat al sistema o ha caducat la sessió. Renviant-vos a l'entrada del sistema")
      const loginUrl = location.pathname ? '/login?back=' + location.pathname : '/login'
      console.log('Waiting to redirect to:')
      console.log(loginUrl)
      setTimeout(function () { window.location = loginUrl }, 3000)
      // Break the promise chain -> https://github.com/axios/axios/issues/715
      return new Promise(() => {})
    }
    if (error.response.status === 403) {
      window.Vue.prototype.$snackbar.showSnackBar(
        'Error 403!',
        'error',
        'No teniu permisos per realitzar aquesta acció.',
        'center'
      )
    }
    console.log('2')
    if (error.response.status === 422) {
      console.log('%%%%%%%%%%%%%%%%% ERROR DE VALIDACIó %%%%%%%%%%%%%%%')
      console.log(error.response)
      console.log(error.response.data)
      console.log(error.response.data.message)
      console.log(error.response.data.errors)
      window.Vue.prototype.$snackbar.showSnackBar(
        error.response.data.message,
        'error',
        window.helpers.printObject(error.response.data.errors),
        'center'
      )
    }
    console.log('3')
    if (error.response.status === 404) {
      console.log('%%%%%%%%%%%%%%%%% NOT FOUND ERROR %%%%%%%%%%%%%%%')
      console.log(error.response)
      console.log(error.response.data)
      console.log(error.response.data.message)
      console.log(error.response.data.errors)
      window.Vue.prototype.$snackbar.showSnackBar(
        'Error 404!',
        'error',
        "No s'ha pogut trobar al servidor el recurs que demaneu.",
        'center'
      )
    }
    if (error.response.status === 405) {
      console.log('%%%%%%%%%%%%%%%%% METHOD NOT ALLOWED FOUND ERROR %%%%%%%%%%%%%%%')
      console.log(error.response)
      console.log(error.response.data)
      console.log(error.response.data.message)
      console.log(error.response.data.errors)
      window.Vue.prototype.$snackbar.showSnackBar(
        'Error 405!',
        'error',
        'Tipus de petició HTTP incorrecte.',
        'center'
      )
    }
    if (error.response.status === 500) {
      console.log('%%%%%%%%%%%%%%%%% SERVER ERROR %%%%%%%%%%%%%%%')
      console.log(error.response)
      console.log(error.response.data)
      console.log(error.response.data.message)
      console.log(error.response.data.errors)
      window.Vue.prototype.$snackbar.showSnackBar(
        'Error 500!',
        'error',
        'Error inesperat al servidor',
        'center'
      )
    }
    return Promise.reject(error)
  }
  if (error.request) {
    window.Vue.prototype.$snackbar.showError("Error de xarxa! No s'ha obtingut cap resposta a la vostra petició. Consulteu l'estat de la xarxa.")
    window.Vue.prototype.$snackbar.showSnackBar('Error de xarxa!', 'error', "No s'ha obtingut cap resposta a la vostra petició. Consulteu l'estat de la xarxa.")
    return Promise.reject(error)
  }
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// eslint-disable-next-line no-undef
window.Vue.component('example-component', ExampleComponent)
window.Vue.component('tasks', Tasks)
window.Vue.component('tasques', Tasques)
window.Vue.component('tags', Tags)
window.Vue.component('login-form', LoginForm)
window.Vue.component('register-form', RegisterForm)
window.Vue.component('user-list', UserList)
window.Vue.component('user-select', UserSelect)
window.Vue.component('impersonate', Impersonate)
window.Vue.component('tasks-create', TaskCreate)
window.Vue.component('git-info', GitInfo)
window.Vue.component('color', Color)
window.Vue.component('profile', Profile)
window.Vue.component('service-worker', ServiceWorker)
window.Vue.component('navigation-menu', NavigationMenu)
window.Vue.component('navigation-profile', NavigationProfile)
window.Vue.component('toolbar', Toolbar)
window.Vue.component('notifications-widget', NotificationsWidget)
window.Vue.component('gps', GpsFeature)
window.Vue.component('vibrate', Vibrate)
window.Vue.component('battery', Battery)
window.Vue.component('memory', Memory)
window.Vue.component('speed', Speed)
window.Vue.component('onlinenet', Online)
window.Vue.component('orientation', Orientation)
window.Vue.component('screenol', ScreenOL)
window.Vue.component('newsletter-subscription-card', NewsLetterSubscriptionCard)
// Notifications
window.Vue.component('notifications', Notifications)
window.Vue.component('user-select-component', UserSelectComponent)
window.Vue.component('share-fab', ShareFab)
window.Vue.component('img-webp', ImgWebp)
window.Vue.component('v-parallax-webp', VParallaxWebp)
window.Vue.component('newsletters', Newsletters)
window.Vue.component('clock', Clock)
window.Vue.use(VueTimeago, {
  locale: 'ca', // Default locale
  locales: {
    'ca': 'date-fns/locale/ca'
  }
})
window.Vue.use(TreeView)

// eslint-disable-next-line no-unused-vars
const app = new window.Vue(AppComponent)
