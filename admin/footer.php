<footer>
                    aHa Luxury
                </footer>
            </main>
        </div>
        <script>
    // Hàm mở box
    function openPopup() {
        document.getElementById("overlay").style.display = "flex";
    }

    // Hàm đóng box
    function closePopup() {
        document.getElementById("overlay").style.display = "none";
    }

    function validateForm() {
        var inputField = document.getElementById("fieldName").value;
        var errorSpan = document.getElementById("error");

        if (inputField.trim() === "") {
            errorSpan.innerHTML = "Vui lòng nhập Tên danh mục.";
            return false;
        }

        return true;
    }

    // Hàm xóa thông báo lỗi khi người dùng bắt đầu nhập liệu
    function clearError() {
        document.getElementById("error").innerHTML = "";
    }
</script>
    </body>
</html>