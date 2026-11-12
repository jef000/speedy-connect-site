<?php require_once __DIR__ . '/../src/site.php'; page_begin('cafes'); ?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><link rel="icon" href="favicon.svg" type="image/svg+xml"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Speedy Connect for Cafés &amp; restaurants</title>
<meta name="description" content="Free Wi-Fi that brings guests back: a free hour in one tap, a contact list built with consent, and offers by SMS or email.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700;800&family=Geist+Mono:wght@500;600;700&display=swap" rel="stylesheet">
<style>
:root{
  --cream:#FFF4E8;--cream2:#FBE9D6;--card:#fff;--ink:#2B1A12;--mut:#6E5546;--soft:#7D6455;--ln:#f0dccb;--fl:#e5d6c8;
  --terra:#B4532A;--terra2:#963F1C;--tint:#F8E2D3;--warn:#A4442B;--warnbg:#F6DDD5;--ok:#3E7B52;--okbg:#E2EFE4;
}
*{box-sizing:border-box;margin:0}
html{scroll-behavior:smooth}
body{background:var(--cream);color:var(--ink);font-family:Geist,system-ui,sans-serif;-webkit-font-smoothing:antialiased}
main{display:block;overflow-x:clip}
main a{color:inherit;text-decoration:none}
main :focus-visible{outline:2px solid var(--terra);outline-offset:3px}
.mono{font-family:'Geist Mono',ui-monospace,monospace}
.wrap{max-width:1160px;margin:0 auto;padding:0 32px}
.kick{font-size:11.5px;letter-spacing:.16em;text-transform:uppercase;font-weight:700;color:var(--terra)}
main h1,main h2,main h3{font-family:Geist,system-ui,sans-serif;font-weight:800;letter-spacing:-.035em}
.chipw{background:var(--terra);color:var(--cream);padding:0 .16em .06em;border-radius:.2em;display:inline-block;transform:rotate(-2deg)}
.vh{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);white-space:nowrap}

/* hero */
.crumb{font-size:12.5px;color:var(--soft);padding:18px 0 0}
.crumb b{color:var(--mut);font-weight:500}
.hero{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center;padding:40px 0 84px}
.edition{display:inline-flex;align-items:center;gap:10px;border:1px solid var(--ln);background:#fff;border-radius:999px;padding:6px 14px 6px 6px;font-size:13px;color:var(--mut);flex-wrap:wrap}
.edition b{background:var(--terra);color:#fff;border-radius:999px;padding:3px 10px;font-weight:700;font-size:12px}
.hero h1{font-size:70px;line-height:.98;margin:22px 0 22px;text-wrap:balance}
.lede{font-size:18px;line-height:1.6;color:var(--mut);max-width:520px}
.ctas{display:flex;gap:20px;align-items:center;margin-top:30px;flex-wrap:wrap}
.btn{height:54px;padding:0 26px;border-radius:999px;background:var(--ink);color:var(--cream);font-weight:700;font-size:15px;display:inline-flex;align-items:center;gap:10px;box-shadow:0 4px 0 var(--terra);transition:background .15s,transform .15s;border:0;cursor:pointer;font-family:Geist,sans-serif}
.btn:hover{background:#3d271c;transform:translateY(-1px)}
.lnk{font-size:15px;color:var(--terra);font-weight:700;display:inline-flex;align-items:center;gap:8px}
.lnk svg{width:18px;height:18px}
.lnk:hover{text-decoration:underline}
.trust{display:flex;gap:10px;margin-top:34px;flex-wrap:wrap;list-style:none;padding:0}
.trust li{background:#fff;border-radius:999px;padding:9px 16px;font-size:13px;font-weight:600;box-shadow:0 2px 0 var(--ln)}
.trust li:before{content:"";display:inline-block;width:8px;height:8px;border-radius:50%;background:var(--terra);margin-right:8px;vertical-align:1px}

.stage{position:relative;height:480px}
.stage .exl{position:absolute;left:4px;bottom:0;font-size:11px;letter-spacing:.14em;text-transform:uppercase;font-weight:700;color:var(--soft)}
.rw{position:absolute;left:0;top:34px;width:220px;filter:drop-shadow(0 22px 22px rgba(43,26,18,.22));transform:rotate(-4deg);animation:float 7s ease-in-out infinite;z-index:1}
@keyframes float{50%{transform:rotate(-3deg) translateY(-8px)}}
.rcpt{background:#fff;padding:20px 18px 30px;font-family:'Geist Mono',monospace;font-size:11.5px;line-height:1.55;color:#3a2a20;
  -webkit-mask:linear-gradient(#000,#000) top/100% calc(100% - 10px) no-repeat,radial-gradient(circle at 6px 0,transparent 5px,#000 5.5px) bottom/12px 10px repeat-x;
  mask:linear-gradient(#000,#000) top/100% calc(100% - 10px) no-repeat,radial-gradient(circle at 6px 0,transparent 5px,#000 5.5px) bottom/12px 10px repeat-x}
.rcpt .c{text-align:center}
.rcpt hr{border:0;border-top:1px dashed #c9b6a8;margin:9px 0}
.rcpt .l{display:flex;justify-content:space-between;gap:8px}
.rcpt .wc{text-align:center;border:2px solid var(--ink);padding:9px 6px;margin-top:12px;font-size:10px;letter-spacing:.08em;font-weight:700}
.rcpt .wc b{display:block;font-size:30px;letter-spacing:.22em;margin-top:2px;color:var(--ink)}
.rcpt .sm{text-align:center;margin-top:7px;font-size:9.5px;color:#7d6455}
.cph{position:absolute;left:min(200px,calc(100% - 214px));top:0;width:214px;height:430px;border:8px solid #1a1a1a;border-radius:34px;background:#fff;padding:30px 15px 16px;text-align:center;box-shadow:0 34px 60px -22px rgba(43,26,18,.5);z-index:2}
.cph:before{content:"";position:absolute;top:7px;left:50%;transform:translateX(-50%);width:62px;height:6px;border-radius:9px;background:#1a1a1a}
.cph .nm{font-weight:800;font-size:17px;color:var(--terra);letter-spacing:-.02em}
.cph .sb{font-size:11px;color:var(--soft);margin-top:2px}
.cph .fld{border:1px solid var(--fl);border-radius:10px;padding:10px;margin-top:10px;font-size:11.5px;text-align:left;color:#8a7262}
.cph .fld small{display:block;font-size:9.5px;color:#a08b7d;margin-bottom:1px}
.cph .tk{font-size:10.5px;text-align:left;margin-top:12px;color:var(--mut);display:flex;gap:7px;align-items:flex-start;line-height:1.35}
.cph .tk i{width:13px;height:13px;border:1.5px solid #b49a88;border-radius:3px;flex:none;margin-top:1px}
.cph .big{margin-top:14px;background:var(--terra);color:#fff;border-radius:16px;padding:16px 10px;font-weight:800;font-size:16px;letter-spacing:-.01em}
.cph .ft{font-size:10px;color:#8a7262;margin-top:9px}
.bub{position:absolute;right:0;bottom:44px;width:232px;background:var(--ink);color:var(--cream);border-radius:18px 18px 4px 18px;padding:13px 15px;font-size:12.5px;line-height:1.45;z-index:3;box-shadow:0 20px 34px -16px rgba(43,26,18,.55);transform:rotate(2deg)}
.bub s{display:block;text-decoration:none;font-size:10px;opacity:.65;margin-bottom:4px}

/* sections */
.sec{padding:96px 0}
.sec.alt{background:var(--cream2)}
.head{display:flex;justify-content:space-between;align-items:flex-end;gap:48px;flex-wrap:wrap}
.head h2{font-size:50px;line-height:1.02;margin-top:12px;max-width:660px}
.head p{max-width:380px;color:var(--mut);font-size:15.5px;line-height:1.6}

/* today / with switch */
.switch{display:inline-flex;background:#fff;border:1px solid var(--ln);border-radius:999px;padding:5px;margin-top:34px;box-shadow:0 3px 0 var(--ln)}
.switch button{border:0;background:transparent;font:700 15px Geist,sans-serif;color:var(--mut);height:46px;padding:0 22px;border-radius:999px;cursor:pointer;transition:background .25s,color .25s}
.switch button[aria-pressed=true]{background:var(--ink);color:var(--cream)}
.switch button.w[aria-pressed=true]{background:var(--terra);color:#fff}
.hint{font-size:13px;color:var(--mut);margin:12px 0 0 6px}
.scenes{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-top:30px}
.sc{background:var(--card);border:1px solid var(--ln);border-radius:24px;overflow:hidden;display:grid;grid-template-rows:auto 1fr;transition:border-color .4s,box-shadow .4s}
.sc.wide{grid-column:span 2;grid-template-columns:1fr 1.3fr;grid-template-rows:none}
.sc .txt{padding:24px 26px 6px}
.sc.wide .txt{padding:28px}
.lim{display:flex;align-items:center;gap:8px;font-size:11px;letter-spacing:.14em;text-transform:uppercase;font-weight:700}
.lim .dot{width:8px;height:8px;border-radius:50%;background:var(--warn);transition:background .4s}
.sc h3{font-size:25px;line-height:1.1;margin-top:10px}
.sc p{font-size:14.5px;color:var(--mut);line-height:1.55;margin-top:8px}
.sc .vis{position:relative;min-height:230px;margin:14px 18px 18px;border-radius:16px;background:var(--cream);overflow:hidden}
.sc.wide .vis{margin:18px;min-height:250px}
.vis:before{content:"An example";position:absolute;left:12px;top:10px;font-size:9.5px;letter-spacing:.14em;text-transform:uppercase;font-weight:700;color:var(--soft);z-index:2}
.st{position:absolute;inset:0;padding:30px 18px 18px;display:flex;align-items:center;justify-content:center;transition:opacity .45s ease,transform .45s ease}
.st.after{opacity:0;transform:translateY(10px);pointer-events:none;visibility:hidden}
.fixed .st.before{opacity:0;transform:translateY(-10px);pointer-events:none;visibility:hidden}
.fixed .st.after{opacity:1;transform:none;visibility:visible}
.t-after{display:none}
.fixed .t-before{display:none}.fixed .t-after{display:block}
.fixed .lim .t-after{display:inline}
.fixed .lim .dot{background:var(--ok)}
.fixed .sc{border-color:#e6c2ad;box-shadow:0 22px 40px -32px rgba(180,83,42,.7)}
.lim .lb{color:var(--warn)}.fixed .lim .lb{color:var(--ok)}
.tag-warn,.tag-ok{position:absolute;right:14px;bottom:12px;background:#fff;font-size:11.5px;border-radius:10px;padding:6px 10px;max-width:180px;line-height:1.35;font-weight:600}
.tag-warn{border:1px solid #ecc4b8;color:var(--warn)}
.tag-ok{border:1px solid #c8dfcc;color:var(--ok)}

.chalk{background:#2f2925;border:9px solid #8a5a3b;border-radius:8px;width:230px;padding:16px 14px 18px;color:#f3ece2;transform:rotate(-2.5deg) translateY(-12px);box-shadow:0 16px 24px -12px rgba(43,26,18,.5);text-align:center}
.chalk small{display:block;font-size:10px;letter-spacing:.22em;opacity:.7;font-weight:600}
.chalk b{display:block;font-size:20px;font-weight:700;margin-top:6px;letter-spacing:.01em}
.chalk i{display:block;font-style:normal;font-size:11.5px;opacity:.7;margin-top:8px}
.mrw{filter:drop-shadow(0 14px 14px rgba(43,26,18,.18));transform:rotate(2deg) translateY(-12px)}
.mrc{background:#fff;width:200px;padding:14px 14px 22px;font-family:'Geist Mono',monospace;font-size:10.5px;color:#3a2a20;text-align:center;
  -webkit-mask:linear-gradient(#000,#000) top/100% calc(100% - 8px) no-repeat,radial-gradient(circle at 5px 0,transparent 4px,#000 4.5px) bottom/10px 8px repeat-x;
  mask:linear-gradient(#000,#000) top/100% calc(100% - 8px) no-repeat,radial-gradient(circle at 5px 0,transparent 4px,#000 4.5px) bottom/10px 8px repeat-x}
.mrc .wc{border:2px solid var(--ink);padding:7px;margin-top:8px;font-weight:700;letter-spacing:.06em;font-size:9.5px}
.mrc .wc b{display:block;font-size:24px;letter-spacing:.22em;margin-top:2px}

.bw{width:100%}
.bw .bl{display:flex;justify-content:space-between;font-size:11.5px;color:var(--mut);margin-bottom:6px;gap:8px}
.bar{height:26px;border-radius:8px;background:#efe0d2;overflow:hidden;display:flex}
.bar i{display:block;height:100%}
.legend{display:flex;gap:14px;font-size:11px;color:var(--mut);margin-top:8px;flex-wrap:wrap}
.legend span:before{content:"";display:inline-block;width:9px;height:9px;border-radius:2px;margin-right:5px;background:var(--c);vertical-align:-1px}
.complaint{margin-top:14px;background:#fff;border-radius:12px 12px 12px 4px;padding:9px 12px;font-size:12.5px;border:1px solid var(--ln);display:inline-block}
.complaint s{text-decoration:none;color:var(--soft);font-size:10.5px;display:block}

.list{width:100%;background:#fff;border:1px solid var(--ln);border-radius:14px;padding:6px 14px;font-size:12.5px}
.list .hd{display:flex;justify-content:space-between;align-items:baseline;padding:8px 0 6px;font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;font-weight:700;color:var(--terra)}
.list .r{display:grid;grid-template-columns:1fr auto;gap:10px;padding:8px 0;border-top:1px solid #f5e8dd;align-items:center}
.list .r small{display:block;color:var(--soft);font-size:11px;margin-top:2px;overflow-wrap:anywhere}
.pill{font-size:10.5px;padding:3px 9px;border-radius:999px;font-weight:700;white-space:nowrap}
.pill.y{background:var(--okbg);color:var(--ok)}
.pill.n{background:#f3ebe4;color:var(--mut)}
.pill.w{background:var(--warnbg);color:var(--warn)}
.pill.t{background:var(--tint);color:var(--terra2)}

.ledger{width:100%;max-width:320px;font-size:13px;background:#fff;border:1px solid var(--ln);border-radius:14px;padding:14px 16px}
.ledger div{display:flex;justify-content:space-between;gap:10px;padding:8px 0;border-bottom:1px dashed #ead8c9}
.ledger div:last-child{border:0}
.neg{color:var(--warn);font-weight:700}

.floor{width:100%;max-width:300px}
.floor .bl{display:flex;justify-content:space-between;font-size:11.5px;color:var(--mut);margin-bottom:10px}
.tables{display:grid;grid-template-columns:repeat(6,1fr);gap:10px}
.tables i{aspect-ratio:1;border-radius:50%;border:2px dashed #d9bfae;display:block}
.tables i.on{background:var(--terra);border:2px solid var(--terra)}

.offer{width:100%;max-width:330px;background:#fff;border:1px solid var(--ln);border-radius:14px;padding:14px;font-size:12px;transform:translateY(-6px)}
.offer .hd{font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;font-weight:700;color:var(--terra)}
.offer .to{margin-top:6px;color:var(--mut)}
.offer .to b{color:var(--ink)}
.offer q{display:block;quotes:none;background:var(--cream);border-radius:12px 12px 12px 4px;padding:9px 11px;margin-top:9px;line-height:1.45}
.offer q em{font-style:normal;color:var(--soft)}
.offer .acts{display:flex;gap:6px;margin-top:10px;flex-wrap:wrap}
.offer .acts span{border:1px solid var(--ln);border-radius:999px;padding:5px 10px;font-weight:600;font-size:11px}
.offer .acts span.p{background:var(--ink);color:var(--cream);border-color:var(--ink)}

.guess{display:flex;gap:16px;flex-wrap:wrap;justify-content:center;transform:translateY(-10px)}
.note{background:#fff;width:170px;padding:16px 14px;font-weight:700;font-size:16px;line-height:1.25;letter-spacing:-.01em;box-shadow:0 12px 20px -12px rgba(43,26,18,.4);transform:rotate(-3deg);border-top:6px solid var(--terra)}
.note+.note{transform:rotate(2.5deg)}
.note small{display:block;font-weight:500;font-size:11.5px;color:var(--soft);margin-top:6px;letter-spacing:0}
.tdy{width:100%;background:#fff;border:1px solid var(--ln);border-radius:14px;padding:14px 16px}
.tdy .hd{font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;font-weight:700;color:var(--terra)}
.kpis{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:10px}
.kpis div{background:var(--cream);border-radius:10px;padding:9px 10px;font-size:11px;color:var(--mut);line-height:1.35}
.kpis b{display:block;font-size:22px;font-weight:800;color:var(--ink);letter-spacing:-.03em}
.hours{display:flex;align-items:flex-end;gap:4px;height:62px;margin-top:12px}
.hours i{flex:1;background:#ecc9b4;border-radius:3px 3px 0 0;display:block}
.hours i.pk{background:var(--terra)}
.hrs{display:flex;justify-content:space-between;font-size:9.5px;color:var(--soft);margin-top:4px;font-family:'Geist Mono',monospace}
.tdy .ft{font-size:11.5px;color:var(--mut);margin-top:10px;border-top:1px solid #f5e8dd;padding-top:8px}
.tdy .ft b{color:var(--ok)}

/* watch a day */
.day{display:grid;grid-template-columns:.9fr 1.1fr;gap:56px;margin-top:48px;align-items:start}
.steps{display:block}
.step{display:grid;grid-template-columns:64px 1fr;gap:14px;padding:18px 0;border:0;border-top:1px solid var(--ln);background:none;width:100%;text-align:left;font:inherit;color:inherit;cursor:pointer;transition:color .3s}
.step:last-of-type{border-bottom:1px solid var(--ln)}
.step:not(.on) b,.step:not(.on) .d{color:var(--soft)}
.step:not(.on):hover b{color:var(--ink)}
.step .t{font-family:'Geist Mono',monospace;color:var(--terra);font-size:14px;padding-top:4px;font-weight:600}
.step .sb{display:block}
.step b{font-weight:800;font-size:20px;letter-spacing:-.02em;display:block}
.step .d{display:block;font-size:14px;color:var(--mut);margin-top:4px;line-height:1.5}
.step .prog{grid-column:2;height:3px;background:var(--ln);margin-top:12px;border-radius:2px;overflow:hidden;display:none}
.step.on .prog{display:block}
.step .prog i{display:block;height:100%;background:var(--terra);width:0}
.step.on .prog i{animation:prog 5s linear forwards}
.paused .step.on .prog i{animation-play-state:paused}
@keyframes prog{to{width:100%}}
.dctl{display:flex;gap:10px;margin-top:16px;font-size:13px;color:var(--mut);align-items:center}
.dctl button{border:1px solid var(--ln);background:#fff;border-radius:999px;height:36px;padding:0 16px;font:600 13px Geist,sans-serif;cursor:pointer;color:var(--ink)}
.dstage{position:sticky;top:140px;background:#fff;border:1px solid var(--ln);border-radius:26px;padding:22px;min-height:460px;box-shadow:0 30px 60px -44px rgba(43,26,18,.6)}
.dstage .cols{display:grid;grid-template-columns:200px 1fr;gap:18px;font-size:12px;color:var(--soft);margin-bottom:16px;font-weight:600}
.frame{position:relative;height:390px}
.fr{position:absolute;inset:0;opacity:0;transform:translateY(8px);transition:opacity .45s,transform .45s;display:grid;grid-template-columns:200px 1fr;gap:18px;align-items:center;pointer-events:none;visibility:hidden}
.fr.on{opacity:1;transform:none;pointer-events:auto;visibility:visible}
.phone{width:200px;height:380px;border:8px solid #1a1a1a;border-radius:32px;background:#fff;padding:26px 13px 14px;position:relative;font-size:12px;overflow:hidden}
.phone:before{content:"";position:absolute;top:6px;left:50%;transform:translateX(-50%);width:60px;height:6px;border-radius:9px;background:#1a1a1a}
.ph-h{font-weight:800;font-size:16px;color:var(--terra);text-align:center;letter-spacing:-.02em;margin-top:4px}
.ph-s{text-align:center;color:var(--soft);font-size:10.5px;margin-top:2px}
.phone .fld{border:1px solid var(--fl);border-radius:10px;padding:9px 10px;margin-top:9px;color:#8a7262;font-size:11.5px}
.phone .fld small{display:block;font-size:9.5px;color:#a08b7d}
.phone .fld.f{color:var(--ink);font-family:'Geist Mono',monospace;font-weight:600}
.phone .fld.f small{font-family:Geist,sans-serif;font-weight:400}
.phone .fld.bad{border-color:var(--warn);background:#fdf3ef}
.phone .err{font-size:10.5px;color:var(--warn);margin-top:6px;line-height:1.4}
.tick{display:flex;gap:7px;align-items:flex-start;font-size:10.5px;color:var(--mut);margin-top:10px;line-height:1.35}
.cb{width:14px;height:14px;border:1.5px solid #b49a88;border-radius:3px;flex:none;display:grid;place-items:center;font-size:9px;color:#fff;margin-top:1px}
.cb.on{background:var(--terra);border-color:var(--terra)}
.go{background:var(--terra);color:#fff;text-align:center;border-radius:14px;padding:13px;font-weight:800;margin-top:12px;font-size:13.5px}
.go.dk{background:var(--ink);color:var(--cream)}
.okscreen{text-align:center;margin-top:30px}
.okscreen .ck{width:54px;height:54px;border-radius:50%;background:var(--okbg);color:var(--ok);display:grid;place-items:center;margin:0 auto 12px;font-size:24px;font-weight:700}
.okscreen p{color:var(--soft);font-size:11px;margin-top:6px;line-height:1.45}
.menu{display:block;text-align:center;margin-top:10px;font-size:11px;color:var(--terra);font-weight:700}
.used{background:var(--cream);border-radius:12px;padding:12px;margin-top:22px;font-size:12px;line-height:1.45;text-align:center}
.used b{display:block;font-size:13px;margin-bottom:4px}
.more{border:1.5px solid var(--terra);border-radius:12px;padding:10px;margin-top:12px;display:flex;justify-content:space-between;align-items:center;font-size:12px}
.more b{font-family:'Geist Mono',monospace;color:var(--terra)}
.bubble{background:var(--cream);border-radius:14px 14px 14px 4px;padding:10px 12px;line-height:1.45;margin-top:14px;font-size:12px}
.con{background:var(--cream);border:1px solid var(--ln);border-radius:16px;padding:16px;font-size:12.5px}
.con .nm{font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--terra);font-weight:700}
.con .big{font-weight:800;font-size:26px;letter-spacing:-.03em;margin:6px 0 10px}
.con .big.mono{font-family:'Geist Mono',monospace;letter-spacing:.12em;font-size:30px}
.con .row{display:flex;justify-content:space-between;gap:10px;padding:7px 0;border-top:1px solid var(--ln)}
.con .row span:last-child{text-align:right}
.con .ev{margin-top:10px;background:#fff;border-radius:10px;padding:9px 10px;border-left:3px solid var(--terra);font-size:12px;line-height:1.45}
.con .act{display:inline-block;margin-top:10px;background:var(--ink);color:var(--cream);border-radius:999px;padding:7px 13px;font-weight:700;font-size:12px}
.con .hours{height:44px;margin-top:8px}

/* pillars, start, faq */
.pillars{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:48px}
.pl{background:#fff;border-radius:22px;padding:24px;box-shadow:0 3px 0 var(--ln)}
.pl .n{display:flex;align-items:center;gap:8px;font-size:11.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--soft);font-weight:700}
.pl .n i{font-style:normal;font-family:'Geist Mono',monospace;color:#fff;background:var(--terra);border-radius:999px;padding:2px 8px;letter-spacing:0;font-size:11px}
.pl b{font-weight:800;font-size:20px;letter-spacing:-.025em;display:block;margin:12px 0 6px;line-height:1.2}
.pl p{font-size:14px;color:var(--mut);line-height:1.55}

.start{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-top:44px;list-style:none;padding:0}
.sp{background:#fff;border:1px solid var(--ln);border-radius:20px;padding:22px}
.sp .n{width:36px;height:36px;border-radius:50%;background:var(--terra);color:#fff;display:grid;place-items:center;font-weight:800;font-size:16px}
.sp b{display:block;font-weight:800;font-size:18px;letter-spacing:-.02em;margin:14px 0 6px}
.sp p{font-size:13.5px;color:var(--mut);line-height:1.5}
.sp .when{margin-top:12px;font-size:12px;color:var(--terra);font-family:'Geist Mono',monospace;font-weight:600}
.firstrun{margin-top:16px;font-size:14px;color:var(--mut);background:#fff;border-radius:999px;display:inline-flex;gap:8px;align-items:center;padding:10px 18px;box-shadow:0 2px 0 var(--ln);line-height:1.4}
.firstrun b{color:var(--ink)}
.faq{margin-top:48px;border-top:1px solid var(--ln)}
.faq details{border-bottom:1px solid var(--ln);padding:20px 0}
.faq summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:16px;font-weight:800;font-size:19px;letter-spacing:-.02em}
.faq summary::-webkit-details-marker{display:none}
.faq summary:after{content:"+";color:var(--terra);font-size:24px;font-weight:600;line-height:1;transition:transform .2s}
.faq details[open] summary:after{transform:rotate(45deg)}
.faq details p{color:var(--mut);font-size:15px;line-height:1.6;margin-top:10px;max-width:740px}

/* book */
.book{background:var(--ink);color:var(--cream);border-radius:30px;padding:56px;display:grid;grid-template-columns:1fr 1fr;gap:56px;position:relative;overflow:hidden;margin-top:24px}
.book:before{content:"";position:absolute;right:-110px;top:-110px;width:340px;height:340px;border-radius:50%;background:rgba(180,83,42,.18)}
.book>*{position:relative}
.book h2{font-size:46px;line-height:1.04;color:var(--cream)}
.book .lede{color:rgba(255,244,232,.72);margin-top:16px}
.book ul{list-style:none;padding:0;margin-top:26px;font-size:14.5px;color:rgba(255,244,232,.85)}
.book li{padding:7px 0}.book li:before{content:"✓";color:#E9946C;margin-right:10px;font-weight:700}
.bf{background:#fff;color:var(--ink);border-radius:20px;padding:26px}
.bf .ttl{font-weight:800;font-size:22px;letter-spacing:-.025em}
.bf label,.bf .flab{display:block;font-size:12.5px;font-weight:600;margin:14px 0 6px;color:var(--mut)}
.bf input{width:100%;height:46px;border:1px solid var(--fl);border-radius:12px;padding:0 14px;font:15px Geist,sans-serif;background:#fff;color:var(--ink)}
.bf input:focus{outline:2px solid var(--terra);outline-offset:1px;border-color:var(--terra)}
.seg{display:flex;gap:6px;flex-wrap:wrap}
.seg button{border:1px solid var(--fl);background:#fff;border-radius:999px;height:38px;padding:0 15px;font:600 13.5px Geist,sans-serif;cursor:pointer;color:var(--ink)}
.seg button[aria-pressed=true]{background:var(--terra);border-color:var(--terra);color:#fff}
.bf .submit{width:100%;justify-content:center;margin-top:22px}
.bf .or{text-align:center;font-size:13px;color:var(--mut);margin-top:14px}
.bf .or a{color:var(--terra);font-weight:700}
.done{display:none;text-align:center;padding:40px 10px}
.sent .fields{display:none}.sent .done{display:block}
.done .ck{width:60px;height:60px;border-radius:50%;background:var(--tint);color:var(--terra);display:grid;place-items:center;margin:0 auto 14px;font-size:26px;font-weight:700}
.done p{color:var(--mut);margin-top:8px;line-height:1.55}

@media (max-width:900px){
  .wrap{padding:0 16px}
  .hero,.day,.book{grid-template-columns:1fr}
  .hero{gap:40px;padding-bottom:64px}.hero h1{font-size:48px}
  .stage{max-width:470px;width:100%}
  .head{gap:16px}.head h2{font-size:36px}
  .sec{padding:72px 0}
  .scenes{grid-template-columns:1fr}.sc.wide{grid-column:auto;grid-template-columns:1fr}
  .pillars,.start{grid-template-columns:1fr}
  .dstage{position:relative;top:0;padding:16px;min-height:0}.dstage .cols{display:none}
  .frame{height:auto}
  .fr{position:static;display:none;grid-template-columns:1fr;justify-items:center;transform:none}
  .fr.on{display:grid}
  .fr .con{width:100%}
  .book{padding:28px 20px;border-radius:24px}.book h2{font-size:34px}
  .firstrun{border-radius:16px}
}
@media (max-width:560px){
  .hero h1{font-size:42px}
  .lede{font-size:16.5px}
  .stage{height:500px;overflow:hidden}
  .rw{width:176px;top:20px;left:0}
  .rcpt{font-size:10px;padding:16px 13px 26px}.rcpt .wc b{font-size:24px}
  .cph{left:auto;right:4px;top:44px;width:190px;height:400px;padding:28px 12px 14px}
  .bub{right:auto;left:6px;bottom:30px;width:220px}
  .switch button{padding:0 13px;font-size:14px;height:44px}
  .sc .txt{padding:22px 20px 4px}.sc.wide .txt{padding:22px 20px 4px}
  .sc .vis,.sc.wide .vis{margin:14px 12px 12px;min-height:260px}
  .st{padding:30px 12px 14px}
  .tag-warn,.tag-ok{right:10px;bottom:10px;max-width:160px}
  .kpis b{font-size:18px}
  .guess .note{width:140px;font-size:14px}
  .bf{padding:20px 16px}
}
@media (prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}html{scroll-behavior:auto}}
</style><link rel="stylesheet" href="assets/chrome.css">
</head>
<body data-edition="cafes">

<?php site_header('cafes'); ?>

<main id="main">
<div class="wrap">
  <div class="crumb">Editions / <b>Speedy Connect for Cafés &amp; restaurants</b></div>
  <section class="hero" aria-labelledby="h1">
    <div>
      <span class="edition"><b>for Cafés</b> restaurants · bakeries · lounges</span>
      <h1 id="h1">Free Wi-Fi that brings them <span class="chipw">back.</span></h1>
      <p class="lede">One tap gets a guest their free hour, and you get their number if they say yes to offers. Nobody camps on one laptop all afternoon. And when the slow hour comes, you can text everyone who said yes.</p>
      <div class="ctas">
        <a class="btn" href="#book">Book a café demo</a>
        <a class="lnk" href="<?= e(whatsapp_url('Hello Speedy Connect, I would like a demo')) ?>"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Zm5.3 14.1c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .1-3.3-.8-2.8-1.1-4.5-3.9-4.7-4.1-.1-.2-1.1-1.5-1.1-2.8s.7-2 1-2.3c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.8 2c.1.2.1.4 0 .5l-.4.6-.4.4c-.1.2-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.3 2.4 1.5.3.1.5.1.6-.1l.9-1c.2-.3.4-.2.6-.1l1.9.9c.3.1.5.2.5.3.1.2.1.7-.2 1.4Z"/></svg>WhatsApp us →</a>
      </div>
      <ul class="trust"><li>Works with your MikroTik</li><li>Consent built in</li><li>Live the same day</li></ul>
    </div>
    <div class="stage" role="img" aria-label="An example: a Kahawa Tamu receipt printed with today's Wi-Fi code 4821, a phone showing the Get my free hour page with the offers box unticked, and an SMS offer sent to guests who said yes.">
      <div class="rw"><div class="rcpt">
        <div class="c"><b>KAHAWA TAMU</b><br>Kilimani · Table 6<br>Thu 08:42</div><hr>
        <div class="l"><span>Cappuccino ×2</span><span>560</span></div>
        <div class="l"><span>Mandazi ×3</span><span>150</span></div><hr>
        <div class="l"><b>TOTAL</b><b>KES 710</b></div>
        <div class="wc">TODAY'S WI-FI CODE<b>4821</b></div>
        <div class="sm">changes every morning at opening</div>
      </div></div>
      <div class="cph">
        <div class="nm">Kahawa Tamu</div><div class="sb">Free Wi-Fi for our guests</div>
        <div class="fld">Phone number</div>
        <div class="fld"><small>Today's code (on your receipt)</small>4821</div>
        <div class="tk"><i></i>Send me offers from Kahawa Tamu</div>
        <div class="big">Get my free hour</div>
        <div class="ft">1 free hour a day</div>
      </div>
      <div class="bub"><s>SMS · to guests who said yes</s>Slow afternoon? 2-for-1 cappuccinos at Kahawa Tamu, 3–5pm today ☕ Reply STOP to stop.</div>
      <span class="exl">An example</span>
    </div>
  </section>
</div>

<section class="sec alt" id="limits" aria-labelledby="lim-h">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">Sound familiar?</div><h2 id="lim-h">Five things café Wi-Fi gets <span class="chipw">wrong</span>, and what changes.</h2></div>
      <p>Most cafés live with at least one of these. Flip the switch to see each one fixed.</p>
    </div>
    <div class="switch" role="group" aria-label="Compare your café today with Speedy Connect">
      <button type="button" class="b" aria-pressed="true" data-mode="today">Your café today</button>
      <button type="button" class="w" aria-pressed="false" data-mode="with">With Speedy Connect</button>
    </div>
    <p class="hint" id="hint" aria-live="polite">← You're looking at today. Try the switch.</p>

    <div class="scenes" id="scenes">
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">The chalkboard password</span><span class="lb t-after">Today's code</span></div>
          <h3 class="t-before">The password is on the chalkboard. The shop next door knows it too.</h3>
          <h3 class="t-after">If you want, the Wi-Fi asks for today's code. It changes every morning.</h3>
          <p class="t-before">So do the people on the pavement outside. Your line is shared with people who never ordered a thing.</p>
          <p class="t-after">A 4-digit code that renews by itself at opening time, printed on the receipt or the menu board. Anyone who types yesterday's code is told it has expired.</p>
        </div>
        <div class="vis">
          <div class="st before"><div class="chalk"><small>FREE WI-FI</small><b>kahawatamu2024</b><i>same password since 2024</i></div><span class="tag-warn">Also used next door and on the pavement</span></div>
          <div class="st after"><div class="mrw"><div class="mrc">KAHAWA TAMU · THU<div class="wc">TODAY'S WI-FI CODE<b>4821</b></div></div></div><span class="tag-ok">Renewed 07:00 · yesterday's code has expired</span></div>
        </div>
      </article>
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">The laptop campers</span><span class="lb t-after">A free hour each</span></div>
          <h3 class="t-before">One coffee, one table, one laptop, all afternoon.</h3>
          <h3 class="t-after">Every phone and laptop gets a free hour a day. Then it's someone else's turn.</h3>
          <p class="t-before">Meanwhile the Wi-Fi is slow for everyone else, and the guests who'd order a second round give up.</p>
          <p class="t-after">Time, data and speed are your settings: 1 hour, 500 MB and 5 Mbps to start. The same device twice is told "back tomorrow from 07:00". Sell more time by M-Pesa if you like.</p>
        </div>
        <div class="vis">
          <div class="st before"><div class="bw"><div class="bl"><span>Your internet line · 14:30</span><span class="mono" style="color:var(--warn)">94% used</span></div><div class="bar"><i style="width:74%;background:#C0705A"></i><i style="width:20%;background:#e3b8a6"></i></div><div class="legend"><span style="--c:#C0705A">One laptop, Table 4, since 10:00</span><span style="--c:#e3b8a6">Everyone else</span></div><div class="complaint"><s>Table 9 · 14:32</s>"Is the Wi-Fi down?"</div></div></div>
          <div class="st after"><div class="list"><div class="hd"><span>Online now</span><span>5 Mbps each</span></div><div class="r"><span>Phone · Table 2<small>free hour · 41 min left</small></span><span class="pill y">online</span></div><div class="r"><span>Phone · Table 9<small>free hour · 12 min left</small></span><span class="pill y">online</span></div><div class="r"><span>Laptop · Table 4<small>3 more hours · KES 50, if you sell it</small></span><span class="pill t">back tomorrow 07:00</span></div></div></div>
        </div>
      </article>
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">Nobody to call back</span><span class="lb t-after">Visitors</span></div>
          <h3 class="t-before">Hundreds of guests a week. Not one number to show for it.</h3>
          <h3 class="t-after">A visitor list that builds itself, one row per person.</h3>
          <p class="t-before">They came, they liked it, they left. If they don't come back by themselves, you'll never know who they were.</p>
          <p class="t-after">A phone number or an email, how many visits, first and last visit, and whether they said yes to offers, with the date they said it.</p>
        </div>
        <div class="vis">
          <div class="st before"><div class="ledger"><div><span>Guests through the door</span><span>every day</span></div><div><span>Numbers you kept</span><span class="mono neg">0</span></div><div><span>Ways to reach them</span><span class="neg">none</span></div></div></div>
          <div class="st after"><div class="list"><div class="hd"><span>Visitors</span><span>Offers</span></div><div class="r"><span>Ann Wairimu · 0712 448 120<small>23 visits · since June · last today 08:41</small></span><span class="pill y">yes · 14 Jun</span></div><div class="r"><span>Halima Yusuf<small>halima.yusuf@mail.co.ke · 4 visits</small></span><span class="pill y">yes · 2 Sep</span></div><div class="r"><span>Joseph Mutiso · 0723 610 954<small>new today · 09:02</small></span><span class="pill n">no</span></div></div></div>
        </div>
      </article>
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">The 3pm lull</span><span class="lb t-after">Send an offer</span></div>
          <h3 class="t-before">Empty tables at 3pm, and no way to reach your regulars.</h3>
          <h3 class="t-after">Send an offer to the people who said yes. Only them.</h3>
          <p class="t-before">You could post on social media and hope. The people who already love your mandazi won't see it.</p>
          <p class="t-after">By SMS or email, each the way they left their contact. Send yourself a test first. Every SMS says how to stop, and a STOP reply takes them off the list.</p>
        </div>
        <div class="vis">
          <div class="st before"><div class="floor"><div class="bl"><span>Thursday · 15:00</span><span style="color:var(--warn)">2 of 12 tables</span></div><div class="tables"><i class="on"></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i class="on"></i><i></i><i></i><i></i></div></div><span class="tag-warn">Your regulars are out there. You can't reach them.</span></div>
          <div class="st after"><div class="offer"><div class="hd">Send an offer</div><div class="to">To <b>the guests who said yes</b> · SMS to numbers, email to the rest</div><q>2-for-1 cappuccinos at Kahawa Tamu, 3–5pm today ☕ <em>Reply STOP to stop.</em></q><div class="acts"><span>Send me a test first</span><span class="p">Send now</span></div></div></div>
        </div>
      </article>
      <article class="sc wide">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">Guesswork</span><span class="lb t-after">Today and Reports</span></div>
          <h3 class="t-before">You guess when you're busy, and who comes back.</h3>
          <h3 class="t-after">Busy hours and returning guests, on the first screen you open.</h3>
          <p class="t-before">Is it really lunch? Do Saturdays beat Fridays? Are people coming back, or is it always new faces? Right now, nobody knows.</p>
          <p class="t-after">Today shows who's online now, visits so far (new and back) and the busy hours. The visits report opens on the month: visits, people, new and back, how many came back within 30 days, and the busiest hours.</p>
        </div>
        <div class="vis">
          <div class="st before"><div class="guess"><div class="note">Busy at lunch… I think?<small>the owner's guess</small></div><div class="note">Regulars? Maybe Ann.<small>the waiter's guess</small></div></div><span class="tag-warn">No numbers, only guesses</span></div>
          <div class="st after"><div class="tdy"><div class="hd">Today · Thursday 13:10</div><div class="kpis"><div><b>14</b>online now</div><div><b>31</b>visits · 19 back, 12 new</div><div><b>27</b>by now on a usual Thursday</div></div><div class="hours"><i style="height:30%"></i><i class="pk" style="height:92%"></i><i style="height:58%"></i><i style="height:44%"></i><i style="height:50%"></i><i class="pk" style="height:84%"></i><i style="height:70%"></i><i style="height:28%"></i><i style="height:22%"></i><i style="height:40%"></i><i style="height:46%"></i><i style="height:30%"></i><i style="height:18%"></i><i style="height:12%"></i><i style="height:8%"></i></div><div class="hrs"><span>07</span><span>10</span><span>13</span><span>16</span><span>19</span><span>21</span></div><div class="ft">Visits report · September: <b>41% came back within 30 days</b></div></div></div>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="sec" id="day" aria-labelledby="day-h">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">An example: a Thursday at Kahawa Tamu</div><h2 id="day-h">Watch a day run itself.</h2></div>
      <p>An 80-seat café in Kilimani, open from 07:00. What the guest sees on their phone, next to what your staff see in the console.</p>
    </div>
    <div class="day" id="dayw">
      <div>
        <div class="steps" role="group" aria-label="Moments in the day">
          <button type="button" class="step on" aria-current="step"><span class="t">07:00</span><span class="sb"><b>A new code for a new day</b><span class="d">Today's code renews by itself at opening: 4821. Staff print the code card for the counter.</span></span><span class="prog"><i></i></span></button>
          <button type="button" class="step"><span class="t">10:15</span><span class="sb"><b>A guest gets online</b><span class="d">She taps Get my free hour, leaves her number and ticks the offers box herself.</span></span><span class="prog"><i></i></span></button>
          <button type="button" class="step"><span class="t">13:00</span><span class="sb"><b>The lunch rush stays fair</b><span class="d">Every table on its free hour, 5 Mbps each. No single laptop takes the line.</span></span><span class="prog"><i></i></span></button>
          <button type="button" class="step"><span class="t">15:00</span><span class="sb"><b>An hour well used</b><span class="d">A guest whose hour is up is told when it comes back, and offered more time, because this café sells it.</span></span><span class="prog"><i></i></span></button>
          <button type="button" class="step"><span class="t">16:00</span><span class="sb"><b>The slow hour gets a nudge</b><span class="d">An offer goes to the guests who said yes, by SMS or email.</span></span><span class="prog"><i></i></span></button>
        </div>
        <div class="dctl"><button type="button" id="pp">❚❚ Pause</button><span>or choose any moment</span></div>
      </div>
      <div class="dstage" id="dstage" aria-live="off">
        <div class="cols" aria-hidden="true"><span>What the guest sees</span><span>What your staff see</span></div>
        <div class="frame">
          <div class="fr on">
            <div class="phone"><div class="ph-h">Kahawa Tamu</div><div class="ph-s">Free Wi-Fi for our guests</div><div class="fld f"><small>Phone number</small>0733 905 214</div><div class="fld f bad"><small>Today's code</small>7390</div><p class="err">That was yesterday's code. Today's is on your receipt.</p><div class="go">Get my free hour</div></div>
            <div class="con"><div class="nm">Today · Thursday</div><div class="big mono">4821</div><div class="row"><span>Today's code</span><span>renewed 07:00, at opening</span></div><div class="row"><span>Yesterday's code</span><span>expired</span></div><span class="act">Print the code card</span><div class="ev">Code card printed at the counter · 07:03</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-h">Kahawa Tamu</div><div class="ph-s">Free Wi-Fi for our guests</div><div class="fld f"><small>Phone number</small>0745 210 337</div><div class="fld f"><small>Today's code</small>4821</div><div class="tick"><span class="cb on" aria-hidden="true">✓</span>Send me offers from Kahawa Tamu</div><div class="go">Get my free hour</div><p class="ph-s" style="margin-top:9px">1 free hour a day</p></div>
            <div class="con"><div class="nm">Visitors · new today</div><div class="big">0745 210 337</div><div class="row"><span>First visit</span><span>today 10:15</span></div><div class="row"><span>Visits</span><span>1</span></div><div class="row"><span>Offers</span><span style="color:var(--ok);font-weight:700">yes · today 10:15</span></div><div class="ev">Free hour started · 1 hour, 500 MB, 5 Mbps</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-h">Kahawa Tamu</div><div class="okscreen"><div class="ck">✓</div><b style="font-size:14px">You're online</b><p>38 minutes left of your free hour</p></div><div class="go dk">Continue to the internet</div><span class="menu">See our menu →</span></div>
            <div class="con"><div class="nm">Today · 13:00</div><div class="big">Lunch rush</div><div class="row"><span>Online now</span><span class="mono">38</span></div><div class="row"><span>Each device</span><span>up to 5 Mbps</span></div><div class="row"><span>Visits today</span><span>64 · 37 back, 27 new</span></div><div class="hours" aria-hidden="true"><i style="height:30%"></i><i style="height:70%"></i><i style="height:52%"></i><i style="height:40%"></i><i style="height:48%"></i><i class="pk" style="height:96%"></i></div><div class="ev">The line is shared fairly. Nobody waits for one laptop.</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-h">Kahawa Tamu</div><div class="used"><b>Your free hour is used for today</b>It's back tomorrow from 07:00.</div><div class="more"><span>3 more hours</span><b>KES 50</b></div><div class="go">Pay with M-Pesa</div><p class="ph-s" style="margin-top:9px">Only if the café sells more time</p></div>
            <div class="con"><div class="nm">Today · more time sold</div><div class="big">KES 150</div><div class="row"><span>3 more hours</span><span>KES 50 each</span></div><div class="row"><span>Sold today</span><span class="mono">3</span></div><div class="row"><span>Paid by</span><span>M-Pesa, on the Wi-Fi page</span></div><div class="ev">M-Pesa · 3 more hours · KES 50 · 15:02</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-s" style="margin-top:4px">Messages</div><div class="bubble"><b>Kahawa Tamu</b><br>Slow afternoon? 2-for-1 cappuccinos at Kahawa Tamu, 4–6pm today ☕ Reply STOP to stop.</div><p class="ph-s" style="margin-top:8px;text-align:left">16:00</p></div>
            <div class="con"><div class="nm">Visitors · send an offer</div><div class="big">2-for-1 cappuccinos</div><div class="row"><span>Goes to</span><span>only the guests who said yes</span></div><div class="row"><span>How</span><span>SMS to numbers, email to the rest</span></div><div class="row"><span>Test</span><span>sent to you first · 15:55</span></div><div class="ev">Sent 16:00 · "Reply STOP to stop" added. A STOP reply takes a guest off the list.</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="sec alt" aria-labelledby="pl-h">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">The network underneath</div><h2 id="pl-h">The same Speedy Connect, set up for how a café runs.</h2></div>
      <p>Every edition shares one network platform. Here's what each part does for a café.</p>
    </div>
    <div class="pillars">
      <div class="pl"><span class="n"><i>01</i> Routers</span><b>Your MikroTik at the counter, watched.</b><p>Set up with one paste. You get an email if it goes quiet, and you can swap it without your guests noticing.</p></div>
      <div class="pl"><span class="n"><i>02</i> Access</span><b>A free hour, today's code, or a table code.</b><p>One tap for the free hour. Add today's code if you want only paying customers online, table codes if you ever need them, and paid passes if you sell more time.</p></div>
      <div class="pl"><span class="n"><i>03</i> Control</span><b>Time, data and speed, per visit and per device.</b><p>An hour, 500 MB and 5 Mbps to start. Change any of them, so the line is shared fairly when it's busy.</p></div>
      <div class="pl"><span class="n"><i>04</i> Money</span><b>Sell extra time by M-Pesa, if you want to.</b><p>Off until you turn it on. Guests pay on the same Wi-Fi page, and you see what sold today.</p></div>
      <div class="pl"><span class="n"><i>05</i> Guests</span><b>A contact list, and offers that respect it.</b><p>A phone number or an email, kept only with a yes. Offers go by SMS or email to the people who said yes, and STOP takes anyone off.</p></div>
      <div class="pl"><span class="n"><i>06</i> Visibility</span><b>Busy hours, regulars and a visits report.</b><p>Today shows who's online and how the day is going. The monthly report shows visits, new and back, and the busiest hours. Export it as CSV.</p></div>
    </div>
  </div>
</section>

<section class="sec" aria-labelledby="go-h">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">Getting started</div><h2 id="go-h">Live the same day you decide.</h2></div>
      <p>You keep your router. We set up the rest with you on a call.</p>
    </div>
    <ol class="start">
      <li class="sp"><span class="n">1</span><b>A call with us</b><p>We look at your café, your router and how you'd like the free hour to work.</p><div class="when">30 minutes</div></li>
      <li class="sp"><span class="n">2</span><b>Choose your free hour</b><p>How long, how much data, and what you ask guests: a phone number, an email, either, or nothing.</p><div class="when">minutes</div></li>
      <li class="sp"><span class="n">3</span><b>Connect your router</b><p>Paste one line into your MikroTik. That's the whole install.</p><div class="when">minutes</div></li>
      <li class="sp"><span class="n">4</span><b>Print today's code card</b><p>If you use today's code, print the card for the counter. Guests are online.</p><div class="when">same day</div></li>
    </ol>
    <p class="firstrun"><b>First sign-in?</b> The console's Today screen walks you through a three-step set-up.</p>
    <div class="faq">
      <details open><summary>Is it allowed to collect guests' numbers?</summary><p>With the guest's consent, yes, and Speedy Connect is built around that, as Kenya's Data Protection Act asks. The offers box is unticked until the guest ticks it, and their yes is kept with the date they gave it. Offers go only to people who said yes, every SMS says how to stop, and a STOP reply takes them off the list. You can also forget a person: their contact, visits and devices are removed.</p></details>
      <details><summary>Can I charge for Wi-Fi?</summary><p>You can, but you don't have to. The free hour stays free. If you want, sell more time as passes on the same Wi-Fi page, like 3 more hours for KES 50, paid by M-Pesa. It's off until you turn it on.</p></details>
      <details><summary>Do I need a new router?</summary><p>Not if you have a MikroTik: you keep it, and connecting it is one line pasted into it. If you don't have one yet, we'll talk through it on the call.</p></details>
      <details><summary>I have more than one branch.</summary><p>Each branch's router joins the same account, grouped by location, so you run every branch from one place.</p></details>
    </div>
  </div>
</section>

<section class="wrap" id="book" aria-labelledby="bk-h">
  <div class="book">
    <div>
      <div class="kick" style="color:#E9946C">Book a café demo</div>
      <h2 id="bk-h" style="margin-top:12px">See your own <span class="chipw">café</span> running on Speedy Connect.</h2>
      <p class="lede">30 minutes on a call or video. We'll set up a demo with your café's name and show you the free hour, today's code and sending an offer.</p>
      <ul><li>No commitment, no card</li><li>We reply on WhatsApp to agree a time</li><li>Bring whoever looks after your router</li></ul>
    </div>
    <form class="bf" id="f" novalidate method="get" action="<?= e(whatsapp_url()) ?>" target="_blank" data-booking>
<?php booking_fields('cafes'); ?>
      <div class="fields">
        <div class="ttl">Book my demo</div>
        <span class="flab" id="ed-l">Your edition</span>
        <div class="seg" role="group" aria-labelledby="ed-l"><button type="button" aria-pressed="false">ISP</button><button type="button" aria-pressed="false">Hotel</button><button type="button" aria-pressed="true">Café</button><button type="button" aria-pressed="false">School</button><button type="button" aria-pressed="false">Venue</button></div>
        <label for="n">Your name</label><input id="n" name="name" required minlength="2" maxlength="80" placeholder="Njeri Mwangi" autocomplete="name">
        <label for="cn">Café name</label><input id="cn" name="business" required minlength="2" maxlength="120" placeholder="Kahawa Tamu" autocomplete="organization">
        <label for="p">Your phone number</label><input id="p" name="phone" type="tel" required maxlength="20" placeholder="0712 345 678" inputmode="tel" autocomplete="tel">
        <span class="flab" id="seat-l">How many seats?</span>
        <div class="seg" role="group" aria-labelledby="seat-l"><button type="button" aria-pressed="false">1–30</button><button type="button" aria-pressed="true">31–80</button><button type="button" aria-pressed="false">81+</button></div>
        <button class="btn submit" id="sb" type="submit">Continue on WhatsApp →</button>
        <p class="or">or <a href="<?= e(whatsapp_url('Hello Speedy Connect, I would like a demo')) ?>">chat with us on WhatsApp now</a></p>
      </div>
      <div class="done" aria-live="polite"><div class="ck" aria-hidden="true">✓</div><div class="ttl" id="thx" tabindex="-1">Thanks, <span id="nm">Njeri</span>.</div><p>Press <b>Send</b> in WhatsApp and we'll reply to agree a time for your demo.</p></div>
    </form>
  </div>
</section>
</main>

<div style="height:96px"></div><?php site_footer(); ?>

<script src="assets/site.js"></script>
<script src="assets/booking.js"></script>
<script src="assets/page-cafes.js"></script>
</body></html>
