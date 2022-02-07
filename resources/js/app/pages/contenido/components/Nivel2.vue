<template>
  <div class="view-container cont_ajust_102">
    <h6 class="files-section-title mt-25 mb-75">Contenido de Areas de Practica</h6>
    <template v-for="nivel in niveles">
      <div class="card file-manager-item folder" :key="nivel.id">
        <div class="card-img-top file-logo-wrapper">
          <div
            class="dropdown float-end cursor-pointer"
            data-bs-html="true"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="VER DETALLES"
          >
            <a href="#" v-on:click="enviarPadre(nivel.id)">
              <span class="folder_color_primary">
                <feather-icon icon="EyeIcon" size="20" />
              </span>
            </a>
          </div>
          <div
            class="
              d-flex
              align-items-center
              justify-content-center
              w-100
              cursor-pointer
            "
            data-bs-html="true"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="INGRESAR A LA CARPETA"
          >
            <span class="folder_color">
              <feather-icon icon="FolderIcon" size="14" />
            </span>
          </div>
        </div>
        <div class="card-body">
          <div class="content-wrapper">
            <p class="card-text mb-0">
                 {{  nivel.nombre }}
            </p>
          </div>
        </div>
      </div>
    </template>
  </div>
</template>

<script>
export default {
  name: "Nivel2",
  data: function () {
    return {
      value: "",
      niveles: [],
    };
  },
  mounted() {
    this.listarNivel();
  },
  methods: {
    enviarPadre(value) {
      //    this.$router.go(-1);
      this.$emit('escucharNivel', { x:'DetContenido', y:value });
    },
    async listarNivel() {
      await this.axios
        .get("/cont/any_menu_by_level/2", {
          headers: {
            Authorization: "Bearer " + this.$store.state.token,
          },
        })
        .then((response) => {
          this.niveles = response.data;
        })
        .catch((error) => {
          this.niveles = [];
        });
    },
  },
};
</script>
