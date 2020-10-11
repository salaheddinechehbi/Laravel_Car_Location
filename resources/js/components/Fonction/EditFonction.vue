<template>
    <div class="modal fade" id="editFonctionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modifier Catégorie</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                      <label for="editFonctionTitle" class="col-form-label">Libelle</label>
                      <input type="text" v-model="fonctionToEdit.title" class="form-control" id="editFonctionTitle">
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal" @click="updateFonction">Enregister</button>
            </div>
          </div>
        </div>
    </div>
</template>
<script>
export default {
    props : ['fonctionToEdit'],
    methods : {
        updateFonction(){
            axios.put('/fonction/' + this.fonctionToEdit.id + '/edit', {title : this.fonctionToEdit.title})
            .then(response => this.$emit('fonction-updated', response))
            .catch(error => console.log(error));
        }
    }
}
</script>