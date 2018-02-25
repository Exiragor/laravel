
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// require('./views');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.component('history_table', require('./components/history_table.vue'));
// Vue.component('winners_table', require('./components/winners_table.vue'));
// Vue.component('bets_options', require('./components/bets_options.vue'));

Vue.component('lottery', require('./components/lottery.vue'));

const app = new Vue({
    el: '#app'
});

