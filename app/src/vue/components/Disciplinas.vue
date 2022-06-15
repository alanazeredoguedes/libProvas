<template>
  <div class="DisciplinasComponent" >

    <!-- Resume Subpage -->
    <section data-id="disciplinas" class="disciplinas animated-section">
      <div class="page-title">
        <h2>Disciplin<span>as</span></h2>
      </div>

      <div class="section-content">

        <div class="row">

          <div class="col-xs-12 col-sm-6" >

            <div class="block-title" v-if="$root.cursoSelect">
              <h3>Disciplina de <span>{{ $root.cursoSelect.nome }}</span></h3>
            </div>

            <div class="block-title" v-if="!$root.cursoSelect">
              <h3>Sem Curso Selecionado</h3>
            </div>

          </div>


          <div class="col-xs-12 col-sm-2" v-if="$root.cursoSelect">

            <input id="form_name" type="text" v-model="$root.disciplinaPesquisar" name="name" class="form-control" placeholder="Pesquisar" required="required" >

          </div>

          <div class="col-xs-12 col-sm-2" v-if="$root.cursoSelect">

            <div class="form-group form-group-with-icon" >
              <select class="form-control" v-model="$root.disciplinasComProva" style="background: #222222;">
                <option :value="0">Todas</option>
                <option :value="1">Com Prova</option>
              </select>
            </div>
          </div>

          <div class="col-xs-12 col-sm-2" v-if="$root.cursoSelect">

            <div class="form-group form-group-with-icon">
              <select class="form-control" v-model="$root.gradeSelect" style="background: #222222;">
                <option v-for="(grade, index) in $root.grades" :value="index">Grade {{ grade.grade }}</option>
              </select>
            </div>

          </div>


        </div>





        <div class="row" v-if="!$root.cursoSelect">
          <div class="col-xs-12 col-sm-12">
            <div class="col-inner">
              <div class="info-list-w-icon">

                <a href="javascript:void(0)" @click="$root.changeMenu('cursos')" style="color: white;" class="certificate-item">
                  <div class="info-block-w-icon" style="margin: 18px;">
                    <div class="ci-icon">
                      <i class="lnr lnr-layers"></i>
                    </div>
                    <div class="ci-text">
                      <h4>Selecionar Curso</h4>
                      <p>Para continuar, selecione um curso.</p>
                    </div>
                  </div>
                </a>


              </div>
            </div>
          </div>



        </div>













        <div class="row">

          <ItemDisciplina v-if="$root.disciplinas && ( ( $root.disciplinasComProva === 0) ? true : (disciplina.numeroProvas > 0) ) && ( disciplina.nome.toLowerCase().includes($root.disciplinaPesquisar.toLowerCase()) || disciplina.codigo.toLowerCase().includes($root.disciplinaPesquisar.toLowerCase()) )"
                          v-for="disciplina in $root.disciplinas" :disciplina="disciplina"/>

        </div>




      </div>
    </section>
    <!-- End of Resume Subpage -->
  </div>
</template>

<script>
import $ from "jquery";
import ItemDisciplina from "./micro/ItemDisciplina";

export default {

  name: 'Disciplinas',

  components: {ItemDisciplina  },

  props: [ '', '', ],

  data(){
    return {

    }
  },

  methods: {

  },
  computed: {




  }

}
</script>

<style scoped>
.vue-select {
  border-radius: var(--vs-border-radius);
  white-space: normal;
  background-color: white;
  color: black;
  height: 90%;
}
</style>