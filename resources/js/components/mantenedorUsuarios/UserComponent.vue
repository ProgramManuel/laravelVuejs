<template>

<div class="row mt-3">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Accion</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <button v-if="modoEditar" class="btn btn-primary bg-success text-white" v-on:click="onClickModificar()">
                            Guardar Cambios
                        </button>
                        <button v-else class="btn btn-primary bg-secondary text-white" v-on:click="onClickEditar()">
                            Editar
                        </button>
                        
                        <button class="btn btn-primary bg-danger text-white" v-on:click="onClickBorrar()">
                            Eliminar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

 <!--
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
-->  
</template>

<script>
    export default {
        props: ['user'],
        data(){
            return {
                modoEditar: false
            };
        },
        
        mounted() {
            console.log('Componente User.')
        },
        methods: {
            onClickBorrar(){
                axios.delete(`/user/${this.user.id}`).
                then(() => {

                    this.$emit('borrar');
                });
            },
            onClickEditar(){              
                this.modoEditar = true;
            },
            onClickModificar(){
                const params = {
                   // descripcion: this.comentario.descripcion
                };

                axios.put(`/user/${this.user.id}`, params).
                then((response) => {
                    this.modoEditar = false;
                    const user = response.data;
                    this.$emit('modificar', user);
                });
            }
        }
    }
</script>