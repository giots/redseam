<?php  

    $product_url = $request;
    $product = json_decode( make_get_request( $product_url ), false ); 

?>


<section class='main product_section'> 
  
    <div class='flex'>
        <div class='left_part broadcrumb t_0_75'>Listing / Product</div>
        <div class='right_part'> 
        </div>
    </div>


    <div class='flex product'>
        
        <div class='product_thumbnails'>
            <?php foreach( $product->images as $i) { ?>
            <div class='thumbnail_image' style='background-image:url(<?=$i?>)'></div>
            <?php } ?>
        </div>

        <div class='main_photo' style='background-image:url(<?=$product->cover_image?>)'>
                
        </div>

        <div class='product_info'>
                <div class='product_title'><?=$product->name?></div>
                <div class='product_price'>$ <?=$product->price?></div>
                
                <div class='product_features_title'>Color: <?=$product->color?></div>
                <div class='colors_available'>
                    <?php foreach($product->available_colors as $c) { ?>
                        <div class='color_circle' style='background-color:<?=$c;?>'></div>
                    <?php } ?>
                </div>
                

                <div class='product_features_title'>Size: <?=$product->size?></div>
                <div class='sizes_available'>
                    <?php foreach($product->available_sizes as $s) { ?>
                        <div class='size_quad <?=($s==$product->size?"active":"")?>'> <?=$s;?> </div>
                    <?php } ?>
                </div>

                <div class='product_features_title'>Quantity </div>
                <div class='sizes_available'>
                    <div class='size_quad'> <?=$product->quantity?> &nbsp; <img src='/assets/arrow_down.svg'></div>
                </div>


                <div class='add_to_Cart_button'> <img src='/assets/card_white.svg'> Add to cart </div>

                <hr>

                <div class='product_detailes'>
                    <div class='flex'>
                        <div> <b>Detailes</b></div>
                        <div> <img src="<?=$product->brand->image;?>" ></div>
                    </div>
                    <div> Brand:  <?=$product->brand->name;?> </div><p>
                    <div> <?=$product->description;?> </div>
                </div>

        </div>

    </div>

</section>