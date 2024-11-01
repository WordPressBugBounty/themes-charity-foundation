<?php

$ngo_charity_donation_custom_style= "";

// slider- content -alignment

$ngo_charity_donation_slider_content_alignment = get_theme_mod( 'ngo_charity_donation_slider_content_alignment','LEFT-ALIGN');

if($ngo_charity_donation_slider_content_alignment == 'LEFT-ALIGN'){

$ngo_charity_donation_custom_style .='#slider .carousel-caption {';

	$ngo_charity_donation_custom_style .='text-align:left; right: 60%; left: 10%;';

$ngo_charity_donation_custom_style .='}';

$ngo_charity_donation_custom_style .='@media screen and (max-width:1299px){';

$ngo_charity_donation_custom_style .='#slider .carousel-caption{';

    $ngo_charity_donation_custom_style .='right: 55%; left: 10%;';
    
$ngo_charity_donation_custom_style .='} }';


}else if($ngo_charity_donation_slider_content_alignment == 'CENTER-ALIGN'){

$ngo_charity_donation_custom_style .='#slider .carousel-caption {';

	$ngo_charity_donation_custom_style .='text-align:center; right: 50%; left: 10%;';

$ngo_charity_donation_custom_style .='}';


}else if($ngo_charity_donation_slider_content_alignment == 'RIGHT-ALIGN'){

$ngo_charity_donation_custom_style .='#slider .carousel-caption {';

	$ngo_charity_donation_custom_style .='text-align:right; right: 55%; left: 10%;';

$ngo_charity_donation_custom_style .='}';

$ngo_charity_donation_custom_style .='@media screen and (max-width:1299px){';

$ngo_charity_donation_custom_style .='#slider .carousel-caption{';

    $ngo_charity_donation_custom_style .='right: 50%; left: 10%;';
    
$ngo_charity_donation_custom_style .='} }';

}

//colors
$color = get_theme_mod('charity_foundation_primary_color', '#f9c416');
$color_section_bg = get_theme_mod('charity_foundation_section_bg', '#f8f5ef');
$color_heading = get_theme_mod('charity_foundation_heading_color', '#1d1c1c');
$color_text = get_theme_mod('charity_foundation_text_color', '#9f9f9f');
$color_footer_bg = get_theme_mod('charity_foundation_footer_bg', '#1d1c1c');


$ngo_charity_donation_custom_style .= ":root {";
    $ngo_charity_donation_custom_style .= "--theme-primary-color: {$color};";
    $ngo_charity_donation_custom_style .= "--theme-section-bg: {$color_section_bg};";
    $ngo_charity_donation_custom_style .= "--theme-heading-color: {$color_heading};";
    $ngo_charity_donation_custom_style .= "--theme-text-color: {$color_text};";
    $ngo_charity_donation_custom_style .= "--theme-footer-color: {$color_footer_bg};";
$ngo_charity_donation_custom_style .= "}";

$charity_foundation_slider_opacity = get_theme_mod( 'charity_foundation_slider_opacity','1');

if($charity_foundation_slider_opacity == '0'){
$ngo_charity_donation_custom_style .='#slider img {';
    $ngo_charity_donation_custom_style .='opacity: 0';
$ngo_charity_donation_custom_style .='}';

}else if($charity_foundation_slider_opacity == '0.1'){
$ngo_charity_donation_custom_style .='#slider img {';
    $ngo_charity_donation_custom_style .='opacity: 0.1';
$ngo_charity_donation_custom_style .='}';

}else if($charity_foundation_slider_opacity == '0.2'){
$ngo_charity_donation_custom_style .='#slider img {';
    $ngo_charity_donation_custom_style .='opacity: 0.2';
$ngo_charity_donation_custom_style .='}';

}else if($charity_foundation_slider_opacity == '0.3'){
$ngo_charity_donation_custom_style .='#slider img {';
    $ngo_charity_donation_custom_style .='opacity: 0.3';
$ngo_charity_donation_custom_style .='}';

}else if($charity_foundation_slider_opacity == '0.4'){
$ngo_charity_donation_custom_style .='#slider img {';
    $ngo_charity_donation_custom_style .='opacity: 0.4';
$ngo_charity_donation_custom_style .='}';

}else if($charity_foundation_slider_opacity == '0.5'){
$ngo_charity_donation_custom_style .='#slider img {';
    $ngo_charity_donation_custom_style .='opacity: 0.5';
$ngo_charity_donation_custom_style .='}';

}else if($charity_foundation_slider_opacity == '0.6'){
$ngo_charity_donation_custom_style .='#slider img {';
    $ngo_charity_donation_custom_style .='opacity: 0.6';
$ngo_charity_donation_custom_style .='}';

}else if($charity_foundation_slider_opacity == '0.7'){
$ngo_charity_donation_custom_style .='#slider img {';
    $ngo_charity_donation_custom_style .='opacity: 0.7';
$ngo_charity_donation_custom_style .='}';

}else if($charity_foundation_slider_opacity == '0.8'){
$ngo_charity_donation_custom_style .='#slider img {';
    $ngo_charity_donation_custom_style .='opacity: 0.8';
$ngo_charity_donation_custom_style .='}';

}
else if($charity_foundation_slider_opacity == '0.9'){
$ngo_charity_donation_custom_style .='#slider img {';
    $ngo_charity_donation_custom_style .='opacity: 0.9';
$ngo_charity_donation_custom_style .='}';

}
else if($charity_foundation_slider_opacity == '1'){
$ngo_charity_donation_custom_style .='#slider img {';
    $ngo_charity_donation_custom_style .='opacity: 1';
$ngo_charity_donation_custom_style .='}';

}