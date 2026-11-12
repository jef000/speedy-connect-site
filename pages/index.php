<?php require_once __DIR__ . '/../src/site.php'; page_begin('home'); ?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><link rel="icon" href="favicon.svg" type="image/svg+xml"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Speedy Connect — network management for every business</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700;800&family=Geist+Mono:wght@500;600&family=Fraunces:opsz,wght@9..144,500&display=swap" rel="stylesheet">
<style>
:root{--p:#f4f1ea;--p2:#ebe6db;--ink:#141418;--mut:rgb(20 20 24/.6);--ln:rgb(20 20 24/.1);--dk:#111215;--dmut:rgb(244 242 236/.6);--dln:rgb(255 255 255/.09);--brand:#E8A33D;--up:#35D07F}
*{box-sizing:border-box;margin:0}
body{background:var(--p);color:var(--ink);font-family:Geist,system-ui,sans-serif;-webkit-font-smoothing:antialiased}
a{color:inherit;text-decoration:none}
.mono{font-family:'Geist Mono',ui-monospace,monospace}
.wrap{max-width:1180px;margin:0 auto;padding:0 32px}
.disp{font-weight:650;letter-spacing:-.05em}
.mockflag{position:fixed;right:12px;bottom:12px;z-index:9;background:var(--ink);color:#f4f2ec;font-size:11px;padding:6px 10px;border-radius:999px;opacity:.85}

nav{display:flex;align-items:center;height:84px;gap:8px}
.brand{display:flex;align-items:center;gap:9px;font-weight:700;font-size:17px;letter-spacing:-.02em}
.brand i{width:26px;height:26px;border-radius:7px;background:var(--brand);display:grid;place-items:center;color:#141418;font-style:normal;font-size:13px}
.links{display:flex;gap:4px;margin:0 auto;font-size:14.5px;color:var(--mut)}
.links span{padding:8px 14px;border-radius:999px;position:relative}
.links .on{color:var(--ink);background:var(--p2)}
.dd{position:absolute;top:44px;left:-40px;width:330px;background:#fff;border:1px solid var(--ln);border-radius:18px;padding:8px;box-shadow:0 24px 50px -20px rgba(20,20,24,.35);color:var(--ink);z-index:5}
.dd a{display:grid;grid-template-columns:34px 1fr;gap:10px;padding:10px;border-radius:12px;align-items:center}
.dd a:hover{background:var(--p)}
.dd .sq{width:34px;height:34px;border-radius:9px}
.dd b{font-size:14px;display:block}.dd small{color:var(--mut);font-size:12px}
.btn{height:54px;padding:0 26px;border-radius:999px;display:inline-flex;align-items:center;gap:10px;font-size:15.5px;font-weight:650;white-space:nowrap;cursor:pointer;border:0}
.btn.ink{background:var(--ink);color:#f4f2ec;box-shadow:0 16px 30px -14px rgba(20,20,24,.55)}
.btn.sm{height:42px;padding:0 20px;font-size:14px}
.btn.ghost{color:var(--ink);background:transparent}

.hero{text-align:center;padding:56px 0 30px}
.pill{display:inline-flex;gap:8px;align-items:center;background:#fff;border:1px solid var(--ln);border-radius:999px;padding:6px 14px;font-size:13px;color:var(--mut)}
.pill b{color:var(--ink)}
.pill i{width:7px;height:7px;border-radius:50%;background:var(--up)}
h1{font-size:96px;line-height:.92;margin-top:26px}
.lede{max-width:600px;margin:26px auto 0;font-size:18px;line-height:1.55;color:var(--mut)}

.picker{margin:40px auto 0;max-width:980px;background:#fff;border:1px solid var(--ln);border-radius:28px;padding:22px 24px;display:flex;align-items:center;gap:14px;flex-wrap:wrap;justify-content:center;box-shadow:0 30px 60px -40px rgba(20,20,24,.35)}
.picker .lbl{font-size:22px;font-weight:650;letter-spacing:-.03em}
.chip{color:inherit;text-decoration:none;display:inline-flex;align-items:center;gap:8px;height:48px;padding:0 18px;border-radius:999px;border:1.5px solid var(--ln);font-size:15.5px;font-weight:600;cursor:pointer;background:var(--p);transition:all .15s}
.chip .d{width:10px;height:10px;border-radius:50%}
.chip:hover{border-color:var(--ink)}
.chip.on{background:var(--ink);color:#f4f2ec;border-color:var(--ink)}
.note-under{font-size:13px;color:var(--mut);margin-top:14px;text-align:center}

.sec{padding:88px 0 0}
.eyebrow{font-size:12px;letter-spacing:.14em;text-transform:uppercase;color:var(--mut);font-weight:600}
h2{font-size:56px;line-height:.98;margin-top:14px}
.secrow{display:flex;justify-content:space-between;align-items:flex-end;gap:40px}
.secrow p{max-width:340px;color:var(--mut);font-size:15px;line-height:1.55}
.bento{display:grid;grid-template-columns:1.25fr 1fr 1fr;gap:16px;margin-top:40px}
.t{border-radius:26px;padding:26px;position:relative;overflow:hidden;min-height:340px;display:flex;flex-direction:column;transition:transform .2s,box-shadow .2s;outline:3px solid transparent;outline-offset:3px}
.t:hover{transform:translateY(-3px);box-shadow:0 30px 50px -30px rgba(20,20,24,.4)}
.t.hl{outline-color:var(--ink)}
.t .k{font-size:11.5px;letter-spacing:.13em;text-transform:uppercase;font-weight:700}
.t h3{font-size:28px;line-height:1.02;letter-spacing:-.04em;font-weight:650;margin-top:8px}
.t .go{margin-top:auto;padding-top:18px;font-size:14.5px;font-weight:650}
.t .obj{margin:20px 0 4px;flex:1;position:relative}

.t.isp{grid-row:span 2;background:var(--dk);color:#f4f2ec}
.t.isp .k{color:var(--up)}
.t.isp h3{font-size:40px}
.t.isp h3 em{font-style:normal;color:var(--up)}
.wall{background:#1a1c20;border:1px solid var(--dln);border-radius:16px;padding:16px}
.tiles{display:grid;grid-template-columns:repeat(3,1fr);gap:8px}
.tile{border:1px solid var(--dln);border-radius:10px;padding:10px}
.tile s{display:block;text-decoration:none;font-size:10.5px;color:var(--dmut)}
.tile b{font-size:21px;font-weight:600}
.fr{display:grid;grid-template-columns:76px 1fr auto;gap:8px;padding:9px 0;border-bottom:1px solid var(--dln);font-size:12.5px}
.fr:last-child{border:0}
.fr .a{color:var(--brand)}.fr .ok{color:var(--up);font-size:11.5px}
.live{font-size:11px;color:var(--up);display:inline-flex;gap:6px;align-items:center}.live:before{content:"";width:6px;height:6px;border-radius:50%;background:var(--up);box-shadow:0 0 0 3px rgba(53,208,127,.2)}
.isp .sub{color:var(--dmut);font-size:15px;line-height:1.55;margin-top:10px;max-width:440px}

.t.hot{background:#F6F1E8;border:1px solid #E3DACB;color:#1E2A26}
.t.hot .k{color:#9A7B4F}.t.hot h3{font-family:Fraunces,Georgia,serif;font-weight:500;letter-spacing:-.02em}
.key{width:240px;height:150px;border-radius:12px;background:linear-gradient(135deg,#2E5E4E,#1E3F35);color:#F6F1E8;padding:16px;transform:rotate(-5deg);box-shadow:0 24px 40px -18px rgba(30,42,38,.6);position:absolute;left:4px;top:10px}
.key .c{font-family:Fraunces,serif;letter-spacing:.18em;font-size:11px}
.key .r{font-family:Fraunces,serif;font-size:36px;line-height:1;margin-top:10px}
.key .g{font-size:10px;opacity:.75}
.key .cd{position:absolute;right:14px;bottom:12px;text-align:right}
.key .cd s{display:block;text-decoration:none;font-size:8px;letter-spacing:.14em;opacity:.7}
.key .cd b{font-family:'Geist Mono',monospace;color:#E3C48F;font-size:17px}
.key .chipm{position:absolute;left:16px;bottom:16px;width:34px;height:25px;border-radius:4px;background:linear-gradient(135deg,#E3C48F,#9A7B4F)}

.t.caf{background:#FFF4E8;border:1px solid #f0dccb;color:#2B1A12}
.t.caf .k{color:#B4532A}
.t.caf h3 span{background:#B4532A;color:#FFF4E8;padding:0 6px;border-radius:8px;display:inline-block;transform:rotate(-1.5deg)}
.rc{position:absolute;left:6px;top:0;width:150px;background:#fff;padding:12px 12px 18px;font-family:'Geist Mono',monospace;font-size:9.5px;transform:rotate(-3deg);box-shadow:0 18px 30px -16px rgba(43,26,18,.45);
 -webkit-mask:linear-gradient(#000,#000) top/100% calc(100% - 8px) no-repeat,radial-gradient(circle at 5px 0,transparent 4px,#000 4.5px) bottom/10px 8px repeat-x;mask:linear-gradient(#000,#000) top/100% calc(100% - 8px) no-repeat,radial-gradient(circle at 5px 0,transparent 4px,#000 4.5px) bottom/10px 8px repeat-x}
.rc hr{border:0;border-top:1px dashed #bbb;margin:6px 0}
.rc .wc{border:1.5px solid #2B1A12;text-align:center;padding:6px;margin-top:6px}
.rc .wc b{display:block;font-size:20px;letter-spacing:.2em}
.bubble{position:absolute;right:0;bottom:0;width:150px;background:#2B1A12;color:#FFF4E8;border-radius:14px 14px 4px 14px;padding:10px;font-size:10.5px;line-height:1.4}
.bubble s{display:block;text-decoration:none;opacity:.6;font-size:9px;margin-bottom:2px}

.t.sch{background:#F4F6FA;border:1px solid #DCE3EF;color:#14223D}
.t.sch .k{color:#1F3A68}
.tt{display:grid;grid-template-columns:30px repeat(7,1fr);gap:3px;font-size:9px}
.tt .d{text-align:center;color:#6B7A96;font-weight:600}
.tt .h{color:#8C99B0;font-family:'Geist Mono',monospace;font-size:8.5px;align-self:center}
.tt i{height:20px;border-radius:3px;background:#E6EBF3;display:block}
.tt i.l{background:#CFE0FA}.tt i.o{background:#14223D}
.tleg{display:flex;gap:10px;margin-top:8px;font-size:10px;color:#4A5A78}
.slip{margin-top:10px;border:1.5px dashed #9FB2D6;background:#fff;padding:8px 10px;font-size:10px;display:flex;justify-content:space-between;align-items:center}
.slip b{font-family:'Geist Mono',monospace;font-size:15px;letter-spacing:.2em}

.t.ven{background:#EEF1EF;border:1px solid #D5DCD8;color:#1D2421}
.t.ven .k{color:#3C6E5A}
.fp{display:grid;grid-template-columns:1.2fr 1fr;grid-template-rows:62px 62px;border:2.5px solid #1D2421;background:#fff;background-image:linear-gradient(#EEF1EF 1px,transparent 1px),linear-gradient(90deg,#EEF1EF 1px,transparent 1px);background-size:12px 12px}
.fp div{border:1px solid #1D2421;padding:7px;font-size:9.5px;background:rgba(255,255,255,.8)}
.fp b{display:block;font-size:10px}.fp span{font-family:'Geist Mono',monospace;color:#3C6E5A;font-weight:600;font-size:11px}
.fp .w{grid-row:span 2}

.band{background:var(--dk);color:#f4f2ec;margin-top:96px;padding:88px 0}
.band .eyebrow{color:var(--dmut)}
.band .secrow p{color:var(--dmut)}
.eng{display:grid;grid-template-columns:repeat(3,1fr);margin-top:44px;border-top:1px solid var(--dln)}
.eng div{padding:26px 26px 26px 0;border-bottom:1px solid var(--dln)}
.eng div:not(:nth-child(3n)){border-right:1px solid var(--dln);margin-right:26px}
.eng .n{font-family:'Geist Mono',monospace;font-size:12px;color:var(--brand)}
.eng b{display:block;font-size:19px;letter-spacing:-.02em;margin:8px 0 6px;font-weight:600}
.eng p{color:var(--dmut);font-size:14px;line-height:1.5}

.close{display:grid;grid-template-columns:1.1fr 1fr;gap:60px;padding:110px 0 90px;align-items:center}
.close h2{font-size:88px;line-height:.9}
.steps div{display:grid;grid-template-columns:34px 1fr auto;padding:16px 0;border-bottom:1px solid var(--ln);font-size:15px}
.steps .n{font-family:'Geist Mono',monospace;color:var(--mut);font-size:12px;padding-top:3px}
.steps .r{color:var(--mut);font-size:13px}
.ctas{margin-top:26px;display:flex;gap:10px;align-items:center;flex-wrap:wrap}
footer{border-top:1px solid var(--ln);padding:26px 0;display:flex;gap:22px;font-size:13.5px;color:var(--mut);align-items:center;flex-wrap:wrap}
footer .brand{font-size:15px;color:var(--ink)}

@media (max-width:900px){
  .wrap{padding:0 16px}.links{display:none}
  h1{font-size:54px}h2{font-size:40px}.close h2{font-size:56px}
  .secrow,.close{display:block}.secrow p{margin-top:14px}
  .bento{grid-template-columns:1fr}.t.isp{grid-row:auto}
  .eng{grid-template-columns:1fr}.eng div{margin-right:0!important;border-right:0!important}
}
</style><link rel="stylesheet" href="assets/chrome.css">
</head>
<body data-edition="home">


<?php site_header('home'); ?>



<div class="wrap">
  <section class="hero">
    <span class="pill"><i></i><b>One Speedy Connect</b> · five editions · one network platform</span>
    <h1 class="disp">Your network,<br>run the way your<br>business works.</h1>
    <p class="lede">Speedy Connect manages your routers, decides who gets online and how, takes the payment where there is one, and keeps it all running. Built for ISPs, hotels, cafés, schools and any place with a network.</p>

    <div class="picker" role="group" aria-label="Choose your business">
      <span class="lbl">I run</span>
      <a class="chip" href="isp"><span class="d" style="background:#111215"></span>an ISP</a>
      <a class="chip" href="hotels"><span class="d" style="background:#2E5E4E"></span>a hotel</a>
      <a class="chip" href="cafes"><span class="d" style="background:#B4532A"></span>a café or restaurant</a>
      <a class="chip" href="schools"><span class="d" style="background:#1F3A68"></span>a school</a>
      <a class="chip" href="venues"><span class="d" style="background:#3C6E5A"></span>an office, clinic or venue</a>
    </div>
    <p class="note-under">Pick one to open its edition. Each solves a different business’s problems.</p>
  </section>

  <section class="sec" id="editions" style="padding-top:64px">
    <div class="secrow">
      <div><div class="eyebrow">Five editions, one platform</div><h2 class="disp">Each business model<br>gets its own edition.</h2></div>
      <p>An ISP sells internet. A hotel gives it with the room, a café to bring people back, a school to its students. Each edition is shaped around that, from the words on screen to the way people get online.</p>
    </div>

    <div class="bento">
      <a class="t isp" id="t-isp" href="isp">
        <div class="k">Internet service providers</div>
        <h3>Every shilling matched.<br>Every router <em>watched.</em></h3>
        <p class="sub">M-Pesa lands on the right customer by itself, lapsed lines pause each morning, and a router that goes quiet emails you first.</p>
        <div class="obj">
          <div class="wall">
            <div style="display:flex;justify-content:space-between;margin-bottom:10px;font-size:13px"><b>Kilele Net · Today</b><span class="live">Live</span></div>
            <div class="tiles">
              <div class="tile"><s>Online now</s><b class="mono" style="color:var(--up)">1,284</b></div>
              <div class="tile"><s>Paid today</s><b class="mono" style="color:var(--brand)">86,450</b></div>
              <div class="tile"><s>Routers up</s><b class="mono">23<span style="color:var(--dmut);font-size:13px">/24</span></b></div>
            </div>
            <div style="margin-top:8px">
              <div class="fr"><span class="mono a">KES 50</span><span>Wanjiru K. · Daily pass</span><span class="ok">✓ online</span></div>
              <div class="fr"><span class="mono a">KES 1,500</span><span>Otieno H. · Home 10 Mbps</span><span class="ok">✓ renewed</span></div>
              <div class="fr"><span class="mono" style="color:var(--dmut)">06:00</span><span>14 lapsed lines paused</span><span style="color:var(--dmut);font-size:11px">automatic</span></div>
            </div>
          </div>
        </div>
        <span class="go">Speedy Connect for ISPs →</span>
      </a>

      <a class="t hot" id="t-hot" href="hotels">
        <div class="k">Hotels &amp; lodges</div>
        <h3>Wi-Fi that checks in and out with your guests.</h3>
        <div class="obj" style="min-height:170px">
          <div class="key"><div class="c">MVULI HOUSE</div><div class="r">305</div><div class="g">Amina Hassan · until Thu</div><div class="chipm"></div><div class="cd"><s>WI-FI CODE</s><b>305 914</b></div></div>
        </div>
        <span class="go" style="color:#2E5E4E">Speedy Connect for Hotels →</span>
      </a>

      <a class="t caf" id="t-caf" href="cafes">
        <div class="k">Restaurants &amp; cafés</div>
        <h3>Free Wi-Fi that brings them <span>back.</span></h3>
        <div class="obj" style="min-height:170px">
          <div class="rc"><div style="text-align:center"><b>KAHAWA TAMU</b></div><hr><div style="display:flex;justify-content:space-between"><span>Cappuccino ×2</span><span>560</span></div><div class="wc">TODAY'S WI-FI<b>4821</b></div></div>
          <div class="bubble"><s>SMS to 218 regulars</s>2-for-1 cappuccinos, 3–5pm today ☕</div>
        </div>
        <span class="go" style="color:#B4532A">for Cafés →</span>
      </a>

      <a class="t sch" id="t-sch" href="schools">
        <div class="k">Schools &amp; universities</div>
        <h3>Every student signs in as themselves.</h3>
        <div class="obj">
          <div class="tt">
            <span></span><span class="d">M</span><span class="d">T</span><span class="d">W</span><span class="d">T</span><span class="d">F</span><span class="d">S</span><span class="d">S</span>
            <span class="h">00</span><i class="o"></i><i class="o"></i><i class="o"></i><i class="o"></i><i class="o"></i><i></i><i></i>
            <span class="h">08</span><i class="l"></i><i class="l"></i><i class="l"></i><i class="l"></i><i class="l"></i><i></i><i></i>
            <span class="h">12</span><i class="l"></i><i class="l"></i><i class="l"></i><i class="l"></i><i class="l"></i><i></i><i></i>
            <span class="h">17</span><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
          </div>
          <div class="tleg"><span style="color:#1F3A68">■ Lectures: phones slower</span><span>■ Lights out</span></div>
          <div class="slip"><span>AHU/CS/2024/0412</span><b>482 913</b></div>
        </div>
        <span class="go" style="color:#1F3A68">for Schools →</span>
      </a>

      <a class="t ven" id="t-ven" href="venues">
        <div class="k">Offices, clinics &amp; venues</div>
        <h3>A code for every room, desk and visitor.</h3>
        <div class="obj">
          <div class="fp">
            <div class="w"><b>Open office</b><span>DESK-07 · 7731</span><br><small style="color:#77837E">2 devices each</small></div>
            <div><b>Meeting room</b><span>MEET · 4410</span></div>
            <div><b>Visitors</b><span>GUEST · 9025 ↻</span></div>
          </div>
        </div>
        <span class="go" style="color:#3C6E5A">for Venues →</span>
      </a>
    </div>
  </section>
</div>

<section class="band" id="platform">
  <div class="wrap">
    <div class="secrow">
      <div><div class="eyebrow">The network platform underneath</div><h2 class="disp">Six things every<br>network needs.</h2></div>
      <p>Every edition runs on the same platform. An edition is a starting point, not a cage: a hotel can sell passes, a café can hand out codes, any business can block sites.</p>
    </div>
    <div class="eng">
      <div><span class="n">01 · Routers</span><b>Set up with one paste</b><p>Connected and watched even without a public IP. Health in plain words, and an email when one goes quiet.</p></div>
      <div><span class="n">02 · Access</span><b>Who gets online, and how</b><p>Paid passes, room codes, a free hour, student PINs, desk codes. Each edition starts with the right ones.</p></div>
      <div><span class="n">03 · Control</span><b>Fair limits, on a timetable</b><p>Speed and data per device or kind of device, study hours, lights-out, blocked sites.</p></div>
      <div><span class="n">04 · Money</span><b>M-Pesa, matched</b><p>Payments land on the right person by themselves, with invoices, receipts and books that balance.</p></div>
      <div><span class="n">05 · People</span><b>SMS, WhatsApp and email</b><p>Codes, reminders and offers sent for you. Replies of STOP are respected.</p></div>
      <div><span class="n">06 · Visibility</span><b>Know what’s happening</b><p>Who’s online now, every device, reports in your inbox. Two-step sign-in keeps it yours.</p></div>
    </div>
  </div>
</section>

<div class="wrap">
  <section class="close">
    <h2 class="disp" id="book">Bring your<br>network over<br>this week.</h2>
    <div>
      <div class="steps">
        <div><span class="n">01</span><span>Book a demo, or apply if you are an ISP</span><span class="r">3 min</span></div>
        <div><span class="n">02</span><span>We set up your edition with you on a call</span><span class="r">30 min</span></div>
        <div><span class="n">03</span><span>Paste one line into each router</span><span class="r">live</span></div>
      </div>
      <div class="ctas"><a class="btn ink" href="#book">Book a demo →</a><a class="btn ghost" href="<?= e(whatsapp_url('Hello Speedy Connect, I would like a demo')) ?>">or WhatsApp us</a></div>
    </div>
  </section>
  
</div>
<?php site_footer(); ?>
<script src="assets/site.js"></script>
</body></html>
