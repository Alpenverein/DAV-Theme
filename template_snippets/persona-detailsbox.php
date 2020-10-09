<div class="persona-detailsbox card bg-dark">
    <div class="row m-3 align-self-stretch">
        <div class="col-12 p-0"><?php echo get_the_post_thumbnail($persona->ID, 'persona-thumb', array('class' => 'img-fluid rounded-circle')) ?></div>
        <div class="col-12 p-0 pt-3 text-center">
            <span class="person-name"><a href="<?php echo get_permalink($persona)?>"><?php echo $persona->post_title ?></a></span><br />
            <?php if($persona_meta['persona_daten_funktion'][0] != ""){ ?>
                <span class="person-title"><?php echo $persona_meta['persona_daten_funktion'][0] ?></span><br />
            <?php } ?>
            <?php if($persona_meta['persona_daten_telefon'][0] != ""){ ?>
                <span class="person-telephone person-title">Telefon: <a href="tel:<?php echo $persona_meta['persona_daten_telefon'][0] ?>"><?php echo $persona_meta['persona_daten_telefon'][0] ?></a></span><br />
            <?php } ?>
            <?php if($persona_meta['persona_daten_e_mail'][0] != ""){ ?>
                <span class="person-email person-title">Mail: <a href="mailto:<?php echo $persona_meta['persona_daten_e_mail'][0] ?>"><?php echo $persona_meta['persona_daten_e_mail'][0] ?></a></span><br />
            <?php } ?>
            <hr>
        </div>
    </div>
    <div class="row m-3" style="margin-top: 0 !important;">
        <div class="col-12 p-0 p-lg-0">
            <p class="person-description"><?php echo get_the_excerpt($persona); ?></p>
        </div>
    </div>
</div>