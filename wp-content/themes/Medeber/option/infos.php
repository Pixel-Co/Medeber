<?php
class InfoMenuPage {

    const GROUP = 'infos_option';

    public static function register(){
        add_action('admin_menu', [self::class,'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
        add_action('admin_enqueue_scripts', [self::class,'registerScripts']);


    }

    //utilisation de css et js avec flatpickr
    public static function registerScripts($suffix){
        if($suffix === 'setting_page_infos_options'){

        
            wp_register_style('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', [], false);
            wp_register_script('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr', [], false, true);
            wp_register_script('h2oz_admin', get_template_directory_uri() . '/assets/admin.js', ['flatpickr'], false, true);
            wp_enqueue_script('h2oz_admin');
            wp_enqueue_style('flatpickr');
        }

    }

    public static function registerSettings(){
        register_setting(self::GROUP, 'infos_date');
        register_setting(self::GROUP, 'infos_suplémentaires');
        register_setting(self::GROUP, 'infos_réseaux');
        register_setting(self::GROUP, 'infos_coordonnées');
        add_settings_section('infos_options_section', 'Paramètres', function(){
                echo 'vous pouvez gérer ici les options liées aux infos';
        }, self::GROUP);
        add_settings_field('infos_options_coordonnées', 'contact', function(){
                ?>
                    <textarea name="infos_coordonnées" id="" cols="30" rows="10" style="width:100%"><?= esc_html(get_option('infos_coordonnées')) ?></textarea>
                <?php
        }, self::GROUP, 'infos_options_section' );

        add_settings_field('infos_options_suplémentaires', 'infos suplémentaires', function(){
            ?>
                <textarea name="infos_suplémentaires" id="" cols="30" rows="10" style="width:100%"><?= esc_html(get_option('infos_suplémentaires')) ?></textarea>
            <?php
        }, self::GROUP, 'infos_options_section' );

    add_settings_field('infos_options_réseaux', 'infos réseaux', function(){
        ?>
            <textarea name="infos_réseaux" id="" cols="30" rows="10" style="width:100%"><?= esc_html(get_option('infos_réseaux')) ?></textarea>
        <?php
        }, self::GROUP, 'infos_options_section' );

        add_settings_field('infos_options_date', 'Date', function(){
            ?>
                <input type="text" name="infos_date" value="<?= esc_attr(get_option('infos_date')) ?>" class="h2oz_datepicker">
            <?php
    }, self::GROUP, 'infos_options_section' );
        
    }

    public static function addMenu(){
        add_options_page("Gestion des infos", "Infos", "manage_options", self::GROUP, [self::class,'render']);
    }

    public static function render(){
        ?>
            <h1>Gestion des infos</h1>
            <form action="options.php" method="post">

                <?php
                settings_fields(self::GROUP);
                do_settings_sections(self::GROUP);
                submit_button();
                ?>
            
            </form>

        <?php
    }


}