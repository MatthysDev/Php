<?php ob_start(); ?>
        <main class="bg-secondary px-3 py-1">
            <section class="row m-3 p-3 bg-light rounded">
                <figure class="col-2 figure text-center">
                    <img src="images/<?php
                    echo $langage->logo; ?>" class="figure-img" alt="..." style="width:100%;">
                    <figcaption class="figure-caption">Logo <?php
                        echo $langage->titre; ?></figcaption>
                </figure>
                <div class="col-10">
                    <h2><?php
                        echo $langage->titre; ?></h2>
                    <p><?php
                        echo $langage->resume; ?></p>
                </div>
            </section>
        </main>
<?php
$page_contenu = ob_get_clean();
require 'View/layout.php'; ?>
