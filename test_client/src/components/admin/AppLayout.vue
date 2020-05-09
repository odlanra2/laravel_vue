<template>
  <div>
  	<nav>
       <div class="d-flex justify-content-center">
           <ul  class="menu-desk">
             <li class="wow fadeInLeft" ><a><router-link to="productos">Productos</router-link></span></a></li>
             <li class="wow fadeInLeft" ><a><router-link to="admin">Categorias</router-link></span></a></li>
             <li class="wow fadeInLeft" ><a><router-link to="admin">Usuarios</router-link></span></a></li>
             <li class="wow fadeInLeft" ><a><router-link to="admin">Configuracion</router-link></span></a></li>
             <li class="wow fadeInLeft" ><a  @click="cerrar()"><router-link to="admin">salir</router-link></a></li>
           </ul>
     </div>

    </nav>

  	 <div class="cerrar"><p @click="cerrar()">Cerrar session</p></div>
     <div class="container">
        <router-view/>
     </div>
  </div>
 
</template>

<script>
export default{
 name: 'AppLayout',
  data () {
    return {
     

    }
  },

  methods:{
  	cerrar(){
  		this.$store.dispatch('AUTH_LOGOUT').then(()=>{
          this.$router.push('/')
  		}).catch(err=>{
  			this.error = true

  		});
  	}
  }


};

</script>
<style>
body{
	margin:0;
}
.menu-desk{
  margin-top:40px;
}

nav {
    position: fixed;
    z-index: 1000;
    /* right: -200px; */
    background: #852fbe;
    color: black;
    padding: 20px;
    cursor: pointer;
    
    /* margin-top: 60px; */
    height: 100vh;
    transition: all 0.5s ease-out;

}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

ul.menu-desk li a {
    position: relative;
    color: white;
    margin: 0px 15px;
    text-align: center;
}

.cerrar{
	position:absolute;
	right:0;
	cursor:pointer;
}

</style>	