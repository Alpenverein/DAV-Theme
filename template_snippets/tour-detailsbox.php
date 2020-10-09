<div class="tour-detailsbox card card-price bg-light mb-3">
    <div class="card-header bg-dark pt-1">
        <h2>Tourendetails</h2>
    </div>
    <div class="card-body">
        <div class="price-body pt-2">
            <p class="lead text-left"><strong>
            <?php echo substr(get_field('acf_tourstartdate'),0,2).'.'.substr(get_field('acf_tourstartdate'),3,2).'.'.substr(get_field('acf_tourstartdate'),6,4);
            if((get_field('acf_tourstartdate') != '') && (get_field('acf_tourallday') == 1)) {
                echo ' - ';
                echo substr(get_field('acf_tourenddate'),0,2).'.'.substr(get_field('acf_tourenddate'),3,2).'.'.substr(get_field('acf_tourenddate'),6,4);
            } ?></strong></p>

            <?php

                if (get_field('acf_tourtreffzeit') != "") {
                    echo '<p class="lead"><strong>' . get_field("acf_tourtreffzeit") .' Uhr</strong></p>';
                }

                if (get_field('tour_intern') != "") {
                    echo '<div class="tour_intern d-flex mb-2"><div>Tourenkennung: <br><strong>'.get_field("tour_intern").' </strong></div></div>';
                }

                if (get_field('acf_tourtreffpunkt') != "") {
                    echo '<div class="tour_treffpunkt d-flex mb-2"><div>Treffpunkt: <br><strong>'.get_field("acf_tourtreffpunkt").' </strong></div></div>';
                }

                if (get_field('acf_tourtime') != "") {
                    echo '<div class="tour_time d-flex mb-2"><div>Dauer: <br><strong>'.get_field("acf_tourtime").' h</strong></div></div>';
                }

                if (get_field('acf_tourkilometer') != "") {
                    echo '<div class="tour_kilometer d-flex mb-2"><div>Kilometer: <br><strong>'.get_field("acf_tourkilometer").'</strong></div></div>';
                }

                if (get_field('acf_tourhohenmeter') != "") {
                    echo '<div class="tour_hohenmeter d-flex mb-2"><div>Höhenmeter: <br><strong>'.get_field("acf_tourhohenmeter").'</strong></div></div>';
                }

                if ($tour_condition != "") {
                    echo '<div class="tour_condition d-flex mb-2"><div>Kondition: <br><strong>'.$tour_condition.'</strong></div></div>';
                }

                if ($tour_technic != "") {
                    echo '<div class="tour_technic d-flex mb-2"><div>Technik: <br><strong>'.$tour_technic.'</strong></div></div>';
                }
                        
                ?>
        </div>
    </div>
</div>