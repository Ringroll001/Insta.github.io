<div class="modal fade" id="category-modal-{{ $category->id }}"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h2 class="h3 text-danger"><i class="fa-solid fa-trash"></i></i>Delete Category</h2>
            </div>

            <div class="modal-body">
                    <p>Are you sure you want to delete category {{ $category->name}} ?</p>
                    
                    
                        <div class="text-end"> 
                            <form action="{{ route('admin.categories.destroy', $category->id ) }}" method="post">
                            @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>                           
                                <button type="submit" class="btn btn-danger btn-sm">Unhide</button>
                            </form>                  
                        </div>
                    
            </div>
        </div>
    </div>
</div>