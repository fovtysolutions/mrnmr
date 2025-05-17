document.querySelectorAll('.step').forEach((step, index) => {
    step.addEventListener('click', () => {
        document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
        step.classList.add('active');
    });
});

const today = new Date().toISOString().split('T')[0];
document.getElementById('attendance_date').value = today;

const employeeData = {
    'emp1': {
        name: 'John Doe',
        branch: 'Alpha',
        department: 'IT'
    },
    'emp2': {
        name: 'Jane Smith',
        branch: 'Fixcent',
        department: 'HR'
    },
    'emp3': {
        name: 'Michael Brown',
        branch: 'Alpha',
        department: 'Finance'
    }
};

document.getElementById('employee_id').addEventListener('change', function () {
    const selectedEmployeeId = this.value;
    const employee = employeeData[selectedEmployeeId];

    if (employee) {
        document.getElementById('employee_name').value = employee.name;
        document.getElementById('branch').value = employee.branch;
        document.getElementById('department').value = employee.department;

        document.getElementById('branch').disabled = false;
        document.getElementById('department').disabled = false;
    } else {
        document.getElementById('employee_name').value = '';
        document.getElementById('branch').value = '';
        document.getElementById('department').value = '';

        document.getElementById('branch').disabled = true;
        document.getElementById('department').disabled = true;
    }
});

function calculateHours() {
    // Get values from the dropdowns
    const inHour = parseInt(document.getElementById('in_hour').value, 10);
    const inMinute = parseInt(document.getElementById('in_minute').value, 10);
    const inPeriod = document.getElementById('in_period').value;

    const outHour = parseInt(document.getElementById('out_hour').value, 10);
    const outMinute = parseInt(document.getElementById('out_minute').value, 10);
    const outPeriod = document.getElementById('out_period').value;

    if (isNaN(inHour) || isNaN(inMinute) || isNaN(outHour) || isNaN(outMinute) ||
        inPeriod === '' || outPeriod === '') {
        // Return if any value is missing
        return;
    }

    // Convert 12-hour time to 24-hour time
    const convertTo24Hour = (hour, period) => {
        if (period === 'PM' && hour !== 12) return hour + 12;
        if (period === 'AM' && hour === 12) return 0;
        return hour;
    };

    const inTime24 = convertTo24Hour(inHour, inPeriod) + (inMinute / 60);
    const outTime24 = convertTo24Hour(outHour, outPeriod) + (outMinute / 60);

    // Calculate total hours
    const totalHours = outTime24 - inTime24;

    // Deducted hours (if less than 8 hours)
    const standardHours = 8;
    const deductedHours = totalHours < standardHours ? (standardHours - totalHours) : 0;

    // Overtime hours (if more than 8 hours)
    const overtimeHours = totalHours > standardHours ? (totalHours - standardHours) : 0;

    // Update fields
    document.getElementById('total_hours').value = totalHours.toFixed(2);
    document.getElementById('deducted_hours').value = deductedHours.toFixed(2);
    document.getElementById('overtime_hours').value = overtimeHours.toFixed(2);
}

// Attach event listeners to dropdowns to recalculate on change
document.querySelectorAll('#in_hour, #in_minute, #in_period, #out_hour, #out_minute, #out_period').forEach(element => {
    element.addEventListener('change', calculateHours);
});

document.addEventListener("DOMContentLoaded", function () {
    const addMoreButton = document.getElementById("add_more_employee");
    const attendanceTableBody = document.getElementById("attendance-table-body");
    const attendanceForm = document.getElementById("attendance-form");

    addMoreButton.addEventListener("click", function () {
        // Get form values
        const employeeId = document.getElementById("employee_id").value;
        const employeeName = document.getElementById("employee_name").value;
        const branch = document.getElementById("branch").value;
        const department = document.getElementById("department").value;
        const attendanceDate = document.getElementById("attendance_date").value;
        const inHour = document.getElementById("in_hour").value;
        const inMinute = document.getElementById("in_minute").value;
        const inPeriod = document.getElementById("in_period").value;
        const outHour = document.getElementById("out_hour").value;
        const outMinute = document.getElementById("out_minute").value;
        const outPeriod = document.getElementById("out_period").value;
        const totalHours = document.getElementById("total_hours").value;
        const deductedHours = document.getElementById("deducted_hours").value;
        const overtimeHours = document.getElementById("overtime_hours").value;
        const status = document.getElementById("status").value;
        const projectName = document.getElementById("project_name").value;
        const customerName = document.getElementById("customer_name").value;
        const remarks = document.getElementById("remarks").value;
        const approvedBy = document.getElementById("approved_by").value;

        // Create a new row in the attendance table
        const newRow = document.createElement("tr");

        newRow.innerHTML = `
        <td></td>
        <td>${branch}</td>
        <td>${department}</td>
        <td>${employeeId}</td>
        <td>${employeeName}</td>
        <td>${attendanceDate}</td>
        <td>${inHour}:${inMinute} ${inPeriod}</td>
        <td>${outHour}:${outMinute} ${outPeriod}</td>
        <td>${totalHours}</td>
        <td>${deductedHours}</td>
        <td>${overtimeHours}</td>
        <td>${status}</td>
        <td>${projectName}</td>
        <td>${customerName}</td>
        <td>${remarks}</td>
        <td>${approvedBy}</td>
       <td>
    <button class="btn-table btn-table-danger">
        <i class="fas fa-trash-alt"></i>
    </button>
</td>


    `;

        // Append the new row to the table body
        attendanceTableBody.appendChild(newRow);

        // Clear the form fields
        attendanceForm.reset();

        // Update Sr No for each row
        updateRowNumbers();

        // Add delete functionality
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const row = this.closest('tr');
                row.remove();
                updateRowNumbers();
            });
        });
    });

    function updateRowNumbers() {
        const rows = attendanceTableBody.querySelectorAll("tr");
        rows.forEach((row, index) => {
            row.cells[0].textContent = index + 1; // Update Sr No
        });
    }
});