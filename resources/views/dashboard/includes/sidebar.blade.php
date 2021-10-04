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

            {{-- Vendors --}}
            <li>
                <a href="javascript:void(0)" {{ Request::is('admin/vendors/*') ? 'aria-expanded="true"' : '' }}
                    class="has-arrow"><i class="fas fa-store-alt"></i><span>Vendors</span>

                    @php
                        $vendors_count = App\Models\Vendor::where('active', 1)->count();
                    @endphp

                    <span
                        class="badge badge @if ($vendors_count == 0) badge-danger @elseif($vendors_count > 0 && $vendors_count < 11)
                    badge-primary @elseif($vendors_count > 10) badge-success @endif badge-pill
                        mr-3 float-right">
                        {{ $vendors_count }}
                    </span>
                </a>
                <ul {{ Request::is('admin/vendors/*') ? 'aria-expanded="true"' : '' }}>
                    <li><a href="{{ route('admin.vendors') }}">Show all</a></li>
                    <li><a href="{{ route('admin.vendors.create') }}">Add Vendor</a></li>
                </ul>
            </li>

            {{-- Main Categories --}}
            <li>
                <a href="javascript:void(0)"
                    {{ Request::is('admin/main_categories/*') ? 'aria-expanded="true"' : '' }}
                    class="has-arrow"><i class="fa fa-th-large" aria-hidden="true"></i><span>Main Categories</span>

                    @php
                        $categories_count = App\Models\MainCategories::where('active', 1)
                            ->where('translation_lang', get_locale_language())
                            ->count();
                    @endphp

                    <span
                        class="badge badge  @if ($categories_count == 0) badge-danger @elseif($categories_count > 0 && $categories_count < 11)
                 badge-primary @elseif($categories_count > 10) badge-success @endif badge-pill
                        mr-3 float-right">
                        {{ $categories_count }}
                    </span>
                </a>
                <ul {{ Request::is('admin/main_categories/*') ? 'aria-expanded="true"' : '' }}>
                    <li><a href="{{ route('admin.mainCategories') }}">Show all</a></li>
                    <li><a href="{{ route('admin.mainCategories.create') }}">Add Category</a></li>
                </ul>
            </li>

            {{-- Sub Categories --}}
            <li>
                <a href="javascript:void(0)"
                    {{ Request::is('admin/sub_categories/*') ? 'aria-expanded="true"' : '' }}
                    class="has-arrow"><i class="fas fa-th"></i><span>Sub Categories</span>

                    @php
                        $categories_count = App\Models\SubCategories::where('active', 1)
                            ->where('translation_lang', get_locale_language())
                            ->count();
                    @endphp

                    <span
                        class="badge badge  @if ($categories_count == 0) badge-danger @elseif($categories_count > 0 && $categories_count < 11)
                    badge-primary @elseif($categories_count > 10) badge-success @endif badge-pill
                        mr-3 float-right">
                        {{ $categories_count }}
                    </span>
                </a>
                <ul {{ Request::is('admin/sub_categories/*') ? 'aria-expanded="true"' : '' }}>
                    <li><a href="{{ route('admin.subCategories') }}">Show all</a></li>
                    <li><a href="{{ route('admin.subCategories.create') }}">Add Category</a></li>
                </ul>
            </li>

            {{-- Products --}}
            <li>
                <a href="javascript:void(0)" {{ Request::is('/admin/products/*') ? 'aria-expanded="true"' : '' }}
                    class="has-arrow"><i class="fas fa-box-open"></i><span>Products</span>

                    @php
                        $products_count = App\Models\Product::count();
                    @endphp

                    <span
                        class="badge badge  @if ($products_count == 0) badge-danger @elseif($products_count > 0 && $categories_count < 11)
                     badge-primary @elseif($products_count > 10) badge-success @endif badge-pill
                        mr-3 float-right">
                        {{ $products_count }}
                    </span>
                </a>
                <ul {{ Request::is('/admin/products/*') ? 'aria-expanded="true"' : '' }}>
                    <li><a href="{{ route('admin.products') }}">Show all</a></li>
                    <li><a href="{{ route('admin.products.create') }}">Add Product</a></li>
                </ul>
            </li>

            {{-- Languages --}}
            <li>
                <a href="javascript:void(0)" {{ Request::is('admin/languages/*') ? 'aria-expanded="true"' : '' }}
                    class="has-arrow"><i class="fa fa-language" aria-hidden="true"></i><span>Languages</span>

                    @php
                        $languages_count = App\Models\Languages::Active()->count();
                    @endphp

                    <span
                        class="badge badge @if ($languages_count == 0) badge-danger @elseif($languages_count > 0 && $languages_count < 11)
                badge-primary @elseif($languages_count > 10) badge-success @endif badge-pill mr-3
                        float-right">
                        {{ $languages_count }}
                    </span>
                </a>
                <ul {{ Request::is('admin/languages/*') ? 'aria-expanded="true"' : '' }}>
                    <li><a href="{{ route('admin.languages') }}">Show all</a></li>
                    <li><a href="{{ route('admin.languages.create') }}">Add Language</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
