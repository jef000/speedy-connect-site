<?php require_once __DIR__ . '/../src/site.php'; page_begin('venues'); ?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><link rel="icon" href="favicon.svg" type="image/svg+xml"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Speedy Connect for Venues</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700;800&family=Geist+Mono:wght@500;600;700&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#EEF1EF;--bg2:#E5EAE7;--card:#FFFFFF;--grid:#EEF1EF;--ink:#1D2421;--sage:#3C6E5A;--sage2:#2E5747;--sagebg:#E3ECE7;
  --mut:#55615C;--soft:#6A7671;--ln:#D5DCD8;--rust:#A4513A;--rustbg:#F4E6E0;--rustln:#E7C7BC;
}
*{box-sizing:border-box;margin:0}
html{scroll-behavior:smooth}
body{background:var(--bg);color:var(--ink);font-family:Geist,system-ui,sans-serif;-webkit-font-smoothing:antialiased;overflow-x:hidden}
a{color:inherit;text-decoration:none}
.mono{font-family:'Geist Mono',ui-monospace,monospace}
.wrap{max-width:1160px;margin:0 auto;padding:0 32px}
.kick{font-size:11.5px;letter-spacing:.16em;text-transform:uppercase;font-weight:700;color:var(--sage)}
h1,h2,h3{font-family:Geist,system-ui,sans-serif;font-weight:800;letter-spacing:-.03em}
.grid{background-color:var(--card);background-image:linear-gradient(var(--grid) 1px,transparent 1px),linear-gradient(90deg,var(--grid) 1px,transparent 1px);background-size:16px 16px}
.ex{display:inline-block;font-size:10px;letter-spacing:.14em;text-transform:uppercase;font-weight:700;color:var(--sage);border:1px solid var(--sage);border-radius:4px;padding:2px 6px;background:#fff}
:focus-visible{outline:2px solid var(--sage);outline-offset:2px}

.crumb{font-size:12.5px;color:var(--mut);padding:18px 0 0}
.crumb b{color:var(--ink);font-weight:600}

/* hero */
.hero{display:grid;grid-template-columns:1fr 1.06fr;gap:52px;align-items:center;padding:40px 0 76px}
.edition{display:inline-flex;align-items:center;gap:10px;border:1px solid var(--ln);background:var(--card);border-radius:6px;padding:5px 12px 5px 5px;font-size:13px;color:var(--mut);flex-wrap:wrap}
.edition b{background:var(--sage);color:#fff;border-radius:4px;padding:3px 9px;font-weight:600;font-size:12px;letter-spacing:.02em}
.hero h1{font-size:58px;line-height:1.02;margin:22px 0 20px;text-wrap:balance}
.hero h1 em{font-style:normal;color:var(--sage)}
.lede{font-size:18px;line-height:1.6;color:var(--mut);max-width:510px}
.ctas{display:flex;gap:18px;align-items:center;margin-top:30px;flex-wrap:wrap}
.btn{height:52px;padding:0 24px;border-radius:6px;background:var(--ink);color:#fff;font-weight:700;font-size:15px;display:inline-flex;align-items:center;gap:10px;letter-spacing:.01em;box-shadow:0 14px 28px -16px rgba(29,36,33,.7);transition:background .15s;border:0;cursor:pointer;font-family:Geist,system-ui,sans-serif}
.btn:hover{background:#000}
.lnk{font-size:15px;color:var(--sage);border-bottom:1px solid currentColor;padding-bottom:2px;font-weight:600}
.wa{display:inline-flex;align-items:center;gap:8px}
.wa svg{width:18px;height:18px}
.trust{display:flex;gap:22px;margin-top:32px;font-size:13px;color:var(--mut);flex-wrap:wrap}
.trust span{display:inline-flex;align-items:center;gap:8px}
.trust span:before{content:"";width:8px;height:8px;border:2px solid var(--sage);border-radius:2px}

.plan{border:1px solid var(--ln);border-radius:12px;padding:16px;box-shadow:0 30px 60px -40px rgba(29,36,33,.55)}
.plan-top{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;margin-bottom:12px}
.vlabel{font-size:12px;font-weight:600;color:var(--mut);margin-right:4px}
.vseg{display:flex;flex-wrap:wrap;align-items:center;gap:4px;background:var(--bg);border:1px solid var(--ln);border-radius:8px;padding:4px}
.vseg button{border:0;background:transparent;font:600 12.5px Geist,system-ui,sans-serif;color:var(--mut);height:32px;padding:0 11px;border-radius:5px;cursor:pointer;transition:background .2s,color .2s}
.vseg button[aria-pressed=true]{background:var(--ink);color:#fff}
.plan-h{display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:10px;font-size:13px}
.plan-h b{font-weight:700}
.plan-h .fl{margin-left:auto;font-size:11px;color:var(--soft)}
.fp{display:grid;grid-template-columns:1.2fr 1fr 1fr;grid-template-rows:minmax(118px,auto) minmax(118px,auto);border:3px solid var(--ink);background:var(--ink);gap:0}
.rmx{border:1.5px solid var(--ink);padding:11px;font-size:11.5px;background:rgba(255,255,255,.9);min-width:0;transition:background .3s}
.rmx .rn{display:block;font-size:12.5px;font-weight:700;line-height:1.25}
.rmx .cd{font-family:'Geist Mono',ui-monospace,monospace;color:var(--sage);font-weight:700;font-size:13px;margin-top:5px;display:block;overflow-wrap:anywhere}
.rmx small{color:var(--mut);display:block;margin-top:3px;font-size:11px;line-height:1.4}
.rmx.wide{grid-row:span 2;display:flex;flex-direction:column}
.rmx.wide .sub{margin-top:auto;padding-top:14px;border-top:1px dashed var(--ln)}
.rmx.wide .sub .cd{font-size:20px}
.rmx.all{background:rgba(255,255,255,.6)}
.rmx.all .rn{color:var(--mut)}
.rmx.flash{background:var(--sagebg)}
.plan-cap{font-size:12px;color:var(--mut);margin-top:10px;line-height:1.5}

/* sections */
.sec{padding:96px 0}
.sec.alt{background:var(--bg2)}
.head{display:flex;justify-content:space-between;align-items:flex-end;gap:48px;flex-wrap:wrap}
.head h2{font-size:46px;line-height:1.05;margin-top:12px;max-width:660px;text-wrap:balance}
.head p{max-width:380px;color:var(--mut);font-size:15.5px;line-height:1.6}

.switch{display:inline-flex;flex-wrap:wrap;background:var(--card);border:1px solid var(--ln);border-radius:8px;padding:5px;margin-top:34px;box-shadow:0 10px 26px -18px rgba(29,36,33,.5)}
.switch button{border:0;background:transparent;font:700 15px Geist,system-ui,sans-serif;color:var(--mut);height:46px;padding:0 20px;border-radius:5px;cursor:pointer;transition:all .25s}
.switch button[aria-pressed=true]{background:var(--rust);color:#fff}
.switch button.w[aria-pressed=true]{background:var(--sage)}
.hint{font-size:13px;color:var(--mut);margin:12px 0 0 6px}
.scenes{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-top:30px}
.sc{background:var(--card);border:1px solid var(--ln);border-radius:12px;overflow:hidden;display:grid;grid-template-rows:auto 1fr;transition:border-color .4s,box-shadow .4s;min-width:0}
.sc.wide{grid-column:span 2;grid-template-columns:1fr 1.25fr;grid-template-rows:none}
.sc .txt{padding:24px 26px 6px}
.sc.wide .txt{padding:28px}
.sc .lim{display:flex;align-items:center;gap:8px;font-size:11px;letter-spacing:.14em;text-transform:uppercase;font-weight:700}
.lim .dot{width:8px;height:8px;border-radius:2px;background:var(--rust);transition:background .4s}
.sc h3{font-size:23px;line-height:1.15;margin-top:10px}
.sc p{font-size:14.5px;color:var(--mut);line-height:1.55;margin-top:8px}
.sc p.fine{font-size:12.5px;margin-top:10px}
.sc .vis{display:grid;min-height:220px;margin:14px 18px 18px;border-radius:10px;border:1px solid var(--ln);overflow:hidden}
.sc.wide .vis{margin:18px;min-height:240px}
.st{grid-area:1/1;padding:18px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;transition:opacity .45s ease,transform .45s ease,visibility .45s;min-width:0}
.st.after{opacity:0;transform:translateY(10px);visibility:hidden}
.fixed .st.before{opacity:0;transform:translateY(-10px);visibility:hidden}
.fixed .st.after{opacity:1;transform:none;visibility:visible}
.t-after{display:none}
.fixed .t-before{display:none}.fixed .t-after{display:block}
.fixed .lim .t-after{display:inline}
.fixed .lim .dot{background:var(--sage)}
.fixed .sc{border-color:#BFD0C6;box-shadow:0 20px 40px -32px rgba(60,110,90,.6)}
.lim .lb{color:var(--rust)}.fixed .lim .lb{color:var(--sage)}

.tag{font-size:11.5px;border-radius:6px;padding:6px 9px;line-height:1.35;background:#fff;align-self:flex-end;max-width:100%}
.tag.warn{border:1px solid var(--rustln);color:var(--rust)}
.tag.ok{border:1px solid #BFD0C6;color:var(--sage)}

.mini{display:grid;grid-template-columns:1fr 1fr;border:2.5px solid var(--ink);background:var(--ink);width:100%;max-width:340px}
.mini div{border:1.25px solid var(--ink);background:#fff;padding:9px 10px;font-size:11px;min-width:0}
.mini b{display:block;font-size:11.5px}
.mini .cd{display:block;font-family:'Geist Mono',ui-monospace,monospace;font-weight:700;font-size:12px;margin-top:3px;overflow-wrap:anywhere}
.mini.bad .cd{color:var(--rust)}
.mini.good .cd{color:var(--sage)}
.mini small{display:block;color:var(--mut);font-size:10.5px;margin-top:2px}

.list{width:100%;max-width:340px;background:#fff;border:1px solid var(--ln);border-radius:10px;padding:12px 14px;font-size:12.5px}
.list .nm{font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--soft);font-weight:700;margin-bottom:6px}
.list .row{display:flex;justify-content:space-between;gap:10px;padding:7px 0;border-top:1px solid #EDF0EE}
.list .row:first-of-type{border-top:0}
.list .r{color:var(--rust);font-weight:600;white-space:nowrap}
.list .g{color:var(--sage);font-weight:600;white-space:nowrap}
.list .ft{border-top:1px solid var(--ln);margin-top:4px;padding-top:8px;font-size:11.5px;color:var(--mut)}

.codecard{width:100%;max-width:300px;background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;font-size:12.5px}
.codecard .top{display:flex;justify-content:space-between;align-items:baseline;gap:8px}
.codecard .top b{font-size:18px;font-weight:800;letter-spacing:-.02em}
.codecard .swap{display:flex;align-items:center;gap:10px;margin:10px 0;font-family:'Geist Mono',ui-monospace,monospace;font-size:20px;font-weight:700;flex-wrap:wrap}
.codecard .swap s{color:var(--soft);font-weight:500}
.codecard .swap span{color:var(--sage)}
.codecard .acts{display:flex;gap:6px;margin-bottom:8px;flex-wrap:wrap}
.codecard .acts span{border:1px solid var(--ln);border-radius:5px;padding:4px 9px;font-size:11.5px;font-weight:600}
.codecard .acts .on{background:var(--sage);border-color:var(--sage);color:#fff}
.codecard .row{display:flex;justify-content:space-between;gap:8px;padding:5px 0;border-top:1px solid #EDF0EE;font-size:12px}

.bw{width:100%;max-width:380px}
.bw .lbl{display:flex;justify-content:space-between;gap:8px;font-size:11.5px;color:var(--mut);margin-bottom:6px}
.bar{height:26px;border-radius:5px;background:#E3E8E5;overflow:hidden;display:flex;border:1px solid var(--ln)}
.bar i{display:block;height:100%}
.legend{display:flex;gap:12px;font-size:11px;color:var(--mut);margin-top:8px;flex-wrap:wrap}
.legend span:before{content:"";display:inline-block;width:9px;height:9px;border-radius:2px;margin-right:5px;background:var(--c);vertical-align:-1px}
.complaint{margin-top:12px;background:#fff;border-radius:10px 10px 10px 3px;padding:8px 11px;font-size:12.5px;border:1px solid var(--ln);display:inline-block}
.complaint s{text-decoration:none;color:var(--soft);font-size:10.5px;display:block}

.two{display:grid;grid-template-columns:.9fr 1.1fr;gap:16px;width:100%;align-items:center}
.ecard{background:#fff;border:1.5px dashed var(--ink);border-radius:4px;padding:14px;font-size:12px;text-align:center}
.ecard .ev{font-size:16px;font-weight:800;letter-spacing:-.02em}
.ecard .where{font-size:10px;letter-spacing:.14em;text-transform:uppercase;color:var(--sage);font-weight:700;margin-top:3px}
.ecard .lab{font-size:10px;letter-spacing:.14em;color:var(--soft);margin-top:12px}
.ecard .big{font-family:'Geist Mono',ui-monospace,monospace;font-size:24px;font-weight:700;margin:2px 0 8px}
.ecard small{display:block;color:var(--mut);line-height:1.5}

/* watch a day */
.day{display:grid;grid-template-columns:.9fr 1.1fr;gap:56px;margin-top:48px;align-items:start}
.step{display:grid;grid-template-columns:64px 1fr;gap:14px;padding:18px 6px;border-top:1px solid var(--ln);cursor:pointer;opacity:.5;transition:opacity .3s;border-radius:4px}
.step:last-child{border-bottom:1px solid var(--ln)}
.step.on,.step:hover{opacity:1}
.step .t{font-family:'Geist Mono',ui-monospace,monospace;color:var(--sage);font-size:14px;font-weight:600;padding-top:4px}
.step b{font-weight:800;letter-spacing:-.02em;font-size:19px;display:block}
.step p{font-size:14px;color:var(--mut);margin-top:4px;line-height:1.5}
.step .prog{grid-column:2;height:2px;background:var(--ln);margin-top:12px;border-radius:2px;overflow:hidden;display:none}
.step.on .prog{display:block}
.step .prog i{display:block;height:100%;background:var(--sage);width:0}
.step.on .prog i{animation:prog 4.5s linear forwards}
.paused .step.on .prog i{animation-play-state:paused}
@keyframes prog{to{width:100%}}
.dctl{display:flex;gap:10px;margin-top:16px;font-size:13px;color:var(--mut);align-items:center;flex-wrap:wrap}
.dctl button{border:1px solid var(--ln);background:var(--card);border-radius:6px;height:34px;padding:0 14px;font:600 13px Geist,system-ui,sans-serif;cursor:pointer;color:var(--ink)}
.dstage{position:sticky;top:132px;border:1px solid var(--ln);border-radius:14px;padding:20px;box-shadow:0 30px 60px -44px rgba(29,36,33,.6)}
.dstage .dtop{display:flex;align-items:center;gap:10px;margin-bottom:12px;font-size:12.5px;color:var(--mut);flex-wrap:wrap}
.dstage .bar2{display:grid;grid-template-columns:200px 1fr;gap:18px;font-size:12px;color:var(--mut);margin-bottom:12px;font-weight:600}
.frame{display:grid}
.fr{grid-area:1/1;opacity:0;transform:translateY(8px);transition:opacity .45s,transform .45s,visibility .45s;display:grid;grid-template-columns:200px 1fr;gap:18px;align-items:center;visibility:hidden;min-width:0}
.fr.on{opacity:1;transform:none;visibility:visible}
.phone{width:200px;height:360px;border:8px solid #161B19;border-radius:30px;background:#fff;padding:22px 14px;position:relative;font-size:12px;overflow:hidden}
.phone:before{content:"";position:absolute;top:6px;left:50%;transform:translateX(-50%);width:60px;height:6px;border-radius:9px;background:#161B19}
.ph-h{font-weight:800;font-size:16px;color:var(--sage);letter-spacing:.12em;text-align:center;margin-top:8px}
.ph-s{text-align:center;color:var(--soft);font-size:10.5px;margin-top:3px}
.fld{border:1px solid var(--ln);border-radius:6px;padding:10px;margin-top:12px;color:var(--soft);font-size:12px}
.fld.typed{color:var(--ink);font-family:'Geist Mono',ui-monospace,monospace;font-weight:600;letter-spacing:.06em}
.go{background:var(--ink);color:#fff;text-align:center;border-radius:6px;padding:11px;font-weight:700;margin-top:12px}
.go.mp{background:var(--sage)}
.pnote{text-align:center;color:var(--soft);font-size:10.5px;margin-top:12px;line-height:1.45}
.pnote.r{color:var(--rust)}
.okscreen{text-align:center;margin-top:36px}
.okscreen .ck{width:52px;height:52px;border-radius:50%;background:var(--sagebg);color:var(--sage);display:grid;place-items:center;margin:0 auto 12px;font-size:22px;font-weight:700}
.okscreen p{color:var(--soft);font-size:11px;margin-top:6px;line-height:1.45}
.call{margin-top:18px;border-radius:12px;background:#1D2421;color:#fff;padding:16px 12px;text-align:center}
.call .av{display:flex;justify-content:center;gap:8px;margin:12px 0}
.call .av i{width:40px;height:40px;border-radius:50%;background:#3C6E5A;display:block}
.call .av i+i{background:#55615C}
.call small{display:block;opacity:.7;font-size:10.5px}
.con{background:#fff;border:1px solid var(--ln);border-radius:10px;padding:16px;font-size:12.5px;min-width:0}
.con .nm{font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--sage);font-weight:700}
.con .big{font-size:24px;font-weight:800;letter-spacing:-.02em;margin:6px 0 10px}
.con .row{display:flex;justify-content:space-between;gap:8px;padding:7px 0;border-top:1px solid #EDF0EE}
.con .ev{margin-top:10px;background:var(--bg);border-radius:6px;padding:9px 10px;border-left:3px solid var(--sage);font-size:12px;line-height:1.45}
.con s{color:var(--soft)}
.g{color:var(--sage);font-weight:600}

/* pillars */
.pillars{display:grid;grid-template-columns:repeat(3,1fr);margin-top:48px;border-top:1px solid var(--ln)}
.pl{padding:28px 28px 28px 0;border-bottom:1px solid var(--ln)}
.pl:not(:nth-child(3n)){border-right:1px solid var(--ln);margin-right:28px}
.pl .n{display:flex;align-items:center;gap:8px;font-size:11.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--mut);font-weight:700}
.pl .n i{font-style:normal;font-family:'Geist Mono',ui-monospace,monospace;color:var(--sage);letter-spacing:0}
.pl b{font-weight:800;letter-spacing:-.02em;font-size:19px;display:block;margin:10px 0 6px;line-height:1.25}
.pl p{font-size:14px;color:var(--mut);line-height:1.55}

/* getting started + faq */
.start{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-top:44px}
.sp{border:1px solid var(--ln);border-radius:12px;padding:22px}
.sp .n{width:34px;height:34px;border-radius:6px;border:1.5px solid var(--ink);display:grid;place-items:center;font-family:'Geist Mono',ui-monospace,monospace;font-weight:700;font-size:15px;background:#fff}
.sp b{display:block;font-weight:800;letter-spacing:-.02em;font-size:18px;margin:14px 0 6px}
.sp p{font-size:13.5px;color:var(--mut);line-height:1.5}
.sp .when{margin-top:12px;font-size:12px;color:var(--sage);font-family:'Geist Mono',ui-monospace,monospace;font-weight:600}
.faq{margin-top:40px;border-top:1px solid var(--ln)}
details{border-bottom:1px solid var(--ln);padding:20px 0}
summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:16px;font-weight:700;font-size:19px;letter-spacing:-.01em}
summary::-webkit-details-marker{display:none}
summary:after{content:"+";color:var(--sage);font-size:22px;transition:transform .2s;flex:none}
details[open] summary:after{transform:rotate(45deg)}
details p{color:var(--mut);font-size:15px;line-height:1.6;margin-top:10px;max-width:720px}

/* book */
.book{background-color:var(--ink);background-image:linear-gradient(rgba(255,255,255,.04) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.04) 1px,transparent 1px);background-size:16px 16px;color:#fff;border-radius:16px;padding:56px;display:grid;grid-template-columns:1fr 1fr;gap:56px;margin-top:24px}
.book h2{font-size:42px;line-height:1.06;color:#fff;margin-top:12px}
.book .lede{color:rgba(255,255,255,.72);margin-top:16px}
.book ul{list-style:none;padding:0;margin-top:26px;font-size:14.5px;color:rgba(255,255,255,.82)}
.book li{padding:7px 0;display:flex;gap:10px;align-items:center}
.book li:before{content:"";width:8px;height:8px;border:2px solid #9CC3B1;border-radius:2px;flex:none}
form{background:var(--card);color:var(--ink);border-radius:12px;padding:26px;min-width:0}
form .ttl{font-size:21px;font-weight:800;letter-spacing:-.02em}
form label,form .glbl{display:block;font-size:12.5px;font-weight:600;margin:14px 0 6px;color:var(--mut)}
form input{width:100%;height:46px;border:1px solid var(--ln);border-radius:6px;padding:0 12px;font:15px Geist,system-ui,sans-serif;background:#fff;color:var(--ink)}
form input:focus{outline:2px solid var(--sage);outline-offset:1px;border-color:var(--sage)}
.seg{display:flex;gap:6px;flex-wrap:wrap}
.seg button{border:1px solid var(--ln);background:#fff;border-radius:6px;height:38px;padding:0 13px;font:500 13.5px Geist,system-ui,sans-serif;cursor:pointer;color:var(--ink)}
.seg button[aria-pressed=true]{background:var(--sage);border-color:var(--sage);color:#fff}
form .submit{width:100%;justify-content:center;margin-top:20px}
form .or{text-align:center;font-size:13px;color:var(--mut);margin-top:12px}
form .or a{color:var(--sage);font-weight:700}
.done{display:none;text-align:center;padding:40px 10px}
.sent .fields{display:none}.sent .done{display:block}
.done .ck{width:58px;height:58px;border-radius:50%;background:var(--sagebg);color:var(--sage);display:grid;place-items:center;margin:0 auto 14px;font-size:24px;font-weight:700}
.done .ttl:focus{outline:none}

@media (max-width:900px){
  .wrap{padding:0 16px}
  .hero,.day,.book{grid-template-columns:1fr}.hero{gap:36px}.hero h1{font-size:44px}
  .scenes{grid-template-columns:1fr}.sc.wide{grid-column:auto;grid-template-columns:1fr}
  .head h2{font-size:34px}.pillars,.start{grid-template-columns:1fr}.pl{margin-right:0!important;border-right:0!important;padding-right:0}
  .dstage{position:relative;top:0}.fr,.dstage .bar2{grid-template-columns:1fr}.phone,.dstage .bar2 span:first-child{display:none}
  .book{padding:28px 20px}.book h2{font-size:32px}.two{grid-template-columns:1fr}
  .sec{padding:72px 0}
}
@media (max-width:560px){
  .hero h1{font-size:38px}
  .fp{grid-template-columns:1fr 1fr;grid-template-rows:auto}
  .rmx.wide{grid-row:auto;grid-column:span 2}
  .rmx.all{grid-column:span 2}
  .plan{padding:12px}
  .sc .txt,.sc.wide .txt{padding:20px 18px 4px}
  .sc .vis,.sc.wide .vis{margin:12px}
  .switch{display:flex}.switch button{flex:1;padding:0 12px;font-size:14px}
  form{padding:20px 16px}
}
@media (prefers-reduced-motion:reduce){html{scroll-behavior:auto}*{animation:none!important;transition:none!important}}
</style><link rel="stylesheet" href="assets/chrome.css">
</head>
<body data-edition="venues">

<?php site_header('venues'); ?>

<main>
<div class="wrap">
  <div class="crumb">Editions / <b>Speedy Connect for Venues</b></div>
  <section class="hero" aria-labelledby="h1">
    <div>
      <span class="edition"><b>for Venues</b> offices · clinics · churches · events</span>
      <h1 id="h1">A code for every room, desk and <em>visitor.</em></h1>
      <p class="lede">Give each place its own Wi-Fi code. Decide how many devices it allows and how fast they go. When someone leaves, change their code with one click. TVs and big downloads don't slow everyone else down.</p>
      <div class="ctas">
        <a class="btn" href="#book">Book a demo</a>
        <a class="lnk wa" href="<?= e(whatsapp_url('Hello Speedy Connect, I would like a demo')) ?>"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Zm5.3 14.1c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .1-3.3-.8-2.8-1.1-4.5-3.9-4.7-4.1-.1-.2-1.1-1.5-1.1-2.8s.7-2 1-2.3c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.8 2c.1.2.1.4 0 .5l-.4.6-.4.4c-.1.2-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.3 2.4 1.5.3.1.5.1.6-.1l.9-1c.2-.3.4-.2.6-.1l1.9.9c.3.1.5.2.5.3.1.2.1.7-.2 1.4Z"/></svg>Ask us on WhatsApp</a>
      </div>
      <div class="trust"><span>Works with your MikroTik</span><span>Set up with us on a call</span><span>Live the same day</span></div>
    </div>

    <div class="plan grid">
      <div class="plan-top">
        <div class="vseg" role="group" aria-label="Your venue">
          <span class="vlabel" aria-hidden="true">Your venue</span>
          <button type="button" aria-pressed="true" data-v="office">Office</button>
          <button type="button" aria-pressed="false" data-v="clinic">Clinic</button>
          <button type="button" aria-pressed="false" data-v="church">Church</button>
          <button type="button" aria-pressed="false" data-v="event">Event venue</button>
        </div>
      </div>
      <div class="plan-h"><span class="ex">An example</span><b id="planT">Bidii Co-working · Kilimani</b><span class="fl mono" id="planF">Floor 2</span></div>
      <div class="fp" id="fp">
        <div class="rmx wide" id="rm1"><span class="rn" id="r1n">Open office · 12 desks</span><span class="cd" id="r1c">DESK-07 · 7731</span><small id="r1r">2 devices per desk · 20 Mbps</small>
          <div class="sub"><span class="rn">Online now</span><span class="cd" id="r1o">22 devices</span><small>across every code</small></div></div>
        <div class="rmx" id="rm2"><span class="rn" id="r2n">Meeting room</span><span class="cd" id="r2c">MEET · 4410</span><small id="r2r">Board meeting · until 17:00</small></div>
        <div class="rmx" id="rm3"><span class="rn" id="r3n">Reception TV</span><span class="cd" id="r3c">TV · 4 Mbps</span><small id="r3r">Slowed by kind of device</small></div>
        <div class="rmx" id="rm4"><span class="rn" id="r4n">Visitors</span><span class="cd" id="r4c">GUEST · 9025</span><small id="r4r">until Friday · New code ↻</small></div>
        <div class="rmx all"><span class="rn">Everywhere else</span><small>The same Wi-Fi in every room. The code decides the rules.</small></div>
      </div>
      <p class="plan-cap" id="planCap" aria-live="polite">Showing an example office. Codes are named after your places and work anywhere on your Wi-Fi.</p>
    </div>
  </section>
</div>

<section class="sec alt" id="limits" aria-labelledby="h-lim">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">Sound familiar?</div><h2 id="h-lim">Five things venue Wi-Fi gets wrong, and what changes.</h2></div>
      <p>Most venues live with at least one of these. Flip the switch to see each one fixed.</p>
    </div>
    <div class="switch" role="group" aria-label="Compare your venue today with Speedy Connect">
      <button type="button" class="b" aria-pressed="true" data-mode="today">Your venue today</button>
      <button type="button" class="w" aria-pressed="false" data-mode="with">With Speedy Connect</button>
    </div>
    <p class="hint" id="hint" aria-live="polite">You're looking at today. Try the switch.</p>

    <div class="scenes" id="scenes">
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">One password for all</span><span class="lb t-after">A code per place</span></div>
          <h3 class="t-before">Staff, visitors and people who left, all on one password.</h3>
          <h3 class="t-after">Staff, visitors and each room or desk get their own code.</h3>
          <p class="t-before">The password has been on the wall for two years. People who left are still connected, and nobody can tell who is who.</p>
          <p class="t-after">One code for staff. A visitor code that ends when you say. A code for each room or desk if you want one. Each code sets how many devices it allows.</p>
        </div>
        <div class="vis grid">
          <div class="st before"><div class="mini bad"><div><b>Staff</b><span class="cd">bidii2023</span></div><div><b>Visitors</b><span class="cd">bidii2023</span></div><div><b>Desk 07</b><span class="cd">bidii2023</span></div><div><b>Meeting room</b><span class="cd">bidii2023</span></div></div><span class="tag warn">Who's on it? Nobody knows.</span></div>
          <div class="st after"><div class="mini good"><div><b>Staff</b><span class="cd">BIDII-STAFF</span><small>up to 40 devices</small></div><div><b>Visitors</b><span class="cd">GUEST · 9025</span><small>until Friday</small></div><div><b>Desk 07</b><span class="cd">7731</span><small>2 devices</small></div><div><b>Meeting room</b><span class="cd">MEET · 4410</span><small>until 17:00</small></div></div><span class="tag ok">Every device belongs to a code</span></div>
        </div>
      </article>

      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">Change it for everyone</span><span class="lb t-after">New code, one place</span></div>
          <h3 class="t-before">Someone leaves, so the whole building reconnects.</h3>
          <h3 class="t-after">Change one code. Everyone else carries on.</h3>
          <p class="t-before">To lock out one person, you change the password, then type the new one into every laptop, phone, printer and TV in the building.</p>
          <p class="t-after">Press <b>New code</b> on that one desk or room. Everyone on the old code is signed off, and every other code keeps working. Or pause a code for a while.</p>
        </div>
        <div class="vis grid">
          <div class="st before"><div class="list"><div class="nm">After changing the password</div><div class="row"><span>Staff laptops and phones</span><span class="r">22 to redo</span></div><div class="row"><span>Meeting room screen</span><span class="r">to redo</span></div><div class="row"><span>Reception TV</span><span class="r">to redo</span></div><div class="row"><span>Printer</span><span class="r">to redo</span></div><div class="ft">Members on leave will call when they're back.</div></div><span class="tag warn">A morning lost, for one person</span></div>
          <div class="st after"><div class="codecard"><div class="top"><b>Desk 07</b><span class="mono" style="font-size:11px;color:var(--soft)">2 devices</span></div><div class="swap"><s>7731</s><span aria-hidden="true">→</span><span>2958</span></div><div class="acts"><span class="on">New code ↻</span><span>Pause</span><span>Print card</span></div><div class="row"><span>Old code</span><span class="g">2 devices signed off</span></div><div class="row"><span>Other desks</span><span>untouched</span></div></div></div>
        </div>
      </article>

      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">One device takes it all</span><span class="lb t-after">Limits by kind of device</span></div>
          <h3 class="t-before">The waiting-room TV, or one big download, slows everyone.</h3>
          <h3 class="t-after">TVs and big downloads get a fair share, not all of it.</h3>
          <p class="t-before">One screen streams all day, or one laptop pulls a huge update, and the whole office waits.</p>
          <p class="t-after">Set a speed by kind of device, like TVs at 4 Mbps, and a daily data amount per device. See each device's maker, kind and data used.</p>
        </div>
        <div class="vis grid">
          <div class="st before"><div class="bw"><div class="lbl"><span>Your internet line · 10:30</span><span class="mono" style="color:var(--rust)">96% used</span></div><div class="bar"><i style="width:62%;background:#A4513A"></i><i style="width:34%;background:#C9A397"></i></div><div class="legend"><span style="--c:#A4513A">Waiting-room TV</span><span style="--c:#C9A397">Everyone else</span></div><div class="complaint"><s>Desk 04 · 10:34</s>"My call keeps freezing."</div></div></div>
          <div class="st after"><div class="list"><div class="nm">Devices · today</div><div class="row"><span>Samsung · TV</span><span class="mono">4 Mbps · 1.1 GB</span></div><div class="row"><span>HP · laptop</span><span class="mono">20 Mbps · 640 MB</span></div><div class="row"><span>Tecno · phone</span><span class="mono">10 Mbps · 210 MB</span></div><div class="row"><span>Apple · tablet</span><span class="mono">10 Mbps · 95 MB</span></div><div class="ft">Daily data: 3 GB per device</div></div></div>
        </div>
      </article>

      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">Any site opens</span><span class="lb t-after">Blocked sites</span></div>
          <h3 class="t-before">Anything opens on the church, clinic or office Wi-Fi.</h3>
          <h3 class="t-after">Betting and adult sites are closed on every router.</h3>
          <p class="t-before">Betting sites, adult sites and scam pages all open on your network, under your name.</p>
          <p class="t-after">Betting and adult sites are closed on every router at once, with a family-safe filter behind them.</p>
          <p class="fine t-after">Honest note: a VPN can still get around it.</p>
        </div>
        <div class="vis grid">
          <div class="st before"><div class="list"><div class="nm">On your Wi-Fi today</div><div class="row"><span>Betting sites</span><span class="r">open</span></div><div class="row"><span>Adult sites</span><span class="r">open</span></div></div></div>
          <div class="st after"><div class="list"><div class="nm">Blocked sites</div><div class="row"><span>Betting sites</span><span class="g">closed</span></div><div class="row"><span>Adult sites</span><span class="g">closed</span></div><div class="ft">Set on every router</div></div></div>
        </div>
      </article>

      <article class="sc wide">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">The big day</span><span class="lb t-after">An event code</span></div>
          <h3 class="t-before">Sunday service, a wedding or a conference brings 300 phones at once.</h3>
          <h3 class="t-after">The event gets its own code, its own device count and an end date.</h3>
          <p class="t-before">Everyone shares one password, the line fills up, and the office can't even send an email.</p>
          <p class="t-after">Make an event code for up to 300 devices that stops on its end date, and print it on a card for the tables. Each device gets a fair limit, so staff keep working. Want to charge instead? Sell day passes by M-Pesa, like a co-working day pass.</p>
        </div>
        <div class="vis grid">
          <div class="st before"><div class="bw"><div class="lbl"><span>Your internet line · Saturday 15:00</span><span class="mono" style="color:var(--rust)">100% used</span></div><div class="bar"><i style="width:100%;background:#A4513A"></i></div><div class="legend"><span style="--c:#A4513A">Everyone on one password</span></div><div class="complaint"><s>Office · 15:04</s>"Nothing is loading."</div></div></div>
          <div class="st after"><div class="two"><div class="ecard"><div class="ev">Wedding</div><div class="where">Main hall · Saturday</div><div class="lab">WI-FI CODE</div><div class="big">WED 5530</div><small>Up to 300 devices<br>Ends Sat 23:59</small></div><div class="bw"><div class="lbl"><span>Your internet line · 15:00</span><span class="mono" style="color:var(--sage)">shared fairly</span></div><div class="bar"><i style="width:58%;background:#3C6E5A"></i><i style="width:16%;background:#1D2421"></i><i style="width:10%;background:#9CC3B1"></i></div><div class="legend"><span style="--c:#3C6E5A">Event code · 3 Mbps each</span><span style="--c:#1D2421">Staff</span><span style="--c:#9CC3B1">Day passes</span></div><div class="complaint" style="border-color:#BFD0C6"><s>Office · 15:04</s>Email sent.</div></div></div></div>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="sec" id="day" aria-labelledby="h-day">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">An example: a Wednesday at Bidii Co-working</div><h2 id="h-day">Watch a day run itself.</h2></div>
      <p>A co-working space in Kilimani with members, visitors and a TV at reception. Nobody retypes a password all day.</p>
    </div>
    <div class="day" id="dayw">
      <div>
        <div class="steps" id="steps">
          <div class="step on" role="button" tabindex="0" aria-pressed="true"><span class="t">08:00</span><div><b>Staff arrive</b><p>Laptops and phones join on the staff code. 22 devices are online before the first meeting.</p></div><div class="prog"><i></i></div></div>
          <div class="step" role="button" tabindex="0" aria-pressed="false"><span class="t">09:30</span><div><b>A visitor at reception</b><p>Reception points to the card on the desk. The guest code gives each device an hour.</p></div><div class="prog"><i></i></div></div>
          <div class="step" role="button" tabindex="0" aria-pressed="false"><span class="t">11:00</span><div><b>A member leaves</b><p>Reception presses New code on Desk 07. The member's two devices are signed off. The other desks don't notice.</p></div><div class="prog"><i></i></div></div>
          <div class="step" role="button" tabindex="0" aria-pressed="false"><span class="t">13:00</span><div><b>The TV holds back</b><p>The reception TV plays the news at 4 Mbps, by itself. Calls at the desks stay smooth.</p></div><div class="prog"><i></i></div></div>
          <div class="step" role="button" tabindex="0" aria-pressed="false"><span class="t">17:45</span><div><b>A day pass by M-Pesa</b><p>A freelancer buys a day pass on her phone and gets online. It shows up in Payments.</p></div><div class="prog"><i></i></div></div>
        </div>
        <div class="dctl"><button type="button" id="pp">❚❚ Pause</button><span>or pick any moment</span></div>
      </div>
      <div class="dstage grid" aria-live="polite">
        <div class="dtop"><span class="ex">An example</span><span>Bidii Co-working, Kilimani</span></div>
        <div class="bar2"><span>What a member or visitor sees</span><span>What your staff see</span></div>
        <div class="frame">
          <div class="fr on">
            <div class="phone"><div class="ph-h">BIDII</div><div class="ph-s">Wi-Fi · Kilimani</div><div class="okscreen"><div class="ck">✓</div><b style="font-size:14px">You're online</b><p>Staff Wi-Fi<br>anywhere in the building</p></div></div>
            <div class="con"><div class="nm">Codes · staff</div><div class="big">Staff</div><div class="row"><span>Code</span><span class="mono">BIDII-STAFF</span></div><div class="row"><span>Devices</span><span>up to 40</span></div><div class="row"><span>Ends</span><span>never</span></div><div class="row"><span>Online now</span><span class="mono g">22</span></div><div class="ev">Staff devices joined between 07:40 and 08:00</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-h">BIDII</div><div class="ph-s">Wi-Fi · Kilimani</div><div class="fld">Your Wi-Fi code</div><div class="fld typed">GUEST 9025</div><div class="go">Get online</div><p class="pnote">Visitor Wi-Fi · until Friday</p></div>
            <div class="con"><div class="nm">Codes · visitors</div><div class="big">Visitors</div><div class="row"><span>Code</span><span class="mono">GUEST · 9025</span></div><div class="row"><span>Ends</span><span>Friday 18:00</span></div><div class="row"><span>Speed</span><span>10 Mbps</span></div><div class="row"><span>Online now</span><span class="mono g">3</span></div><div class="ev">Printed on the card at reception</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-h">BIDII</div><div class="ph-s">Wi-Fi · Kilimani</div><div class="fld">Your Wi-Fi code</div><div class="go">Get online</div><p class="pnote">Ready for the next member</p></div>
            <div class="con"><div class="nm">Places · desks</div><div class="big">Desk 07</div><div class="row"><span>Old code</span><span class="mono"><s>7731</s></span></div><div class="row"><span>New code</span><span class="mono g">2958</span></div><div class="row"><span>Signed off</span><span class="g">2 devices</span></div><div class="row"><span>Other desks</span><span>untouched</span></div><div class="ev">New code pressed at reception · 11:00</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-s" style="margin-top:6px">Video call · Desk 04</div><div class="call"><small>13:02 · connected</small><div class="av"><i></i><i></i></div><b style="font-size:12px">Weekly sales call</b><small style="margin-top:4px">Clear picture</small></div></div>
            <div class="con"><div class="nm">Devices · now</div><div class="big">Reception TV</div><div class="row"><span>Maker · kind</span><span>Samsung · TV</span></div><div class="row"><span>Speed</span><span class="mono">4 Mbps</span></div><div class="row"><span>Data today</span><span class="mono">1.1 GB</span></div><div class="row"><span>Rule</span><span>TVs at 4 Mbps</span></div><div class="ev">Held by the TV rule. Nobody touched it.</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-h">BIDII</div><div class="ph-s">Wi-Fi · Kilimani</div><div class="okscreen" style="margin-top:28px"><div class="ck">✓</div><b style="font-size:14px">You're online</b><p>Day pass until 23:59<br>paid by M-Pesa</p></div></div>
            <div class="con"><div class="nm">Payments · today</div><div class="big">Day pass</div><div class="row"><span>Amount</span><span class="mono">KES 500</span></div><div class="row"><span>Paid by</span><span class="mono">M-Pesa · 0712 ··· 678</span></div><div class="row"><span>Devices</span><span>up to 2</span></div><div class="row"><span>Ends</span><span>today, 23:59</span></div><div class="ev">Paid 17:45 · online at 17:46</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="sec alt" aria-labelledby="h-net">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">The network underneath</div><h2 id="h-net">The same Speedy Connect, set up for how a venue runs.</h2></div>
      <p>Every edition shares one network platform. Here's what each part does for an office, clinic, church or event venue.</p>
    </div>
    <div class="pillars">
      <div class="pl"><span class="n"><i>01</i> Routers</span><b>One paste, and the router is yours to run.</b><p>Paste one line into your MikroTik. You get an email if it goes quiet. More than one site? Group your routers by location.</p></div>
      <div class="pl"><span class="n"><i>02</i> Access</span><b>A code for each room, desk and visitor.</b><p>Each code has its own number of devices and an end date, or none.</p></div>
      <div class="pl"><span class="n"><i>03</i> Control</span><b>Fair limits by kind of device.</b><p>Speed and daily data per device or per kind, like TVs, phones and laptops. Blocked sites on every router.</p></div>
      <div class="pl"><span class="n"><i>04</i> Money</span><b>Day passes by M-Pesa, only if you want them.</b><p>Free codes stay free. If you sell a co-working day pass, people pay on their own phone.</p></div>
      <div class="pl"><span class="n"><i>05</i> People</span><b>Codes and notices by SMS or email.</b><p>Send a code to one person, or a notice to everyone. Staff get roles that match their job, and two-step sign-in.</p></div>
      <div class="pl"><span class="n"><i>06</i> Visibility</span><b>Who's online, device by device.</b><p>See each device's maker, kind and data used, sign one off, and read a monthly report of how the Wi-Fi was used.</p></div>
    </div>
  </div>
</section>

<section class="sec" aria-labelledby="h-start">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">Getting started</div><h2 id="h-start">Live the same day you decide.</h2></div>
      <p>You keep your router and your access points. We set up the rest with you on a call.</p>
    </div>
    <div class="start">
      <div class="sp grid"><span class="n">1</span><b>A call with us</b><p>We look at your rooms, desks and router together.</p><div class="when">30 minutes</div></div>
      <div class="sp grid"><span class="n">2</span><b>Name your places</b><p>Rooms, desks, the hall, visitors. Each gets a code and a rule.</p><div class="when">an hour</div></div>
      <div class="sp grid"><span class="n">3</span><b>Connect your router</b><p>Paste one line into your MikroTik. That's the whole install.</p><div class="when">minutes</div></div>
      <div class="sp grid"><span class="n">4</span><b>Print the code cards</b><p>Put them on desks, in rooms and at reception. People are online.</p><div class="when">same day</div></div>
    </div>
    <div class="faq">
      <details open><summary>Do visitors have to give their details?</summary><p>No. A code is enough. You decide how long it lasts and how many devices it allows, and you can change it with one click.</p></details>
      <details><summary>Can we charge for day passes?</summary><p>Yes. People pay by M-Pesa on their own phone and get online. Your free staff and visitor codes keep working alongside.</p></details>
      <details><summary>We have more than one site.</summary><p>That's fine. Group your routers by location and run every site from one account.</p></details>
      <details><summary>What router do we need?</summary><p>A MikroTik router. Many offices and venues already have one. If you don't, we'll tell you which to get on the call.</p></details>
    </div>
  </div>
</section>

<section class="wrap" id="book" aria-labelledby="h-book">
  <div class="book">
    <div>
      <div class="kick" style="color:#9CC3B1">Book a demo</div>
      <h2 id="h-book">See your own venue running on Speedy Connect.</h2>
      <p class="lede">30 minutes on a call or video. We'll set up a demo with your own places and show you a visitor code, a New code and a device limit.</p>
      <ul><li>No commitment, no card</li><li>We reply on WhatsApp to agree a time</li><li>Bring whoever looks after your Wi-Fi</li></ul>
    </div>
    <form id="f" novalidate method="get" action="<?= e(whatsapp_url()) ?>" target="_blank" data-booking>
<?php booking_fields('venues'); ?>
      <div class="fields">
        <div class="ttl">Book my demo</div>
        <span class="glbl" id="g-ed">Your edition</span>
        <div class="seg" role="group" aria-labelledby="g-ed"><button type="button" aria-pressed="false">ISP</button><button type="button" aria-pressed="false">Hotel</button><button type="button" aria-pressed="false">Café</button><button type="button" aria-pressed="false">School</button><button type="button" aria-pressed="true">Venue</button></div>
        <label for="n">Your name</label><input id="n" name="name" required minlength="2" maxlength="80" placeholder="Wanjiru Kamau" autocomplete="name">
        <label for="o">Organisation name</label><input id="o" name="business" required minlength="2" maxlength="120" placeholder="Bidii Co-working" autocomplete="organization">
        <label for="p">Your phone number</label><input id="p" name="phone" type="tel" required maxlength="20" placeholder="0712 345 678" inputmode="tel" autocomplete="tel">
        <span class="glbl" id="g-busy">How many people use the Wi-Fi on a busy day?</span>
        <div class="seg" role="group" aria-labelledby="g-busy"><button type="button" aria-pressed="false">1–50</button><button type="button" aria-pressed="true">51–200</button><button type="button" aria-pressed="false">200+</button></div>
        <button class="btn submit" id="sb" type="submit">Continue on WhatsApp →</button>
        <p class="or">or <a href="<?= e(whatsapp_url('Hello Speedy Connect, I would like a demo')) ?>">chat with us on WhatsApp now</a></p>
      </div>
      <div class="done" aria-live="polite"><div class="ck" aria-hidden="true">✓</div><div class="ttl" id="dn" tabindex="-1">Thanks, <span id="nm">Wanjiru</span>.</div><p style="color:var(--mut);margin-top:8px;line-height:1.55">Press <b>Send</b> in WhatsApp and we'll reply to agree a time for your demo.</p></div>
    </form>
  </div>
</section>
</main>

<div style="height:96px"></div><?php site_footer(); ?>

<script src="assets/site.js"></script>
<script src="assets/booking.js"></script>
<script src="assets/page-venues.js"></script>
</body></html>
