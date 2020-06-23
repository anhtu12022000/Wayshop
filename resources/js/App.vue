<!-- <template>
	<main>	
		<router-view></router-view>
	<VueGoodshareFacebook
    page_url="https://github.com/koddr/vue-goodshare"
    title_social="Facebook"
    has_counter
    has_icon
  ></VueGoodshareFacebook>
</main>
</template>
<script>
	  import VueGoodshareFacebook from "vue-goodshare/src/providers/Facebook.vue";
</script>

-->
<template>     
 <div id="app">
  <v-snackbar v-model="snackbar" shaped color="#ff6666">
    {{ text }}
    <v-btn color="pink" text @click="snackbar = false"><v-icon>mdi-close-circle-outline</v-icon></v-btn>
  </v-snackbar>
  <div class="chat" v-show="ok">
         <div class="card direct-chat direct-chat-warning">
            <div class="card-header">
               <h3 class="card-title">Direct Chat</h3>
               <div class="card-tools" @click="okfalse">
                  <v-icon size="18px" color="#ff6666">mdi-close-circle-outline</v-icon>
               </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <!-- Conversations are loaded here -->
               <div id="parentDiv" class="direct-chat-messages" >
                <div v-for="chat in chat_list">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg left" v-if="chat.send_from != auth_user.id">
                     <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">Admin</span>
                        <span class="direct-chat-timestamp">{{ chat.created_at }}</span>
                     </div>
                     <!-- /.direct-chat-infos -->
                     <img class="direct-chat-img" src="admin_assets/dist/img/user1-128x128.jpg" alt="message user image">
                     <!-- /.direct-chat-img -->
                     <div class="direct-chat-text">
                        {{ chat.message }}
                     </div>
                     <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                  <!-- Message to the right -->
                  <div class="direct-chat-msg right" v-else>
                     <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name">{{ auth_user.name }}</span>
                        <span class="direct-chat-timestamp float-left">{{ chat.created_at }}</span>
                     </div>
                     <!-- /.direct-chat-infos -->
            
                      <img
                      v-if="auth_user.avatar_original != null"
                      :src="`${auth_user.avatar_original}`"
                      alt=""
                      class="direct-chat-img float-right"
                      alt="message user image"
                      > 

                      <img
                      v-else
                      :src="`${auth_user.image}`"
                      alt=""
                      class="direct-chat-img float-right"
                      alt="message user image"
                      >
      
                     <!-- /.direct-chat-img -->
                     <div class="direct-chat-text">
                       {{ chat.message }}
                     </div>
                     <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                  </div>
               </div>
               <!--/.direct-chat-messages-->
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
               <form action="#" method="post">
                  <div class="input-group">
                     <input type="text" name="message" v-model="message_body" placeholder="Type Message ..." class="form-control">
                     <span class="input-group-append">
                        <button type="button" @click="send_message" class="btn btn-warning">Send</button>
                     </span>
                  </div>
               </form>
            </div>
         <!-- /.card-footer-->
         </div>
   </div>
   <div class="borngoai text-center" @click="boxMessage">
      <div class="bortrong">
        <v-icon size="36px" color="#ff6666">mdi-facebook-messenger</v-icon>
     </div>
   </div>

</div>
</template>
<style scope>

#style::-webkit-scrollbar {
    width: 6px;
    background-color: #F5F5F5;
} 

#style::-webkit-scrollbar-thumb {
    background-color: #ff6666;
}

#style::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

#app {
   position: fixed;
   z-index: 99999999999999999;
   right: 20px;
   bottom: 150px;
}

.borngoai {
  width: 50px;
  position: relative;
  z-index: 10px;
  height: 50px;
  background-color: #ff6666;
  border-radius: 50%;
  animation: borngoai 2s infinite;
}

.bortrong {
  width: 35px;
  position: absolute;
  top: 14%;
  left: 14%;
  height: 35px;
  background-color: #ffffff;
  border-radius: 50%;
  animation: bortrong 2s infinite;
}

@keyframes borngoai {
   from {transform: rotateX(0deg);}
   to {transform: rotateX(360deg);}
}

@keyframes bortrong {
   from {transform: rotateY(0deg);}
   to {transform: rotateY(360deg);}
}

.card {
   box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
   margin-bottom: 1rem;
}

.card {
  position: relative;
  z-index: 99999999999999999999999;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 0 solid rgba(0,0,0,.125);
  border-radius: .25rem;
}

.card-header:first-child {
    border-radius: calc(.25rem - 0) calc(.25rem - 0) 0 0;
}
.card-header {
    background-color: transparent;
    border-bottom: 1px solid rgba(0,0,0,.125);
    padding: .75rem 1.25rem;
    position: relative;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
}

.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 0 solid rgba(0,0,0,.125);
}

.card-title {
    float: left;
    font-size: 1.1rem;
    font-weight: 400;
    margin: 0;
}

.card-header>.card-tools {
    float: right;
    margin-right: -.625rem;
}

.card-header>.card-tools [data-toggle=tooltip] {
    position: relative;
}

.badge-warning {
    color: #1f2d3d;
    background-color: #ffc107;
}
.badge {
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.direct-chat .card-body {
    overflow-x: hidden;
    padding: 0;
    position: relative;
}

.direct-chat .card-body {
    overflow-anchor: none;
    padding: 0;
    position: relative;
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}

.direct-chat-contacts, .direct-chat-messages {
    transition: -webkit-transform .5s ease-in-out;
    transition: transform .5s ease-in-out;
    transition: transform .5s ease-in-out,-webkit-transform .5s ease-in-out;
}

.direct-chat-messages {
    -webkit-transform: translate(0,0);
    transform: translate(0,0);
    height: 250px;
    overflow: auto;
    padding: 10px;
}

.direct-chat-msg {
    margin-bottom: 10px;
}

.direct-chat-msg, .direct-chat-text {
    display: block;
}

.direct-chat-infos {
    display: block;
    font-size: .875rem;
    margin-bottom: 2px;
}

.direct-chat-name {
   font-size: 16px;
    font-weight: 600;
}

.direct-chat-timestamp {
    color: #697582;
}

.direct-chat-img {
    border-radius: 50%;
    float: left;
    height: 40px;
    width: 40px;
}

img {
    vertical-align: middle;
    border-style: none;
}

.direct-chat-text {
    border-radius: .3rem;
    width: 300px;
    background: #d2d6de;
    border: 1px solid #d2d6de;
    color: #444;
    margin: 5px 10px 0 50px;
    padding: 5px 10px;
    position: relative;
}

.direct-chat-msg, .direct-chat-text {
    display: block;
    margin-right: 5px;
}

.direct-chat-msg {
    margin-bottom: 10px;
}

.direct-chat-msg, .direct-chat-text {
    display: block;
}

.direct-chat-infos {
    display: block;
    font-size: .875rem;
    margin-bottom: 2px;
}

.direct-chat-warning .right>.direct-chat-text {
    background: #ffc107;
    border-color: #ffc107;
    color: #1f2d3d;
}

.right .direct-chat-text {
    margin-left: 0;
    margin-right: 50px;
}

.right .direct-chat-img, .right .direct-chat-name{
    float: right !important;
}

.direct-chat-text {
    border-radius: .3rem;
    background: #d2d6de;
    border: 1px solid #d2d6de;
    color: #444;
    margin: 5px 0 0 50px;
    padding: 5px 10px;
    position: relative;
}
.direct-chat-msg, .direct-chat-text {
    display: block;
}


.direct-chat-contacts {
    -webkit-transform: translate(101%,0);
    transform: translate(101%,0);
    background: #343a40;
    bottom: 0;
    color: #fff;
    height: 250px;
    overflow: auto;
    position: absolute;
    top: 0;
    width: 100%;
}
.direct-chat-contacts, .direct-chat-messages {
    transition: -webkit-transform .5s ease-in-out;
    transition: transform .5s ease-in-out;
    transition: transform .5s ease-in-out,-webkit-transform .5s ease-in-out;
}

.card-footer:last-child {
    border-radius: 0 0 calc(.25rem - 0) calc(.25rem - 0);
}
.card-footer {
    padding: .75rem 1.25rem;
    background-color: rgba(0,0,0,.03);
    border-top: 0 solid rgba(0,0,0,.125);
}

.input-group {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100%;
}

.input-group button{
    position: absolute;
    right: 0px;
    z-index: 999999999999999999;
}

.input-group>.custom-select:not(:last-child), .input-group>.form-control:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.input-group>.custom-file, .input-group>.custom-select, .input-group>.form-control, .input-group>.form-control-plaintext {
    /* position: relative; */
    -ms-flex: 1 1 auto;
    /* flex: 1 1 auto; */
    /* width: 1%; */
    /* margin-bottom: 0; */
}

.input-group-append {
    margin-left: -1px;
}

.input-group-append, .input-group-prepend {
    display: -ms-flexbox;
    display: flex;
}

.left .direct-chat-timestamp {
   float: right !important;
}

.direct-chat-warning .right>.direct-chat-text::after, .direct-chat-warning .right>.direct-chat-text::before {
    border-left-color: #ffc107;
}

.right .direct-chat-text::after, .right .direct-chat-text::before {
    border-left-color: #d2d6de;
    border-right-color: transparent;
    left: 100%;
    right: auto;
}
.direct-chat-text::before {
    border-width: 6px;
    margin-top: -6px;
}
.direct-chat-text::after, .direct-chat-text::before {
    border: solid transparent;
    border-right-color: #d2d6de;
    content: ' ';
    height: 0;
    pointer-events: none;
    position: absolute;
    right: 100%;
    top: 15px;
    width: 0;
}

.direct-chat-text::before {
    border-width: 6px;
    margin-top: -6px;
}

.direct-chat-text::after, .direct-chat-text::before {
    border: solid transparent;
    border-right-color: #d2d6de;
    content: ' ';
    height: 0;
    pointer-events: none;
    position: absolute;
    right: 100%;
    top: 15px;
    width: 0;
}

</style>

<script>

export default {

   data() {
      return {
        ok: false,
        auth_user: {

        },
        users: {

        },
        message_body: "",
        typing: false,
        chat_list: [

        ],
        ready: false,
        sender_id: '',
        receiver_id: 1,
        snackbar: false,
        text: '',
      }
   },
   methods: {

      //send message
      send_message() {
          if (this.message_body == '') {
            this.text = 'Message is required'
            this.snackbar = true;
          } else {
          //socket sending data
          socket.emit(
            "chat-message",
            {
              message: this.message_body,
              sender_id: this.auth_user.id,
              send_from: this.auth_user.id,
              receiver_id: this.receiver_id,
              user: this.auth_user.name
            },
            this.auth_user.name
          );
          
          // Thêm đoạn chát vào mảng chat_list
          if (this.auth_user.id == this.receiver_id) {
            this.chat_list.push({
              message: this.message_body,
              sender_id: this.auth_user.id,
              sender_from: this.auth_user.id,
              receiver_id: this.receiver_id
            });
          }

        //thêm vào DB

        let frdata = new FormData();
        frdata.append("sender_id", this.auth_user.id);
        frdata.append("receiver_id", this.receiver_id);
        frdata.append("send_from", this.auth_user.id);
        frdata.append("message", this.message_body);

        axios.post(this.$host_url+'/send/message', frdata, {
          headers: {
            "Content-Type": "multipart/form-data",
            Authorization: "Bearer" + localStorage.getItem("token")
          }
        }).then(res => {
          console.log(res.data);  
          axios.get(this.$host_url+'/chat/list/'+this.auth_user.id,
            {
              headers: {
                Authorization: "Bearer" + localStorage.getItem("token")
              }
            }).then(response => {
              (this.message_body = ""),
              (this.chat_list = response.data);
              $("#parentDiv").animate({ scrollTop: $(document).height()+10000 }, 1000);
          return false;
            }).catch(err => console.log(err))
        
        }).catch(err => console.log(err))
        };
      },

      //Lấy tin nhắn của user
      message_conversation () {
        axios.get(this.$host_url+'/chat/list/'+this.auth_user.id, {
          headers: {
            Authorization: "Bearer" + localStorage.getItem("token")
          }
        })
        .then(res => {
            this.chat_list = res.data;
                console.log("chat data " + res.data);
        }).catch(err => {
          console.log(err);
        });
      },

      //Lấy thông tin user từ DB
      auth_user_data () {
        if (localStorage.getItem("token")) {
          axios.get(this.$host_url+'/auth/user/'+localStorage.getItem("user_id"), {
            headers: {
              Authorization: "Bearer" + localStorage.getItem("token")
            }
          })
          .then(res => {
            this.auth_user = res.data;
            this.message_conversation();
             console.log(this.auth_user);
          }).catch(err => {
            console.log(err);
          });
        };
      },
      
      boxMessage () {
        if (localStorage.getItem("token") == null) {
          this.text = "Login to chat";
          this.snackbar = true;
        } else {
          $('.chat').toggle(1000);
          $("#parentDiv").animate({ scrollTop: $(document).height()+10000 }, 3000);
          return false;
        }; 
      },

      okfalse () {
         $('.chat').toggle(1000);
      }  
   },
   mounted() {
      //call this methods
      this.auth_user_data();
      socket.on("chat-message", data => {
        console.log("socket data"+ data);
        if (this.auth_user.id == data.receiver_id) {
          this.chat_list.push({
            message: data.message,
            sender_id: data.sender_id,
            send_from: data.send_from,
            receiver_id: data.receiver_id

          });
        }
     
        $("#parentDiv").animate({ scrollTop: $(document).height()+10000 }, 1000);
          return false;
        console.log("sock rec=" + this.receiver_id);
      })
    }
}

</script>
