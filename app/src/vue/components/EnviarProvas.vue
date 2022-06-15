<template>
  <div class="EnviarProvasComponent" >

    <!-- Contact Subpage -->
    <section data-id="enviar-provas" class="enviar-provas animated-section">
      <div class="page-title">
        <h2>Enviar Provas</h2>
      </div>

      <div class="section-content">

        <div class="row">
          <!-- Contact Info -->
          <div class="col-xs-12 col-sm-4">
            <div class="lm-info-block gray-default">
              <i class="lnr lnr-layers"></i>
              <h4>Escolha um Curso</h4>
              <span class="lm-info-block-value"></span>
              <span class="lm-info-block-text"></span>
            </div>


<!--
            <div class="lm-info-block gray-default">
              <i class="lnr lnr-phone-handset"></i>
              <h4>Selecione a Grade desejada</h4>
              <span class="lm-info-block-value"></span>
              <span class="lm-info-block-text"></span>
            </div>
-->

            <div class="lm-info-block gray-default">
              <i class="lnr lnr-list"></i>
              <h4>Selecione a Grade e Disciplina</h4>
              <span class="lm-info-block-value"></span>
              <span class="lm-info-block-text"></span>
            </div>

            <div class="lm-info-block gray-default">
              <i class="lnr lnr-file-empty"></i>
              <h4>Anexe a Prova </h4>
              <span class="lm-info-block-value"></span>
              <span class="lm-info-block-text"></span>
            </div>

            <div class="lm-info-block gray-default">
              <i class="lnr lnr-checkmark-circle"></i>
              <h4>Finalize sua contribuição!</h4>
              <span class="lm-info-block-value"></span>
              <span class="lm-info-block-text"></span>
            </div>

          </div>
          <!-- End of Contact Info -->

          <!-- Contact Form -->
          <div class="col-xs-12 col-sm-8">

            <div class="block-title">
              <h3>Contribua <span>Enviando Provas!</span></h3>
            </div>





            <form id="formulario" class="contact-form" method="post" enctype="multipart/form-data">

              <div class="messages-response" style="margin-bottom: 10px;"></div>

              <div class="controls two-columns">
                <div class="fields clearfix">

                  <div class="left-column">

                    <label style="color: #f58545;">Selecione o Curso</label>
                    <div class="form-group form-group-with-icon">
                      <select class="form-control" v-model="$root.cursoEPS" style="background: #222222;" required data-error="Curso is required.">
                        <option value="-1" selected="selected">Escolha um Curso</option>
                        <option v-for="(curso, index) in $root.cursosEPO" :value="index">{{ curso.nome }}</option>
                      </select>
                      <div class="help-block curso-select-error with-errors"></div>
                    </div>
                  </div>

                  <div class="right-column">

                    <label style="color: #f58545;">Selecione a Grade</label>
                    <div class="form-group form-group-with-icon">
                      <select class="form-control" v-model="$root.gradeEPS" style="background: #222222;" required>
                        <option value="-1" selected="selected">Selecione a Grade</option>
                        <option v-for="(grade, index) in $root.gradesEPO" :value="index">{{ grade.grade }}</option>
                      </select>
                      <div class="help-block grade-select-error with-errors"></div>
                    </div>

                  </div>

                  <label style="color: #f58545;">Selecione a Disciplina</label>
                  <div class="form-group form-group-with-icon">
                    <select class="form-control" v-model="$root.disciplinaEPS" style="background: #222222;" required>
                      <option value="-1" selected="selected">Selecione a Disciplina</option>
                      <option v-for="(disciplina, index) in $root.disciplinasEPO" :value="index">
                        {{ disciplina.periodo + ' - ' + disciplina.codigo + ' - ' + disciplina.nome }}
                      </option>
                    </select>
                    <div class="help-block disciplina-select-error with-errors"></div>
                  </div>

                  <label style="color: #f58545;">Selecione o Tipo de Prova</label>
                  <div class="form-group form-group-with-icon">
                    <select class="form-control" v-model="$root.tipoProvaEPS" style="background: #222222;" required>
                      <option value="-1" selected="selected">Selecione o Tipo  de Prova</option>
                      <option v-for="(tipo, index) in $root.tipos" :value="index"> {{ tipo.tipo }} </option>
                    </select>
                    <div class="help-block tipo-prova-select-error with-errors"></div>
                  </div>


                  <label style="color: #f58545;">Anexe a Prova</label>
                  <div class="form-group form-group-with-icon">
                    <input type="file" multiple accept="image/png, image/jpeg, image/jpg, .pdf" class="form-control" id="provas" name="provas[]"  required="required">
                    <div class="help-block prova-select-error with-errors"></div>
                  </div>
                </div>

<!--                <div class="g-recaptcha" data-sitekey="6LdqmCAUAAAAAMMNEZvn6g4W5e0or2sZmAVpxVqI" data-theme="dark"></div>-->


                <input type="button" @click="sendProva"  class="button btn-send send-prova" value="Enviar Provas!">

              </div>
            </form>
          </div>
          <!-- End of Contact Form -->
        </div>

      </div>
    </section>
    <!-- End of Contact Subpage -->

  </div>
</template>

<script>
import $ from "jquery";


export default {

  name: 'EnviarProvas',

  components: {  },

  props: [ '', '', ],

  data(){
    return {

    }
  },

  methods: {
    sendProva(){

      let root = this.$root

      let curso = root.cursoEPS
      let grade = root.gradeEPS
      let disciplina = root.disciplinaEPS
      let tipoProva = root.tipoProvaEPS

      let provas = $('input#provas')

      if(curso === '-1'){ $('.curso-select-error').html('Escolha o Curso'); return; }

      if(grade === '-1'){ $('.grade-select-error').html('Escolha a Grade'); return; }

      if(disciplina === '-1'){ $('.disciplina-select-error').html('Escolha a Disciplina'); return; }

      if(tipoProva === '-1'){ $('.tipo-prova-select-error').html('Escolha um Tipo de Prova'); return; }

      if(provas[0].files.length === 0) {
        $('.prova-select-error').html('Anexe ao menos 1 arquivo');
        return;
      }else{
        if(provas[0].files.length > 10){
          $('.prova-select-error').html('Anexe no maximo 10 arquivo');
          return;
        }else{
          $('.prova-select-error').html('');
        }
      }

      let formData = new FormData( $("#formulario").get(0) );

      formData.append('disciplina', root.disciplinasEPO[root.disciplinaEPS].id);
      formData.append('tipoProva', root.tipos[root.tipoProvaEPS].id);

      let url = this.$root.apiRoute + "/upload"

      $('.send-prova').prop('disabled', true);
      $('.send-prova').prop('value', 'Enviando...');

      $.ajax({
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {

          if(data['status'] === 'success'){

            $('#formulario')[0].reset();
            root.cursoEPS = root.gradeEPS = root.disciplinaEPS = root.tipoProvaEPS = '-1'

            setTimeout(()=>{
              $('.curso-select-error').html('')
              $('.tipo-prova-select-error').html('')
            }, 0)

            $('.messages-response').css('color', 'green')
            $('.messages-response').html(data['message'])


            setTimeout(()=>{ $('.messages-response').html('') }, 4000)

            root.getInfos()

          }else{
            $('.messages-response').css('color', 'red')
            $('.messages-response').html(data['message'])

            setTimeout(()=>{ $('.messages-response').html('') }, 4000)

          }
          $('.send-prova').prop('value', 'Enviar Provas!');
          $('.send-prova').prop('disabled', false);
        },
        error: function(){
          $('.send-prova').prop('value', 'Enviar Provas!');
          $('.send-prova').prop('disabled', false);
        }
      });


    }
  }


}
</script>

<style scoped>

</style>