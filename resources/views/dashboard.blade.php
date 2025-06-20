<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Dashboard SkillHub</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

  /* Chatbot Styles */
    .chatbot-btn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 60px;
      height: 60px;
      background: linear-gradient(135deg, #1da1f2, #0066cc);
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
    }
    .chatbot-btn:hover {
      transform: scale(1.1);
    }
    .chatbot-panel {
      display: none;
      position: fixed;
      bottom: 90px;
      right: 20px;
      width: 320px;
      height: 420px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      border: 2px solid #1da1f2;
    }
    .chatbot-panel.active {
      display: flex;
      flex-direction: column;
    }
    .chatbot-header {
      background: linear-gradient(135deg, #1da1f2, #0066cc);
      color: white;
      padding: 10px;
      text-align: center;
      font-size: 18px;
      font-weight: bold;
    }
    .chatbox {
      flex: 1;
      padding: 15px;
      overflow-y: auto;
      background: #f9f9f9;
    }
    .chatbox p {
      margin: 5px 0;
      padding: 8px 12px;
      border-radius: 5px;
    }
    .chatbox .user {
      background: #e1f5fe;
      text-align: right;
    }
    .chatbox .bot {
      background: #e3f2fd;
    }
    .input-area {
      padding: 10px;
      background: #fff;
      border-top: 1px solid #ddd;
      display: flex;
      gap: 5px;
        }
        #chatInput {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        .send-btn {
            padding: 8px 15px;
            background: #1da1f2;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .send-btn:hover {
            background: #0066cc;
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

  <a href="{{ route('profile.profile') }}" class="card card-cv">
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
        <div class="chatbot-header">SkillHub Chatbot</div>
        <div class="chatbox" id="chatbox"></div>
        <div class="input-area">
            <input type="text" id="chatInput" placeholder="Tulis pesan...">
            <button class="send-btn" onclick="sendMessage()">Kirim</button>
        </div>
    </div>

    <script>
        function toggleChatbot() {
            const panel = document.getElementById('chatbotPanel');
            panel.classList.toggle('active');
        }

        function sendMessage() {
            const input = document.getElementById('chatInput');
            const chatbox = document.getElementById('chatbox');
            const message = input.value.trim();
            if (message) {
                chatbox.innerHTML += `<p class="user"><strong>Kamu:</strong> ${message}</p>`;
                chatbox.innerHTML += `<p class="bot"><strong>Bot:</strong> Halo! Saya bisa membantu Anda dengan SkillHub. Apa yang ingin Anda ketahui?</p>`;
                input.value = '';
                chatbox.scrollTop = chatbox.scrollHeight;
            }
        }

        document.getElementById('chatInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') sendMessage();
        });
    </script>
</body>
</html>
