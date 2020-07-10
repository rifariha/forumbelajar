<li class="{{ Request::is('chapters*') ? 'active' : '' }}">
    <a href="{{ route('chapters.index') }}"><i class="fa fa-book"></i><span>Bab & Materi</span></a>
</li>

<li class="{{ Request::is('messages*') ? 'active' : '' }}">
    <a href="{{ route('messages.index') }}"><i class="fa fa-envelope"></i><span>Kelola Pesan <span class="pull-right-container">
        @if($read != 0)
              <span class="label label-danger pull-right"><?=$read?>
            </span> 
        @endif
        </a>
</li>

<li class="{{ Request::is('forums*') ? 'active' : '' }}">
    <a href="{{ route('forums.index') }}"><i class="fa fa-comments-o"></i><span>Forum Diskusi</span></a>
</li>

@hasanyrole('Superadmin|Admin')
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-users"></i><span>Users</span></a>
</li>

<li class="treeview {{ Request::is('news*') ? 'active menu-open' : '' }}">
    <a href="#">
    <i class="fa fa-newspaper-o"></i><span>Berita</span>
    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('news') ? 'active' : '' }}">
            <a href="{{ route('news.index') }}"><i class="fa fa-reorder"></i><span>Daftar Berita</span></a>
        </li>
        <li class="{{ Request::is('newsCategories*') ? 'active' : '' }}">
            <a href="{{ route('newsCategories.index') }}"><i class="fa fa-map-signs"></i><span>Kategori Berita</span></a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('galleries*') ? 'active' : '' }}">
    <a href="{{ route('galleries.index') }}"><i class="fa fa-camera"></i><span>Dokumentasi</span></a>
</li>

<li class="{{ Request::is('testimonials*') ? 'active' : '' }}">
    <a href="{{ route('testimonials.index') }}"><i class="fa fa-sliders"></i><span>Testimonials</span></a>
</li>

<li class="{{ Request::is('cms*') ? 'active' : '' }}">
    <a href="{{ route('cms.index') }}"><i class="fa fa-gears"></i><span>Cms</span></a>
</li>

<li class="{{ Request::is('backupLogs*') ? 'active' : '' }}">
    <a href="{{ route('backupLogs.index') }}"><i class="fa fa-database"></i><span>Log Backup</span></a>
</li>

@endrole

@role('Superadmin')
<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{{ route('permissions.index') }}"><i class="fa fa-unlock"></i><span>Permissions</span></a>
</li>
<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-smile-o"></i><span>Roles</span></a>
</li>
@endrole

