let currentEditingRow = null;

        function populateDummyData() {
            const dummyData = {
                name: "Area 1",
                description: "Description for Area 1"
            };
            addRowToTable(dummyData.name, dummyData.description);
        }

        function addToTable() {
            const areaName = document.getElementById('area_name').value;
            const areaDescription = document.getElementById('area_description').value;

            if (areaName && areaDescription) {
                if (currentEditingRow) {
                    currentEditingRow.cells[1].innerText = areaName;
                    currentEditingRow.cells[2].innerText = areaDescription;
                    currentEditingRow = null;
                } else {
                    addRowToTable(areaName, areaDescription);
                }
                clearForm();
            } else {
                if (!areaName) {
                    document.getElementById('area_name_error').innerText = "Area Name is required";
                }
                if (!areaDescription) {
                    document.getElementById('area_description_error').innerText = "Area Description is required";
                }
            }
        }

        function addRowToTable(areaName, areaDescription) {
            const infoTableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${infoTableBody.rows.length + 1}</td>
        <td>${areaName}</td>
        <td>${areaDescription}</td>
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

            document.getElementById('area_name').value = cells[1].innerText;
            document.getElementById('area_description').value = cells[2].innerText;
        }

        function deleteRow(button) {
            const row = button.closest('tr');
            row.remove();
            updateSerialNumbers();
            clearForm();
        }

        function clearForm() {
            document.getElementById('area_name').value = '';
            document.getElementById('area_description').value = '';
            document.getElementById('area_name_error').innerText = '';
            document.getElementById('area_description_error').innerText = '';
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