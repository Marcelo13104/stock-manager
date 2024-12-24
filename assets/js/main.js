// assets/js/main.js

// Adicionar no início do arquivo
document.addEventListener('DOMContentLoaded', function() {
    // Toggle Sidebar
    document.getElementById('sidebarCollapse').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('active');
    });

    // Carregar produtos
    loadProducts();
});;

let products = [];
const modal = new bootstrap.Modal(document.getElementById('productModal'));

function loadProducts() {
    fetch('../api/products.php')
        .then(response => response.json())
        .then(data => {
            products = data;
            renderProducts();
        });
}

function renderProducts() {
    const table = document.getElementById('productTable');
    table.innerHTML = products.map(product => `
        <tr>
            <td>${product.id}</td>
            <td>${product.name}</td>
            <td>${product.description}</td>
            <td>${product.quantity}</td>
            <td>R$ ${parseFloat(product.price).toFixed(2)}</td>
            <td>
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-warning" onclick="editProduct(${product.id})">Editar</button>
                    <button class="btn btn-danger" onclick="deleteProduct(${product.id})">Excluir</button>
                </div>
            </td>
        </tr>
    `).join('');
}

function saveProduct() {
    const id = document.getElementById('productId').value;
    const data = {
        name: document.getElementById('name').value,
        description: document.getElementById('description').value,
        quantity: document.getElementById('quantity').value,
        price: document.getElementById('price').value
    };

    const method = id ? 'PUT' : 'POST';
    const url = id ? `../api/products.php?id=${id}` : '../api/products.php';

    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(() => {
        loadProducts();
        modal.hide();
        document.getElementById('productForm').reset();
        document.getElementById('productId').value = '';
    });
}

function editProduct(id) {
    const product = products.find(p => p.id == id);
    document.getElementById('productId').value = product.id;
    document.getElementById('name').value = product.name;
    document.getElementById('description').value = product.description;
    document.getElementById('quantity').value = product.quantity;
    document.getElementById('price').value = product.price;
    modal.show();
}

function deleteProduct(id) {
    if (confirm('Tem certeza que deseja excluir este produto?')) {
        fetch(`../api/products.php?id=${id}`, {
            method: 'DELETE'
        })
        .then(() => loadProducts());
    }
}

// Carrega produtos ao iniciar
document.addEventListener('DOMContentLoaded', loadProducts);