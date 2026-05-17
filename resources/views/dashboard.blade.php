<div class="dashboard-view" id="dashboardView">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="nav-logo" style="text-decoration:none;" onclick="showLanding()">
        <div class="logo-icon">
          <svg fill="none" stroke="white" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 22s-8-4.5-8-11.8A8 8 0 0112 2a8 8 0 018 8.2c0 7.3-8 11.8-8 11.8z"/><path d="M12 7v5l3 3"/></svg>
        </div>
        <span class="logo-text">Antre<span>In</span></span>
      </a>
    </div>

    <nav class="sidebar-nav">
      <div class="nav-section">
        <div class="nav-section-label">Utama</div>
        <a class="nav-item active" href="#">
          <div class="ni-icon">🏠</div> Dashboard
        </a>
        <a class="nav-item" href="#">
          <div class="ni-icon">🎫</div> Antrean Live
          <span class="nav-badge">3</span>
        </a>
        <a class="nav-item" href="#">
          <div class="ni-icon">👥</div> Pasien
        </a>
        <a class="nav-item" href="#">
          <div class="ni-icon">📅</div> Jadwal
        </a>
      </div>

      <div class="nav-section">
        <div class="nav-section-label">Analitik</div>
        <a class="nav-item" href="#">
          <div class="ni-icon">📊</div> Laporan
        </a>
        <a class="nav-item" href="#">
          <div class="ni-icon">📈</div> Statistik
        </a>
      </div>

      <div class="nav-section">
        <div class="nav-section-label">Sistem</div>
        <a class="nav-item" href="#">
          <div class="ni-icon">🏥</div> Poli & Dokter
        </a>
        <a class="nav-item" href="#">
          <div class="ni-icon">⚙️</div> Pengaturan
        </a>
      </div>
    </nav>

    <div class="sidebar-footer">
      <div class="user-info">
        <div class="user-av">DR</div>
        <div>
          <div class="user-name">Dr. Ratna Dewi</div>
          <div class="user-role">Admin · Puskesmas Coblong</div>
        </div>
      </div>
    </div>
  </aside>

  <!-- MAIN CONTENT -->
  <div class="main-content">
    <!-- TOPBAR -->
    <header class="topbar">
      <div class="topbar-left">
        <h1>Dashboard</h1>
        <p>Senin, 12 Mei 2025 · 09:42 WIB</p>
      </div>
      <div class="topbar-right">
        <button class="icon-btn" title="Notifikasi" style="position:relative;">
          🔔
          <div class="notif-dot"></div>
        </button>
        <button class="icon-btn" title="Pencarian">🔍</button>
        <a href="#" class="btn-primary" onclick="showLanding(); return false;" style="font-size:13px; padding:8px 16px;">
          ← Kembali ke Beranda
        </a>
      </div>
    </header>

    <!-- PAGE CONTENT -->
    <div class="page-content">

      <!-- ANALYTICS CARDS -->
      <div class="analytics-grid">
        <div class="analytic-card">
          <div class="ac-header">
            <div class="ac-icon" style="background:var(--primary-light);">🎫</div>
            <span class="ac-trend trend-up">+12%</span>
          </div>
          <div class="ac-value">142</div>
          <div class="ac-label">Total Antrean Hari Ini</div>
          <div class="progress-track">
            <div class="progress-fill" style="width:71%;"></div>
          </div>
        </div>

        <div class="analytic-card">
          <div class="ac-header">
            <div class="ac-icon" style="background:var(--accent-light);">✅</div>
            <span class="ac-trend trend-up">+5%</span>
          </div>
          <div class="ac-value">98</div>
          <div class="ac-label">Sudah Dilayani</div>
          <div class="progress-track">
            <div class="progress-fill" style="width:69%;background:linear-gradient(90deg,var(--accent),var(--accent-deep));"></div>
          </div>
        </div>

        <div class="analytic-card">
          <div class="ac-header">
            <div class="ac-icon" style="background:var(--warm-light);">⏳</div>
            <span class="ac-trend trend-down">-3%</span>
          </div>
          <div class="ac-value">44</div>
          <div class="ac-label">Menunggu</div>
          <div class="progress-track">
            <div class="progress-fill" style="width:31%;background:linear-gradient(90deg,var(--warm),#D97706);"></div>
          </div>
        </div>

        <div class="analytic-card">
          <div class="ac-header">
            <div class="ac-icon" style="background:var(--purple-light);">⏱️</div>
            <span class="ac-trend trend-up">-8%</span>
          </div>
          <div class="ac-value">18m</div>
          <div class="ac-label">Rata-rata Tunggu</div>
          <div class="progress-track">
            <div class="progress-fill" style="width:30%;background:linear-gradient(90deg,var(--purple),#7C3AED);"></div>
          </div>
        </div>
      </div>

      <!-- MAIN GRID -->
      <div class="dashboard-main-grid">

        <!-- LEFT: Table + Chart -->
        <div style="display:flex;flex-direction:column;gap:20px;">

          <!-- Chart Widget -->
          <div class="widget-card">
            <div class="widget-header">
              <div>
                <div class="widget-title">Antrean per Jam</div>
                <div class="widget-subtitle">Distribusi antrean hari ini</div>
              </div>
              <button class="widget-action">Unduh</button>
            </div>
            <div class="chart-container">
              <div class="chart-bars" id="chartBars"></div>
              <div style="display:flex;justify-content:center;gap:20px;font-size:12px;color:var(--text-muted);">
                <span><span style="display:inline-block;width:10px;height:10px;border-radius:2px;background:linear-gradient(135deg,var(--primary),var(--accent));margin-right:4px;"></span>Antrean masuk</span>
                <span><span style="display:inline-block;width:10px;height:10px;border-radius:2px;background:var(--border-light);margin-right:4px;"></span>Kapasitas</span>
              </div>
            </div>
          </div>

          <!-- Queue Table -->
          <div class="widget-card">
            <div class="widget-header">
              <div>
                <div class="widget-title">Antrean Aktif</div>
                <div class="widget-subtitle">Real-time · diperbarui setiap 30 detik</div>
              </div>
              <button class="widget-action">Lihat Semua</button>
            </div>
            <table class="queue-table">
              <thead>
                <tr>
                  <th>Pasien</th>
                  <th>No. Antrean</th>
                  <th>Poli</th>
                  <th>Daftar</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="patient-info">
                      <div class="patient-av" style="background:linear-gradient(135deg,#0EA5E9,#0284C7);">BS</div>
                      <div><div class="patient-name">Budi Santoso</div><div class="patient-id">#P-2401</div></div>
                    </div>
                  </td>
                  <td><strong>A-047</strong></td>
                  <td><span class="poli-badge poli-umum">Poli Umum</span></td>
                  <td style="color:var(--text-muted);font-size:13px;">08:12</td>
                  <td><span class="status-pill status-serving">Dilayani</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="patient-info">
                      <div class="patient-av" style="background:linear-gradient(135deg,#10B981,#059669);">AR</div>
                      <div><div class="patient-name">Ani Rahayu</div><div class="patient-id">#P-2402</div></div>
                    </div>
                  </td>
                  <td><strong>A-048</strong></td>
                  <td><span class="poli-badge poli-umum">Poli Umum</span></td>
                  <td style="color:var(--text-muted);font-size:13px;">08:25</td>
                  <td><span class="status-pill status-waiting">Menunggu</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="patient-info">
                      <div class="patient-av" style="background:linear-gradient(135deg,#F59E0B,#D97706);">DM</div>
                      <div><div class="patient-name">Dian Marlina</div><div class="patient-id">#P-2403</div></div>
                    </div>
                  </td>
                  <td><strong>B-012</strong></td>
                  <td><span class="poli-badge poli-gigi">Poli Gigi</span></td>
                  <td style="color:var(--text-muted);font-size:13px;">08:30</td>
                  <td><span class="status-pill status-serving">Dilayani</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="patient-info">
                      <div class="patient-av" style="background:linear-gradient(135deg,#8B5CF6,#7C3AED);">SF</div>
                      <div><div class="patient-name">Siti Fatimah</div><div class="patient-id">#P-2404</div></div>
                    </div>
                  </td>
                  <td><strong>C-007</strong></td>
                  <td><span class="poli-badge poli-anak">Poli Anak</span></td>
                  <td style="color:var(--text-muted);font-size:13px;">08:42</td>
                  <td><span class="status-pill status-waiting">Menunggu</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="patient-info">
                      <div class="patient-av" style="background:linear-gradient(135deg,#F43F5E,#BE123C);">RH</div>
                      <div><div class="patient-name">Rizky Hakim</div><div class="patient-id">#P-2405</div></div>
                    </div>
                  </td>
                  <td><strong>A-049</strong></td>
                  <td><span class="poli-badge poli-umum">Poli Umum</span></td>
                  <td style="color:var(--text-muted);font-size:13px;">09:01</td>
                  <td><span class="status-pill status-waiting">Menunggu</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- RIGHT PANEL -->
        <div class="right-panel">

          <!-- Live Ticket -->
          <div class="ticket-card">
            <div class="ticket-header">
              <div class="ticket-label">Antrean Dipanggil</div>
              <div class="ticket-live"><div class="live-dot"></div> LIVE</div>
            </div>
            <div class="ticket-number-big">A-047</div>
            <div class="ticket-poli">Poli Umum · Ruang 2 · Dr. Hendra</div>
            <hr class="dashed-divider">
            <div class="ticket-info-row">
              <div class="ticket-info-item">
                <div class="t-info-label">Menunggu</div>
                <div class="t-info-val">44</div>
              </div>
              <div class="ticket-info-item">
                <div class="t-info-label">Dilayani</div>
                <div class="t-info-val">98</div>
              </div>
              <div class="ticket-info-item">
                <div class="t-info-label">Est. Tunggu</div>
                <div class="t-info-val">18m</div>
              </div>
            </div>
          </div>

          <!-- Notifications -->
          <div class="widget-card">
            <div class="widget-header">
              <div>
                <div class="widget-title">Notifikasi</div>
                <div class="widget-subtitle">3 notifikasi baru</div>
              </div>
              <button class="widget-action">Tandai Baca</button>
            </div>
            <div class="notif-list">
              <div class="notif-item">
                <div class="notif-icon-wrap" style="background:var(--primary-light);">🎫</div>
                <div class="notif-text">
                  <div class="notif-msg">Antrean A-050 baru didaftarkan oleh Yusuf Maulana</div>
                  <div class="notif-time">2 menit lalu</div>
                </div>
                <div class="notif-dot-unread"></div>
              </div>
              <div class="notif-item">
                <div class="notif-icon-wrap" style="background:var(--accent-light);">✅</div>
                <div class="notif-text">
                  <div class="notif-msg">Pasien A-046 Dewi Kusuma selesai dilayani</div>
                  <div class="notif-time">8 menit lalu</div>
                </div>
                <div class="notif-dot-unread"></div>
              </div>
              <div class="notif-item">
                <div class="notif-icon-wrap" style="background:var(--coral-light);">⚠️</div>
                <div class="notif-text">
                  <div class="notif-msg">B-009 tidak hadir setelah 2x panggilan, antrean dilewati</div>
                  <div class="notif-time">15 menit lalu</div>
                </div>
                <div class="notif-dot-unread"></div>
              </div>
              <div class="notif-item">
                <div class="notif-icon-wrap" style="background:var(--warm-light);">📊</div>
                <div class="notif-text">
                  <div class="notif-msg">Laporan harian siap diunduh untuk tanggal 11 Mei</div>
                  <div class="notif-time">1 jam lalu</div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div><!-- end page-content -->
  </div><!-- end main-content -->
</div><!-- end dashboard-view -->
