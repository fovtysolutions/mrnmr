let serialNumber = 1;

        function addToTable() {
            const leadSourceName = document.getElementById('lead_source_name').value.trim();
            const leadSourceDescription = document.getElementById('lead_source_description').value.trim();

            if (!leadSourceName) {
                document.getElementById('lead_source_name_error').innerText = 'Please enter a Lead Source Name';
                return;
            } else {
                document.getElementById('lead_source_name_error').innerText = '';
            }

            if (!leadSourceDescription) {
                document.getElementById('lead_source_description_error').innerText = 'Please enter a Lead Source Description';
                return;
            } else {
                document.getElementById('lead_source_description_error').innerText = '';
            }

            const tableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${serialNumber}</td>
        <td>${leadSourceName}</td>
        <td>${leadSourceDescription}</td>
        <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
    `;

            tableBody.appendChild(newRow);
            serialNumber++;
            document.getElementById('lead_source_name').value = '';
            document.getElementById('lead_source_description').value = '';
        }

        function removeRow(button) {
            const row = button.closest('tr');
            row.parentNode.removeChild(row);
        }