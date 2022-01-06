import Vue from "vue";
import VueRouter from "vue-router";

import Dashboard from "./pages/Dashboard.vue";

//? Auth
import Login from "./pages/auth/Login.vue";
import Perfil from "./pages/auth/Perfil.vue";
import ForgotPassword from "./pages/auth/ForgotPassword.vue";

//? Dashboard
import Contacto from "./pages/contacto/Contacto.vue";
import Chat from "./pages/chat/Chat.vue";

//? componentes para abogados
import MostrarAbogados from "./pages/abogado/Mostrar.vue";

//? componentes para clientes
import MostrarClientes from "./pages/cliente/Mostrar.vue";

//? componentes para el blog
import Mostrar from "./pages/blog/Mostrar.vue";
import Crear from "./pages/blog/Crear.vue";
import Editar from "./pages/blog/Editar.vue";

Vue.use(VueRouter);


export const routes = [{
        path: "/",
        component: Login,
        meta: {
            guest: true
        }
    },
    {
        path: "/login",
        component: Login,
        meta: {
            guest: true
        },
    }, {
        path: "/forgot-password",
        component: ForgotPassword,
        meta: {
            guest: true
        },
    },
    {
        path: "/dashboard",
        component: Dashboard,
        meta: {
            requireAuth: true
        },
    }, {
        path: "/perfil",
        component: Perfil,
        meta: {
            requireAuth: true
        },
    },
    {
        name: "mostrarAbogados",
        path: "/abogados",
        component: MostrarAbogados,
        meta: {
            requireAuth: true
        },
    },
    {
        name: "mostrarClientes",
        path: "/Clientes",
        component: MostrarClientes,
        meta: {
            requireAuth: true
        },
    },
    // {
    //     name: "mostrarBlogs",
    //     path: "/blogs",
    //     component: Mostrar,
    //      meta: { requireAuth: true },
    //       meta: { guest: true },
    // },
    {
        path: "/chat",
        component: Chat,
    },
    {
        path: "/contacto",
        component: Contacto,
    },
    {
        path: "/crear",
        component: Crear,
    },
    {
        path: "/editar/:id",
        component: Editar,
    },
];
