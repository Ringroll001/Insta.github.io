{{--clickable image--}}
<div class="container p-0">
        <a href="{{route('post.show', $post->id)}}">
                <img src="{{ $post->image}}" alt="post id {{ $post->id}}" class="w-100">
        </a>
</div>

<div class="card-body">
        {{--header button + no of likes + categories--}}
        <div class="row align-items-center">
                <div class="col-auto">
                        @if($post->isLiked( ))
                        <form action="{{ route('like.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm p-0">
                                        <i class="fa-solid fa-heart text-danger"></i>
                                </button>
                        </form>
                        @else
                <form action="{{ route('like.store',$post->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm shadow-none p-0">
                                <i class="fa-regular fa-heart"> </i>
                        </button>
                </form>
                        @endif
                </div>
                <div class="col-auto">
                        <span>{{ $post->likes->count( ) }}</span>
                </div>
                <div class="col text-end">

                        @forelse($post->categoryPost as $category_post)
                        <div class="badge bg-secondary bg-opacity-50">
                                {{ $category_post->category->name}}
                        </div>
                        @empty
                            <span class="badge badge-dark bg-dark">Uncategorized</span>
                        @endforelse
                </div>
        </div>
        <div class="row">
            <div class="col">
                @if(  $post->likes->count( ) == 0 )
                <p></p>
                @elseif($post->likes->count( ) == 1 )
                <p>Liked by
                @foreach ($post->likes as $like)
                <a href="{{ route('profile.show', $like->user->id )}}" class="text-decoration-none text-dark fw-bold"> {{ $like->user->name }}</a>               
                @endforeach
                </p>
                @else
                @foreach ($post->likes->take(1) as $like)
                <p>Liked by
                        <a href="{{ route('profile.show', $like->user->id )}}" class="text-decoration-none text-dark fw-bold"> {{ $like->user->name }}</a>  and <a href="{{ route ('showLikedUser', $post->id) }}" class="text-decoration-none text-dark fw-bold">others</a>
                </p>              
                        
                    
                    @endforeach
                
              @endif 
            </div>
        </div>
        {{----owner + description----}}
        <a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $post->user->name}}</a>
        &nbsp;
        <p class="d-inline fw-light">{{ $post->description}}</p>
        <p class="text-uppercase text-muted xsmall">{{ date('M d, Y', strtotime( $post->created_at))}}</p>

        {{---include comments here ---}}
        @include('users.posts.contents.comment')
</div>