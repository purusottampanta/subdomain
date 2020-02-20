<div class="navTop  fixed-top">
    <div class="logo ">
        <img src="{{asset('images/hireMeLogo.png')}}" alt="logo" width="150">
    </div>
    <div class="menuList ">
        <ul>
            <li><i class="fa fa-envelope"></i></li>
            <li><i class="fa fa-bell"></i></li>
            <li>
                <p>Hi,{{ authUser()->name}}</p>
            </li>
        </ul>
    </div>
    <div class="clear"></div>
</div>