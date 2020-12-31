<x-app>
    <div class="border border-gray-300 rounded-lg">

        <h1>{{$post->user->name}}</h1>
        <br>
        <p>{{$post->body}}</p>
    </div>
    @include('qchan.replies._index')
</x-app>
