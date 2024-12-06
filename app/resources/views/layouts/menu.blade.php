<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home*') || Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            {{ __('app.home') }}
        </p>
    </a>
</li>

{{-- Charger les menus des packages dynamiquement --}}
@foreach (loadDynamicMenus() as $menu)
    {!! $menu !!}
@endforeach