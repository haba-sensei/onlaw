<template>
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row"></div>
      <div class="content-body">
        <div class="container mt-4">
            <Reporte v-if="user.role == 'Admin'"></Reporte>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Reporte from './Components/Reporte';
import { mapGetters } from "vuex";

export default {
    name: "Dashboard",
    computed: {
        ...mapGetters({ user: "getUser" }),
    },
    components: {
        Reporte
    },
};
</script>
