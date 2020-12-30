@unless( auth()->user()->is($user))

    <form method="POST" action="/profiles/{{ $user->username}}/follow">
        @csrf

        <button type="submit" class="bg-blue-500 rounded-full shadow py-2 px-2 text-white mr-2">
            {{ current_user()->following($user) ? 'Unfollow' : 'Follow' }}</button>
    </form>
@endunless
