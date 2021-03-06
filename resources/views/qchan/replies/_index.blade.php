<div>
    @foreach( $post->replies as $reply)
        <div class="border border-gray-300 rounded-lg">
            <header style="display: flex; justify-content: space-between;">
                <p class="m-0"><strong>
                        {{ $reply->user->name }} said...
                    </strong></p>
            </header>

            {{ $reply->body }}

        </div>
        @continue($loop->last)
        <hr>
    @endforeach
</div>

<div class="border border-gray-300 rounded-lg mt-4">
    <form method="POST" action="{{ route('replies.create', $post->id)}}">
        @csrf
        <textarea
            name="body"
            class="w-full border border-gray-300 rounded-lg"
            placeholder="Write a reply"
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between">
            <img
                src=" {{ auth()->user()->avatar }}"
                alt="Your Avatar"
                class="rounded-full mr-2"
                height="50"
                width="50"
            >
            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white"
            >
                Reply
            </button>

        </footer>

    </form>

    @error('body')
    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror

</div>
