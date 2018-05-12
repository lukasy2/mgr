
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));



const app = new Vue({
    el: '#app',

    data: {
        messages: []
    },

    created() {
        this.fetchMessages();
        Echo.private('chat')
            .listen('MessageSent', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
            });

    },
    mounted() {
        this.scrollToEnd();
    },
    updated() {
        this.scrollToEnd();

    },

    methods: {
        scrollToEnd() {
            var container = document.querySelector(".scroll");
            var scrollHeight = container.scrollHeight;
            container.scrollTop = scrollHeight;
        },

        fetchMessages() {
            axios.get('masdasdessages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post('messages11', message).then(response => {
                console.log(response.data);
            });

        },


    },



});

