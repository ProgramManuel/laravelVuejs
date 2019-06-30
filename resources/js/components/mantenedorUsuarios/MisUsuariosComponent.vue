<template>
    <div class="row justify-content-center">
      <div class="col-md-12">
          
        <!--
        -->
        <add-usuario-component @nuevo="addUser"></add-usuario-component>

        <user-component 
            v-for="(user, index) in usuarios" 
            :key="user.id"
            :user="user"
            @modificar="modificarUser(index)"
            @borrar="borrarUser(index)">
        </user-component>
      </div>  
    </div>

</template>

<script>

    /*VueJS*/
    export default {
        data(){
            return {
                usuarios: []
            }
        },

        mounted() {
            axios.get('/user').then((response) => {
                this.usuarios = response.data;
            });
        },

        methods: {
            addUser(comentario) {
                this.usuarios.push(usuario);
            },
            modificarUser(index, comentario) {
                this.usuarios[index] = usuario;
            },
            borrarUser(index) {
               this.usuarios.splice(index, 1);
            }
        }
    }
</script>