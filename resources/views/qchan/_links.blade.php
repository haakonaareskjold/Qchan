<ul class="ml-24">
    <li>
        <a href="{{ route('posts.index') }}" class="font-bold text-lg mb-4 block">
            Home
        </a>
    </li>
    <li>
        <a href="{{ route('explore') }}" class="font-bold text-lg mb-4 block">
            Explore
        </a>
    </li>
    <li>
        <a href="{{ route('notifications') }}" class="font-bold text-lg mb-4 block">
            Notifications
        </a>
    </li>

    <li>
        <a href="{{ route('profiles.show', auth()->user()) }}" class="font-bold text-lg mb-4 block">
            Profile
        </a>
    </li>
</ul>
<section class="px-8 py-4 mb-2">
    <header class="container mx-auto">
        <h1>
            <img src="{{ asset('logo.png')}}" alt="Q chan logo">
        </h1>
    </header>
</section>
