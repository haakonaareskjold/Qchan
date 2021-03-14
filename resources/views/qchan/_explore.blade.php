<x-App>
        <div class="flex flex-column relative">
            <div class="flex-wrap mb-4 relative">
                <div class="font-weight-bold text-2xl mt-2 mb-6 border-bottom">Here you can explore new users!</div>
            @foreach($users as $user)
                        @if(!current_user()->following($user) && !current_user()->is($user))

                                <a href="{{ $user->path() }}" class="p-4">
                                    <img src="{{ $user->avatar }}"
                                         alt="{{ $user->username }}'s avatar"
                                         width="60px"
                                         class="mr-4 rounded absolute" />
                                    <span class="font-bold d-xl-block text-center mb-4">{{'@'.$user->username}}</span>
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
