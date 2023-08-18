@extends('layouts.app')

@section('title', 'Admin: Users')

@section('content')

    <table class="table">
        <thead class="table">
            <tr class="table-success">
                <th></th>
                <th></th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>CREATED AT</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        @foreach( $all_users as $user)
        <tbody>
           <tr>
                <td></td>
                <td>
                @if($user->avatar)
                        <img src="{{$user->avatar}}" alt="{{$user->name}}" class="img-thumbnail rounded-circle avatar-md me-3">
                        @else
                        <i class="fa-solid fa-circle-user text-secondary  icon-md me-3 align-middle"></i>
                @endif
                </td>
                <td class="ms-3"> 
                    {{ $user->name }}
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    @if($user->trashed( ))
                    <i class="fa-regular fa-circle text-secondary"></i> &nbsp; Inactive
                    @else    
                <i class="fa-solid fa-circle text-success me-2"></i> &nbsp; Active
                    @endif
               
            </td>
                @if( Auth::user( )->id === $user->id)
                <td></td>
                @else
                <td> 
                    @if( $user->trashed( ))
                    <div class="dropdown">   
                        <a class="btn  text-dark "  href="#" role="button"  data-bs-toggle="dropdown" ><i class="fa-solid fa-ellipsis" ></i></a>
                        <div class="dropdown-menu" >
                            <button class="dropdown-item text-secondary btn" data-bs-toggle="modal" data-bs-target="#activate-modal-{{ $user->id}}"><i class="fa-solid fa-user-large-slash" ></i>Activate {{ $user->name}}</button>
                        </div>
                       
                    </div> 
                    @else
                    <div class="dropdown">   
                        <a class="btn  text-dark "  href="#" role="button"  data-bs-toggle="dropdown" ><i class="fa-solid fa-ellipsis" ></i></a>
                        <div class="dropdown-menu" >
                            <button class="dropdown-item text-danger btn" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $user->id }}"><i class="fa-solid fa-user-large-slash" ></i>Deactivate {{ $user->name}}</button>
                        </div>
                       
                    </div> 
                        @endif
                    @include('admin.users.modal.status')
                    
                @endif
            </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    {{ @$all_users->links() }}
    
@endsection


