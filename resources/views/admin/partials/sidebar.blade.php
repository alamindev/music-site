<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('admin.home') ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}"><i class="menu-icon fa fa-dashboard"></i> Dashboard </a>
                </li> 
          
                {{--  <li class="{{ Route::is('zipcode') ? 'active' : '' }}">
                    <a href="{{ route('zipcode') }}"><i class="menu-icon fa fa-grav"></i> Zipcode </a>
                </li> 
                <li class="{{ Route::is('serviceCategory') ? 'active' : '' }}">
                    <a href="{{ route('serviceCategory') }}"><i class="menu-icon fa fa-meetup"></i> Service Categories </a>
                </li> 
                <li class="{{ (Route::is('services') || Route::is('services.create')) ? 'active' : '' }}">
                    <a href="{{ route('services') }}"><i class="menu-icon fa fa-server"></i> Services </a>
                </li> 
                <li class="{{ (Route::is('galleries') || Route::is('gallery.create')) ? 'active' : '' }}">
                    <a href="{{ route('galleries') }}"><i class="menu-icon fa fa-photo"></i> Galleries </a>
                </li> 
                <li class="{{ (Route::is('pages') || Route::is('page.create')) ? 'active' : '' }}">
                    <a href="{{ route('pages') }}"><i class="menu-icon fa fa-address-book-o "></i> Pages </a>
                </li> --}}
                <li class="{{ Route::is('socialinfos') ? 'active' : '' }}">
                    <a href="{{ route('socialinfos') }}"><i class="menu-icon fa fa-share-square-o "></i> Social & address </a>
                </li> 
                <li class="{{ Route::is('setting') ? 'active' : '' }}">
                    <a href="{{ route('setting') }}"><i class="menu-icon fa fa-cogs"></i> Setting </a>
                </li>   
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>