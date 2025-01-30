let currentEditingRow = null;

        function populateDummyData() {
            const dummyData = {
                name: "Lead Source 1",
                description: "Description for Lead Source 1"
            };
            addRowToTable(dummyData.name, dummyData.description);
        }

        function addToTable() {
            const leadSourceName = document.getElementById('lead_source_name').value;
            const leadSourceDescription = document.getElementById('lead_source_description').value;

            if (leadSourceName && leadSourceDescription) {
                if (currentEditingRow) {
                    currentEditingRow.cells[1].innerText = leadSourceName;
                    currentEditingRow.cells[2].innerText = leadSourceDescription;
                    currentEditingRow = null;
                } else {
                    addRowToTable(leadSourceName, leadSourceDescription);
                }
                clearForm();
            } else {
                if (!leadSourceName) {
                    document.getElementById('lead_source_name_error').innerText = "Lead Source Name is required";
                }
                if (!leadSourceDescription) {
                    document.getElementById('lead_source_description_error').innerText = "Lead Source Description is required";
                }
            }
        }

        function addRowToTable(leadSourceName, leadSourceDescription) {
            const infoTableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${infoTableBody.rows.length + 1}</td>
        <td>${leadSourceName}</td>
        <td>${leadSourceDescription}</td>
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

            document.getElementById('lead_source_name').value = cells[1].innerText;
            document.getElementById('lead_source_description').value = cells[2].innerText;
        }

        function deleteRow(button) {
            const row = button.closest('tr');
            row.remove();
            updateSerialNumbers();
            clearForm();
        }

        function clearForm() {
            document.getElementById('lead_source_name').value = '';
            document.getElementById('lead_source_description').value = '';
            document.getElementById('lead_source_name_error').innerText = '';
            document.getElementById('lead_source_description_error').innerText = '';
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