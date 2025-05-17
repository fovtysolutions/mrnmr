let serialNumber = 1;

        function addToTable() {
            const productTypeName = document.getElementById('product_type_name').value.trim();
            const productTypeDescription = document.getElementById('product_type_description').value.trim();

            if (!productTypeName) {
                document.getElementById('product_type_name_error').innerText = 'Please enter a Product Type Name';
                return;
            } else {
                document.getElementById('product_type_name_error').innerText = '';
            }

            if (!productTypeDescription) {
                document.getElementById('product_type_description_error').innerText = 'Please enter a Product Type Description';
                return;
            } else {
                document.getElementById('product_type_description_error').innerText = '';
            }

            const tableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${serialNumber}</td>
        <td>${productTypeName}</td>
        <td>${productTypeDescription}</td>
        <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
    `;

            tableBody.appendChild(newRow);
            serialNumber++;
            document.getElementById('product_type_name').value = '';
            document.getElementById('product_type_description').value = '';
        }

        function removeRow(button) {
            const row = button.closest('tr');
            row.parentNode.removeChild(row);
        }