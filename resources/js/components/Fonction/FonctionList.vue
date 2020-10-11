<template>
    <div>
        
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Gestion Des Fonctions</h6>
                <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <add-fonction @fonction-added="refresh"></add-fonction>
                <edit-fonction @fonction-updated="refresh" v-bind:fonctionToEdit="fonctionToEdit"></edit-fonction>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" v-model="q" style="padding:5px;margin:5px;" placeholder="recherche fonction ..." />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Libelle</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>                   
                                        <tr v-for="fct in fonctions.data" v-bind:key="fct.id">
                                            <td>{{fct.id}}</td>
                                            <td>{{fct.title}}</td>
                                            <td> 
                                                <a href="" class="btn btn-warning" @click="getFonction(fct.id)" data-toggle="modal" data-target="#editFonctionModal">Modifier</a> 
                                                <a href="" class="btn btn-danger" @click.prevent="deleteFonction(fct.id)" >Supprimer</a> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <!-- <pagination :data="cats" @pagination-change-page="getResults"></pagination> -->
                                <pagination :data="fonctions" @pagination-change-page="getFonctions">
                                    <span slot="prev-nav">&lt; Previous</span>
                                    <span slot="next-nav">Next &gt;</span>
                                </pagination>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
export default {
    data () {
        return{
            fonctions :{},
            fonctionToEdit : '',
            q : ''
        }
    },
    created(){
        this.getFonctions();
    },
    methods : {
        getFonctions(page = 1) {
            axios.get('/api/fcts?page=' + page)
            .then(response => {
                this.fonctions = response.data;
            });
        },
        getFonction(id){
            axios.get('/fonction/' + id + '/edit')
            .then(response => this.fonctionToEdit = response.data )
            .catch(error => console.log(error));
        },
        deleteFonction(id){
            if(confirm('Are you sure?')) {
                axios.delete('/fonction/' + id + '/delete')
                .then(response => this.fonctions = response.data )
                .catch(error => console.log(error));
            }
        },
        refresh(fcts){
            this.fonctions = fcts.data
        }
    }
}
</script>