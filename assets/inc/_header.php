
    <nav class="navbar navbar-area navbar-expand-lg navbar-light bg-zoo " >
        <div class="container"  >
        <div class="navbar-header">
            <a class="navbar-brand logo" href="/">
                <img src="assets/img/logo/logo.png" alt="SharvRaj Eco Farm Goa">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav">
                <li class="nav-item <?= ($activePage == 'index') ? 'active':'' ?>">
                    <a class="nav-link" href="index">Home </a>
                </li>
                <li class="nav-item <?= ($activePage == 'about') ? 'active':'' ?>">
                    <a class="nav-link" href="about">About </a>
                </li>
                <li class="nav-item <?= ($activePage == 'packages') ? 'active':'' ?>">
                    <a class="nav-link" href="packages">Packages </a>
                </li>
                <li class="nav-item <?= ($activePage == 'offers') ? 'active':'' ?>">
                    <a class="nav-link" href="offers">Offers </a>
                </li>
                 <li class="nav-item <?= ($activePage == 'Adventure') ? 'active':'' ?>">
                    <a class="nav-link" href="Adventure">Adventure ride </a>
                </li>
                   <li class="nav-item <?= ($activePage == 'water-fall') ? 'active':'' ?>">
                    <a class="nav-link" href="water-fall">Water Park </a>
                </li>
                   <li class="nav-item <?= ($activePage == 'thrill-ride') ? 'active':'' ?>">
                    <a class="nav-link" href="thrill-ride">Thrill Ride </a>
                </li>
                <li class="nav-item <?= ($activePage == 'gallery') ? 'active':'' ?>">
                    <a class="nav-link" href="gallery">Gallery </a>
                </li>
                <li class="nav-item <?= ($activePage == 'contact') ? 'active':'' ?>">
                    <a class="nav-link" href="contact">Contact </a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
