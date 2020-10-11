<template>
    <div class="row">
        <div class="col-md-10"></div>
        
        <div class="col-md-2">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#fonctionModal">
                Ajouter
            </button>
        </div>


        <div class="modal fade" id="fonctionModal" tabindex="-1" aria-labelledby="fonctionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="fonctionModalLabel">Gestion De Fonction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                        <label for="fonctionTitle" class="col-form-label">Libelle</label>
                        <input type="text" class="form-control" v-model="fonctionTitle" id="fonctionTitle">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" @click="addFonction" data-dismiss="modal" class="btn btn-primary">Validé</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data () {
        return {
            fonctionTitle : ''
        }
    },
    methods : {
        addFonction(){
            axios.post('/api/storeFonc',{title : this.fonctionTitle})
            .then(response => this.$emit('fonction-added', response))
            .catch(error => console.log(error));
        }
    }
}
</script>