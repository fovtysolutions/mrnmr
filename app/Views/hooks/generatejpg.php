<style>
    @font-face {
        font-family: 'Tempting';
        src: url('<?= base_url("assets/font/Tempting.ttf") ?>') format('truetype');
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    async function generateImage(name, className, school, imageUrl, imageName) {
        const pageWidth = 842; 
        const pageHeight = 595;

        const font = new FontFace('Tempting', 'url("<?= base_url("assets/font/Tempting.ttf") ?>")');
        await font.load(); 
        document.fonts.add(font); 

        const canvas = document.createElement('canvas');
        canvas.width = pageWidth;
        canvas.height = pageHeight;
        const ctx = canvas.getContext('2d');

        const img = new Image();
        img.src = imageUrl;
        await new Promise((resolve) => {
            img.onload = resolve;
        });

        ctx.drawImage(img, 0, 0, pageWidth, pageHeight);

        ctx.font = '22px Tempting'; 
        ctx.fillStyle = '#000';
        ctx.fillStyle = '#314a70';
        ctx.fillText(name, 120, 280);
        ctx.font = '18px Tempting';
        ctx.fillText(className, 155, 325);
        ctx.fillText(school, 325, 325);

        const jpgDataUrl = canvas.toDataURL('image/jpeg', 1.0); 

        const link = document.createElement('a');
        link.href = jpgDataUrl;
        link.download = `${imageName}.jpg`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    document.getElementById('generateImageButton').addEventListener('click', () => {
        const name = 'John Doe';
        const className = 'Grade 5';
        const school = 'XYZ International School';
        const imageUrl = '<?= base_url("assets/img/certificate.webp") ?>';
        const imageName = 'Certificate';

        generateImage(name, className, school, imageUrl, imageName);
    });
</script>

