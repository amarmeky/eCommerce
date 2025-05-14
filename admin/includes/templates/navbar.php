<nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-nav" aria-controls="app-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand  " href="#"><?php echo lang('ADMAIN_HOME') ?> </a>

    <div class="collapse navbar-collapse " id="app-nav">
        <ul class="nav navbar-nav  ">
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo lang('CATEGORES') ?> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="items.php"><?php echo lang('ITEMS') ?> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="members.php"><?php echo lang('MEMBERS') ?> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo lang('STATISTICS') ?> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo lang('LOGS') ?> </a>
            </li>
        </ul>
        <ul class=" nav navbar-nav  navbar-right ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo lang('PROFILE') ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="members.php?do=Edit&id=<?php echo $_SESSION['id'] ?>"><?php echo lang('EDIT_PROFILE') ?></a>
                    <a class="dropdown-item" href="#"><?php echo lang('SETTINGS') ?></a>
                    <a class="dropdown-item" href="logout.php"><?php echo lang('LOGOUT') ?></a>
                </div>
            </li>
        </ul>
    </div>
</nav>