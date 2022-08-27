<template>
  <form class="flex items-center px-4 bg-gray-900 h-15 rounded-sm border-l-2 border-green-400 mb-3"
    @submit.stop.prevent="addTodo">

    <input placeholder="Adicione um novo item ..." type="text" v-model="title"
      class="bg-gray-900 placeholder-gray-500 text-gray-500 font-light focus:outline-none block w-full appearance-none leading-normal py-3 pr-3">

    <button class="text-green-400 text-xs font-semibold focus:outline-none" type="submit">
      ADICIONAR
    </button>
  </form>
</template>

<script>


export default {
  data() {
    return {
      title: ''
    }
  },
  methods: {
    addTodo() {
      if(!this.title){
        return false;
      }
     this.$store.dispatch('addTodo',{
      title:this.title
     }).finally(() => this.title = '')
    }
  }
}
</script>