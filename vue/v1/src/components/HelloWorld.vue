<template>
  <div class="app">
    <message>Hello Of VUE framework</message>
    <message>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio nemo repudiandae corrupti libero fugit vitae rem ex, itaque laborum aliquid accusamus. A, deserunt aperiam ipsum blanditiis dolor ducimus id repellat?</message>
  </div>
</template>

<script>
import Message from './Message.vue';

export default {
  name: 'HelloWorld',
  components: { Message },
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
