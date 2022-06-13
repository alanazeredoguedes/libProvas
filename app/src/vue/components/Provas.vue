<template>
  <div class="ProvasComponent" >
    <section data-id="provas" class="provas animated-section">
      <div class="page-title">
        <h2>Prov<span>as</span></h2>
      </div>

      <div class="white-space-50" v-if="!$root.cursoSelect || !$root.disciplinaSelect"></div>


      <div class="row">
        <div class="col-xs-12 col-sm-10" >

          <div class="block-title" v-if="$root.cursoSelect && $root.disciplinaSelect">
            <h3>Provas de <span>{{ $root.disciplinaSelect.nome }}</span></h3>
          </div>

          <div class="block-title" v-if="!$root.cursoSelect">
            <h3>Sem Curso Selecionado</h3>
          </div>

          <div class="block-title" v-if="$root.cursoSelect && !$root.disciplinaSelect">
            <h3>Sem Disciplina Selecionado</h3>
          </div>

        </div>
      </div>



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







      <div class="section-content" v-if="$root.cursoSelect && $root.disciplinaSelect">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="portfolio-content">



              <ul class="portfolio-filters">
                <li class="active">
                  <a class="filter btn btn-sm btn-link" data-group="category_all">All</a>
                </li>
                <li>
                  <a class="filter btn btn-sm btn-link" data-group="category_detailed">Detailed</a>
                </li>
                <li>
                  <a class="filter btn btn-sm btn-link" data-group="category_mockups">Mockups</a>
                </li>
                <li>
                  <a class="filter btn btn-sm btn-link" data-group="category_soundcloud">SoundCloud</a>
                </li>
                <li>
                  <a class="filter btn btn-sm btn-link" data-group="category_vimeo-videos">Vimeo Videos</a>
                </li>
                <li>
                  <a class="filter btn btn-sm btn-link" data-group="category_youtube-videos">YouTube Videos</a>
                </li>

                <li v-for="tipo in $root.tipos">
                  <a class="filter btn btn-sm btn-link" data-group="category_youtube-videos">{{ tipo.tipo }}</a>
                </li>
              </ul>



              <div class="portfolio-grid three-columns" >

                <figure class="item lbaudio" data-groups='["category_all", "category_soundcloud"]'>
                  <div class="portfolio-item-img">
                    <img src="img/portfolio/1.jpg" alt="SoundCloud Audio" title="" />
                    <a href="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/221650664&#038;color=%23ff5500&#038;auto_play=false&#038;hide_related=false&#038;show_comments=true&#038;show_user=true&#038;show_reposts=false&#038;show_teaser=true&#038;visual=true" class="lightbox mfp-iframe" title="SoundCloud Audio"></a>
                  </div>

                  <i class="fa fa-volume-up"></i>
                  <h4 class="name">SoundCloud Audio</h4>
                  <span class="category">SoundCloud</span>
                </figure>

                <figure class="item standard" data-groups='["category_all", "category_detailed"]'>
                  <div class="portfolio-item-img">
                    <img src="img/portfolio/2.jpg" alt="Media Project 2" title="" />
                    <a href="portfolio-1.html" class="ajax-page-load"></a>
                  </div>

                  <i class="far fa-file-alt"></i>
                  <h4 class="name">Detailed Project 2</h4>
                  <span class="category">Detailed</span>
                </figure>

                <figure class="item lbvideo" data-groups='["category_all", "category_vimeo-videos"]'>
                  <div class="portfolio-item-img">
                    <img src="img/portfolio/3.jpg" alt="Vimeo Video 1" title="" />
                    <a href="https://player.vimeo.com/video/158284739" class="lightbox mfp-iframe" title="Vimeo Video 1"></a>
                  </div>

                  <i class="fas fa-video"></i>
                  <h4 class="name">Vimeo Video 1</h4>
                  <span class="category">Vimeo Videos</span>
                </figure>

                <figure class="item standard" data-groups='["category_all", "category_detailed"]'>
                  <div class="portfolio-item-img">
                    <img src="img/portfolio/4.jpg" alt="Media Project 1" title="" />
                    <a href="portfolio-1.html" class="ajax-page-load"></a>
                  </div>

                  <i class="far fa-file-alt"></i>
                  <h4 class="name">Detailed Project 1</h4>
                  <span class="category">Detailed</span>
                </figure>

                <figure class="item lbimage" data-groups='["category_all", "category_mockups"]'>
                  <div class="portfolio-item-img">
                    <img src="img/portfolio/5.jpg" alt="Mockup Design 1" title="" />
                    <a class="lightbox" title="Mockup Design 1" href="img/portfolio/full/5.jpg"></a>
                  </div>

                  <i class="far fa-image"></i>
                  <h4 class="name">Mockup Design 1</h4>
                  <span class="category">Mockups</span>
                </figure>

                <figure class="item lbvideo" data-groups='["category_all", "category_youtube-videos"]'>
                  <div class="portfolio-item-img">
                    <img src="img/portfolio/6.jpg" alt="YouTube Video 1" title="" />
                    <a href="https://www.youtube.com/embed/bg0gv2YpIok" class="lightbox mfp-iframe" title="YouTube Video 1"></a>
                  </div>

                  <i class="fas fa-video"></i>
                  <h4 class="name">YouTube Video 1</h4>
                  <span class="category">YouTube Videos</span>
                </figure>

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

  }

}
</script>

<style scoped>

</style>