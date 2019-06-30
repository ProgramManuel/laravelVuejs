<template>
    <div class="row justify-content-center">
      <div class="col-md-12">
          
        <!--
        -->
        <addcomentario-component @nuevo="addComentario"></addcomentario-component>

        <comentario-component 
            v-for="(comentario, index) in comentarios" 
            :key="comentario.id"
            :comentario="comentario"
            @modificar="modificarComentario(index)"
            @borrar="borrarComentario(index)">
        </comentario-component>
      </div>  
    </div>

</template>

<script>

    /*VueJS*/
    export default {
        data(){
            return {
                comentarios: []
            }
        },

        mounted() {
            axios.get('/comentarios').then((response) => {
                this.comentarios = response.data;
            });
        },

        methods: {
            addComentario(comentario) {
                this.comentarios.push(comentario);
            },
            borrarComentario(index) {
               this.comentarios.splice(index, 1);
            },
            modificarComentario(index, comentario) {
                this.comentarios[index] = comentario;
            }
        }
    }
</script>