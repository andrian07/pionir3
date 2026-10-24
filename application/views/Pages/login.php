<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url(); ?>assets/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url();?>dist/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <title>Login – Pionir Store</title>
  <style>
    :root {
      --primary: #d21f2c;
      --primary-dark: #8f1017;
      --bg-page: #f4f5f7;
      --panel-bg: #ffffff;
      --text-main: #1a1a2e;
      --text-muted: #6c757d;
      --input-bg: #f8f9fa;
      --input-border: #e3e5e8;
    }

    *, *::before, *::after { box-sizing: border-box; }

    html, body { height: 100%; margin: 0; }

    body {
      min-height: 100vh;
      display: flex;
      background: var(--bg-page);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      transition: background 0.3s ease;
    }

    body[data-theme="dark"] {
      --bg-page: #14151c;
      --panel-bg: #1c1d27;
      --text-main: #f1f2f5;
      --text-muted: #9a9ca6;
      --input-bg: #24252f;
      --input-border: #34353f;
    }

    .login-page {
      display: flex;
      width: 100%;
      min-height: 100vh;
    }

    /* ── Left brand panel ── */
    .login-brand {
      position: relative;
      flex: 0 0 52%;
      max-width: 52%;
      min-height: 100vh;
      overflow: hidden;
      background-image: url('<?php echo base_url(); ?>assets/bacgkroundlogin.png');
      background-size: cover;
      background-position: left center;
      background-repeat: no-repeat;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 56px 60px;
      color: #fff;
    }
    .login-brand::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.5);
      pointer-events: none;
    }

    .brand-top, .brand-mid, .brand-bottom { position: relative; z-index: 1; }

    .brand-logo {
      display: flex;
      align-items: center;
      gap: 14px;
    }
    .brand-logo img {
      width: 56px;
      height: 56px;
      object-fit: contain;
      filter: drop-shadow(0 2px 6px rgba(0,0,0,0.35));
    }
    .brand-logo .brand-logo-text h1 {
      font-size: 1.15rem;
      font-weight: 800;
      letter-spacing: 1px;
      margin: 0;
      line-height: 1.2;
    }
    .brand-logo .brand-logo-text span {
      font-size: 0.65rem;
      letter-spacing: 2px;
      color: rgba(255,255,255,0.75);
      text-transform: uppercase;
    }

    .brand-mid { max-width: 420px; }
    .brand-divider {
      width: 56px;
      height: 4px;
      background: #fff;
      border-radius: 2px;
      margin-bottom: 20px;
    }
    .brand-mid h2 {
      font-size: 2rem;
      font-weight: 800;
      line-height: 1.25;
      margin-bottom: 14px;
      text-shadow: 0 2px 10px rgba(0,0,0,0.35);
    }
    .brand-mid p {
      font-size: 0.95rem;
      line-height: 1.65;
      color: rgba(255,255,255,0.85);
      margin-bottom: 28px;
    }

    .brand-features {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }
    .brand-feature {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      background: rgba(20,0,2,0.35);
      border: 1px solid rgba(255,255,255,0.15);
      backdrop-filter: blur(4px);
      border-radius: 12px;
      padding: 12px 14px;
    }
    .brand-feature .fi-icon {
      flex: none;
      width: 34px;
      height: 34px;
      border-radius: 9px;
      background: rgba(255,255,255,0.18);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
    }
    .brand-feature h4 {
      font-size: 0.83rem;
      font-weight: 700;
      margin: 0 0 2px;
    }
    .brand-feature p {
      font-size: 0.72rem;
      color: rgba(255,255,255,0.75);
      margin: 0;
      line-height: 1.35;
    }

    .brand-bottom {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 0.8rem;
      color: rgba(255,255,255,0.85);
    }
    .brand-bottom .bar {
      width: 4px;
      height: 18px;
      background: #fff;
      border-radius: 2px;
    }

    /* ── Right form panel ── */
    .login-form-panel {
      flex: 1;
      background: var(--panel-bg);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 48px 40px;
      position: relative;
      min-height: 100vh;
      transition: background 0.3s ease;
    }

    .theme-toggle {
      position: absolute;
      top: 32px;
      right: 40px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--input-bg);
      border: 1px solid var(--input-border);
      color: var(--text-main);
      font-size: 0.82rem;
      font-weight: 600;
      border-radius: 50px;
      padding: 9px 18px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .theme-toggle:hover { border-color: var(--primary); color: var(--primary); }

    .login-form-inner { width: 100%; max-width: 380px; }

    .login-form-inner .welcome-label {
      color: var(--text-muted);
      font-size: 0.95rem;
      margin-bottom: 2px;
    }
    .login-form-inner h3 {
      font-weight: 800;
      font-size: 1.9rem;
      color: var(--text-main);
      margin-bottom: 6px;
      letter-spacing: 0.3px;
    }
    .login-form-inner h3 span { color: var(--primary); }
    .admin-panel-tag {
      font-size: 0.72rem;
      font-weight: 700;
      letter-spacing: 3px;
      color: var(--text-muted);
      text-transform: uppercase;
      margin-bottom: 10px;
    }
    .login-form-inner .subtitle {
      color: var(--text-muted);
      font-size: 0.88rem;
      margin-bottom: 30px;
    }

    .input-icon-wrap { position: relative; margin-bottom: 18px; }
    .input-icon-wrap .field-icon {
      position: absolute;
      left: 16px; top: 50%;
      transform: translateY(-50%);
      color: #adb5bd;
      font-size: 15px;
      pointer-events: none;
      transition: color 0.2s;
    }
    .input-icon-wrap .form-control {
      padding-left: 44px;
      height: 50px;
      border: 1.5px solid var(--input-border);
      border-radius: 10px;
      font-size: 0.92rem;
      color: var(--text-main);
      transition: border-color 0.25s, box-shadow 0.25s, background 0.2s;
      background: var(--input-bg);
    }
    .input-icon-wrap .form-control::placeholder { color: #9aa0a6; }
    .input-icon-wrap .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(210,31,44,0.14);
      background: var(--panel-bg);
      outline: none;
    }
    .input-icon-wrap:focus-within .field-icon { color: var(--primary); }
    .toggle-password {
      position: absolute;
      right: 16px; top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #adb5bd;
      font-size: 15px;
      transition: color 0.2s;
    }
    .toggle-password:hover { color: var(--primary); }

    .form-check-input:checked {
      background-color: var(--primary);
      border-color: var(--primary);
    }
    .form-check-label { font-size: 0.85rem; color: var(--text-muted); }

    .btn-login {
      height: 52px;
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      border: none;
      border-radius: 10px;
      color: #fff;
      font-size: 1rem;
      font-weight: 700;
      transition: transform 0.15s, box-shadow 0.15s, opacity 0.15s;
      box-shadow: 0 6px 20px rgba(210,31,44,0.35);
      margin-top: 6px;
    }
    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 26px rgba(210,31,44,0.45);
      opacity: 0.96;
      color: #fff;
    }
    .btn-login:active { transform: translateY(0); }
    .btn-login .spinner-border { width: 1.1rem; height: 1.1rem; border-width: 2px; }

    .or-divider {
      display: flex;
      align-items: center;
      gap: 14px;
      margin: 26px 0;
      color: var(--text-muted);
      font-size: 0.8rem;
    }
    .or-divider::before, .or-divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--input-border);
    }

    .login-footer {
      text-align: center;
      font-size: 0.82rem;
      color: var(--text-muted);
    }
    .login-footer strong { color: var(--text-main); display: block; margin-bottom: 2px; }
    .login-footer .copyright { font-size: 0.72rem; opacity: 0.75; margin-top: 4px; }

    @media (max-width: 900px) {
      .login-brand { display: none; }
      .login-form-panel { flex: 1 1 100%; max-width: 100%; }
    }
  </style>
</head>
<body data-theme="dark">

  <div class="login-page">

    <!-- Left brand panel -->
    <div class="login-brand">
      <div class="brand-top brand-logo">
        <img src="<?php echo base_url(); ?>assets/logo.png" alt="Pionir Store">
        <div class="brand-logo-text">
          <h1>PIONIR STORE</h1>
          <span>Sistem Manajemen Retail</span>
        </div>
      </div>

      <div class="brand-mid">
        <div class="brand-divider"></div>
        <h2>Kelola Toko Anda Lebih Mudah</h2>
        <p>Solusi lengkap untuk mengelola produk, stok, transaksi dan penjualan.</p>

        <div class="brand-features">
          <div class="brand-feature">
            <div class="fi-icon"><i class="fas fa-box"></i></div>
            <div>
              <h4>Manajemen Stok</h4>
              <p>Pantau stok real-time</p>
            </div>
          </div>
          <div class="brand-feature">
            <div class="fi-icon"><i class="fas fa-chart-column"></i></div>
            <div>
              <h4>Laporan Penjualan</h4>
              <p>Data akurat &amp; lengkap</p>
            </div>
          </div>
          <div class="brand-feature">
            <div class="fi-icon"><i class="fas fa-cart-shopping"></i></div>
            <div>
              <h4>Transaksi Cepat</h4>
              <p>Proses lebih efisien</p>
            </div>
          </div>
          <div class="brand-feature">
            <div class="fi-icon"><i class="fas fa-users"></i></div>
            <div>
              <h4>Multi Pengguna</h4>
              <p>Akses sesuai peran</p>
            </div>
          </div>
        </div>
      </div>

      <div class="brand-bottom">
        <span class="bar"></span> Bersama Membangun Usaha
      </div>
    </div>

    <!-- Right form panel -->
    <div class="login-form-panel">
      <button type="button" class="theme-toggle" id="themeToggle">
        <i class="fas fa-sun" id="themeIcon"></i>
        <span id="themeLabel">Mode Gelap</span>
      </button>

      <div class="login-form-inner">
        <p class="welcome-label">Selamat Datang di</p>
        <h3>PIONIR <span>STORE</span></h3>
        <p class="admin-panel-tag">Admin Panel</p>
        <p class="subtitle">Masuk ke akun Anda untuk melanjutkan</p>

        <form autocomplete="off">
          <div class="input-icon-wrap">
            <input type="text" class="form-control" id="username"
                   placeholder="Masukkan username" autocomplete="username">
            <i class="fas fa-user field-icon"></i>
          </div>

          <div class="input-icon-wrap">
            <input type="password" class="form-control" id="password"
                   placeholder="Masukkan password" autocomplete="current-password">
            <i class="fas fa-lock field-icon"></i>
            <i class="fas fa-eye toggle-password" id="togglePassword"></i>
          </div>

          <div class="d-flex align-items-center justify-content-between mb-2">
            <div class="form-check mb-0">
              <input class="form-check-input" type="checkbox" id="remember_me">
              <label class="form-check-label" for="remember_me">Ingat saya</label>
            </div>
          </div>

          <div class="d-grid">
            <button type="button" id="login" class="btn btn-login">
              <span id="btn-text"><i class="fas fa-right-to-bracket me-2"></i>Masuk</span>
              <span id="btn-loading" class="d-none">
                <span class="spinner-border spinner-border-sm me-2" role="status"></span>Memproses...
              </span>
            </button>
          </div>
        </form>

        <div class="or-divider">atau</div>

        <div class="login-footer">
          <strong>Pionir Store</strong>
          Sistem Manajemen Retail
          <div class="copyright">&copy; <?php echo date('Y'); ?> All rights reserved.</div>
        </div>
      </div>
    </div>

  </div>

  <script src="<?php echo base_url(); ?>dist/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/sweetalert2.js"></script>
  <script>
    // Toggle password visibility
    $('#togglePassword').on('click', function () {
      var isPassword = $('#password').attr('type') === 'password';
      $('#password').attr('type', isPassword ? 'text' : 'password');
      $(this).toggleClass('fa-eye fa-eye-slash');
    });

    // Theme toggle (light / dark)
    (function () {
      var body = document.body;
      var icon = $('#themeIcon');
      var label = $('#themeLabel');

      function applyTheme(theme) {
        if (theme === 'dark') {
          body.setAttribute('data-theme', 'dark');
          icon.removeClass('fa-sun').addClass('fa-moon');
          label.text('Mode Terang');
        } else {
          body.removeAttribute('data-theme');
          icon.removeClass('fa-moon').addClass('fa-sun');
          label.text('Mode Gelap');
        }
      }

      var saved = null;
      try { saved = localStorage.getItem('pionir_login_theme'); } catch (e) {}
      applyTheme(saved === 'light' ? 'light' : 'dark');

      $('#themeToggle').on('click', function () {
        var next = body.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
        applyTheme(next);
        try { localStorage.setItem('pionir_login_theme', next); } catch (e) {}
      });
    })();

    // Login submit
    $('#login').on('click', function (e) {
      e.preventDefault();

      var username = $('#username').val().trim();
      var password = $('#password').val();
      var remember = $('#remember_me').is(':checked') ? 1 : 0;

      if (!username || !password) {
        Swal.fire({
          icon: 'warning',
          title: 'Perhatian',
          text: 'Username dan password tidak boleh kosong.',
          confirmButtonColor: '#d21f2c'
        });
        return;
      }

      $('#btn-text').addClass('d-none');
      $('#btn-loading').removeClass('d-none');
      $('#login').prop('disabled', true);

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>Auth/processlogin',
        dataType: 'json',
        data: { username: username, password: password, remember: remember },
        success: function (data) {
          if (data.code == '200' || data.code == 200) {
            window.location.href = '<?php echo base_url(); ?>Dashboard';
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Login Gagal',
              text: data.msg,
              confirmButtonColor: '#d21f2c'
            });
            resetBtn();
          }
        },
        error: function () {
          Swal.fire({
            icon: 'error',
            title: 'Kesalahan Jaringan',
            text: 'Tidak dapat terhubung ke server. Silakan coba lagi.',
            confirmButtonColor: '#d21f2c'
          });
          resetBtn();
        }
      });
    });

    function resetBtn() {
      $('#btn-text').removeClass('d-none');
      $('#btn-loading').addClass('d-none');
      $('#login').prop('disabled', false);
    }

    // Enter key submit
    $(document).on('keypress', function (e) {
      if (e.which === 13) { $('#login').trigger('click'); }
    });
  </script>
</body>
</html>
