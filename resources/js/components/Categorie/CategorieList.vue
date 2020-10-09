<template>
<div>
    <add-categorie @cat-added="refresh"></add-categorie>
    <edit-categorie @cat-updated="refresh" v-bind:categorieToEdit="categorieToEdit"></edit-categorie>
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
                                    <a href="" class="btn btn-danger" @click.prevent="deleteCat(cat.id)">Supprimer</a> 
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
                //addTitle : "",
                categorieToEdit : ''
            }            
        },
        created () {
            this.getResults();
        },
        methods : {
            getResults(page = 1) {
			    axios.get('/api/cats?page=' + page)
				.then(response => {
					this.cats = response.data;
				});
            },
            //addCat(){ axios.post('/categorie/store',{title : this.addTitle}).then(response => { this.getResults();$('#exampleModal').modal('hide');}).catch(error => console.log(error));},
            getCat(id){
                axios.get('/categorie/'+ id +'/edit')
                .then(response => this.categorieToEdit = response.data )
                .catch(error => console.log(error))
            },
            deleteCat(id){
                if(confirm('Are you sure?')) {
                    axios.delete('/categorie/' + id + '/delete')
                    .then(response => this.cats = response.data)
                    .catch(error => console.log(error));
                }
            },
            refresh(cate){
                this.cats = cate.data
            }
        },
        mounted(){
            console.log('Hello From Component');
        }
    }
</script>