<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="#">
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
        <a href="#">
            <p class="font-bold mb-2">{{ $post->user->name }} • {{ $post->created_at->diffForHumans()}}</p>
        </a>

        <p class="text-sm mb-3">{{ $post->body }}</p>


    <div class="flex">
            <form method="POST" action="/posts/{{$post->id}}/like">
                @csrf

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

            <form method="POST" action="/posts/{{$post->id}}/like">
                @csrf
                @method('DELETE')

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
        </div>
    </div>
</div>
