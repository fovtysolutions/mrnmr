let serialNumber = 1;

        function addToTable() {
            const brandName = document.getElementById('brand_name').value.trim();
            const brandDescription = document.getElementById('brand_description').value.trim();

            if (!brandName) {
                document.getElementById('brand_name_error').innerText = 'Please enter a Brand Name';
                return;
            } else {
                document.getElementById('brand_name_error').innerText = '';
            }

            if (!brandDescription) {
                document.getElementById('brand_description_error').innerText = 'Please enter a Brand Description';
                return;
            } else {
                document.getElementById('brand_description_error').innerText = '';
            }

            const tableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${serialNumber}</td>
        <td>${brandName}</td>
        <td>${brandDescription}</td>
        <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
    `;

            tableBody.appendChild(newRow);
            serialNumber++;
            document.getElementById('brand_name').value = '';
            document.getElementById('brand_description').value = '';
        }

        function removeRow(button) {
            const row = button.closest('tr');
            row.parentNode.removeChild(row);
        }