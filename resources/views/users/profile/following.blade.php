@extends('layouts.app')

@section('title', 'Following')

@section('content')
    @include('users.profile.header')
    <div style="margin-top: 100px; ">
        <div class="row justify-content-center">
            <div class="col-4 mx-auto">
                @if( $user->following->isNotEmpty( ))
                <h2 class="text-secondary text-center">Following</h2>
                <div class="row align-items-center mt-3">
                            @foreach( $user->following as $following ) 
                                    <div class="col-4 mt-3">
                                        @if($following->following->avatar)
                                            <img src="{{$following->following->avatar}}" alt="{{$following->following->name}}" class="img-thumbnail rounded-circle d-block  avatar-md">
                                        @else
                                            <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                                        @endif                                        
                                    </div>

                                    <div class="col-6">
                                        <a href="{{ route('profile.show', $following->following->id )}}" class="text-decoration-none text-dark fw-bold"> {{$following->following->name}}</a> 
                                    </div>
                                
                                    <div class="col-2 ">
                                            @if ( $following->following->id === Auth::user( )->id )
                                            <form action="{{ route('follow.store', $following->following->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="border-0 bg-transparent p-0 text-primary">Follow</button>
                                            </form>
                                            @else
                                            
                                                <form action="{{ route('follow.destroy', $following->following->id )}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-secondary ">Following</button>
                                                </form>
                                            @endif  
                                    </div>  
                                    @endforeach  
                                @else  
                        <h3 class="text-secondary text-center">No following yet.</h3>
                 @endif                           
                </div>

            </div>
        </div>
    </div>
@endsection