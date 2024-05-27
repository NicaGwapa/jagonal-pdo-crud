<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        /* Styles omitted for brevity */
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Navbar content omitted for brevity -->
</nav>
<body>
    <div id="productsDisplay" class="card-grid"></div>
    <!-- Cart Display Area -->
    <div id="cartContainer"></div>
    <!-- Checkout Area -->
    <div id="checkoutContainer" style="display: none;">
        <h3>Checkout</h3>
        <form id="checkoutForm">
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" required>
            </div>
            <div class="form-group">
                <label for="payment">Payment Method:</label>
                <select class="form-control" id="payment" required>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="PayPal">PayPal</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>

    <script>
        let cart = {};

        fetch('./products/products-api.php')
            .then(response => response.json())
            .then(data => {
                const productsContainer = document.getElementById('productsDisplay');
                data.forEach(product => {
                    const cardHTML = `
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="${product.img}">
                        <div class="card-body">
                            <h5 class="card-title">${product.title}</h5>
                            <p class="card-text">Price: ₱${product.rrp}</p>
                            <p class="card-text">${product.description}</p>
                            <p class="card-text">Quantity: <span id="product-quantity-${product.id}">${product.quantity}</span></p>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-success" onclick="addToCart(${product.id}, '${product.title}', ${product.rrp}, ${product.quantity})">
                                    <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                                <button class="btn btn-primary" onclick="buyNow(${product.id}, '${product.title}', ${product.rrp}, ${product.quantity})">
                                    Buy Now
                                </button>
                                <button class="btn btn-secondary" onclick="incrementQuantity(${product.id})">
                                    +
                                </button>
                                <button class="btn btn-secondary" onclick="decrementQuantity(${product.id})">
                                    -
                                </button>
                            </div>
                        </div>
                    </div>`;
                    productsContainer.innerHTML += cardHTML;
                });
            })
            .catch(error => console.error('Error:', error));

        function addToCart(productId, productName, productPrice, availableQuantity) {
            if (cart[productId]) {
                if (cart[productId].quantity < availableQuantity) {
                    cart[productId].quantity++;
                } else {
                    alert('No more stock available');
                }
            } else {
                cart[productId] = { 
                    name: productName,
                    price: productPrice,
                    quantity: 1,
                    availableQuantity: availableQuantity 
                };
            }
            displayCart();
        }

        function buyNow(productId, productName, productPrice, availableQuantity) {
            if (cart[productId]) {
                if (cart[productId].quantity < availableQuantity) {
                    cart[productId].quantity++;
                } else {
                    alert('No more stock available');
                    return;
                }
            } else {
                cart[productId] = { 
                    name: productName,
                    price: productPrice,
                    quantity: 1,
                    availableQuantity: availableQuantity 
                };
            }
            checkout();
        }

        function incrementQuantity(productId) {
            if (cart[productId] && cart[productId].quantity < cart[productId].availableQuantity) {
                cart[productId].quantity++;
                displayCart();
            } else {
                alert('No more stock available');
            }
        }

        function decrementQuantity(productId) {
            if (cart[productId] && cart[productId].quantity > 1) {
                cart[productId].quantity--;
            } else {
                delete cart[productId];
            }
            displayCart();
        }

        function displayCart() {
            const cartContainer = document.getElementById('cartContainer');
            let cartHTML = '<h3>Cart</h3>';
            let totalQuantity = 0;
            let totalPrice = 0;
            for (const [productId, product] of Object.entries(cart)) {
                totalQuantity += product.quantity;
                totalPrice += product.price * product.quantity;
                cartHTML += `
                    <div class="cart-item">
                        <p>Name: ${product.name}, Price: ₱${product.price}, Quantity: ${product.quantity}</p>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm" onclick="incrementQuantity(${productId})">+</button>
                            <button class="btn btn-secondary btn-sm" onclick="decrementQuantity(${productId})">-</button>
                        </div>
                    </div>`;
            }
            if (Object.keys(cart).length > 0) {
                cartHTML += `<button class="btn btn-success" onclick="checkout()">Buy Now</button>`;
            }
            cartHTML += `<p>Total Quantity: ${totalQuantity}, Total Price: ₱${totalPrice}</p>`;
            cartContainer.innerHTML = cartHTML;
        }

        function checkout() {
            document.getElementById('checkoutContainer').style.display = 'block';
        }

        document.getElementById('checkoutForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const address = document.getElementById('address').value;
            const paymentMethod = document.getElementById('payment').value;
            alert(`Order placed!\nAddress: ${address}\nPayment Method: ${paymentMethod}`);
            cart = {};
            displayCart();
            document.getElementById('checkoutContainer').style.display = 'none';
        });
    </script>
</body>
</html>
