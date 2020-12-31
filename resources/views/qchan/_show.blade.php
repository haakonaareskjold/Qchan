<x-app>
    <div class="border border-gray-300 rounded-lg">

        <p class="m-0"><strong>
                {{ $post->user->name }} said...
            </strong></p>
        <br>
        <p>{{$post->body}}</p>
    </div>
    @include('qchan.replies._index')
</x-app>
