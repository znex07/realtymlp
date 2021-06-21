<nav class="navbar navbar-inverse navbar-fixed-top topnav" role="navigation">
    <div class="topnav container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>                
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand user" data-toggle="offcanvas" ><i class="fa fa-user"></i></a>
            <a class="navbar-brand" href="/">REALTYMLP</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            @if(Auth::user())
            <ul class="nav navbar-nav navbar-right">              
              <li><a href="/dashboard/account/"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
              <li><a href="/auth/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>              
            </ul>
            @else
             <ul class="nav navbar-nav navbar-right">              
              <li><a href="/dashboard/account/"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
              <li><a href="/auth/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>              
            </ul>

            @endif
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
