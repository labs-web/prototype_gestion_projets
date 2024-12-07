{{-- Ce fichier est maintenu par ESSARRAJ Fouad --}}  

<li class="nav-item has-treeview">
    <a href="#" class="nav-link nav-link {{ Request::is('PkgBlog*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            PkgBlog
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('Category.index') }}" class="nav-link ">
                <i class="nav-icon fas fa-table"></i>
                <p>Category</p>
            </a>
        </li>
    </ul>
</li>


