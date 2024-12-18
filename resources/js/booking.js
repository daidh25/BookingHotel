const checkInInput = document.querySelector('input[name="check_in_date"]');
const checkOutInput = document.querySelector('input[name="check_out_date"]');
const numGuestsInput = document.querySelector('input[name="num_guests"]');
const numChildrenInput = document.querySelector('input[name="num_children"]');
const totalCostInput = document.querySelector('input[name="total_cost"]');
const errorMessage = document.querySelector("#error-message");

// Đặt ngày tối thiểu cho ngày nhận phòng
checkInInput.setAttribute("min", new Date().toISOString().split("T")[0]);

// Gọi hàm validate khi nhập thông tin
checkInInput.addEventListener("input", validateInputs);
checkOutInput.addEventListener("input", validateInputs);
numGuestsInput.addEventListener("input", validateInputs);
numChildrenInput.addEventListener("input", validateInputs);

// Hàm validate chung
function validateInputs() {
    const today = new Date().toISOString().split("T")[0];
    const checkInDate = new Date(checkInInput.value);
    const checkOutDate = new Date(checkOutInput.value);
    const numGuests = parseInt(numGuestsInput.value);
    const numChildren = parseInt(numChildrenInput.value);

    // Kiểm tra ngày nhận phòng
    if (checkInInput.value && checkInInput.value < today) {
        errorMessage.textContent = "Ngày nhận phòng không được trong quá khứ.";
        checkInInput.value = today;
        totalCostInput.value = "";
        return;
    }

    // Đặt ngày tối thiểu cho ngày trả phòng
    if (checkInInput.value) {
        checkOutInput.setAttribute("min", checkInInput.value);
    }

    // Kiểm tra khoảng cách thời gian giữa ngày nhận phòng và ngày trả phòng
    if (checkInDate && checkOutDate) {
        const diffInMs = checkOutDate - checkInDate;
        const diffInHours = diffInMs / (1000 * 60 * 60);

        if (diffInHours < 24) {
            errorMessage.textContent =
                "Ngày trả phòng phải sau ngày nhận phòng tối thiểu 24 giờ.";
            totalCostInput.value = "";
            return;
        }
    }

    // Kiểm tra số lượng khách
    if (numGuestsInput.value) {
        if (numGuests < 1) {
            errorMessage.textContent = "Số lượng khách không hợp lệ.";
            totalCostInput.value = "";
            return;
        }

        if (numGuests > numGuestsLimit) {
            errorMessage.textContent = `Số lương khách vượt quá giới hạn`;
            totalCostInput.value = "";
            return;
        }
    }

    // Xóa thông báo lỗi nếu tất cả đều hợp lệ
    errorMessage.textContent = "";

    // Tính toán tổng chi phí
    if (
        checkInDate &&
        checkOutDate &&
        numGuests >= 1 &&
        numGuests <= numGuestsLimit
    ) {
        const days = (checkOutDate - checkInDate) / (1000 * 60 * 60 * 24);
        totalCostInput.value = (pricePerNight * days).toFixed(0);
    } else {
        totalCostInput.value = "";
    }

    // Kiểm tra số lượng trẻ em
    if (numChildrenInput.value) {
        if (numChildren < 0 || numChildren > 5) {
            errorMessage.textContent = "Số lượng trẻ em không hợp lệ.";
            totalCostInput.value = "";
            return;
        }
    } else {
        numChildrenInput.value = 0;
    }
}

// Kiểm tra điều kiện trước khi mở modal thanh toán
document.getElementById("openPaymentModal").addEventListener("click", () => {
    const checkInDate = checkInInput.value;
    const checkOutDate = checkOutInput.value;
    const numGuests = numGuestsInput.value;
    const paymentType = paymentTypeSelect.value;
    const paymentMethod = paymentMethodSelect.value;

    // Kiểm tra nếu các trường chưa được điền đầy đủ
    if (
        !checkInDate ||
        !checkOutDate ||
        !numGuests ||
        !paymentType ||
        !paymentMethod
    ) {
        errorMessage.textContent =
            "Vui lòng điền đầy đủ thông tin và hình thức thanh toán.";
    } else {
        errorMessage.textContent = "";
        document.getElementById("modalTotalCost").textContent =
            totalCostInput.value;
        document.getElementById("paymentModal").style.display = "block";
    }
});

document.querySelector(".close").addEventListener("click", () => {
    document.getElementById("paymentModal").style.display = "none";
});

document
    .getElementById("paymentMethod")
    .addEventListener("change", function () {
        const qrCodeContainer = document.getElementById("qrCodeContainer");
        const qrCodeImage = document.getElementById("qrCodeImage");
        const paymentMethod = this.value;

        if (paymentMethod === "Google Pay") {
            qrCodeImage.src = "/assets/images/googlepay.png";
            qrCodeContainer.style.display = "block";
        } else if (paymentMethod === "VNPay") {
            qrCodeImage.src = "/assets/images/vnpay.png";
            qrCodeContainer.style.display = "block";
        } else if (paymentMethod === "Visa") {
            qrCodeImage.src = "/assets/images/visa.png";
            qrCodeContainer.style.display = "block";
        } else if (paymentMethod === "PayPal") {
            qrCodeImage.src = "/assets/images/paypal.png";
            qrCodeContainer.style.display = "block";
        } else {
            qrCodeContainer.style.display = "none";
        }
    });

document.getElementById("confirmPayment").addEventListener("click", () => {
    document.getElementById("bookingForm").submit();
});

// Add event listener for payment type selection
const paymentTypeSelect = document.getElementById("paymentType");
const paymentMethodSelect = document.getElementById("paymentMethod");
const paymentTypeText = document.getElementById("paymentTypeText");

paymentTypeSelect.addEventListener("change", function () {
    if (this.value === "full") {
        paymentTypeText.textContent = `Thanh toán toàn bộ: $${totalCostInput.value}`;
    } else if (this.value === "deposit") {
        const depositAmount = (parseFloat(totalCostInput.value) * 0.4).toFixed(
            0
        );
        paymentTypeText.textContent = `Thanh toán cọc 40%: $${depositAmount}`;
    } else {
        paymentTypeText.textContent = "";
    }
});
