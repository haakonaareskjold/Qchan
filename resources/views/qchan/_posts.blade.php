<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profiles.show', $post->user) }}">
            <img
                src="{{ $post->user->avatar }}"
                alt=""
                class="rounded-full mr-2"
                width="40"
                height="40"
            >
        </a>
    </div>
    <div>
        <a href="{{ route('posts.show', $post->id) }}">
            <p class="font-bold mb-2">{{ $post->user->name }} •
                @if( $post->created_at != $post->updated_at) <u>Post edited</u> {{ $post->updated_at->diffForHumans()}}
                @else
                {{ $post->created_at->diffForHumans()}}
                @endif
        </a>

        <p class="text-sm mb-3">{{ $post->body }}</p>




    <div class="flex">
            <form method="POST" action="/posts/{{$post->id}}/like">
                @csrf
                @if($post->isLikedBy(current_user()))
                    @method('delete')
                @endif

                <div class="flex items-center mr-4">
                    <button type="submit">
                        <svg viewBox="0 0 20 20" class="{{ $post->isLikedBy(current_user()) ? 'text-blue-500' : 'text-gray-500' }} mr-1 w-4">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g class="fill-current">
                                    <polygon id="Combined-Shape" points="7 10 7 18 13 18 13 10 18 10 10 2 2 10 7 10"></polygon>
                                </g>
                            </g>
                        </svg>
                    </button>
                    {{ $post->likes ?: 0 }}
                </div>
            </form>

            <form method="POST" action="/posts/{{$post->id}}/dislike">
                @csrf
                @if($post->isDislikedBy(current_user()))
                    @method('delete')
                @endif

                <div class="flex items-center mr-4">
                    <button type="submit">
                        <svg viewBox="0 0 20 20" class="{{ $post->isDislikedBy(current_user()) ? 'text-blue-500' : 'text-grey-500' }} mr-1 w-4">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g class="fill-current">
                                    <path d="M13,10 L13,2 L7,2 L7,10 L2,10 L10,18 L18,10 L13,10 Z" id="Combined-Shape"></path>
                                </g>
                            </g>
                        </svg>
                    </button>
                    {{ - $post->dislikes ?: 0 }}
                </div>
            </form>
        @if( current_user()->is($user))
            <div>
                <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <a class="mr-4 ml-4 btn btn-primary" href="{{ ('/posts/' . $post->id . '/edit') }}">Edit</a>
                    <button class="mr-4 ml-4 btn btn-primary" type="submit">Delete</button>
                </form>
            </div>
        @endif
        <a class="btn btn-primary mr-4 ml-4" href="{{route('replies.create', $post->id)}}" >Reply</a>

        @foreach( $post->replies as $reply)
            @if ($reply->post_id == $post->id)
            @endif
        @endforeach
        @if (!empty(count($post->replies)))
                <a class="btn btn-primary">
                    <svg viewBox="0 0 20 20" class="w-4">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g class="fill-current">
                                <path d="M15,17 L15,14.009763 C15,11.795232 13.2081782,10 10.9976305,10 L8,10 L8,15 L2,9 L8,3 L8,8 L10.9946916,8 C14.3113318,8 17,10.6930342 17,14 L17,17 L15,17 L15,17 Z" id="Combined-Shape"></path>
                            </g>
                        </g>
                    </svg>
                </a>
            <a class="btn btn-primary" href="{{route('replies.create', $post->id)}}">{{ count($post->replies) }}</a>
        @endif
    </div>
    </div>
</div>
