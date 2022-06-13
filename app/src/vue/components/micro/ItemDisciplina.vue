<template>
    <div class="ItemDisciplinaComponent col-xs-12 col-sm-3">
      <a href="javascript:void(0)" @click="escolhaDisciplina">
      <div class="certificate-item clearfix">
<!--        <div class="certi-logo" style="width: 120px; min-width: 120px; max-width: 120px; height: 115px;">
          <img :src="(logo)? logo : 'img/clients/client-1.png'" alt="logo">
        </div>-->

        <div class="certi-content">
          <div class="certi-title">
            <h4>{{ disciplina.nome }}</h4>
          </div>
          <div class="certi-id">
            <span>Codigo: {{ disciplina.codigo }}</span>
          </div>
          <div class="certi-date">
            <span>Grade: {{ disciplina.grade }} - {{ disciplina.periodo }} Período</span>
          </div>
          <div class="certi-company">
            <span></span>
          </div>
        </div>
      </div>
      </a>
    </div>
</template>

<script>
import $ from "jquery";

export default {

  name: 'ItemDisciplina',

  components: {  },

  props: [ 'disciplina', ],

  data(){
    return {

    }
  },

  methods: {

    escolhaDisciplina(){
      this.$root.changeDisciplinaSelect( this.disciplina ) ;
    }
  }

}
</script>

<style scoped>

</style>