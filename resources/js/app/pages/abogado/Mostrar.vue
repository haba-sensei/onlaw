<template>
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row"></div>
      <div class="content-body">
        <div class="container mt-4">
          <div class="row">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Abogados </h4>
              </div>
              <div class="mt-3 mb-3 col-lg-12">
                <router-link
                  :to="{ name: 'crearAbogado' }"
                  class="float-left  btn btn-primary waves-effect waves-float waves-light"
                >
                  <i class="fa fa-plus"></i> Crear
                </router-link>
              </div>

              <div class="mt-2 mb-4 col-12">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(abogado, index) in abogados" :key="abogado.id">
                        <td>{{ index+1 }}</td>
                        <td>{{ abogado.fullname }}</td>
                        <td>{{ abogado.email }}</td>
                        <td>{{ abogado.telefono }}</td>
                        <td>
                          <span v-if="abogado.estado == 1" class="badge badge-success">
                            Activo
                          </span>
                          <span v-else class="badge badge-danger">
                            Inactivo
                          </span>
                        <td>

                          <a
                            type="button"
                            @click="borrarAbogado(abogado.id)"
                            class=" btn btn-primary waves-effect waves-float waves-light"
                          >
                            <i class="fa fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MostrarAbogados",
  data() {
    return {
      abogados: [],
    };
  },
  mounted() {
    this.mostrarAbogados();
  },
  methods: {
    async mostrarAbogados() {
      await this.axios
        .get("/users/abogado", {
              headers: {
                Authorization: "Bearer " + this.$store.state.token,
              },
            })
        .then((response) => {

          this.abogados = response.data;
        })
        .catch((error) => {
          this.abogados = [];
        });
    },
   async borrarAbogado(id) {
       await Vue.swal({
        title: "¿Quieres eliminar el abogado?",
        icon: "question",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Si Eliminar",
        denyButtonText: `No Eliminar`,
      }).then((result) => {
        if (result.isConfirmed) {
          this.axios
            .delete(`/users/abogado/${id}`, {
              headers: {
                Authorization: "Bearer " + this.$store.state.token,
              },
            })
            .then((response) => {
                console.log(response.data);
              this.mostrarAbogados();
            })
            .catch((error) => {
              this.abogados = [];
            });
        } else if (result.isDenied) {
        }
      });

    },
  },
};
</script>
