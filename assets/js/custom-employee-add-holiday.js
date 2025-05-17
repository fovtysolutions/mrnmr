document.getElementById('add_more_holiday').addEventListener('click', function() {
    clearErrors();

    const holidayName = document.getElementById('holiday_name').value.trim();
    const holidayDesc = document.getElementById('holiday_desc').value.trim();
    const fromDate = document.getElementById('from_date').value;
    const endDate = document.getElementById('end_date').value;
    const totalDays = document.getElementById('total_days').value;
    const dayOfWeek = document.getElementById('day_of_week').value;

    if (!holidayName) {
        showError('holiday_name_error', 'Please enter Holiday Name');
        return;
    }
    if (!holidayDesc) {
        showError('holiday_desc_error', 'Please enter Holiday Description');
        return;
    }
    if (!fromDate) {
        showError('from_date_error', 'Please select From Date');
        return;
    }
    if (!endDate) {
        showError('end_date_error', 'Please select End Date');
        return;
    }
    if (!dayOfWeek) {
        showError('day_of_week_error', 'Please select Day of the Week');
        return;
    }

    const tableBody = document.querySelector('.table-page-small tbody');
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
    <td></td>
    <td>${holidayName}</td>
    <td>${holidayDesc}</td>
    <td>${fromDate}</td>
    <td>${endDate}</td>
    <td>${totalDays}</td>
    <td>${dayOfWeek}</td>
    <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
`;

    tableBody.appendChild(newRow);
    updateSerialNumbers();
    document.getElementById('holiday-form').reset();
});

function clearErrors() {
    const errorFields = [
        'holiday_name_error', 'holiday_desc_error', 'from_date_error',
        'end_date_error', 'total_days_error', 'day_of_week_error'
    ];

    errorFields.forEach(errorId => {
        document.getElementById(errorId).innerText = '';
    });
}

function showError(errorId, message) {
    document.getElementById(errorId).innerText = message;
}

function removeRow(button) {
    const row = button.closest('tr');
    row.parentNode.removeChild(row);
    updateSerialNumbers();
}

function updateSerialNumbers() {
    const rows = document.querySelectorAll('.table-page-small tbody tr');
    rows.forEach((row, index) => {
        row.cells[0].innerText = index + 1;
    });
}

document.getElementById('from_date').addEventListener('change', calculateTotalDays);
document.getElementById('end_date').addEventListener('change', calculateTotalDays);

function calculateTotalDays() {
    const fromDate = new Date(document.getElementById('from_date').value);
    const endDate = new Date(document.getElementById('end_date').value);
    if (fromDate && endDate) {
        const timeDiff = endDate - fromDate;
        const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
        document.getElementById('total_days').value = daysDiff >= 0 ? daysDiff + 1 : 0;
    } else {
        document.getElementById('total_days').value = 0;
    }
}

document.getElementById('submit-btn').addEventListener('click', function() {
    alert("Holidays submitted!");
});