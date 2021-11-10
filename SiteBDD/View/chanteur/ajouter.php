<?php
ob_start(); ?>
        <main class="bg-secondary px-3 py-1">
            <section class="container m-3 p-3 bg-light rounded">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="col input-group mb-3">
                        <label class="input-group-text">Nom</label>
                        <input type="text" name="nom" class="form-control">
                    </div>
                    <div class="col input-group mb-3">
                        <label class="input-group-text">Prenom</label>
                        <input type="text" name="prenom" class="form-control">
                    </div>

                    <div class="col input-group mb-3">
                        <label class="input-group-text">Site</label>
                        <input type="text" name="site" class="form-control">
                    </div>

                    <div class="col input-group mb-3">
                        <label class="input-group-text">Logo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <div class="col-2">
                        <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
                    </div>

                </form>
            </section>
        </main>
<?php
$page_contenu = ob_get_clean();
require 'View/layout.php'; ?>