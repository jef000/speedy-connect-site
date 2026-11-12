<?php require_once __DIR__ . '/../src/site.php'; page_begin('hotels'); ?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><link rel="icon" href="favicon.svg" type="image/svg+xml"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Speedy Connect for Hotels</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Geist+Mono:wght@500;600&family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;1,9..144,400&family=Caveat:wght@600&display=swap" rel="stylesheet">
<style>
:root{
  --paper:#F6F1E8;--paper2:#EFE7D8;--card:#FFFDF8;--ink:#1E2A26;--mut:#5D6661;--soft:#8A918C;--ln:#E3DACB;
  --green:#2E5E4E;--green2:#1E3F35;--brass:#9A7B4F;--gold:#E3C48F;--warn:#B5523B;--ok:#2F7A55;
  --co-ink:#141418;--co-p:#f4f1ea;
}
*{box-sizing:border-box;margin:0}
html{scroll-behavior:smooth}
body{background:var(--paper);color:var(--ink);font-family:Geist,system-ui,sans-serif;-webkit-font-smoothing:antialiased}
a{color:inherit;text-decoration:none}
.mono{font-family:'Geist Mono',ui-monospace,monospace}
.wrap{max-width:1160px;margin:0 auto;padding:0 32px}
.kick{font-size:11.5px;letter-spacing:.16em;text-transform:uppercase;font-weight:600;color:var(--brass)}
h1,h2,h3{font-family:Fraunces,Georgia,serif;font-weight:500;letter-spacing:-.02em}
.mockflag{position:fixed;right:12px;bottom:12px;z-index:50;background:var(--co-ink);color:#f4f2ec;font-size:11px;padding:6px 10px;border-radius:999px;opacity:.85}

.cnav{background:var(--co-p);border-bottom:1px solid rgba(20,20,24,.08);position:sticky;top:0;z-index:20}
.cnav .wrap{display:flex;align-items:center;height:68px;gap:8px}
.brand{display:flex;align-items:center;gap:9px;font-weight:700;font-size:16px;letter-spacing:-.02em;color:var(--co-ink)}
.brand i{width:24px;height:24px;border-radius:7px;background:#E8A33D;display:grid;place-items:center;font-style:normal;font-size:12px}
.clinks{display:flex;gap:2px;margin:0 auto;font-size:14px;color:rgba(20,20,24,.6)}
.clinks span{padding:7px 13px;border-radius:999px}
.clinks .on{background:#ebe6db;color:var(--co-ink)}
.cbtn{height:40px;padding:0 18px;border-radius:999px;background:var(--co-ink);color:#f4f2ec;display:inline-flex;align-items:center;font-weight:600;font-size:14px}
.crumb{font-size:12.5px;color:var(--soft);padding:18px 0 0}
.crumb b{color:var(--mut);font-weight:500}

.hero{display:grid;grid-template-columns:1.02fr 1fr;gap:56px;align-items:center;padding:40px 0 72px}
.edition{display:inline-flex;align-items:center;gap:10px;border:1px solid var(--ln);background:var(--card);border-radius:999px;padding:6px 14px 6px 6px;font-size:13px;color:var(--mut)}
.edition b{background:var(--green);color:var(--paper);border-radius:999px;padding:3px 10px;font-weight:600;font-size:12px;letter-spacing:.02em}
.hero h1{font-size:62px;line-height:1.02;margin:22px 0 22px;text-wrap:balance}
.hero h1 em{color:var(--green)}
.lede{font-size:18px;line-height:1.6;color:var(--mut);max-width:500px}
.ctas{display:flex;gap:18px;align-items:center;margin-top:30px;flex-wrap:wrap}
.btn{height:54px;padding:0 26px;border-radius:3px;background:var(--green);color:var(--paper);font-weight:600;font-size:15px;display:inline-flex;align-items:center;gap:10px;letter-spacing:.01em;box-shadow:0 14px 30px -14px rgba(30,63,53,.7);transition:background .15s}
.btn:hover{background:var(--green2)}
.lnk{font-size:15px;color:var(--green);border-bottom:1px solid currentColor;padding-bottom:2px;font-weight:500}
.wa{display:inline-flex;align-items:center;gap:8px}
.wa svg{width:18px;height:18px}
.trust{display:flex;gap:22px;margin-top:34px;font-size:13px;color:var(--soft);flex-wrap:wrap}
.trust span:before{content:"✓";color:var(--green);margin-right:7px;font-weight:700}

.stage{position:relative;height:540px}
.key{position:absolute;left:0;top:70px;width:360px;height:224px;border-radius:16px;background:linear-gradient(140deg,#336A58 0%,#2E5E4E 40%,#1E3F35 100%);color:#F6F1E8;padding:22px 24px;box-shadow:0 40px 70px -28px rgba(30,42,38,.7),inset 0 1px 0 rgba(255,255,255,.15);transform:rotate(-5deg);animation:float 7s ease-in-out infinite;z-index:2}
.key:after{content:"";position:absolute;inset:0;border-radius:16px;background:linear-gradient(115deg,transparent 30%,rgba(255,255,255,.12) 45%,transparent 60%);pointer-events:none}
@keyframes float{50%{transform:rotate(-4deg) translateY(-8px)}}
.key .crest{font-family:Fraunces,serif;font-size:13px;letter-spacing:.24em}
.key .crest small{display:block;font-family:Geist;letter-spacing:.1em;font-size:9.5px;opacity:.6;margin-top:3px}
.key .rm{font-family:Fraunces,serif;font-size:58px;line-height:1;margin-top:16px}
.key .gn{font-size:12.5px;opacity:.8;margin-top:6px}
.key .chip{position:absolute;left:24px;bottom:24px;width:48px;height:36px;border-radius:6px;background:linear-gradient(135deg,#EBD1A2,#9A7B4F);box-shadow:inset 0 0 0 1px rgba(0,0,0,.15)}
.key .code{position:absolute;right:24px;bottom:20px;text-align:right}
.key .code s{display:block;text-decoration:none;font-size:9.5px;letter-spacing:.18em;opacity:.65}
.key .code b{font-family:'Geist Mono',monospace;font-size:26px;color:var(--gold);letter-spacing:.04em}
.sms{position:absolute;right:0;top:0;width:262px;background:#fff;border-radius:18px 18px 18px 5px;padding:14px 16px;font-size:13px;line-height:1.5;box-shadow:0 20px 40px -18px rgba(30,42,38,.45);border:1px solid var(--ln);z-index:3}
.sms s{display:flex;justify-content:space-between;text-decoration:none;font-size:10.5px;color:var(--brass);margin-bottom:4px}
.sign{position:absolute;right:-6px;bottom:0;width:210px;background:var(--card);border:1px solid var(--ln);padding:16px;box-shadow:0 24px 44px -22px rgba(30,42,38,.5);transform:rotate(3.5deg);z-index:3}
.sign .ev{font-family:Fraunces,serif;font-size:16px;line-height:1.2}
.sign .hall{font-size:10px;color:var(--brass);letter-spacing:.12em;text-transform:uppercase;margin:5px 0 10px}
.qr{display:grid;grid-template-columns:repeat(21,1fr);width:116px;height:116px;margin:0 auto}
.qr i{display:block}
.sign .sc2{text-align:center;font-size:10.5px;color:var(--mut);margin-top:8px}

.sec{padding:96px 0}
.sec.alt{background:var(--paper2)}
.head{display:flex;justify-content:space-between;align-items:flex-end;gap:48px;flex-wrap:wrap}
.head h2{font-size:50px;line-height:1.04;margin-top:12px;max-width:640px}
.head p{max-width:380px;color:var(--mut);font-size:15.5px;line-height:1.6}

.switch{display:inline-flex;background:var(--card);border:1px solid var(--ln);border-radius:999px;padding:5px;margin-top:34px;box-shadow:0 10px 26px -18px rgba(30,42,38,.5)}
.switch button{border:0;background:transparent;font:600 15px Geist,sans-serif;color:var(--mut);height:46px;padding:0 22px;border-radius:999px;cursor:pointer;transition:all .25s}
.switch button[aria-pressed=true]{background:var(--ink);color:var(--paper)}
.switch button.w[aria-pressed=true]{background:var(--green)}
.hint{font-size:13px;color:var(--soft);margin:12px 0 0 6px}
.scenes{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-top:30px}
.sc{background:var(--card);border:1px solid var(--ln);border-radius:20px;overflow:hidden;display:grid;grid-template-rows:auto 1fr;transition:border-color .4s,box-shadow .4s}
.sc.wide{grid-column:span 2;grid-template-columns:1fr 1.3fr;grid-template-rows:none}
.sc .txt{padding:24px 26px 6px}
.sc.wide .txt{padding:28px}
.sc .lim{display:flex;align-items:center;gap:8px;font-size:11px;letter-spacing:.14em;text-transform:uppercase;font-weight:600}
.lim .dot{width:8px;height:8px;border-radius:50%;background:var(--warn);transition:background .4s}
.sc h3{font-size:24px;line-height:1.15;margin-top:10px}
.sc p{font-size:14.5px;color:var(--mut);line-height:1.55;margin-top:8px}
.sc .vis{position:relative;min-height:210px;margin:14px 18px 18px;border-radius:14px;background:var(--paper);overflow:hidden}
.sc.wide .vis{margin:18px;min-height:230px}
.st{position:absolute;inset:0;padding:18px;display:flex;align-items:center;justify-content:center;transition:opacity .45s ease,transform .45s ease}
.st.after{opacity:0;transform:translateY(10px);pointer-events:none}
.fixed .st.before{opacity:0;transform:translateY(-10px);pointer-events:none}
.fixed .st.after{opacity:1;transform:none}
.t-after{display:none}
.fixed .t-before{display:none}.fixed .t-after{display:block}
.fixed .lim .t-after{display:inline}
.fixed .lim .dot{background:var(--ok)}
.fixed .sc{border-color:#cfdcd2;box-shadow:0 20px 40px -32px rgba(46,94,78,.6)}
.lim .lb{color:var(--warn)}.fixed .lim .lb{color:var(--ok)}

.sticky{background:#FBE38A;width:190px;padding:20px 18px 24px;transform:rotate(-4deg);box-shadow:0 14px 22px -12px rgba(0,0,0,.35);font-family:Caveat,cursive;font-size:30px;line-height:1.05;color:#3a3220;position:relative}
.sticky:before{content:"";position:absolute;top:-10px;left:60px;width:70px;height:22px;background:rgba(255,255,255,.55);transform:rotate(3deg)}
.sticky small{display:block;font-size:20px;margin-top:8px;color:#6e5f35}
.tag-warn{position:absolute;right:16px;bottom:14px;background:#fff;border:1px solid #efc9bf;color:var(--warn);font-size:11.5px;border-radius:8px;padding:6px 9px;max-width:170px;line-height:1.35}
.mkey{width:220px;height:136px;border-radius:12px;background:linear-gradient(140deg,#336A58,#1E3F35);color:#F6F1E8;padding:14px 16px;position:relative;box-shadow:0 18px 30px -16px rgba(30,42,38,.7)}
.mkey .rm{font-family:Fraunces,serif;font-size:34px;margin-top:6px}
.mkey .c{position:absolute;right:14px;bottom:12px;font-family:'Geist Mono',monospace;color:var(--gold);font-size:17px}
.mkey small{font-size:9.5px;letter-spacing:.2em;opacity:.7}
.tag-ok{position:absolute;right:16px;bottom:14px;background:#fff;border:1px solid #cfe1d5;color:var(--ok);font-size:11.5px;border-radius:8px;padding:6px 9px;max-width:180px;line-height:1.35}

.bw{width:100%}
.bw .lbl{display:flex;justify-content:space-between;font-size:11.5px;color:var(--mut);margin-bottom:6px}
.bar{height:26px;border-radius:7px;background:#e9e1d2;overflow:hidden;display:flex}
.bar i{display:block;height:100%}
.legend{display:flex;gap:14px;font-size:11px;color:var(--mut);margin-top:8px;flex-wrap:wrap}
.legend span:before{content:"";display:inline-block;width:9px;height:9px;border-radius:2px;margin-right:5px;background:var(--c);vertical-align:-1px}
.complaint{margin-top:14px;background:#fff;border-radius:12px 12px 12px 4px;padding:9px 12px;font-size:12.5px;border:1px solid var(--ln);display:inline-block}
.complaint s{text-decoration:none;color:var(--soft);font-size:10.5px;display:block}

.calls{width:100%;font-size:12.5px}
.calls div{display:grid;grid-template-columns:44px 1fr auto;gap:10px;padding:8px 10px;background:#fff;border:1px solid var(--ln);border-radius:9px;margin-bottom:6px;align-items:center}
.calls .r{color:var(--warn);font-size:11px}
.roomcard{width:100%;background:#fff;border:1px solid var(--ln);border-radius:12px;padding:14px;font-size:12.5px}
.roomcard .top{display:flex;justify-content:space-between;align-items:baseline}
.roomcard .top b{font-family:Fraunces,serif;font-size:22px;font-weight:500}
.dev{display:grid;grid-template-columns:1fr auto;padding:6px 0;border-bottom:1px solid #f0ebe1}
.dev:last-child{border:0}
.pill4{background:#F3E1DB;color:var(--warn);font-size:11px;padding:3px 8px;border-radius:999px;font-weight:600}

.ledger{width:100%;max-width:330px;font-size:13px;background:#fff;border:1px solid var(--ln);border-radius:12px;padding:16px}
.ledger div{display:flex;justify-content:space-between;padding:7px 0;border-bottom:1px dashed #e7dfd0}
.ledger div:last-child{border:0;font-weight:600}
.neg{color:var(--warn)}.pos{color:var(--ok)}

.two{display:grid;grid-template-columns:1fr 1fr;gap:14px;width:100%}
.sys{background:#fff;border:1px solid var(--ln);border-radius:12px;padding:14px;font-size:12.5px}
.sys .nm{font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--soft);font-weight:600;margin-bottom:8px}
.sys .row{display:flex;justify-content:space-between;gap:8px;padding:6px 0;border-bottom:1px solid #f0ebe1}
.sys .row:last-child{border:0}
.flow{grid-column:span 2;text-align:center;font-size:12px}

.day{display:grid;grid-template-columns:.9fr 1.1fr;gap:56px;margin-top:48px;align-items:start}
.step{display:grid;grid-template-columns:64px 1fr;gap:14px;padding:18px 0;border-top:1px solid var(--ln);cursor:pointer;opacity:.45;transition:opacity .3s}
.step:last-child{border-bottom:1px solid var(--ln)}
.step.on{opacity:1}
.step .t{font-family:'Geist Mono',monospace;color:var(--brass);font-size:14px;padding-top:4px}
.step b{font-family:Fraunces,serif;font-weight:500;font-size:21px;display:block}
.step p{font-size:14px;color:var(--mut);margin-top:4px;line-height:1.5}
.step .prog{grid-column:2;height:2px;background:var(--ln);margin-top:12px;border-radius:2px;overflow:hidden;display:none}
.step.on .prog{display:block}
.step .prog i{display:block;height:100%;background:var(--green);width:0}
.step.on .prog i{animation:prog 4.5s linear forwards}
.paused .step.on .prog i{animation-play-state:paused}
@keyframes prog{to{width:100%}}
.dctl{display:flex;gap:10px;margin-top:16px;font-size:13px;color:var(--mut);align-items:center}
.dctl button{border:1px solid var(--ln);background:var(--card);border-radius:999px;height:34px;padding:0 14px;font:500 13px Geist;cursor:pointer;color:var(--ink)}
.dstage{position:sticky;top:132px;background:var(--card);border:1px solid var(--ln);border-radius:24px;padding:22px;min-height:440px;box-shadow:0 30px 60px -44px rgba(30,42,38,.6)}
.dstage .bar2{display:grid;grid-template-columns:200px 1fr;gap:18px;font-size:12px;color:var(--soft);margin-bottom:16px}
.frame{position:relative;height:370px}
.fr{position:absolute;inset:0;opacity:0;transform:translateY(8px);transition:opacity .45s,transform .45s;display:grid;grid-template-columns:200px 1fr;gap:18px;align-items:center;pointer-events:none}
.fr.on{opacity:1;transform:none;pointer-events:auto}
.phone{width:200px;height:360px;border:8px solid #15191a;border-radius:32px;background:#fff;padding:22px 14px;position:relative;font-size:12px;overflow:hidden}
.phone:before{content:"";position:absolute;top:6px;left:50%;transform:translateX(-50%);width:60px;height:6px;border-radius:9px;background:#15191a}
.ph-h{font-family:Fraunces,serif;font-size:15px;color:var(--green);letter-spacing:.14em;text-align:center;margin-top:6px}
.ph-s{text-align:center;color:var(--soft);font-size:10.5px;margin-top:3px}
.fld{border:1px solid #ddd5c6;border-radius:8px;padding:10px;margin-top:10px;color:#9a9188;font-size:12px}
.go{background:var(--green);color:#fff;text-align:center;border-radius:8px;padding:11px;font-weight:600;margin-top:12px}
.bubble{background:#EEF2EF;border-radius:14px 14px 14px 4px;padding:10px 12px;line-height:1.45;margin-top:14px}
.okscreen{text-align:center;margin-top:40px}
.okscreen .ck{width:54px;height:54px;border-radius:50%;background:#E3EEE7;color:var(--green);display:grid;place-items:center;margin:0 auto 12px;font-size:24px}
.con{background:var(--paper);border:1px solid var(--ln);border-radius:14px;padding:16px;font-size:12.5px}
.con .nm{font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--brass);font-weight:600}
.con .big{font-family:Fraunces,serif;font-size:26px;margin:6px 0 10px}
.con .row{display:flex;justify-content:space-between;gap:8px;padding:7px 0;border-top:1px solid var(--ln)}
.con .ev{margin-top:10px;background:#fff;border-radius:9px;padding:9px 10px;border-left:3px solid var(--green);font-size:12px;line-height:1.45}
.folio{background:#fff;border:1px solid var(--ln);border-radius:12px;padding:14px;font-family:'Geist Mono',monospace;font-size:11.5px}
.folio div{display:flex;justify-content:space-between;padding:5px 0}
.folio .hl{background:#F1F6F2;margin:0 -8px;padding:5px 8px;border-radius:6px;color:var(--green);font-weight:600}

.pillars{display:grid;grid-template-columns:repeat(3,1fr);margin-top:48px;border-top:1px solid var(--ln)}
.pl{padding:28px 28px 28px 0;border-bottom:1px solid var(--ln)}
.pl:not(:nth-child(3n)){border-right:1px solid var(--ln);margin-right:28px}
.pl .n{display:flex;align-items:center;gap:8px;font-size:11.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--soft);font-weight:600}
.pl .n i{font-style:normal;font-family:'Geist Mono',monospace;color:var(--brass);letter-spacing:0}
.pl b{font-family:Fraunces,serif;font-weight:500;font-size:21px;display:block;margin:10px 0 6px;line-height:1.2}
.pl p{font-size:14px;color:var(--mut);line-height:1.55}

.start{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-top:44px}
.sp{background:var(--card);border:1px solid var(--ln);border-radius:18px;padding:22px}
.sp .n{width:34px;height:34px;border-radius:50%;border:1px solid var(--brass);color:var(--brass);display:grid;place-items:center;font-family:Fraunces,serif;font-size:16px}
.sp b{display:block;font-family:Fraunces,serif;font-weight:500;font-size:19px;margin:14px 0 6px}
.sp p{font-size:13.5px;color:var(--mut);line-height:1.5}
.sp .when{margin-top:12px;font-size:12px;color:var(--brass);font-family:'Geist Mono',monospace}
.faq{margin-top:40px;border-top:1px solid var(--ln)}
details{border-bottom:1px solid var(--ln);padding:20px 0}
summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;font-family:Fraunces,serif;font-size:20px}
summary::-webkit-details-marker{display:none}
summary:after{content:"+";font-family:Geist;color:var(--brass);font-size:22px;transition:transform .2s}
details[open] summary:after{transform:rotate(45deg)}
details p{color:var(--mut);font-size:15px;line-height:1.6;margin-top:10px;max-width:720px}

.book{background:var(--green2);color:var(--paper);border-radius:28px;padding:56px;display:grid;grid-template-columns:1fr 1fr;gap:56px;position:relative;overflow:hidden;margin-top:24px}
.book:before{content:"";position:absolute;right:-120px;top:-120px;width:380px;height:380px;border-radius:50%;border:1px solid rgba(227,196,143,.2)}
.book h2{font-size:46px;line-height:1.05;color:var(--paper)}
.book .lede{color:rgba(246,241,232,.7);margin-top:16px}
.book ul{list-style:none;padding:0;margin-top:26px;font-size:14.5px;color:rgba(246,241,232,.8)}
.book li{padding:7px 0}.book li:before{content:"✓";color:var(--gold);margin-right:10px}
form{background:var(--card);color:var(--ink);border-radius:18px;padding:26px;position:relative}
form .ttl{font-family:Fraunces,serif;font-size:22px}
form label{display:block;font-size:12.5px;font-weight:600;margin:14px 0 6px;color:var(--mut)}
form input{width:100%;height:46px;border:1px solid var(--ln);border-radius:8px;padding:0 12px;font:15px Geist;background:#fff;color:var(--ink)}
form input:focus,.seg button:focus-visible,.switch button:focus-visible,.btn:focus-visible{outline:2px solid var(--green);outline-offset:2px}
.seg{display:flex;gap:6px;flex-wrap:wrap}
.seg button{border:1px solid var(--ln);background:#fff;border-radius:999px;height:38px;padding:0 14px;font:500 13.5px Geist;cursor:pointer;color:var(--ink)}
.seg button[aria-pressed=true]{background:var(--green);border-color:var(--green);color:#fff}
form .submit{width:100%;justify-content:center;margin-top:20px;border:0;cursor:pointer;font-family:Geist}
form .or{text-align:center;font-size:13px;color:var(--mut);margin-top:12px}
form .or a{color:var(--green);font-weight:600}
.done{display:none;text-align:center;padding:40px 10px}
.sent .fields{display:none}.sent .done{display:block}
.done .ck{width:60px;height:60px;border-radius:50%;background:#E3EEE7;color:var(--green);display:grid;place-items:center;margin:0 auto 14px;font-size:26px}


@media (max-width:900px){
  .wrap{padding:0 16px}.clinks{display:none}
  .hero,.day,.book{grid-template-columns:1fr}.hero h1{font-size:46px}
  .stage{height:400px;transform:scale(.82);transform-origin:left top}
  .scenes{grid-template-columns:1fr}.sc.wide{grid-column:auto;grid-template-columns:1fr}
  .head h2{font-size:36px}.pillars,.start{grid-template-columns:1fr}.pl{margin-right:0!important;border-right:0!important}
  .dstage{position:relative;top:0}.fr,.dstage .bar2{grid-template-columns:1fr}.phone,.dstage .bar2 span:first-child{display:none}
  .book{padding:28px}.book h2{font-size:34px}.two{grid-template-columns:1fr}.flow{grid-column:auto}
}
@media (prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}
</style><link rel="stylesheet" href="assets/chrome.css">
</head>
<body data-edition="hotels">


<?php site_header('hotels'); ?>

<div class="wrap">
  <div class="crumb">Editions / <b>Speedy Connect for Hotels</b></div>
  <section class="hero">
    <div>
      <span class="edition"><b>for Hotels</b> lodges · guest houses · resorts</span>
      <h1>Wi-Fi that checks in and <em>checks out</em> with your guests.</h1>
      <p class="lede">Every stay gets its own Wi-Fi code that starts at check-in, works anywhere in the hotel, and ends at check-out. Conferences get their own codes too. Reception stops being the Wi-Fi helpdesk.</p>
      <div class="ctas">
        <a class="btn" href="#book">Book a hotel demo</a>
        <a class="lnk wa" href="<?= e(whatsapp_url('Hello Speedy Connect, I would like a demo')) ?>"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Zm5.3 14.1c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .1-3.3-.8-2.8-1.1-4.5-3.9-4.7-4.1-.1-.2-1.1-1.5-1.1-2.8s.7-2 1-2.3c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.8 2c.1.2.1.4 0 .5l-.4.6-.4.4c-.1.2-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.3 2.4 1.5.3.1.5.1.6-.1l.9-1c.2-.3.4-.2.6-.1l1.9.9c.3.1.5.2.5.3.1.2.1.7-.2 1.4Z"/></svg>Ask us on WhatsApp</a>
      </div>
      <div class="trust"><span>Works with your MikroTik</span><span>Links to OPERA</span><span>Live the same day</span></div>
    </div>
    <div class="stage" aria-hidden="true">
      <div class="sms"><s><span>SMS · Mvuli House</span><span>14:10</span></s>Welcome, Amina. Your Wi-Fi code is <b class="mono">305 914</b>. It works anywhere in the hotel until you check out on Thursday.</div>
      <div class="key"><div class="crest">MVULI HOUSE<small>WESTLANDS · NAIROBI</small></div><div class="rm">305</div><div class="gn">Amina Hassan · until Thu 8 Oct, 11:00</div><div class="chip"></div><div class="code"><s>WI-FI CODE</s><b>305 914</b></div></div>
      <div class="sign"><div class="ev">Kenya Tea Growers' Forum</div><div class="hall">Baobab Hall · 6–8 Oct</div><div class="qr" id="qr1"></div><div class="sc2">Scan to get online</div></div>
    </div>
  </section>
</div>

<section class="sec alt" id="limits">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">Sound familiar?</div><h2>Five things hotel Wi-Fi gets wrong, and what changes.</h2></div>
      <p>Most hotels live with at least one of these. Flip the switch to see each one fixed.</p>
    </div>
    <div class="switch" role="group" aria-label="Compare your hotel today with Speedy Connect">
      <button class="b" aria-pressed="true" data-mode="today">Your hotel today</button>
      <button class="w" aria-pressed="false" data-mode="with">With Speedy Connect</button>
    </div>
    <p class="hint" id="hint" aria-live="polite">← You're looking at today. Try the switch.</p>

    <div class="scenes" id="scenes">
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">The shared password</span><span class="lb t-after">A code per stay</span></div>
          <h3 class="t-before">One password, taped to reception since 2023.</h3>
          <h3 class="t-after">Every stay gets its own code, and it ends at check-out.</h3>
          <p class="t-before">Last month's guests still have it. So do the neighbours. You can't tell who's on your Wi-Fi or switch anyone off.</p>
          <p class="t-after">The code arrives by SMS or email at check-in and is printed on the room card. At check-out it changes by itself, and the old devices are signed off.</p>
        </div>
        <div class="vis">
          <div class="st before"><div class="sticky">WiFi: mvuli2024<small>ask reception if it fails</small></div><span class="tag-warn">Guests from March still online</span></div>
          <div class="st after"><div class="mkey"><small>MVULI HOUSE</small><div class="rm">305</div><div class="c">305 914</div></div><span class="tag-ok">Ends Thu 11:00 · renewed by itself</span></div>
        </div>
      </article>
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">The conference</span><span class="lb t-after">Event codes</span></div>
          <h3 class="t-before">120 delegates arrive, and the whole hotel slows to a crawl.</h3>
          <h3 class="t-after">The conference gets its own code, its own days and its own fair share.</h3>
          <p class="t-before">Everyone is on the same password, so room guests complain and nobody can see who's using what.</p>
          <p class="t-after">Each event gets a code and a QR, sent to the delegate list. It only works on the event's days and hours, with a fair limit per device, so room guests keep their speed.</p>
        </div>
        <div class="vis">
          <div class="st before"><div class="bw"><div class="lbl"><span>Your internet line · 10:30</span><span class="mono" style="color:var(--warn)">97% used</span></div><div class="bar"><i style="width:97%;background:#C9705C"></i></div><div class="legend"><span style="--c:#C9705C">Everyone on "mvuli2024"</span></div><div class="complaint"><s>Room 307 · 10:34</s>"The Wi-Fi is useless today."</div></div></div>
          <div class="st after"><div class="bw"><div class="lbl"><span>Your internet line · 10:30</span><span class="mono" style="color:var(--ok)">shared fairly</span></div><div class="bar"><i style="width:46%;background:#9A7B4F"></i><i style="width:34%;background:#2E5E4E"></i><i style="width:8%;background:#7FA392"></i></div><div class="legend"><span style="--c:#9A7B4F">TEAFORUM · 5 Mbps each · Tue–Thu</span><span style="--c:#2E5E4E">Room guests</span><span style="--c:#7FA392">Staff</span></div><div class="complaint" style="border-color:#cfe1d5"><s>Room 307</s>Streaming just fine ✓</div></div></div>
        </div>
      </article>
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">The helpdesk</span><span class="lb t-after">Answers on one screen</span></div>
          <h3 class="t-before">Reception has become the Wi-Fi helpdesk.</h3>
          <h3 class="t-after">The answer is on screen before the guest finishes the sentence.</h3>
          <p class="t-before">"I can't connect." "It's slow." Staff can only guess, restart the router and hope.</p>
          <p class="t-after">The room's card shows every device, its type and its speed. The usual answer: all four devices are already on, one of them a TV.</p>
        </div>
        <div class="vis">
          <div class="st before"><div class="calls"><div><span class="mono">09:12</span><span>Room 212: "can't connect"</span><span class="r">guessing</span></div><div><span class="mono">09:20</span><span>Room 307: "it's slow"</span><span class="r">router restarted</span></div><div><span class="mono">09:41</span><span>Room 118: "password wrong?"</span><span class="r">re-told it</span></div></div></div>
          <div class="st after"><div class="roomcard"><div class="top"><b>Room 307</b><span class="pill4">4 of 4 devices</span></div><div class="dev"><span>Sarah's iPhone</span><span class="mono">20 Mbps</span></div><div class="dev"><span>MacBook Air</span><span class="mono">20 Mbps</span></div><div class="dev"><span>Samsung TV</span><span class="mono">4 Mbps</span></div><div class="dev"><span>iPad</span><span class="mono">20 Mbps</span></div></div></div>
        </div>
      </article>
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">Only a cost</span><span class="lb t-after">A small income line</span></div>
          <h3 class="t-before">Wi-Fi is a bill every month, and nothing comes back.</h3>
          <h3 class="t-after">Guests who want more pay for it, on their room bill.</h3>
          <p class="t-before">Everyone gets the same speed, so the guest who'd happily pay for faster has no way to.</p>
          <p class="t-after">Room Wi-Fi stays included. <b>Fast Wi-Fi</b> is an upgrade that reception adds in one click, posted to the room bill, or a guest buys it for their own device by M-Pesa.</p>
        </div>
        <div class="vis">
          <div class="st before"><div class="ledger"><div><span>Internet line</span><span class="mono neg">− every month</span></div><div><span>Router call-outs</span><span class="mono neg">− when it breaks</span></div><div><span>Wi-Fi income</span><span class="mono">KES 0</span></div></div></div>
          <div class="st after"><div class="ledger"><div><span>Room 112 · Fast Wi-Fi · 1 day</span><span class="mono pos">+ 500</span></div><div><span>Room 204 · Fast Wi-Fi · 1 day</span><span class="mono pos">+ 500</span></div><div><span>Guest phone · M-Pesa pass</span><span class="mono pos">+ 100</span></div><div><span>This week</span><span class="mono pos">+ KES 1,100</span></div></div></div>
        </div>
      </article>
      <article class="sc wide">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">Two systems, no link</span><span class="lb t-after">OPERA runs the Wi-Fi</span></div>
          <h3 class="t-before">OPERA says he left at 11:00. The Wi-Fi says he's still here.</h3>
          <h3 class="t-after">Check in, out or move a guest in OPERA, and the Wi-Fi follows by itself.</h3>
          <p class="t-before">Your booking system and your Wi-Fi don't know about each other, so somebody has to remember, and usually nobody does.</p>
          <p class="t-after">Speedy Connect listens to OPERA. Check-ins, check-outs, room moves and changed departures arrive by themselves, and Fast Wi-Fi is posted to the guest's folio. No OPERA? Reception does the same in two clicks.</p>
        </div>
        <div class="vis">
          <div class="st before"><div class="two"><div class="sys"><div class="nm">OPERA · front desk</div><div class="row"><span>212 · Daniel Mutua</span><span style="color:var(--ok)">Checked out 11:00</span></div><div class="row"><span>305 · Amina Hassan</span><span>Arriving 14:00</span></div></div><div class="sys"><div class="nm">Wi-Fi</div><div class="row"><span>Room 212</span><span style="color:var(--warn)">4 devices still on</span></div><div class="row"><span>Room 305</span><span style="color:var(--warn)">no code yet</span></div></div><div class="flow" style="color:var(--warn)">✕ nothing passes between them</div></div></div>
          <div class="st after"><div class="two"><div class="sys"><div class="nm">OPERA · front desk</div><div class="row"><span>212 · Daniel Mutua</span><span>Checked out 11:00</span></div><div class="row"><span>305 · Amina Hassan</span><span>Checked in 14:10</span></div></div><div class="sys"><div class="nm">Speedy Connect</div><div class="row"><span>Room 212</span><span style="color:var(--ok)">renewed · 4 signed off</span></div><div class="row"><span>Room 305</span><span style="color:var(--ok)">305 914 sent by SMS</span></div></div><div class="flow" style="color:var(--ok)">✓ in step automatically, within seconds</div></div></div>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="sec" id="day">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">An example: a Tuesday at Mvuli House</div><h2>Watch a day run itself.</h2></div>
      <p>A 48-room hotel in Westlands with a conference in the hall. Nobody at reception touches the Wi-Fi.</p>
    </div>
    <div class="day" id="dayw">
      <div>
        <div class="steps">
          <div class="step on"><span class="t">07:30</span><div><b>The conference arrives</b><p>120 delegates got their code and QR by email last night. They scan the sign and they're on.</p></div><div class="prog"><i></i></div></div>
          <div class="step"><span class="t">11:00</span><div><b>Daniel checks out</b><p>OPERA tells us. Room 212's code is renewed and his four devices are signed off.</p></div><div class="prog"><i></i></div></div>
          <div class="step"><span class="t">14:10</span><div><b>Amina checks in</b><p>Her code arrives by SMS before she reaches the lift. Room number and surname work too.</p></div><div class="prog"><i></i></div></div>
          <div class="step"><span class="t">20:45</span><div><b>Room 112 wants it faster</b><p>Reception adds Fast Wi-Fi in one click: 50 Mbps until check-out, KES 500 on the bill.</p></div><div class="prog"><i></i></div></div>
        </div>
        <div class="dctl"><button id="pp">❚❚ Pause</button><span>or click any moment</span></div>
      </div>
      <div class="dstage" aria-live="polite">
        <div class="bar2"><span>What the guest sees</span><span>What your staff see</span></div>
        <div class="frame">
          <div class="fr on">
            <div class="phone"><div class="ph-h">MVULI</div><div class="ph-s">Kenya Tea Growers' Forum</div><div class="okscreen"><div class="ck">✓</div><b style="font-size:14px">You're online</b><p style="color:var(--soft);font-size:11px;margin-top:6px">Event Wi-Fi until 18:00<br>in Baobab Hall and anywhere in the hotel</p></div></div>
            <div class="con"><div class="nm">Meetings &amp; events</div><div class="big">Tea Growers' Forum</div><div class="row"><span>Code</span><span class="mono">TEAFORUM</span></div><div class="row"><span>Days</span><span>Tue–Thu · 08:00–18:00</span></div><div class="row"><span>Devices on now</span><span class="mono" style="color:var(--green)">87</span></div><div class="ev">Codes and QR sent to 120 delegates · 6 Oct, 19:02</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-h">MVULI</div><div class="ph-s">Wi-Fi anywhere in the hotel</div><div class="fld">Room number</div><div class="fld">Surname</div><div class="go">Get online</div><p style="text-align:center;color:var(--soft);font-size:10.5px;margin-top:12px">Ready for the next guest</p></div>
            <div class="con"><div class="nm">Rooms · today</div><div class="big">Room 212</div><div class="row"><span>Guest</span><span>Daniel Mutua</span></div><div class="row"><span>Checked out</span><span>11:00 · from OPERA</span></div><div class="row"><span>Devices</span><span style="color:var(--green)">4 signed off</span></div><div class="ev">Code renewed automatically · 11:00:02</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-s" style="margin-top:4px">Messages</div><div class="bubble"><b>Mvuli House</b><br>Welcome, Amina. Your Wi-Fi code is <b class="mono">305 914</b>. It works anywhere in the hotel until you check out on Thursday.</div></div>
            <div class="con"><div class="nm">Rooms · arrivals</div><div class="big">Room 305</div><div class="row"><span>Guest</span><span>Amina Hassan</span></div><div class="row"><span>Stay</span><span>until Thu 11:00</span></div><div class="row"><span>Devices</span><span>up to 4</span></div><div class="ev">Code 305 914 sent by SMS · 14:10</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-h">MVULI</div><div class="ph-s">Room 112</div><div class="okscreen"><div class="ck" style="background:#F5ECDA;color:var(--brass)">⚡</div><b style="font-size:14px">Fast Wi-Fi is on</b><p style="color:var(--soft);font-size:11px;margin-top:6px">50 Mbps until check-out</p></div></div>
            <div class="folio"><div style="color:var(--soft)">FOLIO · ROOM 112 · P. OTIENO</div><div><span>Room · 2 nights</span><span>24,000</span></div><div><span>Breakfast</span><span>3,000</span></div><div class="hl"><span>Fast Wi-Fi · 1 day</span><span>500</span></div><div style="border-top:1px dashed #ddd;margin-top:4px;padding-top:8px"><b>Total</b><b>KES 27,500</b></div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="sec alt">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">The network underneath</div><h2>The same Speedy Connect, set up for how a hotel runs.</h2></div>
      <p>Every edition shares one network platform. Here's what each part does for a hotel.</p>
    </div>
    <div class="pillars">
      <div class="pl"><span class="n"><i>01</i> Routers</span><b>One router at reception, every access point watched.</b><p>Set up with one paste. You get an email if it goes quiet, and can swap it without the guests noticing.</p></div>
      <div class="pl"><span class="n"><i>02</i> Access</span><b>Room and surname, a room code, or an event QR.</b><p>Each stay and each event gets its own way in, and each one ends on time.</p></div>
      <div class="pl"><span class="n"><i>03</i> Control</span><b>Four devices a stay. TVs slower.</b><p>Fair limits by kind of device, so a streaming TV doesn't slow a business guest's call.</p></div>
      <div class="pl"><span class="n"><i>04</i> Money</span><b>Fast Wi-Fi on the room bill.</b><p>Posted to the folio through OPERA, or paid by M-Pesa on the guest's phone.</p></div>
      <div class="pl"><span class="n"><i>05</i> Guests</span><b>Codes by SMS, email or both.</b><p>At check-in, and again whenever a guest asks, from the room's card.</p></div>
      <div class="pl"><span class="n"><i>06</i> Visibility</span><b>A monthly hotel report, as a PDF.</b><p>Stays, guests online, busy hours, and which rooms and events used the most.</p></div>
    </div>
  </div>
</section>

<section class="sec">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">Getting started</div><h2>Live the same day you decide.</h2></div>
      <p>You keep your router and access points. We set up the rest with you on a call.</p>
    </div>
    <div class="start">
      <div class="sp"><span class="n">1</span><b>A call with us</b><p>We look at your rooms, halls and router together.</p><div class="when">30 minutes</div></div>
      <div class="sp"><span class="n">2</span><b>Add your rooms</b><p>Type them in, or link OPERA and they arrive by themselves.</p><div class="when">an hour</div></div>
      <div class="sp"><span class="n">3</span><b>Connect your router</b><p>Paste one line into your MikroTik. That's the whole install.</p><div class="when">minutes</div></div>
      <div class="sp"><span class="n">4</span><b>Guests are online</b><p>Room cards print with each stay's code. The next check-in uses it.</p><div class="when">same day</div></div>
    </div>
    <div class="faq">
      <details open><summary>Do I need new routers or access points?</summary><p>No. Speedy Connect works with a MikroTik router, which most hotels in the region already have at reception. Your access points stay where they are.</p></details>
      <details><summary>We don't use OPERA. Does it still work?</summary><p>Yes. Reception checks guests in and out on Speedy Connect's Rooms screen in two clicks, and everything else works the same. OPERA just makes it happen by itself.</p></details>
      <details><summary>Can a guest bring more devices?</summary><p>You choose how many devices a stay gets (four is common) and which kinds go slower, like TVs. Reception can raise the limit for one room at any time.</p></details>
      <details><summary>What if a guest forgets their code?</summary><p>They type their room number and surname on the Wi-Fi page instead. Or reception sends the code again by SMS or email from the room's card.</p></details>
    </div>
  </div>
</section>

<section class="wrap" id="book">
  <div class="book">
    <div>
      <div class="kick" style="color:var(--gold)">Book a hotel demo</div>
      <h2 style="margin-top:12px">See your own hotel running on Speedy Connect.</h2>
      <p class="lede">30 minutes on a call or video. We'll set up a demo with your room numbers and show you check-in, a conference code and the OPERA link.</p>
      <ul><li>No commitment, no card</li><li>We reply on WhatsApp to agree a time</li><li>Bring your IT person if you have one</li></ul>
    </div>
    <form id="f" method="get" action="<?= e(whatsapp_url()) ?>" target="_blank" data-booking>
<?php booking_fields('hotels'); ?>
      <div class="fields">
        <div class="ttl">Book my demo</div>
        <label>Your edition</label>
        <div class="seg"><button type="button" aria-pressed="false">ISP</button><button type="button" aria-pressed="true">Hotel</button><button type="button" aria-pressed="false">Café</button><button type="button" aria-pressed="false">School</button><button type="button" aria-pressed="false">Venue</button></div>
        <label for="n">Your name</label><input id="n" name="name" required minlength="2" maxlength="80" placeholder="Lilian Mwende" autocomplete="name">
        <label for="h">Hotel name</label><input id="h" name="business" required minlength="2" maxlength="120" placeholder="Mvuli House" autocomplete="organization">
        <label for="p">Your phone number</label><input id="p" name="phone" type="tel" required maxlength="20" placeholder="0712 345 678" inputmode="tel" autocomplete="tel">
        <label>How many rooms?</label>
        <div class="seg"><button type="button" aria-pressed="false">1–20</button><button type="button" aria-pressed="true">21–60</button><button type="button" aria-pressed="false">61–150</button><button type="button" aria-pressed="false">150+</button></div>
        <button class="btn submit" id="sb" type="submit">Continue on WhatsApp →</button>
        <p class="or">or <a href="<?= e(whatsapp_url('Hello Speedy Connect, I would like a demo')) ?>">chat with us on WhatsApp now</a></p>
      </div>
      <div class="done" aria-live="polite"><div class="ck">✓</div><div class="ttl">Thanks, <span id="nm">Lilian</span>.</div><p style="color:var(--mut);margin-top:8px;line-height:1.55">Press <b>Send</b> in WhatsApp and we'll reply to agree a time for your demo.</p></div>
    </form>
  </div>
</section>

<div style="height:96px"></div><?php site_footer(); ?>

<script src="assets/site.js"></script>
<script src="assets/booking.js"></script>
<script src="assets/page-hotels.js"></script>
</body></html>
