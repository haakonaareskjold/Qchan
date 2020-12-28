<x-App>
        <div class="flex flex-column">
            <div class="flex-wrap mb-4">
            @foreach($users as $user)
                <a href="{{ $user->path() }}">
                    <img src="{{ $user->avatar }}"
                         alt="{{ $user->username }}'s avatar"
                         width="60px"
                         class="mr-4 rounded" />
                    <span class="font-bold d-block text-center mb-4">{{'@'.$user->username}}</span>
                </a>
            @endforeach
            </div>
            {{$users->links()}}
        </div>
</x-App>
