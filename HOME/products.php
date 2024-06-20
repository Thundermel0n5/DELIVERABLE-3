<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:HOME.html"); // Redirect to login page if not logged in
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Product Page</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
<h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <header>
        <div class="logo">
            <img src="../HOME/ImagesHome/Honest-Chocolate-Logo-400x175.png" alt="Logo">
        </div>
        <nav>
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
            <ul class="nav-links" id="nav-links">
                <li><a href="../HOME/HOME.html">Home</a></li>
                <li><a href="../PRODUCTS/PRODUCTS.html">Products</a></li>
                <li><a href="../CONTACT US/ContactUs.html">Contact Us</a></li>
            </ul>
   
           
    </nav>
    </header>

             
    <div class="cart" id="cart-icon">       
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
          <path d="M21.822 7.431A1 1 0 0 0 21 7H7.333L6.179 4.23A1.994 1.994 0 0 0 4.333 3H2v2h2.333l4.744 11.385A1 1 0 0 0 10 17h8c.417 0 .79-.259 .937-.648l3-8a1 1 0 0 0-.115-.921z" />  <circle cx="10.5" cy="19.5" r="1.5"></circle>
          <circle cx="17.5" cy="19.5" r="1.5"></circle>
        </svg>
        <span class="cart-count">0</span>
       
            </div>

    <input type="text" id="search-input" placeholder="Search products...">
    <div id="search-error" style="color: red;"></div>
    

    
    <div class="products">

        <!---This is the first product-->
        <div class="product-card" data-price="260.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/three.png" alt="Product 1 Image 1">
                <img src="../PRODUCTS/Images/three-open.jpg" alt="Product 1 Image 2">
            </div>
            <h2>LOVE CAPE TOWN SLAB COLLECTION</h2>
            <p>R260.00</p>

            <input type="number" value="0" min="0" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>

        <!---This is the second product-->
        
        <div class="product-card" data-price="60.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/cape sea salt.png" alt="Product 2 Image 1">
                <img src="../PRODUCTS/Images/cape sea salt.png" alt="Product 2 Image 2">
            </div>
            <h2>DARK MYLK WITH CAPE SEA SALT</h2>
            <p>R60.00</p>
            <input type="number" value="0" min="0" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>

        
        <div class="product-card" data-price="60.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/fynbos.png" alt="Product 2 Image 1"> 
                <img src="../PRODUCTS/Images/fynbos.png" alt="Product 2 Image 1"> 
            </div>

            <h2>DARK MYLK WITH FYNOS BUCHU</h2>
            <p>R60.00</p>
            <input type="number" value="0" min="0" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>



        <div class="product-card" data-price="60.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/Rooibos.png" alt="ROOIBOS CHOCOLATE ">  
            </div>
            <h2>DARK MYLK WITH ROOIBOS</h2>
            <p>R60.00</p>
            <input type="number" value="0" min="0" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>
        
        <div class="product-card" data-price="75.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/MACA-PACKED.jpg" alt="Product 2 Image 1">
                <img src="../PRODUCTS/Images/MACA-BACK.jpg" alt="Product 2 Image 1">
                <img src="../PRODUCTS/Images/MACA.jpg" alt="Product 2 Image 1">
                
            </div>
            <h2>54% DARK MYLK WITH PERUVIAN MACA</h2>
            <p>R75.00</p>
            <input type="number" value="0" min="0" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>
        
        <div class="product-card" data-price="200.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/gift-open.jpg" alt="Product 2 Image 1">
                <img src="../PRODUCTS/Images/clear-box.jpg" alt="Product 2 Image 2">      
            </div>

            <h2>THE DARK SIDE COLLECTION GIFT BOX</h2>
            <p>R200.00</p>
            <input type="number" value="0" min="0" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>
        

        <div class="product-card" data-price="500.00">
            <div class="image-slider">
                
                <img src="../PRODUCTS/Images/ultimate-box-packed.jpg" alt="Product 2 Image 2">
                
            </div>
            <h2> ULTIMATE CHOCOHOLIC GIFT BOX</h2>
            <p>R500.00</p>
            <input type="number" value="0" min="0" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>

        <div class="product-card" data-price="110.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/Organic-cacao-nibs.jpg" alt="Product 2 Image 1">
                
               
            </div>
            <h2>DOUBLE CHOCOLATE BROWNIE MIX <br>
                (GLUTEN-FREE, VEGAN, CANE SUGAR-FREE)</h2>
            <p>R110.00</p>
            <input type="number" value="0" min="0" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>

        <div class="product-card" data-price="80.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/brownie-mix-one-side.jpg" alt="Product 2 Image 1"> 
            </div>

            <h2>DOUBLE CHOCOLATE BROWNIE MIX (CONVENTIONAL)</h2>
            <p>R80.00</p>
            <input type="number" value="0" min="0" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>
        
        <!---This is the thrird product-->
        <div class="product-card" data-price="50.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/hot-chocolate-mix.jpg" alt="Product 3 Image 1">
            </div>
            <h2>ORGANIC HOT CHOCOLATE</h2>
            <p>R50.00</p>
            <input type="number" value="0" min="0" class="quantity-input ">
            <button class="add-to-cart">Add to Cart</button>
        </div>


        <div class="product-card" data-price="350.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/cake-center.jpg" alt="Product 2 Image 1"> 
                <img src="../PRODUCTS/Images/cake-side.jpg" alt="cake from the side">
                <img src="../PRODUCTS/Images/Cake-top.jpg" alt="cake from the top">
            </div>

            <h2>ALMOND CHOCOLATE CHEESECAKE (GLUTEN-FREE)</h2>
            <p>R350.00</p>
            <input type="number" value="0" min="0" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>


        <div class="product-card" data-price="320.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/whole-chocolate-cake-scaled.jpg" alt="Product 2 Image 1"> 
                <img src="../PRODUCTS/Images/slice-of-chocolate-cake-scaled.jpg" alt="cake from the side">
                
            </div>

            <h2>*CHOCOLATE CAKE*</h2>
            <p>R320.00</p>
            <input type="number" value="0" min="0" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>


        <div class="product-card" data-price="150.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/zoom-brownies--scaled.jpg" alt="Product 2 Image 1"> 
                <img src="../PRODUCTS/Images/brownie-inside--scaled.jpg" alt="cake from the side">
            </div>

            <h2>Double chocolate brownies - Cafe Tray</h2>

            <p>R150.00</p>
           
            <input type="number" value="1" min="1" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>

        <div class="product-card" data-price="350.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/full-cheesecake-edited--scaled.jpg" alt="Product 2 Image 1"> 
                <img src="../PRODUCTS/Images/cheesecke-slice--scaled.jpg" alt="cake from the side">
               
            </div>

            <h2>Chocolate Cheesecake</h2>
            <p>R350.00</p>
            <input type="number" value="1" min="1" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>

        <div class="product-card" data-price="350.00">
            <div class="image-slider">
                <img src="../PRODUCTS/Images/range.jpg" alt="Product 2 Image 1"> 
                <img src="../PRODUCTS/Images/range2.jpg" alt="cake from the side">
               
            </div>

            <h2>Chocolate Range 4x</h2>
            <p>R150.00</p>
            <input type="number" value="1" min="1" class="quantity-input">
            <button class="add-to-cart">Add to Cart</button>
        </div>





    </div>
    <div class="product-total"></div>
</div>

<!---window will appear when user click on cart-->

<div id="cart-modal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>Shopping Cart</h2>
        <div class="cart-items"></div>
        <div class="cart-actions">
            <button class="checkout-button">Checkout</button>
            <button class="close-cart-button">Close</button>
        </div>
    </div>
</div>


<div class="footer">
    <p>Honest Chocolate</p>
    <div class="social-links">
        <a href="https://www.facebook.com/honestchocolate/" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
        <a href="https://x.com/HonestChoc" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/honestchocolate/" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="cafe@honestchocolate.co.za" aria-label="email"><i class="fas fa-envelope"></i></a>
    </div>

    
<script src="Products.js">
   </script>

<script src="hamburger.js">
   </script>
</body>
</html>


<!---I am stuck with the product description window: problem add to cart
feature doesnt work and more information about product struggle,.......->