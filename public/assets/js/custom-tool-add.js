let serialNumber = 1;

        function addToTable() {
            const toolName = document.getElementById('tool_name').value.trim();
            const toolDescription = document.getElementById('tool_description').value.trim();

            if (!toolName) {
                document.getElementById('tool_name_error').innerText = 'Please enter a Tool Name';
                return;
            } else {
                document.getElementById('tool_name_error').innerText = '';
            }

            if (!toolDescription) {
                document.getElementById('tool_description_error').innerText = 'Please enter a Tool Description';
                return;
            } else {
                document.getElementById('tool_description_error').innerText = '';
            }

            const tableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${serialNumber}</td>
        <td>${toolName}</td>
        <td>${toolDescription}</td>
        <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
    `;

            tableBody.appendChild(newRow);
            serialNumber++;
            document.getElementById('tool_name').value = '';
            document.getElementById('tool_description').value = '';
        }

        function removeRow(button) {
            const row = button.closest('tr');
            row.parentNode.removeChild(row);
        }