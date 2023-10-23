document.addEventListener("DOMContentLoaded", function() {
	var closeButton = document.querySelector(".close");
    var alertMessage = document.getElementById("alert-message");

    if (closeButton && alertMessage) {
    	closeButton.addEventListener("click", function() {
    	alertMessage.style.display = "none"; // Hide the alert message
    });
    }
});