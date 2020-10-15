<template>
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#carModal">
                Ajouter
            </button>
        </div>


         <div class="modal fade bd-example-modal-lg" id="carModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Gestion De Véhicule</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Nom</label>
                                <input type="text" class="form-control" v-model="name" id="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="matricule" class="col-form-label">matricule</label>
                                <input type="text" class="form-control" v-model="matricule" id="matricule">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cv" class="col-form-label">CV</label>
                                <input type="number" class="form-control" v-model="cv" id="cv">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="color" class="col-form-label">Color</label>
                                <input type="text" class="form-control" v-model="color" id="color">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_achat" class="col-form-label">Date Achat</label>
                                <input type="date" class="form-control" v-model="date_achat" id="date_achat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categorie_id" class="col-form-label">Catégorie</label>
                                <select class="form-control" v-model="categorie_id" id="categorie_id">
                                    <option disabled selected value>categorie ....</option>
                                    <option v-for="cat in categoriesList" v-bind:key="cat.id" :value="cat.id">{{cat.title}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="button" @click="addCar" data-dismiss="modal" class="btn btn-primary">Validé</button>
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
                name : "", date_achat : '', categorie_id : '', cv : '', car_photo_path : 'default', matricule : '', color : ''
            }            
        },
        props : ['categoriesList'], 
        methods : {
            addCar(){
                axios.post('/api/storeCar',{
                    name:this.name, date_achat:this.date_achat, categorie_id:this.categorie_id,
                     cv:this.cv, car_photo_path:this.car_photo_path, matricule:this.matricule,
                     color:this.color})
                .then(response => this.$emit('car-added', response))
                .catch(error => console.log(error));
            }
        }
    }
</script>