/*var app = new Vue({
    el: '#app',
    data: {
        errorMsg: false,
        successMsg: false
    }
})

import { createApp } from 'vue';

createApp({
  data() {
    return {
      count: 0
    }
  }
}).mount('#app');*/

// Testes de Metodos

Vue.createApp({
    data() {
      return {
        errorMsg: true,
        //successMsg: false,
        message: 'Hello Vue!'
      }
    }
  }).mount('#app')