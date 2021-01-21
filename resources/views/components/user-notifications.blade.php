<x-App>
    <div>
        @forelse($notifications as $notification)
            You have been followed by {{ implode($notification->data)}}!
        @empty
        no notifications yet.
        @endforelse
    </div>
</x-App>
