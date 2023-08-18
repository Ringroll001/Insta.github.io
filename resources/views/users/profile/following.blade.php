@extends('layouts.app')

@section('title', 'Following')

@section('content')
    @include('users.profile.header')
    <div style="margin-top: 100px; ">
        <div class="row justify-content-center">
            <div class="col-4">
                @if( $user->following->isNotEmpty( ))
                <h2 class="text-secondary text-center">Following</h2>

                        @foreach( $user->following as $following )
                           
                                <div class="row align-items-center mt-3">
                                    <div class="col-auto">
                                        <img src="{{$following->following->avatar}}" alt="{{$following->following->name}}" class="img-thumbnail rounded-circle d-block mx-auto avatar-md">
                                    </div>
                                    <div class="col-auto me-5 ps-0 text-truncate">{{$following->following->name}}
                                    </div>
                                
                                    <div class="col-auto ps-5 text-end">
                                        @if ( $following->following->id === Auth::user( )->id )
                                        <form action="{{ route('follow.store', $following->following->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent p-0 text-primary">Follow</button>
                                        </form>
                                        @else
                                        <div class="col">
                                            <form action="{{ route('follow.destroy', $following->following->id )}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-secondary">Following</button>
                                            </form>
                                        </div>
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