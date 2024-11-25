document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("exportExcel").addEventListener("click", function () {
    // Lấy tiêu đề của trang làm tên file
    const pageTitle = document.title || "default";
    const fileName = pageTitle + ".xlsx";
    const tables = document.querySelectorAll("table");
    const wb = XLSX.utils.book_new();

    tables.forEach((table, index) => {
      const ws = XLSX.utils.table_to_sheet(table);
      XLSX.utils.book_append_sheet(wb, ws, `Sheet ${index + 1}`); //Tên table
    });

    // Tạo và tải file Excel
    XLSX.writeFile(wb, fileName);
  });
});
