// Xử lý khi người dùng thay đổi số lượng
document.querySelectorAll(".confirn_food").forEach((button) => {
  button.addEventListener("click", function () {
    const row = this.closest("tr");
    const itemName = row.querySelector("td:nth-child(1)").innerText;
    const quantity = row.querySelector(".quantity-input").value;

    // Gửi yêu cầu AJAX để cập nhật số lượng
    fetch("update_cart.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ itemName, quantity }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          console.log("Cập nhật thành công!");
        } else {
          console.error("Có lỗi xảy ra");
        }
      });
  });
});

// Xử lý khi người dùng bấm nút xóa
document.querySelectorAll(".delete_food").forEach((button) => {
  button.addEventListener("click", function () {
    const row = this.closest("tr");
    const itemName = row.querySelector("td:nth-child(1)").innerText;

    // Gửi yêu cầu AJAX để xóa sản phẩm khỏi giỏ hàng
    fetch("delete_item.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ itemName }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // Xóa hàng khỏi bảng HTML
          row.remove();
          console.log("Xóa thành công!");
        } else {
          console.error("Có lỗi xảy ra");
        }
      });
  });
});
