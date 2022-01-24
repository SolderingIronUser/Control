<?php

function sorted($sort)
{
    if($sort=="desc")
    {
        return "SELECT product_name, id, product_article, product_price, product_quantity, product_status,
                                  date_create FROM Products ORDER BY date_create DESC";
    }
    if($sort=="asc")
    {
        return "SELECT product_name, id, product_article, product_price, product_quantity, product_status,
                                  date_create FROM Products ORDER BY date_create ASC";
    }  
}

?>