let currentEditingRow = null;

        let serialNumber = 1;

        function addToTable() {
            const inventoryTypeName = document.getElementById('inventory_type_name').value.trim();
            const inventoryTypeDescription = document.getElementById('inventory_type_description').value.trim();

            if (!inventoryTypeName) {
                document.getElementById('inventory_type_name_error').innerText = 'Please enter an Inventory Type Name';
                return;
            } else {
                document.getElementById('inventory_type_name_error').innerText = '';
            }

            if (!inventoryTypeDescription) {
                document.getElementById('inventory_type_description_error').innerText = 'Please enter an Inventory Type Description';
                return;
            } else {
                document.getElementById('inventory_type_description_error').innerText = '';
            }

            const tableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${serialNumber}</td>
        <td>${inventoryTypeName}</td>
        <td>${inventoryTypeDescription}</td>
        <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
    `;

            tableBody.appendChild(newRow);
            serialNumber++;
            document.getElementById('inventory_type_name').value = '';
            document.getElementById('inventory_type_description').value = '';
        }

        function removeRow(button) {
            const row = button.closest('tr');
            row.parentNode.removeChild(row);
        }