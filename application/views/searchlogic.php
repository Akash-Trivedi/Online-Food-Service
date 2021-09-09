<?php //Main Product Block Display
    //$brand=$_POST['bname'];
    if(isset($_POST['item_to_search'])){
    $product=strtolower($_POST['item_to_search']);
    $query="SELECT * FROM brands NATURAL JOIN products NATURAL JOIN product_categories";
    $result=mysqli_query($conobj, $query);
    $array=mysqli_fetch_all($result);//(Procedural Style)Every row is now transfered as array in $array
    if(count($array)>0){
        $count=0;
        foreach ($array as $data){
            //To Check if the Data was Found or Not(searching comapny/full product name wise)
            if(strtolower($data[2])==$product || strtolower($data[4])==$product || strstr(strtolower($data[4]),$product) ){
                component($data[2].":".$data[4], $data[5], $data[7], $data[3]);
        }else{
            $count+=1;
        }
        }
        if($count==count($array)){
        echo "<h1 style='text-align:center;color=red;'>Oops1 No Such Product Available Yet!:(</h1>";
        }
    } else{
        ?>
        <h1 style="text-align:center;color=red;">Oops2 No Such Product Available Yet!:(</h1><?php
    }
    } else{
        echo "<h1 style='text-align:center;color=red;'>Oops3 No Such Product Available Yet!:(</h1>";
    }?>