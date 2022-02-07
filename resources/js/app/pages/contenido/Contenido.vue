<template>
  <div class="app-content content file-manager-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-area-wrapper container-xxl p-0">
      <div class="sidebar-left">
        <div class="sidebar">
          <div class="sidebar-file-manager">
            <div class="sidebar-inner">

              <AgregarNuevo />

              <NivelesContenido @escucharContenido="variableContenido" />

            </div>
          </div>
        </div>
      </div>
      <div class="content-right">
        <div class="content-wrapper container-xxl p-0">
          <div class="content-header row"></div>
          <div class="content-body">
            <div class="body-content-overlay"></div>
            <div class="file-manager-main-content">

              <Buscador />

              <div class="file-manager-content-body  scroll-bar-wrap scroll-box ">

                <transition name="zoom" mode="out-in">
                  <component v-bind:is="currentNivel" :valorEnviado="valorAenviar" @escucharNivel="variableNivel" ></component>
                </transition>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AgregarNuevo from "./Components/AgregarNuevo";
import Buscador from "./Components/Buscador";
import NivelesContenido from "./Components/NivelesContenido";
import DetContenido from "./DetContenido";
import NuevoContenido from "./NuevoContenido";
import Nivel1 from "./Components/Nivel1";
import Nivel2 from "./Components/Nivel2";
import Nivel3 from "./Components/Nivel3";
import Nivel4 from "./Components/Nivel4";
import Nivel5 from "./Components/Nivel5";
import Nivel6 from "./Components/Nivel6";
import Nivel7 from "./Components/Nivel7";

export default {
  name: "Contenido",
  data: function () {
    return {
      currentNivel: "Nivel1",
      valorAenviar: null,
    };
  },
  components: {
    AgregarNuevo,
    Buscador,
    NivelesContenido,
    DetContenido,
    NuevoContenido,
    Nivel1,
    Nivel2,
    Nivel3,
    Nivel4,
    Nivel5,
    Nivel6,
    Nivel7,
  },

  methods: {
    nivelesRoute: function () {
        this.currentNivel;
        this.valorAenviar;
    },
    variableNivel({x, y}){
        this.currentNivel = x;
        this.valorAenviar = y;
    },
    variableContenido(nivel){
        this.currentNivel = nivel;
    }
  },
};
</script>
