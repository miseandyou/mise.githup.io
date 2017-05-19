<?php
//var_dump(have_posts());
//var_dump(have_posts());
//var_dump(is_home());
//var_dump(is_front_page());
//var_dump(get_post_format());
//var_dump(is_page());

if(isset($_GET['page'])){
    if($_GET['page']=="signup"){
        get_template_part( 'content', 'signup' );

    }
    if($_GET['page']=="server"){
        get_template_part( 'content', 'server' );

    }
    if($_GET['page']=="news"){
        get_template_part( 'content', 'news' );
    }
}else{
    get_template_part( 'content', 'index' );
}

?>