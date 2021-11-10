<header class="bg-secondary p-3">
    <section class="container m-3 text-light rounded">
        <h1><?php
            echo $page_titre; ?></h1>
        <p><?php
            echo $page_description; ?></p>
    </section>
    <section>
        <nav class="navbar navbar-expand navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?php echo $routes->path('langage', 'index'); ?>">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $routes->path('langage', 'ajouter'); ?>">Ajouter</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $routes->path('chanteur', 'index'); ?>">Chanteurs</a></li>
                
                <li class="nav-item"><a class="nav-link" href="<?php echo $routes->path('chanteur', 'ajouter'); ?>">Ajouter</a></li>
            </ul>

        </nav>
    </section>
</header>