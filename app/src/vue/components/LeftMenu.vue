<template>
  <div class="LeftMenuComponent" >

    <header id="site_header" class="header mobile-menu-hide">
      <ul class="main-menu">
        <li class="active">
          <a href="#home" @click="changeMenu('home')" class="nav-anim btn-home">
            <span class="menu-icon lnr lnr-home"></span>
            <span class="link-text">Home</span>
          </a>
        </li>
        <li>
          <a href="#cursos" @click="changeMenu('cursos')" class="nav-anim btn-cursos">
            <span class="menu-icon lnr lnr-layers"></span>
            <span class="link-text">Cursos</span>
          </a>
        </li>
        <li>
          <a href="#disciplinas" @click="changeMenu('disciplinas')" class="nav-anim btn-disciplinas">
            <span class="menu-icon lnr lnr-list"></span>
            <span class="link-text">Disciplinas</span>
          </a>
        </li>
        <li>
          <a href="#provas" @click="changeMenu('provas')" class="nav-anim btn-provas">
            <span class="menu-icon lnr lnr-file-empty"></span>
            <span class="link-text">Provas</span>
          </a>
        </li>
<!--        <li>
          <a href="#ver-provas" @click="changeMenu('ver-provas')" class="nav-anim">
            <span class="menu-icon lnr lnr-select"></span>
            <span class="link-text">Ver Provas</span>
          </a>
        </li>-->
        <li>
          <a href="#enviar-provas" @click="changeMenu('enviar-provas')" class="nav-anim btn-enviar-provas">
            <span class="menu-icon lnr lnr-upload"></span>
<!--            <i class="fa-solid fa-upload"></i>-->
            <span class="link-text">Enviar Provas</span>
          </a>
        </li>
        <li>
          <a href="#contato" @click="changeMenu('contato')" class="nav-anim btn-contato">
            <span class="menu-icon lnr lnr-envelope"></span>
            <span class="link-text">Contato</span>
          </a>
        </li>
      </ul>
    </header>


    <!-- Mobile Navigation -->
    <div class="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <!-- End Mobile Navigation -->



    <!-- Arrows Nav -->
<!--    <div class="lmpixels-arrows-nav">

      <div class="lmpixels-arrow-right">
        <i class="lnr lnr-chevron-right"></i>
      </div>

      <div class="lmpixels-arrow-left">
        <i class="lnr lnr-chevron-left"></i>
      </div>

    </div>-->
    <!-- End Arrows Nav -->


  </div>
</template>

<script>
import $ from "jquery";

export default {

  name: 'LeftMenu',

  components: {  },

  props: [ '', '', ],

  data(){
    return {

    }
  },

  methods: {
    changeMenu(itemActive){
      let listRemove = [ 'home', 'cursos', 'disciplinas', 'provas', 'ver-provas', 'enviar-provas', 'contato']

      listRemove.forEach((value)=>{
        if(itemActive !== value){
          $(`.${value}`).removeClass('section-active')
        }

      })



    }
  }

}
</script>

<style scoped>

</style>