<ul class="aninavtree ml-24">
    <li class="links {{ Request::path() === 'posts' ? 'links-active' : ''}}">
        <a href="{{ route('posts.index') }}">
            Home
        </a>
    </li>

    <li class="links {{ Request::path() === 'explore' ? 'links-active' : ''}}">
        <a href="{{ route('explore') }}">
            Explore
        </a>
    </li>

    <li class="links {{ Request::path() === 'notifications' ? 'links-active' : ''}}">
        <a href="{{ route('notifications') }}">
            Notifications
        </a>
    </li>

    <li class="links {{ Route::getFacadeRoot()->current()->uri() === 'profiles/{user}' ? 'links-active' : ''}}">
        <a href="{{ route('profiles.show', current_user()) }}">
            Profile
        </a>
    </li>
</ul>

<nav class="aninav">
    <ul class="aninav__list">

        <li class="aninav__listitem {{ Request::path() === 'posts' ? 'aninav__listitem-active' : ''}}">
            <a href="{{ route('posts.index') }}">
                <svg class="svg-icon" viewBox="0 0 20 20" width="100" title="home">
                    <path d="M18.121,9.88l-7.832-7.836c-0.155-0.158-0.428-0.155-0.584,0L1.842,9.913c-0.262,0.263-0.073,0.705,0.292,0.705h2.069v7.042c0,0.227,0.187,0.414,0.414,0.414h3.725c0.228,0,0.414-0.188,0.414-0.414v-3.313h2.483v3.313c0,0.227,0.187,0.414,0.413,0.414h3.726c0.229,0,0.414-0.188,0.414-0.414v-7.042h2.068h0.004C18.331,10.617,18.389,10.146,18.121,9.88 M14.963,17.245h-2.896v-3.313c0-0.229-0.186-0.415-0.414-0.415H8.342c-0.228,0-0.414,0.187-0.414,0.415v3.313H5.032v-6.628h9.931V17.245z M3.133,9.79l6.864-6.868l6.867,6.868H3.133z"></path>
                </svg>
            </a>
        </li>

        <li class="aninav__listitem {{ Request::path() === 'explore' ? 'aninav__listitem-active' : ''}}">
            <a href="{{ route('explore')}}">
                <svg class="svg-icon" viewBox="0 0 20 20" width="100" title="explore">
                    <path d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z"></path>
                </svg>
            </a>
        </li>

        <li class="aninav__listitem {{ Request::path() === 'notifications' ? 'aninav__listitem-active' : ''}}">
            <a href="{{ route('notifications')}}">
                <svg class="svg-icon" viewBox="0 0 20 20" width="100" title="notifications">
                    <path d="M14.38,3.467l0.232-0.633c0.086-0.226-0.031-0.477-0.264-0.559c-0.229-0.081-0.48,0.033-0.562,0.262l-0.234,0.631C10.695,2.38,7.648,3.89,6.616,6.689l-1.447,3.93l-2.664,1.227c-0.354,0.166-0.337,0.672,0.035,0.805l4.811,1.729c-0.19,1.119,0.445,2.25,1.561,2.65c1.119,0.402,2.341-0.059,2.923-1.039l4.811,1.73c0,0.002,0.002,0.002,0.002,0.002c0.23,0.082,0.484-0.033,0.568-0.262c0.049-0.129,0.029-0.266-0.041-0.377l-1.219-2.586l1.447-3.932C18.435,7.768,17.085,4.676,14.38,3.467 M9.215,16.211c-0.658-0.234-1.054-0.869-1.014-1.523l2.784,0.998C10.588,16.215,9.871,16.447,9.215,16.211 M16.573,10.27l-1.51,4.1c-0.041,0.107-0.037,0.227,0.012,0.33l0.871,1.844l-4.184-1.506l-3.734-1.342l-4.185-1.504l1.864-0.857c0.104-0.049,0.188-0.139,0.229-0.248l1.51-4.098c0.916-2.487,3.708-3.773,6.222-2.868C16.187,5.024,17.489,7.783,16.573,10.27"></path>
                </svg>
            </a>
        </li>

        <li class="aninav__listitem {{ Route::getFacadeRoot()->current()->uri() === 'profiles/{user}' ? 'aninav__listitem-active' : ''}}">
                <a href="{{ route('profiles.show', current_user()) }}">
                    <svg class="svg-icon" viewBox="0 0 20 20" width="100" title="profile">
                        <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                    </svg>
                </a>
            </li>
    </ul>
</nav>
<script>
    let aninav = document.querySelector(".aninav");
    let aninavListItem = document.querySelectorAll(".aninav__listitem")

    aninavListItem.forEach((link) => link.addEventListener("click", listActive));

    function listActive() {
        aninavListItem.forEach((link) =>
            link.classList.remove("aninav__listitem-active"));

        this.classList.add("aninav__listitem-active");
    }
</script>

<section class="px-8 py-4 mb-2">
    <header class="container mx-auto">
        <h1>
            <img src="{{ asset('logo.png')}}" alt="Q chan logo">
        </h1>
    </header>
</section>
