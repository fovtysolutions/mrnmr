let awards = [];

document.getElementById('add-award-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const awardName = document.getElementById('award_name').value;
    const awardDescription = document.getElementById('award_description').value;
    const giftItem = document.getElementById('gift_item').value;
    const awardDate = document.getElementById('award_date').value;
    const employeeName = document.getElementById('employee_name').value;
    const awardedBy = document.getElementById('awarded_by').value;

    const newAward = {
        srNo: awards.length + 1,
        awardName,
        awardDescription,
        giftItem,
        awardDate,
        employeeName,
        awardedBy
    };

    awards.push(newAward);
    renderTable();
    this.reset();
});

function renderTable() {
    const tableBody = document.querySelector('#award-details-table tbody');
    tableBody.innerHTML = '';

    awards.forEach((award, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${award.srNo}</td>
            <td>${award.awardName}</td>
            <td>${award.awardDescription}</td>
            <td>${award.giftItem}</td>
            <td>${award.awardDate}</td>
            <td>${award.employeeName}</td>
            <td>${award.awardedBy}</td>
           <td>
        <button class="btn-table btn btn-secondary btn-sm" onclick="editAward(${index})">
            <i class="fas fa-edit"></i>
        </button>
        <button class="btn-table btn btn-danger btn-sm" onclick="deleteAward(${index})">
            <i class="fas fa-trash"></i>
        </button>
    </td>
        `;
        tableBody.appendChild(row);
    });
}

function editAward(index) {
    const award = awards[index];
    document.getElementById('award_name').value = award.awardName;
    document.getElementById('award_description').value = award.awardDescription;
    document.getElementById('gift_item').value = award.giftItem;
    document.getElementById('award_date').value = award.awardDate;
    document.getElementById('employee_name').value = award.employeeName;
    document.getElementById('awarded_by').value = award.awardedBy;

    const saveButton = document.getElementById('save-award-btn');
    saveButton.onclick = function () {
        awards[index] = {
            srNo: index + 1,
            awardName: document.getElementById('award_name').value,
            awardDescription: document.getElementById('award_description').value,
            giftItem: document.getElementById('gift_item').value,
            awardDate: document.getElementById('award_date').value,
            employeeName: document.getElementById('employee_name').value,
            awardedBy: document.getElementById('awarded_by').value
        };

        renderTable();
        clearForm();
    };
}

function deleteAward(index) {
    awards.splice(index, 1);
    renderTable();
}

function clearForm() {
    document.getElementById('add-award-form').reset();
    const saveButton = document.getElementById('save-award-btn');
    saveButton.onclick = null;
}
