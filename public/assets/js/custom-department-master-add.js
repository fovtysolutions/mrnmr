let serialNo = 1;

function addToTable() {
    const departmentName = document.getElementById('department_name').value;
    const departmentDescription = document.getElementById('department_description').value;
    const assignedTo = Array.from(document.getElementById('assigned_to').selectedOptions).map(option => option.text).join(", ");

    const tableBody = document.getElementById('infoTableBody');

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${serialNo++}</td>
        <td>${departmentName}</td>
        <td>${departmentDescription}</td>
        <td>${assignedTo}</td>
        <td>
    <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fas fa-trash-alt"></i>
    </button>
</td>

    `;
    tableBody.appendChild(newRow);

    clearInputFields();
}

function clearInputFields() {
    document.getElementById('department_name').value = '';
    document.getElementById('department_description').value = '';
    document.getElementById('assigned_to').selectedIndex = -1;
}

function deleteRow(button) {
    const row = button.closest('tr');
    row.remove();
}