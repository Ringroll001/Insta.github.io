@extends('layouts.app')

@section('title', 'Admin: Users')

@section('content')

    <table class="table ">
        <thead class="table">
            <tr class="table-success">
                <th></th> 
                <th>CATEGORY</th>
                <th></th>
                <th>NAME</th>
                <th>CREATED AT</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        
        <tbody >
        @foreach( $all_posts as $post)
           <tr >
                <td> {{ $post->id}}</td>
                <td >
                    @if( $post->categoryPost->count( ) == 0 )
                        <span class="badge badge-dark bg-dark">Uncategorized</span>
                        @else
                            @foreach($post->categoryPost as $category_post)
                                    <span class="badge badge-secondary bg-secondary">{{ $category_post->category->name }}</span>
                            @endforeach
                    @endif
                </td>
                <td>
                @if($post->image)
                        <img src="{{$post->image}}" alt="{{$post->id}}" class="avatar-md me-3">
                        @else
                        <i class="fa-solid fa-circle-user text-secondary  icon-md me-3 align-middle"></i>
                @endif    
                </td>
                <td>{{ $post->user->name }} </td>
                <td>{{ $post->user->created_at }}</td>
                <td>
                    @if($post->trashed( ))
                    <i class="fa-regular fa-circle text-secondary"></i> &nbsp; Hidden
                    @else    
                    <i class="fa-solid fa-circle text-primary me-2"></i> &nbsp; Visible
                    @endif
               
                </td>
                
                <td></td>
               
                <td> 
                    @if( $post->trashed( ))
                        <div class="dropdown">   
                            <a class="btn  text-dark "  href="#" role="button"  data-bs-toggle="dropdown" ><i class="fa-solid fa-ellipsis" ></i></a>
                            <div class="dropdown-menu" >
                                <button class="dropdown-item text-secondary btn" data-bs-toggle="modal" data-bs-target="#activate-modal-{{ $post->id}}"><i class="fa-solid fa-user-large-slash" ></i>Visible {{ $post->name}}</button>
                            </div>         
                        </div> 
                        @else
                        <div class="dropdown">   
                            <a class="btn  text-dark "  href="#" role="button"  data-bs-toggle="dropdown" ><i class="fa-solid fa-ellipsis" ></i></a>
                            <div class="dropdown-menu" >
                                <button class="dropdown-item text-danger btn" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $post->id }}"><i class="fa-solid fa-user-large-slash" ></i>Invisible {{ $post->name}}</button>
                            </div>   
                        </div> 
                            @endif
                        @include('admin.posts.modal.status')
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>
    {{ @$all_posts->links() }}
@endsection


