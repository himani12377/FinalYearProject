<?php 

$db = mysqli_connect("localhost","root","","bluegroup");


/// begin getRealIpUser functions ///
function getRealIpUser(){

    switch(true){
            
        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        
        default : return $_SERVER['REMOTE_ADDR'];
        }
}
/// finish getRealIpUser functions ///


/// begin add_cart function ///

function add_cart(){

    global $db;
    
    if(isset($_GET['add_cart'])){
         
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];
        
        $product_qty = $_POST['product_qty'];
        
        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product is already added to the cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "insert into cart (p_id,ip_add,qty) values ('$p_id','$ip_add','$product_qty')";
            
            $run_query = mysqli_query($db,$query);
            echo "<script>alert('Product has been added to your cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }
        
    }

}
/// finish add_cart function ///

function getPro()
{
    
    global $db;
    
    $get_products = "select * from products order by 1 DESC LIMIT 0,8";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products))
    {
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        
        $pro_price = $row_products['product_price'];
        
        $pro_img = $row_products['product_img'];
        
        echo "
        
        <div class='col-md-4 col-sm-6 single'>
        
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='admin_area/product_images/$pro_img'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                        NZ$$pro_price
                    
                    </p>
                    
                    <p class='button'>
                    
                    
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping-cart'></i> Add to Cart

                        </a>
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
        
        ";
        
    }
    
}



function getCats()
{
    global $db;
    
    $get_cats = "select * from categories";
    
    $run_cats = mysqli_query($db,$get_cats);
    while($row_cats = mysqli_fetch_array($run_cats))
    {
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];
        echo "
        <li>
        <a href='shop.php?cat=$cat_id'> $cat_title
        </a>
        </li>";
    }
}

/// begin getpcatpro functions ///

function getpcatpro()
{
    
    global $db;
    
    if(isset($_GET['cat']))
    {
        $cat_id = $_GET['cat'];
        $get_cat ="select * from categories where cat_id='$cat_id'";
        $run_cat = mysqli_query($db,$get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_title = $row_cat['cat_title'];
        $cat_desc = $row_cat['cat_desc'];
        $get_products ="select * from products where cat_id='$cat_id'";
        
        $run_products = mysqli_query($db,$get_products);
        $count = mysqli_num_rows($run_products);
        
        if($count==0)
        {
            
            echo "
            <div class='box' style='margin-bottom:30px;'>
                <h1> No Product Found In This Category </h1>
            </div>
            ";
            
        }
        else
        {
            
            echo "
            
            <div class='box' style='margin-bottom:30px;'>             <!-- box Begin -->
            <h1>$cat_title</h1>
            <p> $cat_desc </p>
            </div>                        <!-- box Finish -->

            
            ";
            
        }
        
        while($row_products=mysqli_fetch_array($run_products))
        {
            
            $pro_id = $row_products['product_id'];
        
            $pro_title = $row_products['product_title'];

            $pro_price = $row_products['product_price'];

            $pro_img = $row_products['product_img'];
            
            echo "
            
            <div class='col-4 center-responsive '>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                        <img  src='images/coins/$pro_img'>
                    </a>
                <div class='text'>
                    <h4 style=' color: #555; padding-top: 10px;  text-overflow: ellipsis;
                    white-space: nowrap;
                    overflow: hidden;'>
                        <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                    </h4>
                <p class='price'>$$pro_price</p> 
                <p class='buttons'>
                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'> 
                        <i class='fa fa-shopping-cart'></i> Add To Cart
                    </a> 
                </p>

                </div>
            </div>
            </div>
            
            ";
            
        }
        
    }
    
}

/// finish getpcatpro function ///

/// begin items functions 
function items(){
    global $db;
    
    $ip_add = getRealIpUser();
    
    $get_items = "select * from cart where ip_add='$ip_add'";
    
    $run_items = mysqli_query($db,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items; 
}
/// finish items function ///
/// begin total_price functions ///

function total_price(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $total = 0;
    
    $select_cart = "select * from cart where ip_add='$ip_add'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['p_id'];
        
        $pro_qty = $record['qty'];
        
        $get_price = "select * from products where product_id='$pro_id'";
        
        $run_price = mysqli_query($db,$get_price);
        
        while($row_price=mysqli_fetch_array($run_price)){
            
            $sub_total = $row_price['product_price']*$pro_qty;
            
            $total += $sub_total;
            
        }
        
    }
    
    echo "$" . $total;
    
}

/// finish total_price functions ///
?>





<?php

/**
 * Verify transaction is authentic
 *
 * @param array $data Post data from Paypal
 * @return bool True if the transaction is verified by PayPal
 * @throws Exception
 */
function verifyTransaction($data) {
	global $paypalUrl;

	$req = 'cmd=_notify-validate';
	foreach ($data as $key => $value) {
		$value = urlencode(stripslashes($value));
		$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value); // IPN fix
		$req .= "&$key=$value";
	}

	$ch = curl_init($paypalUrl);
	curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
	curl_setopt($ch, CURLOPT_SSLVERSION, 6);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
	$res = curl_exec($ch);

	if (!$res) {
		$errno = curl_errno($ch);
		$errstr = curl_error($ch);
		curl_close($ch);
		throw new Exception("cURL error: [$errno] $errstr");
	}

	$info = curl_getinfo($ch);

	// Check the http response
	$httpCode = $info['http_code'];
	if ($httpCode != 200) {
		throw new Exception("PayPal responded with http code $httpCode");
	}

	curl_close($ch);

	return $res === 'VERIFIED';
}

/**
 * Check we've not already processed a transaction
 *
 * @param string $txnid Transaction ID
 * @return bool True if the transaction ID has not been seen before, false if already processed
 */
function checkTxnid($txnid) {
	global $db;

	$txnid = $db->real_escape_string($txnid);
	$results = $db->query('SELECT * FROM `payments` WHERE txnid = \'' . $txnid . '\'');

	return ! $results->num_rows;
}

/**
 * Add payment to database
 *
 * @param array $data Payment data
 * @return int|bool ID of new payment or false if failed
 */
function addPayment($data) {
	global $db;

	if (is_array($data)) {
		$stmt = $db->prepare('INSERT INTO `payments` (txnid, payment_amount, payment_status, itemid, createdtime) VALUES(?, ?, ?, ?, ?)');
		$stmt->bind_param(
			'sdsss',
			$data['txn_id'],
			$data['payment_amount'],
			$data['payment_status'],
			$data['item_number'],
			date('Y-m-d H:i:s')
		);
		$stmt->execute();
		$stmt->close();

		return $db->insert_id;
	}

	return false;
}