<template>
  <div
    class="
      file-manager-content-header
      d-flex
      justify-content-between
      align-items-center
    "
  >
    <div class="d-flex align-items-center search_full_with">
      <div
        class="sidebar-toggle d-block d-xl-none float-start align-middle ms-1"
      ></div>
      <div class="input-group input-group-merge shadow-none m-0 w-full">
        <span class="input-group-text border-0">
          <feather-icon icon="SearchIcon" />
        </span>
        <input
          type="text"
          class="form-control files-filter border-0 bg-transparent"
          placeholder="Buscar Contenido ..."
        />
      </div>
    </div>
  </div>
</template>


<script>
export default {
  name: "Buscador",
};
</script>
