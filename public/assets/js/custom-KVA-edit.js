
        
        let currentEditingRow = null;

        function populateDummyData() {
            const dummyData = {
                name: "KVA 1",
                description: "Description for KVA 1"
            };
            addRowToTable(dummyData.name, dummyData.description);
        }

        function addToTable() {
            const kvaName = document.getElementById('kva_name').value;
            const kvaDescription = document.getElementById('kva_description').value;

            if (kvaName && kvaDescription) {
                if (currentEditingRow) {
                    currentEditingRow.cells[1].innerText = kvaName;
                    currentEditingRow.cells[2].innerText = kvaDescription;
                    currentEditingRow = null;
                } else {
                    addRowToTable(kvaName, kvaDescription);
                }
                clearForm();
            } else {
                if (!kvaName) {
                    document.getElementById('kva_name_error').innerText = "KVA Name is required";
                }
                if (!kvaDescription) {
                    document.getElementById('kva_description_error').innerText = "KVA Description is required";
                }
            }
        }

        function addRowToTable(kvaName, kvaDescription) {
            const infoTableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${infoTableBody.rows.length + 1}</td>
        <td>${kvaName}</td>
        <td>${kvaDescription}</td>
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

            document.getElementById('kva_name').value = cells[1].innerText;
            document.getElementById('kva_description').value = cells[2].innerText;
        }

        function deleteRow(button) {
            const row = button.closest('tr');
            row.remove();
            updateSerialNumbers();
            clearForm();
        }

        function clearForm() {
            document.getElementById('kva_name').value = '';
            document.getElementById('kva_description').value = '';
            document.getElementById('kva_name_error').innerText = '';
            document.getElementById('kva_description_error').innerText = '';
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