<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Dashboard SkillHub</title>
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
 <style>
  body {
   margin: 0;
   font-family: "Segoe UI", sans-serif;
   background: #fff;
   overflow-x: hidden;
  }

  header {
   display: flex;
   justify-content: space-between;
   align-items: center;
   padding: 15px 30px;
   border-bottom: 1px solid #eee;
  }

  header .left {
   display: flex;
   align-items: center;
   gap: 15px;
  }

  header .left img {
   height: 30px;
  }

  header .right {
   display: flex;
   align-items: center;
   gap: 20px;
   font-size: 14px;
  }

  header .right a {
   text-decoration: none;
   color: #333;
   font-weight: 500;
  }

  header .right .profile-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    border-radius: 50%;
    background-color: #f0f0f0;
    color: #1d3b98;
    font-size: 1.2rem;
    transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
  }

  header .right .profile-icon:hover {
    background-color: #e0e7f9;
    border-color: #1d3b98;
    color: #16337d;
  }

  .dashboard {
   display: flex;
   max-width: 1300px;
   margin: auto;
   padding: 50px 20px;
   flex-wrap: wrap;
   justify-content: space-around;
   gap: 30px;
  }

  .card {
   background: white;
   border-radius: 16px;
   box-shadow: 0 10px 30px rgba(0,0,0,0.08);
   padding: 30px;
   flex: 1 1 300px;
   max-width: 380px;
   transition: transform 0.2s ease-in-out;
   text-align: center;
   cursor: pointer;
   text-decoration: none;
   color: inherit;
   display: flex;
   flex-direction: column;
   justify-content: flex-end;
   align-items: center;
   min-height: 450px;
   background-size: cover;
   background-position: center;
   position: relative;
   overflow: hidden;
  }

  .card:hover {
   transform: translateY(-5px);
  }

  .card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to top, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.0) 70%);
    z-index: 1;
  }

  .card .content-wrapper {
    position: relative;
    z-index: 2;
    padding-top: 50px;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    height: 100%;
  }

  .card h2 {
   font-size: 1.8rem;
   margin-bottom: 5px;
   color: #1d3b98;
  }

  .card p {
    font-size: 1rem;
    color: #555;
    margin-top: 0;
    margin-bottom: 0;
  }

  .card .icon {
    font-size: 3.5rem;
    color: #1d3b98;
    margin-bottom: 10px;
  }

  .card-skills { background-image: url('/images/image1.jpg'); }
  .card-cv { background-image: url('/images/image2.jpg'); }
  .card-certificates { background-image: url('/images/image3.jpg'); }

  .stats {
   background: #f9f9f9;
   padding: 40px 20px;
   display: flex;
   justify-content: space-around;
   flex-wrap: wrap;
   text-align: center;
  }

  .stats div {
   flex: 1 1 180px;
   margin: 20px;
  }

  .stats h2 {
   font-size: 2rem;
   color: #1d3b98;
   margin-bottom: 10px;
  }

  .stats p {
   font-size: 1rem;
   color: #333;
   margin: 0;
  }

  @media (max-width: 900px) {
   .dashboard {
    flex-direction: column;
    padding: 20px;
   }

   .card {
    max-width: 100%;
    margin-bottom: 20px;
   }
  }

  /* Chatbot Button Styles */
        .chatbot-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: #1d3b98;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 24px;
            box-shadow: 0 4px 15px rgba(29, 161, 242, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s;
            z-index: 1000; /* Ensure button is on top */
        }
        .chatbot-btn:hover {
            transform: scale(1.1);
        }

        /* Chatbot Panel Styles - from the new chatbot design */
        .chatbot-panel {
            display: none;
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 100%;
            max-width: 400px;
            height: 550px; /* Adjusted height to fit content better */
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            border: 2px solid #1d3b98; /* Added from original dashboard chatbot style */
            z-index: 999; /* Below the button, but above other content */
            flex-direction: column; /* Added for proper flex behavior */
        }
        .chatbot-panel.active {
            display: flex;
        }

        .chatbot-header {
            background: linear-gradient(135deg, #1d3b98, #2a5298);
            color: white;
            padding: 15px 20px; /* Adjusted padding */
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            font-size: 18px; /* Adjusted font size */
            font-weight: bold;
        }

        .bot-avatar {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            backdrop-filter: blur(10px);
        }

        .header-content h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .online-status {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            opacity: 0.9;
        }

        .online-dot {
            width: 8px;
            height: 8px;
            background: #4caf50;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
        }

        .header-actions {
            margin-left: auto;
            display: flex;
            gap: 8px;
        }

        .header-btn {
            width: 32px;
            height: 32px;
            border: none;
            background: rgba(255,255,255,0.2);
            color: white;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-btn:hover {
            background: rgba(255,255,255,0.3);
        }

        .chatbox {
            flex: 1; /* Make chatbox fill available space */
            overflow-y: auto;
            padding: 20px;
            background: #f8f9ff;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .message {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            animation: fadeInUp 0.4s ease;
        }

        .message.user-message { /* Changed from .message.user to .message.user-message */
            flex-direction: row-reverse;
            margin-left: auto;
        }

        .message-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .bot-message .message-avatar {
            background: linear-gradient(135deg, #1d3b98, #2a5298);
            color: white;
        }

        .user-message .message-avatar {
            background: linear-gradient(135deg, #1d3b98, #2a5298);
            color: white;
        }

        .message-content {
            max-width: 75%;
            position: relative;
        }

        .message-bubble {
            padding: 12px 16px;
            border-radius: 18px;
            word-wrap: break-word;
            line-height: 1.4;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .bot-message .message-bubble {
            background: white;
            color: #333;
            border-bottom-left-radius: 6px;
            border: 1px solid #e0e0e0;
        }

        .user-message .message-bubble {
            background: linear-gradient(135deg, #1d3b98, #2a5298);
            color: white;
            border-bottom-right-radius: 6px;
        }

        .message-time {
            display: none; /* Hide time as per the new chatbot code */
        }

        .quick-replies {
            margin-top: 12px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .quick-reply-btn {
            background: white;
            border: 2px solid #1d3b98;
            color: #1d3b98;
            padding: 8px 16px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .quick-reply-btn:hover {
            background: #1d3b98;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(29, 59, 152, 0.3);
        }

        .input-area {
            padding: 20px;
            background: white;
            border-top: 1px solid #e0e0e0;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        #chatInput {
            flex: 1;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            outline: none;
            font-size: 14px;
            transition: border-color 0.3s ease;
            background: #f8f9ff;
        }

        #chatInput:focus {
            border-color: #1d3b98;
            background: white;
        }

        .send-btn {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #1d3b98, #2a5298);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 18px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .send-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(29, 59, 152, 0.4);
        }

        .send-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .typing-indicator {
            display: none;
            align-items: center;
            gap: 12px;
        }

        .typing-indicator.show {
            display: flex;
            animation: fadeInUp 0.4s ease;
        }

        .typing-dots {
            display: flex;
            gap: 4px;
            padding: 12px 16px;
            background: white;
            border-radius: 18px;
            border-bottom-left-radius: 6px;
            border: 1px solid #e0e0e0;
        }

        .typing-dots span {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #1d3b98;
            animation: typing 1.4s infinite ease-in-out;
        }

        .typing-dots span:nth-child(1) { animation-delay: -0.32s; }
        .typing-dots span:nth-child(2) { animation-delay: -0.16s; }

        @keyframes typing {
            0%, 80%, 100% { transform: scale(0.8); opacity: 0.5; }
            40% { transform: scale(1); opacity: 1; }
        }

        .powered-by {
            text-align: center;
            padding: 12px;
            font-size: 12px;
            color: #999;
            background: #f8f9ff;
            border-top: 1px solid #e0e0e0;
        }

        .powered-by a {
            color: #1d3b98;
            text-decoration: none;
            font-weight: 600;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive for Chatbot Panel */
        @media (max-width: 480px) {
            .chatbot-panel {
                bottom: 10px;
                right: 10px;
                left: 10px; /* Take full width on smaller screens */
                width: auto;
                height: calc(100vh - 100px); /* Adjust height for full screen */
            }
        }
    </style>
</head>
<body>

<header>
  <div class="left">
    <img src="https://upload.wikimedia.org/wikipedia/sco/thumb/c/cc/Chelsea_FC.svg/2048px-Chelsea_FC.svg.png" alt="Logo">
    <strong>SkillHub</strong>
  </div>
  <div class="right">
    <a href="{{ route('profile.profile') }}" class="profile-icon" title="Profil Saya">
      <i class="fas fa-user"></i>
    </a>
  </div>
</header>

<div class="dashboard">
  <a href="{{ route('skills.index') }}" class="card card-skills">
    <div class="content-wrapper">
      <div class="icon"><i class="fas fa-brain"></i></div>
      <h2>Skill Saya</h2>
      <p>Kelola daftar hard skill dan soft skill Anda.</p>
    </div>
  </a>

  <a href="{{ route('cv.show') }}" class="card card-cv">
    <div class="content-wrapper">
      <div class="icon"><i class="fas fa-user-circle"></i></div>
      <h2>CV Saya</h2>
      <p>Buat dan Kelola CV anda.</p>
    </div>
  </a>

  <a href="{{ route('sertifikat.index') }}" class="card card-certificates">
    <div class="content-wrapper">
      <div class="icon"><i class="fas fa-certificate"></i></div>
      <h2>Sertifikat Saya</h2>
      <p>Lihat dan unggah sertifikat yang Anda miliki.</p>
    </div>
  </a>
</div>

<div class="stats">
  <div>
    <h2>1K++</h2>
    <p>Mahasiswa aktif</p>
  </div>
  <div>
    <h2>900++</h2>
    <p>Sertifikat diunggah</p>
  </div>
  <div>
    <h2>500++</h2>
    <p>Skill dicatat</p>
  </div>
  <div>
    <h2>13</h2>
    <p>Universitas asal Pengguna</p>
  </div>
  <div>
    <h2>96%</h2>
    <p>Pengguna merasa terbantu</p>
  </div>
</div>

<!-- Chatbot Integration -->
    <button class="chatbot-btn" onclick="toggleChatbot()">💬</button>
<div class="chatbot-panel" id="chatbotPanel">
    <div class="chatbot-header">
        <div class="bot-avatar">🤖</div>
        <div class="header-content">
            <h3>SkillBot</h3>
            <div class="online-status">
                <div class="online-dot"></div>
                <span>Online Now</span>
            </div>
        </div>
        <div class="header-actions">
            <button class="header-btn" onclick="toggleChatbot()">×</button>
        </div>
    </div>

    <div class="chatbox" id="chatbox">
        </div>

    <div class="input-area">
        <input type="text" id="chatInput" placeholder="Reply to SkillBot...">
        <button class="send-btn" id="sendBtn" onclick="sendMessage()">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>

    <div class="powered-by">
        We're ⚡ by <a href="#">SkillHub</a>
    </div>
</div>

<script>
    let messageId = 0;
    let isTyping = false;

    function toggleChatbot() {
        const panel = document.getElementById('chatbotPanel');
        panel.classList.toggle('active');
        if (panel.classList.contains('active')) {
            // Initial messages when chatbot opens
            if (document.querySelectorAll('#chatbox .message').length === 0) {
                setTimeout(() => {
                    addMessage('Hei! 👋', false, false);
                    setTimeout(() => {
                        addMessage(
                            'Saya SkillBot, asisten virtual SkillHub. Apa yang bisa saya bantu untuk Anda hari ini?',
                            false,
                            false,
                        );
                    }, 1000);
                }, 500);
            }
        }
    }

    function addMessage(content, isUser = false, showTime = false, quickReplies = []) {
        const chatbox = document.getElementById('chatbox');
        messageId++;

        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${isUser ? 'user-message' : 'bot-message'}`;
        messageDiv.id = `message-${messageId}`;

        const avatarDiv = document.createElement('div');
        avatarDiv.className = 'message-avatar';
        avatarDiv.textContent = isUser ? '👤' : '🤖';

        const contentDiv = document.createElement('div');
        contentDiv.className = 'message-content';

        const bubbleDiv = document.createElement('div');
        bubbleDiv.className = 'message-bubble';
        bubbleDiv.innerHTML = content;

        contentDiv.appendChild(bubbleDiv);

        if (showTime) {
            const timeDiv = document.createElement('div');
            timeDiv.className = 'message-time';
            timeDiv.textContent = ''; // Tidak menampilkan waktu
            contentDiv.appendChild(timeDiv);
        }

        if (!isUser && quickReplies.length > 0) {
            const quickRepliesDiv = document.createElement('div');
            quickRepliesDiv.className = 'quick-replies';

            quickReplies.forEach(reply => {
                const btn = document.createElement('button');
                btn.className = 'quick-reply-btn';
                btn.textContent = reply.text;
                btn.onclick = () => handleQuickReply(reply.value);
                quickRepliesDiv.appendChild(btn);
            });

            contentDiv.appendChild(quickRepliesDiv);
        }

        messageDiv.appendChild(avatarDiv);
        messageDiv.appendChild(contentDiv);

        chatbox.appendChild(messageDiv);
        chatbox.scrollTop = chatbox.scrollHeight;

        return messageDiv;
    }

    function showTypingIndicator() {
        if (isTyping) return;

        const chatbox = document.getElementById('chatbox');
        isTyping = true;

        const typingDiv = document.createElement('div');
        typingDiv.className = 'message typing-indicator show';
        typingDiv.id = 'typing-indicator';

        const avatarDiv = document.createElement('div');
        avatarDiv.className = 'message-avatar';
        avatarDiv.textContent = '🤖';

        const dotsDiv = document.createElement('div');
        dotsDiv.className = 'typing-dots';
        dotsDiv.innerHTML = '<span></span><span></span><span></span>';

        typingDiv.appendChild(avatarDiv);
        typingDiv.appendChild(dotsDiv);

        chatbox.appendChild(typingDiv);
        chatbox.scrollTop = chatbox.scrollHeight;
    }

    function hideTypingIndicator() {
        const typingIndicator = document.getElementById('typing-indicator');
        if (typingIndicator) {
            typingIndicator.remove();
        }
        isTyping = false;
    }

    function handleQuickReply(value) {
        addMessage(value, true);

        const quickReplies = document.querySelectorAll('.quick-replies');
        quickReplies.forEach(qr => qr.remove());

        // Call the backend for response
        fetchBotResponse(value);
    }

    function fetchBotResponse(userMessage) {
        showTypingIndicator();
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/ask-llama', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ prompt: userMessage })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            hideTypingIndicator();
            if (data.error) {
                addMessage(`Maaf, terjadi kesalahan: ${data.error}`, false);
            } else if (data.response) {
                const botResponseText = data.response;
                let quickReplies = [];

                addMessage(botResponseText, false, false, quickReplies);
            } else {
                addMessage('Tidak ada respons dari server.', false);
            }
            document.getElementById('chatInput').value = ''; // Clear input after bot response
            document.getElementById('sendBtn').disabled = false; // Re-enable send button
        })
        .catch(error => {
            console.error('Fetch error:', error);
            hideTypingIndicator();
            addMessage(`Maaf, terjadi kesalahan server: ${error.message}`, false);
            document.getElementById('sendBtn').disabled = false; // Re-enable send button
        });
    }


    function sendMessage() {
        const input = document.getElementById('chatInput');
        const sendBtn = document.getElementById('sendBtn');
        const message = input.value.trim();

        if (!message || isTyping) return;

        addMessage(message, true);
        input.value = '';

        sendBtn.disabled = true; // Disable button while waiting for response

        fetchBotResponse(message);
    }

    document.getElementById('chatInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            sendMessage();
        }
    });

    // Initial load, but only show if chatbot is active
    document.addEventListener('DOMContentLoaded', function() {
        // The initial messages logic is now inside toggleChatbot,
        // so they only appear when the chatbot is opened.
    });
</script>
</body>
</html>
