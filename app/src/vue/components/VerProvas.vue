<template>
  <div class="VerProvasComponent" >

    <!-- Blog Subpage -->
    <section data-id="ver-provas" class="ver-provas animated-section">

        <div class="row">

          <div class="col-10" style="background: #222222">
            <div class="page-title">
              <h2>Ver Prova</h2>
            </div>
          </div>

          <div class="col-2" style="background: #222222">
            <div id="ajax-page" class="ajax-page-content">
              <div class="ajax-page-wrapper" style="padding: 0 0 50px;">
                <div class="ajax-page-nav">
                  <div class="nav-item ajax-page-close-button">
                    <a id="ajax-page-close-button" @click="$root.changeMenu('provas')" href="javascript:void(0)"><i class="lnr lnr-cross"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-10" >

          <div class="block-title" v-if="$root.cursoSelect && $root.disciplinaSelect && $root.provaSelect">

            <h3>Provas da Disciplina: <span>{{ $root.disciplinaSelect.nome }}</span></h3>
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



<!--      <div class="portfolio-grid four-columns shuffle" v-if="$root.cursoSelect && $root.disciplinaSelect && $root.provaSelect">


        <figure class="item lbimage" v-for="(arquivo, index) in $root.provaSelect.arquivos" v-if="!arquivo.contentType.includes('application')">
          <div class="portfolio-item-img">
            <img :src="$root.imagesRoute + arquivo.url" :alt="arquivo.name" :title="arquivo.name" style="max-width: 300px;" />&lt;!&ndash; img/portfolio/2.jpg &ndash;&gt;
            <a class="lightbox" :title="arquivo.name" :href="$root.imagesRoute + arquivo.url"></a>
          </div>

          <i class="far fa-image"></i>
          <h4 class="name">{{ arquivo.name }}</h4>
          <span class="category">Mockups</span>
        </figure>



      </div>-->








      <div class="row"  v-if="$root.cursoSelect && $root.disciplinaSelect && $root.provaSelect">


        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-2 item-prova"  style="margin-bottom: 20px; "  v-for="(arquivo, index) in $root.provaSelect.arquivos" v-if="!arquivo.contentType.includes('application')">
            <div class="item post-1" style="">
              <a class="lightbox" :title="arquivo.name" :href="$root.imagesRoute + arquivo.url">
              <div class="blog-card">
                <div class="media-block">
                  <div class="category">
                    <a :title="arquivo.contentType">{{ arquivo.contentType }}</a>
                  </div>
                  <a>
                    <img :src="$root.imagesRoute + arquivo.url" :alt="arquivo.name" :title="arquivo.name" class="size-blog-masonry-image-two-c" />
                    <div class="mask"></div>
                  </a>
                </div>
                <div class="post-info">
                  <!-- <div class="post-date"><b></b></div> -->
                  <a>
                    <h4 class="blog-item-title">{{ arquivo.name }}</h4>
                  </a>
                </div>
              </div>
              </a>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-2 item-prova"  style="margin-bottom: 20px; "  v-for="(arquivo, index) in $root.provaSelect.arquivos" v-if="arquivo.contentType.includes('application')">
          <div class="item post-1" style="">
            <a class="" :title="arquivo.name" target="_blank" :href="$root.imagesRoute + arquivo.url">
              <div class="blog-card">
                <div class="media-block">
                  <div class="category">
                    <a :title="arquivo.contentType">{{ arquivo.contentType }}</a>
                  </div>
                  <a>
                    <img v-if="arquivo.contentType.includes('application')" :src="$root.imagesRoute + '/img/pdf-image.png'" :alt="arquivo.name" :title="arquivo.name" class="size-blog-masonry-image-two-c" />
                    <div class="mask"></div>
                  </a>
                </div>
                <div class="post-info">
                  <!-- <div class="post-date"><b></b></div> -->
                  <a>
                    <h4 class="blog-item-title">{{ arquivo.name }}</h4>
                  </a>
                </div>
              </div>
            </a>
          </div>
        </div>






      </div>














    </section>



























  </div>
</template>

<script>
import $ from "jquery";

export default {

  name: 'VerProvas',

  components: {  },

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