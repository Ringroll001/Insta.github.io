@extends('layouts.app')

@section('title', 'Followers')

@section('content')
    @include('users.profile.header')
    <div style="margin-top: 100px; ">
        <div class="row justify-content-center">
            <div class="col-4">
                @if( $user->followers->isEmpty( )) 
                    <h3 class="text-secondary text-center">No follower yet.</h3>
                @else       
                     <h2 class="text-secondary text-center">Followers</h2>     
                    <div class="row align-items-center mt-3">
                        @foreach( $user->followers as $follower )
                                <div class="col-4 mt-3">
                                    @if($follower->followers->avatar)
                                    <img src="{{$follower->followers->avatar}}" alt="{{$follower->followers->name}}" class="img-thumbnail rounded-circle d-block mx-auto avatar-md">
                                    @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-md d-block mx-auto"></i>
                                 @endif      
                                </div>

                                <div class="col-6 text-truncate">
                                <a href="{{ route('profile.show', $follower->followers->id )}}" class="text-decoration-none text-dark fw-bold"> {{$follower->followers->name}}</a> 
                                </div>
                                
                                    @if ( $follower->followers->id != Auth::user( )->id )
                                        @if($follower->followers->isFollowed( ) )
                                        <div class="col-2">
                                            <form action="{{ route('follow.destroy', $follower->followers->id )}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-secondary">Following</button>
                                                </form>
                                        </div>  
                                       
                                        @else
                                        <div class="col-2">
                                            <form action="{{ route('follow.store', $follower->followers->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn  btn-  text-primary">Follow</button>
                                            </form>
                                        </div>   
                                        @endif
                                        @endif 
                                      
                           
                        @endforeach
                         @endif       
                    </div>

            </div>
        </div>
    </div>
@endsection