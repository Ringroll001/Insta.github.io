<div class="row">
        <div class="col-4">
                @if($user->avatar)
                        <img src="{{ $user->avatar}}" alt="{{ $user->name}}" class="img-thumbnail rounded-circle d-block mx-auto avatar-lg">
                
                @else
                        <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
                @endif
        </div>
        <div class="col-8">
                <div class="row-mb-3">
                        <div class="col-auto">
                                <div class="display-6 mb-0">{{ $user->name }}</div>
                        </div>

                        <div class="col-auto p-2">
                                @if(Auth::user( )->id === $user->id)
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary btn-sm fw-bold">Edit Profile</a>
                                @else
                                @if($user->isFollowed( ))
                                <form action="{{ route('follow.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-secondary btn-sm fw-bold">Following</button>
                                </form>
                                @else
                                        <form action="{{ route('follow.store', $user->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                                        </form>
                                        @endif
                                @endif
                        </div>
                </div>
                <div class="row mb-3">
                        <div class="col-auto">
                        <a href="{{ route ('profile.show', $user->id) }}" class="text-decoration-none text-dark">
                        @if( $user->posts->count( ) <= 1 )
                                
                                <strong class="me-2">{{ $user->posts->count( )}}</strong>post</a>
                                @else
                                <strong class="me-2">{{ $user->posts->count( )}}</strong>posts</a>
                                @endif
                        </div>
                       
                        <div class="col-auto">
                                <a href="{{ route ('profile.showFollower', $user->id) }}" class="text-decoration-none text-dark">
                                @if( $user->followers->count( ) <= 1 )    
                                <strong class="me-2">{{ $user->followers->count( ) }}</strong>follower</a>
                                @else
                                <strong class="me-2">{{ $user->followers->count( ) }}</strong>followers</a>
                                @endif
                        </div>
                        <div class="col-auto">
                                <a href="{{ route ('profile.showFollowing', $user->id) }}" class="text-decoration-none text-dark">
                                <strong class="me-2">{{ $user->following->count( ) }}</strong>following</a>
                        </div>  
                <p class="fw-bold">{{$user->introduction}}</p>
                <p>Followed by
                @foreach( $commonFollowers as $commonFollower) 
                    
                  {{ $commonFollower->id }}
                
                @endforeach
                
                </p>
                </div>
        </div>
</div>