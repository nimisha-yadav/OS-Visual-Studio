window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 50,
                filename: 'myfile.pdf',
                image: { type: 'jpeg', quality: 2 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'pt', format: 'a3', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}