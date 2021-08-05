<?php
/**
 * Describe child theme functions
 *
 * @package Appzend
 * @subpackage Appzend Commerce
 * 
 */

 if ( ! function_exists( 'appzend_commerce_setup' ) ) :

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Appzend Commerce, use a find and replace
     * to change 'appzend-commerce' to the name of your theme in all the template files.
    */
    load_theme_textdomain( 'appzend-commerce', get_template_directory() . '/languages' );

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function appzend_commerce_setup() {
        
        $appzend_commerce_theme_info = wp_get_theme();
        $GLOBALS['appzend_commerce_version'] = $appzend_commerce_theme_info->get( 'Version' );
    }
endif;
add_action( 'after_setup_theme', 'appzend_commerce_setup' );


/**
 * Enqueue child theme styles and scripts
*/
function appzend_commerce_scripts() {
    
    global $appzend_commerce_version;
    wp_enqueue_style( 'appzend-parent-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'style.css', array(), esc_attr( $appzend_commerce_version ) );
    
    wp_enqueue_style( 'appzend-commerce-style', get_stylesheet_uri(), 'appzend-parent-style', esc_attr( $appzend_commerce_version ) );
}
add_action( 'wp_enqueue_scripts', 'appzend_commerce_scripts', 20 );


if ( ! function_exists( 'appzend_commerce_child_options' ) ) {

    function appzend_commerce_child_options( $wp_customize ) {
        
        /** page width in % */
        $wp_customize->add_setting("appzend_commerce_page_width", array(
            'sanitize_callback' => 'appzend_sanitize_number_blank',
            'default' => 90,
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("appzend_commerce_page_width_tablet", array(
            'sanitize_callback' => 'appzend_sanitize_number_blank',
            'default' => '100',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("appzend_commerce_page_width_mobile", array(
            'sanitize_callback' => 'appzend_sanitize_number_blank',
            'default' => '100',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new AppZend_Range_Slider_Control($wp_customize, "appzend_commerce_page_width_group", array(
            'section' => "appzend_site_layout_section",
            'label' => esc_html__('Width (%)', 'appzend-commerce'),
            'input_attrs' => array(
                'min' => 70,
                'max' => 100,
                'step' => 1,
            ),
            'settings' => array(
                'desktop' => "appzend_commerce_page_width",
                'tablet' => "appzend_commerce_page_width_tablet",
                'mobile' => "appzend_commerce_page_width_mobile",
            )
        )));



        /** header call button and icon */
        $wp_customize->add_setting('appzend_call_button', array(
            'default' => 'disable',
            'sanitize_callback' => 'appzend_sanitize_switch',	
        ));

        $wp_customize->add_control(new AppZend_Switch_Control($wp_customize, 'appzend_call_button', array(
            'label' => esc_html__('Enable Call Section', 'appzend-commerce'),
            'section' => 'appzend_header_settings',
            'switch_label' => array(
                'enable' => esc_html__('Yes', 'appzend-commerce'),
                'disable' => esc_html__('No', 'appzend-commerce'),
            ),
        )));

        /*Button Text*/
        $wp_customize->add_setting( 'appzend-call-button-text',
            array(
                'default'           => esc_html__("Call Anytime", 'appzend-commerce'),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( 'appzend-call-button-text',
            array(
                'label'    => esc_html__( 'Call Text', 'appzend-commerce' ),
                'section'         => 'appzend_header_settings',
                'settings' => 'appzend-call-button-text',
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting( 'appzend-call-phone-text',
            array(
                'default'           => esc_html__("+1 000 000", 'appzend-commerce'),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( 'appzend-call-phone-text',
            array(
                'label'    => esc_html__( 'Phone Number', 'appzend-commerce' ),
                'section'         => 'appzend_header_settings',
                'settings' => 'appzend-call-phone-text',
                'type'     => 'text',
            )
        );
        
        $wp_customize->add_setting( 'appzend-call-phone-icon',
            array(
                'default'           => 'far fa-comments',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( new AppZend_Fontawesome_Icons($wp_customize, 'appzend-call-phone-icon',
            array(
                'label'    => esc_html__( 'Icon', 'appzend-commerce' ),
                'section'         => 'appzend_header_settings',
                'settings' => 'appzend-call-phone-icon',
                'type'     => 'icon',
            )
        ));


        /** header call button and icon */
        $wp_customize->add_setting('appzend-show-cart', array(
            'default' => 'enable',
            'sanitize_callback' => 'appzend_sanitize_switch',	
        ));

        $wp_customize->add_control(new AppZend_Switch_Control($wp_customize, 'appzend-show-cart', array(
            'label' => esc_html__('Cart Icon', 'appzend-commerce'),
            'section' => 'appzend_header_settings',
            'switch_label' => array(
                'enable' => esc_html__('Yes', 'appzend-commerce'),
                'disable' => esc_html__('No', 'appzend-commerce'),
            ),
        )));

        $wp_customize->add_setting( 'appzend-cart-icon',
            array(
                'default'           => 'fas fa-cart-arrow-down',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control( new AppZend_Fontawesome_Icons($wp_customize, 'appzend-cart-icon',
            array(
                'label'    => esc_html__( 'Cart Icon', 'appzend-commerce' ),
                'section'  => 'appzend_header_settings',
                'settings' => 'appzend-cart-icon',
                'type'     => 'icon',
            )
        ));


        /** menu style */
        $wp_customize->add_setting(
            'appzend-menu-style',
            array(
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
                'default'           => 'sidebar',
                'priority' => 2,
            )
        );
        $wp_customize->add_control(
            'appzend-menu-style',
            array(
                'label'           => esc_html__( 'Menu Style', 'appzend-commerce' ),
                'section'         => 'appzend_header_settings',
                'settings'        => 'appzend-menu-style',
                'type'            => 'select',
                'choices'         => array(
                    'sidebar'       => esc_html__( 'Sidebar', "appzend-commerce" ),
                    'normal'        => esc_html__( 'Normal', "appzend-commerce" ),
                )
            )
        );


    }
}
add_action( 'customize_register' , 'appzend_commerce_child_options', 11 );

/**
 * Dynamic Style from parent
 */
add_filter( 'appzend_dynamic_css', 'appzend_commerce_dynamic_css', 100 );
function appzend_commerce_dynamic_css($dynamic_css){
    
    $appzend_commerce_dynamic_css = $appzend_commerce_tablet_css = $appzend_commerce_mobile_css = "";
    
    $nav_text_color = get_theme_mod('appzend_menu_text_color');
    if($nav_text_color) $appzend_commerce_dynamic_css .=" .nav-menu .link-box .call-us * {color: $nav_text_color}";


    $primary_color    = get_theme_mod('appzend_primary_color','#f64d2b');
    $appzend_commerce_dynamic_css .= "
        .site-header-cart .cart-contents .count{
            background-color: $primary_color;
        }
        .sparkletablinks li.active a,
        .tabsblockwrap.tab_stylethree ul li a.btn{
            color: $primary_color;
        }
        .tabsblockwrap.tab_styletwo ul li a.btn{
            border-color: $primary_color;
        }
    ";

    $appzend_commerce_dynamic_css .= "@media screen and (max-width:768px){{$appzend_commerce_tablet_css}}";
    $appzend_commerce_dynamic_css .= "@media screen and (max-width:480px){{$appzend_commerce_mobile_css}}";

    $dynamic_css .= $appzend_commerce_dynamic_css;

    wp_add_inline_style( 'appzend-commerce-style', appzend_commerce_strip_whitespace($dynamic_css) );

}

function appzend_commerce_strip_whitespace($css) {
    $replace = array(
        "#/\*.*?\*/#s" => "", // Strip C style comments.
        "#\s\s+#" => " ", // Strip excess whitespace.
    );
    $search = array_keys($replace);
    $css = preg_replace($search, $replace, $css);

    $replace = array(
        ": " => ":",
        "; " => ";",
        " {" => "{",
        " }" => "}",
        ", " => ",",
        "{ " => "{",
        ";}" => "}", // Strip optional semicolons.
        ",\n" => ",", // Don't wrap multiple selectors.
        "\n}" => "}", // Don't wrap closing braces.
        "} " => "}", // Put each rule on it's own line.
    );
    $search = array_keys($replace);
    $css    = str_replace($search, $replace, $css);

    return trim($css);
}

/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 *
 */
function appzend_commerce_customize_scripts(){
	wp_enqueue_script('appzend-commerce-customizer', get_template_directory_uri() . '/assets/js/admin.js', array('jquery', 'customize-controls'), true);
}
add_action('customize_controls_enqueue_scripts', 'appzend_commerce_customize_scripts');

add_filter( 'appzend_homepage_sections', 'appzend_commerce_home_page_section', 10, 3 );
function appzend_commerce_home_page_section(){
    return array(
        'appzend_productcat_section',
        'appzend_producttype_section',
        'appzend_producthotoffer_section',

        'appzend_features_service_section',
        'appzend_highlight_service_section',
        'appzend_service_section',
        'appzend_calltoaction_section',
        'appzend_recentwork_section',
        'appzend_howitworks_section',
    );
}