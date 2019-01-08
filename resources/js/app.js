
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

window.Vue = Vue
window.Vue.use(permissions)
window.Vue.use(snackbar)
window.Vue.use(confirm)

window.Vuetify = Vuetify

const PRIMARY_COLOR_KEY = 'primary_color_key'

const primaryColor = window.localStorage.getItem(PRIMARY_COLOR_KEY) || '#2680C2'

window.Vue.use(window.Vuetify, {
  theme: {
    primary: {
      base: primaryColor,
      lighten1: '#4098D7',
      lighten2: '#62B0E8',
      lighten3: '#84C5F4',
      lighten4: '#B6E0FE',
      lighten5: '#DCEEFB',
      darken1: '#186FAF',
      darken2: '#0F609B',
      darken3: '#0A558C',
      darken4: '#003E6B'
    },
    secondary: {
      base: '#2CB1BC',
      lighten1: '#38BEC9',
      lighten2: '#54D1DB',
      lighten3: '#87EAF2',
      lighten4: '#BEF8FD',
      lighten5: '#E0FCFF',
      darken1: '#14919B',
      darken2: '#0E7C86',
      darken3: '#0A6C74',
      darken4: '#044E54'
    },
    accent: {
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
    error: {
      base: '#BA2525',
      lighten1: '#D64545',
      lighten2: '#E66A6A',
      lighten3: '#F29B9B',
      lighten4: '#FACDCD',
      lighten5: '#FFEEEE',
      darken1: '#A61B1B',
      darken2: '#911111',
      darken3: '#780A0A',
      darken4: '#610404'
    },
    // Taken from palete 3
    success: {
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
    },
    grey: {
      base: '#627D98',
      lighten1: '#829AB1',
      lighten2: '#9FB3C8',
      lighten3: '#BCCCDC',
      lighten4: '#D9E2EC',
      lighten5: '#F0F4F8',
      darken1: '#486581',
      darken2: '#334E68',
      darken3: '#243B53',
      darken4: '#102A43'
    }
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


// eslint-disable-next-line no-unused-vars
const app = new window.Vue(AppComponent)
