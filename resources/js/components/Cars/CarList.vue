<template>

    <div>
        
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Gestion Des Véhicules</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <add-car @car-added="refresh" v-bind:categoriesList="categoriesList"></add-car>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" style="padding:5px;margin:5px;" placeholder="recherche categorie ..." />
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-12">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Libelle</th>
                                            <th>Color</th>
                                            <th>Matricule</th>
                                            <th>Categorie</th>
                                            <th>CV</th>
                                            <th>Date Achat</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>                   
                                        <tr v-for="car in cars.data" v-bind:key="car.id">
                                            <td>{{car.name}}</td>
                                            <td>{{car.color}}</td>
                                            <td>{{car.matricule}}</td>
                                            <td>{{car.categorie.title}}</td>
                                            <td>{{car.cv}}</td>
                                            <td>{{car.date_achat}}</td>
                                            <td> 
                                                <a href="" class="btn btn-outline-info" >Modifier</a> 
                                                <a href="" class="btn btn-outline-danger" >Supprimer</a> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination :data="cars" @pagination-change-page="getCars">
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
                cars : {},
                carToEdit : '',
                q : '',
                categoriesList : {}
            }            
        },
        created () {
            this.getCars();
            this.getCats();
        },
        methods : {
            getCars(page = 1) {
			    axios.get('/api/cars?page=' + page)
				.then(response => {
					this.cars = response.data;
				});
            },
            getCats(){
                axios.get('/api/categories')
                .then(response => this.categoriesList = response.data)
                .catch(error => console.log(error));
            },
            refresh(carss){
                this.cars = carss.data;
            }
        },
        mounted(){
            console.log('Hello From Component');
        }
    }
</script>