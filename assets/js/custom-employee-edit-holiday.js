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

document.getElementById('employee_id').addEventListener('change', function() {
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

function calculateOvertime() {
    const inTime = document.getElementById('in_time').value;
    const outTime = document.getElementById('out_time').value;

    if (inTime && outTime) {
        const inDate = new Date(`1970-01-01T${inTime}:00`);
        const outDate = new Date(`1970-01-01T${outTime}:00`);

        let diffInMs = outDate - inDate;
        if (diffInMs < 0) {
            diffInMs += 24 * 60 * 60 * 1000;
        }
        const diffInHours = diffInMs / (60 * 60 * 1000);

        const standardHours = 9;
        const overtimeHours = Math.max(0, diffInHours - standardHours);

        document.getElementById('overtime_hours').value = overtimeHours.toFixed(1);
    } else {
        document.getElementById('overtime_hours').value = '';
    }
}

document.getElementById('in_time').addEventListener('change', calculateOvertime);
document.getElementById('out_time').addEventListener('change', calculateOvertime);

document.addEventListener('DOMContentLoaded', function() {
    let rowCount = 1;

    document.getElementById('add_more_employee').addEventListener('click', function() {
        const employeeId = document.getElementById('employee_id').value;
        const employeeName = document.getElementById('employee_name').value;
        const branch = document.getElementById('branch').value;
        const department = document.getElementById('department').value;
        const attendanceDate = document.getElementById('attendance_date').value;
        const inTime = document.getElementById('in_time').value;
        const outTime = document.getElementById('out_time').value;
        const overtimeHours = calculateOvertimeHours(inTime, outTime);
        const status = document.getElementById('status').value;
        const projectName = document.getElementById('project_name').value;
        const customerName = document.getElementById('customer_name').value;
        const remarks = document.getElementById('remarks').value;
        const approvedBy = document.getElementById('approved_by').value;

        if (!employeeId || !employeeName || !branch || !department || !attendanceDate || !inTime || !outTime || !status || !projectName || !customerName || !approvedBy) {
            alert('Please fill all required fields.');
            return;
        }

        const newRow = document.createElement('tr');
        newRow.innerHTML = `
        <td>${rowCount}</td>
        <td>${branch}</td>
        <td>${department}</td>
        <td>${employeeId}</td>
        <td>${employeeName}</td>
        <td>${attendanceDate}</td>
        <td>${inTime}</td>
        <td>${outTime}</td>
        <td>${overtimeHours.toFixed(1)}</td>
        <td>${status}</td>
        <td>${projectName}</td>
        <td>${customerName}</td>
        <td>${remarks}</td>
        <td>${approvedBy}</td>
        <td><button class="btn btn-danger btn-sm delete-btn">Delete</button></td>
    `;

        document.querySelector('#table_attendance_details tbody').appendChild(newRow);

        rowCount++;

        document.getElementById('attendance-form').reset();
    });

    function calculateOvertimeHours(inTime, outTime) {
        if (!inTime || !outTime) return 0;

        const inDateTime = new Date(`1970-01-01T${inTime}:00`);
        const outDateTime = new Date(`1970-01-01T${outTime}:00`);

        const diffMs = outDateTime - inDateTime;
        const diffHrs = diffMs / (1000 * 60 * 60);

        return diffHrs > 9 ? diffHrs - 9 : 0;
    }

    document.querySelector('#table_attendance_details').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('delete-btn')) {
            e.target.closest('tr').remove();
        }
    });
});

document.getElementById('status').addEventListener('change', function() {
    var status = this.value;
    var fields = ['in_time', 'out_time', 'overtime_hours', 'project_name', 'customer_name', 'remarks', 'approved_by'];
    var disable = ['Absent', 'Leave', 'CompOff'];

    fields.forEach(function(fieldId) {
        var field = document.getElementById(fieldId);
        if (disable.includes(status)) {
            field.disabled = true;
        } else {
            field.disabled = false;
        }
    });
});

function calculateTotalDays() {
    const fromDate = document.getElementById('from_date').value;
    const endDate = document.getElementById('end_date').value;
    const totalDaysInput = document.getElementById('total_days');

    if (fromDate && endDate) {
        const from = new Date(fromDate);
        const to = new Date(endDate);
        const diffTime = Math.abs(to - from);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
        totalDaysInput.value = diffDays;
    } else {
        totalDaysInput.value = '';
    }
}