<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ \Request::is('*edit') ? 'active' : '' }}" href="{{ route('admin.users.edit', $userId) }}">Informações</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ \Request::is('*profile') ? 'active' : '' }}" href="{{ route('admin.users.profile.edit', $userId) }}">Perfil</a>
    </li>
</ul>
<div class="tab-content col-md-12">
    {!! $slot !!}
</div>