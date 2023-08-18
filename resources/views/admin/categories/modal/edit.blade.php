<div class="modal fade" id="update-modal-{{ $category->id }}"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-warning">
            <div class="modal-header border-warning">
                <h2 class="h3 text-warning">Edit Category</h2>
            </div>

            <div class="modal-body">
                    <div class="col">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="name" name="name"  id="name" class="form-control inline-block" value="{{ old('name', $category->name) }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-warning mt-2 text-white"><i class="fa-solid fa-plus me-2"></i>UPDATE</button>
                    </form>
                    </div> 
            </div>
        </div>
    </div>  
</div>    
           
       
       
    

