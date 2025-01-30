let currentEditingRow = null;

        function populateDummyData() {
            const dummyData = {
                name: "Tool 1",
                description: "Description for Tool 1"
            };
            addRowToTable(dummyData.name, dummyData.description);
        }

        function addToTable() {
            const toolName = document.getElementById('tool_name').value;
            const toolDescription = document.getElementById('tool_description').value;

            if (toolName && toolDescription) {
                if (currentEditingRow) {
                    currentEditingRow.cells[1].innerText = toolName;
                    currentEditingRow.cells[2].innerText = toolDescription;
                    currentEditingRow = null;
                } else {
                    addRowToTable(toolName, toolDescription);
                }
                clearForm();
            } else {
                if (!toolName) {
                    document.getElementById('tool_name_error').innerText = "Tool Name is required";
                }
                if (!toolDescription) {
                    document.getElementById('tool_description_error').innerText = "Tool Description is required";
                }
            }
        }

        function addRowToTable(toolName, toolDescription) {
            const infoTableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${infoTableBody.rows.length + 1}</td>
        <td>${toolName}</td>
        <td>${toolDescription}</td>
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

            document.getElementById('tool_name').value = cells[1].innerText;
            document.getElementById('tool_description').value = cells[2].innerText;
        }

        function deleteRow(button) {
            const row = button.closest('tr');
            row.remove();
            updateSerialNumbers();
            clearForm();
        }

        function clearForm() {
            document.getElementById('tool_name').value = '';
            document.getElementById('tool_description').value = '';
            document.getElementById('tool_name_error').innerText = '';
            document.getElementById('tool_description_error').innerText = '';
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