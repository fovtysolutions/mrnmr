let currentEditingRow = null;

        function populateDummyData() {
            const dummyData = {
                name: "UOM 1",
                description: "Description for UOM 1"
            };
            addRowToTable(dummyData.name, dummyData.description);
        }

        function addToTable() {
            const uomCode = document.getElementById('uom_code').value;
            const uomDescription = document.getElementById('uom_description').value;

            if (uomCode && uomDescription) {
                if (currentEditingRow) {
                    currentEditingRow.cells[1].innerText = uomCode;
                    currentEditingRow.cells[2].innerText = uomDescription;
                    currentEditingRow = null;
                } else {
                    addRowToTable(uomCode, uomDescription);
                }
                clearForm();
            } else {
                if (!uomCode) {
                    document.getElementById('uom_code_error').innerText = "UOM Name is required";
                }
                if (!uomDescription) {
                    document.getElementById('uom_description_error').innerText = "UOM Description is required";
                }
            }
        }

        function addRowToTable(uomCode, uomDescription) {
            const infoTableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${infoTableBody.rows.length + 1}</td>
        <td>${uomCode}</td>
        <td>${uomDescription}</td>
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

            document.getElementById('uom_code').value = cells[1].innerText;
            document.getElementById('uom_description').value = cells[2].innerText;
        }

        function deleteRow(button) {
            const row = button.closest('tr');
            row.remove();
            updateSerialNumbers();
            clearForm();
        }

        function clearForm() {
            document.getElementById('uom_code').value = '';
            document.getElementById('uom_description').value = '';
            document.getElementById('uom_code_error').innerText = '';
            document.getElementById('uom_description_error').innerText = '';
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