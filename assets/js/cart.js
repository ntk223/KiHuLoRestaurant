// Cập nhật tổng tiền khi thay đổi số lượng
document.querySelectorAll(".quantity-input").forEach((input) => {
  input.addEventListener("input", function () {
    const row = this.closest("tr");
    const price = parseInt(
      row.querySelector("td:nth-child(3)").innerText.replace(/\D/g, "")
    ); // Lấy giá đơn vị
    const quantity = parseInt(this.value); // Lấy số lượng mới
    const totalCell = row.querySelector("td:nth-child(4)"); // Cột tổng cộng
    const newTotal = price * quantity; // Tính lại tổng cộng
    totalCell.innerText = newTotal.toLocaleString() + " VNĐ"; // Hiển thị lại tổng tiền cho dòng hiện tại
    updateTotal(); // Cập nhật tổng tiền của giỏ hàng
  });
});

// Xử lý sự kiện xóa cho từng nút "Xóa"
document.querySelectorAll(".delete_food").forEach((button) => {
  button.addEventListener("click", function () {
    // Lấy hàng tr chứa nút "Xóa"
    const row = this.closest("tr");
    // Lấy tổng tiền của món ăn đã bị xóa (số tiền sẽ được trừ khỏi tổng)
    const itemTotal = parseFloat(
      row.querySelector(".item-total").textContent.replace(/[^0-9.-]+/g, "")
    );

    // Xóa hàng khỏi bảng
    row.remove();

    // Cập nhật lại tổng tiền sau khi xóa món ăn
    updateTotal();
  });
});

// Hàm cập nhật tổng tiền của giỏ hàng
function updateTotal() {
  let total = 0;
  document.querySelectorAll("tbody tr").forEach((row) => {
    const totalCell = row.querySelector("td:nth-child(4)");
    if (totalCell) {
      total += parseInt(totalCell.innerText.replace(/\D/g, "")); // Tính tổng tiền từ các hàng
    }
  });
  document.getElementById("total").innerText = total.toLocaleString() + " VNĐ"; // Hiển thị tổng tiền
}
