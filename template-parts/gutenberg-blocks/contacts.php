<?php

/**
 * contacts Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contacts-' . $block['id'];
$className = 'map';

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_contacts');
$img_id = get_field('img_contacts');
$img_url = wp_get_attachment_url( $img_id, 'full' );
$phone = get_field('phone_contacts');
$address = get_field('address_contacts');
$bus_stop = get_field('bus_stop_contacts');
$bus_numbers = get_field('bus_numbers_contacts');
$trolley_numbers = get_field('trolley_numbers_contacts');
$soc_networks = get_field('soc_networks_contacts');
$map = get_field('map_contacts');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/contacts.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

        <?php if ($title) : ?>
            <h3><?php echo esc_html($title); ?></h3>
        <?php endif; ?>

        <div class="map_contact_block white">  
            <div class="contact_info">

                <?php if ($img_url) : ?>
                    <div class="contact_info_logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>"> 
                            <img src="<?php echo esc_attr($img_url); ?>" alt="Logo">
                        </a>
                    </div> 
                <?php endif; ?>
                
                <?php if ($phone) : ?>
                    <div class="contact_item tel">
                        <div class="contact_item_title">Телефон</div>
                        <div class="contact_item_content ">
                            <a href="tel:<?php echo esc_attr($phone); ?>">
                                <?php echo esc_html($phone); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ($address) : ?>
                    <div class="contact_item">
                        <div class="contact_item_title">Адрес</div>
                        <div class="contact_item_content">
                            <?php echo esc_html($address); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="contact_item border">

                    <?php if ($bus_stop) : ?>
                        <strong>
                            <?php echo esc_html($bus_stop); ?>
                        </strong>
                    <?php endif; ?>

                    <?php if ($bus_numbers) : ?>
                        <div class="contact_item_title">Проезд автобусом</div>
                        <div class="contact_item_content">
                            <?php echo esc_html($bus_numbers); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($trolley_numbers) : ?>
                        <div class="contact_item_title">Троллейбусом</div>
                        <div class="contact_item_content">
                            <?php echo esc_html($trolley_numbers); ?>
                        </div>
                    <?php endif; ?>

                </div>
            
                <?php if ($soc_networks) : ?>
                    <div class="contact_item"> 
                        <div class="contact_soc">

                            <?php 
                            foreach ($soc_networks as $soc_network) : 
                                $img_url = wp_get_attachment_url( $doctor['img_soc_networks_contacts'], 'full' );
                                $link = $doctor['link_soc_networks_contacts'];
                            ?>

                                <?php if ($img_url) : ?>
                                    <a href="<?php echo esc_url($link); ?>">
                                        <img src="<?php echo esc_attr($img_url); ?>" alt="Social network">
                                    </a>
                                <?php endif; ?>
                            
                            <?php endforeach; ?>

                        </div>
                    </div> 
                <?php endif; ?>
                
            </div>
        </div>

        <?php if ($map) : ?>
            <div id="map">
                <?php echo $map; ?>
            </div>
        <?php endif; ?>

    </div>

<?php endif; ?>