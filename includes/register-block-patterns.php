<?php

register_block_pattern(
    "accordion", array(
    'title' => 'Akkordion',
    'description' => '',
    'categories' => array('section'),
    'content' => '<!-- wp:getwid/accordion -->
        <div class="wp-block-getwid-accordion has-icon-left" data-active-element="none"><!-- wp:getwid/accordion-item -->
        <div class="wp-block-getwid-accordion__header-wrapper"><span class="wp-block-getwid-accordion__header"><a href="#"><span class="wp-block-getwid-accordion__header-title">Tabelle</span><span class="wp-block-getwid-accordion__icon is-active"><i class="fas fa-plus"></i></span><span class="wp-block-getwid-accordion__icon is-passive"><i class="fas fa-minus"></i></span></a></span></div><div class="wp-block-getwid-accordion__content-wrapper"><div class="wp-block-getwid-accordion__content"><!-- wp:html -->
        <div id="bfv1617264132485">Laden...</div>
        <script>
        BFVWidget.HTML5.zeigeMannschaftKomplett("016PE490MG000000VV0AG811VTE5EA5R", "bfv1617264132485", { height: "600", width: "350", selectedTab:BFVWidget.HTML5.mannschaftTabs.wettbewerbTabelle, colorResults: "undefined" , colorNav: "undefined" , colorClubName : "undefined" , backgroundNav: "undefined"});
        </script>
        <!-- /wp:html --></div></div>
        <!-- /wp:getwid/accordion-item -->
        
        <!-- wp:getwid/accordion-item -->
        <div class="wp-block-getwid-accordion__header-wrapper"><span class="wp-block-getwid-accordion__header"><a href="#"><span class="wp-block-getwid-accordion__header-title">Spielplan</span><span class="wp-block-getwid-accordion__icon is-active"><i class="fas fa-plus"></i></span><span class="wp-block-getwid-accordion__icon is-passive"><i class="fas fa-minus"></i></span></a></span></div><div class="wp-block-getwid-accordion__content-wrapper"><div class="wp-block-getwid-accordion__content"><!-- wp:paragraph {"placeholder":"Write text…"} -->
        <p></p>
        <!-- /wp:paragraph --></div></div>
        <!-- /wp:getwid/accordion-item -->
        
        <!-- wp:getwid/accordion-item -->
        <div class="wp-block-getwid-accordion__header-wrapper"><span class="wp-block-getwid-accordion__header"><a href="#"><span class="wp-block-getwid-accordion__header-title">Training</span><span class="wp-block-getwid-accordion__icon is-active"><i class="fas fa-plus"></i></span><span class="wp-block-getwid-accordion__icon is-passive"><i class="fas fa-minus"></i></span></a></span></div><div class="wp-block-getwid-accordion__content-wrapper"><div class="wp-block-getwid-accordion__content"><!-- wp:paragraph {"placeholder":"Write text…"} -->
        <p></p>
        <!-- /wp:paragraph --></div></div>
        <!-- /wp:getwid/accordion-item --></div>
        <!-- /wp:getwid/accordion -->'
    )
);


register_block_pattern(
    "section_title", array(
        'title' => 'Section mit Headline',
        'description' => '',
        'categories' => array('section'),
        'content' => '<!-- wp:getwid/section {"skipLayout":true,"backgroundColor":"primary"} -->
<div class="wp-block-getwid-section"><div class="wp-block-getwid-section__wrapper"><div class="wp-block-getwid-section__inner-wrapper"><div class="wp-block-getwid-section__background-holder"><div class="wp-block-getwid-section__background has-background has-primary-background-color"></div><div class="wp-block-getwid-section__foreground"></div></div><div class="wp-block-getwid-section__content"><div class="wp-block-getwid-section__inner-content"><!-- wp:heading {"textAlign":"left","backgroundColor":"black","textColor":"white","fontSize":"subtitle"} -->
<h2 class="has-text-align-left has-white-color has-black-background-color has-text-color has-background has-subtitle-font-size" id="bcdd7b0e0a8a">Section mit Titel</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 id="86e05eadced1">Überschrift</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Lorem ipsum dolor sit amet consectetuer.</li><li>Aenean commodo ligula eget dolor.</li><li>Aenean massa cum sociis natoque penatibus</li></ul>
<!-- /wp:list --></div></div></div></div></div>
<!-- /wp:getwid/section -->'
    )
);

register_block_pattern(
    "page_team", array(
        'title' => 'U-Mannschaft',
        'description' => '',
        'categories' => array('section'),
        'content' => '<!-- wp:getwid/table-of-contents {"headings":[{"level":1,"content":"Info","anchor":"bcdd7b0e0a8a"},{"level":1,"content":"Trainerteam","anchor":"bcdd7b0e0a8a"},{"level":1,"content":"Ergebnisse und Tabelle","anchor":"bcdd7b0e0a8a"}]} -->
<div class="wp-block-getwid-table-of-contents is-style-default"><ul class="wp-block-getwid-table-of-contents__list"><li><a href="#bcdd7b0e0a8a">Info</a></li><li><a href="#bcdd7b0e0a8a">Trainerteam</a></li><li><a href="#bcdd7b0e0a8a">Ergebnisse und Tabelle</a></li></ul></div>
<!-- /wp:getwid/table-of-contents -->

<!-- wp:getwid/section {"skipLayout":true,"backgroundColor":"white"} -->
<div class="wp-block-getwid-section"><div class="wp-block-getwid-section__wrapper"><div class="wp-block-getwid-section__inner-wrapper"><div class="wp-block-getwid-section__background-holder"><div class="wp-block-getwid-section__background has-background has-white-background-color"></div><div class="wp-block-getwid-section__foreground"></div></div><div class="wp-block-getwid-section__content"><div class="wp-block-getwid-section__inner-content"><!-- wp:heading {"textAlign":"left","backgroundColor":"black","textColor":"white","fontSize":"subtitle"} -->
<h2 class="has-text-align-left has-white-color has-black-background-color has-text-color has-background has-subtitle-font-size" id="bcdd7b0e0a8a">Info</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Liga: Landesliga</li><li>Training: Dienstag und Donnerstag 18.30 Uhr, Freitag 17 Uhr (Jakobshöhe)</li></ul>
<!-- /wp:list -->

<!-- wp:heading {"textAlign":"left","backgroundColor":"black","textColor":"white","fontSize":"subtitle"} -->
<h2 class="has-text-align-left has-white-color has-black-background-color has-text-color has-background has-subtitle-font-size" id="bcdd7b0e0a8a">Trainerteam</h2>
<!-- /wp:heading -->

<!-- wp:shortcode -->
[sp-staff-block job="trainer-u17" title="Trainer" show_photo="true"]
<!-- /wp:shortcode -->

<!-- wp:shortcode -->
[sp-staff-block job="co-trainer-u17" title="Co-Trainer" show_photo="true"]
<!-- /wp:shortcode -->

<!-- wp:shortcode -->
[sp-staff-block job="betreuer-u17" title="Betreuer" show_photo="true"]
<!-- /wp:shortcode -->

<!-- wp:shortcode -->
[sp-staff-block job="torwarttrainer-nlz" title="Torwarttrainer" show_photo="true"]
<!-- /wp:shortcode -->

<!-- wp:shortcode -->
[sp-staff-block job="athletiktrainer-nlz" title="Athletiktrainer" show_photo="true"]
<!-- /wp:shortcode -->

<!-- wp:heading {"textAlign":"left","backgroundColor":"black","textColor":"white","fontSize":"subtitle"} -->
<h2 class="has-text-align-left has-white-color has-black-background-color has-text-color has-background has-subtitle-font-size" id="bcdd7b0e0a8a">Ergebnisse und Tabelle</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<div id="bfv1617660586966">Laden...</div>
<script>BFVWidget.HTML5.zeigeMannschaftKomplett("011MIAF1RG000000VTVG0001VTR8C1K7", "bfv1617660586966", { height: 700, width: 560, selectedTab: BFVWidget.HTML5.mannschaftTabs.spiele});</script>
<!-- /wp:html --></div></div></div></div></div>
<!-- /wp:getwid/section -->

<!-- wp:group -->
<div class="wp-block-group"><div class="wp-block-group__inner-container"></div></div>
<!-- /wp:group -->'
    )
);
register_block_pattern(
    "overview", array(
        'title' => 'Überblick',
        'description' => '',
        'categories' => array('section'),
        'content' => '<!-- wp:getwid/section {"skipLayout":true,"backgroundColor":"white","paddingLeft":"normal","paddingRight":"normal","className":"overview has-border-radius"} -->
<div class="wp-block-getwid-section overview has-border-radius"><div class="wp-block-getwid-section__wrapper getwid-padding-left-normal getwid-padding-right-normal"><div class="wp-block-getwid-section__inner-wrapper"><div class="wp-block-getwid-section__background-holder"><div class="wp-block-getwid-section__background has-background has-white-background-color"></div><div class="wp-block-getwid-section__foreground"></div></div><div class="wp-block-getwid-section__content"><div class="wp-block-getwid-section__inner-content"><!-- wp:columns {"className":"overview"} -->
<div class="wp-block-columns overview"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p><strong>Öffnungszeiten:</strong> </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Dienstag (10 bis 12 Uhr, 15 bis 17 Uhr)<br>Donnerstag (15 bis 17 Uhr)<br>oder nach Vereinbarung</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p><strong>Anschrift: </strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Jakobstraße 33, 95447 Bayreuth</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p><strong>Telefon:&nbsp;</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="tel:0921 / 16341463">0921 / 16341463</a>&nbsp; </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Fax:&nbsp;</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>0921 / 16326010</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p><strong>Mail: </strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>info@spvgg-bayreuth.de</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph --></div></div></div></div></div>
<!-- /wp:getwid/section -->'
    )
);