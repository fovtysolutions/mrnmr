let currentEditingRow = null;

        function populateDummyData() {
            const dummyData = {
                name: "Category 1",
                description: "Description for Category 1"
            };
            addRowToTable(dummyData.name, dummyData.description);
        }

        function addToTable() {
            const categoryName = document.getElementById('category_name').value;
            const categoryDescription = document.getElementById('category_description').value;

            if (categoryName && categoryDescription) {
                if (currentEditingRow) {
                    currentEditingRow.cells[1].innerText = categoryName;
                    currentEditingRow.cells[2].innerText = categoryDescription;
                    currentEditingRow = null;
                } else {
                    addRowToTable(categoryName, categoryDescription);
                }
                clearForm();
            } else {
                if (!categoryName) {
                    document.getElementById('category_name_error').innerText = "Category Name is required";
                }
                if (!categoryDescription) {
                    document.getElementById('category_description_error').innerText = "Category Description is required";
                }
            }
        }

        function addRowToTable(categoryName, categoryDescription) {
            const infoTableBody = document.getElementById('infoTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${infoTableBody.rows.length + 1}</td>
        <td>${categoryName}</td>
        <td>${categoryDescription}</td>
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

            document.getElementById('category_name').value = cells[1].innerText;
            document.getElementById('category_description').value = cells[2].innerText;
        }

        function deleteRow(button) {
            const row = button.closest('tr');
            row.remove();
            updateSerialNumbers();
            clearForm();
        }

        function clearForm() {
            document.getElementById('category_name').value = '';
            document.getElementById('category_description').value = '';
            document.getElementById('category_name_error').innerText = '';
            document.getElementById('category_description_error').innerText = '';
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