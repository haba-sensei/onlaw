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
                  <h4 class="card-title">Crear Blog</h4>
                </div>
                <form @submit.prevent="crear">
                  <div class="row d-flex justify-content-center">
                    <div class="col-10 mt-2 mb-4">
                      <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input
                          type="text"
                          id="titulo"
                          class="form-control"
                          v-model="blog.titulo"
                        />
                      </div>
                    </div>
                    <div class="col-10 mt-2 mb-4">
                      <div class="form-group">
                        <label for="floatingTextarea2">Contenido</label>
                        <textarea
                          id="floatingTextarea2"
                          type="text"
                          class="form-control"
                          v-model="blog.contenido"
                          style="height: 100px"
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
  name: "crear-blog",
  data() {
    return {
      blog: {
        titulo: "",
        contenido: "",
      },
    };
  },
  methods: {
    async crear() {
      await this.axios
        .post("/api/blog", this.blog)
        .then((response) => {
          this.$router.push({ name: "mostrarBlogs" });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
