<template>
    <div class="ItemCursoComponent col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
      <a href="javascript:void(0)" @click="escolhaCurso" style="color: white;">
        <div class="fun-fact gray-default">
<!--          <i class="lnr lnr-star"></i>-->
          <h4>{{ curso.nome }}</h4>
          <span class="fun-fact-block-value" style="">{{ curso.numeroDisciplinas }}</span>
          <span class="fun-fact-block-text" style="">Disciplinas cadastradas</span>
          <span class="fun-fact-block-text" style="">em {{ curso.numeroGrades }} grades.</span>
        </div>
      </a>
    </div>
</template>

<script>
import $ from "jquery";

export default {

  name: 'ItemCurso',

  components: {  },

  props: [ 'curso', '', ],

  data(){
    return {

    }
  },

  methods: {
    escolhaCurso(){

      this.$root.changeCursoSelect( this.curso ) ;

    }
  }

}
</script>

<style scoped>

</style>