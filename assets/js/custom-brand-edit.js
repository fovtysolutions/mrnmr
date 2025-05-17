

let currentEditingRow = null;

function populateDummyData() {
    const dummyData = {
        name: "Brand 1",
        description: "Description for Brand 1"
    };
    addRowToTable(dummyData.name, dummyData.description);
}

function addToTable() {
    const brandName = document.getElementById('brand_name').value;
    const brandDescription = document.getElementById('brand_description').value;

    if (brandName && brandDescription) {
        if (currentEditingRow) {
            currentEditingRow.cells[1].innerText = brandName;
            currentEditingRow.cells[2].innerText = brandDescription;
            currentEditingRow = null;
        } else {
            addRowToTable(brandName, brandDescription);
        }
        clearForm();
    } else {
        if (!brandName) {
            document.getElementById('brand_name_error').innerText = "Brand Name is required";
        }
        if (!brandDescription) {
            document.getElementById('brand_description_error').innerText = "Brand Description is required";
        }
    }
}

function addRowToTable(brandName, brandDescription) {
    const infoTableBody = document.getElementById('infoTableBody');
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
<td>${infoTableBody.rows.length + 1}</td>
<td>${brandName}</td>
<td>${brandDescription}</td>
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

    document.getElementById('brand_name').value = cells[1].innerText;
    document.getElementById('brand_description').value = cells[2].innerText;
}

function deleteRow(button) {
    const row = button.closest('tr');
    row.remove();
    updateSerialNumbers();
    clearForm();
}

function clearForm() {
    document.getElementById('brand_name').value = '';
    document.getElementById('brand_description').value = '';
    document.getElementById('brand_name_error').innerText = '';
    document.getElementById('brand_description_error').innerText = '';
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