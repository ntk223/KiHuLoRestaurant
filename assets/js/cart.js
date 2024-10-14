document.addEventListener("DOMContentLoaded", function () {
  const quantityInputs = document.querySelectorAll(".quantity-input"); // Chọn tất cả các input số lượng
  const totalElement = document.getElementById("total"); // Chọn phần tử hiển thị tổng tiền

  // Hàm tính tổng tiền giỏ hàng
  function updateTotal() {
    let total = 0;

    // Duyệt qua tất cả các input và tính tổng tiền
    quantityInputs.forEach((input) => {
      const row = input.closest("tr"); // Lấy hàng chứa input
      const price = parseFloat(
        row.cells[2].textContent.replace(/[^\d.-]/g, "")
      ); // Lấy giá của món ăn
      const quantity = parseInt(input.value); // Lấy số lượng đã nhập
      const itemTotal = price * quantity; // Tính tổng của món này

      // Cập nhật tổng cho món này
      row.cells[3].textContent = itemTotal.toLocaleString() + " VNĐ"; // Cập nhật giá trị tổng của món
      total += itemTotal; // Cộng dồn vào tổng giỏ hàng
    });

    // Cập nhật tổng giỏ hàng
    totalElement.textContent = total.toLocaleString() + " VNĐ"; // Cập nhật tổng tiền
  }

  // Thêm sự kiện thay đổi cho tất cả các input số lượng
  quantityInputs.forEach((input) => {
    input.addEventListener("input", updateTotal);
  });

  // Gọi updateTotal lần đầu để đảm bảo tổng tiền đúng khi trang load
  updateTotal();
});
