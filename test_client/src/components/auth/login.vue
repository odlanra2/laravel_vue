<template>
  <div>
  	<h2>Bienvenido</h2>
    <form @submit.prevent="login"  name="login">
      
      <div class="form-group">
        <div class="input-group">
          <label class="control-label" for="user">
            {{'email'}}
          </label>
          <i class="bar"/>
          <input type="text" id="user" v-model="user"   required="required" name="user"/>
         
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <label class="control-label" for="password">
            {{'password'}}
          </label>
          <i class="bar"/>
          <input type="password" id="password"  v-model="pwd"   required="required" name="password" autocomplete="on"/>
         
        </div>
      </div>
      <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between down-container">
      <button class="btnn btn-primary"  >
          Ingresar
       </button>
       <div class="loading" >
       </div>
       
      </div>
    </form>
    

  </div>
</template>

<script>

export default {
  name: 'login',
  data () {
    return {
      user: '',
      pwd: '',
      error: false,
      imagen: null,
      mnsj:'',
      btn:false,
      id:false

    }
  },

  methods:{
  	login(){
  		this.$store.dispatch('AUTH_REQUEST', {email:this.user, password:this.pwd}).then(()=>{
               console.log('login exitoso');
  		}).catch(err=>{
  			this.error = true

  		});
  	}
  },

  created(){
  	console.log(this.$store.state);
  }
};

</script>	