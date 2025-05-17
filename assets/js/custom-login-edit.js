let currentEditingRow = null; // To track the currently editing row

function saveToTable() {
    const employeeName = document.getElementById('select_employee').value;
    const employeeId = document.getElementById('employee_id').value;
    const branch = document.getElementById('branch').value;
    const email = document.getElementById('email').value;
    const phoneNo = document.getElementById('phone_no').value;
    const role = document.getElementById('role').value;
    const username = document.getElementById('username').value;
    const description = document.getElementById('description').value;

    // Check if we're editing an existing row
    if (currentEditingRow) {
        currentEditingRow.innerHTML = `
            <td>${currentEditingRow.getAttribute('data-row-index')}</td>
            <td>${employeeName}</td>
            <td>${employeeId}</td>
            <td>${branch}</td>
            <td>${email}</td>
            <td>${phoneNo}</td>
            <td>${role}</td>
            <td>${username}</td>
            <td>${description}</td>
            <td>
                <button class="btn btn-warning btn-sm" onclick="editRow(this)">Edit</button>
            </td>
        `;
        // Clear currentEditingRow since we finished editing
        currentEditingRow = null;

        // Clear input fields after updating
        clearInputFields();
    }
}

function clearInputFields() {
    document.getElementById('select_employee').value = '';
    document.getElementById('employee_id').value = '';
    document.getElementById('branch').value = '';
    document.getElementById('email').value = '';
    document.getElementById('phone_no').value = '';
    document.getElementById('role').value = '';
    document.getElementById('username').value = '';
    document.getElementById('description').value = '';
}

function editRow(button) {
    const row = button.closest('tr');
    const cells = row.querySelectorAll('td');

    document.getElementById('select_employee').value = cells[1].innerText;
    document.getElementById('employee_id').value = cells[2].innerText;
    document.getElementById('branch').value = cells[3].innerText;
    document.getElementById('email').value = cells[4].innerText;
    document.getElementById('phone_no').value = cells[5].innerText;
    document.getElementById('role').value = cells[6].innerText;
    document.getElementById('username').value = cells[7].innerText;
    document.getElementById('description').value = cells[8].innerText;

    // Set currentEditingRow to the row being edited
    currentEditingRow = row;
}