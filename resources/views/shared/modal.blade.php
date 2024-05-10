<!-- Modal delete -->
@foreach ($properties as $property)
<form id="deleteForm_{{ $property->id }}" action="{{ route('admin.property.destroy', $property) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('delete')
    <div class="modal fade" id="confirmModal_{{ $property->id }}" tabindex="-1" aria-labelledby="confirmModalLabel" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer <b>{{ $property->title }}</b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                    <button type="submit" class="btn btn-danger" id="confirmDeleteButton">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
<script>

function showConfirmModal(propertyId) {
    let modalId = 'confirmModal_' + propertyId;
    let modal = new bootstrap.Modal(document.getElementById(modalId), {});
    modal.show();
}

</script>
