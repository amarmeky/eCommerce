<nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-nav" aria-controls="app-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mx-4" id="app-nav">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link" href="#" ><?php echo lang('Admin_home')?> </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo lang('Categorys')?> </a>
            </li>
        </ul>
        <ul class="navbar-nav ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo lang('profile')?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><?php echo lang('Edit_Profile')?></a>
                    <a class="dropdown-item" href="#"><?php echo lang('Setting')?></a>
                    <a class="dropdown-item" href="#"><?php echo lang('Logout')?></a>
                </div>
            </li>
        </ul>
    </div>
</nav>