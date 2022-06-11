<template>
  <div class="page" >
    <div class="page-content">

      <LeftMenu/>



      <div class="content-area">
        <div class="animated-sections">


          <Home/>

          <Cursos/>

          <Disciplinas/>

          <Provas/>

          <VerProvas/>

          <EnviarProvas/>

          <Contato/>


        </div>
      </div>





    </div>
  </div>
</template>

<script>

import $ from "jquery";
import LeftMenu from "./components/LeftMenu";
import Home from "./components/Home";
import Cursos from "./components/Cursos";
import Disciplinas from "./components/Disciplinas";
import Provas from "./components/Provas";
import EnviarProvas from "./components/EnviarProvas";
import Contato from "./components/Contato";
import VerProvas from "./components/VerProvas";

export default {
  props: [ '' ],
  data() {
    return{
    }
  },
  name: 'App',
  components: {
    VerProvas,
    Contato,
    EnviarProvas,
    Provas,
    Disciplinas,
    Cursos,
    Home,
    LeftMenu

  },
  methods: {

  },

}
</script>

<style>

</style>
