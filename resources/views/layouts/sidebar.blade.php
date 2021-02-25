<nav id="sidebarMenu" class="navbar navbar-expand-lg col-md-3 col-lg-2 d-md-block bg-light sidebar collapse fixed ">
    <div class="position-sticky pt-2 ">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{route('profile', Auth::user())}}">
                    <span data-feather="file"></span>
                    <i class="far fa-user-circle"></i>
                    My profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <span data-feather="home"></span>
                    <i class="far fa-newspaper"></i>
                    News
                </a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{url('user/' . Auth::user()->id . '/friends')}}">--}}
{{--                    <span data-feather="home"></span>--}}
{{--                    <i class="fas fa-user-friends "></i>--}}
{{--                    Friends--}}
{{--                </a>--}}
{{--            </li>--}}
            <hr class="mt-1 text-gray-400" >
            <li class="nav-item mt-1">
                <a class="nav-link" href="{{route('posts.create')}}">
                    <span data-feather="home"></span>
                    <i class="far fa-plus-square"></i>
                    Create post
                </a>
            </li>

            <hr class="mt-1 text-gray-400" >
            <li class="nav-item mt-1">
                <a class="nav-link" href="{{ route('settings') }}">
                    <span data-feather="home"></span>
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
            </li>
        </ul>


    </div>
</nav>

