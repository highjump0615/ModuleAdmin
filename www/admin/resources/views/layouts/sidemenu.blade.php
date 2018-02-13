
<nav class="navbar-default navbar-static-side" role="navigation">

    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            {{-- Hedaer --}}
            <li class="nav-header">
                <div >
                    <a href="#">
                        <span class="clear"> <span class="block"> <strong class="title font-bold">Care4D Admin</strong>
                            </span></span>
                    </a>
                </div>
                <div class="logo-element">
                    &nbsp;
                </div>
            </li>
            {{-- Module --}}
            <li @if ($menu == "module") class="active" @endif>
                <a href="{{url('/')}}">
                    <i class="fa fa-cubes"></i>
                    <span class="nav-label">Modules</span>
                </a>
            </li>
        </ul>
    </div>

</nav>