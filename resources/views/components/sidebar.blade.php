<aside class="sidebar-container open d-flex flex-column border bg-white shadow shadow-lg" id="sidebar">
    <div class="d-flex flex-column justify-content-start px-3 mt-3">
        <a href="{{ route('home') }}"
            class="{{ request()->routeIs('home') ? 'active' : '' }} btn btn-light border-0 rounded rounded-3 p-2 d-flex align-items-center justify-content-start mb-2">
            <i class="fs-5 fa fa-chart-pie me-3 text-light p-2 bg-primary rounded rounded-3 nav-icon"></i>
            <span>Dashboard</span>
        </a>
        <button type="button"
            class="btn btn-light border-0 rounded rounded-3 p-2 d-flex align-items-center justify-content-start mb-2"
            data-bs-toggle="collapse" data-bs-target="#pemesanan-collapse" aria-expanded="false"
            aria-controls="pemesanan-collapse">
            <i class="fs-5 fa fa-shopping-cart me-3 text-light p-2 bg-primary rounded rounded-3 nav-icon"></i>
            <span>Requests</span>
            <i class="fa fa-caret-down ms-auto me-2"></i>
        </button>
        <div class="{{ request()->routeIs('order*') ? 'show' : '' }} collapse" id="pemesanan-collapse">
            @isAdmin()
                <a href="{{ route('order.create') }}"
                    class="{{ request()->routeIs('order.create') ? 'active' : '' }} 
                    ms-4 btn btn-light border-0 rounded rounded-3 p-2 d-flex align-items-center justify-content-start mb-2">
                    <i class="fs-5 fa fa-plus-circle me-3 ms-1 text-primary nav-icon"></i>
                    <span>Add</span>
                </a>
            @endisAdmin
            <a href="{{ route('order.index') }}"
                class="{{ request()->routeIs('order.index') ? 'active' : '' }}  
                    ms-4 btn btn-light border-0 rounded rounded-3 p-2 d-flex align-items-center justify-content-start mb-2">
                <i class="fs-5 fa fa-clipboard-list me-3 ms-1 text-primary nav-icon"></i>
                <span>List</span>
            </a>
        </div>
        @isAdmin()
            <button type="button"
                class="btn btn-light border-0 rounded rounded-3 p-2 d-flex align-items-center justify-content-start mb-2"
                data-bs-toggle="collapse" data-bs-target="#kendaraan-collapse" aria-expanded="false"
                aria-controls="kendaraan-collapse">
                <i class="fs-5 fa fa-car me-3 text-light p-2 bg-primary rounded rounded-3 nav-icon"></i>
                <span>Vechile</span>
                <i class="fa fa-caret-down ms-auto me-2"></i>
            </button>
            <div class="{{ request()->routeIs('vechile*') ? 'show' : '' }} collapse" id="kendaraan-collapse">
                <a href="{{ route('vechile.create') }}"
                    class="{{ request()->routeIs('vechile.create') ? 'active' : '' }} 
                    ms-4 btn btn-light border-0 rounded rounded-3 p-2 d-flex align-items-center justify-content-start mb-2">
                    <i class="fs-5 fa fa-plus-circle me-3 ms-1 text-primary nav-icon"></i>
                    <span>Add</span>
                </a>
                <a href="{{ route('vechile.index') }}"
                    class="{{ request()->routeIs('vechile.index') ? 'active' : '' }} 
                    ms-4 btn btn-light border-0 rounded rounded-3 p-2 d-flex align-items-center justify-content-start mb-2">
                    <i class="fs-5 fa fa-clipboard-list me-3 ms-1 text-primary nav-icon"></i>
                    <span>List</span>
                </a>
            </div>
            <button type="button"
                class="btn btn-light border-0 rounded rounded-3 p-2 d-flex align-items-center justify-content-start mb-2"
                data-bs-toggle="collapse" data-bs-target="#driver-collapse" aria-expanded="false"
                aria-controls="driver-collapse">
                <i class="fs-5 fa fa-id-card me-3 text-light p-2 bg-primary rounded rounded-3 nav-icon"></i>
                <span>Driver</span>
                <i class="fa fa-caret-down ms-auto me-2"></i>
            </button>
            <div class="{{ request()->routeIs('driver*') ? 'show' : '' }} collapse" id="driver-collapse">
                <a href="{{ route('driver.create') }}"
                    class="{{ request()->routeIs('driver.create') ? 'active' : '' }} ms-4 btn btn-light border-0 rounded rounded-3 p-2 d-flex align-items-center justify-content-start mb-2">
                    <i class="fs-5 fa fa-plus-circle me-3 ms-1 text-primary nav-icon"></i>
                    <span>Add</span>
                </a>
                <a href="{{ route('driver.index') }}"
                    class="{{ request()->routeIs('driver.index') ? 'active' : '' }} ms-4 btn btn-light border-0 rounded rounded-3 p-2 d-flex align-items-center justify-content-start mb-2">
                    <i class="fs-5 fa fa-clipboard-list me-3 ms-1 text-primary nav-icon"></i>
                    <span>List</span>
                </a>
            </div>
        @endisAdmin
    </div>
</aside>
