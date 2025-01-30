document.addEventListener('DOMContentLoaded', function() {
    const productSelect = document.getElementById('product_select');
    const additionalDescriptionInput = document.getElementById('additional_description');
    const hsnCodeInput = document.getElementById('hsn_code');
    const currentStockInput = document.getElementById('current_stock');
    const uomInput = document.getElementById('uom');
    const quantityInput = document.getElementById('quantity');
    const rateInput = document.getElementById('rate');
    const grossInput = document.getElementById('gross');
    const discountPercentInput = document.getElementById('discount_percent');
    const discountAmountInput = document.getElementById('discount_amount');
    const taxableAmountInput = document.getElementById('taxable_amount');
    const gstPercentInput = document.getElementById('gst_percent');
    const gstAmountInput = document.getElementById('gst_amount');
    const totalAmountInput = document.getElementById('total_amount');
    const additionalDescription2Input = document.getElementById('additional_description_2');
    const percentageIncreaseInput = document.getElementById('percentage_increase');
    const marginAmountInput = document.getElementById('margin_amount');
    const commissionPercentInput = document.getElementById('commission_percent');
    const commissionAmountInput = document.getElementById('commission_amount');

    // Function to clear input fields
    function clearFields() {
        productSelect.value = '';
        additionalDescriptionInput.value = '';
        hsnCodeInput.value = '';
        currentStockInput.value = '';
        uomInput.value = '';
        quantityInput.value = '';
        rateInput.value = '';
        grossInput.value = '';
        discountPercentInput.value = '';
        discountAmountInput.value = '';
        taxableAmountInput.value = '';
        gstPercentInput.value = '';
        gstAmountInput.value = '';
        totalAmountInput.value = '';
        additionalDescription2Input.value = '';
        percentageIncreaseInput.value = '';
        marginAmountInput.value = '';
        commissionPercentInput.value = '';
        commissionAmountInput.value = '';
    }

    // Function to update serial numbers
    function updateSerialNumbers() {
        const rows = document.querySelectorAll('#form_details_table_body tr');
        rows.forEach((row, index) => {
            row.cells[0].textContent = index + 1;
        });
    }

    // Add row to the table
    document.getElementById('add-form-details-btn').addEventListener('click', function() {
        const product = productSelect.value;
        const additionalDescription = additionalDescriptionInput.value;
        const hsnCode = hsnCodeInput.value;
        const currentStock = currentStockInput.value;
        const uom = uomInput.value;
        const quantity = quantityInput.value;
        const gross = grossInput.value;
        const discountPercent = discountPercentInput.value;
        const rate = rateInput.value;
        const discountAmount = discountAmountInput.value;
        const taxableAmount = taxableAmountInput.value;
        const gstPercent = gstPercentInput.value;
        const gstAmount = gstAmountInput.value;
        const totalAmount = totalAmountInput.value;
        const additionalDescription2 = additionalDescription2Input.value;
        const percentageIncrease = percentageIncreaseInput.value;
        const marginAmount = marginAmountInput.value;
        const commissionPercent = commissionPercentInput.value;
        const commissionAmount = commissionAmountInput.value;

        const newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td></td>
           <td>
    <button class="btn btn-table btn-table-secondary btn-sm edit-row" style="padding: 0.2rem 0.4rem; font-size: 0.8rem;">
        <i class="fas fa-edit"></i>
    </button>
    <button class="btn btn-table btn-table-danger btn-sm delete-row" style="padding: 0.2rem 0.4rem; font-size: 0.8rem;">
        <i class="fas fa-trash"></i>
    </button>
</td>

            <td>${product}</td>
            <td>${additionalDescription}</td>
            <td>${hsnCode}</td>
            <td>${currentStock}</td>
            <td>${uom}</td>
            <td>${quantity}</td>
            <td>${gross}</td>
            <td>${discountPercent}</td>
            <td>${rate}</td>
            <td>${discountAmount}</td>
            <td>${taxableAmount}</td>
            <td>${gstPercent}</td>
            <td>${gstAmount}</td>
            <td>${totalAmount}</td>
            <td>${additionalDescription2}</td>
            <td>${percentageIncrease}</td>
            <td>${marginAmount}</td>
            <td>${commissionPercent}</td>
            <td>${commissionAmount}</td>
        `;

        document.getElementById('form_details_table_body').appendChild(newRow);
        clearFields();
        updateSerialNumbers();

        // Add delete functionality
        newRow.querySelector('.delete-row').addEventListener('click', function() {
            newRow.remove();
            updateSerialNumbers();
        });

        // Add edit functionality
        newRow.querySelector('.edit-row').addEventListener('click', function() {
            productSelect.value = product;
            additionalDescriptionInput.value = additionalDescription;
            hsnCodeInput.value = hsnCode;
            currentStockInput.value = currentStock;
            uomInput.value = uom;
            quantityInput.value = quantity;
            rateInput.value = rate;
            grossInput.value = gross;
            discountPercentInput.value = discountPercent;
            discountAmountInput.value = discountAmount;
            taxableAmountInput.value = taxableAmount;
            gstPercentInput.value = gstPercent;
            gstAmountInput.value = gstAmount;
            totalAmountInput.value = totalAmount;
            additionalDescription2Input.value = additionalDescription2;
            percentageIncreaseInput.value = percentageIncrease;
            marginAmountInput.value = marginAmount;
            commissionPercentInput.value = commissionPercent;
            commissionAmountInput.value = commissionAmount;

            // Remove the row after editing
            newRow.remove();
            updateSerialNumbers();
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // Function to toggle visibility of fields based on selected document type
    window.toggleFields = function() {
        // Get the selected document type
        const documentType = document.getElementById('document_type').value;

        // Hide all fields initially
        document.getElementById('quotation_number_field').style.display = 'none';
        document.getElementById('quotation_date_field').style.display = 'none';
        document.getElementById('delivery_challan_number_field').style.display = 'none';
        document.getElementById('delivery_challan_date_field').style.display = 'none';
        document.getElementById('invoice_proforma_number_field').style.display = 'none';
        document.getElementById('invoice_proforma_date_field').style.display = 'none';

        // Show fields based on the selected document type
        switch (documentType) {
            case 'quotation':
                document.getElementById('quotation_number_field').style.display = 'block';
                document.getElementById('quotation_date_field').style.display = 'block';
                break;
            case 'delivery_challan':
                document.getElementById('delivery_challan_number_field').style.display = 'block';
                document.getElementById('delivery_challan_date_field').style.display = 'block';
                break;
            case 'invoice_proforma':
                document.getElementById('invoice_proforma_number_field').style.display = 'block';
                document.getElementById('invoice_proforma_date_field').style.display = 'block';
                break;
            default:
                // Do nothing if no valid type is selected
                break;
        }
    };
});
