<template>

  <div class="row justify-content-center">
      
    <div class="col-md-9">
    <div class="card bg-light text-black mb-3">
      <div class="card-body">
        <h5 class="card-title">Titulo comentarios</h5>
        
        <form accion="" v-on:submit.prevent="nuevoComentario()">
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
  
</template>

<script>
    export default {
        data() {
          return {
            descripcion: ''
          }
        },

        mounted() {
            console.log('Componente Agregar comentario.')
        },

        methods: {
          nuevoComentario(){
            const params = {
              descripcion: this.descripcion
            };

            this.descripcion = '';
            axios.post('/comentarios', params)
            .then((response) => {
              const comentario = response.data;
              this.$emit('nuevo', comentario);
            });
            
            
          }
        }
    }
</script>