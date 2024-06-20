document.addEventListener('DOMContentLoaded', () => {
    const sliders = document.querySelectorAll('.image-slider');
    const cartCountElement = document.querySelector('.cart-count');
    const quantityInput = document.querySelector('.quantity-input');
    const cartIcon = document.getElementById('cart-icon');
    const cartModal = document.getElementById('cart-modal');
    const closeButton = cartModal.querySelector('.close-button');
    const cartItemsContainer = cartModal.querySelector('.cart-items');
    const checkoutButton = cartModal.querySelector('.checkout-button');
    const closeCartButton = cartModal.querySelector('.close-cart-button');
    
    let cart = {};
    
    sliders.forEach(slider => {
        let images = slider.querySelectorAll('img');
        let currentIndex = 0;
    
        function showImage(index) {
            images.forEach((img, i) => {
                img.classList.remove('active');
                img.classList.add('inactive');
                if (i === index) {
                    img.classList.add('active');
                    img.classList.remove('inactive');
                }
            });
        }
    
        document.getElementById('search-input').addEventListener('input', (event) => {
    const searchQuery = event.target.value.toLowerCase();
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        const productName = card.querySelector('h2').textContent.toLowerCase();
        if (productName.includes(searchQuery)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
    });
    
    
        document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('change', (event) => {
        const productCard = event.target.closest('.product-card');
        const productId = productCard.querySelector('h2').textContent;
        const quantity = parseInt(event.target.value);
    
        if (!cart[productId]) {
            cart[productId] = {
                quantity: 0,
                price: parseFloat(productCard.dataset.price)
            };
        }
    
        cart[productId].quantity = quantity;
        updateCartDisplay();
        updateProductTotal(productCard, cart[productId]);
    });
    });
    
    
        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            showImage(currentIndex);
        }
    
        showImage(currentIndex);
        setInterval(nextImage, 3000);
    });
    
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', (event) => {
            const productCard = event.target.closest('.product-card');
            const quantityInput = productCard.querySelector('.quantity-input');
            const quantity = parseInt(quantityInput.value);
            const price = parseFloat(productCard.dataset.price);
            const productId = productCard.querySelector('h2').textContent;
    
            if (!cart[productId]) {
                cart[productId] = {
                    quantity: 0,
                    price: price
                };
            }
    
            cart[productId].quantity += quantity;
            updateCartDisplay();
            updateProductTotal(productCard, cart[productId]);
        });
    });
    
    cartIcon.addEventListener('click', () => {
        displayCartItems();
        cartModal.style.display = 'flex';
    });
    
    closeButton.addEventListener('click', () => {
        cartModal.style.display = 'none';
    });
    
    
    closeCartButton.addEventListener('click', () => {
        cartModal.style.display = 'none';
    });
    
    checkoutButton.addEventListener('click', () => {
        window.location.href = 'checkout.html'; // Redirect to payment gateway page
    });

    productModalClose.addEventListener('click', () => {
        productModal.style.display = 'none';
    });
    
    window.addEventListener('click', (event) => {
        if (event.target === cartModal) {
            cartModal.style.display = 'none';
        }
        if (event.target === productModal) {
            productModal.style.display = 'none';
        }
    });
    
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('click', () => {
            const title = card.querySelector('h2').textContent;
            const description = card.querySelector('p').textContent;
            const price = card.dataset.price;
            const images = Array.from(card.querySelectorAll('img'));
    
            productModalTitle.textContent = title;
            productModalDescription.textContent = description;
            productModalPrice.textContent = `Price: R${price}`;
            productModalSlider.innerHTML = '';
    
            images.forEach((img, index) => {
                const modalImg = document.createElement('img');
                modalImg.src = img.src;
                modalImg.className = index === 0 ? 'active' : 'inactive';
                productModalSlider.appendChild(modalImg);
            });
    
            productModal.style.display = 'flex';
    
            const modalSliders = productModalSlider.querySelectorAll('img');
            let currentModalIndex = 0;
    
            function showModalImage(index) {
                modalSliders.forEach((img, i) => {
                    img.classList.remove('active');
                    img.classList.add('inactive');
                    if (i === index) {
                        img.classList.add('active');
                        img.classList.remove('inactive');
                    }
                });
            }
    
            function nextModalImage() {
                currentModalIndex = (currentModalIndex + 1) % modalSliders.length;
                showModalImage(currentModalIndex);
            }
    
            showModalImage(currentModalIndex);
            setInterval(nextModalImage, 3000);
    
            productModalAddToCart.dataset.productId = title;
            productModalAddToCart.dataset.price = price;
        });
    });
    
    productModalAddToCart.addEventListener('click', () => {
        const productId = productModalAddToCart.dataset.productId;
        const price = parseFloat(productModalAddToCart.dataset.price);
        const quantity = 1; // Or use a quantity input if needed
    
        if (!cart[productId]) {
            cart[productId] = {
                quantity: 0,
                price: price
            };
        }
    
        cart[productId].quantity += quantity;
        updateCartDisplay();
        productModal.style.display = 'none';
    });
    
    function updateCartDisplay() {
        let totalQuantity = 0;
        for (let productId in cart) {
            totalQuantity += cart[productId].quantity;
        }
        cartCountElement.textContent = totalQuantity;
    }
    
    function updateProductTotal(productCard, product) {
        const productTotalElement = productCard.querySelector('.product-total');
        productTotalElement.textContent = `Total: ${product.quantity} items - R${(product.quantity * product.price).toFixed(2)}`;
    }
    
    function displayCartItems() {
        cartItemsContainer.innerHTML = '';
        for (let productId in cart) {
            const cartItem = document.createElement('div');
            cartItem.className = 'cart-item';
            cartItem.innerHTML = `
                <h3>${productId}</h3>
                <p>Price: R${cart[productId].price.toFixed(2)}</p>
                <div class="quantity-control">
                    <button class="decrement" data-product="${productId}">-</button>
                    <p>Quantity: ${cart[productId].quantity}</p>
                    <button class="increment" data-product="${productId}">+</button>
                </div>
                <p>Total: R${(cart[productId].quantity * cart[productId].price).toFixed(2)}</p>
            `;
            cartItemsContainer.appendChild(cartItem);
        }
    
        cartItemsContainer.querySelectorAll('.increment').forEach(button => {
            button.addEventListener('click', (event) => {
                const productId = event.target.dataset.product;
                cart[productId].quantity += 1;
                updateCartDisplay();
                displayCartItems();
            });
        });
    
        cartItemsContainer.querySelectorAll('.decrement').forEach(button => {
            button.addEventListener('click', (event) => {
                const productId = event.target.dataset.product;
                if (cart[productId].quantity > 1) {
                    cart[productId].quantity -= 1;
                } else {
                    delete cart[productId];
                }
                updateCartDisplay();
                displayCartItems();
            });
        });
    }


hamburgerIcon.addEventListener('click', () => {
    navMenu.style.display = navMenu.style.display === 'block' ? 'none' : 'block';
});
   
    
    });
    

   