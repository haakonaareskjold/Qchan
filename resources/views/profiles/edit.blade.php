<x-App>
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-cs text-gray-700" for="name">Name</label>
            <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" value="{{$user->name}}" required>

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-cs text-gray-700" for="username">Username</label>
            <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username" value="{{$user->username}}" required>

            @error('username')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-cs text-gray-700" for="email">Email</label>
            <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" value="{{$user->email}}" required>

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-cs text-gray-700" for="description">Description</label>
            <textarea class="border border-gray-400 p-2 w-full" type="text" name="description" id="description">{{$user->description}}</textarea>

            @error('description')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-cs text-gray-700" for="avatar">Avatar</label>
            <input class="border border-gray-400 p-2 w-full" type="file" name="avatar" id="avatar">

            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-cs text-gray-700" for="background">Background</label>
            <input class="border border-gray-400 p-2 w-full" type="file" name="background" id="background">

            @error('background')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>
            <a class="btn-danger text-white rounded py-2 px-4 ml-4" href="{{ route('profiles.showdestroy', $user)}}">Delete user?</a>
        </div>
    </form>

</x-App>
