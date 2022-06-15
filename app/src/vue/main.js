import Vue from 'vue'
import App from './App.vue'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css'

import $ from 'jquery'
import PopperJs from 'popper.js'
import axios from "axios";


window.jQuery = window.$ = $
window.Popper = PopperJs
require('bootstrap')

Vue.component('v-select', vSelect)


Vue.config.productionTip = true


const AppVue = new Vue({

    delimiters: ['{', '}'],

    data: {
        apiRoute: 'http://127.0.0.1:9004/api_v2',
        imagesRoute: 'http://127.0.0.1:9004',

        numeroCursos: '',
        numeroDisciplinas: '',
        numeroProvas: '',

        provasDisciplina: [],
        provaSelect: null,

        disciplinasComProva: 0,
        disciplinaPesquisar: '',

        tipos: [],
        tipoProvaEPS: '-1',

        cursos: [],
        cursoSelect: null,

        grades: [],
        gradeSelect: null,

        disciplinas: [],
        disciplinaSelect: null,

        cursosEPO: [],
        cursoEPS: '-1',

        gradesEPO: [],
        gradeEPS: '-1',

        disciplinasEPO: [],
        disciplinaEPS: '-1',

    },
    watch: {
        gradeSelect(){
            this.updateDisciplinasByGrade(this.grades[this.gradeSelect])
            //alert(this.gradeSelect)
        },
        disciplinaSelect(){
            this.getProvasByDisciplina(this.disciplinaSelect.id);
            this.changeMenu('provas');

        },
        provaSelect(){
            this.changeMenu('ver-provas');
            console.log(this.provaSelect)
        },
        cursoEPS(){
            this.gradesEPO = [];
            this.gradeEPS = -1;
            this.disciplinasEPO = [];
            this.disciplinaEPS = -1;


            if(this.cursoEPS !== '-1'){
                $('.curso-select-error').html('');
                this.getGradesByCurso2(this.cursosEPO[this.cursoEPS].id)
            }else{
                $('.curso-select-error').html('Escolha o Curso');
            }

        },
        gradeEPS(){
            this.disciplinasEPO = [];
            this.disciplinaEPS = -1

            if(this.gradeEPS !== '-1'){
                $('.grade-select-error').html('');
                this.updateDisciplinasByGrade2(this.gradesEPO[this.gradeEPS])
            }else{
                $('.grade-select-error').html('Escolha a Grade');
            }
        },
        disciplinaEPS(){
            if(this.disciplinaEPS !== '-1'){
                $('.disciplina-select-error').html('');
            }else{
                $('.disciplina-select-error').html('Escolha a Disciplina');
            }
        },
        tipoProvaEPS(){
            if(this.tipoProvaEPS !== '-1'){
                $('.tipo-prova-select-error').html('');
            }else{
                $('.tipo-prova-select-error').html('Escolha um Tipo de Prova');
            }
        },
    },

  methods: {
      async getInfos(){
          let thiss = this;
          await axios.get(this.apiRoute + '/infos').then(function (response) {
              thiss.numeroCursos = response.data['numeroCursos']
              thiss.numeroDisciplinas = response.data['numeroDisciplinas']
              thiss.numeroProvas = response.data['numeroProvas']
          })
      },
      async getAllCursos(){
          let thiss = this;
          await axios.get(this.apiRoute + '/cursos').then(function (response) { thiss.cursos = thiss.cursosEPO = response.data; })
      },
      changeCursoSelect(curso){
          this.cursoSelect = null;
          this.cursoSelect = curso;
          this.getGradesByCurso(this.cursoSelect.id);

          this.changeMenu('disciplinas');
      },
      async getGradesByCurso(cursoId){
          let thiss = this;
          await axios.get(this.apiRoute + '/grade_curricular/' + cursoId)
              .then(function (response) {
                  thiss.grades = response.data;
                  thiss.gradeSelect = 0
                  thiss.updateDisciplinasByGrade(thiss.grades[0]);
                })
      },
      async getGradesByCurso2(cursoId){
          let thiss = this;
          await axios.get(this.apiRoute + '/grade_curricular/' + cursoId)
              .then(function (response) {
                  thiss.gradesEPO = response.data;
                  thiss.gradeEPS = 0
                  thiss.updateDisciplinasByGrade2(thiss.grades[0]);
              })
      },
      async getProvasByDisciplina(disciplinaId){
          let thiss = this;
          await axios.get(this.apiRoute + '/provas_by_disciplina/' + disciplinaId).then(function (response) {
              thiss.provasDisciplina = response.data;
          })
          //console.log(this.provasDisciplina)
      },
      updateDisciplinasByGrade(grade){
          this.disciplinas = [];
          if(!grade)
              return;
          grade.disciplinas.forEach((disciplina)=>{
              this.disciplinas.push(disciplina);
          })
      },
      updateDisciplinasByGrade2(grade){
          if(!grade)
              return;

          this.disciplinaEPS = 0;

          grade.disciplinas.forEach((disciplina)=>{
              this.disciplinasEPO.push(disciplina);
          })
      },

      async getTipos(){
          let thiss = this;
          await axios.get(this.apiRoute + '/tipos').then(function (response) { thiss.tipos = response.data; /*thiss.tipoProvaEPS = 0;*/ })
      },



    changeMenu(menuItem){

          //alert(menuItem);

        $(`.btn-${menuItem}`)[0].click()
    }


  },

  computed:{
      listOptionsSelectGradeCurricular(){
          if(!this.grades || this.grades.length === 0)
              return

          return this.grades.map( (value,index)=>{
              return { label: value.grade, code: value.id }
          })
      },


  },

  beforeMount(){
        this.getAllCursos()
        this.getTipos()
        this.getInfos()

  },

  render(createElement, context) {
    return createElement(App,{
      props: {

      }
    })
  },

  components:{ App }
}).$mount('#app')


$( document ).ready(function() {
    //$(`.btn-home`)[0].click()
});


export default AppVue

//console.log(localStorage.getItem('langDefault'))

