<?php ob_start(); ?>
        <main class="bg-secondary px-3 py-1">
            <section class="row m-3 p-3 bg-light rounded">
                <figure class="col-2 figure text-center">
                    <img src="images/chanteurs/<?php
                    echo $chanteur->photo; ?>" class="figure-img" alt="..." style="width:100%;">
                    <figcaption class="figure-caption">Logo <?php
                        echo $chanteur->nom; ?></figcaption>
                </figure>
                <div class="col-10">
                    <h2><?php
                        echo $chanteur->nom;
                        echo " ";
                        echo $chanteur->prenom;
                         ?></h2>
                         



                    <a href="<?php
                        echo $chanteur->site; ?>">
                        <?php
                        echo $chanteur->site ?>
                        </a>
                </div>
            </section>
        </main>
<?php
$page_contenu = ob_get_clean();
require 'View/layout.php'; ?>
