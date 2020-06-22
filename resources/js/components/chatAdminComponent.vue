<template>
	<div id="chatAdmin">
		<div class="card direct-chat direct-chat-warning">
                           <div class="card-header">
                              <h3 class="card-title">Direct Chat</h3>
                              <div class="card-tools">
                                 <span data-toggle="tooltip" title="3 New Messages" class="badge badge-warning">{{ numbernewmess }}</span>
                                 <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                 </button>
                                 <button type="button" class="btn btn-tool" @click="user_list" data-toggle="tooltip" title="Contacts"
                                    data-widget="chat-pane-toggle">
                                 <i class="fas fa-comments"></i></button>
                                 <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                 </button>
                              </div>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <!-- Conversations are loaded here -->
                              <div class="direct-chat-messages" id="direct-chat-parent">
                                 <!-- Message. Default to the left -->
                                 <span v-for="chat in chat_list">
                                 <div class="direct-chat-msg" v-if="chat.send_from != 1">
                                    <div class="direct-chat-infos clearfix">
                                       <span class="direct-chat-name float-left">{{ receiver_user.name }}</span>
                                       <span class="direct-chat-timestamp float-right">{{ chat.created_at }}</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" v-if="receiver_user.image != null" :src="receiver_user.image">
                                    <img class="direct-chat-img" v-else-if="receiver_user.avatar_original != null" :src="receiver_user.image">
                                    <img class="direct-chat-img" v-else src="admin_assets/dist/img/default.svg.png">
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
                                       <span class="direct-chat-name float-right">Admin</span>
                                       <span class="direct-chat-timestamp float-left">{{ chat.created_at }}</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
   
                                    <img class="direct-chat-img" src="admin_assets/dist/img/default.svg.png">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                       {{ chat.message }}
                                    </div>
                                    <!-- /.direct-chat-text -->
                                 </div>
                                 </span>
                                 <!-- /.direct-chat-msg -->
                                 <!-- Message. Default to the left -->
                              </div>
                              <!--/.direct-chat-messages-->
                              <!-- Contacts are loaded here -->
                              <div class="direct-chat-contacts">
                                 <ul class="contacts-list">
                                    <li v-for="user in users">
                                       <a href="javascript:void(0)" :class="'user'+user.id" @click="message_conversation(user)">
                                       	  <img @click="message_conversation(user)" v-if="user.avatar_original == null && user.image == null" class="contacts-list-img" src="admin_assets/dist/img/default.svg.png">
                                       	  <img
                                       	  @click="message_conversation(user)"
					                      v-else-if="user.avatar_original != null"
					                      :src="`${user.avatar_original}`"
					                      class="contacts-list-img"
					                      alt="message user image"
					                      > 

					                      <img
					                      @click="message_conversation(user)"
					                      v-else-if="user.image != null"
					                      :src="`front_assets/img/user/${user.image}`"
					                      class="contacts-list-img"
					                      alt="message user image"
					                      >
                                          
                                          <div class="contacts-list-info">
                                             <span class="contacts-list-name">
                                            	<span class="username"> {{ user.name }} </span>
                                             <small class="contacts-list-date float-right">{{ user.time }}</small>
                                             </span>
                                             <span class="contacts-list-msg">{{ user.mess }}</span><span v-if="user.key == `user`" class="radiuschat"></span><span v-if="user.key == `user`" class="alert_chat">1</span>
                                          </div>
                                          <!-- /.contacts-list-info -->
                                       </a>
                                    </li>
                                    <!-- End Contact Item -->
                                 </ul>
                                 <!-- /.contacts-list -->
                              </div>
                              <!-- /.direct-chat-pane -->
                           </div>
                           <!-- /.card-body -->
                           <div class="card-footer">
                              <form action="#" method="post">
                                 <div class="input-group">
                                    <input type="text" name="message" v-model="message_body" placeholder="Type Message ..." class="form-control">
                                    <span class="input-group-append">
                                    <button type="button" class="btn btn-warning" @click="send_message">Send</button>
                                    </span>
                                 </div>
                              </form>
                           </div>
                           <!-- /.card-footer-->
                        </div>
	</div>
</template>
<style scoped>
	.contacts-list-name {
		position: relative;
	}

	.username:after {
		position: absolute;
	    font-size: 40px;
	    bottom: -10px;
	    content: '.';
	    color: #00ffff;
	}
	
	/*.direct-chat .card-body {
		height: 250px;
		overflow-y: scroll;
		overflow-x: hidden;
	}
	*/
	.alert_chat {
		position: absolute;
		right: 20px;
		color: #000;
		right: 24px;
    	top: 32px;
		font-size: smaller;
	}

	.radiuschat {
		position: absolute;
		right: 20px;
		border-radius: 50%;
		width: 15px;
		height: 15px;
		background-color: #ffc107;
			
	}
</style>
<script>
	export default {
		data() {
			return {
				maudo: false,
				auth_user: {

				},
				users: {

				},
				image_user: '',
				numbernewmess: 0,
				receiver_user: {

				},
				message_body: "",
				typing: false,
				chat_list: [

				],
				ready: false,
				info: {

				},
				connectionCount: 0,
				sender_id: 1,
				receiver_id: "",

			};
		},
		methods: {

			//send message
			send_message() {
		      //socket sending data
		      socket.emit(
		        "chat-message",
		        {
		          message: this.message_body,
		          sender_id: this.sender_id,
		          send_from: this.sender_id,
		          receiver_id: this.receiver_user.id,
		          user: this.auth_user.name
		        },
		        this.auth_user.name
		      );

		      //thêm đoạn chát vào array chat_list
		      if (this.sender_id == this.receiver_id) {
		        this.chat_list.push({
		          message: this.message_body,
		          sender_id: this.sender_id,
		          sender_from: this.sender_id,
		          receiver_id: this.receiver_user.id
		        });
		      }

				//thêm vào DB

				let frdata = new FormData();
				frdata.append("sender_id", this.sender_id);
				frdata.append("receiver_id", this.receiver_user.id);
				frdata.append("send_from", this.sender_id);
				frdata.append("message", this.message_body);

				axios.post(this.$host_url+'/send/message', frdata, {
					headers: {
						"Content-Type": "multipart/form-data",
						Authorization: "Bearer" + localStorage.getItem("token")
					}
				}).then(res => {

					console.log(res.data);

					if (this.sender_id == this.receiver_id) {
						axios.get(this.$host_url+'/chat/list/'+this.sender_id+'/'+this.receiver_user.id,
						{
							headers: {
								Authorization: "Bearer" + localStorage.getItem("token")
							}
						}).then(response => {
							(this.message_body = ""),
							(this.chat_list = response.data);
							if (this.info.key == 'user') {
								this.info.key == null;
								this.numbernewmess--;
								$('.badge-danger').text(this.numbernewmess);
							};
							$("#direct-chat-parent").animate({ scrollTop: $(document).height()+10000 }, 1000);
					return false;
						}).catch(err => console.log(err))
					};
				}).catch(err => console.log(err))
			},

			//Lấy tin nhắn của user
			message_conversation (user) {
				this.info = user;
				$('.text').css('color', '');
				$('.user'+user.id).find('.text').css('color', 'red');
				axios.get(this.$host_url+'/chat/list/1/'+user.id, {
					headers: {
						Authorization: "Bearer" + localStorage.getItem("token")
					}
				})
				.then(res => {
					this.chat_list = res.data;
					this.receiver_user = user;
					this.receiver_id = this.sender_id;
					console.log("chat data " + res.data);
					$('.card').removeClass('direct-chat-contacts-open');

					$("#direct-chat-parent").animate({ scrollTop: $(document).height()+10000 }, 3000);
					return false;	
						
				}).catch(err => {
					console.log(err);
				});
			},

			//Lấy user đang online
			user_list () {
				axios.get(this.$host_url+'/users/list')
				.then(res => {
					console.log(res);
					this.users = res.data;
					this.numbernewmess = 0;
					res.data.map(item => {
						if (item.key) {
							this.numbernewmess++;
						};
					});
					$('.badge-danger').text(this.numbernewmess);
				}).catch(err => {
					console.log(err);
				});
			},

			// Lấy thông tin user 
			auth_user_data () {
				axios.get(this.$host_url+'/auth/user/'+localStorage.getItem("user_id"), {
					headers: {
						Authorization: "Bearer" + localStorage.getItem("token")
					}
				})
				.then(res => {
					this.auth_user = res.data;
				}).catch(err => {
					console.log(err);
				});
			},
		},
		mounted () {
			//call this methods
			this.auth_user_data();
			this.user_list();
			socket.on("chat-message", data => {
				console.log("socket data" + data);
				if (this.sender_id == data.receiver_id) {
					this.chat_list.push({
						message: data.message,
				          // send_from: data.send_from
				          sender_id: data.sender_id,
				          send_from: data.send_from,
				          receiver_id: data.receiver_id
				          // type: 1,
				          // by: data.user
				      });
				}

				$("#direct-chat-parent").animate({ scrollTop: $(document).height()+10000 }, 1000);
					return false;
				console.log("sock rec=" + this.receiver_id);
	      // this.typing = false;
	  });
		}
	}
</script>