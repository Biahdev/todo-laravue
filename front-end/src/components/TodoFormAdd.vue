<template>
  <div class="mt-4">
    <form @submit.stop.prevent="addTodo">
      <div class="flex gap-2">
        <div class="w-full h-16 bg-zinc-800 rounded-[7px] flex justify-between items-center px-3">
          <div class="flex justify-between items-center">
            <input placeholder="Adicione um novo item ..." type="text" v-model="title"
              class="placeholder:font-semibold bg-zinc-800 placeholder-zinc-600 text-zinc-300 focus:outline-none block w-full appearance-none leading-normal" />
          </div>
          <div>
            <button type="submit">
              <i class="fa-solid fa-circle-plus text-2xl text-purple-500 "></i>
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: 'TodoFormAdd',
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