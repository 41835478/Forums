window.Vue = require('vue');
require('vue-resource');

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
next();
});

Vue.component('access-roles-index', require('./components/access/roles/index.vue'));
Vue.component('access-roles-permissions', require('./components/access/roles/permissions.vue'));
Vue.component('access-roles-create', require('./components/access/roles/create.vue'));
Vue.component('modal', require('../components/modal.vue'));

//console.log(new Errors());
const app = new Vue({
    el: '#app',
});
