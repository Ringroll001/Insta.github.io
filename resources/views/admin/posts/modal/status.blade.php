<div class="modal fade" id="delete-modal-{{ $post->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h2 class="h3 text-danger"><i class="fa-solid fa-user-large-slash" ></i>Hide</h2>
            </div>

            <div class="modal-body">
                    <p>Are you sure you want to delete this post?</p>
                    <img src="{{$post->image}}" alt="{{$post->id}}" class="img-thumbnail  me-3">
                    <p>{{ $post->description}}</p>
                    <form action="{{ route('admin.posts.hide', $post->id )}}" method="post">
                        @csrf
                            @method('DELETE')
                        <div class="text-end"> 
                        <button class="btn btn-outline-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>                           
                        <button type="submit" class="btn btn-danger btn-sm">Hide</button>                   
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activate-modal-{{ $post->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-primary">
            <div class="modal-header border-primary">
                <h2 class="h3 text-primary"><i class="fa-solid fa-user me-2"></i></i>Unhide Post</h2>
            </div>

            <div class="modal-body">
                    <p>Are you sure you want to unhide?</p>
                    <img src="{{$post->image}}" alt="{{$post->id}}" class="img-thumbnail  me-3">
                    <p>{{ $post->description}}</p>
                    <form action="{{ route('admin.posts.unhide', $post->id )}}" method="post">
                        @csrf
                            @method('PATCH')
                        <div class="text-end"> 
                        <button class="btn btn-outline-primary btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>                           
                        <button type="submit" class="btn btn-primary btn-sm">Unhide</button>                   
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>