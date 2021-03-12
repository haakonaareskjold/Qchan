<x-App>
    <div>
        @forelse($notifications as $notification)
            <div class="text-lg font-bold text-green-500 mt-12">You have been followed by {{ implode($notification->data)}}!</div>
        @empty
            <div class="text-lg font-bold text-blue-500 mt-12">No notifications at the moment</div>
        @endforelse
    </div>
</x-App>
