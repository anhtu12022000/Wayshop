<template>
  <div class="content-wrapper">
  <v-snackbar v-model="snackbar">
  {{ text }}
  <v-btn color="red" text @click="snackbar = false"><v-icon>mdi-close-circle-outline</v-icon></v-btn>
</v-snackbar>
     <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Email Ads</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Email Ads</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>
    <div id="ads">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card modalemail" style="margin-top: 20px;">
                <div class="card-header">
                  <div style="display:flex; justify-content: space-between;">
                    <h2>Email List</h2>
                    <a id="create_form_icon" href="javascript:void(0)" 
                    class="btn btn-lg btn-primary" 
                    @click="openModal"
                    >
                    <i class="plus icon"></i>Send Email
                  </a>
                </div>
              </div>
              <div style="">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Date Added</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id">
                      <td style="width: 33%">{{user.name}}</td>
                      <td style="width: 43%">{{user.email}}</td>
                      <td style="width: 23%">{{ user.created_at }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card modalemail" style="margin-top: 30px;">
              <div class="card-header">
                <h2>Sent Messages</h2>
              </div>
              <div style="margin-top: 20px;">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Body</th>
                      <th>Image</th>
                      <th>Delivered</th>
                      <th>Sent Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="message in messages" :key="message.id">
                      <td style="width: 15%">{{message.title}}</td>
                      <td style="width: 33%">{{message.body}}</td>
                      <td style="width: 10%"><img v-if="message.photo != ``" width="100%" :src="`admin_assets/dist/img/`+message.photo" :alt="message.title">
                        <span v-else>Image null</span></td>
                      <td style="width: 10%">{{message.delivered}}</td>
                      <td style="width: 15%">{{ message.send_date }}</td>
                      <td style="width: 5%"> <v-btn @click="delMail(message.id)" class="ma-2" color="red" dark>Del
                        <v-icon dark right>mdi-delete-empty-outline</v-icon>
                      </v-btn></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>


            <!-- The Modal -->
            <div class="modal fade" id="create_form_modal" tabindex="-1" role="dialog" 
            aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"  id="addNewLabel">Send Email</h5>
                  <button type="button" class="close" data-dismiss="modal"
                  aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="sendEmail" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Title of Email</label>
                    <input v-model="title" type="text" name="title" 
                    placeholder="Email Title" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Email body</label>
                    <textarea v-model="body" name="body" id="body" 
                    placeholder="Body of message" class="form-control" rows="5">
                  </textarea>
                </div>
                <div class="form-group">
                  <v-file-input v-model="photo" label="Select File" placeholder="Upload avatar" accept="image/jpg,image/png,image/bmp,image/jpeg" prepend-icon="mdi-camera" />
                </div>
                <div class="form-group">
                  <label style="margin-bottom: 10px;">When to Send:</label>
                  <div class="form-control">
                    <span style="margin-right: 20px;">
                      <input type="radio" name="sending" 
                      value="now" 
                      v-model="item" checked
                      >
                      <label>Send Now</label>
                    </span>
                    <span>
                      <input type="radio" name="sending" 
                      value="later" 
                      v-model="item"
                      >
                      <label>Send Later</label>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-control" v-if="item === 'later'">
                <VueCtkDateTimePicker :no-button-now = "true"	 
                v-model="send_date" 
                />
              </div>

              <div class="modal-footer">
                <button
                :disabled="disabled" v-if="loading && item === 'now'"
                type="submit" class="btn  btn-success">
                Sending Email...
              </button>
              <button
              :disabled="disabled" 
              v-if="!loading && item === 'now'"
              type="submit" class="btn  btn-success">
              Send Email
            </button>
            <button  
            v-if="!loading && item === 'later'"
            :disabled="disabled"
            type="submit" 
            class="btn  btn-success"
            >
            Send Later
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
</div>

</div> 
</template>
<style scoped>
.btn {
  margin-right: 10px;
  margin-bottom: 10px;
}

.modalemail {
  z-index: 0;
}

.v-snack:not(.v-snack--absolute) {
    z-index: 9999999999999999999999999999999 !important;
}
</style>
<script>

export default {
  data(){
    return {
      users: [],
      messages: [],
      send_now: true,
      loading: false,
      snackbar: false,
      title: '',
      body: '',
      send_date: '',
      item: 'now',
      text: '',
      photo: null,
    }
  },
  created(){
    this.getUsers();
    this.getMessages();
    console.log('these are the users: ', this.users)
  },
  computed: {
    disabled () {
      return  this.title === '' || !this.title || 
      this.body === '' || !this.body || this.loading || this.photo === '' || !this.photo
    },
  },
  methods: {

    getUsers(){
      axios.get('/get_users').then(res => {
        this.users = res.data;
      })
    },
    getMessages(){
     axios.get('/get_messages').then(res => {
      this.messages = res.data;
    })
   },
   openModal(){
    $('#create_form_modal').modal('show');
  },

  delMail (id) {
    axios.post(`/del_messages/${id}`,).then(res => {
      this.text = res.data;
      this.snackbar = true;
      this.getMessages();
    })
  },

  sendEmail () {
     console.log(this.photo);
    this.loading = true;
    let formData = new FormData();
    formData.append('photo', this.photo, this.photo.name);
    formData.append('title', this.title);
    formData.append('body', this.body);
    formData.append('send_date', this.send_date);
    formData.append('item', this.item);

    axios.post('/notifications', formData, {
      header: {
                "Content-Type": "multipart/form-data",
            }
    })
    .then((resp) => {
      console.log(resp);
      $('#create_form_modal').modal('hide');
      if (this.item == 'now') {
        Swal.fire({
          title: 'Sent!',
          text: 'Email Sent to Users',
          icon: 'success',
          confirmButtonText: 'Cool',
          backdrop: `
            rgba(0,0,123,0.4)
            url("/admin_assets/dist/img/cat.gif")
            left top
            no-repeat
          `,
          })
      } else {
        Swal.fire({
          title: 'Scheduled!',
          text: 'Email Scheduled! To Be Sent Later',
          icon: 'success',
          confirmButtonText: 'Cool',
          backdrop: `
            rgba(0,0,123,0.4)
            url("/admin_assets/dist/img/cat.gif")
            left top
            no-repeat
          `,
          })
      }
      this.title = '';
      this.body = '';
      console.log(resp);
      this.loading = false;
      setTimeout(() => {
        window.location.reload(window.origin + '/');
      }, 5000)
    })
    .catch(error => console.log(error))
  },
}
}
</script>

