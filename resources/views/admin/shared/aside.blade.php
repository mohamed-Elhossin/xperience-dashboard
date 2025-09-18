<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-heading">Pages</li>
        <hr>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('profile.edit') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <hr>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('owners.index') }}">
                <i class="bi bi-person"></i>
                <span> Owners </span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('employees.index') }}">
                <i class="bi bi-person"></i>
                <span> Employees </span>
            </a>
        </li><!-- End Profile Page Nav -->
        <hr>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('pay-courses.index') }}">
                <i class="bi bi-person"></i>
                <span>Courses</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('sections.index') }}">
                <i class="bi bi-person"></i>
                <span>Section Courses </span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('section_contents.index') }}">
                <i class="bi bi-person"></i>
                <span>Section Content</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <hr>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('fields.index') }}">
                <i class="bi bi-person"></i>
                <span>Fields</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('instructors.index') }}">
                <i class="bi bi-person"></i>
                <span>Instructors Applying</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <hr>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('reals.index') }}">
                <i class="bi bi-person"></i>
                <span> Reals</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('partners.index') }}">
                <i class="bi bi-person"></i>
                <span>
                    Partners
                </span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('contacts.index') }}">
                <i class="bi bi-person"></i>
                <span>
                    Contacts
                </span>
            </a>
        </li><!-- End Profile Page Nav -->
                <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('feedback.index') }}">
                <i class="bi bi-person"></i>
                <span>
                    Feedback
                </span>
            </a>
        </li><!-- End Profile Page Nav -->
    </ul>

</aside><!-- End Sidebar-->
