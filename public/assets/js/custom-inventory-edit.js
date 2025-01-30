let currentEditingRow = null;

function populateDummyData() {
    const dummyData = {
        name: "Inventory Type 1",
        description: "Description for Inventory Type 1"
    };
    addRowToTable(dummyData.name, dummyData.description);
}

function addToTable() {
    const inventoryTypeName = document.getElementById('inventory_type_name').value;
    const inventoryTypeDescription = document.getElementById('inventory_type_description').value;

    if (inventoryTypeName && inventoryTypeDescription) {
        if (currentEditingRow) {
            currentEditingRow.cells[1].innerText = inventoryTypeName;
            currentEditingRow.cells[2].innerText = inventoryTypeDescription;
            currentEditingRow = null;
        } else {
            addRowToTable(inventoryTypeName, inventoryTypeDescription);
        }
        clearForm();
    } else {
        if (!inventoryTypeName) {
            document.getElementById('inventory_type_name_error').innerText = "Inventory Type Name is required";
        }
        if (!inventoryTypeDescription) {
            document.getElementById('inventory_type_description_error').innerText = "Inventory Type Description is required";
        }
    }
}

function addRowToTable(inventoryTypeName, inventoryTypeDescription) {
    const infoTableBody = document.getElementById('infoTableBody');
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td>${infoTableBody.rows.length + 1}</td>
        <td>${inventoryTypeName}</td>
        <td>${inventoryTypeDescription}</td>
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

    document.getElementById('inventory_type_name').value = cells[1].innerText;
    document.getElementById('inventory_type_description').value = cells[2].innerText;
}

function deleteRow(button) {
    const row = button.closest('tr');
    row.remove();
    updateSerialNumbers();
    clearForm();
}

function clearForm() {
    document.getElementById('inventory_type_name').value = '';
    document.getElementById('inventory_type_description').value = '';
    document.getElementById('inventory_type_name_error').innerText = '';
    document.getElementById('inventory_type_description_error').innerText = '';
}

function updateSerialNumbers() {
    const rows = document.querySelectorAll('#infoTableBody tr');
    rows.forEach((row, index) => {
        row.cells[0].innerText = index + 1;
    });
}

document.querySelector('.btn-primary').addEventListener('click', function () {
    addToTable();
});

window.onload = function () {
    populateDummyData();
};