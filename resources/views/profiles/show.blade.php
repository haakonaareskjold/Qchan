<x-App>
    <header class="mb-6 relative">
        <img
            src="{{ asset('background.jpg')}}"
            alt="header picture"
            class="shadow-lg"
            width="700px"
            height="200px"
        >

        <div class="flex justify-between items-center mb-2">
            <div>
                <h2 class="font-weight-bold text-2xl mb-2">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @if( current_user()->is($user))
                    <a href="{{ $user->path('edit') }}" class="bg-blue-500 rounded-full shadow py-2 px-2 text-white">Edit profile</a>
                @endif

                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>
        <img
            src=" {{ $user->avatar }}"
            width="40"
            height="40"
            alt="header picture"
            class="rounded-full mr-2 absolute"
            style="width: 100px; left: calc(50% - 75px); top: 300px"
        >
        <p class="text-sm">
            @if(!is_null($user->description))
                {{ $user->description }}
            @else
                Hi, I am {{ $user->name }}
            @endif

        </p>
    </header>
    @include('qchan._publish-post-panel')

    @include('qchan._timeline', ['posts' => $posts])

</x-App>
