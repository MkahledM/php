<?php include('partial-front/menu.php'); ?>
    <!-- drinks sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Drink.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php 
    if (isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
          
<?php
$sql="SELECT * FROM tbl_category WHERE active='yes'  AND featured='yes' LIMIT 3";
$res =mysqli_query($conn ,$sql);
 $count = mysqli_num_rows($res);
     if($count>0)
 {
     while($row=mysqli_fetch_assoc($res))
        {
         $id = $row['id'];
         $title = $row['title'];
         $image_name = $row['image_name'];
              ?>
               <a href="category-foods.html">
         
              <div class="box-3 float-container">
               <?php
if($image_name==""){
    echo "<div class='error'>Image Not Availble</div>";
}else{
    ?>
   
       <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
    <?php
}
               ?>
           

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>
            <?php
                }
    
            } else{
                echo "<div class='error'>category not added</div>";
            }
?>




           

           

           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Drinks MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Drinks Menu</h2>


        
            <?php
$sql2="SELECT * FROM tbl_drink WHERE active='yes'  AND featured='yes' LIMIT 6";
$res2 =mysqli_query($conn ,$sql);
 $count2 = mysqli_num_rows($res);
     if($count2>0)
 {
     while($row=mysqli_fetch_assoc($res))
        {
         $id = $row['id'];
         $title = $row['title'];
         $price = $row['price'];
         $image_name = $row['image_name'];
?>
<a href="<?php echo SITEURL;?> category-foodss.php?category_id=<?php echo $id;?>"></a>

<div class="box-3 float-container">
  <?php
if($image_name==""){
    echo "<div class='error'>Image Not Availble</div>";
}else{
    ?>
   
       <img src="<?php echo SITEURL; ?>images/drinks/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
    <?php
}
               ?>
           
                  
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title ?></h4>
                    <p class="food-price"><?php echo $price ?></p>
                    <p class="food-detail">
                    <?php echo $description ?>                 </p>
                    <br>

                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>



<?php

        }
    }
    else{
        echo "<div class='error'>Drinks not added</div>";
    }
?>

             

          

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partial-front/footer.php'); ?>
