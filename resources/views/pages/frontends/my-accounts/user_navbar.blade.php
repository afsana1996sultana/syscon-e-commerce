<div class="dashboard_tab_button">
    <ul role="tablist" class="nav flex-column dashboard-list">
        <li><a href="{{route('customer-dashboard/my-account')}}" class="nav-link">Dashboard</a></li>
        <li><a href="{{route('customer-dashboard/my-account/my-profile')}}" class="nav-link">My Profile</a>
        <li> <a href="{{route('customer-dashboard/my-account/orders')}}" class="nav-link">Orders</a></li>
        <li><a href="{{route('customer-dashboard/my-account/address')}}" class="nav-link">Addresses</a></li>
        <li><a href="{{route('customer-dashboard/my-account/downloads')}}" class="nav-link">Downloads</a></li>
        </li>
        <li><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</div>  