document.querySelectorAll('.step').forEach((step, index) => {
    step.addEventListener('click', () => {
        document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
        step.classList.add('active');
    });
});

document.getElementById('dob').addEventListener('change', function () {
    const dob = new Date(this.value);
    const age = new Date().getFullYear() - dob.getFullYear();
    document.getElementById('age').value = age;
});

document.getElementById('add-contact-btn').addEventListener('click', function () {
    const name = document.getElementById('name').value;
    const relation = document.getElementById('relation').value;
    const contactDetails = document.getElementById('contact_details').value;
    const address = document.getElementById('address').value;
    const dob = document.getElementById('dob').value;
    const age = document.getElementById('age').value;
    const isNominee = document.getElementById('is_nominee').checked ? 'Yes' : 'No';
    const isEmergencyContact = document.getElementById('is_emergency_contact').checked ? 'Yes' : 'No';

    const tableBody = document.getElementById('contact-table-body');
    const row = `<tr>
            <td>${tableBody.rows.length + 1}</td>
            <td>${name}</td>
            <td>${relation}</td>
            <td>${contactDetails}</td>
            <td>${address}</td>
            <td>${dob}</td>
            <td>${age}</td>
            <td>${isNominee}</td>
            <td>${isEmergencyContact}</td>
         </tr>`;
    tableBody.insertAdjacentHTML('beforeend', row);

    // Optionally clear the form fields after adding
    document.querySelector('form').reset();
});

document.getElementById('same_address').addEventListener('change', function () {
    var communicationAddressFields = document.getElementById('communication_address_fields');
    if (this.checked) {
        communicationAddressFields.style.display = 'none';
    } else {
        communicationAddressFields.style.display = 'block';
    }
});

let documentCounter = 1;

function updateDocumentFields() {
    const documentType = document.getElementById('document_type').value;
    const dynamicFields = document.getElementById('dynamic-fields');
    dynamicFields.innerHTML = ''; // Clear any existing fields

    let html = '';

    switch (documentType) {
        case 'id_proof':
            html = `
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="id_select" class="col-sm-4 col-form-label">Select ID</label>
                <div class="col-sm-8">
                    <select class="form-control form-control-sm" id="id_select">
                        <option value="Aadhaar">Aadhaar</option>
                        <option value="Pan">PAN</option>
                        <option value="Voter">Voter</option>
                        <option value="Passport">Passport</option>
                        <option value="Driving License">Driving License</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="id_no" class="col-sm-4 col-form-label">ID No</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="id_no" placeholder="Enter ID No">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="id_attachment" class="col-sm-4 col-form-label">Attachment</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control form-control-sm" id="id_attachment">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="id_remarks" class="col-sm-4 col-form-label">Remarks</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="id_remarks" placeholder="Enter Remarks">
                </div>
            </div>
        </div>`;
            break;
        case 'bank':
            html = `
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="bank_select" class="col-sm-4 col-form-label">Select Bank</label>
                <div class="col-sm-8">
                    <select class="form-control form-control-sm" id="bank_select">
                        <option value="Bank Statement">Bank Statement</option>
                        <option value="Passbook">Passbook</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="bank_name" class="col-sm-4 col-form-label">Bank Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="bank_name" placeholder="Enter Bank Name">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="bank_attachment" class="col-sm-4 col-form-label">Attachment</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control form-control-sm" id="bank_attachment">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="bank_remarks" class="col-sm-4 col-form-label">Remarks</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="bank_remarks" placeholder="Enter Remarks">
                </div>
            </div>
        </div>`;
            break;
        case 'educational':
            html = `
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="education_certificate" class="col-sm-4 col-form-label">Educational Certificate</label>
                <div class="col-sm-8">
                    <select class="form-control form-control-sm" id="education_certificate">
                        <option value="Degree">Degree</option>
                        <option value="Diploma">Diploma</option>
                        <option value="High School">High School</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="certificate_no" class="col-sm-4 col-form-label">Certificate No</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="certificate_no" placeholder="Enter Certificate No">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="certificate_attachment" class="col-sm-4 col-form-label">Attachment</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control form-control-sm" id="certificate_attachment">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="certificate_remarks" class="col-sm-4 col-form-label">Remarks</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="certificate_remarks" placeholder="Enter Remarks">
                </div>
            </div>
        </div>`;
            break;
        case 'other':
            html = `
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="other_details" class="col-sm-4 col-form-label">Details</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="other_details" placeholder="Enter Details">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="other_attachment" class="col-sm-4 col-form-label">Attachment</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control form-control-sm" id="other_attachment">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group row">
                <label for="other_remarks" class="col-sm-4 col-form-label">Remarks</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="other_remarks" placeholder="Enter Remarks">
                </div>
            </div>
        </div>`;
            break;
        default:
            html = '<p class="text-danger">Please select a document type.</p>';
    }

    dynamicFields.innerHTML = html;
}

function addDocumentRow() {
    const documentType = document.getElementById('document_type').value;
    if (!documentType) {
        alert('Please select a document type first.');
        return;
    }

    const tableBody = document.getElementById('document-table-body');
    const row = document.createElement('tr');

    row.innerHTML = `
<td>${documentCounter}</td>
<td>${documentType.charAt(0).toUpperCase() + documentType.slice(1)}</td>
<td><input type="text" class="form-control form-control-sm" placeholder="Enter Details"></td>
<td><input type="text" class="form-control form-control-sm" placeholder="Enter ID No"></td>
<td><input type="file" class="form-control form-control-sm"></td>
<td><input type="text" class="form-control form-control-sm" placeholder="Enter Remarks"></td>
<td><button type="button" class="btn btn-danger btn-sm" onclick="removeDocumentRow(this)">Remove</button></td>
`;

    tableBody.appendChild(row);
    documentCounter++;
}

function removeDocumentRow(button) {
    const row = button.closest('tr');
    row.remove();
}

// Function to toggle visibility of statutory fields
function toggleStatutoryFields() {
    const applicableSelect = document.getElementById('applicable');
    const statutoryFields = document.getElementById('statutory-fields');
    const selectedValue = applicableSelect.value;

    if (selectedValue === 'yes') {
        // Show statutory fields
        statutoryFields.style.display = 'block';
    } else {
        // Hide statutory fields
        statutoryFields.style.display = 'none';
    }
}

// Add an event listener to the applicable dropdown to call the function on change
document.getElementById('applicable').addEventListener('change', toggleStatutoryFields);