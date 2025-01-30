let currentEditingRow = null;

        function populateDummyData() {
            const dummyData = {
                name: "Model 1",
                description: "Description for Model 1"
            };
            addRowToTable(dummyData.name, dummyData.description);
        }

        function addToTable() {
            const modelName = document.getElementById('model_name').value;
            const modelDescription = document.getElementById('model_description').value;

            if (modelName && modelDescription) {
                if (currentEditingRow) {
                    currentEditingRow.cells[1].innerText = modelName;
                    currentEditingRow.cells[2].innerText = modelDescription;
                    currentEditingRow = null;
                } else {
                    addRowToTable(modelName, modelDescription);
                }
                clearForm();
            } else {
                if (!modelName) {
                    document.getElementById('model_name_error').innerText = "Model Name is required";
                }
                if (!modelDescription) {
                    document.getElementById('model_description_error').innerText = "Model Description is required";
                }
            }
        }

        function addRowToTable(modelName, modelDescription) {
            const infoTableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${infoTableBody.rows.length + 1}</td>
        <td>${modelName}</td>
        <td>${modelDescription}</td>
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

            document.getElementById('model_name').value = cells[1].innerText;
            document.getElementById('model_description').value = cells[2].innerText;
        }

        function deleteRow(button) {
            const row = button.closest('tr');
            row.remove();
            updateSerialNumbers();
            clearForm();
        }

        function clearForm() {
            document.getElementById('model_name').value = '';
            document.getElementById('model_description').value = '';
            document.getElementById('model_name_error').innerText = '';
            document.getElementById('model_description_error').innerText = '';
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