@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="row gx-5">
    <div class="col-8">
        @forelse ($home_posts as $post)
            <div class="card mb-4">
                {{-- title --}}
                @include('users.posts.contents.title')
                {{-- body --}}
                @include('users.posts.contents.body')
            </div>
        @empty
            {{-- if the doen't have any posts ye--}}
            <div class="text-center">
                <h2>Share Photos</h2>
                <p class="text-muted">When you share photos, they'll appear on your profile</p>
                <a href="{{ route('post.create') }}" class="text-decoration-none">Share you first photo</a>
            </div>
        @endforelse
    </div>
    <div class="col-4 ">
        {{-- Profile Overview --}}
        Profile Overview + 
       <div class="row align-items-center mb-5 bg-white shadow-sm rounded-3 py-3">
                <div class="col-auto">
                        <a href="{{route('profile.show', Auth::user( )->id) }}">
                                @if(Auth::user( )->avatar)
                                        <img src="{{ Auth::user( )->avatar }}" alt="{{ Auth::user( )->name}}" class="rounded-circle avatar-md">
                                @else
                                        <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                                @endif
                        </a>
                </div>
                <div class="col ps-0">
                        <a href="{{ route('profile.show', Auth::user( )->id )}}" class="text-decoration-none text-dark fw-bold">{{  Auth::user( )->name }}</a>
                        <p class="text-muted mb-0">{{ Auth::user( )->email }}</p>
                </div>
       </div>
        {{-- Suggestions --}}
        
            <div class="row">
                <div class="col-auto">
                    <p class="h5 fw-bold text-muted">Suggestions</p>
                </div>
                <div class="col text-end">
                    <a href="{{ route('suggestedUsers' )}}" class="fw-bold text-decoration-none text-dark">See all</a>
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
​          @endforeach
    </div>
</div>
@endsection