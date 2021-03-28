<div class="bg-gray-200 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">I'm following:</h3>

    <ul>
        @forelse(current_user()->follows as $user)
            <li class="mb-4 list-none">
                <div>
                    <a class="flex items-center text-sm" href="{{ route('profiles.show', $user->username)}}">
                        <img
                            src="{{ $user->avatar }}"
                            alt=""
                            class="rounded-full mr-2"
                            width="40"
                        >

                        {{ $user->name }}
                    </a>

                </div>
            </li>
        @empty
            <li class="alert-warning">Not following anyone</li>
        @endforelse
    </ul>
    <h3 class="font-bold text-xl mb-4">My followers:</h3>
    @forelse(current_user()->followers()->get() as $user)
        <li class="mb-4 list-none">
            <div>
                <a class="flex items-center text-sm" href="{{ route('profiles.show', $user->username)}}">
                    <img
                        src="{{ $user->avatar }}"
                        alt=""
                        class="rounded-full mr-2"
                        width="40"
                    >

                    {{ $user->name }}
                </a>

            </div>
        </li>
    @empty
        <li>No Followers yet</li>
    @endforelse
</div>
