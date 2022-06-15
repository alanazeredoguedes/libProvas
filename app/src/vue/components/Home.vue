<template>
  <div class="HomeComponent" >

    <!-- Home Subpage -->
    <section data-id="home" class="home animated-section start-page "><!-- ps ps--theme_default section-active -->

        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="title-block">
              <h2>Repositório de Provas</h2>
              <div class="owl-carousel text-rotation">

                <div class="item">
                  <div class="sp-subtitle">Sistema de Distribuição de Provas</div>
                </div>

                <div class="item">
                  <div class="sp-subtitle">Envie Provas e Contribua com o Projeto</div>
                </div>

              </div>
            </div>
          </div>
        </div>


      <div class="white-space-50"></div>


      <!-- Services -->
      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <div class="block-title">
            <h3>Como <span>Utilizar</span></h3>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="col-inner">
            <div class="info-list-w-icon">

              <a href="javascript:void(0)" @click="changeMenu('cursos')" style="color: white;" class="certificate-item">
                <div class="info-block-w-icon" style="margin: 18px;">
                  <div class="ci-icon">
                    <i class="lnr lnr-layers"></i>
                  </div>
                  <div class="ci-text">
                    <h4>Selecione um Curso</h4>
                    <p>Pellentesque pellentesque, ipsum sit amet auctor accumsan, odio tortor bibendum massa, sit amet ultricies ex lectus scelerisque nibh. Ut non sodales.</p>
                  </div>
                </div>
              </a>

              <a href="javascript:void(0)" @click="changeMenu('disciplinas')" style="color: white;" class="certificate-item">
                <div class="info-block-w-icon" style="margin: 18px;">
                  <div class="ci-icon">
                    <i class="lnr lnr-list"></i>
                  </div>
                  <div class="ci-text">
                    <h4>Escolha uma Disciplina</h4>
                    <p>Pellentesque pellentesque, ipsum sit amet auctor accumsan, odio tortor bibendum massa, sit amet ultricies ex lectus scelerisque nibh. Ut non sodales.</p>
                  </div>
                </div>
              </a>


            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6">
          <div class="col-inner">
            <div class="info-list-w-icon">

              <a href="javascript:void(0)" @click="changeMenu('provas')" style="color: white;" class="certificate-item">
                <div class="info-block-w-icon " style="margin: 18px;">
                  <div class="ci-icon">
                    <i class="lnr lnr-file-empty"></i>
                  </div>
                  <div class="ci-text">
                    <h4>Acesse as Provas</h4>
                    <p>Pellentesque pellentesque, ipsum sit amet auctor accumsan, odio tortor bibendum massa, sit amet ultricies ex lectus scelerisque nibh. Ut non sodales.</p>
                  </div>
                </div>
              </a>

              <a href="javascript:void(0)" @click="changeMenu('enviar-provas')" style="color: white;" class="certificate-item">
                <div class="info-block-w-icon" style="margin: 18px;">
                  <div class="ci-icon">
                    <i class="lnr lnr-upload"></i>
                  </div>
                  <div class="ci-text">
                    <h4>Contribua com Provas</h4>
                    <p>Pellentesque pellentesque, ipsum sit amet auctor accumsan, odio tortor bibendum massa, sit amet ultricies ex lectus scelerisque nibh. Ut non sodales.</p>
                  </div>
                </div>
              </a>

            </div>
          </div>
        </div>
      </div>
      <!-- End of Services -->



      <br>
<!--      <div class="white-space-50"></div>-->


      <!-- Fun Facts -->
<!--      <div class="row">
        <div class="col-xs-12 col-sm-12">

          <div class="block-title">
            <h3>Dados <span>Estatisticos</span></h3>
          </div>
        </div>
      </div>-->

      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <div class="fun-fact gray-default">
            <i class="lnr lnr-layers"></i>
            <h4>Cursos</h4>
            <span class="fun-fact-block-value">{{ $root.numeroCursos }}</span>
            <span class="fun-fact-block-text"></span>
          </div>
        </div>

        <div class="col-xs-12 col-sm-4">
          <div class="fun-fact gray-default">
            <i class="lnr lnr-list"></i>
            <h4>Disciplinas</h4>
            <span class="fun-fact-block-value">{{ $root.numeroDisciplinas }}</span>
            <span class="fun-fact-block-text"></span>
          </div>
        </div>

        <div class="col-xs-12 col-sm-4 ">
          <div class="fun-fact gray-default">
            <i class="lnr lnr-file-empty"></i>
            <h4>Provas</h4>
            <span class="fun-fact-block-value">{{ $root.numeroProvas }}</span>
            <span class="fun-fact-block-text"></span>
          </div>
        </div>
      </div>
      <!-- End of Fun Facts -->








    </section>
    <!-- End of Home Subpage -->


  </div>
</template>

<script>
import $ from "jquery";

export default {

  name: 'Home',

  components: {  },

  props: [ '', '', ],

  data(){
    return {

    }
  },

  methods: {
    changeMenu(menuItem){
      $(`.btn-${menuItem}`)[0].click()
    }

  }

}
</script>

<style scoped>

</style>