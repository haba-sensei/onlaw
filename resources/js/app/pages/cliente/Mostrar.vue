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
                <h4 class="card-title">Clientes </h4>
              </div>


              <div class="mt-2 mb-4 col-12">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo_Doc</th>
                        <th>Num_Doc</th>
                        <th>9°Num</th>
                        <th>Num_DniPass</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(cliente, index) in clientes" :key="cliente.id">
                        <td>{{ index+1 }}</td>
                        <td>{{ cliente.fullname }}</td>
                        <td>{{ cliente.document }}</td>
                        <td>{{ cliente.num_document }}</td>
                        <td>{{ cliente.noveno_numero }}</td>
                        <td>{{ cliente.dni_pasaporte }}</td>
                        <td>{{ cliente.email }}</td>
                        <td>{{ cliente.telefono }}</td>
                        <td>{{ cliente.direccion }}</td>
                        <td>
                          <span v-if="cliente.estado == 1" class="badge badge-success ">
                            Activo
                          </span>
                          <span v-else class="badge badge-danger">
                            Inactivo
                          </span>
                        <td  >
                        <router-link
                            :to="{
                              name: 'EditarCliente',
                              params: { id: cliente.id },
                            }"
                            class=" btn-sm btn-primary waves-effect waves-float waves-light"
                          >
                            <i class="fa fa-edit"></i
                          ></router-link>
                          <a
                            type="button"
                            @click="borrarCliente(cliente.id)"
                            class=" btn-sm btn-primary waves-effect waves-float waves-light"
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
  name: "MostrarClientes",
  data() {
    return {
      clientes: [],
    };
  },
  mounted() {
    this.mostrarClientes();
  },
  methods: {
    async mostrarClientes() {
      await this.axios
        .get("/users/cliente", {
              headers: {
                Authorization: "Bearer " + this.$store.state.token,
              },
            })
        .then((response) => {

          this.clientes = response.data;
        })
        .catch((error) => {
          this.clientes = [];
        });
    },
   async borrarCliente(id) {
       await Vue.swal({
        title: "¿Quieres eliminar el cliente?",
        icon: "question",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Si Eliminar",
        denyButtonText: `No Eliminar`,
      }).then((result) => {
        if (result.isConfirmed) {
          this.axios
            .delete(`/users/cliente/${id}`, {
              headers: {
                Authorization: "Bearer " + this.$store.state.token,
              },
            })
            .then((response) => {
                console.log(response.data);
              this.mostrarClientes();
            })
            .catch((error) => {
              this.clientes = [];
            });
        } else if (result.isDenied) {
        }
      });

    },
  },
};
</script>
