<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Profil Saya - SkillHub</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 <style>
  body {
   margin: 0;
   font-family: "Segoe UI", sans-serif;
   background: #fff;
   overflow-x: hidden;
  }

  /* Header - Sesuai permintaan */
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

    /* Top Profile Banner */
    .profile-banner {
        background-image: url('https://greenpublisher.id/blog/wp-content/uploads/2022/01/Contoh-Pendahuluan-Karya-Ilmiah.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        color: white;
        padding: 40px 30px;
        display: flex;
        align-items: center;
        gap: 30px;
        position: relative;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .profile-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.1) 50%, rgba(0, 0, 0, 0.4) 100%);
        z-index: 0;
    }

    .profile-banner .avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #fff;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.5);
        z-index: 1;
    }

    .profile-banner .user-details {
        z-index: 1;
    }

    .profile-banner .user-details h1 {
        margin: 0;
        font-size: 2.2rem;
        font-weight: 600;
        line-height: 1.2;
    }

    .profile-banner .user-details p {
        margin: 5px 0 0 0;
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .profile-banner .user-stats {
        display: flex;
        gap: 25px;
        position: absolute;
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1;
        text-align: right;
    }

    .profile-banner .user-stats div {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .profile-banner .user-stats i {
        font-size: 1.5rem;
        margin-bottom: 5px;
    }

    .profile-banner .user-stats a { /* Styling for the new links */
        color: white; /* Make link text white */
        text-decoration: none; /* Remove underline */
        font-size: 1.1rem;
        font-weight: 500;
        transition: opacity 0.3s ease;
    }

    .profile-banner .user-stats a:hover {
        opacity: 0.7; /* Dim on hover */
    }


    /* Main Profile Content */
    .profile-content {
        max-width: 1300px;
        margin: 20px auto 60px auto;
        padding: 30px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .profile-content h2 {
        font-size: 1.8rem;
        color: #1d3b98;
        margin-bottom: 25px;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
        text-align: left;
    }

    .data-group {
        margin-bottom: 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .data-item {
        flex: 1 1 calc(50% - 10px);
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    
    .data-item.full-width {
        flex-basis: 100%;
    }

    .data-item label {
        font-size: 0.95rem;
        color: #666;
        font-weight: 600;
    }

    .data-item p {
        font-size: 1rem;
        color: #333;
        margin: 0;
        padding: 5px 0;
    }

    .data-item .bio-text {
        white-space: pre-wrap;
    }

    .profile-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }


  /* Tombol umum - Sesuai permintaan */
  .btn {
   display: inline-block;
   padding: 12px 25px;
   margin-top: 0;
   background: #1d3b98;
   color: white;
   border-radius: 30px;
   text-decoration: none;
   font-size: 1rem;
   font-weight: 500;
   transition: background 0.3s ease, transform 0.2s ease;
   border: none;
   cursor: pointer;
  }

  .btn:hover {
   background: #16337d;
   transform: translateY(-2px);
  }

  /* Footer - Sesuai permintaan */
  .stats {
   background: #f9f9f9;
   padding: 40px 20px;
   display: flex;
   justify-content: space-around;
   flex-wrap: wrap;
   text-align: center;
   margin-top: 60px;
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

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .profile-banner {
            flex-direction: column;
            text-align: center;
            gap: 20px;
            padding: 30px 20px;
        }
        .profile-banner .user-details h1 {
            font-size: 1.8rem;
        }
        .profile-banner .user-stats {
            position: static;
            transform: none;
            margin-top: 20px;
            width: 100%;
            justify-content: center;
        }
        .profile-content {
            padding: 20px;
            margin: 20px auto 40px auto;
        }
        .data-group {
            flex-direction: column;
            gap: 15px;
        }
        .data-item {
            flex-basis: 100%;
        }
        .profile-actions {
            flex-direction: column;
            align-items: center;
        }
        .btn {
            width: 100%;
        }
    }

  @media (max-width: 480px) {
    header {
      padding: 10px 15px;
    }
    header .left strong {
      font-size: 1rem;
    }
    header .left img {
      height: 25px;
    }
    header .right .profile-icon {
      width: 28px;
      height: 28px;
      font-size: 1rem;
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
    <a href="profile.html" class="profile-icon" title="Profil Saya">
    <i class="fas fa-user"></i> </a>
 </div>
</header>

<div class="profile-banner">
    <img src="https://i.pravatar.cc/90?u=yefyudistira" alt="Foto Profil" class="avatar">
    <div class="user-details">
        <h1>Yefta Yudistira Dio Lewaherilla</h1>
        <p>Mahasiswa Informatika<br>Universitas Teknologi</p>
    </div>
    <div class="user-stats">
        <div>
            <i class="fas fa-brain"></i> <a href="skills.html"><span>5 Skills</span></a> </div>
        <div>
            <i class="fas fa-certificate"></i> <a href="certificates.html"><span>8 Certificates</span></a> </div>
    </div>
</div>

<div class="profile-content">
    <h2>Informasi Dasar</h2>
    <div class="data-group">
        <div class="data-item">
            <label>Nama Depan</label>
            <p>Yefta Yudistira</p>
        </div>
        <div class="data-item">
            <label>Nama Belakang</label>
            <p>Lewaherilla</p>
        </div>
        <div class="data-item">
            <label>Jurusan</label>
            <p>Teknik Informatika</p>
        </div>
        <div class="data-item">
            <label>Kampus</label>
            <p>Universitas Teknologi</p>
        </div>
    </div>

    <h2>Informasi Kontak</h2>
    <div class="data-group">
        <div class="data-item full-width">
            <label>Email</label>
            <p>yeftayudistira@email.com</p>
        </div>
        <div class="data-item full-width">
            <label>Nomor HP</label>
            <p>+62 812-3456-7890</p>
        </div>
    </div>

    <h2>Biografi</h2>
    <div class="data-group">
        <div class="data-item full-width">
            <label>Deskripsi Diri</label>
            <p class="bio-text">Bersemangat dalam pengembangan web dan ilmu data. Selalu ingin belajar teknologi baru dan mencari solusi inovatif untuk masalah kompleks. Aktif dalam organisasi mahasiswa dan proyek tim.</p>
        </div>
    </div>

    <div class="profile-actions">
        <a href="edit-profile.html" class="btn">Edit Profil</a>
    </div>
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

</body>
</html>