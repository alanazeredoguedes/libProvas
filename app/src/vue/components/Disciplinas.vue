<template>
  <div class="DisciplinasComponent" >

    <!-- Resume Subpage -->
    <section data-id="disciplinas" class="disciplinas animated-section">
      <div class="page-title">
        <h2>Disciplinas</h2>
      </div>

      <div class="section-content">


        <div class="white-space-50"></div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="block-title">
              <h3>Todas Disciplinas</h3>
            </div>
          </div>
        </div>

        <div class="row">

          <ItemDisciplina :titulo="'Disciplina1'" :descricao="'Descrição ....'"/>
          <ItemDisciplina/>
          <ItemDisciplina/>
          <ItemDisciplina/>

        </div>
        <!-- End of Certificates -->
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

  }

}
</script>

<style scoped>

</style>