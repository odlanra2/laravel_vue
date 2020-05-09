<template>
  <div class="container">
  	
    <center class="container col-6 marg">
      <h2 >Bienvenido</h2>
       <form @submit.prevent="login"  name="login">
      
      <div class="form-group">
        <div class="input-group">
          
          <i class="bar"/>
          <input type="text" class="form-control" id="user" v-model="user"   required="required" name="user" placeholder="usuario" />
         
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
         
          <i class="bar"/>
          <input type="password" class="form-control" id="password"  v-model="pwd"   required="required" name="password" autocomplete="on" placeholder="password"/>
         
        </div>
      </div>
      <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between down-container">
      <button class="btnn btn-primary" >
          Ingresar
       </button>
       <div class="loading"  v-if="status==='loading'" >
         <p>Espere por favor ...</p>
       </div>
        <div class="loading"  v-if="status==='error'" >
           <p>usuario y contraseña incorrecta</p>
       </div>
       <div class="loading"  v-if="status==='success'" >
           <p>correcto</p>
       </div>
       
      </div>
    </form>

    </center>
   
    

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

  computed:{
  	status:function(){
  		return this.$store.state.login.status
  	}
  },

  methods:{
  	login(){
  		this.$store.dispatch('AUTH_REQUEST', {email:this.user, password:this.pwd}).then(()=>{
          this.$router.push('/admin/admin')
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
<style>
.marg{
  position: absolute;
  margin:0 auto;
  margin-top:50px;
}
</style>