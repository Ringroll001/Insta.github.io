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
                    @foreach( $user->followers as $follower )
 
                                <div class="row align-items-center mt-3">
                
                                <div class="col-auto">
                                    <img src="{{$follower->followers->avatar}}" alt="{{$follower->followers->name}}" class="img-thumbnail rounded-circle d-block mx-auto avatar-md">
                                </div>
                                <div class="col-auto me-5 ps-0 text-truncate">{{$follower->followers->name}}
                                </div>
                                <div class="col-auto ps-5 text-end">
                                    @if ( $follower->followers->id != Auth::user( )->id )
                                        @if($follower->followers->isFollowed( ) )

                                        <div class="col">
                                            <form action="{{ route('follow.destroy', $follower->followers->id )}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-secondary">Following</button>
                                        </div>  
                                        </form>
                                        @else
                                    <form action="{{ route('follow.store', $follower->followers->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="border-0 bg-transparent p-0 text-primary">Follow</button>
                                    </form>
                                    
                                    
                                        @endif
                                        @endif
                                    
                                       
                                    
                            </div>               
                           
                        @endforeach

                @endif       
                </div>

            </div>
        </div>
    </div>
@endsection