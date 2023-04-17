<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-envelope"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SMS <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span>Group</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('add.group') }}">Add Group</a>
                <a class="collapse-item" href="{{ route('manage.group') }}">Manage Group</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGroupMember"
            aria-expanded="true" aria-controls="collapseGroupMember">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Group Member</span>
        </a>
        <div id="collapseGroupMember" class="collapse" aria-labelledby="headingGroupMember"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('add.member') }}">Add Contact</a>
                <a class="collapse-item" href="{{ route('manage.member') }}">Manage Contact</a>
            </div>
        </div>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseService"
            aria-expanded="true" aria-controls="collapseService">
            <i class="fa fa-comment" aria-hidden="true"></i>
            <span>Service</span>
        </a>
        <div id="collapseService" class="collapse" aria-labelledby="headingService" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('single.message') }}">Single Message</a>
                <a class="collapse-item" href="{{ route('multiple.message') }}">Multiple Message</a>
            </div>
        </div>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServiceHistory"
            aria-expanded="true" aria-controls="collapseServiceHistory">
            <i class="fa fa-comments" aria-hidden="true"></i>
            <span>Service History</span>
        </a>
        <div id="collapseServiceHistory" class="collapse" aria-labelledby="headingServiceHistory"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('message.history') }}">Message History</a>
                <a class="collapse-item" href="{{ route('message.info') }}">Message Info</a>
            </div>
        </div>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('single.message') }}" aria-expanded="true">
            <i class="fa fa-comment" aria-hidden="true"></i>
            <span>Create Message</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('message.info') }}" aria-expanded="true">
            <i class="fa fa-comments" aria-hidden="true"></i>
            <span>Message Info</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('buy.message') }}" aria-expanded="true">
            <i class="fa fa-credit-card" aria-hidden="true"></i>
            <span>Account</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>