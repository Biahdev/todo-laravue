import { createStore } from 'vuex';
import axios from 'axios';

export default createStore({
  state: {
    todos: []
  },
  getters: {

  },
  mutations: {
    StoreTodos(state, payload) {
      state.todos = payload
    },

    storeTodo(state, payload) {
      const index = state.todos.findIndex(todo => todo.id === payload.id)
      if (index >= 0) {
        state.todos.splice(index, 1, payload)
      } else {
        state.todos.push(payload)
      }
    },
    deleteTodo(state, id) {
      const index = state.todos.findIndex(todo => todo.id === id)

      if (index >= 0) {
        state.todos.splice(index, 1)
      }
    },

  },
  actions: {
    getTodos({
      commit
    }) {
      return axios.get('http://127.0.0.1:8000/api')
        .then(response => commit('StoreTodos',response.data))
    },
    addTodo({ commit }, data) {
     return axios.post('http://127.0.0.1:8000/api/task', data)
        .then(response => commit('StoreTodo', response.data))
    },
    updateTodo(c,{id,data}){
      return axios.put(`http://127.0.0.1:8000/api/task/${id}`,data)
    },
    updateStatusTodo(c,{id,data}){
      return axios.put(`http://127.0.0.1:8000/api/task/status/${id}`,data)
    },
    destroyTodo({ commit },id){
      return axios.delete(`http://127.0.0.1:8000/api/task/${id}`)
      .then(() => {
        commit('deleteTodo', id)
      })
    }
  },
  modules: {}
})