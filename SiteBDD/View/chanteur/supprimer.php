<?php
ob_start(); ?>
        <main class="bg-secondary px-3 py-1">
            <section class="container m-3 p-3 bg-light rounded">
                <h2>Confirmer la suppression</h2>
                <form action="" method="post">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h2>
                                <?php echo $chanteur->nom ?>
                            </h2>
                            <p><?php
                                echo $chanteur->site ?></p>
                        </li>

                    </ul>
                    <div class="p-3">
                        <button type="submit" name="supprimer" class="btn btn-primary">Supprimer</button>
                        <a href="<?php echo $routes->path('chanteur','index'); ?>" class="btn btn-primary">Annuler</a>
                    </div>
                </form>
            </section>
        </main>
<?php
$page_contenu = ob_get_clean();
require 'View/layout.php'; ?>