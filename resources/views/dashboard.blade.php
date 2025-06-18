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

  /* Header */
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
    display: flex; /* Ensure icon is centered if it were multiple elements */
    align-items: center;
    justify-content: center;
    width: 30px; /* Adjust size as needed */
    height: 30px; /* Adjust size as needed */
    border: 1px solid #ddd; /* Lighter border for a softer look */
    border-radius: 50%; /* Make it round */
    background-color: #f0f0f0; /* Light background */
    color: #1d3b98; /* Icon color */
    font-size: 1.2rem; /* Icon size */
    transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
  }

  header .right .profile-icon:hover {
    background-color: #e0e7f9; /* Lighter blue on hover */
    border-color: #1d3b98; /* Border matches brand color on hover */
    color: #16337d; /* Darker icon color on hover */
  }
  /* Dashboard Container */
  .dashboard {
   display: flex;
   max-width: 1300px;
   margin: auto;
   padding: 50px 20px;
   flex-wrap: wrap;
   align-items: center;
   justify-content: space-around;
   gap: 30px;
   position: relative;
  }

  /* Card Styling */
  .card {
   background: white; /* Fallback background color */
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
   justify-content: flex-end; /* Align content to the bottom for gradient effect */
   align-items: center;
   min-height: 450px; /* Increased height as requested */
   background-size: cover; /* Cover the entire card with the image */
   background-position: center; /* Center the background image */
   position: relative; /* Needed for pseudo-elements/overlay */
   overflow: hidden; /* Hide overflowing parts of the image/gradient */
  }

  .card:hover {
   transform: translateY(-5px);
  }

    /* Overlay for gradient and text */
    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.0) 70%); /* White gradient from bottom, fading out */
        z-index: 1; /* Place above image, below text */
    }

    .card .content-wrapper {
        position: relative; /* Bring content above the ::before pseudo-element */
        z-index: 2; /* Ensure content is on top */
        padding-top: 50px; /* Add padding from top to push content into gradient area */
        width: 100%; /* Ensure wrapper takes full width */
        display: flex; /* Flex for content within wrapper */
        flex-direction: column;
        justify-content: flex-end; /* Push content to bottom of wrapper */
        align-items: center;
        height: 100%; /* Make content wrapper take full height of card */
    }


  .card h2 {
   font-size: 1.8rem;
   margin-bottom: 5px; /* Reduced margin for closer text */
   color: #1d3b98; /* Darker color for readability */
   border-bottom: none;
   padding-bottom: 0;
  }

  .card p {
    font-size: 1rem;
    color: #555; /* Slightly darker grey for readability on white */
    margin-top: 0;
    margin-bottom: 0;
  }

  .card .icon {
    font-size: 3.5rem;
    color: #1d3b98; /* Darker color for readability */
    margin-bottom: 10px; /* Reduced margin */
  }

    /* Specific background images for each card */
    .card-skills {
        background-image: url('./image1.jpg');
    }

    .card-cv {
        background-image: url('./image2.jpg');
    }

    .card-certificates {
        background-image: url('./image3.jpg');
    }

  .btn {
   display: inline-block;
   padding: 12px 25px;
   margin-top: 20px;
   background: #1d3b98;
   color: white;
   border-radius: 30px;
   text-decoration: none;
   font-size: 1rem;
   font-weight: 500;
   transition: background 0.3s ease, transform 0.2s ease;
  }

  .btn:hover {
   background: #16337d;
   transform: translateY(-2px);
  }

  /* Stats Section */
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
    <i class="fas fa-user"></i>  </a>
 </div>
</header>

<div class="dashboard">
 <a href="skills.html" class="card card-skills">
    <div class="content-wrapper">
        <div class="icon"><i class="fas fa-brain"></i></div>
        <h2>Skill Saya</h2>
        <p>Kelola daftar hard skill dan soft skill Anda.</p>
    </div>
 </a>

 <a href="profile.html" class="card card-cv">
    <div class="content-wrapper">
        <div class="icon"><i class="fas fa-user-circle"></i></div>
        <h2>CV Saya</h2>
        <p>Lihat dan Kelola CV anda.</p>
    </div>
 </a>

 <a href="certificates.html" class="card card-certificates">
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

</body>
</html>