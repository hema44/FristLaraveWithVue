require("bootstrap")
require('alpinejs');

import { createApp } from 'vue';
import router from "./router";


import ToDoListComponent from "./components/ToDoListComponent";

createApp({
    components:{
        ToDoListComponent
    }
}).use(router).mount('#app');

