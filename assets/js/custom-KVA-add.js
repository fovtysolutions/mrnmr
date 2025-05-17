let serialNumber = 1;

function addToTable() {
    const kvaName = document.getElementById('kva_name').value.trim();
    const kvaDescription = document.getElementById('kva_description').value.trim();

    if (!kvaName) {
        document.getElementById('kva_name_error').innerText = 'Please enter a KVA Name';
        return;
    } else {
        document.getElementById('kva_name_error').innerText = '';
    }

    if (!kvaDescription) {
        document.getElementById('kva_description_error').innerText = 'Please enter a KVA Description';
        return;
    } else {
        document.getElementById('kva_description_error').innerText = '';
    }

    const tableBody = document.getElementById('infoTableBody');
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td>${serialNumber}</td>
        <td>${kvaName}</td>
        <td>${kvaDescription}</td>
        <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
    `;

    tableBody.appendChild(newRow);
    serialNumber++;
    document.getElementById('kva_name').value = '';
    document.getElementById('kva_description').value = '';
}

function removeRow(button) {
    const row = button.closest('tr');
    row.parentNode.removeChild(row);
}

