<?php   
    include 'models/page_model.php';
    $page=new page_model();  


    switch ($_GET['page']){
        case 'entradas':
            $page_select="recursos/entradas";
            $datos = $page->get_entradas();
            break;

        case 'comoLlegar':
            $page_select="recursos/comoLlegar";
            break;
    }

    include 'views/page.php'; 
?>