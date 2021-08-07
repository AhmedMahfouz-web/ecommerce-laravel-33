<div class="left_sidebar">
    <nav class="sidebar">
        <div class="user-info">
            <div class="image"><a href="javascript:void(0);"><img
                        src="{{ asset('dashboard/assets/images/user.png') }}" alt="User"></a></div>
            <div class="detail mt-3">
                <h5 class="mb-0">Mike Thomas</h5>
                <small>Admin</small>
            </div>
        </div>
        <ul id="main-menu" class="metismenu">
            <li class="g_heading">Main</li>
            <li><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i><span>Dashboard</span></a></li>
            <li>
                <a href="javascript:void(0)" {{ Request::is('admin/main_categories/*') ? 'aria-expanded="true"' : '' }}
                    class="has-arrow"><i class="fa fa-th-large" aria-hidden="true"></i><span>Main Categories</span>
                    <span
                        class="badge badge badge-primary badge-pill mr-3 float-right">{{ App\Models\MainCategories::where('active', 1)->where('translation_lang', get_locale_language())->count() }}</span>
                </a>
                <ul {{ Request::is('admin/main_categories/*') ? 'aria-expanded="true"' : '' }}>
                    <li><a href="{{ route('admin.mainCategories') }}">Show all</a></li>
                    <li><a href="{{ route('admin.mainCategories.create') }}">Add New</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)" {{ Request::is('admin/languages/*') ? 'aria-expanded="true"' : '' }}
                    class="has-arrow"><i class="fa fa-language" aria-hidden="true"></i><span>Languages</span>
                    <span
                        class="badge badge badge-primary badge-pill mr-3 float-right">{{ App\Models\Languages::Active()->count() }}</span>
                </a>
                <ul {{ Request::is('admin/languages/*') ? 'aria-expanded="true"' : '' }}>
                    <li><a href="{{ route('admin.languages') }}">Show all</a></li>
                    <li><a href="{{ route('admin.languages.create') }}">Add New</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
