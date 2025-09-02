// Funcionalidad del menú de navegación
const navBar = document.querySelector('.nav-bar');
const logoContainer = document.querySelector('.logo-container');

// Agregar clase de menú activo al hacer scroll
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        navBar.classList.add('nav-active');
        logoContainer.classList.add('logo-active');
    } else {
        navBar.classList.remove('nav-active');
        logoContainer.classList.remove('logo-active');
    }
});

// Botón de desplazamiento suave para enlaces internos
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Botón de regreso al inicio
const scrollToTopButton = document.querySelector('.scroll-to-top');

window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
        scrollToTopButton.style.display = 'block';
    } else {
        scrollToTopButton.style.display = 'none';
    }
});

scrollToTopButton.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Efecto de hover en tarjetas de servicios
const serviceCards = document.querySelectorAll('.service-card');
serviceCards.forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.style.transform = 'scale(1.05)';
        card.style.transition = 'transform 0.3s ease';
    });

    card.addEventListener('mouseleave', () => {
        card.style.transform = 'scale(1)';
    });
});

// Modal para detalles de productos
function showProductDetails(productId) {
    const modal = document.createElement('div');
    modal.className = 'product-modal';
    
    modal.innerHTML = `
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Detalles del Producto</h2>
            <!-- Aquí irían los detalles específicos del producto -->
            <p>Cargando detalles...</p>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    const closeBtn = modal.querySelector('.close-modal');
    closeBtn.addEventListener('click', () => {
        modal.remove();
    });
}

// Event listener para los botones de detalles
document.querySelectorAll('.btn-details').forEach(button => {
    button.addEventListener('click', (e) => {
        const productId = e.target.dataset.productId;
        showProductDetails(productId);
    });
});

// Función para manejar el formulario de contacto
function handleContactForm() {
    const form = document.querySelector('#contact-form');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Validación básica
            const name = form.querySelector('#name').value;
            const email = form.querySelector('#email').value;
            const message = form.querySelector('#message').value;
            
            if (!name || !email || !message) {
                alert('Por favor, complete todos los campos.');
                return;
            }
            
            // Aquí iría la lógica para enviar el formulario
            console.log('Formulario enviado:', { name, email, message });
            alert('Gracias por tu mensaje. Te contactaremos pronto.');
            form.reset();
        });
    }
}

// Inicializar la aplicación
document.addEventListener('DOMContentLoaded', () => {
    handleContactForm();
});
