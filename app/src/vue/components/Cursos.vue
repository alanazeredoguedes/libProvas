<template>
  <div class="CursosComponent" >
    <section data-id="cursos" class="cursos animated-section">

      <div class="page-title">
        <h2>Curs<span>os</span></h2>
      </div>

      <div class="section-content">

<!--        <div class="white-space-50"></div>-->


<!--        <div class="row">
          <div class="col-xs-12 col-sm-12">

            <div class="block-title">
              <h3>Todos <span>Cursos</span></h3>
            </div>
          </div>
        </div>-->

        <div class="row">

          <ItemCurso v-if="$root.cursos" v-for="(curso, index) in $root.cursos" :curso="curso" />


        </div>



      </div>
    </section>

  </div>
</template>

<script>
import $ from "jquery";
import ItemCurso from "./micro/ItemCurso";

export default {

  name: 'Cursos',

  components: {ItemCurso  },

  props: [ '', '', ],

  data(){
    return {

    }
  },

  methods: {

  }

}
</script>

<style scoped>

</style>