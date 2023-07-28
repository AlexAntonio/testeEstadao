<?php

function estadao_customizer($wp_customize){

    //Hero
    $wp_customize->add_section(
        'div_hero',
        array(
            'title' => 'Destaque principal'
        )
    );

    //Titulo
    $wp_customize->add_setting(
        'set_hero_title',
        array(
            'type' => 'theme_mod',
            'default' => 'Adicione um título',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_hero_title',
        array(
            'label' => 'Título',
            'description' => 'Adicione um título',
            'section' => 'div_hero',
            'type' => 'text'
        )
    );

    //Sub-titulo
    $wp_customize->add_setting(
        'set_hero_subtitle',
        array(
            'type' => 'theme_mod',
            'default' => 'Adicione um subtítulo',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'set_hero_subtitle',
        array(
            'label' => 'Sub-Título',
            'description' => 'Adicione um sub-título',
            'section' => 'div_hero',
            'type' => 'textarea'
        )
    );

    //Button
    $wp_customize->add_setting(
        'set_hero_button',
        array(
            'type' => 'theme_mod',
            'default' => 'Botão',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_hero_button',
        array(
            'label' => 'Botão',
            'description' => 'Adicione um texto para o botão',
            'section' => 'div_hero',
            'type' => 'text'
        )
    );

    //Button Link
    $wp_customize->add_setting(
        'set_hero_button_link',
        array(
            'type' => 'theme_mod',
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'set_hero_button_link',
        array(
            'label' => 'Link do botão',
            'description' => 'Adicione um link para o botão',
            'section' => 'div_hero',
            'type' => 'url'
        )
    );

    //Hero height
    $wp_customize->add_setting(
        'set_hero_height',
        array(
            'type' => 'theme_mod',
            'default' => 500,
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'set_hero_height',
        array(
            'label' => 'Tamanho da divisão (altura)',
            'description' => 'Informe a altura da divisão',
            'section' => 'div_hero',
            'type' => 'number'
        )
    );

    //Hero background-image
    $wp_customize->add_setting(
        'set_hero_bg',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        )
    );

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'set_hero_bg', array(
        'label' => 'Imagem de fundo',
        'section' => 'div_hero',
        'mime_type' => 'image'
    )));
}

add_action('customize_register', 'estadao_customizer');