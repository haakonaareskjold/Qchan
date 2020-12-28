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
    </div>

</div>
