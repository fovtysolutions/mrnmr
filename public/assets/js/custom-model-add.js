
let serialNumber = 1;

function addToTable() {
    const modelName = document.getElementById('model_name').value.trim();
    const modelDescription = document.getElementById('model_description').value.trim();

    if (!modelName) {
        document.getElementById('model_name_error').innerText = 'Please enter a Model Name';
        return;
    } else {
        document.getElementById('model_name_error').innerText = '';
    }

    if (!modelDescription) {
        document.getElementById('model_description_error').innerText = 'Please enter a Model Description';
        return;
    } else {
        document.getElementById('model_description_error').innerText = '';
    }

    const tableBody = document.getElementById('infoTableBody');
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
<td>${serialNumber}</td>
<td>${modelName}</td>
<td>${modelDescription}</td>
<td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
`;

    tableBody.appendChild(newRow);
    serialNumber++;
    document.getElementById('model_name').value = '';
    document.getElementById('model_description').value = '';
}

function removeRow(button) {
    const row = button.closest('tr');
    row.parentNode.removeChild(row);
}