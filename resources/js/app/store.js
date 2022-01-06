import Vuex from 'vuex';
import Vue from 'vue';
import axios from 'axios';
import ToastificationContent from './components/ToastificationContent.vue';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        status: '',
        token: localStorage.getItem('auth') || '',
        user: {},
        error: '',
    },
    components: {
        ToastificationContent
    },
    mutations: {
        auth_request(state) {
            state.status = 'loading'
        },
        auth_success(state, token) {
            state.status = 'success'
            state.token = token
        },
        auth_destroy(state) {
            state.status = '';
        },
        setToken(state, token) {
            localStorage.setItem('auth', token);
            state.token = token;
        },
        clearToken(state) {
            localStorage.removeItem('auth');
            // delete axios.defaults.headers.common['Authorization'];
            state.token = '';
        },
        setUser(state, user) {
            state.user = user;

        },
        handle_error(state, error) {
            state.error = error
        },
        logout(state) {
            state.status = ''
            state.token = ''
        },

    },
    actions: {
        login({
            commit
        }, user) {
            return new Promise((resolve, reject) => {
                commit('auth_request');
                axios({
                    url: '/login',
                    data: user,
                    method: 'POST',
                }).then(function (resp) {
                    const token = "Bearer " + resp.data.data.device_token;
                    axios.defaults.headers.common["Authorization"] = token;
                    const user = resp.data.data;
                    commit('auth_success', token, user);
                    commit("setToken", resp.data.data.device_token);
                    commit("setUser", user);
                    commit('handle_error', '');
                    document.body.classList.remove("blank-page");
                    resolve(resp);
                    commit('auth_destroy');
                }).catch(function (error) {
                    Vue.$toast({
                        component: ToastificationContent,
                        props: {
                            title: 'Notificacion',
                            icon: 'BellIcon',
                            text: error.response.data.message,
                            variant: 'info',
                        },
                    });
                    commit('auth_destroy');
                    console.clear();
                });
            })
        },
        getUser({
            commit
        }) {
            return new Promise((resolve, reject) => {
                axios({
                    url: '/auth/user',
                    method: 'GET',
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('auth')}`,
                    },
                }).then(res => {
                    commit('setUser', res.data.data);
                    resolve(res);
                })
            });
        },
        resetPassword({
            commit
        }, email) {
            commit('auth_request');
            return new Promise((resolve, reject) => {
                axios({
                        url: '/forgotPassword',
                        data: email,
                        method: 'POST'
                    })
                    .then(resp => {
                        commit('auth_destroy');
                        Vue.$toast({
                            component: ToastificationContent,
                            props: {
                                title: 'Notificacion',
                                icon: 'BellIcon',
                                text: 'Se ha enviado un correo para restablecer la contraseña',
                                variant: 'info',
                            },
                        })
                        console.clear();
                        resolve(resp)
                    })
                    .catch(err => {
                        commit('auth_destroy');
                        Vue.$toast({
                            component: ToastificationContent,
                            props: {
                                title: 'Notificacion',
                                icon: 'BellIcon',
                                text: err.response.data.message,
                                variant: 'info',
                            },
                        })
                        console.clear();
                        // reject(err)
                    })
            })
        }
    },
    getters: {
        isLoggedIn: state => !!state.token,
        authStatus: state => state.status,
        getUser: state => state.user,
        getError: state => state.error
    }
});

export default store;
