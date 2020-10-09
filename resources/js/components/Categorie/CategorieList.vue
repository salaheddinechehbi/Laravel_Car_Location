<template>
<div>
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                Ajouter
            </button>
        </div>


         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter Catégorie</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                      <label for="addTitle" class="col-form-label">Libelle</label>
                      <input type="text" class="form-control" v-model="addTitle" id="addTitle">
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="button" @click="addCat" class="btn btn-primary">Validé</button>
            </div>
          </div>
        </div>
    </div>

    </div>
    <edit-categorie v-bind:categorieToEdit="categorieToEdit"></edit-categorie>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Libelle</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>                   
                            <tr v-for="cat in cats.data" v-bind:key="cat.id">
                                <td>{{cat.id}}</td>
                                <td>{{cat.title}}</td>
                                <td> 
                                    <a href="" class="btn btn-warning" @click="getCat(cat.id)" data-toggle="modal" data-target="#editModal">Modifier</a> 
                                    <a href="" class="btn btn-danger" @click="deleteCat(cat.id)">Supprimer</a> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <!-- <pagination :data="cats" @pagination-change-page="getResults"></pagination> -->
                    <pagination :data="cats" @pagination-change-page="getResults">
                        <span slot="prev-nav">&lt; Previous</span>
                        <span slot="next-nav">Next &gt;</span>
                    </pagination>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    
   
</div>
</template>

<script>
    export default {
        data () {
            return{
                cats : {},
                addTitle : "",
                categorieToEdit : ''
            }            
        },
        created () {
            //this.getCats();
            this.getResults();
            this.addCat()
        },
        methods : {
            //getCats(){axios.get('/api/cats').then(response => {console.log(response.data);this.cats = response.data;}).catch(error => console.log(error));},
            getResults(page = 1) {
			    axios.get('/api/cats?page=' + page)
				.then(response => {
					this.cats = response.data;
				});
            },
            addCat(){
                axios.post('/categorie/store',{title : this.addTitle})
                .then(response => {
                    //console.log(response.data);
                    this.getResults();
                    $('#exampleModal').modal('hide');
                })
                .catch(error => console.log(error));
            },
            getCat(id){
                axios.get('/categorie/'+ id +'/edit/')
                .then(response => this.categorieToEdit = response.data.title )
                .catch(error => console.log(error))
            },
            deleteCat(id){
                axios.delete('/categorie/' + id + '/delete')
                .then(response => this.getResults())
                .catch(error => console.log(error));
            }
        },
        mounted(){
            console.log('Hello From Component');
        }
    }
</script>