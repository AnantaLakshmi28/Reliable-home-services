document.addEventListener("DOMContentLoaded", function() {
    const chatbotToggle = document.getElementById("chatbot-toggle");
    const chatbotContainer = document.getElementById("chatbot-container");
    const closeChat = document.getElementById("close-chat");
    const sendBtn = document.getElementById("send-btn");
    const chatInput = document.getElementById("chat-input");
    const chatMessages = document.getElementById("chat-messages");

    chatbotToggle.addEventListener("click", function() {
        chatbotContainer.style.display = "block";
    });

    closeChat.addEventListener("click", function() {
        chatbotContainer.style.display = "none";
    });

    sendBtn.addEventListener("click", function() {
        sendMessage();
    });

    chatInput.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            sendMessage();
        }
    });

    function sendMessage() {
        let userMessage = chatInput.value.trim();
        if (userMessage === "") return;

        // Display user message
        chatMessages.innerHTML += `<p><strong>You:</strong> ${userMessage}</p>`;
        chatInput.value = "";

        // Send message to PHP chatbot backend
        fetch("chatbot.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "message=" + encodeURIComponent(userMessage)
        })
        .then(response => response.json())
        .then(data => {
            chatMessages.innerHTML += `<p><strong>Bot:</strong> ${data.reply}</p>`;
            chatMessages.scrollTop = chatMessages.scrollHeight;
        })
        .catch(error => console.error("Error:", error));
    }
});
