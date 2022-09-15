require('./bootstrap');


    import Vue from 'vue';
    import VueRouter from 'vue-router'; // importiamo la libreria vue-router


    import App from './views/App.vue';

    // importiamo tutti i componenti delle pagine
    import HomePage from './pages/HomePage.vue';

    // definiamo le rotte
    const routes = [
        {
            path: '/',
            name: 'home',
            component: HomePage,
        },

        // {
        //     path: '/percorso/url/:parametro',
        //     name: 'nomeRotta',
        //     component: PageName,
        //     props: true, // se il parametro lo volete usare come una prop altrimenti è più difficile da recuperare
        // },

        // definite anche gli altri
        // {
        //     path: '*',
        //     name: 'page404',
        //     component: Page404,
        // }
    ]

    // costruiamo il nostro router
    const router = new VueRouter({
        routes,
        mode: 'history', // per non avere l'hashtag nell'url ma richiede l'impostazione corretta del server
    });


    Vue.use(VueRouter); // diciamo a Vue di usare il plugin vue-router

    const app = new Vue({
        el: '#root',
        render: h => h(App),
        router, // diciamo a vue di inizializzare la nostra app usando il router che abbiamo costruito
    });



