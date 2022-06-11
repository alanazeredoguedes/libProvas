import Vue from 'vue'
import App from './App.vue'

import $ from 'jquery'
import PopperJs from 'popper.js'


window.jQuery = window.$ = $
window.Popper = PopperJs
require('bootstrap')


Vue.config.productionTip = true


const AppVue = new Vue({

  delimiters: ['{', '}'],

  data: {
      project: null,
  },

  methods: {

  },

  computed:{  },

  //beforeMount(){  },

  render(createElement, context) {
    return createElement(App,{
      props: {

      }
    })
  },

  components:{ App }
}).$mount('#app')


export default AppVue

//console.log(localStorage.getItem('langDefault'))

