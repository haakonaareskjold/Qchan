<x-app>
    @forelse($posts as $post)
        @include('qchan._posts')
    @empty
        <p class="p-4">No Tweets yet</p>
    @endforelse
        {{--{{ $posts->links() }}--}}
</x-app>
