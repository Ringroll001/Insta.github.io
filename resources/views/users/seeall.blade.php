@extends('layouts.app')

@section('title', 'SeeAll')

@section('content')
    @include('users.profile.header')
    <div style="margin-top: 100px; ">
        <div class="row justify-content-center">
            <div class="col-4">       
                <div class="row">
                <div class="col-auto">
                    <p class="h5 fw-bold text-muted">Suggestions</p>
                </div>
            </div>
             @foreach( $suggested_users as $suggested_user )
            <div class="row align-items-center mt-3">
                <div class="col">
                    @if($suggested_user->avatar)
                        <img src="{{$suggested_user->avatar}}" alt="{{$suggested_user->name}}" class="rounded-circle avatar-sm">
                    @else
                        <i class="fa-solid fa-circle-user text-secondary  icon-sm "></i>
                    @endif
                </div>
                <div class="col me-5 ps-0 text-truncate">
                    <a href="{{ route('profile.show', $suggested_user->id )}}" class="text-decoration-none text-dark fw-bold">{{$suggested_user->name}} 
                    </a>       
                </div>
                <div class="col ps-5 text-end">
                    <form action="{{ route('follow.store', $suggested_user->id)}}" method="post">
                        @csrf
                        <button type="submit" class="border-0 bg-transparent p-0 text-primary">Follow</button>
                    </form>
                </div>
            </div>
                    @endforeach
        </div>
    </div>
    
@endsection