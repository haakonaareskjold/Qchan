<x-App>
    <div>
        @forelse($users as $follower)
            {{$follower->data}}
        @empty
        no followers yet.
        @endforelse
    </div>
</x-App>
