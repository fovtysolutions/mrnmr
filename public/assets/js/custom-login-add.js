let serialNo = 1; // For keeping track of the serial number

function addToTable() {
    const employeeName = document.getElementById('select_employee').value; // You might want to change this based on your actual selection method
    const employeeId = document.getElementById('employee_id').value;
    const branch = document.getElementById('branch').value;
    const email = document.getElementById('email').value;
    const phoneNo = document.getElementById('phone_no').value;
    const role = document.getElementById('role').value;
    const username = document.getElementById('username').value;
    const description = document.getElementById('description').value;

    const tableBody = document.getElementById('infoTableBody');

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${serialNo++}</td>
        <td>${employeeName}</td>
        <td>${employeeId}</td>
        <td>${branch}</td>
        <td>${email}</td>
        <td>${phoneNo}</td>
        <td>${role}</td>
        <td>${username}</td>
        <td>${description}</td>
        <td>
    <button class="btn btn-danger btn-sm" onclick="removeRow(this)">
        <i class="fas fa-trash-alt"></i> <!-- FontAwesome Trash Icon -->
    </button>
</td>

    `;

    tableBody.appendChild(newRow);

    // Clear the input fields after adding
    document.getElementById('select_employee').value = '';
    document.getElementById('employee_id').value = '';
    document.getElementById('branch').value = '';
    document.getElementById('email').value = '';
    document.getElementById('phone_no').value = '';
    document.getElementById('role').value = '';
    document.getElementById('username').value = '';
    document.getElementById('description').value = '';
}

function removeRow(button) {
    const row = button.closest('tr');
    row.remove();
}