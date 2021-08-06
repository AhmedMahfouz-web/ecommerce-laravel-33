{{-- <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a href="{{route('admin.dashboard')}}">
<i class="la la-home"></i>
<span class="menu-title" data-i18n="nav.dash.main">Dashboard</span> --}}

{{--------------------- Number badge ------------------}}

{{-- <span class="badge badge badge-info badge-pill float-right">3</span> --}}

{{--------------------- Number badge ------------------}}
{{-- 
                </a>
            </li>
            <li class=" nav-item">
                <a href="#">
                    <i class="la la-television"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">Site Languages</span>
                    <span
                        class="badge badge badge-info badge-pill mr-2 float-right">{{App\Models\Languages::count()}}</span>
</a>
<ul class="menu-content">
    <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main">Vertical</a>
        <ul class="menu-content">
            <li><a class="menu-item" href="../vertical-menu-template"
                    data-i18n="nav.templates.vert.classic_menu">Classic Menu</a>
            </li>
            <li><a class="menu-item" href="../vertical-modern-menu-template">Modern Menu</a>
            </li>
            <li><a class="menu-item" href="../vertical-compact-menu-template"
                    data-i18n="nav.templates.vert.compact_menu">Compact Menu</a>
            </li>
            <li><a class="menu-item" href="../vertical-content-menu-template"
                    data-i18n="nav.templates.vert.content_menu">Content Menu</a>
            </li>
            <li><a class="menu-item" href="../vertical-overlay-menu-template"
                    data-i18n="nav.templates.vert.overlay_menu">Overlay Menu</a>
            </li>
        </ul>
    </li>
    <li><a class="menu-item" href="#" data-i18n="nav.templates.horz.main">Horizontal</a>
        <ul class="menu-content">
            <li><a class="menu-item" href="../horizontal-menu-template"
                    data-i18n="nav.templates.horz.classic">Classic</a>
            </li>
            <li><a class="menu-item" href="../horizontal-menu-template-nav" data-i18n="nav.templates.horz.top_icon">Full
                    Width</a>
            </li>
        </ul>
    </li>
</ul>
</li>
</ul>
</div>
</div> --}}
<div class="left_sidebar">
    <nav class="sidebar">
        <div class="user-info">
            <div class="image"><a href="javascript:void(0);"><img src="{{ asset("dashboard/assets/images/user.png") }}"
                        alt="User"></a></div>
            <div class="detail mt-3">
                <h5 class="mb-0">Mike Thomas</h5>
                <small>Admin</small>
            </div>
        </div>
        <ul id="main-menu" class="metismenu">
            <li class="g_heading">Main</li>
            <li><a href="{{route('admin.dashboard')}}"><i class="ti-home"></i><span>Dashboard</span></a></li>
            <li>
                <a href="javascript:void(0)" {{Request::is('admin/main_categories/*') ? 'aria-expanded="true"' : ''}}
                    class="has-arrow"><i class="fa fa-th-large" aria-hidden="true"></i><span>Main Categories</span>
                    <span
                        class="badge badge badge-primary badge-pill mr-3 float-right">{{App\Models\MainCategories::where('active', 1)->where('translation_lang', get_locale_language())->count()}}</span>
                </a>
                <ul {{Request::is('admin/main_categories/*') ? 'aria-expanded="true"' : ''}}>
                    <li><a href="{{ route('admin.mainCategories') }}">Show all</a></li>
                    <li><a href="{{ route('admin.mainCategories.create') }}">Add New</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)" {{Request::is('admin/languages/*') ? 'aria-expanded="true"' : ''}}
                    class="has-arrow"><i class="fa fa-language" aria-hidden="true"></i><span>Languages</span>
                    <span
                        class="badge badge badge-primary badge-pill mr-3 float-right">{{App\Models\Languages::Active()->count()}}</span>
                </a>
                <ul {{Request::is('admin/languages/*') ? 'aria-expanded="true"' : ''}}>
                    <li><a href="{{ route('admin.languages') }}">Show all</a></li>
                    <li><a href="{{ route('admin.languages.create') }}">Add New</a></li>
                </ul>
            </li>
            <li class="g_heading">Application</li>
            <li><a href="app-calendar.html"><i class="ti-calendar"></i><span>Calendar</span></a></li>
            <li><a href="app-taskboard.html"><i class="ti-notepad"></i><span>TaskBoard</span></a></li>
            <li><a href="app-inbox.html"><i class="ti-email"></i><span>Inbox</span></a></li>
            <li><a href="app-chat.html"><i class="ti-comments"></i><span>Chat Apps</span></a></li>
            <li><a href="app-contact.html"><i class="ti-id-badge"></i><span>Contact List</span></a></li>
            <li><a href="widgets.html"><i class="ti-widget"></i><span>Widgets</span></a></li>
            <li class="g_heading">Chart, Froms & Elements</li>
            <li>
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-pie-chart"></i><span>Charts</span></a>
                <ul>
                    <li><a href="chart-c3.html">C3 Chart</a></li>
                    <li><a href="chartsjs.html">Charts JS</a></li>
                    <li><a href="chart-flot.html">Flot Chart</a></li>
                    <li><a href="chart-knob.html">JQuery Knob</a></li>
                    <li><a href="chart-morris.html">Morris Chart</a></li>
                    <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-pencil-alt"></i><span>Forms</span></a>
                <ul>
                    <li><a href="form-elements.html">Basic Elements</a></li>
                    <li><a href="form-advanced.html">Advanced Elements</a></li>
                    <li><a href="form-validation.html">Form Validation</a></li>
                    <li><a href="form-wizard.html">Form Wizard</a></li>
                    <li><a href="form-summernote.html">Summernote</a></li>
                    <li><a href="form-markdown.html">Markdown</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-view-list"></i><span>Tables</span></a>
                <ul>
                    <li><a href="table-basic.html">Table Example</a></li>
                    <li><a href="table-normal.html">Table Normal</a></li>
                    <li><a href="table-datatable.html">Jquery Datatable</a></li>
                    <li><a href="table-editable.html">Table Editable</a></li>
                    <li><a href="table-foo.html">Table Foo</a></li>
                </ul>
            </li>
            <li class="g_heading">Users</li>
            <li><a href="page-profile.html"><i class="ti-user"></i><span>Profile</span></a></li>
            <li><a href="page-timeline.html"><i class="ti-menu-alt"></i><span>Timeline</span></a></li>
            <li><a href="page-invoices.html"><i class="ti-file"></i><span>Invoices</span></a>
            </li>
            <li class="g_heading">Authentication</li>
            <li>
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-lock"></i><span>Authentication</span></a>
                <ul>
                    <li><a class="dropdown-item" href="auth-login.html">Login</a></li>
                    <li><a class="dropdown-item" href="auth-register.html">Register</a></li>
                    <li><a class="dropdown-item" href="auth-forgot-password.html">Forgot password</a></li>
                    <li><a class="dropdown-item" href="auth-lock-screen.html">Lock Screen</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-na"></i><span>Error Pages</span></a>
                <ul>
                    <li><a class="dropdown-item" href="error-400.html">400 error</a></li>
                    <li><a class="dropdown-item" href="error-401.html">401 error</a></li>
                    <li><a class="dropdown-item" href="error-403.html">403 error</a></li>
                    <li><a class="dropdown-item" href="error-404.html">404 error</a></li>
                    <li><a class="dropdown-item" href="error-500.html">500 error</a></li>
                    <li><a class="dropdown-item" href="error-503.html">503 error</a></li>
                </ul>
            </li>
            <li class="g_heading">Extra</li>
            <li class="active">
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-clipboard"></i><span>Pages</span></a>
                <ul>
                    <li class="active"><a href="page-empty.html">Empty page</a></li>
                    <li><a href="page-pricing.html">Pricing cards</a>
                    <li><a href="page-search.html">Search Results</a></li>
                    <li><a href="page-testimonials.html">Testimonials</a></li>
                    <li><a href="page-icons.html">Icons</a></li>
                    <li><a href="page-gallery.html">Gallery</a></li>
                </ul>
            </li>
            <li><a href="docs/introduction.html"><i class="ti-file"></i><span>Documentation</span></a></li>
        </ul>
    </nav>
</div>
