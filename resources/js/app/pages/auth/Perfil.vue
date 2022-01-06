<template>
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row"></div>
      <div class="content-body">
        <section class="app-user-edit">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link d-flex align-items-center active"
                    id="information-tab"
                    data-bs-toggle="tab"
                    href="#information"
                    aria-controls="information"
                    role="tab"
                    aria-selected="false"
                  >
                    <feather-icon
                      icon="UserIcon"
                      class="font-medium-4 me-25"
                      size="35"
                    />
                    <span class="d-none d-sm-block">Informacion Personal</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link d-flex align-items-center"
                    id="account-tab"
                    data-bs-toggle="tab"
                    href="#account"
                    aria-controls="account"
                    role="tab"
                    aria-selected="true"
                  >
                    <feather-icon
                      icon="LockIcon"
                      class="font-medium-4 me-25"
                      size="35"
                    />
                    <span class="d-none d-sm-block">Cambiar Password</span>
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div
                  class="tab-pane active"
                  id="information"
                  aria-labelledby="information-tab"
                  role="tabpanel"
                >
                  <form class="form-validate">
                    <div class="row mt-1">
                      <div class="col-12">
                        <h4 class="mb-3 mt-3">
                          <feather-icon
                            icon="UserIcon"
                            class="font-medium-4 me-25"
                            size="35"
                          />
                          <span class="align-middle">Informacion Personal</span>
                        </h4>
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <div class="mb-3 mt-3">
                          <label class="form-label" for="fullname"
                            >Nombre Completo</label
                          >
                          <input
                            id="fullname"
                            type="text"
                            class="form-control"
                            placeholder="Ingresa tu nombre completo"
                            name="fullname"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <div class="mb-3 mt-3">
                          <label class="form-label" for="email">Email</label>
                          <input
                            id="email"
                            type="email"
                            class="form-control"
                            placeholder="Ingresa tu email"
                            name="email"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <div class="mb-3 mt-3">
                          <label class="form-label" for="telefono"
                            >Telefono</label
                          >
                          <input
                            id="telefono"
                            type="phone"
                            placeholder="Ingresa tu telefono"
                            class="form-control"
                            name="phone"
                          />
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-6">
                        <div class="mb-3 mt-3">
                          <label class="form-label" for="document"
                            >Tipo de documento</label
                          >
                          <select id="document" class="form-select">
                            <option value="CEDULA">CEDULA</option>
                            <option value="RUC">RUC</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-6">
                        <div class="mb-3 mt-3">
                          <label class="form-label" for="num_document"
                            >Numero de documento</label
                          >
                          <input
                            id="num_document"
                            type="text"
                            class="form-control"
                            placeholder="Ingresa tu numero de documento"
                            name="num_document"
                          />
                        </div>
                      </div>

                      <div class="col-12">
                        <h4 class="mb-3 mt-3">
                          <feather-icon
                            icon="MapPinIcon"
                            class="font-medium-4 me-25"
                            size="35"
                          />

                          <span class="align-middle">Direccion</span>
                        </h4>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        <div class="mb-3 mt-3">
                          <label class="form-label" for="direccion"
                            >Direccion</label
                          >
                          <input
                            id="direccion"
                            type="text"
                            class="form-control"
                            placeholder="Ingresa tu direccion"
                            name="direccion"
                          />
                        </div>
                      </div>

                      <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                        <button
                          type="submit"
                          class="btn btn-primary mb-1 mb-sm-0 me-0 me-sm-1"
                        >
                          Guardar Cambios
                        </button>
                      </div>
                    </div>
                  </form>
                </div>

                <div
                  class="tab-pane"
                  id="account"
                  aria-labelledby="account-tab"
                  role="tabpanel"
                >
                  <form class="form-validate">
                    <div class="row mt-1">
                      <div class="col-12">
                        <h4 class="mb-3 mt-3">
                          <feather-icon
                            icon="LockIcon"
                            class="font-medium-4 me-25"
                            size="35"
                          />
                          <span class="align-middle">Cambiar Password</span>
                        </h4>
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <div class="mb-3 mt-3">
                          <label class="form-label" for="password"
                            >Password</label
                          >
                          <input
                            id="password"
                            type="password"
                            class="form-control"
                            placeholder="Ingresa tu Password"
                            name="password"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <div class="mb-3 mt-3">
                          <label class="form-label" for="confirm-password"
                            >Confirmar Password</label
                          >
                          <input
                            id="confirm-password"
                            type="password"
                            class="form-control"
                            placeholder="Confirma tu Password"
                            name="confirm-password"
                          />
                        </div>
                      </div>
                      <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                        <button
                          type="submit"
                          class="btn btn-primary mb-1 mb-sm-0 me-0 me-sm-1"
                        >
                          Guardar Cambios
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Perfil",
};
</script>
