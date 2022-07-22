
    <div class="profile-sidebar border">
        <div class="widget">
            <h5 class="mb-2 border-bottom pb-3">
                <img src="{{ $user->photo }}" style="width: 100px;border-radius: 50%;">
            </h5>

            <div class="list-group mt-3">
                <a href="{{ route('user.dashboard') }}" class="list-group-item list-group-item-action {{ \Request::is('user/dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('user.order') }}" class="list-group-item list-group-item-action {{ \Request::is('user/order') ? 'active' : '' }}">
                    My Ordered List
                </a>
                <a href="{{ route('user.account') }}" class="list-group-item list-group-item-action {{ \Request::is('user/account-detail') ? 'active' : '' }}">
                    User Account Details
                </a>
                <a href="{{ route('user.address') }}" class="list-group-item list-group-item-action {{ \Request::is('user/address') ? 'active' : '' }}">
                    My Address
                </a>
                <a href="{{ route('user.logout') }}" class="list-group-item list-group-item-action ">
                    Logout
                </a>
            </div>

        </div> <!-- Single Widget -->
    </div>
