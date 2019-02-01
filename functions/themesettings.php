<?php
/**
 * Filename: themesettings.php
 * Description:
 *
 * User: Stephan Mitteldorf
 * Date: 17.08.18
 * Time: 08:09
 */


//add a new element to Design-Menu
add_action('admin_menu','my_admin_menu');


/**
 * This function register the menu-element at the theme-menu
 */
function my_admin_menu() {
    add_theme_page('Design-Festlegungen','Template','edit_theme_options','dav_themedesign_options','themedesign_admin_page');
}



function on_myplugin_start () {
    register_setting('dav_theme_settings', 'dav_menue_intern_link');
    register_setting('dav_theme_settings', 'dav_menue_intern_text');
    register_setting('dav_theme_settings', 'dav_menue_phone');
    register_setting('dav_theme_settings', 'dav_menue_button1_text');
    register_setting('dav_theme_settings', 'dav_menue_button1_link');
    register_setting('dav_theme_settings', 'dav_menue_button2_text');
    register_setting('dav_theme_settings', 'dav_menue_button2_link');
    register_setting('dav_theme_settings', 'dav_menue_mitglied_link');
    register_setting('dav_theme_settings', 'dav_breadcrumb');
    register_setting('dav_theme_settings', 'dav_excerpt_length');
    register_setting('dav_theme_settings', 'dav_menu_width');
    register_setting('dav_theme_settings', 'dav_menu_color');
    register_setting('dav_theme_settings', 'dav_menu_behavior');
    register_setting('dav_theme_settings', 'dav_instagram');
    register_setting('dav_theme_settings', 'dav_twitter');
    register_setting('dav_theme_settings', 'dav_facebook');
}

add_action('admin_init','on_myplugin_start');

function themedesign_admin_page(){

    //socialmedia-links
    if(get_option('dav_facebook') != false) {$dav_facebook = get_option('dav_facebook');} else {$dav_facebook = "";};
    if(get_option('dav_instagram') != false) {$dav_instagram = get_option('dav_instagram');} else {$dav_instagram = "";};
    if(get_option('dav_twitter') != false) {$dav_twitter = get_option('dav_twitter');} else {$dav_twitter = "";};


    //external links, phone and internal link
    if(get_option('dav_menue_intern_link') != false) {$dav_intern_link = get_option('dav_menue_intern_link');} else {$dav_intern_link = "";};
    if(get_option('dav_menue_intern_text') != false) {$dav_intern_text = get_option('dav_menue_intern_text');} else {$dav_intern_text = "";};
    if(get_option('dav_menue_link') != false) {$dav_link = get_option('dav_menue_link');} else {$dav_link = "";};
    if(get_option('dav_menue_phone') != false) {$dav_phone = get_option('dav_menue_phone');} else {$dav_phone = "";};
    if(get_option('dav_menue_button1_text') != false) {$dav_menueb1_text = get_option('dav_menue_button1_text');} else {$dav_menueb1_text = "";};
    if(get_option('dav_menue_button1_link') != false) {$dav_menueb1_link = get_option('dav_menue_button1_link');} else {$dav_menueb1_link = "";};
    if(get_option('dav_menue_button2_text') != false) {$dav_menueb2_text = get_option('dav_menue_button2_text');} else {$dav_menueb2_text = "";};
    if(get_option('dav_menue_button2_link') != false) {$dav_menueb2_link = get_option('dav_menue_button2_link');} else {$dav_menueb2_link = "";};
    if(get_option('dav_menue_mitglied_link') != false) {$dav_mitglied = get_option('dav_menue_mitglied_link');} else {$dav_mitglied = "https://www.alpenverein.de/mitglied-werden-dav/so-werden-sie-dav-mitglied_aid_27574.html";};


    //breadcrumb
    if(get_option('dav_breadcrumb') != false) {$dav_breadcrumb = "checked";} else {$dav_breadcrumb = false;};

    //excerpt-length
    if(get_option('dav_excerpt_length') != false) {$dav_excerpt_length = get_option('dav_excerpt_length');} else {$dav_excerpt_length = 200;};

    // menu-options
    if(get_option('dav_menu_color') != false) {$dav_menu_color = get_option('dav_menu_color');} else {$dav_menu_color = "primary";};
    if(get_option('dav_menu_width') != false) {$dav_menu_width = get_option('dav_menu_width');} else {$dav_menu_width = "boxed";};
    if(get_option('dav_menu_behavior') != false) {$dav_menu_behavior = get_option('dav_menu_behavior');} else {$dav_menu_behavior = get_option('dav_menu_behavior');};


    //set the selected color
    switch($dav_menu_color) {
        case "primary" : $color_options = '<option value="primary" selected>Grün</option>
                        <option value="white">Weiß</option>
                        <option value="light">Hellgrau</option>
                        <option value="dark">Dunkelgrau</option>
                        <option value="trans">Transparent 80%</option>'; break;

        case "light" : $color_options = '<option value="primary">Grün</option>
                        <option value="white">Weiß</option>
                        <option value="light" selected>Hellgrau</option>
                        <option value="dark">Dunkelgrau</option>
                        <option value="trans">Transparent 80%</option>'; break;

        case "dark" : $color_options = '<option value="primary">Grün</option>
                        <option value="white">Weiß</option>
                        <option value="light">Hellgrau</option>
                        <option value="dark" selected>Dunkelgrau</option>
                        <option value="trans">Transparent 80%</option>'; break;

        case "white" : $color_options = '<option value="primary">Grün</option>
                        <option value="white" selected>Weiß</option>
                        <option value="light">Hellgrau</option>
                        <option value="dark">Dunkelgrau</option>
                        <option value="trans">Transparent 80%</option>'; break;

        case "trans" : $color_options = '<option value="primary">Grün</option>
                        <option value="white">Weiß</option>
                        <option value="light">Hellgrau</option>
                        <option value="dark">Dunkelgrau</option>
                        <option value="trans" selected>Transparent 80%</option>'; break;

        default : $color_options = '<option value="primary" selected>Grün</option>
                        <option value="white">Weiß</option>
                        <option value="light">Hellgrau</option>
                        <option value="dark">Dunkelgrau</option>
                        <option value="trans">Transparent 80%</option>'; break;
    }

    switch($dav_menu_width) {
        case "boxed" : $width_options = '<option value="boxed" selected>Boxed</option>
                        <option value="fluid">Fluid</option>'; break;

        case "fluid" : $width_options = '<option value="boxed">Boxed</option>
                        <option value="fluid" selected>Fluid</option>'; break;

        default : $width_options = '<option value="boxed" selected>Boxed</option>
                        <option value="fluid">Fluid</option>'; break;
    }

    switch($dav_menu_behavior) {
        case "sticky" : $behavior_options = '<option value="sticky" selected>Fixiert</option>
                        <option value="scroll">Scrollend</option>'; break;

        case "scroll" : $behavior_options = '<option value="sticky">Fixiert</option>
                        <option value="scroll" selected>Scrollend</option>'; break;

        default : $behavior_options = '<option value="sticky">Fixiert</option>
                        <option value="scroll">Scrollend</option>'; break;
    }


    echo '<form action="options.php" method="post">';

    settings_fields('dav_theme_settings');
    echo '<div class="wrap">
        <h1>Template-Einstellungen</h1>
        <p>Das Template erlaubt einige individuelle Einstellungen.</p>
        
        <h2>Hauptmenü-Grundeinstellungen</h2>
        <div class="inside">
            <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">Farbschema des Menüs</th>
                    <td><select name="dav_menu_color">
                        '.$color_options.'
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Layout des Menüs</th>
                    <td><select name="dav_menu_width">
                        '.$width_options.'
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Menüverhalten</th>
                    <td><select name="dav_menu_behavior">
                        '.$behavior_options.'
                        </select>
                    </td>
                </tr>
            </tbody>
            
</table>
        
        </div>
        
        <h2>Hauptmenü-Zusatzoptionen</h2>
        <div class="inside">
            <table class="form-table">
                <tbody>
                <tr>
                        <th scope="row"><label>Interner Link (Schnellwahl)</label></th>
                        <td><input type="text" name="dav_menue_intern_link" class="regular-text" placeholder="Link" value="'.$dav_intern_link.'">
                        <input type="text" name="dav_menue_intern_text" class="regular-text" placeholder="Linktext" value="'.$dav_intern_text.'">
                        <p class="description" id="tagline-description">In diesem Punkt soll bspw. die Kontaktseite verlinkt werden.</p></td>
                    </tr>
                    <tr>
                        <th scope="row"><label>Telefonnummer</label></th>
                        <td><input type="text" name="dav_menue_phone" class="regular-text" value="'.$dav_phone.'">
                        <p class="description" id="tagline-description">Die Telefonnummer erscheint im Menü.</p></td>
                    </tr>
                    <tr>
                    <tr>
                        <th scope="row"><label>Mitglied werden</label></th>
                        <td><input type="text" name="dav_menue_mitglied_link" class="regular-text" value="'.$dav_mitglied.'">
                        <p class="description" id="tagline-description">Der Link für den Button "Mitglied werden" kann individuell eingestellt werden. Standardmäßig wird er auf die Übersichtsseite des DAV geführt.</p></td>
                    </tr>
                    <tr>
                        <th scope="row"><label>Link & Text für Button 1</label></th>
                        <td><input type="text" name="dav_menue_button1_link" class="regular-text" placeholder="Link" value="'.$dav_menueb1_link.'">
                        <input type="text" name="dav_menue_button1_text" class="regular-text" placeholder="Linktext" value="'.$dav_menueb1_text.'">
                        <p class="description" id="tagline-description">Hier kann ein Link zur Hüttenseite, oder zu einer Kletterhalle eingefügt werden. Dieser Link erscheint oben rechts im Menü.</p></td>
                    </tr>
                    <tr>
                        <th scope="row"><label>Link & Text für Button 2</label></th>
                        <td><input type="text" name="dav_menue_button2_link" class="regular-text" placeholder="Link" value="'.$dav_menueb2_link.'">
                        <input type="text" name="dav_menue_button2_text" class="regular-text" placeholder="Linktext" value="'.$dav_menueb2_text.'">
                        <p class="description" id="tagline-description">Hier kann ein Link zur Hüttenseite, oder zu einer Kletterhalle eingefügt werden. Dieser Link erscheint oben rechts im Menü.</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h2>Anzeige-Optionen</h2>
        <div class="inside">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label>Brotkrümmel-Navigation anzeigen</label></th>
                        <td><input type="checkbox" name="dav_breadcrumb" '.$dav_breadcrumb.'>
                        <p class="description" id="tagline-description">Ist der Haken gesetzt, zeigt das Template unter dem Menü eine Brotkrümmel-Navigation an.</p></td>
                    </tr>
                    <tr>
                        <th scope="row"><label>Anzahl Zeichen bei News</label></th>
                        <td><input type="text" class="regular-text" name="dav_excerpt_length" value="'.$dav_excerpt_length.'">
                        <p class="description" id="tagline-description">Hier kann die maximale Anzahl Zeichen für den Newsbereich angegeben werden. Wichtig: Damit wird lediglich festgelegt, wie lang der Teaser zu einer Nachricht sein darf, der auf der Übersichtsseite steht. Eine Länge von 200 Zeichen gilt als ideal. Standardwert: 200 Zeichen.</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <h2>SocialMedia-Links</h2>
        <p>Hier können bei Bedarf die Links zu den Socialmedia-Accounts angegeben werden. Diese werden dann im Footer ausgegeben. Wenn ein Feld leer bleibt, wird es auch nicht angezeigt.</p>
        <div class="inside">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label>Facebook</label></th>
                        <td><input type="text" name="dav_facebook" class="regular-text" placeholder="Link" value="'.$dav_facebook.'">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label>Twitter</label></th>
                        <td><input type="text" name="dav_twitter" class="regular-text" placeholder="Link" value="'.$dav_twitter.'">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label>Instagram</label></th>
                        <td><input type="text" name="dav_instagram" class="regular-text" placeholder="Link" value="'.$dav_instagram.'">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
    <input type="submit" value="Theme Einstellungen speichern" name="submit" class="button-primary">
    </form>';
}
