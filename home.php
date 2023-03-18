 <!DOCTYPE <html>
    <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JamJam Petshop</title>
    <!DOCTYPE <html>
    <html lang="en">
	<link rel="stylesheet" href="style2.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JamJam Petshop</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b946b2de36.js" crossorigin="anonymous"></script>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

     <link rel="shortcut icon" href="img/main_logo/LOGO2.png">


</head>
 <!-- Header-->
 <header class="bg-dark py-5" id="main-header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">JamJam Petshop</h1>
            <p class="lead fw-normal text-white-50 mb-0">Looking for your pet's needs? Shop Now!</p>
        </div>
    </div>
</header>

 <section id="feature" class="section-p1">
        <div class="feat-box">
            <img src="uploads/interface_logo/CATBG.png" width="150px" alt="">
            <h6>Kitty Section</h6>
        </div>

        <div class="feat-box">
            <img src="uploads/interface_logo/PUPBG2.png" width="150px" alt="">
            <h6>Puppy Section</h6>
        </div>

        <div class="feat-box">
            <img src="uploads/sub_logo/FISH.png" width="150px" alt="">
            <h6>Fish Section</h6>
        </div>

        <div class="feat-box">
            <img src="uploads/sub_logo/HAMSTER.png" width="150px" alt="">
            <h6>Small Fur Section</h6>
        </div>

        <div class="feat-box">
            <img src="uploads/main_logo/LOGO2.png" width="150px" alt="">
            <h6>Coming Soon</h6>
        </div>

        <div class="feat-box">
            <img src="uploads/main_logo/LOGO2.png" width="150px" alt="">
            <h6>Coming Soon</h6>
        </div>
    </section>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php 
                $products = $conn->query("SELECT * FROM `products` where status = 1 order by rand() limit 8 ");
                while($row = $products->fetch_assoc()):
                    $upload_path = base_app.'/uploads/product_'.$row['id'];
                    $img = "";
                    if(is_dir($upload_path)){
                        $fileO = scandir($upload_path);
                        if(isset($fileO[2]))
                            $img = "uploads/product_".$row['id']."/".$fileO[2];
                        // var_dump($fileO);
                    }
                    $inventory = $conn->query("SELECT * FROM inventory where product_id = ".$row['id']);
                    $inv = array();
                    while($ir = $inventory->fetch_assoc()){
                        $inv[$ir['size']] = number_format($ir['price']);
                    }
            ?>
            <div class="col mb-5">
                <div class="card h-100 product-item">
                    <!-- Product image-->
                    <img class="card-img-top w-100" src="<?php echo validate_image($img) ?>" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?php echo $row['product_name'] ?></h5>
                            <!-- Product price-->
                            <?php foreach($inv as $k=> $v): ?>
                                <span><b><?php echo $k ?>: </b><?php echo $v ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-flat btn-primary "   href=".?p=view_product&id=<?php echo md5($row['id']) ?>">View</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>