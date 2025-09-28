<?php  

    $products_url = $request;

    $filters_data = array();

    # check filters and generate relevant api request
    if ( isset($_GET['page']) && (int)$_GET['page'] > 0 ) 
            $filters_data ['page'] = (int)$_GET['page'];

    if ( isset($_GET['sort']) && in_array($_GET['sort'], array('-price','price','-created_at','created_at')) ) 
            $filters_data ['sort'] = $_GET['sort'];
    
    if ( isset($_GET['price_from']) && $_GET['price_from'] > 0 ) 
            $filters_data ['price_from'] = (double)$_GET['price_from'];

    if ( isset($_GET['price_to']) && $_GET['price_to'] > 0 ) 
            $filters_data ['price_to'] = (double)$_GET['price_to'];
    
    $f_String = '';
    foreach( $filters_data as $k=>$f ) {
        $f_String .= "&".$k.'='.$f;
    }  
    if ( !empty($f_String)) $f_String = "?".$f_String; 

    $products = json_decode( make_get_request( $products_url.$f_String ), false ); 

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
                <a href="/products/<?=$p->id?>">
                    <div class='cover_image' style='background-image:url(<?=$p->cover_image ?>)'> </div>
                    <div class='product_list_description'>
                        <div><?=$p->name;?></div>
                        <div>$ <?=$p->price;?></div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>

    <div class='meta'>
          <?php foreach($products->meta->links as $l) { 
            
            if ($l->url) { ?>
            <a <?=($l->active?'class="active"':'')?> href="<?=str_replace(REDSEAM_API,"",$l->url)?> ">
                    <?=$l->label?>
            </a>
        <?php  } } ?>
    </div>



</section>