<template>
  <div class="app-content content chat-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-area-wrapper container-xxl p-0">
      <div class="sidebar-left">
        <div class="sidebar">
          <div class="sidebar-content">
            <!-- <div class="chat-fixed-search">
              <div class="d-flex align-items-center w-100">
                <div class="sidebar-profile-toggle">
                  <div class="avatar avatar-border">
                    <img
                      src="https://vuejs.org/images/logo.svg"
                      alt="user_avatar"
                      height="42"
                      width="42"
                    />
                    <span class="avatar-status-online"></span>
                  </div>
                </div>
                <div class="input-group input-group-merge ms-1 w-100">
                  <span class="input-group-text round">
                    <i class="text-muted fas fa-search"></i
                  ></span>
                  <input
                    type="text"
                    class="form-control round"
                    id="chat-search"
                    placeholder="Busqueda de clientes"
                    aria-label="Buscando..."
                    aria-describedby="chat-search"
                  />
                </div>
              </div>
            </div> -->
            <!-- Sidebar header end -->

            <!-- Sidebar Users start -->
            <div
              id="users-list"
              class="
                chat-user-list-wrapper
                list-group
                scroll-bar-wrap scroll-box scroll-reverse
              "
            >
              <h4 class="chat-list-title" style="font-size: 1.3rem !important">
                Mis Chats
                <span class="badge badge-primary">
                  ( {{ chatLawchat.length }} )
                </span>
              </h4>
              <ul class="chat-users-list chat-list media-list">
                <li
                  v-for="chat in chatLawchat"
                  :key="chat.id"
                  @click="abrirChat(chat.chat_id, chat.cliente, chat.fullname)"
                >
                  <span class="avatar"
                    ><img
                      src="https://cdn-icons-png.flaticon.com/512/1077/1077012.png"
                      height="42"
                      width="42"
                      alt="Generic placeholder image"
                    />
                  </span>
                  <div class="chat-info flex-grow-1">
                    <h5 class="mb-0 text-capitalize">{{ chat.fullname }}</h5>
                    <p class="card-text text-truncate">
                      {{ chat.nombre }}
                    </p>
                  </div>
                  <div class="chat-meta text-nowrap">
                    <small class="float-end mb-25 chat-time">
                      {{
                        moment(chat.created_at).format("D/M/YYYY, h:mm:ss A")
                      }}</small
                    >
                  </div>
                </li>

                <li
                  v-bind:class="[chatLawchat.length >= 1 ? 'no-results' : '']"
                >
                  <h6 class="mb-0">No hay Chats</h6>
                </li>
              </ul>

              <h4 class="chat-list-title" style="font-size: 1.3rem !important">
                Solicitudes
                <span class="badge badge-primary">
                  ( {{ chatAll.length }} )
                </span>
              </h4>
              <ul class="chat-users-list chat-list media-list">
                <li
                  v-for="chat in chatAll"
                  :key="chat.id"
                  @click="confirmarSolicitud(chat.chat_id)"
                >
                  <span class="avatar"
                    ><img
                      src="https://cdn-icons-png.flaticon.com/512/1077/1077012.png"
                      height="42"
                      width="42"
                      alt="Generic placeholder image"
                    />
                  </span>
                  <div class="chat-info flex-grow-1">
                    <h5 class="mb-0 text-capitalize">{{ chat.fullname }}</h5>
                    <p class="card-text text-truncate">
                      {{ chat.nombre }}
                    </p>
                  </div>
                  <div class="chat-meta text-nowrap">
                    <small class="float-end mb-25 chat-time">
                      {{
                        moment(chat.created_at).format("D/M/YYYY, h:mm:ss A")
                      }}</small
                    >
                  </div>
                </li>

                <li v-bind:class="[chatAll.length >= 1 ? 'no-results' : '']">
                  <h6 class="mb-0">No hay Chats</h6>
                </li>
              </ul>
            </div>
            <!-- Sidebar Users end -->
          </div>
          <!--/ Chat Sidebar area -->
        </div>
      </div>
      <div class="content-right">
        <div class="content-wrapper container-xxl p-0">
          <div class="content-header row"></div>
          <div class="content-body">
            <div class="body-content-overlay"></div>
            <!-- Main chat area -->
            <section class="chat-app-window">
              <!-- To load Conversation -->
              <div
                class="start-chat-area"
                v-bind:class="[IsActive ? 'd-none' : '']"
              >
                <div class="mb-1 start-chat-icon">
                  <i class="fas fa-comments"></i>
                </div>
                <h4 class="sidebar-toggle start-chat-text">
                  Elige un chat para iniciar
                </h4>
              </div>
              <!--/ To load Conversation -->

              <!-- Active Chat -->
              <div class="active-chat">
                <!-- Chat Header -->
                <div class="chat-navbar">
                  <header class="chat-header">
                    <div class="d-flex align-items-center">
                      <div class="sidebar-toggle d-block d-lg-none me-1">
                        <i data-feather="menu" class="font-medium-5"></i>
                      </div>
                      <div
                        class="
                          avatar avatar-border
                          user-profile-toggle
                          m-0.5
                          me-1
                        "
                      >
                        <img
                          src="https://cdn-icons-png.flaticon.com/512/1077/1077012.png"
                          alt="avatar"
                          height="36"
                          width="36"
                        />
                      </div>
                      <h5 class="mb-0 ml-4 text-capitalize">
                        {{ this.chat_name }}
                      </h5>
                    </div>
                    <div class="d-flex align-items-center">
                      <button class="btn btn-danger" @click="finalizarChat()">
                        <feather-icon
                          icon="PowerIcon"
                          style="margin-bottom: 3px"
                          size="18"
                        />

                        <span>Finalizar Chat </span>
                      </button>
                    </div>
                  </header>
                </div>
                <!--/ Chat Header -->

                <!-- User Chat messages -->
                <div
                  class="user-chats scroll-bar-wrap scroll-box scroll-reverse"
                >
                  <div class="chats">
                    <template v-for="message in messages">
                      <div
                        class="chat"
                        v-bind:class="[
                          message.sender != message.cliente ? 'chat-left' : '',
                        ]"
                        :key="message.id"
                      >
                        <div class="chat-avatar">
                          <span class="avatar box-shadow-1 cursor-pointer">
                            <img
                              v-bind:src="[
                                message.sender != message.cliente
                                  ? 'https://cdn-icons-png.flaticon.com/512/2646/2646662.png'
                                  : 'https://cdn-icons-png.flaticon.com/512/1077/1077012.png',
                              ]"
                              alt="avatar"
                              height="36"
                              width="36"
                            />
                          </span>
                        </div>
                        <div class="chat-body">
                          <div class="chat-content">
                            <p>{{ message.mensaje }}</p>
                          </div>
                        </div>
                      </div>
                    </template>
                  </div>
                  <div class="cover-bar"></div>
                </div>
                <!-- User Chat messages -->

                <!-- Submit Chat form -->
                <form class="chat-app-form">
                  <div
                    class="input-group input-group-merge me-1 form-send-message"
                  >
                    <input
                      type="text"
                      class="form-control message"
                      placeholder="Escribe un mensaje..."
                      v-model="mensaje"
                      name="mensaje"
                      autocomplete="off"
                    />
                  </div>
                  <button
                    type="submit"
                    class="btn btn-primary send"
                    @click.prevent="enviarChat"
                  >
                    <i data-feather="send" class="d-lg-none"></i>
                    <span class="d-none d-lg-block">Enviar</span>
                  </button>
                </form>
                <!--/ Submit Chat form -->
              </div>
              <!--/ Active Chat -->
            </section>
            <!--/ Main chat area -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "chat",
  data() {
    return {
      IsActive: false,
      chatAll: [],
      chatLawchat: [],
      chatMychat: [],
      messages: [],
      chat_name: "",
      chat_id: "",
      mensaje: "",
    };
  },
  mounted() {
    this.listarChatAll();
    this.listarChatLawchat();
    this.$cron.stop("load");
  },
  methods: {
    async listarChatAll() {
      await this.axios
        .get("/chat/list/all", {
          headers: {
            Authorization: "Bearer " + this.$store.state.token,
          },
        })
        .then((response) => {
          this.chatAll = response.data;
          //   console.log(this.chatAll);
        })
        .catch((error) => {
          this.chatAll = [];
        });
    },
    async listarChatLawchat() {
      await this.axios
        .get("/chat/list/lawchat", {
          headers: {
            Authorization: "Bearer " + this.$store.state.token,
          },
        })
        .then((response) => {
          this.chatLawchat = response.data;
          this.IsActive = false;
        })
        .catch((error) => {
          this.chatLawchat = [];
        });
    },

    async confirmarSolicitud(chat_id) {
      await Vue.swal({
        title: "¿Quieres atender al cliente?",
        icon: "question",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Si Atender",
        denyButtonText: `No Atender`,
      }).then((result) => {
        if (result.isConfirmed) {
          this.axios
            .get("/chat/tomar_chat/" + chat_id, {
              headers: {
                Authorization: "Bearer " + this.$store.state.token,
              },
            })
            .then((response) => {
              this.listarChatLawchat();
              this.listarChatAll();
            })
            .catch((error) => {
              this.messages = [];
            });
        } else if (result.isDenied) {
        }
      });
    },

    async finalizarChat() {
      await Vue.swal({
        title: "¿Quieres finalizar el chat? ",
        icon: "question",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Si Finalizar",
        denyButtonText: `No Finalizar`,
      }).then((result) => {
        if (result.isConfirmed) {
          this.axios
            .get("/chat/close_chat/" + this.chat_id, {
              headers: {
                Authorization: "Bearer " + this.$store.state.token,
              },
            })
            .then((response) => {
              this.listarChatLawchat();
              this.$cron.stop("load");
            })
            .catch((error) => {
              this.messages = [];
            });
        } else if (result.isDenied) {
        }
      });
    },

    async abrirChat(chat_id, client_id, chat_name) {
      await this.axios
        .get("/chat/message/" + chat_id, {
          headers: {
            Authorization: "Bearer " + this.$store.state.token,
          },
        })
        .then((response) => {
          this.messages = response.data;
          this.cliente = client_id;
          this.chat_id = chat_id;
          this.chat_name = chat_name;
          this.abogado = this.$store.getters.getUser.id;
          this.IsActive = true;
          this.$cron.start("load");
          //
        })
        .catch((error) => {
          this.messages = [];
        });
    },

    async enviarChat() {
      await this.axios
        .post(
          "/chat/send",
          {
            mensaje: this.mensaje,
            abogado: this.abogado,
            cliente: this.cliente,
            chat_id: this.chat_id,
          },
          {
            headers: {
              Authorization: "Bearer " + this.$store.state.token,
            },
          }
        )
        .then((response) => {
          this.messages = response.data;
          this.mensaje = "";
        })
        .catch((error) => {
          this.messages = [];
        });
    },

    load() {
      this.abrirChat(this.chat_id, this.cliente, this.chat_name);
    },
  },
  cron: {
    time: 3000,
    autoStart: false,
    method: "load",
  },
};
</script>
