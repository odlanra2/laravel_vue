<template>
   <div >
   	 <h2 class="title">Administrador</h2>
     <div>
        <b-button v-b-modal.modal-1>Añadir categorias +</b-button>

        <b-modal id="modal-1" ref="my-modal" title="Categorias">
            <form  @submit.prevent="crear">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre de la categoria</label>
                  <input type="text" class="form-control" id="nom" v-model="nombre"  placeholder="nombre de la categoria">
                 
                </div>
                <div class="form-group">
                  <label for="">Añadir imagen para la categoria</label>
                  <input type="text" class="form-control" id="img" v-model="imagen"  placeholder="Descripcion">
                 

                </div>
                 <div class="form-group">
                  <label for="">Categoria padre</label>
                  <select  class="form-control"  @change="onChange($event)">
                      <option :value="'0'">seleccione la categoria padre</option>
                      <option
                        v-for="(row, index) in AllCategoria"
                        :key="index"
                        :value="row.id"

                      >
                         {{row.nombre}}
                      </option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </b-modal>
     </div>
    <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>foto</th>
            <th>Categoria padre</th>
            <th>Acciones</th>
            
            
        </tr>
    </thead>
    <tbody>
      <tr v-for="(row, index) in AllCategoria">
        <td>{{ row.nombre }}</td>
        <td>{{ row.foto }}</td>
        <td>{{ row.categoria_padre}}</td>
        <td><button class="btn btn-primary">Editar</button></td>
        <td><button class="btn btn-primary">Eliminar</button></td>
        
      </tr>
    </tbody>
</table>
  
</div>
 
</template>

  <script>
  import TestServices from '../../services/TestServices'
   export default {
      name: 'admin',

      data(){
      	return {
           nombre: '',
           imagen: '',
           categoria_id: '0',
           AllCategoria:[]

      	}
      },

     computed:{
          All:function(){
            return this.AllCategorias();
          }  
     },

     methods:{
      hideModal() {
       this.$refs['my-modal'].hide()
      },

      onChange(event) {
            console.log(event.target.value)
            this.categoria_id=event.target.value
        },
      crear(){
         TestServices.post('categoria/created', {nombre:this.nombre, foto:this.imagen, categoria_padre:this.categoria_id}).then(res=>{
             this.nombre=''
             this.imagen=''
             this.categoria_id=''

             this.hideModal()
             this.AllCategorias()
          })
       },

       AllCategorias(){
         TestServices.get('categoria/get').then(res=>{
               console.log(res.data);
               this.AllCategoria = res.data;
              
           })
       }
     },

     created(){
  	     this.AllCategorias()
         //console.log(this.$store.state);
     }
   };
</script>

<style>
  table{
    margin-top:40px;
  }

  .modal-footer{
    display:none !important;
  }

  .container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: 0 !important;
    margin-left: auto;
}
</style>
