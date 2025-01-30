function toggleFields() {
    const loanType = document.getElementById('loan_type').value;
    document.getElementById('loan-fields').style.display = loanType === 'loan' ? 'block' : 'none';
    document.getElementById('salary-advance-fields').style.display = loanType === 'salary_advance' ? 'block' : 'none';
}