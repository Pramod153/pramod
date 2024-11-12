function downloadReport() {
    let table = document.getElementById("reportTable");
    let rows = table.rows;
    let csvContent = "data:text/csv;charset=utf-8,";

    for (let i = 0; i < rows.length; i++) {
        let cols = rows[i].cells;
        let rowData = [];
        for (let j = 0; j < cols.length; j++) {
            rowData.push(cols[j].innerText);
        }
        csvContent += rowData.join(",") + "\n";
    }

    // Create a download link and click it
    let encodedUri = encodeURI(csvContent);
    let link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "product_report.csv");
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
