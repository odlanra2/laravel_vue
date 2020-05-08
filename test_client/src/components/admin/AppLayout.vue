<template>
  <div>
  	<nav></nav>
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


};

</script>
<style>
body{
	margin:0;
}
nav {
    position: fixed;
    z-index: 1000;
    /* right: -200px; */
    background: #852fbe;
    color: black;
    padding: 20px;
    cursor: pointer;
    width: 100px;
    /* margin-top: 60px; */
    height: 100vh;
    transition: all 0.5s ease-out;

}

</style>	