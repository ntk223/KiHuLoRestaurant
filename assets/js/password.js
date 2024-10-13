document
  .getElementById("passwordForm")
  .addEventListener("submit", function (event) {
    var oldPassword = document.getElementById("oldpassword").value.trim();
    var newPassword = document.getElementById("newpassword").value.trim();
    var confirmPassword = document
      .getElementById("confirmpassword")
      .value.trim();
    var errorMessage = document.getElementById("error-message");

    // Reset thông báo lỗi trước mỗi lần submit
    errorMessage.textContent = "";

    // Nếu người dùng không nhập gì thì cho phép gửi form
    if (oldPassword === "" && newPassword === "" && confirmPassword === "") {
      return true; // Cho phép submit form
    }

    // Nếu một trường đã được nhập, tất cả các trường phải được nhập đầy đủ
    if (oldPassword === "" || newPassword === "" || confirmPassword === "") {
      errorMessage.textContent =
        "Vui lòng nhập đầy đủ các trường nếu bạn muốn thay đổi mật khẩu.";
      event.preventDefault(); // Ngăn chặn form submit
    } else if (newPassword !== confirmPassword) {
      // Nếu mật khẩu mới và xác nhận mật khẩu không khớp
      errorMessage.textContent =
        "Mật khẩu mới và xác nhận mật khẩu không khớp.";
      event.preventDefault(); // Ngăn chặn form submit
    }
  });
