<template>
   <div >
   	 <h2 class="title">Administrador</h2>
     <div>
        <b-button v-b-modal.modal-1>Añadir Productos +</b-button>
          
        <b-modal id="modal-1" ref="my-modal" title="Productos">
            <form  @submit.prevent="crear" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Nombre </label>
                  <input type="text" class="form-control" id="nom" v-model="nombre"  placeholder="nombre del producto">
                 
                </div>
                 <div class="form-group">
                  <label for="">Descripcion </label>
                  <input type="text" class="form-control" id="nom" v-model="descripcion"  placeholder="Descripcion">
                 
                </div>
                  <div class="form-group">
                  <label for="">Categoria</label>
                  <select  class="form-control" @change="onChange($event)">
                      <option :value="'1'">seleccione la categoria</option>
                      <option
                        v-for="(row, index) in AllCategoria"
                        :key="index"
                        :value="row.id"
                        @click="id_categoria()"
                      >
                         {{row.nombre}}
                      </option>
                  </select>
                </div>
                 <div class="form-group">
                  <label for="">Peso </label>
                  <input type="text" class="form-control" id="peso" v-model="peso"  placeholder="Peso">
                 
                </div>
                <div class="form-group">
                  <label for="">Precio </label>
                  <input type="text" class="form-control" id="peso" v-model="precio"  placeholder="Precio">
                 
                </div>
                <div class="form-group">
                  <label for="">Añadir imagen para el prodducto</label>
                  <input type="text" class="form-control" id="img" v-model="imagen"  placeholder="Descripcion">
                 

                </div>
               
                <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </b-modal>
     </div>

     <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>peso</th>
            <th>precio</th>
            <th>imagen</th>
            <th>categoria</th>
            <th>Acciones</th>
            
            
        </tr>
    </thead>
    <tbody>
        <tr v-for="(row, index) in  AllProductos">
         <td>{{ row.Nombre }}</td>
         <td>{{ row.Descripcion }}</td>
         <td>{{ row.Peso }}</td>
         <td>{{ row.Precio }}</td>
         <td>{{ row.foto }}</td>
         <td>{{ row.categoria_id }}</td>
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
      name: 'productos',

      data(){
      	return {
          nombre:'',
          descripcion:'',
          categoria:'',
          peso:'',
          precio:'',
          imagen:'',
          AllCategoria:[],
          AllProductos:[]
      	}
      },

     computed:{

     },

     methods:{
       
      hideModal() {
       this.$refs['my-modal'].hide()
      },

       id_categoria(){
             console.log('id');
             
       },

        onChange(event) {
            console.log(event.target.value)
            this.categoria=event.target.value
        },

       crear(){
           TestServices.post('productos/created', {nombre:this.nombre, descripcion:this.descripcion, peso:this.peso, categoria_id:this.categoria, precio:this.precio, foto:this.imagen }).then(res=>{
             this.nombre=''
             this.descripcion=''
             this.peso=''
             this.precio=''
             this.imagen

             this.hideModal()
             this.AllProducto()
          })
       },
         AllCategorias(){
         TestServices.get('categoria/get').then(res=>{
               console.log(res.data);
               this.AllCategoria = res.data;
              
           })
       },

       AllProducto(){
           TestServices.get('productos/get').then(res=>{
               console.log(res.data);
               this.AllProductos = res.data;
              
           })
       }

     },

     created(){
  	     this.AllCategorias()
         this.AllProducto()

     }
   };
</script>

<style>
  table{
    margin-top:40px;
  }
  .container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: 0 !important;
    margin-left: auto;
}
 
</style>
