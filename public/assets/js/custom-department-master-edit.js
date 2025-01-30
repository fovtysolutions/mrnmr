
let serialNo = 1;
let editingRow = null;

function addToTable() {
    const branchCode = document.getElementById('select_branch_code').value;
    const branchName = document.getElementById('branch_name').value;
    const departmentName = document.getElementById('department_name').value;
    const departmentDescription = document.getElementById('department_description').value;
    const assignedTo = Array.from(document.getElementById('assigned_to').selectedOptions).map(option => option.text).join(", ");

    const tableBody = document.getElementById('infoTableBody');

    if (editingRow) {
        editingRow.cells[1].innerText = branchCode;
        editingRow.cells[2].innerText = branchName;
        editingRow.cells[3].innerText = departmentName;
        editingRow.cells[4].innerText = departmentDescription;
        editingRow.cells[5].innerText = assignedTo;
        editingRow = null;
    } else {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
    <td>${serialNo++}</td>
    <td>${branchCode}</td>
    <td>${branchName}</td>
    <td>${departmentName}</td>
    <td>${departmentDescription}</td>
    <td>${assignedTo}</td>
    <td>
        <button class="btn btn-warning btn-sm" onclick="editRow(this)">Edit</button>
        <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Delete</button>
    </td>
`;
        tableBody.appendChild(newRow);
    }

    clearInputFields();
}

function clearInputFields() {
    document.getElementById('select_branch_code').selectedIndex = 0;
    document.getElementById('branch_name').value = '';
    document.getElementById('department_name').value = '';
    document.getElementById('department_description').value = '';
    document.getElementById('assigned_to').selectedIndex = -1;
}

function editRow(button) {
    editingRow = button.closest('tr');
    document.getElementById('select_branch_code').value = editingRow.cells[1].innerText;
    document.getElementById('branch_name').value = editingRow.cells[2].innerText;
    document.getElementById('department_name').value = editingRow.cells[3].innerText;
    document.getElementById('department_description').value = editingRow.cells[4].innerText;

    const assignedEmployees = editingRow.cells[5].innerText.split(", ");
    const assignedSelect = document.getElementById('assigned_to');
    for (let option of assignedSelect.options) {
        option.selected = assignedEmployees.includes(option.text);
    }
}

function deleteRow(button) {
    const row = button.closest('tr');
    row.remove();
}

function loadDummyData() {
    const dummyData = [{
        branchCode: 'ALPHA01',
        branchName: 'Alpha Branch',
        departmentName: 'HR',
        departmentDescription: 'Human Resources Department',
        assignedTo: 'Employee A, Employee B'
    }];

    const tableBody = document.getElementById('infoTableBody');

    dummyData.forEach(data => {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
    <td>${serialNo++}</td>
    <td>${data.branchCode}</td>
    <td>${data.branchName}</td>
    <td>${data.departmentName}</td>
    <td>${data.departmentDescription}</td>
    <td>${data.assignedTo}</td>
    <td>
    <button class="btn btn-warning btn-sm" onclick="editRow(this)">
        <i class="fas fa-edit"></i>
    </button>
    <button class="btn btn-danger btn-sm" onclick="removeRow(this)">
        <i class="fas fa-trash-alt"></i>
    </button>
</td>

`;
        tableBody.appendChild(newRow);
    });
}

document.addEventListener('DOMContentLoaded', loadDummyData);