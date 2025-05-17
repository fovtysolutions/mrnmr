document.querySelectorAll('.step').forEach((step, index) => {
    step.addEventListener('click', () => {
        document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
        step.classList.add('active');
    });
});

document.getElementById('add-branch-btn').addEventListener('click', function (event) {
    event.preventDefault();
    
    const branchNo = document.getElementById('branch_no').value;
    const branchCode = document.getElementById('branch_code').value;
    const branchName = document.getElementById('branch_name').value;
    const address = document.getElementById('address').value;
    const area = document.getElementById('area').value;
    const city = document.getElementById('city').value;
    const state = document.getElementById('state').value;
    const country = document.getElementById('country').value;
    const pinCode = document.getElementById('pin_code').value;
    const contactNo = document.getElementById('contact_no').value;
    const emailId = document.getElementById('email_id').value;
    const website = document.getElementById('website').value;
    const businessType = document.getElementById('business_type').value;
    const status = document.getElementById('status').value;
    const gstin = document.getElementById('gstin').value;
    const panNo = document.getElementById('pan_no').value;
    const prefix = document.getElementById('prefix').value;
    const uploadLogo = document.getElementById('upload_logo').files[0] ? document.getElementById('upload_logo').files[0].name : 'No file uploaded';

    const newRow = document.createElement('tr');
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
            <button class="btn-table btn-table-danger" id="delete-btn-${Date.now()}"><i class="fas fa-trash"></i></button>
        </td>
    `;

    document.getElementById('temporary_data_table_body').appendChild(newRow);

    // Clear inputs
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

    const deleteBtn = newRow.querySelector('button');
    deleteBtn.addEventListener('click', function () {
        newRow.remove();
    });
});

document.getElementById('add-document-btn').addEventListener('click', function () {
    const selectDocument = document.getElementById('select_document').value;
    const documentName = document.getElementById('document_name').value;
    const documentNo = document.getElementById('document_no').value;
    const creationDate = document.getElementById('creation_date').value;
    const expiryDate = document.getElementById('expiry_date').value;
    const attachment = document.getElementById('attachment').files[0] ? document.getElementById('attachment').files[0].name : 'No file uploaded';

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${documentName}</td>
        <td>${documentNo}</td>
        <td>${creationDate}</td>
        <td>${expiryDate}</td>
        <td>${attachment}</td>
        <td>
            <button class="btn-table btn-table-danger" id="delete-doc-btn-${Date.now()}"><i class="fas fa-trash"></i></button>
        </td>
    `;

    document.getElementById('document_table_body').appendChild(newRow);

    // Clear inputs
    document.getElementById('select_document').value = '';
    document.getElementById('document_name').value = '';
    document.getElementById('document_no').value = '';
    document.getElementById('creation_date').value = '';
    document.getElementById('expiry_date').value = '';
    document.getElementById('attachment').value = '';

    const deleteBtn = newRow.querySelector('button');
    deleteBtn.addEventListener('click', function () {
        newRow.remove();
    });
});

document.getElementById('select_document').addEventListener('change', function () {
    const documentName = this.value === 'pan' ? 'Permanent Account Number (PAN)' :
        this.value === 'tan' ? 'Tax Deduction and Collection Account Number (TAN)' :
            this.value === 'cin' ? 'Corporate Identity Number (CIN)' :
                this.value === 'gst_tin' ? 'Goods and Services Tax Identification Number (GST/TIN)' :
                    this.value === 'esi_no' ? 'Employee State Insurance Number (ESI)' :
                        this.value === 'pf_no' ? 'Provident Fund Number (PF)' :
                            this.value === 'pt_no' ? 'Professional Tax Number (PT)' :
                                this.value === 'labour_licence' ? 'Labour Licence' :
                                    this.value === 'msme' ? 'Micro, Small and Medium Enterprises (MSME)' :
                                        this.value === 'cancelled_cheque' ? 'Cancelled Cheque' :
                                            this.value === 'other' ? 'Other Document' :
                                                '';

    document.getElementById('document_name').value = documentName;
});

document.getElementById('add-bank-btn').addEventListener('click', function () {
    const bankName = document.getElementById('bank_name').value;
    const accountNo = document.getElementById('account_no').value;
    const ifscCode = document.getElementById('ifsc_code').value;
    const state = document.getElementById('state').value;
    const city = document.getElementById('city').value;
    const branchName = document.getElementById('branch_name').value;

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${bankName}</td>
        <td>${accountNo}</td>
        <td>${ifscCode}</td>
        <td>${state}</td>
        <td>${city}</td>
        <td>${branchName}</td>
        <td>
            <button class="btn-table btn-table-danger" id="delete-bank-btn-${Date.now()}"><i class="fas fa-trash"></i></button>
        </td>
    `;

    document.getElementById('bank_details_table_body').appendChild(newRow);

    // Clear inputs
    document.getElementById('bank_name').value = '';
    document.getElementById('account_no').value = '';
    document.getElementById('ifsc_code').value = '';
    document.getElementById('state').value = '';
    document.getElementById('city').value = '';
    document.getElementById('branch_name').value = '';

    const deleteBtn = newRow.querySelector('button');
    deleteBtn.addEventListener('click', function () {
        newRow.remove();
    });
});
