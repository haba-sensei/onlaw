<template>
  <div class="sidebar-list scroll-bar-wrap scroll-box">
    <div class="list-group list-group-labels">
      <h6 class="section-label px-2 mb-1">Lista general por niveles </h6>
      <a
        href="#"
        v-on:click="enviarPadre('Nivel1')"
        class="list-group-item list-group-item-action"
      >
        <span class="folder_color">
          <feather-icon icon="FolderIcon" />
        </span>
        <span class="align-middle">Areas de Practica</span>
      </a>
      <a
        href="#"
        v-on:click="enviarPadre('Nivel2')"
        class="list-group-item list-group-item-action"
      >
        <span class="folder_color">
          <feather-icon icon="FolderIcon" />
        </span>
        <span class="align-middle">Contenido Areas P.</span>
      </a>
      <a
        href="#"
        v-on:click="enviarPadre('Nivel3')"
        class="list-group-item list-group-item-action"
      >
        <span class="folder_color">
          <feather-icon icon="FolderIcon" />
        </span>
        <span class="align-middle">Detalle Contenido Areas P.</span>
      </a>
      <a
        href="#"
        v-on:click="enviarPadre('Nivel4')"
        class="list-group-item list-group-item-action"
      >
        <span class="folder_color">
          <feather-icon icon="FolderIcon" />
        </span>
        <span class="align-middle">Mapa Areas P.</span>
      </a>
      <a
        href="#"
        v-on:click="enviarPadre('Nivel5')"
        class="list-group-item list-group-item-action"
      >
        <span class="folder_color">
          <feather-icon icon="FolderIcon" />
        </span>
        <span class="align-middle">Sub. Mapa Areas P.</span>
      </a>
      <a
        href="#"
        v-on:click="enviarPadre('Nivel6')"
        class="list-group-item list-group-item-action"
      >
        <span class="folder_color">
          <feather-icon icon="FolderIcon" />
        </span>
        <span class="align-middle">Detalle Sub. Mapa Areas P.</span>
      </a>
      <a
        href="#"
        v-on:click="enviarPadre('Nivel7')"
        class="list-group-item list-group-item-action"
      >
        <span class="folder_color">
          <feather-icon icon="FolderIcon" />
        </span>
        <span class="align-middle">Extra Sub. Mapa Areas P.</span>
      </a>
    </div>
  </div>
</template>


<script>
export default {
  name: "NivelesContenido",
  methods: {
    enviarPadre(value) {
      this.$emit("escucharContenido", value);
    },
  },
};
</script>
