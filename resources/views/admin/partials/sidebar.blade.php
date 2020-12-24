<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('admin.home') ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}"><i class="menu-icon fa fa-dashboard"></i> Dashboard </a>
                </li> 
                <li class="{{ Route::is('book') ? 'active' : '' }}">
                    <a href="{{ route('book') }}"><i class="menu-icon fa fa-book"></i> Books </a>
                </li> 
                <li class="{{ Route::is('instrument') ? 'active' : '' }}">
                    <a href="{{ route('instrument') }}"><i class="menu-icon fa fa-bullseye"></i> Instruments </a>
                </li> 
                <li class="{{ Route::is('exercise') ? 'active' : '' }}">
                    <a href="{{ route('exercise') }}"><i class="menu-icon fa fa-eercast"></i> Exercise </a>
                </li> 
                <li class="{{ Route::is('banner') ? 'active' : '' }}">
                    <a href="{{ route('banner') }}"><i class="menu-icon fa fa-bandcamp"></i> Banner </a>
                </li>  
                 <li class="{{ (Route::is('pages') || Route::is('page.create')) ? 'active' : '' }}">
                    <a href="{{ route('pages') }}"><i class="menu-icon fa fa-address-book-o "></i> Pages </a>
                </li>
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