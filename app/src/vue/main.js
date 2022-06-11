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
      apiRoute: 'http://127.0.0.1:9003/api/',
      cursos: {
        cursos: [],
        total: null,
      },
      gradeCurricular: [],
      cursoSelecionado: null,


  },

  methods: {

    getCursos(){
      let thiss = this
      $.get(this.apiRoute +  "cursos", function( data ) {
        console.log(data)
        thiss.cursos.cursos = data['hydra:member'];
        thiss.cursos.total = data['hydra:totalItems'];
      });
    },



    changeMenu(menuItem){
      $(`.btn-${menuItem}`)[0].click()
    }


  },

  computed:{  },

  beforeMount(){

    this.getCursos()

  },

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

