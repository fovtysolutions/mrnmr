
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function generatePDF(name, className, school, imageUrl, pdfName) {
        const pageWidth = 842;
        const pageHeight = 595; 
        fetch('<?= base_url("assets/font/Tempting.ttf") ?>')
        .then((response) => response.arrayBuffer())
        .then((fontBuffer) => {
            const fontBase64 = btoa(
                new Uint8Array(fontBuffer)
                    .reduce((data, byte) => data + String.fromCharCode(byte), '')
            );
                toDataURL(imageUrl, function (base64Img) {
                    const { jsPDF } = window.jspdf;
                    const doc = new jsPDF('landscape', 'pt', [pageWidth, pageHeight]);
                    doc.addFileToVFS("Tempting.ttf", fontBase64); 
                    doc.addFont("Tempting.ttf", "Tempting", "normal"); 
                    doc.setFont('Tempting', 'normal');
                    doc.addImage(base64Img, 'JPEG', 0, 0, pageWidth, pageHeight);
                    doc.setFontSize(24);
                    doc.text(name, 100, 280);
                    doc.setFontSize(18);
                    doc.text(className, 135, 325);
                    doc.text(school, 305, 325);
                    doc.save(`${pdfName}.pdf`);
                });
            })
            .catch((error) => {
                console.error("Error loading font or image:", error);
            });
    }

    function toDataURL(url, callback) {
        const xhr = new XMLHttpRequest();
        xhr.onload = function () {
            const reader = new FileReader();
            reader.onloadend = function () {
                callback(reader.result);
            };
            reader.readAsDataURL(xhr.response);
        };
        xhr.open('GET', url);
        xhr.responseType = 'blob';
        xhr.send();
    }

    $(document).ready(function () {
        $('#generatePDFButton').click(function () {
            const name = 'John Doe';
            const className = 'Grade 5';
            const school = 'XYZ International School';
            const imageUrl = '<?= base_url("assets/img/certificate.webp") ?>';
            const pdfName = 'Certificate';
            generatePDF(name, className, school, imageUrl, pdfName);
        });
    });
</script>
