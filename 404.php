<?php get_header(); ?>

<div class="container">
    <div class="container-content">

        <div class="row">
            <div class="col-12 col-sm-8">
                <h1>Seite nicht gefunden - Fehler 404</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-8">
                <p>Die von Ihnen gewählte Adresse/URL ist auf unserem Server nicht bzw. nicht mehr vorhanden.</p>

                <p>Möglicherweise haben Sie einen veralteten Link bzw. ein altes Bookmark verwendet. Versuchen Sie den von Ihnen gewünschten Inhalt über unsere Startseite oder über unser Suche zu finden.</p>

                    <p>Sollten Sie noch weitere Fragen zu unserem Angebot haben, so schreiben Sie uns eine E-Mail an <?php echo get_option('admin_email'); ?>.</p>
        <img class="card-img" src="<?php echo get_template_directory_uri(); ?>/images/404.jpeg" alt="Fehlerbild">

            </div>
            <div class="col-12 col-sm-4">
                <div class="card card-widget-primary mb-4">
                    <div class="card-header bg-primary text-white text-uppercase py-1">Suche</div>
                    <div class="card-body">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
