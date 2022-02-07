<template>
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row"></div>
      <div class="content-body">
        <div class="container mt-4">
          <div class="row">
            <div class="col-12 d-flex justify-content-center">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Crear Abogado</h4>
                  <router-link
                    to="/abogados"
                    class=" btn btn-primary waves-effect waves-float waves-light float-left"
                    >Regresar</router-link>
                </div>
                <form @submit.prevent="crear">
                  <div class="row d-flex justify-content-center">
                    <div class="col-10 mt-2 mb-4">
                      <div class="form-group">
                        <label for="fullname">Nombre</label>
                        <input
                          type="text"
                          id="fullname"
                          class="form-control"
                          v-model="abogado.fullname"
                          placeholder="Nombre"
                          autocomplete="off"
                        />
                      </div>
                    </div>

                    <div class="col-10 mt-2 mb-4">
                      <div class="form-group">
                        <label for="num_document">Numero de Documento</label>
                        <input
                          type="text"
                          id="num_document"
                          class="form-control"
                          v-model="abogado.num_document"
                          placeholder="Numero de Documento (RUC o CEDULA)"
                          autocomplete="off"
                        />
                      </div>
                    </div>

                     <div class="col-10 mt-2 mb-4">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input
                          type="email"
                          id="email"
                          class="form-control"
                          v-model="abogado.email"
                          placeholder="Email"
                          autocomplete="off"
                        />
                      </div>
                    </div>

                    <div class="col-10 mt-2 mb-4">
                      <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input
                          type="text"
                          id="telefono"
                          class="form-control"
                          v-model="abogado.telefono"
                          placeholder="Telefono"
                          autocomplete="off"
                        />
                      </div>
                    </div>

                    <div class="col-10 mt-2 mb-4">
                      <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input
                          type="text"
                          id="direccion"
                          class="form-control"
                          v-model="abogado.direccion"
                          placeholder="Direccion"
                          autocomplete="off"
                        />
                      </div>
                    </div>



                    <div class="col-10 mt-2 mb-4">
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input
                          type="text"
                          id="password"
                          class="form-control"
                          v-model="abogado.password"
                          placeholder="Password"
                          autocomplete="off"
                        />
                      </div>
                    </div>

                    <div class="col-12 mt-2 mb-4 d-flex justify-content-center">
                      <button
                        type="submit"
                        class="
                          btn btn-primary
                          waves-effect waves-float waves-light
                          float-left
                        "
                      >
                        Guardar
                      </button>
                    </div>
                  </div>
                </form>
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
  name: "crearAbogado",
  data() {
    return {
      abogado: {
        fullname: "",
        num_document: "",
        telefono: "",
        direccion: "",
        email: "",
        password: "",
      },
    };
  },
  methods: {
    async crear() {
      await this.axios
        .post("/users/abogado", this.abogado, {
              headers: {
                Authorization: "Bearer " + this.$store.state.token,
              },
            })
        .then((response) => {
            this.$router.push({ name: "mostrarAbogados" });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
