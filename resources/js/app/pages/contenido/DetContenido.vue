<template>
  <div>
    <Breadcrumb />
    <Modal />
    <div class="row">
      <div class="col-md-6 mb-5">
        <label class="form-label">LISTA DE NIVELES</label>
        <select class="select2-icons form-select">
          <option value="facebook" selected>Facebook</option>
          <option value="twitter">Twitter</option>
        </select>
      </div>
      <div class="col-md-6 mb-5">
        <label class="form-label">LISTA DE AREAS</label>
        <select class="select2-icons form-select">
          <!-- <option value="facebook" selected>Facebook</option>
          <option value="twitter">Twitter</option> -->
        </select>
      </div>
      <div class="col-md-12 mb-5">
        <label class="form-label">TITULO</label>
        <input type="text" class="form-control" placeholder="Ingresar Titulo" />
      </div>
      <div class="col-md-12 mb-5">
        <label class="form-label">DESCRIPTCIÓN</label>
        <div class="form-floating">
          <textarea
            class="form-control"
            style="height: 150px; resize: none"
          ></textarea>
        </div>
      </div>
      <div class="col-md-12 mb-5">
        <label class="form-label">IMAGENES</label>
        <div class="view-container cont_ajust_102">
          <div class="card file-manager-item folder">
            <div class="card-img-top file-logo-wrapper cont_ajust_box_asset">
              <div
                class="dropdown float-end cursor-pointer cont_absolute_right"
                data-bs-html="true"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="ELIMINAR"
              >
                <a href="#">
                  <span class="folder_color_danger">
                    <feather-icon icon="Trash2Icon" size="20" />
                  </span>
                </a>
              </div>
              <div
                class="
                  d-flex
                  align-items-center
                  justify-content-center
                  w-100
                  cont_opacity_color
                "
              >
                <img
                  src="https://i0.wp.com/talentocool.com/wp-content/uploads/2020/11/trabajo-como-programador-de-python-peru-1024x576.jpg"
                  alt="file-icon"
                  height="35"
                  class="cont_inside_asset cont_opacity_box"
                />
              </div>
            </div>
            <div class="card-body">
              <div class="content-wrapper">
                <p class="card-text mb-0" style="margin-top: -9px">algo.png</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 mb-5">
        <label class="form-label">ARCHIVOS PDF</label>
        <div class="view-container cont_ajust_102">
          <div class="card file-manager-item folder">
            <div class="card-img-top file-logo-wrapper cont_ajust_box_asset">
              <div
                class="dropdown float-end cursor-pointer cont_absolute_right"
                data-bs-html="true"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="ELIMINAR"
              >
                <a href="#">
                  <span class="folder_color_danger">
                    <feather-icon icon="Trash2Icon" size="20" />
                  </span>
                </a>
              </div>
              <div
                class="
                  d-flex
                  align-items-center
                  justify-content-center
                  w-100
                  cont_opacity_color
                "
              >
                <img
                  src="https://play-lh.googleusercontent.com/3tLaTWjP9kz56OwkbnbAnZoNp4HL28zcDMt5DEjt-kfuVhraWJBYC5XQRuMBf084JQ"
                  alt="file-icon"
                  height="35"
                  class="cont_inside_asset cont_opacity_box"
                />
              </div>
            </div>
            <div class="card-body">
              <div class="content-wrapper">
                <p class="card-text mb-0" style="margin-top: -9px">algo.pdf</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Breadcrumb from "./components/Breadcrumb";
import Modal from "./components/Modal";

export default {
  name: "DetContenido",
  data() {
    return {
      showModal: false,
    };
  },
  props: {
    valorEnviado: null,
  },
  components: {
    Breadcrumb,
    Modal,
  },
};
</script>

<style scoped>
fade-enter {
  transition: opacity 0.5s ease;
}
</style>
