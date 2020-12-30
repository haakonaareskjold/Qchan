<x-App>
    <header class="mb-6 relative">
        <img
            src="{{ $user->banner }}"
            alt="header picture"
            class="shadow-lg object-contain h-64"
            style="display: block; margin-left: auto; margin-right: auto"
        >

        <div class="flex justify-between items-center mb-2">
            <div>
                <h2 class="font-weight-bold text-2xl mb-2">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @if( current_user()->is($user))
                    <a href="{{ $user->path('edit') }}" class="bg-blue-500 rounded-full shadow py-2 px-2 text-white mr-2">Edit profile</a>
                @else

                <x-follow-button :user="$user"></x-follow-button>
                @endif
            </div>
        </div>
        <img
            src=" {{ $user->avatar }}"
            width="40"
            height="40"
            alt="header picture"
            class="mr-2 absolute rounded-full object-contain"
            style="width: 100px; left: calc(50% - 50px); top: 165px"
        >
        <div class="text-sm">
            @if(!is_null($user->description))
            <p class="font-semibold">{{ $user->description }}</p>
            @else
            <p>Hi, I am {{ $user->name }}</p>
            @endif
        </div>
    </header>
    @if( current_user()->is($user))
    @include('qchan._create')
    @endif
    @include('qchan._timeline', ['posts' => $posts])
</x-App>
