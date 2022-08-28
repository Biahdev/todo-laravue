import { createStore } from 'vuex';
import axios from 'axios';

export default createStore({
  state: {
    todos: []
  },
  getters: {

  },
  mutations: {
    storeTodos(state, payload) {
      state.todos = payload
    },

    storeTodo(state, payload) {
      const index = state.todos.findIndex(todo => todo.id === payload.id)
      if (index >= 0) {
        state.todos.splice(index, 1, payload)
      } else {
        state.todos.unshift(payload)
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
        .then(response => commit('storeTodos',response.data))
    },
    addTodo({ commit }, data) {
     return axios.post('http://127.0.0.1:8000/api/task', data)
        .then(response => commit('storeTodo', response.data))
    },
    updateTodo({ commit }, { id, data }) {
      return axios.put(`http://127.0.0.1:8000/api/task/${id}`, data)
        .then((response) => {
          commit('storeTodo', response.data)
        })
    },
    updateStatusTodo({ commit }, { id, data }) {
      return axios.put(`http://127.0.0.1:8000/api/task/status/${id}`, data)
        .then((response) => {
          commit('storeTodo', response.data)
        })
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