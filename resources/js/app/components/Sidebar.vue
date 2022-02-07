<template>
  <div
    class="main-menu menu-fixed menu-dark menu-accordion menu-shadow"
    data-scroll-to-active="true"
  >
    <div class="navbar-header">
      <ul class="flex-row nav navbar-nav">
        <li class="nav-item me-auto">
          <a class="navbar-brand" href="#"
            ><span class="brand-logo">
              <img
                src="https://cdn-icons-png.flaticon.com/512/2646/2646662.png"
                alt="logo"
                width="32"
                height="32"
              />
            </span>
            <h2 class="brand-text">Onlaw</h2>
          </a>
        </li>
      </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
      <ul
        class="navigation navigation-main"
        id="main-menu-navigation"
        data-menu="menu-navigation"
      >
        <li class="navigation-header">
          <span>Modulos</span>
        </li>
        <li class="nav-item">
          <router-link class="d-flex align-items-center" to="/">
            <feather-icon icon="HomeIcon" size="14" />
            <span class="menu-title text-truncate">Home</span>
          </router-link>
        </li>

        <li class="nav-item" v-if="user.role != 'Admin'">
          <router-link class="d-flex align-items-center" to="/chat">
            <feather-icon icon="MessageSquareIcon" size="14" />
            <span class="menu-title text-truncate">Chat</span>
          </router-link>
        </li>
        <li class="nav-item" v-if="user.role == 'Admin'">
          <router-link class="d-flex align-items-center" to="/abogados">
            <feather-icon icon="ZapIcon" />
            <span class="menu-title text-truncate">Abogados</span>
          </router-link>
        </li>
        <li class="nav-item" v-if="user.role == 'Admin'">
          <router-link class="d-flex align-items-center" to="/clientes">
            <feather-icon icon="UsersIcon" size="14" />
            <span class="menu-title text-truncate">Clientes </span>
          </router-link>
        </li>

        <li class="nav-item" v-if="user.role == 'Admin'">
          <router-link class="d-flex align-items-center" to="/contenido">
            <feather-icon icon="BookOpenIcon" size="14" />
            <span class="menu-title text-truncate">Contenido </span>
          </router-link>
        </li>



      </ul>
    </div>
  </div>
</template>

<script>

import { mapGetters } from "vuex";
export default {
  name: "Sidebar",
  computed: {
    ...mapGetters({ user: "getUser" }),
  },
};
</script>
