
let serialNo = 1;

function addToTable() {
    const designationName = document.getElementById('designation_name').value;
    const designationDescription = document.getElementById('designation_description').value;
    const assignedTo = Array.from(document.getElementById('assigned_to').selectedOptions).map(option => option.text).join(", ");

    const tableBody = document.getElementById('infoTableBody');

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
<td>${serialNo++}</td>
<td>${designationName}</td>
<td>${designationDescription}</td>
<td>${assignedTo}</td>
<td>
    <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Delete</button>
</td>
`;
    tableBody.appendChild(newRow);

    clearInputFields();
}

function clearInputFields() {
    document.getElementById('designation_name').value = '';
    document.getElementById('designation_description').value = '';
    document.getElementById('assigned_to').selectedIndex = -1;
}

function deleteRow(button) {
    const row = button.closest('tr');
    row.remove();
}