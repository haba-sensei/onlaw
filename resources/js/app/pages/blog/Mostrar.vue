<template>
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="p-0 content-wrapper container-xxl">
      <div class="content-header row"></div>
      <div class="content-body">
        <div class="container mt-4">
          <div class="row">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Crud Blogs</h4>
              </div>
              <div class="mt-3 mb-3 col-lg-12">
                <router-link
                  :to="{ name: 'CrearBlog' }"
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
                        <th>Titulo</th>
                        <th>Contenido</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="blog in blogs" :key="blog.id">
                        <td>{{ blog.id }}</td>
                        <td>{{ blog.titulo }}</td>
                        <td>{{ blog.contenido }}</td>
                        <td>
                          <router-link
                            :to="{
                              name: 'EditarBlog',
                              params: { id: blog.id },
                            }"
                            class=" btn btn-primary waves-effect waves-float waves-light"
                          >
                            <i class="fa fa-edit"></i
                          ></router-link>
                          <a
                            type="button"
                            @click="borrarBlog(blog.id)"
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
  name: "MostrarBlogs",
  data() {
    return {
      blogs: [],
    };
  },
  mounted() {
    this.mostrarBlogs();
  },
  methods: {
    async mostrarBlogs() {
      await this.axios
        .get("/api/blog")
        .then((response) => {
          this.blogs = response.data;
        })
        .catch((error) => {
          this.blog = [];
        });
    },
    borrarBlog(id) {
      if (confirm("Confirma eliminar registro")) {
        this.axios
          .delete(`/api/blog/${id}`)
          .then((response) => {
            this.mostrarBlogs();
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
  },
};
</script>
