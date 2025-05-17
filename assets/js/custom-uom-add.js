let serialNumber = 1;

        function addToTable() {
            const uomCode = document.getElementById('uom_code').value.trim();
            const uomDescription = document.getElementById('uom_description').value.trim();

            if (!uomCode) {
                document.getElementById('uom_code_error').innerText = 'Please enter a UOM Name';
                return;
            } else {
                document.getElementById('uom_code_error').innerText = '';
            }

            if (!uomDescription) {
                document.getElementById('uom_description_error').innerText = 'Please enter a UOM Description';
                return;
            } else {
                document.getElementById('uom_description_error').innerText = '';
            }

            const tableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${serialNumber}</td>
        <td>${uomCode}</td>
        <td>${uomDescription}</td>
        <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
    `;

            tableBody.appendChild(newRow);
            serialNumber++;
            document.getElementById('uom_code').value = '';
            document.getElementById('uom_description').value = '';
        }

        function removeRow(button) {
            const row = button.closest('tr');
            row.parentNode.removeChild(row);
        }