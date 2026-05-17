<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AntreIn — Sistem Antrean Puskesmas Cerdas</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
/* ─── RESET & ROOT ─── */
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
html { scroll-behavior: smooth; }
body {
  font-family: 'Inter', sans-serif;
  background: #F8FAFC;
  color: #0F172A;
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

/* ─── DESIGN TOKENS ─── */
:root {
  --blue:        #0EA5E9;
  --blue-deep:   #0284C7;
  --blue-darker: #0369A1;
  --blue-light:  #E0F2FE;
  --blue-glow:   rgba(14,165,233,.18);
  --green:       #10B981;
  --green-light: #D1FAE5;
  --green-deep:  #059669;
  --amber:       #F59E0B;
  --amber-light: #FEF3C7;
  --rose:        #F43F5E;
  --rose-light:  #FFE4E6;
  --violet:      #8B5CF6;
  --violet-light:#EDE9FE;
  --slate-900:   #0F172A;
  --slate-700:   #334155;
  --slate-500:   #64748B;
  --slate-400:   #94A3B8;
  --slate-200:   #E2E8F0;
  --slate-100:   #F1F5F9;
  --white:       #FFFFFF;
  --bg:          #F8FAFC;

  --sh-sm:  0 1px 4px rgba(0,0,0,.05), 0 1px 2px rgba(0,0,0,.05);
  --sh-md:  0 4px 20px rgba(0,0,0,.06), 0 2px 8px rgba(0,0,0,.04);
  --sh-lg:  0 12px 44px rgba(0,0,0,.08), 0 4px 16px rgba(0,0,0,.04);
  --sh-xl:  0 24px 64px rgba(0,0,0,.10), 0 8px 24px rgba(0,0,0,.05);
  --sh-blue: 0 10px 36px rgba(14,165,233,.30);

  --r-sm:  8px;
  --r-md:  14px;
  --r-lg:  20px;
  --r-xl:  28px;
  --r-2xl: 36px;
  --r-full: 9999px;
}

/* ─── TYPOGRAPHY ─── */
.f-display { font-family: 'Poppins', sans-serif; }

/* ─── NAVBAR ─── */
.navbar {
  position: fixed; top: 0; left: 0; right: 0; z-index: 900;
  height: 68px;
  background: rgba(248,250,252,.82);
  backdrop-filter: blur(22px) saturate(200%);
  -webkit-backdrop-filter: blur(22px) saturate(200%);
  border-bottom: 1px solid rgba(226,232,240,.7);
  transition: box-shadow .3s;
}
.navbar.raised { box-shadow: var(--sh-md); }

.nav-wrap {
  max-width: 1200px; margin: 0 auto; padding: 0 28px;
  height: 100%; display: flex; align-items: center; justify-content: space-between;
}

.logo { display: flex; align-items: center; gap: 10px; text-decoration: none; }
.logo-mark {
  width: 36px; height: 36px;
  background: linear-gradient(135deg, var(--blue), var(--blue-deep));
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  box-shadow: 0 4px 14px rgba(14,165,233,.38);
}
.logo-mark svg { width: 20px; height: 20px; }
.logo-name {
  font-family: 'Poppins', sans-serif;
  font-size: 21px; font-weight: 700;
  color: var(--slate-900); letter-spacing: -.5px;
}
.logo-name span { color: var(--blue); }

.nav-links { display: flex; align-items: center; gap: 2px; list-style: none; }
.nav-links a {
  font-size: 14px; font-weight: 500; color: var(--slate-500);
  text-decoration: none; padding: 7px 15px;
  border-radius: var(--r-full); transition: all .2s;
}
.nav-links a:hover { color: var(--blue); background: var(--blue-light); }

.nav-right { display: flex; align-items: center; gap: 10px; }

.btn-outline {
  font-family: 'Inter', sans-serif;
  font-size: 14px; font-weight: 500;
  color: var(--slate-700); background: var(--white);
  border: 1.5px solid var(--slate-200);
  padding: 8px 18px; border-radius: var(--r-full);
  cursor: pointer; text-decoration: none;
  transition: all .2s; display: inline-flex; align-items: center; gap: 6px;
  box-shadow: var(--sh-sm);
}
.btn-outline:hover { border-color: var(--blue); color: var(--blue); }

.btn-cta {
  font-family: 'Poppins', sans-serif;
  font-size: 14px; font-weight: 600;
  color: var(--white);
  background: linear-gradient(135deg, var(--blue), var(--blue-deep));
  border: none; padding: 9px 22px; border-radius: var(--r-full);
  cursor: pointer; text-decoration: none;
  transition: all .25s; display: inline-flex; align-items: center; gap: 7px;
  box-shadow: var(--sh-blue);
}
.btn-cta:hover { transform: translateY(-1px); box-shadow: 0 14px 44px rgba(14,165,233,.38); }
.btn-cta:active { transform: translateY(0); }

/* ─── HERO ─── */
.hero {
  padding-top: 68px; min-height: 100vh;
  display: flex; align-items: center;
  background: linear-gradient(155deg, #EFF9FF 0%, #F8FAFC 45%, #F0FDF4 100%);
  position: relative; overflow: hidden;
}

/* subtle grid */
.hero::before {
  content: '';
  position: absolute; inset: 0;
  background-image:
    linear-gradient(rgba(14,165,233,.045) 1px, transparent 1px),
    linear-gradient(90deg, rgba(14,165,233,.045) 1px, transparent 1px);
  background-size: 52px 52px;
  pointer-events: none;
}

/* radial glows */
.hero-glow-1 {
  position: absolute; top: -160px; right: -160px;
  width: 680px; height: 680px;
  background: radial-gradient(circle, rgba(14,165,233,.09) 0%, transparent 68%);
  pointer-events: none;
}
.hero-glow-2 {
  position: absolute; bottom: -120px; left: -100px;
  width: 500px; height: 500px;
  background: radial-gradient(circle, rgba(16,185,129,.07) 0%, transparent 68%);
  pointer-events: none;
}

.hero-inner {
  max-width: 1200px; margin: 0 auto; padding: 80px 28px;
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 72px; align-items: center; width: 100%;
  position: relative; z-index: 1;
}

/* ── Hero Left ── */
.hero-tag {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--white); border: 1px solid var(--slate-200);
  border-radius: var(--r-full); padding: 5px 14px 5px 8px;
  font-size: 12.5px; font-weight: 500; color: var(--slate-500);
  box-shadow: var(--sh-sm); margin-bottom: 22px;
  opacity: 0; animation: fadeDown .6s ease .05s forwards;
}
.tag-live {
  width: 7px; height: 7px; background: var(--green);
  border-radius: 50%; animation: blink 2s infinite;
}
.tag-chip {
  background: var(--blue-light); color: var(--blue-deep);
  font-size: 10.5px; font-weight: 700; letter-spacing: .6px;
  text-transform: uppercase; padding: 2px 8px;
  border-radius: var(--r-full);
}

.hero-h1 {
  font-family: 'Poppins', sans-serif;
  font-size: clamp(36px, 4.2vw, 56px);
  font-weight: 800; line-height: 1.08; letter-spacing: -2px;
  color: var(--slate-900); margin-bottom: 20px;
  opacity: 0; animation: fadeDown .65s ease .12s forwards;
}
.hero-h1 .grad {
  background: linear-gradient(130deg, var(--blue), var(--green));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}

.hero-p {
  font-size: 16.5px; line-height: 1.78;
  color: var(--slate-500); margin-bottom: 36px; max-width: 480px;
  opacity: 0; animation: fadeDown .65s ease .2s forwards;
}

.hero-actions {
  display: flex; align-items: center; gap: 14px; flex-wrap: wrap;
  opacity: 0; animation: fadeDown .65s ease .28s forwards;
}

.btn-hero-primary {
  font-family: 'Poppins', sans-serif;
  font-size: 15px; font-weight: 600; color: var(--white);
  background: linear-gradient(135deg, var(--blue), var(--blue-deep));
  border: none; padding: 14px 30px; border-radius: var(--r-full);
  cursor: pointer; text-decoration: none;
  display: inline-flex; align-items: center; gap: 8px;
  box-shadow: var(--sh-blue); transition: all .25s;
}
.btn-hero-primary:hover { transform: translateY(-2px); box-shadow: 0 18px 52px rgba(14,165,233,.40); }

.btn-hero-ghost {
  font-family: 'Poppins', sans-serif;
  font-size: 15px; font-weight: 500; color: var(--slate-700);
  background: var(--white); border: 1.5px solid var(--slate-200);
  padding: 13px 26px; border-radius: var(--r-full);
  cursor: pointer; text-decoration: none;
  display: inline-flex; align-items: center; gap: 8px;
  box-shadow: var(--sh-sm); transition: all .25s;
}
.btn-hero-ghost:hover { border-color: var(--blue); color: var(--blue); transform: translateY(-1px); box-shadow: var(--sh-md); }

.hero-trust {
  display: flex; align-items: center; gap: 12px;
  margin-top: 32px; font-size: 13px; color: var(--slate-400);
  opacity: 0; animation: fadeDown .65s ease .36s forwards;
}
.avatars { display: flex; }
.av {
  width: 30px; height: 30px; border-radius: 50%;
  border: 2.5px solid var(--white);
  display: flex; align-items: center; justify-content: center;
  font-size: 10px; font-weight: 700; color: var(--white);
  margin-left: -9px;
}
.av:first-child { margin-left: 0; }
.av-a { background: linear-gradient(135deg,#0EA5E9,#0284C7); }
.av-b { background: linear-gradient(135deg,#10B981,#059669); }
.av-c { background: linear-gradient(135deg,#F59E0B,#D97706); }
.av-d { background: linear-gradient(135deg,#8B5CF6,#7C3AED); }
.hero-trust strong { color: var(--slate-700); font-weight: 600; }

/* ── Hero Right ── */
.hero-visual {
  position: relative;
  opacity: 0; animation: fadeUp .8s ease .2s forwards;
}

.queue-card {
  background: var(--white); border-radius: var(--r-xl);
  padding: 28px; box-shadow: var(--sh-xl);
  border: 1px solid rgba(226,232,240,.6);
  position: relative; overflow: hidden;
}
.queue-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0;
  height: 3px; background: linear-gradient(90deg, var(--blue), var(--green));
}

.qc-topbar {
  display: flex; align-items: center; justify-content: space-between;
  margin-bottom: 24px;
}
.qc-dots { display: flex; gap: 5px; }
.dot {
  width: 10px; height: 10px; border-radius: 50%;
}
.dot-r { background: #FC5F5A; } .dot-y { background: #FDBB2F; } .dot-g { background: #2DC840; }
.qc-label { font-size: 12px; font-weight: 600; color: var(--slate-400); letter-spacing: .5px; text-transform: uppercase; }

.now-serving { text-align: center; padding: 8px 0 20px; }
.ns-eyebrow { font-size: 11px; font-weight: 600; letter-spacing: 1.2px; text-transform: uppercase; color: var(--slate-400); margin-bottom: 6px; }
.ns-number {
  font-family: 'Poppins', sans-serif; font-size: 82px;
  font-weight: 900; letter-spacing: -5px; line-height: 1;
  background: linear-gradient(135deg, var(--blue), var(--blue-deep));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
.ns-poli { font-size: 13.5px; color: var(--slate-500); margin: 6px 0 12px; }
.ns-badge {
  display: inline-flex; align-items: center; gap: 5px;
  background: var(--green-light); color: var(--green-deep);
  font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: var(--r-full);
}
.pulse-dot { width: 6px; height: 6px; background: var(--green); border-radius: 50%; animation: blink 1.5s infinite; }

.qc-divider { height: 1px; background: var(--slate-100); margin: 20px 0; }

.qc-stats { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 12px; }
.qcs { text-align: center; }
.qcs-val {
  font-family: 'Poppins', sans-serif; font-size: 24px;
  font-weight: 700; letter-spacing: -.5px;
}
.qcs-lbl { font-size: 11px; color: var(--slate-400); margin-top: 2px; }
.c-blue { color: var(--blue); }
.c-green { color: var(--green); }
.c-slate { color: var(--slate-500); }

/* Float cards */
.float {
  position: absolute; background: var(--white);
  border-radius: var(--r-lg); padding: 14px 18px;
  box-shadow: var(--sh-lg); border: 1px solid rgba(226,232,240,.7);
}
.float-1 { top: -18px; right: -28px; min-width: 176px; animation: float 4s ease-in-out infinite; }
.float-2 { bottom: 16px; left: -36px; min-width: 172px; animation: float 4s ease-in-out infinite 2.1s; }

.fl-eyebrow { font-size: 10px; font-weight: 600; letter-spacing: .6px; text-transform: uppercase; color: var(--slate-400); margin-bottom: 6px; }
.fl-val { font-family: 'Poppins', sans-serif; font-size: 20px; font-weight: 700; color: var(--slate-900); }
.fl-sub { font-size: 11.5px; color: var(--slate-400); margin-top: 1px; }
.fl-icon { font-size: 22px; margin-bottom: 6px; }

.prog-track { height: 4px; background: var(--slate-100); border-radius: var(--r-full); overflow: hidden; margin-top: 10px; }
.prog-fill { height: 100%; border-radius: var(--r-full); background: linear-gradient(90deg, var(--blue), var(--green)); }

/* ─── SECTION SHELL ─── */
.sec { padding: 96px 0; }
.sec-alt { background: var(--white); }

.sec-inner { max-width: 1200px; margin: 0 auto; padding: 0 28px; }

.sec-head { text-align: center; margin-bottom: 60px; }
.sec-chip {
  display: inline-flex; align-items: center; gap: 6px;
  font-size: 11.5px; font-weight: 700; letter-spacing: .8px; text-transform: uppercase;
  padding: 5px 14px; border-radius: var(--r-full); margin-bottom: 14px;
}
.chip-blue  { background: var(--blue-light);   color: var(--blue-deep); }
.chip-green { background: var(--green-light);  color: var(--green-deep); }
.chip-amber { background: var(--amber-light);  color: #92400E; }
.chip-violet{ background: var(--violet-light); color: #5B21B6; }

.sec-title {
  font-family: 'Poppins', sans-serif;
  font-size: clamp(26px, 3.2vw, 40px); font-weight: 800;
  letter-spacing: -1px; color: var(--slate-900);
  line-height: 1.15; margin-bottom: 14px;
}
.sec-sub {
  font-size: 16.5px; color: var(--slate-500);
  max-width: 520px; margin: 0 auto; line-height: 1.72;
}

/* ─── SERVICES ─── */
.services-grid {
  display: grid; grid-template-columns: repeat(3,1fr); gap: 22px;
}

.svc-card {
  border-radius: var(--r-xl); padding: 34px 30px;
  border: 1.5px solid var(--slate-100);
  position: relative; overflow: hidden;
  transition: transform .3s, box-shadow .3s, border-color .3s;
  cursor: default; background: var(--bg);
}
.svc-card:hover { transform: translateY(-6px); box-shadow: var(--sh-xl); border-color: transparent; }

.svc-card.featured {
  background: linear-gradient(145deg, #0EA5E9 0%, #0284C7 100%);
  border-color: transparent;
}
.svc-card.featured:hover { box-shadow: 0 22px 64px rgba(14,165,233,.35); }

.svc-bg {
  position: absolute; top: -30px; right: -30px;
  width: 110px; height: 110px;
  border-radius: 50%; opacity: .06;
}

.svc-icon {
  width: 54px; height: 54px; border-radius: var(--r-md);
  display: flex; align-items: center; justify-content: center;
  margin-bottom: 18px; font-size: 24px;
  position: relative; z-index: 1;
}
.icon-blue   { background: var(--blue-light); }
.icon-green  { background: var(--green-light); }
.icon-amber  { background: var(--amber-light); }
.icon-white  { background: rgba(255,255,255,.22); }

.svc-name {
  font-family: 'Poppins', sans-serif;
  font-size: 19px; font-weight: 700; margin-bottom: 10px;
  color: var(--slate-900); position: relative; z-index: 1;
}
.svc-card.featured .svc-name { color: var(--white); }

.svc-desc {
  font-size: 14px; color: var(--slate-500); line-height: 1.7;
  margin-bottom: 22px; position: relative; z-index: 1;
}
.svc-card.featured .svc-desc { color: rgba(255,255,255,.82); }

.svc-foot {
  display: flex; align-items: center; justify-content: space-between;
  position: relative; z-index: 1;
}
.svc-count {
  font-size: 12.5px; font-weight: 600;
  padding: 4px 12px; border-radius: var(--r-full);
}
.count-blue  { background: var(--blue-light); color: var(--blue-deep); }
.count-green { background: var(--green-light); color: var(--green-deep); }
.count-amber { background: var(--amber-light); color: #92400E; }
.count-white { background: rgba(255,255,255,.22); color: var(--white); }

.svc-hours { font-size: 12.5px; color: var(--slate-400); font-weight: 500; }
.svc-card.featured .svc-hours { color: rgba(255,255,255,.65); }

/* ─── HOW IT WORKS ─── */
.steps-grid {
  display: grid; grid-template-columns: repeat(4,1fr); gap: 28px;
  position: relative;
}
/* connector line */
.steps-grid::before {
  content: ''; position: absolute;
  top: 39px; left: calc(12.5% + 20px); right: calc(12.5% + 20px);
  height: 2px;
  background: linear-gradient(90deg, var(--blue), var(--green));
  opacity: .25;
}

.step { text-align: center; }

.step-ring {
  width: 78px; height: 78px; border-radius: 50%;
  background: var(--white); border: 2px solid var(--slate-200);
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto 18px; box-shadow: var(--sh-md);
  transition: all .3s;
}
.step:hover .step-ring {
  border-color: var(--blue);
  box-shadow: 0 0 0 7px var(--blue-light), var(--sh-md);
  transform: scale(1.06);
}

.step-num {
  font-family: 'Poppins', sans-serif; font-size: 26px; font-weight: 800;
  background: linear-gradient(135deg, var(--blue), var(--green));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}

.step-title {
  font-family: 'Poppins', sans-serif; font-size: 15.5px; font-weight: 700;
  color: var(--slate-900); margin-bottom: 8px;
}
.step-desc { font-size: 13.5px; color: var(--slate-500); line-height: 1.68; }

/* ─── STATS ─── */
.stats-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 18px; }

.stat-card {
  background: var(--bg); border-radius: var(--r-xl); padding: 30px 26px;
  border: 1.5px solid var(--slate-100);
  transition: transform .3s, box-shadow .3s; position: relative; overflow: hidden;
}
.stat-card:hover { transform: translateY(-4px); box-shadow: var(--sh-lg); border-color: transparent; }
.stat-card::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0;
  height: 3px; border-radius: 0 0 var(--r-xl) var(--r-xl); opacity: 0;
  transition: opacity .3s;
}
.stat-card:hover::after { opacity: 1; }
.stat-card:nth-child(1)::after { background: var(--blue); }
.stat-card:nth-child(2)::after { background: var(--green); }
.stat-card:nth-child(3)::after { background: var(--amber); }
.stat-card:nth-child(4)::after { background: var(--violet); }

.stat-icon {
  width: 46px; height: 46px; border-radius: var(--r-md);
  display: flex; align-items: center; justify-content: center;
  font-size: 22px; margin-bottom: 16px;
}

.stat-val {
  font-family: 'Poppins', sans-serif; font-size: 36px; font-weight: 800;
  color: var(--slate-900); letter-spacing: -1.5px; line-height: 1; margin-bottom: 5px;
}
.stat-lbl { font-size: 13.5px; color: var(--slate-500); font-weight: 500; }

.stat-badge {
  display: inline-flex; align-items: center; gap: 3px;
  font-size: 11.5px; font-weight: 600;
  padding: 3px 9px; border-radius: var(--r-full); margin-top: 9px;
}
.badge-up  { color: var(--green-deep); background: var(--green-light); }
.badge-neu { color: var(--blue-deep);  background: var(--blue-light); }

/* ─── FAQ ─── */
.faq-list {
  max-width: 800px; margin: 0 auto;
  display: flex; flex-direction: column; gap: 12px;
}

.faq-item {
  background: var(--white); border-radius: var(--r-lg);
  border: 1.5px solid var(--slate-100);
  overflow: hidden; transition: box-shadow .25s, border-color .25s;
}
.faq-item:hover { box-shadow: var(--sh-md); }
.faq-item.open { border-color: var(--blue-light); box-shadow: 0 0 0 3px rgba(14,165,233,.07); }

.faq-q {
  padding: 20px 24px;
  display: flex; align-items: center; justify-content: space-between;
  cursor: pointer; user-select: none; gap: 14px;
}
.faq-qtext {
  font-family: 'Poppins', sans-serif; font-size: 15px; font-weight: 600; color: var(--slate-900);
}
.faq-icon {
  width: 28px; height: 28px; border-radius: 50%;
  background: var(--slate-100); border: 1.5px solid var(--slate-200);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0; transition: all .25s;
  color: var(--slate-500); font-size: 18px; font-weight: 300; line-height: 1;
}
.faq-item.open .faq-icon {
  background: var(--blue); border-color: var(--blue); color: var(--white); transform: rotate(45deg);
}

.faq-body {
  max-height: 0; overflow: hidden;
  transition: max-height .35s ease, padding .3s ease;
  font-size: 14.5px; color: var(--slate-500); line-height: 1.72;
}
.faq-item.open .faq-body { max-height: 160px; padding: 0 24px 22px; }

/* ─── CTA BAND ─── */
.cta-band {
  background: linear-gradient(135deg, #0EA5E9, #0284C7, #0369A1);
  padding: 84px 0; position: relative; overflow: hidden;
}
.cta-band::before {
  content: ''; position: absolute;
  top: -120px; right: -120px; width: 480px; height: 480px;
  background: radial-gradient(circle, rgba(255,255,255,.09) 0%, transparent 70%);
}
.cta-band::after {
  content: ''; position: absolute;
  bottom: -80px; left: 8%; width: 320px; height: 320px;
  background: radial-gradient(circle, rgba(16,185,129,.14) 0%, transparent 70%);
}
.cta-inner {
  max-width: 1200px; margin: 0 auto; padding: 0 28px;
  text-align: center; position: relative; z-index: 1;
}
.cta-band h2 {
  font-family: 'Poppins', sans-serif;
  font-size: clamp(26px, 3.5vw, 42px); font-weight: 800;
  color: var(--white); letter-spacing: -1px; margin-bottom: 14px;
}
.cta-band p {
  font-size: 16.5px; color: rgba(255,255,255,.78);
  max-width: 460px; margin: 0 auto 36px; line-height: 1.72;
}
.btn-white {
  font-family: 'Poppins', sans-serif;
  font-size: 15px; font-weight: 700; color: var(--blue-deeper);
  background: var(--white); border: none;
  padding: 14px 34px; border-radius: var(--r-full);
  cursor: pointer; text-decoration: none;
  display: inline-flex; align-items: center; gap: 8px;
  box-shadow: 0 10px 36px rgba(0,0,0,.18); transition: all .25s;
}
.btn-white:hover { transform: translateY(-2px); box-shadow: 0 18px 52px rgba(0,0,0,.24); }

/* ─── FOOTER ─── */
footer {
  background: var(--slate-900);
  color: var(--slate-400);
  padding: 64px 0 32px;
}
.footer-inner { max-width: 1200px; margin: 0 auto; padding: 0 28px; }

.footer-top {
  display: grid; grid-template-columns: 2fr 1fr 1fr 1fr;
  gap: 48px; margin-bottom: 48px;
}

.footer-logo .logo-name { color: var(--white); }

.footer-tagline {
  font-size: 13.5px; color: var(--slate-400);
  line-height: 1.72; margin: 14px 0 22px; max-width: 270px;
}

.socials { display: flex; gap: 9px; }
.social {
  width: 34px; height: 34px; border-radius: var(--r-sm);
  background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.1);
  display: flex; align-items: center; justify-content: center;
  text-decoration: none; color: var(--slate-400);
  font-size: 12px; font-weight: 700;
  transition: all .2s;
}
.social:hover { background: rgba(14,165,233,.2); border-color: rgba(14,165,233,.38); color: var(--blue); }

.footer-col h4 {
  font-family: 'Poppins', sans-serif;
  font-size: 12px; font-weight: 700; letter-spacing: .6px;
  text-transform: uppercase; color: var(--white); margin-bottom: 16px;
}
.footer-col ul { list-style: none; }
.footer-col ul li { margin-bottom: 9px; }
.footer-col ul li a { font-size: 13.5px; color: var(--slate-400); text-decoration: none; transition: color .2s; }
.footer-col ul li a:hover { color: var(--white); }

.footer-bottom {
  border-top: 1px solid rgba(255,255,255,.08);
  padding-top: 26px;
  display: flex; align-items: center; justify-content: space-between;
  font-size: 12.5px;
}
.footer-bottom a { color: var(--slate-400); text-decoration: none; }
.footer-bottom a:hover { color: var(--white); }

/* ─── ANIMATIONS ─── */
@keyframes fadeDown {
  from { opacity: 0; transform: translateY(-18px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(26px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes float {
  0%,100% { transform: translateY(0); }
  50%      { transform: translateY(-11px); }
}
@keyframes blink {
  0%,100% { opacity: 1; }
  50%      { opacity: .45; }
}

/* scroll reveal */
.reveal { opacity: 0; transform: translateY(28px); transition: opacity .65s ease, transform .65s ease; }
.reveal.visible { opacity: 1; transform: translateY(0); }
.reveal-d1 { transition-delay: .08s; }
.reveal-d2 { transition-delay: .16s; }
.reveal-d3 { transition-delay: .24s; }
.reveal-d4 { transition-delay: .32s; }

/* ─── RESPONSIVE ─── */
@media(max-width:1024px){
  .hero-inner { grid-template-columns: 1fr; gap: 52px; text-align: center; }
  .hero-p { margin: 0 auto 36px; }
  .hero-actions { justify-content: center; }
  .hero-trust { justify-content: center; }
  .float-1,.float-2 { display: none; }
  .services-grid { grid-template-columns: 1fr 1fr; }
  .stats-grid { grid-template-columns: 1fr 1fr; }
  .steps-grid { grid-template-columns: 1fr 1fr; }
  .steps-grid::before { display: none; }
  .footer-top { grid-template-columns: 1fr 1fr; }
}
@media(max-width:768px){
  .nav-links,.btn-outline { display: none; }
  .services-grid,.stats-grid { grid-template-columns: 1fr; }
  .steps-grid { grid-template-columns: 1fr 1fr; }
  .footer-top { grid-template-columns: 1fr; gap: 32px; }
  .footer-bottom { flex-direction: column; gap: 8px; text-align: center; }
}
@media(max-width:480px){
  .steps-grid { grid-template-columns: 1fr; }
  .hero-actions { flex-direction: column; align-items: stretch; }
  .btn-hero-primary,.btn-hero-ghost { justify-content: center; }
}
</style>
</head>
<body>

<!-- ═══════════════════════ NAVBAR ═══════════════════════ -->
<nav class="navbar" id="nav">
  <div class="nav-wrap">

    <a href="#" class="logo">
      <div class="logo-mark">
        <svg fill="none" stroke="white" stroke-width="2.5" viewBox="0 0 24 24">
          <path d="M12 22s-8-4.5-8-11.8A8 8 0 0112 2a8 8 0 018 8.2c0 7.3-8 11.8-8 11.8z"/>
          <path d="M12 8v4l2.5 2.5"/>
        </svg>
      </div>
      <span class="logo-name">Antre<span>In</span></span>
    </a>

    <ul class="nav-links">
      <li><a href="#layanan">Layanan</a></li>
      <li><a href="#cara-kerja">Cara Kerja</a></li>
      <li><a href="#statistik">Statistik</a></li>
      <li><a href="#faq">FAQ</a></li>
    </ul>

    <div class="nav-right">
      <a href="#" class="btn-outline">Masuk</a>
      <a href="#" class="btn-cta">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
        Ambil Antrean
      </a>
    </div>
<h1> HALO <h1>
  </div>
</nav>

<!-- ═══════════════════════ HERO ═══════════════════════ -->
<section class="hero">
  <div class="hero-glow-1"></div>
  <div class="hero-glow-2"></div>
  <div class="hero-inner">

    <!-- Left -->
    <div class="hero-left">

      <h1 class="hero-h1">
        Antrean Puskesmas<br>
        <span class="grad">Lebih Cerdas,</span><br>
        Lebih Efisien
      </h1>

      <p class="hero-p">
        Tidak perlu datang subuh untuk antrean. Daftar dari rumah, pantau posisi secara real-time, dan datang tepat saat giliran hampir tiba.
      </p>

      <div class="hero-actions">
        <a href="#" class="btn-hero-primary">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
          Ambil Antrean Sekarang
        </a>
        <a href="#cara-kerja" class="btn-hero-ghost">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M10 8l4 4-4 4"/></svg>
          Lihat Cara Kerja
        </a>
      </div>
    </div>

    <!-- Right: Queue Card -->
    <div class="hero-visual">

      <!-- Float top-right -->
      <div class="float float-1">
        <div class="fl-eyebrow">Waktu Tunggu Hari Ini</div>
        <div class="fl-val">~18 menit</div>
        <div class="fl-sub">rata-rata semua poli</div>
        <div class="prog-track"><div class="prog-fill" style="width:38%"></div></div>
      </div>

      <div class="queue-card">
        <div class="qc-topbar">
          <div class="qc-dots">
            <div class="dot dot-r"></div>
            <div class="dot dot-y"></div>
            <div class="dot dot-g"></div>
          </div>
          <div class="qc-label">Antrean Live</div>
        </div>

        <div class="now-serving">
          <div class="ns-eyebrow">Nomor Dipanggil</div>
          <div class="ns-number">A-047</div>
          <div class="ns-poli">Poli Umum &nbsp;·&nbsp; Ruang 2</div>
          <div class="ns-badge">
            <div class="pulse-dot"></div>
            Sedang dilayani
          </div>
        </div>

        <div class="qc-divider"></div>

        <div class="qc-stats">
          <div class="qcs">
            <div class="qcs-val c-blue">23</div>
            <div class="qcs-lbl">Menunggu</div>
          </div>
          <div class="qcs">
            <div class="qcs-val c-green">8</div>
            <div class="qcs-lbl">Dilayani</div>
          </div>
          <div class="qcs">
            <div class="qcs-val c-slate">61</div>
            <div class="qcs-lbl">Selesai</div>
          </div>
        </div>
      </div>

      <!-- Float bottom-left -->
      <div class="float float-2">
        <div class="fl-icon">🦷</div>
        <div class="fl-val">B-012</div>
        <div class="fl-sub">Poli Gigi · Antrean Berikutnya</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════ SERVICES ═══════════════════════ -->
<section class="sec sec-alt" id="layanan">
  <div class="sec-inner">

    <div class="sec-head reveal">
      <div class="sec-chip chip-blue">Layanan Tersedia</div>
      <h2 class="sec-title">Pilih Poli yang Anda Butuhkan</h2>
      <p class="sec-sub">Tiga layanan unggulan Puskesmas kini tersedia secara digital dengan antrean real-time yang bisa dipantau dari mana saja</p>
    </div>

  <div class="services-grid">

    @foreach ($polis as $poli)

        <div class="svc-card reveal reveal-d1">

            <svg class="svc-bg" viewBox="0 0 100 100" fill="white">
                <circle cx="80" cy="20" r="60"/>
            </svg>

            <div class="svc-icon icon-blue">
                🏥
            </div>

            <div class="svc-name">
                {{ $poli->nama_poli }}
            </div>

            <div class="svc-desc">
                {{ $poli->deskripsi }}
            </div>

            <div class="svc-foot">

                <span class="svc-count count-blue">
                    {{ $poli->antreans->count() }} antrean aktif
                </span>

                <span class="svc-hours">
                    {{ $poli->jam_buka }} - {{ $poli->jam_tutup }}
                </span>

            </div>

        </div>

    @endforeach

</div>

  </div>
</section>

<!-- ═══════════════════════ HOW IT WORKS ═══════════════════════ -->
<section class="sec" id="cara-kerja">
  <div class="sec-inner">

    <div class="sec-head reveal">
      <div class="sec-chip chip-green">Cara Kerja</div>
      <h2 class="sec-title">4 Langkah Mudah</h2>
      <p class="sec-sub">Dari daftar hingga dilayani — semuanya bisa dilakukan dari genggaman tangan Anda</p>
    </div>

    <div class="steps-grid">
      <div class="step reveal reveal-d1">
        <div class="step-ring"><span class="step-num">1</span></div>
        <h3 class="step-title">Daftar Online</h3>
        <p class="step-desc">Isi data diri dan pilih poli yang dituju kapan saja, tanpa perlu datang ke Puskesmas terlebih dahulu</p>
      </div>
      <div class="step reveal reveal-d2">
        <div class="step-ring"><span class="step-num">2</span></div>
        <h3 class="step-title">Terima Tiket</h3>
        <p class="step-desc">Dapatkan nomor antrean digital di layar atau via SMS setelah pendaftaran berhasil</p>
      </div>
      <div class="step reveal reveal-d3">
        <div class="step-ring"><span class="step-num">3</span></div>
        <h3 class="step-title">Pantau Real-time</h3>
        <p class="step-desc">Monitor posisi antrean dan estimasi waktu tunggu kapan saja secara langsung</p>
      </div>
      <div class="step reveal reveal-d4">
        <div class="step-ring"><span class="step-num">4</span></div>
        <h3 class="step-title">Datang Tepat Waktu</h3>
        <p class="step-desc">Terima notifikasi saat giliran hampir tiba, lalu berangkat ke Puskesmas dengan santai</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════ FAQ ═══════════════════════ -->
<section class="sec" id="faq">
  <div class="sec-inner">

    <div class="sec-head reveal">
      <div class="sec-chip chip-blue">Pertanyaan Umum</div>
      <h2 class="sec-title">Ada yang Ingin Ditanyakan?</h2>
      <p class="sec-sub">Jawaban untuk pertanyaan yang paling sering diajukan oleh pengguna AntreIn</p>
    </div>

    <div class="faq-list">

      <div class="faq-item reveal" onclick="toggleFaq(this)">
        <div class="faq-q">
          <span class="faq-qtext">Apakah layanan AntreIn gratis?</span>
          <div class="faq-icon">+</div>
        </div>
        <div class="faq-body">Ya, AntreIn sepenuhnya gratis untuk pasien. Cukup akses website atau aplikasi dan daftar antrean tanpa biaya apapun.</div>
      </div>

      <div class="faq-item reveal reveal-d1" onclick="toggleFaq(this)">
        <div class="faq-q">
          <span class="faq-qtext">Bisakah mendaftarkan anggota keluarga?</span>
          <div class="faq-icon">+</div>
        </div>
        <div class="faq-body">Bisa. Anda bisa mendaftarkan anggota keluarga dengan mengisi data mereka. Satu akun dapat mendaftarkan beberapa anggota keluarga sekaligus.</div>
      </div>

      <div class="faq-item reveal reveal-d2" onclick="toggleFaq(this)">
        <div class="faq-q">
          <span class="faq-qtext">Bagaimana cara mengetahui giliran saya?</span>
          <div class="faq-icon">+</div>
        </div>
        <div class="faq-body">Anda akan mendapat notifikasi via SMS dan notifikasi push di aplikasi saat ada 3–5 antrean sebelum giliran Anda tiba.</div>
      </div>

      <div class="faq-item reveal reveal-d3" onclick="toggleFaq(this)">
        <div class="faq-q">
          <span class="faq-qtext">Apa yang terjadi jika saya terlambat datang?</span>
          <div class="faq-icon">+</div>
        </div>
        <div class="faq-body">Jika tidak hadir setelah dipanggil 2 kali, nomor antrean akan dilewati otomatis. Anda perlu mendaftar ulang atau melakukan konfirmasi lewat aplikasi.</div>
      </div>

      <div class="faq-item reveal reveal-d4" onclick="toggleFaq(this)">
        <div class="faq-q">
          <span class="faq-qtext">Puskesmas mana saja yang menggunakan AntreIn?</span>
          <div class="faq-icon">+</div>
        </div>
        <div class="faq-body">Saat ini sudah ada 47 Puskesmas di Jawa Barat dan Jabodetabek. Daftar lengkap bisa dilihat di menu "Cari Puskesmas" di dalam aplikasi.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════ CTA BAND ═══════════════════════ -->
<div class="cta-band">
  <div class="cta-inner">
    <h2>Siap Akhiri Antrian Panjang?</h2>
    <p>Bergabung dengan ribuan pasien yang sudah merasakan manfaat antrean digital bersama AntreIn</p>
    <a href="#" class="btn-white">
      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
      Ambil Antrean Sekarang
    </a>
  </div>
</div>

<!-- ═══════════════════════ FOOTER ═══════════════════════ -->
<footer>
  <div class="footer-inner">
    <div class="footer-top">

      <div class="footer-brand">
        <a href="#" class="logo" style="text-decoration:none;">
          <div class="logo-mark">
            <svg fill="none" stroke="white" stroke-width="2.5" viewBox="0 0 24 24">
              <path d="M12 22s-8-4.5-8-11.8A8 8 0 0112 2a8 8 0 018 8.2c0 7.3-8 11.8-8 11.8z"/>
              <path d="M12 8v4l2.5 2.5"/>
            </svg>
          </div>
          <span class="logo-name">Antre<span>In</span></span>
        </a>
        <p class="footer-tagline">Sistem antrean Puskesmas digital yang cerdas, cepat, dan terpercaya untuk masyarakat Indonesia.</p>
        <div class="socials">
          <a href="#" class="social">ig</a>
          <a href="#" class="social">tw</a>
          <a href="#" class="social">fb</a>
          <a href="#" class="social">yt</a>
        </div>
      </div>

      <div class="footer-col">
        <h4>Layanan</h4>
        <ul>
          <li><a href="#">Poli Umum</a></li>
          <li><a href="#">Poli Gigi</a></li>
          <li><a href="#">Poli Anak</a></li>
          <li><a href="#">Cek Antrean</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Perusahaan</h4>
        <ul>
          <li><a href="#">Tentang Kami</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Karir</a></li>
          <li><a href="#">Mitra</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Bantuan</h4>
        <ul>
          <li><a href="#">Pusat Bantuan</a></li>
          <li><a href="#">Hubungi Kami</a></li>
          <li><a href="#">Kebijakan Privasi</a></li>
          <li><a href="#">Syarat & Ketentuan</a></li>
        </ul>
      </div>

    </div>
    <div class="footer-bottom">
      <span>© 2025 AntreIn. Hak cipta dilindungi.</span>
      <span>Dibuat dengan ❤️ untuk kesehatan Indonesia</span>
    </div>
  </div>
</footer>

<!-- ─── JS ─── -->
<script>
  /* Navbar raise on scroll */
  const nav = document.getElementById('nav');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('raised', window.scrollY > 16);
  }, { passive: true });

  /* Scroll reveal */
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

  /* FAQ accordion */
  function toggleFaq(item) {
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item.open').forEach(i => i.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
  }

  /* Smooth anchor scroll */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const id = a.getAttribute('href');
      if (id.length > 1) {
        const target = document.querySelector(id);
        if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); }
      }
    });
  });
</script>
</body>
</html>