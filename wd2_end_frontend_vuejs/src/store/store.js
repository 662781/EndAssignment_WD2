import { createStore } from 'vuex';
import axios from '../axios-auth'
const store = createStore({
    state() {
        return {
            token: null,
            username: null
        }
    },
    getters: {
        isAuthenticated(state) {
            return state.token != null;
        }
    },
    mutations: {
        loginSuccesful(state, parameters) {
            state.token = parameters.token;
            state.username = parameters.username;
        },
        logout(state){
            state.token = null;
            state.username = null;
        }
    },
    actions: {
        autoLogin({ commit }) {
            let token = localStorage.getItem('token');
            let username = localStorage.getItem('username');
            if (token) {
                axios.defaults.headers.common["Authorization"] = "Bearer " + token;
                commit('loginSuccesful', {
                    token: token,
                    username: username
                });
            }
        },
        logout({commit}){
            axios.defaults.headers.common["Authorization"] = "";
            localStorage.clear()
            commit('logout');
        },
        login({ commit }, parameters) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/users/login", {
                        username: parameters.username,
                        password: parameters.password
                    })
                    .then(res => {
                        axios.defaults.headers.common["Authorization"] = "Bearer " + res.data.token;
                        console.log(res.data.token);

                        localStorage.setItem('token', res.data.token);
                        localStorage.setItem('username', res.data.username);
                        commit('loginSuccesful', {
                            token: res.data.token,
                            username: res.data.username
                        });
                        resolve();
                    })
                    .catch((error) => reject(error));
            })
        }
    }
});
export default store;