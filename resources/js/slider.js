$(function () {
    $(".hotel-main-item").each(function () {
        var product = $(this);
        var index = 0;
        var numImages = product.find(".hotel-main-img").length;

        var changeImage = function () {
            var images = product.find(".hotel-main-img");
            images.hide();
            images.eq(index).fadeIn(150);
            product.find(".index-button").removeClass("active");
            product.find(".index-button").eq(index).addClass("active");
        };

        changeImage.call(product); // Gọi hàm chuyển ảnh để hiển thị ảnh đầu tiên của sản phẩm

        product.find(".index-button").click(function () {
            index = $(this).attr("idx");
            changeImage.call(product);
        });

        product.find(".next").click(function () {
            index++;
            if (index >= numImages) {
                index = 0;
            }
            changeImage.call(product);
        });

        product.find(".prev").click(function () {
            index--;
            if (index < 0) {
                index = numImages - 1;
            }
            changeImage.call(product);
        });
    });
});
