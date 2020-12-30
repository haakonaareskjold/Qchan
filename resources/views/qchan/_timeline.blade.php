<div class="border border-gray-300 rounded-lg">
    @forelse($posts as $post)
        @include('qchan._posts')
    @empty
        <p class="p-4">No Posts yet</p>
    @endforelse
        {{ $posts->links() }}
</div>
