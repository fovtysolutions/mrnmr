let serialNumber = 1;

        function addToTable() {
            const areaName = document.getElementById('area_name').value.trim();
            const areaDescription = document.getElementById('area_description').value.trim();

            if (!areaName) {
                document.getElementById('area_name_error').innerText = 'Please enter an Area Name';
                return;
            } else {
                document.getElementById('area_name_error').innerText = '';
            }

            if (!areaDescription) {
                document.getElementById('area_description_error').innerText = 'Please enter an Area Description';
                return;
            } else {
                document.getElementById('area_description_error').innerText = '';
            }

            const tableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${serialNumber}</td>
        <td>${areaName}</td>
        <td>${areaDescription}</td>
        <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
    `;

            tableBody.appendChild(newRow);
            serialNumber++;
            document.getElementById('area_name').value = '';
            document.getElementById('area_description').value = '';
        }

        function removeRow(button) {
            const row = button.closest('tr');
            row.parentNode.removeChild(row);
        }