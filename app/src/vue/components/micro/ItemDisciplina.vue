<template>
    <div class="ItemDisciplinaComponent col-xs-12 col-sm-4">
      <a href="#">
      <div class="certificate-item clearfix">
        <div class="certi-logo" style="width: 120px; min-width: 120px; max-width: 120px; height: 115px;">
          <img :src="(logo)? logo : 'img/clients/client-1.png'" alt="logo">
        </div>

        <div class="certi-content">
          <div class="certi-title">
            <h4>{{ titulo }}</h4>
          </div>
          <div class="certi-id">
            <span>{{ descricao }}</span>
          </div>
          <div class="certi-date">
            <span>{{ data }}</span>
          </div>
          <div class="certi-company">
            <span></span>
          </div>
        </div>
      </div>
      </a>
    </div>
</template>

<script>
import $ from "jquery";

export default {

  name: 'ItemDisciplina',

  components: {  },

  props: [ 'logo', 'titulo', 'descricao', 'data' ],

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