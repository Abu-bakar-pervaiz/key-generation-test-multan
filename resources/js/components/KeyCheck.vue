<template lang="">
  <div>
    <div class="row justify-content-center w-100">
      <div class="col-md-8 col-lg-6 col-xxl-4">
        <div class="card mb-0">
          <div class="card-header">
            <h5>Input Key to Check</h5>
          </div>
          <div class="card-body">
            <Transition name="bounce">
              <ul class="alert alert-danger text-capitalize" v-if="errors.length">
                <li v-for="error in errors">{{ error }}</li>
              </ul>
            </Transition>
            <Transition name="bounce">
              <div class="alert alert-success alert-dismissable fade show text-capitalize" v-if="show">
                {{ show }}
              </div>
            </Transition>
            
            <form @submit.prevent="check" method="POST">
              <div class="mb-3">
                <label for="key" class="form-label">Key (xxxx-xxxx-xxxx)</label>
                <input type="text" v-model="key" class="form-control" name="key" id="key" />
              </div>
              <button
                :disabled="processing"
                type="submit"
                class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"
              >
                Check Key 
                <span class="spinner-border spinner-border-sm mx-2" role="status" v-if="processing" aria-hidden="true"></span>
              </button>
              <p>
                <a href="/login">Login</a> as admin if you have an
                admin account
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';

export default {
  name:'KeyCheck',
  props:['token'],
  data: function(){
    return {
      errors: [],
      key: '',
      show: '',
      processing:false
    }
  },
  methods: {
    check(){

      this.processing = true
      axios.post('/key/check',{
        key: this.key
      }).then( res => {
        this.errors = []
        this.show = res.data.message
        this.key = ''
        this.processing = false
      }).catch( error => {
        this.errors = []
        this.key = ''
        if (error.response.status === 422) {
          const serverErrors = error.response.data.errors
          for (const key in serverErrors) {
            serverErrors[key].forEach( error => {
              this.errors.push(error)
            })
          }
        }
        if (error.response.status === 403) {
          console.log(error.response)
          this.errors.push(error.response.data.message)
        }
        this.processing = false
      })

    }
  }
}
</script>
<style>
.bounce-enter-active {
  animation: bounce-in 0.5s;
}
.bounce-leave-active {
  animation: bounce-in 0.5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.05);
  }
  100% {
    transform: scale(1);
  }
}
</style>