<div class="col-lg-2 dashSpaceCut">
    <div class="adminData">
        <div class="row">
            <div class="col-4">
                <div class="userImg">
                    <img src="{{ authUser()->present()->profilePicture }}">
                </div>
            </div>
            <div class="col-8">
                <div class="userInfo">
                    <h6>Welcome Back</h6>
                    <p>Admin</p>
                </div>
            </div>
        </div>
    </div>
    <div class="dashMenus">
        <ul>
            <li class="{{ setActive('home', 'active') }}"><a href="{{route('home')}}"><i class="fa fa-tachometer-alt"></i>Dashboard</a></li>
            <li class="{{ setActive('users.index', 'active') }}"><a href="notices.html"><i class="fa fa-clipboard"></i>Notices</a></li>
            <li class="{{ setActive('users.index', 'active') }}"><a href="oragnization.html"><i class="fa fa-building"></i>Organizations</a></li>
            <li class="{{ setActive('users.index', 'active') }}"><a href="{{route('users.index')}}"><i class="fa fa-users"></i>Users</a></li>
            <li class="{{ setActive('settings.index', 'active') }}"><a href="{{route('settings.index')}}"><i class="fa fa-cog"></i>Settings</a></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i>Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>