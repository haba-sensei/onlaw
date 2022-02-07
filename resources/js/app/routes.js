import Vue from "vue";
import VueRouter from "vue-router";

import Dashboard from "./pages/dashboard/Dashboard.vue";

//? Auth
import Login from "./pages/auth/Login.vue";
import Perfil from "./pages/auth/Perfil.vue";
import ForgotPassword from "./pages/auth/ForgotPassword.vue";

//? Dashboard
import Contacto from "./pages/contacto/Contacto.vue";
import Chat from "./pages/chat/Chat.vue";

//? componentes para el admin
import Contenido from "./pages/contenido/Contenido.vue";

//? componentes para abogados
import MostrarAbogados from "./pages/abogado/Mostrar.vue";
import CrearAbogado from "./pages/abogado/Crear.vue";
import EditarAbogado from "./pages/abogado/Editar.vue";

//? componentes para clientes
import MostrarClientes from "./pages/cliente/Mostrar.vue";
import EditarCliente from "./pages/cliente/Editar.vue";


Vue.use(VueRouter);


export const routes = [
    {
        path: "/",
        component: Dashboard,
        meta: {
            requireAuth: true,
            roles: ["Admin", "Abogado"],
        },
    },
    {
        path: "/login",
        component: Login,
        meta: {
            guest: true,
        },
    },
    {
        path: "/forgot-password",
        component: ForgotPassword,
        meta: {
            guest: true,
        },
    },
    {
        path: "/dashboard",
        component: Dashboard,
        meta: {
            requireAuth: true,
            roles: ["Admin", "Abogado"],
        },
    },
    {
        path: "/perfil",
        component: Perfil,
        meta: {
            requireAuth: true,
            roles: ["Admin", "Abogado"],
        },
    },
    {
        name: "contenido",
        path: "/contenido",
        component: Contenido,
        meta: {
            requireAuth: true,
            roles: ["Admin"],
        },
    },
    {
        name: "mostrarAbogados",
        path: "/abogados",
        component: MostrarAbogados,
        meta: {
            requireAuth: true,
            roles: ["Admin"],
        },
    },
    {
        name: "crearAbogado",
        path: "/abogados/crear",
        component: CrearAbogado,
        meta: {
            requireAuth: true,
            roles: ["Admin"],
        },
    },
    {
        name: "editarAbogado",
        path: "/abogados/editar/:id",
        component: EditarAbogado,
        meta: {
            requireAuth: true,
            roles: ["Admin"],
        },
    },
    {
        name: "mostrarClientes",
        path: "/clientes",
        component: MostrarClientes,
        meta: {
            requireAuth: true,
            roles: ["Admin"],
        },
    },
    {
        name: "editarCliente",
        path: "/cliente/editar/:id",
        component: EditarCliente,
        meta: {
            requireAuth: true,
            roles: ["Admin"],
        },
    },
    {
        path: "/chat",
        component: Chat,
        meta: {
            requireAuth: true,
            roles: ["Abogado"],
        },
    },
    {
        path: "/contacto",
        component: Contacto,
        meta: {
            requireAuth: true,
        },
    },
];
