<?php
ob_start(); ?>
        <main class="bg-secondary px-3 py-1">
            <section class="container m-3 p-3 bg-light rounded">
                <h2>Modification</h2>
                <form action="" method="post">
                    <div class="col input-group mb-3">
                        <span class="input-group-text">Langage</span>
                        <input value="<?php
                        echo $langage->titre; ?>" type="text" name="titre" class="form-control">
                    </div>

                    <div class="col input-group mb-3">
                        <span class="input-group-text">Resume</span>
                        <input value="<?php
                        echo $langage->resume; ?>" type="text" name="resume" class="form-control">
                    </div>
                    <div class="p-3">
                        <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
                        <a href="<?php echo $routes->path('langage','index'); ?>" class="btn btn-primary">Annuler</a>
                    </div>
                </form>
            </section>
        </main>
<?php
$page_contenu = ob_get_clean();
require 'View/layout.php'; ?>