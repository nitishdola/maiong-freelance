<nav class="navbar   navbar-site navbar-default" role="navigation">
   <div class="container">
      <div class="navbar-header">
         <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
         <a href="job-home.html" class="navbar-brand logo logo-title">
         <span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span>
         JOB<span>CLASSIFIED </span> </a>
      </div>
      <div class="navbar-collapse collapse">
         <ul class="nav navbar-nav navbar-left">
            <li><a href="job-list.html">Browse Jobs</a></li>
            <li><a href="{{ route('projects.create') }}">Post a Job</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
            
            
            @if (Auth::check())
            <li class="dropdown">
                <a href="#" class="btn btn-block btn-border btn-post btn-danger dropdown-toggle clear-dropdocn-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!! Helper::loggedInClientInfo()->name !!} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>
                   <li><a href="#"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                   
                   <li class="divider"></li>
                   <li><a href="{{ route('user.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                </ul>
              </li>
            @else
               <li><a href="{{ route('user.login') }}">Login</a></li>
               <li><a href="{{ route('user.register') }}">Sign Up</a></li>
               <li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger" href="job-post.html">Post A Job</a></li>
            @endif


         </ul>
      </div>
   </div>
</nav>