<?php 

    $products_url = '/products?page=2&sort=-price';
    $products = json_decode( make_get_request( $products_url ), false ); 

?>


<section class='main'> 
  
    <div class='flex'>
        <div class='left_part page_title'>Products</div>
        <div class='right_part'>
            <div class='page_filters t_0_75'>Showing <?=$products->meta->from;?>-<?=$products->meta->to;?> of <?=$products->meta->total;?> results</div>
            <div>|</div>
            <div><img src="/assets/filter.svg"> Filter</div>
            <div>Sort By <img src='/assets/arrow_down.svg'></div>
        </div>
    </div>


    <div class='products_list'>
        <?php foreach($products->data as $p) { ?>
            <div class='product'>
                <div class='cover_image' style='background-image:url(<?=$p->cover_image ?>)'> </div>
                <div class='product_list_description'>
                    <div><?=$p->name;?></div>
                    <div>$ <?=$p->price;?></div>
                </div>
            </div>
        <?php } ?>
    </div>




    <div class='meta'>
          <?php foreach($products->meta->links as $l) { ?>
              <div <?=($l->active?'class="active"':'')?>><?=$l->label?></div>
        <?php } ?>
    </div>



</section>