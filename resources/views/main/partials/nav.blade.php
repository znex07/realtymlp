    <nav class="navbar nav-landing navbar-inverse navbar-fixed-top topnav" role="navigation">
    <div class="topnav container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand " href="/">REALTYMLP</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            @if(Auth::user())
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/properties/regular" class='nav-properties'>Properties</a></li>
                    <li><a href="/projects" class='nav-projects'>Projects</a></li>
                    <li><a href='/agents' class='nav-agents'>Agents</a></li>
                    <li><a href="/dashboard/overview" class='nav-dashboard'>Dashboard</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <b class="caret"></b></a>
                        <span class="dropdown-arrow"></span>
                        <ul class="dropdown-menu">
                            <li><a href="/dashboard/account/upgrade">Upgrade Account</a></li>
                            <li class="divider"></li>
                            <li><a href="/dashboard/account/">Account Profile</a></li>
                            <li><a href="/dashboard/account/ledger">Ledger</a></li>
                            <li><a href="/dashboard/account/password">Change Password</a></li>
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right" style="padding-right: 50px;">
                    <li><a href="/properties/regular" class='nav-properties'>Properties</a></li>
                    <li><a href="/projects" class='nav-projects'>Projects</a></li>
                    <li><a href='/agents/public' class='nav-agents'>Agents</a></li>
                    <li><a href='/auth/register' class='nav-register'>Register</a></li>
                    <li><a href='/auth/login' class='nav-login'>Login</a></li>
                </ul>

            @endif
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
