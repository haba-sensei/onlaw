<template>
  <div
    class="modal fade text-start"
    id="create_assets"
    tabindex="-1"
    aria-labelledby="myModalLabel1"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">Subir Elemento</h4>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">

          <vue-dropzone
            ref="myVueDropzone"
            class="dropzone"
            id="dropzone"
            acceptedFileTypes='.jpg,.png'
            :include-styling="false"
            :useCustomSlot="true"
            :options="dropzoneOptions"
            v-on:vdropzone-thumbnail="thumbnail"
            v-on:vdropzone-removed-file="removeThisFile"
            v-on:vdropzone-success="showSuccess"
           >
            <div class="dropzone-custom-content">
              <h3 class="dropzone-custom-title">Arrastra aqui los elementos</h3>
            </div>
          </vue-dropzone>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" @click="someMethod">
            Enviar elementos
          </button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
            Accept
          </button>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import vue2Dropzone from "vue2-dropzone";
export default {
  name: "Modal",
  components: {
    vueDropzone: vue2Dropzone,
  },
  data: function () {
    return {
      dropzoneOptions: {
        url: "https://httpbin.org/post",
        method: "POST",
        thumbnailWidth: 150,
        thumbnailHeight: 150,
        maxFilesize: 5,
        addRemoveLinks: true,
        autoProcessQueue: false,
        previewTemplate: this.template(),
        dictDefaultMessage: "Arrastra los archivos aquí para subirlos",
      },
    };
  },
  methods: {
    someMethod: function () {
        console.log("enviado");
      this.$refs.myVueDropzone.processQueue();

    },
    template: function () {
      return `<div class="dz-preview dz-file-preview">
                <div class="dz-image">
                    <div data-dz-thumbnail-bg></div>
                </div>
                <div class="dz-details">
                    <div class="dz-size"><span data-dz-size></span></div>
                    <div class="dz-filename"><span data-dz-name></span></div>
                </div>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                <div class="dz-success-mark"><i class="fa fa-check"></i></div>
                <div class="dz-error-mark"><i class="fa fa-close"></i></div>

            </div>
        `;
    },
    thumbnail: function (file, dataUrl) {
      var j, len, ref, thumbnailElement;
      if (file.previewElement) {
        file.previewElement.classList.remove("dz-file-preview");
        ref = file.previewElement.querySelectorAll("[data-dz-thumbnail-bg]");
        for (j = 0, len = ref.length; j < len; j++) {
          thumbnailElement = ref[j];
          thumbnailElement.alt = file.name;
          thumbnailElement.style.backgroundImage = 'url("' + dataUrl + '")';
        }
        return setTimeout(
          (function (_this) {
            return function () {
              return file.previewElement.classList.add("dz-image-preview");
            };
          })(this),
          1
        );
      }
    },
     removeThisFile (file) {
        let FileName = file.name;
      },
    showSuccess (file) {

        console.log( file.name + ' : File uploaded');
        // this.$refs.myVueDropzone.removeAllFiles();
      },
  },
};
</script>


