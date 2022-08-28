<template>
  <div class="px-3 py-16 md:px-10 flex justify-center  min-h-screen">
    <div class="w-full sm:w-1/2 lg:w-1/3 mx-auto">
      <div class="h-auto w-full bg-zinc-900 rounded-lg p-5">
        <TodoSpinner v-if="loading" />
        <template v-else>
          <TodoHeader />
          <TodoFormAdd />
          <template v-if="$store.state.todos.length">
            <TodoItem v-for="todo in $store.state.todos" :key="todo.id" :todo="todo" />
          </template>
          <TodoEmpty v-else/>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';
import { useStore } from 'vuex';
import TodoSpinner from './components/TodoSpinner.vue';
import TodoFormAdd from './components/TodoFormAdd.vue';
import TodoItem from './components/TodoItem.vue';
import TodoHeader from './components/TodoHeader.vue';
import TodoEmpty from './components/TodoEmpty.vue';


export default {
  name: "App",
  components: {
    TodoSpinner,
    TodoFormAdd,
    TodoItem,
    TodoHeader,
    TodoEmpty,
  },
  setup() {
    const loading = ref(false);
    const store = useStore()
    loading.value = true
    store.dispatch('getTodos').finally(() => {
      loading.value = false
    })
    return {
      loading,
    }
  },
}
</script>