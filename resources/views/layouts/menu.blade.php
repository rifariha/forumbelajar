<li class="{{ Request::is('chapters*') ? 'active' : '' }}">
    <a href="{{ route('chapters.index') }}"><i class="fa fa-edit"></i><span>Chapters</span></a>
</li>

@hasanyrole('Superadmin|Admin')
@endrole

<li class="{{ Request::is('forums*') ? 'active' : '' }}">
    <a href="{{ route('forums.index') }}"><i class="fa fa-edit"></i><span>Forums</span></a>
</li>

<li class="{{ Request::is('galleries*') ? 'active' : '' }}">
    <a href="{{ route('galleries.index') }}"><i class="fa fa-edit"></i><span>Galleries</span></a>
</li>

<li class="{{ Request::is('messages*') ? 'active' : '' }}">
    <a href="{{ route('messages.index') }}"><i class="fa fa-edit"></i><span>Messages</span></a>
</li>

<li class="{{ Request::is('news*') ? 'active' : '' }}">
    <a href="{{ route('news.index') }}"><i class="fa fa-edit"></i><span>News</span></a>
</li>

<li class="{{ Request::is('newsCategories*') ? 'active' : '' }}">
    <a href="{{ route('newsCategories.index') }}"><i class="fa fa-edit"></i><span>News Categories</span></a>
</li>

<li class="{{ Request::is('sliders*') ? 'active' : '' }}">
    <a href="{{ route('sliders.index') }}"><i class="fa fa-edit"></i><span>Sliders</span></a>
</li>

<li class="{{ Request::is('topics*') ? 'active' : '' }}">
    <a href="{{ route('topics.index') }}"><i class="fa fa-edit"></i><span>Topics</span></a>
</li>

<li class="{{ Request::is('topicLessons*') ? 'active' : '' }}">
    <a href="{{ route('topicLessons.index') }}"><i class="fa fa-edit"></i><span>Topic Lessons</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

@role('Superadmin')
<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{{ route('permissions.index') }}"><i class="fa fa-edit"></i><span>Permissions</span></a>
</li>
<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>
@endrole

<li class="{{ Request::is('backupLogs*') ? 'active' : '' }}">
    <a href="{{ route('backupLogs.index') }}"><i class="fa fa-edit"></i><span>Backup Logs</span></a>
</li>

<li class="{{ Request::is('cms*') ? 'active' : '' }}">
    <a href="{{ route('cms.index') }}"><i class="fa fa-edit"></i><span>Cms</span></a>
</li>

