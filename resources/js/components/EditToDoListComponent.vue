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

                        <router-link class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" :to="{name:'toDoList'}">Back ToDoList</router-link>
                    </div>
                    <div class="row">
                        <div v-if="errors">
                            <div v-for="(v, k) in errors" :key="k" class="">
                                <p v-for="error in v" :key="error" class="text-sm text-danger">
                                    {{ error }}
                                </p>
                            </div>
                        </div>
                        <form class="space-y-6" @submit.prevent="UpdateList">
                            <div class="col-6 row justify-content-center">

                                <div class="col-12">
                                    <input type="checkbox" name="status" id="status"
                                           class="me-2" v-model="List.status" >
                                    <label for="status" class="block text-sm font-medium text-gray-700">Mark As A Complete</label>

                                </div>

                                <div class="col-12 ">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                    <div class="mt-1">
                                        <input type="text" name="title" id="title"
                                               class="form-control"
                                               v-model="List.title">
                                    </div>
                                </div>

                                <div class="col-12 ">
                                    <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                                    <div class="mt-1">
                                        <input type="text" name="notes" id="notes"
                                               class="form-control"
                                               v-model="List.notes">
                                    </div>
                                </div>

                                <div class="col-12 ">
                                    <label for="date" class="block text-sm font-medium text-gray-700">date</label>
                                    <div class="mt-1">
                                        <input type="date" name="date" id="date"
                                               class="form-control"
                                        v-model="List.date">
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                    class="btn btn-success m-3">
                                Update
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "EditToDoListComponent",
    data(){
        return{
            List:{
                title:"",
                notes:"",
                date:"",
                status:"",
                __method:"patch",
            },
            errors:[]
        }
    },
    mounted() {
        this.getPost()
    },methods:{
        async getPost(){
            await axios.get('api/ToDoList/'+this.$route.params.id).then(response=>{
                const data =response.data.data;
                this.List.title = data.title
                this.List.notes = data.notes
                this.List.date = data.date
                this.List.status = data.status
                console.log(this.List);
            }).catch(error=>{
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors
                }
            });
        },
        async UpdateList(){
            await axios.put('api/ToDoList/'+this.$route.params.id,this.List).then(response=>{
                this.$router.push({name: 'toDoList'});
            }).catch(error=>{
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors
                }
            });
        }
    }
}
</script>

<style scoped>

</style>
