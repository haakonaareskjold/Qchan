<x-App>
        <div class="flex flex-column relative">
            <div class="flex-wrap mb-4 relative">
            @foreach($users as $user)
                    @foreach($following as $follows)
                        @if($user->name === $follows->name)
                            <div class="absolute bottom ml-6 text-red-500  font-bold text-right">User has already been followed</div>
                            @endif
                    @endforeach
                @if(!current_user()->is($user))

                <a href="{{ $user->path() }}">
                    <img src="{{ $user->avatar }}"
                         alt="{{ $user->username }}'s avatar"
                         width="60px"
                         class="mr-4 rounded" />
                    <span class="font-bold d-block text-center mb-4">{{'@'.$user->username}}</span>
                </a>
                    @endif


            @endforeach
                @if($onlyUser)
                    <div class="text-lg font-bold text-red-500 mt-12">No other users exists at the moment, invite your friends!</div>
                    @endif

            </div>
            {{$users->links()}}
        </div>
</x-App>
