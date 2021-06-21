<ul class='nav nav-tabs'>
    <li class='{{ $tab === "all" ? "active" : ""}}'>
        <a href='/dashboard'><span class='fa fa-list'></span> All</a>
    </li>
    <li class='{{ $tab === "public" ? "active" : ""}}'>
        <a href='/dashboard?posts=public'><span class='fa fa-users'></span> Public</a>
    </li>
    <li class='{{ $tab === "private" ? "active" : ""}}'>
        <a href='/dashboard?posts=private'><span class='fa fa-lock'></span> Private</a>
    </li>
    <li class='{{ $tab === "shared" ? "active" : ""}}'>
        <a href='/dashboard?posts=shared'><span class='fa fa-share-alt'></span> Shared</a>
    </li>
    <li class='{{ $tab === "shared" ? "active" : ""}}'>
        <a href='/dashboard?posts=shared'><span class='fa fa-share-alt'></span> Shared</a>
    </li>
</ul>
