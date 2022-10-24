<template>
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                     src="img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" id="#app">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ToDoList</h1>

                        <router-link class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" to="/createToDoList">Add ToDoList</router-link>
                    </div>
                    <div class="row">
                        <div class="col-2 text-center">
                            <p class="bg-remain form-rounded  text-white text-center">
                                <span class="mx-1 bg-danger rounded-circle">{{Remaining}}</span>
                                Remaining</p>
                        </div>
                        <div class="col-2 text-center" >
                            <p class="bg-com form-rounded text-white">
                                <span class="mx-1 bg-success rounded-circle">{{completed}}</span>
                                completed</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table ">
                                <tbody>
                                <template v-for="List in Lists" :key="List.id">
                                    <tr>
                                        <td>
                                            <input type="checkbox" v-if="List.status === 1" checked disabled>
                                            <input type="checkbox" v-else disabled  class="">
                                        </td>
                                        <td>
                                            <del v-if="List.status === 1"> {{List.title}}</del>
                                            <p v-else>  {{List.title}}</p>

                                        </td>
                                        <td class="text-center">
                                            <div v-if="List.status === 1" class="badge bg-success text-center text-wrap form-rounded" style="width: 6rem;">
                                                <span class="text-center">{{List.date}}</span>
                                            </div>
                                            <div v-else class="badge bg-danger text-center text-wrap form-rounded" style="width: 6rem;">
                                               <router-link class="text-center" :to="{name: 'toDoList-edit', params: { id: List.id }}"><span class="text-center">{{List.date}}</span></router-link>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from "axios";

export default {
    name: "ToDoListComponent",
    data(){
        return{
            Lists:[],
            Remaining:"",
            completed:"",
            showModal: true
        }
    },
    mounted() {
        this.getPosts()
    },methods:{
        async getPosts(){
            await axios.get('api/ToDoList').then(response=>{
                this.Lists =response.data.data;
                this.completed =response.data.completed;
                this.Remaining =response.data.Remaining;
            }).catch(error=>{

            });
        }
    }
}

</script>

<style scoped>
.form-rounded {
    border-radius: 1rem;
    width: 200px;
    height: 30px;
}
.bg-com{
    background-color: #A3D7A7;
}
.bg-remain{
    background-color: #EE9999;
}

</style>
