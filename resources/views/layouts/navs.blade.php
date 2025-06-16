<div class="d-none d-lg-flex flex-column flex-shrink-0 p-3 text-white bg-dark"
     style="width: 280px; height: 100vh; overflow-y: auto; position: fixed; left: 0; top: 0; z-index: 1040;">
    <h3 class="mb-3">TANSAM CMS</h3>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link text-white">
                <i class="bi bi-circle-fill"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('entrepreneurship.list') }}" class="nav-link text-white">
                <i class="bi bi-circle-fill"></i> Entrepreneurship
            </a>
        </li>
        <li>
            <a href="{{ route('events.list') }}" class="nav-link text-white">
                <i class="bi bi-circle-fill"></i> Events
            </a>
        </li>
        <li>
            <a href="{{ route('hackathons.list') }}" class="nav-link text-white">
                <i class="bi bi-circle-fill"></i> Hackathon Events
            </a>
        </li>
        <li>
            <a href="{{ route('jobs.list') }}" class="nav-link text-white">
                <i class="bi bi-circle-fill"></i> Jobs
            </a>
        </li>
        <li>
            <a href="{{ route('mediaCategories.list') }}" class="nav-link text-white">
                <i class="bi bi-circle-fill"></i> Media Categories
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="bi bi-circle-fill"></i> Media Items
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="bi bi-circle-fill"></i> News
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="bi bi-circle-fill"></i> Workshops
            </a>
        </li>
    </ul>
</div>

<!-- Offcanvas Sidebar for mobile -->
<div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">TANSAM CMS</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <ul class="nav nav-pills flex-column mb-auto p-3">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-white">
                    <i class="bi bi-circle-fill"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('entrepreneurship.list') }}" class="nav-link text-white">
                    <i class="bi bi-circle-fill"></i> Entrepreneurship
                </a>
            </li>
            <li>
                <a href="{{ route('events.list') }}" class="nav-link text-white">
                    <i class="bi bi-circle-fill"></i> Events
                </a>
            </li>
            <li>
                <a href="{{ route('hackathons.list') }}" class="nav-link text-white">
                    <i class="bi bi-circle-fill"></i> Hackathon Events
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-circle-fill"></i> Jobs
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-circle-fill"></i> Media Categories
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-circle-fill"></i> Media Items
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-circle-fill"></i> News
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-circle-fill"></i> Workshops
                </a>
            </li>
        </ul>
    </div>
</div>