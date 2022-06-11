<template>
    <div class="ItemCursoComponent col-xs-12 col-sm-4 ">
      <a href="javascript:void(0)" @click="escolhaCurso" style="color: white;">
        <div class="fun-fact gray-default">
<!--          <i class="lnr lnr-star"></i>-->
          <h4>{{ curso.nome }}</h4>
          <span class="fun-fact-block-value" style="">{{ curso.numeroDisciplinas }}</span>
          <span class="fun-fact-block-text" style="">Disciplinas</span>
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
      this.$root.cursoSelecionado = this.curso;
      this.$root.changeMenu('disciplinas')
    }
  }

}
</script>

<style scoped>

</style>