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

        tipos: [],

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
    },

  methods: {
      async getAllCursos(){
          let thiss = this;
          await axios.get(this.apiRoute + '/cursos').then(function (response) { thiss.cursos = thiss.cursosEPO = response.data; })
      },
      changeCursoSelect(curso){
          this.cursoSelect = curso;
          this.getGradesByCurso(this.cursoSelect.id);

          this.changeMenu('disciplinas');
      },
      changeDisciplinaSelect(disciplina){
          this.disciplinaSelect = disciplina;

          this.getProvasByDisciplina(this.disciplinaSelect.id);

          this.changeMenu('provas');
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
      getProvasByDisciplina(disciplinaId){
          //let thiss = this;

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
          await axios.get(this.apiRoute + '/tipos').then(function (response) { thiss.tipos = response.data; })
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

