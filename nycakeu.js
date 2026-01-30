document.addEventListener('DOMContentLoaded', () => {

    
    let cart = JSON.parse(localStorage.getItem('cart_nycakeu') || '[]');

 
    function saveCart() {
        localStorage.setItem('cart_nycakeu', JSON.stringify(cart));
    }

   
    function updateCartCount() {
        const cartCount = document.getElementById('cartCount');
        if (!cartCount) return;

        const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
        cartCount.textContent = totalItems;
    }

    
    function renderCart() {
        const cartItems = document.getElementById('cartItems');
        const cartTotal = document.getElementById('cartTotal');

        if (!cartItems || !cartTotal) return;

        cartItems.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            total += item.price * item.qty;

            const li = document.createElement('li');
            li.className = "list-group-item d-flex justify-content-between align-items-center";

            li.innerHTML = `
                <div>
                    ${item.name}
                    <span class="mx-2">× ${item.qty}</span>
                </div>

                <div>
                    Rp ${(item.price * item.qty).toLocaleString('id-ID')}
                    <button class="btn btn-sm btn-outline-success ms-2 btn-increase" data-index="${index}">+</button>
                    <button class="btn btn-sm btn-outline-danger ms-1 btn-decrease" data-index="${index}">-</button>
                </div>
            `;

            cartItems.appendChild(li);
        });

        // Perbaikan Sintaksis: Menggunakan backticks
        cartTotal.textContent = `Rp ${total.toLocaleString('id-ID')}`; 

        updateCartCount();
        saveCart();
    }


    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', () => {
            const name = btn.dataset.name;
            const price = Number(btn.dataset.price);

            const existing = cart.find(item => item.name === name);

            if (existing) {
                existing.qty += 1;
            } else {
                cart.push({ name, price, qty: 1 });
            }

            renderCart();
        });
    });

  
    const cartItems = document.getElementById('cartItems');
    if (cartItems) {
        cartItems.addEventListener('click', (e) => {
            const index = e.target.dataset.index;

            if (e.target.classList.contains('btn-increase')) {
                cart[index].qty += 1;
            }

            if (e.target.classList.contains('btn-decrease')) {
                cart[index].qty -= 1;
                if (cart[index].qty <= 0) {
                    cart.splice(index, 1);
                }
            }

            renderCart();
        });
    }

    // FUNGSI BARU: Mereset keranjang saat form kontak disubmit
    const contactForm = document.getElementById('contactForm');

    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault(); 
            
            // 1. Reset keranjang
            cart = []; 
            
            // 2. Update tampilan dan localStorage
            renderCart(); 
            
            // 3. Memberikan feedback dan mengosongkan input form
            const toastEl = document.getElementById('submitToast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
            contactForm.reset(); 
        });
    }

    
    renderCart();
});