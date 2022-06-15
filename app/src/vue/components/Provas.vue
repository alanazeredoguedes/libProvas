<template>
  <div class="ProvasComponent" >
    <section data-id="provas" class="provas animated-section">
      <div class="page-title">
        <h2>Prov<span>as</span></h2>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-10" >

          <div class="block-title" v-if="$root.cursoSelect && $root.disciplinaSelect">
            <h3>Provas de <span>{{ $root.disciplinaSelect.nome }}</span></h3>
            <h3 style="font-size: 18px;">Codigo: <span> {{ $root.disciplinaSelect.codigo }}</span></h3>
            <h3 style="font-size: 18px;">Grade: <span> {{ $root.disciplinaSelect.grade }}</span></h3>
          </div>

          <div class="block-title" v-if="!$root.cursoSelect">
            <h3>Sem Curso Selecionado</h3>
          </div>

          <div class="block-title" v-if="$root.cursoSelect && !$root.disciplinaSelect">
            <h3>Sem Disciplina Selecionado</h3>
          </div>

        </div>
      </div>

      <div class="section-content">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="portfolio-content">


              <ul class="portfolio-filters" v-if="$root.cursoSelect && $root.disciplinaSelect">

                <li class="active btn-filter-prova" @click="enabledTab('todos')">
                  <a class="filter btn btn-sm btn-link">Todas</a>
                </li>

                <li v-for="(tipo, index) in $root.tipos" @click="enabledTab(tipo.tipo)">
                  <a class="filter btn btn-sm btn-link">{{ tipo.tipo }}</a>
                </li>

              </ul>



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


              <div class="row" v-if="$root.cursoSelect && !$root.disciplinaSelect">
                <div class="col-xs-12 col-sm-12">
                  <div class="col-inner">
                    <div class="info-list-w-icon">

                      <a href="javascript:void(0)" @click="$root.changeMenu('disciplinas')" style="color: white;" class="certificate-item">
                        <div class="info-block-w-icon" style="margin: 18px;">
                          <div class="ci-icon">
                            <i class="lnr lnr-list"></i>
                          </div>
                          <div class="ci-text">
                            <h4>Selecionar Disciplina</h4>
                            <p>Para continuar, selecione uma disciplina.</p>
                          </div>
                        </div>
                      </a>

                    </div>
                  </div>
                </div>
              </div>



              <div class="row" v-if="$root.cursoSelect && $root.disciplinaSelect && $root.provasDisciplina.length === 0">
                <div class="col-xs-12 col-sm-12">
                  <div class="col-inner">
                    <div class="info-list-w-icon">

                      <a href="javascript:void(0)" @click="$root.changeMenu('enviar-provas')" style="color: white;" class="certificate-item">
                        <div class="info-block-w-icon" style="margin: 18px;">
                          <div class="ci-icon">
                            <i class="lnr lnr-file-empty"></i>
                          </div>
                          <div class="ci-text">
                            <h4>Sem Prova Cadastrada!</h4>
                            <p style="color: #f58545;">Contribuir enviando uma prova!</p>
                          </div>
                        </div>
                      </a>

                    </div>
                  </div>
                </div>
              </div>







<!--              <div class="portfolio-grid three-columns" >


                <figure v-for="(prova, index) in $root.provasDisciplina" class="item standard" :data-groups="['category_all', 'category_'+prova.tipoProva]">
                  <div class="portfolio-item-img">
                    <img src="img/portfolio/2.jpg" alt="Media Project 2" title="" />
                    <a href="portfolio-1.html" class="ajax-page-load"></a>
                  </div>

                  <i class="far fa-file-alt"></i>
                  <h4 class="name">Detailed Project - {{ prova.tipoProva }}</h4>
                  <span class="category">Detailed</span>
                </figure>

              </div>-->


              <div class="section-content">


                      <div class="row">


                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 item-prova" :class="'item-prova-'+prova.tipoProva" style="margin-bottom: 20px;" v-for="(prova, index) in $root.provasDisciplina">
                          <a href="javascript:void(0)" @click="selectProva(prova)">
                          <div class="item post-1" >
                            <div class="blog-card">
                              <div class="media-block">
                                <div class="category">
                                  <a :title="prova.tipoProva">{{ prova.tipoProva }}</a>
                                </div>
                                <a>
                                  <img src="img/blog/blog_post_1.jpg" class="size-blog-masonry-image-two-c" alt="Why I Switched to Sketch For UI Design" title="" />

                                  <!-- v-for="(image, index) in prova.arquivos" -->
<!--                                  <img  v-if="!prova.arquivos[0].contentType.includes('application')" :src=" $root.imagesRoute + prova.arquivos[0].url" class="size-blog-masonry-image-two-c" alt="" title="" >-->



                                  <div class="mask"></div>
                                </a>
                              </div>
                              <div class="post-info">
                                <div class="post-date"><b>{{ prova.data }}</b></div>
                                <a >
                                  <h4 class="blog-item-title">Prova {{ prova.tipoProva }} - {{ prova.disciplina.nome }}</h4>
                                </a>
                              </div>
                            </div>
                          </div>
                          </a>
                        </div>


                      </div>



              </div>





            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import $ from "jquery";

export default {

  name: 'Provas',

  components: {  },

  props: [ '', '', ],

  data(){
    return {

    }
  },

  methods: {
    selectProva(prova){
      this.$root.provaSelect = null;
      this.$root.provaSelect = prova;
    },

    enabledTab(tipo){
      //alert('dasds')
      let itemProva = $('.item-prova')
      if(tipo === 'todos'){
        itemProva.css("display", "block");
        return
      }
      itemProva.css("display", "none");

      $('.item-prova-'+tipo).css("display", 'block');
      setTimeout(()=>{    },1000)

    }
  }


}
</script>

<style scoped>

</style>