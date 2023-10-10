<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('assets/images/logo/Logo.svg')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">KANBAN</h4>
        </div>
        <div class="toggle-icon ms-auto">
            <i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="" id="Dashboard">
            <a href="widgets.html">
                <div class="parent-icon">
                    <img src="{{asset('assets/images/figma-icon/Home.png')}}">
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="" id="Inventory">
            <a href="widgets.html">
                <div class="parent-icon">
                    <img src="{{asset('assets/images/figma-icon/Inventory.png')}}">
                </div>
                <div class="menu-title">Inventory</div>
            </a>
        </li>
        <li class="" id="reports">
            <a href="widgets.html">
                <div class="parent-icon">
                    <img src="{{asset('assets/images/figma-icon/Report.png')}}">
                </div>
                <div class="menu-title">Reports</div>
            </a>
        </li>
        <li class="" id="suppliers">
            <a href="{{ route('supplier.index') }}">
                <div class="parent-icon">
                    <img src="{{asset('assets/images/figma-icon/Suppliers.png')}}">
                </div>
                <div class="menu-title">Suppliers</div>
            </a>
        </li>
        <li class="" id="orders">
            <a href="widgets.html">
                <div class="parent-icon">
                    <img src="{{asset('assets/images/figma-icon/Order.png')}}">
                </div>
                <div class="menu-title">Orders</div>
            </a>
        </li>
        <li class="" id="manage-store">
            <a href="widgets.html">
                <div class="parent-icon">
                    <img src="{{asset('assets/images/figma-icon/Manage Store.png')}}">
                </div>
                <div class="menu-title">Manage Store</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>