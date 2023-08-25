@extends('layouts.app')

@section('title', 'LikedUser')

@section('content')
    @include('users.profile.header')
    <div style="margin-top: 100px; ">
        <div class="row justify-content-center">
            <div class="col-4">
               
                <h2 class="text-secondary text-center">Liked User</h2>

                        @foreach( $likedUsers as $user )
                           
                                <div class="row align-items-center mt-3">
                                    <div class="col-auto">
                                        <img src="{{$user->avatar}}" alt="{{$user->name}}" class="img-thumbnail rounded-circle d-block mx-auto avatar-md">
                                    </div>
                                    <div class="col-auto me-5 ps-0 text-truncate">
                                    <a href="{{ route('profile.show', $user->id )}}" class="text-decoration-none text-dark fw-bold"> {{ $user->name }}</a>         
                                    </div>
                                
                                    <div class="col-auto ps-5 text-end">
                                        @if ( $user->id === Auth::user( )->id )
                                        <form action="{{ route('follow.store', $user->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent p-0 text-primary">Follow</button>
                                        </form>
                                        @else
                                        <div class="col">
                                            <form action="{{ route('follow.destroy', $user->id )}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-secondary">Following</button>
                                            </form>
                                        </div>
                                        @endif  
                                    </div>                    
                                @endforeach    
                                        
                </div>

            </div>
        </div>
    </div>
@endsection