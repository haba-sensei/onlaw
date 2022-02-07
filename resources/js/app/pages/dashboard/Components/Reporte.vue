<template>
    <div class="row match-height">
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="fw-bolder mb-0">{{ totalAbog }}</h2>
                        <p class="card-text">Total Abogados</p>
                    </div>
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content " style="width:46px; height: 46px;">
                              <feather-icon icon="BriefcaseIcon" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="fw-bolder mb-0">{{ totalClient }}</h2>
                        <p class="card-text">Total Clientes</p>
                    </div>
                    <div class="avatar bg-light-success p-50 m-0">
                        <div class="avatar-content" style="width:46px; height: 46px;">
                            <feather-icon icon="BriefcaseIcon" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="fw-bolder mb-0">{{ totalChatsAtend }}</h2>
                        <p class="card-text">Chats Atendidos</p>
                    </div>
                    <div class="avatar bg-light-danger p-50 m-0">
                        <div class="avatar-content" style="width:46px; height: 46px;">
                            <feather-icon icon="BriefcaseIcon" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="fw-bolder mb-0">{{ totalChatsEspe }}</h2>
                        <p class="card-text">Chats En Espera</p>
                    </div>
                    <div class="avatar bg-light-warning p-50 m-0">
                        <div class="avatar-content" style="width:46px; height: 46px;">
                           <feather-icon icon="BriefcaseIcon" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Reporte",
     data() {
    return {
      totalAbog: '0',
      totalClient: '0',
      totalChatsAtend: '0',
      totalChatsEspe: '0',
    };
  },
  mounted() {
    this.listarReporte();
  },
   methods: {
    async listarReporte() {
      await this.axios
        .get("/reportes/basico", {
          headers: {
            Authorization: "Bearer " + this.$store.state.token,
          },
        })
        .then((response) => {

            this.totalAbog = response.data.totalAbog;
            this.totalClient = response.data.totalClient;
            this.totalChatsAtend = response.data.totalChatsAtend;
            this.totalChatsEspe = response.data.totalChatsEspe;
        })
        .catch((error) => {
            this.totalAbog = '0';
            this.totalClient = '0';
            this.totalChatsAtend = '0';
            this.totalChatsEspe = '0';
        });
    },
   }
};
</script>
