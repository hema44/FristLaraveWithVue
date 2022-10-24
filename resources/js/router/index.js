import  {createRouter , createWebHistory} from "vue-router";

import ToDoListComponent from "../components/ToDoListComponent";
import CreateToDoListComponent from "../components/CreateToDoListComponent";
import EditToDoListComponent from "../components/EditToDoListComponent";

const routes =[
    {
        path:"/",
        name:"toDoList",
        component : ToDoListComponent
    },{
        path:"/createToDoList",
        name:"toDoList-create",
        component : CreateToDoListComponent
    },{
        path:"/editToDoList",
        name:"toDoList-edit",
        component : EditToDoListComponent
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
