let serialNumber = 1;

        function addToTable() {
            const categoryName = document.getElementById('category_name').value.trim();
            const categoryDescription = document.getElementById('category_description').value.trim();

            if (!categoryName) {
                document.getElementById('category_name_error').innerText = 'Please enter a Category Name';
                return;
            } else {
                document.getElementById('category_name_error').innerText = '';
            }

            if (!categoryDescription) {
                document.getElementById('category_description_error').innerText = 'Please enter a Category Description';
                return;
            } else {
                document.getElementById('category_description_error').innerText = '';
            }

            const tableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${serialNumber}</td>
        <td>${categoryName}</td>
        <td>${categoryDescription}</td>
        <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
    `;

            tableBody.appendChild(newRow);
            serialNumber++;
            document.getElementById('category_name').value = '';
            document.getElementById('category_description').value = '';
        }

        function removeRow(button) {
            const row = button.closest('tr');
            row.parentNode.removeChild(row);
        }