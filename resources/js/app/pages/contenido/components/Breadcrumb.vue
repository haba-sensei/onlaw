<template>
  <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#" @click="$router.go(-1)">Regresar</a>
              </li>
              <li class="breadcrumb-item active">Variable del contenido</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div
      class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none"
    >
      <div class="mb-1 breadcrumb-right">
        <div class="dropdown">
          <button
            class="
              btn-icon btn btn-primary btn-round btn-sm
              dropdown-toggle
              waves-effect waves-float waves-light
            "
            type="button"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <feather-icon icon="PlusSquareIcon" size="20" />
          </button>
          <div class="dropdown-menu dropdown-menu-end">
            <a
              class="dropdown-item"
              href="#"
              data-bs-toggle="modal"
              data-bs-target="#create_assets"
            >
              <span class="folder_color_primary">
                <feather-icon icon="ImageIcon" size="20" />
              </span>
              <span class="align-middle">Nueva Imagen</span></a
            ><a
              class="dropdown-item"
              href="#"
              data-bs-toggle="modal"
              data-bs-target="#create_assets"
            >
              <span class="folder_color_primary">
                <feather-icon icon="FileTextIcon" size="20" /> </span
              ><span class="align-middle"> Nuevo Pdf</span></a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Breadcrumb",
};
</script>
