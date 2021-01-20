<x-App>
    <div>
        @forelse($notifications as $notification)
            You followed: {{ implode($notification->data)}}
        @empty
        no notifications yet.
        @endforelse
    </div>
</x-App>
