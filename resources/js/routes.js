import about from './components/about.vue';
import addCart from './components/addCart.vue';

export const routes = [
    {
        name: '/vue',
        path: '/vue',
        component: about
    },
    {
        name: 'add',
        path: '/add',
        component: addCart
    }
];