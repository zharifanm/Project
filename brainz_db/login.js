document.addEventListener("DOMContentLoaded", function () {
    const modalOverlay = document.querySelector(".modal-overlay");
    const loginButton = document.querySelector(".auth-links a:first-child");
    const closeModal = document.querySelector(".modal-overlay");
  
    // Menampilkan modal saat tombol login diklik
    loginButton.addEventListener("click", function (event) {
      event.preventDefault();
      modalOverlay.style.display = "flex";
    });
  
    // Menutup modal saat klik di luar modal
    closeModal.addEventListener("click", function (event) {
      if (event.target === modalOverlay) {
        modalOverlay.style.display = "none";
      }
    });
  });
  