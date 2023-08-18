<div class="modal fade" id="delete-modal-{{ $user->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h2 class="h3 text-danger"><i class="fa-solid fa-user-large-slash" ></i>Deactivate User</h2>
            </div>

            <div class="modal-body">
                    <p>Are you sure you want to deactivate <span class="fw-bold"> {{ $user->name }}</span>?</p>
                    <form action="{{ route('admin.users.deactivate', $user->id )}}" method="post">
                        @csrf
                            @method('DELETE')
                        <div class="text-end"> 
                        <button class="btn btn-outline-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>                           
                        <button type="submit" class="btn btn-danger btn-sm">Deactivate</button>                   
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activate-modal-{{ $user->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h2 class="h3 text-success"><i class="fa-solid fa-user me-2"></i></i>Activate User</h2>
            </div>

            <div class="modal-body">
                    <p>Are you sure you want to activate <span class="fw-bold"> {{ $user->name }}</span>?</p>
                    <form action="{{ route('admin.users.activate', $user->id )}}" method="post">
                        @csrf
                            @method('PATCH')
                        <div class="text-end"> 
                        <button class="btn btn-outline-success btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>                           
                        <button type="submit" class="btn btn-success btn-sm">Activate</button>                   
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>