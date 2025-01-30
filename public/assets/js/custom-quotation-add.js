document.addEventListener('DOMContentLoaded', function () {
    const sellingRateInput = document.getElementById('selling_rate');
    const percentageIncreaseInput = document.getElementById('percentage_increase');
    const updatedPriceInput = document.getElementById('updated_price');

    function calculateUpdatedPrice() {
        const sellingRate = parseFloat(sellingRateInput.value);
        const percentageIncrease = parseFloat(percentageIncreaseInput.value);

        if (!isNaN(sellingRate) && !isNaN(percentageIncrease)) {
            const increaseAmount = (sellingRate * percentageIncrease) / 100;
            const updatedPrice = sellingRate + increaseAmount;
            updatedPriceInput.value = updatedPrice.toFixed(2);
        } else {
            updatedPriceInput.value = '';
        }
    }

    sellingRateInput.addEventListener('input', calculateUpdatedPrice);
    percentageIncreaseInput.addEventListener('input', calculateUpdatedPrice);
});

document.getElementById('add-form-details-btn').addEventListener('click', function () {
    const product = "Product Name"; // Replace with actual product variable if needed
    const description = document.getElementById('additional_description').value;
    const hsnCode = document.getElementById('hsn_code').value;
    const uom = document.getElementById('uom').value;
    const quantity = document.getElementById('quantity').value;
    const gross = document.getElementById('gross').value;
    const discountPercent = document.getElementById('discount_percent').value;
    const rate = document.getElementById('rate').value;
    const discountAmount = document.getElementById('discount_amount').value;
    const taxableAmount = document.getElementById('taxable_amount').value;
    const gstPercent = document.getElementById('gst_percent').value;
    const gstAmount = document.getElementById('gst_amount').value;
    const totalAmount = document.getElementById('total_amount').value;
    const additionalDescription = document.getElementById('additional_description_2').value;
    const percentageIncrease = document.getElementById('percentage_increase').value;
    const marginAmount = document.getElementById('margin_amount').value;
    const commissionPercent = document.getElementById('commission_percent').value;
    const commissionAmount = document.getElementById('commission_amount').value;
    const currentStock = document.getElementById('current_stock').value; // Add current stock input

    const newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td></td> <!-- Placeholder for serial number -->
        <td>
            <button class="btn-table btn-table-danger delete-row" title="Delete">
                <i class="fas fa-trash-alt"></i> <!-- Using Font Awesome trash icon -->
            </button>
            <button class="btn-table btn-table-secondary edit-row ms-2" title="Edit">
                <i class="fas fa-edit"></i> <!-- Using Font Awesome edit icon -->
            </button>
        </td>
        <td>${product}</td>
        <td style="width: 10%;">${description}</td>
        <td>${hsnCode}</td>
        <td>${currentStock}</td> <!-- Added Current Stock column -->
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
        <td style="width: 10%;">${additionalDescription}</td>
        <td>${percentageIncrease}</td>
        <td>${marginAmount}</td>
        <td>${commissionPercent}</td>
        <td>${commissionAmount}</td>
    `;

    document.getElementById('form_details_table_body').appendChild(newRow);
    clearFields();
    updateSerialNumbers();

    newRow.querySelector('.delete-row').addEventListener('click', function () {
        newRow.remove();
        updateSerialNumbers();
    });

    newRow.querySelector('.edit-row').addEventListener('click', function () {
        document.getElementById('additional_description').value = description;
        document.getElementById('hsn_code').value = hsnCode;
        document.getElementById('uom').value = uom;
        document.getElementById('quantity').value = quantity;
        document.getElementById('gross').value = gross;
        document.getElementById('discount_percent').value = discountPercent;
        document.getElementById('rate').value = rate;
        document.getElementById('discount_amount').value = discountAmount;
        document.getElementById('taxable_amount').value = taxableAmount;
        document.getElementById('gst_percent').value = gstPercent;
        document.getElementById('gst_amount').value = gstAmount;
        document.getElementById('total_amount').value = totalAmount;
        document.getElementById('additional_description_2').value = additionalDescription;
        document.getElementById('percentage_increase').value = percentageIncrease;
        document.getElementById('margin_amount').value = marginAmount;
        document.getElementById('commission_percent').value = commissionPercent;
        document.getElementById('commission_amount').value = commissionAmount;
        document.getElementById('current_stock').value = currentStock; // Populate current stock input
    });
});

function clearFields() {
    document.getElementById('additional_description').value = '';
    document.getElementById('hsn_code').value = '';
    document.getElementById('uom').value = '';
    document.getElementById('quantity').value = '';
    document.getElementById('gross').value = '';
    document.getElementById('discount_percent').value = '';
    document.getElementById('rate').value = '';
    document.getElementById('discount_amount').value = '';
    document.getElementById('taxable_amount').value = '';
    document.getElementById('gst_percent').value = '';
    document.getElementById('gst_amount').value = '';
    document.getElementById('total_amount').value = '';
    document.getElementById('additional_description_2').value = '';
    document.getElementById('percentage_increase').value = '';
    document.getElementById('margin_amount').value = '';
    document.getElementById('commission_percent').value = '';
    document.getElementById('commission_amount').value = '';
    document.getElementById('current_stock').value = ''; // Clear current stock input
}

function updateSerialNumbers() {
    const rows = document.querySelectorAll('#form_details_table_body tr');
    rows.forEach((row, index) => {
        row.cells[0].textContent = index + 1; // Update the first cell with the serial number
    });
}

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('rate').addEventListener('input', updateCalculations);
    document.getElementById('discount_percent').addEventListener('input', updateCalculations);
    document.getElementById('discount_amount').addEventListener('input', updateCalculations);
    document.getElementById('gst_percent').addEventListener('input', updateCalculations);
    document.getElementById('percentage_increase').addEventListener('input', updateCalculations);
    document.getElementById('commission_percent').addEventListener('input', updateCalculations);
    document.getElementById('commission_amount').addEventListener('input', updateCalculations);
});

function updateCalculations() {
    const rate = parseFloat(document.getElementById('rate').value) || 0;
    const quantity = parseFloat(document.getElementById('quantity').value) || 0;
    const discountPercent = parseFloat(document.getElementById('discount_percent').value) || 0;
    const discountAmount = parseFloat(document.getElementById('discount_amount').value) || 0;
    const gstPercent = parseFloat(document.getElementById('gst_percent').value) || 0;
    const percentageIncrease = parseFloat(document.getElementById('percentage_increase').value) || 0;
    const commissionPercent = parseFloat(document.getElementById('commission_percent').value) || 0;

    const gross = rate * quantity;
    document.getElementById('gross').value = gross.toFixed(2);

    let calculatedDiscountAmount = (discountPercent / 100) * gross;
    if (discountAmount > 0) {
        calculatedDiscountAmount = discountAmount;
        const calculatedDiscountPercent = (calculatedDiscountAmount / gross) * 100;
        document.getElementById('discount_percent').value = calculatedDiscountPercent.toFixed(2);
    }
    document.getElementById('discount_amount').value = calculatedDiscountAmount.toFixed(2);

    const taxableAmount = gross - calculatedDiscountAmount;
    document.getElementById('taxable_amount').value = taxableAmount.toFixed(2);

    const gstAmount = (gstPercent / 100) * taxableAmount;
    document.getElementById('gst_amount').value = gstAmount.toFixed(2);

    const totalAmount = taxableAmount + gstAmount;
    document.getElementById('total_amount').value = totalAmount.toFixed(2);

    const commissionAmount = (commissionPercent / 100) * totalAmount;
    document.getElementById('commission_amount').value = commissionAmount.toFixed(2);

    const updatedPrice = (gross * (1 + percentageIncrease / 100)).toFixed(2);
    document.getElementById('updated_price').value = updatedPrice;
}
