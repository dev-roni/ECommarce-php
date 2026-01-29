<!-- Custom JS -->
<script>
    const toggleSidebar = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const productForm = document.getElementById('productForm');
    const productList = document.getElementById('productList');
    let productCounter = 0;

    // Toggle Sidebar
    toggleSidebar.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        content.classList.toggle('shifted');
    });

    // Add Product
    productForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const productName = document.getElementById('productName').value;
        const productPrice = document.getElementById('productPrice').value;
        const productImage = document.getElementById('productImage').value;

        productCounter++;
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${productCounter}</td>
            <td><img src="${productImage}" alt="${productName}" class="img-thumbnail"></td>
            <td>${productName}</td>
            <td>${productPrice} Tk</td>
            <td>
                <button class="btn btn-sm btn-danger" onclick="deleteProduct(this)">Delete</button>
            </td>
        `;
        productList.appendChild(row);
        productForm.reset();
    });

    // Delete Product
    const deleteProduct = (button) => {
        const row = button.closest('tr');
        row.remove();
    };
</script>
