<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a href="/"><img alt="image" class="rounded-circle" src="img/logo.png"/></a>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="block m-t-xs font-bold">Admin</span>
                    <span class="text-muted text-xs block">Setting <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile">Profile</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img src="https://www.marigoldsalon.in/assets/img/favicon.png">
                </div>
            </li>
            <li class="<?= ($activePage == 'offer') ? 'active':''; ?>">
                <a href="offer"><i class="fa fa-diamond"></i> <span class="nav-label">Set Offer</span></a>
            </li>
            <li class="<?= ($activePage == 'services') ? 'active':''; ?>">
                <a href="services"><i class="fa fa-asterisk"></i><span class="nav-label">Services</span></a>
            </li>
            <li class="<?= ($activePage == 'gallery') ? 'active':''; ?>">
                <a href="gallery"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span></a>
            </li>
        </ul>
    </div>
</nav>