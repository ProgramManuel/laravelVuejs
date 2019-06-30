<template>
    
<div class="row justify-content-center">
    <div class="col-md-9">
        
    <div class="card bg-light text-black mb-3">
        <div class="card-body">
            <h5 class="card-title">Publicado el día: {{ comentario.created_at }}</h5>

                <div class="form-group">       
                    <input v-if="modoEditar" type="text" class="form-control" v-model="comentario.descripcion">
                    <p v-else>{{ comentario.descripcion }}</p>

                    <small id="timecoment" class="form-text text-muted">Agregado hace .... 3 minutos</small>
                </div>
        </div>
        <div class="card-footer">
            <button v-if="modoEditar" class="btn btn-primary bg-success text-white" v-on:click="onClickModificar()">
                Guardar Cambios
            </button>
            <button v-else class="btn btn-primary bg-secondary text-white" v-on:click="onClickEditar()">
                Editar
            </button>
            
            <button class="btn btn-primary bg-danger text-white" v-on:click="onClickBorrar()">
                Eliminar
            </button>
        </div>
    </div>
    </div>
</div>
</template>

<script>
    export default {
        props: ['comentario'],
        data(){
            return {
                modoEditar: false
            };
        },
        
        mounted() {
            console.log('Componente COMENTARIO.')
        },
        methods: {
            onClickBorrar(){
                axios.delete(`/comentarios/${this.comentario.id}`).
                then(() => {

                    this.$emit('borrar');
                });
            },
            onClickEditar(){              
                this.modoEditar = true;
            },
            onClickModificar(){
                const params = {
                    descripcion: this.comentario.descripcion
                };

                axios.put(`/comentarios/${this.comentario.id}`, params).
                then((response) => {
                    this.modoEditar = false;
                    const comentario = response.data;
                    this.$emit('modificar', comentario);
                });
            }
        }
    }
</script>