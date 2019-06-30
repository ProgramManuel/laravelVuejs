<template>

<div class="row justify-content-center">
    <form>
      <div class="row ">
          <div class="col">
            <h5>Registro de usuario:</h5>
          </div>
        </div>

      <div class="row">
          <div class="col">
              <input type="text" class="form-control" placeholder="Nombre y Apellido.">
          </div>
          <div class="col">
            <input type="email" class="form-control" placeholder="Email">
          </div>
      </div>

        <div class="row">
          <div class="col">
              <input type="password" class="form-control" placeholder="Contraseña.">
          </div>
          <div class="col">
            <input type="password" class="form-control" placeholder="Repetir contraseña">
          </div>
        </div>

        <div class="row">
          <form accion="" v-on:submit.prevent="nuevoUser()">
          <div class="form-group">
            <label for="comentario">¿Qué estás pensando ahora?</label>
            <input type="text" class="form-control" name="comentario" placeholder="Ingresa algún comentario." v-model="descripcion">
          </div>
          
          <button type="submit" class="btn btn-primary">Agregar comentario</button>
        </form>
        </div>


      <div class="row justify-content-center">
        <button>Guardar Registro</button>
      </div>
    </form>
  </div>

<!--
  <div class="row justify-content-center">
      
    <div class="col-md-9">
    <div class="card bg-light text-black mb-3">
      <div class="card-body">
        <h5 class="card-title">Titulo comentarios</h5>
        
        <form accion="" v-on:submit.prevent="nuevoUser()">
          <div class="form-group">
            <label for="comentario">¿Qué estás pensando ahora?</label>
            <input type="text" class="form-control" name="comentario" placeholder="Ingresa algún comentario." v-model="descripcion">
          </div>
          
          <button type="submit" class="btn btn-primary">Agregar comentario</button>
        </form>

      </div>
    </div>

    </div>
   </div>
-->
  
</template>

<script>
    export default {
        data() {
          return {
            //descripcion: ''
          }
        },

        mounted() {
            console.log('Componente Agregar usuario.')
        },

        methods: {
          nuevoUser(){
            const params = {
              //descripcion: this.descripcion
            };

            //this.descripcion = '';
            axios.post('/user', params)
            .then((response) => {
              const user = response.data;
              this.$emit('nuevo', user);
            });
            
            
          }
        }
    }
</script>