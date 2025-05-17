let currentEditingRow = null;

        function populateDummyData() {
            const dummyData = {
                name: "Product Type 1",
                description: "Description for Product Type 1"
            };
            addRowToTable(dummyData.name, dummyData.description);
        }

        function addToTable() {
            const productTypeName = document.getElementById('product_type_name').value;
            const productTypeDescription = document.getElementById('product_type_description').value;

            if (productTypeName && productTypeDescription) {
                if (currentEditingRow) {
                    currentEditingRow.cells[1].innerText = productTypeName;
                    currentEditingRow.cells[2].innerText = productTypeDescription;
                    currentEditingRow = null;
                } else {
                    addRowToTable(productTypeName, productTypeDescription);
                }
                clearForm();
            } else {
                if (!productTypeName) {
                    document.getElementById('product_type_name_error').innerText = "Product Type Name is required";
                }
                if (!productTypeDescription) {
                    document.getElementById('product_type_description_error').innerText = "Product Type Description is required";
                }
            }
        }

        function addRowToTable(productTypeName, productTypeDescription) {
            const infoTableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${infoTableBody.rows.length + 1}</td>
        <td>${productTypeName}</td>
        <td>${productTypeDescription}</td>
        <td>
            <button class="btn btn-warning btn-sm" onclick="editRow(this)">Edit</button>
            <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Delete</button>
        </td>
    `;

            infoTableBody.appendChild(newRow);
        }

        function editRow(button) {
            currentEditingRow = button.closest('tr');
            const cells = currentEditingRow.cells;

            document.getElementById('product_type_name').value = cells[1].innerText;
            document.getElementById('product_type_description').value = cells[2].innerText;
        }

        function deleteRow(button) {
            const row = button.closest('tr');
            row.remove();
            updateSerialNumbers();
            clearForm();
        }

        function clearForm() {
            document.getElementById('product_type_name').value = '';
            document.getElementById('product_type_description').value = '';
            document.getElementById('product_type_name_error').innerText = '';
            document.getElementById('product_type_description_error').innerText = '';
        }

        function updateSerialNumbers() {
            const rows = document.querySelectorAll('#infoTableBody tr');
            rows.forEach((row, index) => {
                row.cells[0].innerText = index + 1;
            });
        }

        document.querySelector('.btn-primary').addEventListener('click', function() {
            addToTable();
        });

        window.onload = function() {
            populateDummyData();
        };