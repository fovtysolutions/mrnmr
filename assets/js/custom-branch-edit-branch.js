document.querySelectorAll('.step').forEach((step, index) => {
    step.addEventListener('click', () => {
        document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
        step.classList.add('active');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('add-branch-btn').addEventListener('click', function(e) {
        e.preventDefault();

        var branchNo = document.getElementById('branch_no').value;
        var branchCode = document.getElementById('branch_code').value;
        var branchName = document.getElementById('branch_name').value;
        var address = document.getElementById('address').value;
        var area = document.getElementById('area').value;
        var city = document.getElementById('city').value;
        var state = document.getElementById('state').value;
        var country = document.getElementById('country').value;
        var pinCode = document.getElementById('pin_code').value;
        var contactNo = document.getElementById('contact_no').value;
        var emailId = document.getElementById('email_id').value;
        var website = document.getElementById('website').value;
        var businessType = document.getElementById('business_type').value;
        var status = document.getElementById('status').value;
        var gstin = document.getElementById('gstin').value;
        var panNo = document.getElementById('pan_no').value;
        var prefix = document.getElementById('prefix').value;
        var uploadLogo = document.getElementById('upload_logo').files.length ? document.getElementById('upload_logo').files[0].name : 'No file';

        var newRow = document.createElement('tr');
        newRow.innerHTML = `
    <td>${branchNo}</td>
    <td>${branchCode}</td>
    <td>${branchName}</td>
    <td>${address}</td>
    <td>${area}</td>
    <td>${city}</td>
    <td>${state}</td>
    <td>${country}</td>
    <td>${pinCode}</td>
    <td>${contactNo}</td>
    <td>${emailId}</td>
    <td>${website}</td>
    <td>${businessType}</td>
    <td>${status}</td>
    <td>${gstin}</td>
    <td>${panNo}</td>
    <td>${prefix}</td>
    <td>${uploadLogo}</td>
    <td>
<!-- Remove Button -->
<button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
<i class="fas fa-trash-alt"></i>
</button>

<!-- Edit Button -->
<button type="button" class="btn btn-secondary btn-sm ml-2" onclick="editRow(this)">
<i class="fas fa-edit"></i>
</button>
</td>
`;

        document.getElementById('temporary_data_table_body').appendChild(newRow);

        document.getElementById('branch_no').value = '';
        document.getElementById('branch_code').value = '';
        document.getElementById('branch_name').value = '';
        document.getElementById('address').value = '';
        document.getElementById('area').value = '';
        document.getElementById('city').value = '';
        document.getElementById('state').value = '';
        document.getElementById('country').value = '';
        document.getElementById('pin_code').value = '';
        document.getElementById('contact_no').value = '';
        document.getElementById('email_id').value = '';
        document.getElementById('website').value = '';
        document.getElementById('business_type').value = '';
        document.getElementById('status').value = '';
        document.getElementById('gstin').value = '';
        document.getElementById('pan_no').value = '';
        document.getElementById('prefix').value = '';
        document.getElementById('upload_logo').value = '';
    });

    document.getElementById('add-document-btn').addEventListener('click', function(e) {
        e.preventDefault();

        let selectDocument = document.getElementById('select_document').value;
        let documentName = document.getElementById('document_name').value;
        let documentNo = document.getElementById('document_no').value;
        let creationDate = document.getElementById('creation_date').value;
        let expiryDate = document.getElementById('expiry_date').value;
        let attachment = document.getElementById('attachment').files[0];

        if (!selectDocument || !documentName || !documentNo || !creationDate || !expiryDate) {
            alert("Please fill in all required fields.");
            return;
        }

        let attachmentName = attachment ? attachment.name : 'No File';

        let newRow = document.createElement('tr');
        newRow.innerHTML = `
    <td>${documentName}</td>
    <td>${documentNo}</td>
    <td>${creationDate}</td>
    <td>${expiryDate}</td>
    <td>${attachmentName}</td>
    <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
`;

        document.getElementById('document_table_body').appendChild(newRow);

        document.getElementById('select_document').value = '';
        document.getElementById('document_name').value = '';
        document.getElementById('document_no').value = '';
        document.getElementById('creation_date').value = '';
        document.getElementById('expiry_date').value = '';
        document.getElementById('attachment').value = '';

        newRow.querySelector('.remove-row').addEventListener('click', function() {
            newRow.remove();
        });
    });
});

function removeRow(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('add-bank-details-btn').addEventListener('click', function(e) {
        e.preventDefault();

        let bankName = document.getElementById('bank_name').value;
        let accountNo = document.getElementById('account_no').value;
        let ifscCode = document.getElementById('ifsc_code').value;
        let state = document.getElementById('state').value;
        let city = document.getElementById('city').value;
        let branchName = document.getElementById('branch_name').value;

        if (!bankName || !accountNo || !ifscCode || !state || !city || !branchName) {
            alert("Please fill in all required fields.");
            return;
        }

        let newRow = document.createElement('tr');
        newRow.innerHTML = `
    <td>${bankName}</td>
    <td>${accountNo}</td>
    <td>${ifscCode}</td>
    <td>${state}</td>
    <td>${city}</td>
    <td>${branchName}</td>
    <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
`;

        document.getElementById('bank_table_body').appendChild(newRow);

        document.getElementById('bank_name').value = '';
        document.getElementById('account_no').value = '';
        document.getElementById('ifsc_code').value = '';
        document.getElementById('state').value = '';
        document.getElementById('city').value = '';
        document.getElementById('branch_name').value = '';

        newRow.querySelector('.remove-row').addEventListener('click', function() {
            newRow.remove();
        });
    });
});