

require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/*VUE COMENTARIOS*/
Vue.component('miscomentarios-component', require('./components/mantenedorComentario/MisComentariosComponent.vue').default);
Vue.component('addcomentario-component', require('./components/mantenedorComentario/AddComentarioComponent.vue').default);
Vue.component('comentario-component', require('./components/mantenedorComentario/ComentarioComponent.vue').default);

/* VUE USER */
Vue.component('mis-usuarios-component', require('./components/mantenedorUsuarios/MisUsuariosComponent.vue').default);
Vue.component('add-usuario-component', require('./components/mantenedorUsuarios/AddUsuarioComponent.vue').default);
Vue.component('user-component', require('./components/mantenedorUsuarios/UserComponent.vue').default);


const app = new Vue({
    el: '#app'
});
