<template>
  <div class="mt-4">
    <div class="flex gap-2">
      <div class="w-full h-12 bg-zinc-800 rounded-[7px] flex justify-between items-center px-3">
        <div class="flex justify-between items-center">
          <span @click="onCheckClick" class="w-8 h-7 bg-zinc-900 rounded-full cursor-pointer hover:border-purple-500 mr-4
          flex justify-center items-center">
            <i class="text-purple-500 fa fa-check text-lg" v-if="isCompleted"></i>
          </span>
          <input type="text" placeholder="Digite a sua tarefa" v-model="title" @keyup.enter="onTitleChange"
            :style="isCompleted ? 'text-decoration: line-through;' : ''"
            class="placeholder:font-semibold bg-zinc-800 placeholder-zinc-600 text-zinc-300 focus:outline-none block w-full appearance-none strike">
        </div>
        <div @click="onDestroy">
          <i class="fa-solid fa-trash text-zinc-300 text-md mr-1.5 mt-1"></i>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TodoItem",
  props: {
    todo: {
      type: Object,
      default: () => { }
    }
  },
  data() {
    return {
      title: this.todo.data.title,
      isCompleted: this.todo.data.completed
    }
  },
  methods: {
    onTitleChange() {
      if (!this.title) {
        return false;
      }
      const payload = {
        id: this.todo.data.id,
        data: {
          title: this.title
        }
      }
      this.$store.dispatch('updateTodo', payload)
    },
    onCheckClick() {
      const payload = {
        id: this.todo.data.id,
        data: {
          completed: this.isCompleted = !this.isCompleted
        }
      }
      this.$store.dispatch('updateStatusTodo', payload)
    },
    onDestroy() {
      this.$store.dispatch('destroyTodo', this.todo.data.id)
    }
  }
}
</script>