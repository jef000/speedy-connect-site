<?php require_once __DIR__ . '/../src/site.php'; page_begin('schools'); ?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><link rel="icon" href="favicon.svg" type="image/svg+xml"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Speedy Connect for Schools</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700;800&family=Geist+Mono:wght@500;600&display=swap" rel="stylesheet">
<style>
:root{
  --paper:#F4F6FA;--card:#FFFFFF;--navy:#1F3A68;--navy2:#162B4F;--ink:#14223D;--mut:#4A5A78;--soft:#5E6C88;
  --hl:#CFE0FA;--ln:#DCE3EF;--cell:#F0F3F8;--dim:#9FB2D6;--red:#C0392B;--redbg:#FBECEA;
}
*{box-sizing:border-box;margin:0}
html{scroll-behavior:smooth}
body{background:var(--paper);color:var(--ink);font-family:Geist,system-ui,sans-serif;-webkit-font-smoothing:antialiased;overflow-x:hidden}
a{color:inherit;text-decoration:none}
.mono{font-family:'Geist Mono',ui-monospace,monospace}
.wrap{max-width:1160px;margin:0 auto;padding:0 32px}
h1,h2,h3{font-family:Geist,system-ui,sans-serif;font-weight:800;letter-spacing:-.025em}
.hl{box-shadow:inset 0 -.34em 0 var(--hl)}
.kick{display:flex;align-items:center;gap:10px;font-size:11.5px;letter-spacing:.16em;text-transform:uppercase;font-weight:700;color:var(--navy)}
.kick i{font-style:normal;font-family:'Geist Mono',monospace;letter-spacing:0;font-size:11px;border:1px solid var(--navy);border-radius:4px;padding:2px 6px}
.ex{display:inline-flex;align-items:center;gap:6px;font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;font-weight:700;color:var(--soft)}
.ex:before{content:"";width:6px;height:6px;border-radius:50%;background:var(--dim)}
:focus-visible{outline:2px solid var(--navy);outline-offset:2px}

.crumb{font-size:12.5px;color:var(--soft);padding:18px 0 0}
.crumb b{color:var(--mut);font-weight:500}

/* hero */
.hero{display:grid;grid-template-columns:1fr 1.02fr;gap:56px;align-items:center;padding:40px 0 88px}
.edition{display:inline-flex;align-items:center;gap:10px;border:1px solid var(--ln);background:var(--card);border-radius:6px;padding:5px 12px 5px 5px;font-size:13px;color:var(--mut)}
.edition b{background:var(--navy);color:#fff;border-radius:4px;padding:3px 9px;font-weight:600;font-size:12px;letter-spacing:.02em}
.hero h1{font-size:58px;line-height:1.03;margin:22px 0 22px;text-wrap:balance;overflow-wrap:break-word}
.lede{font-size:18px;line-height:1.6;color:var(--mut);max-width:520px}
.ctas{display:flex;gap:18px;align-items:center;margin-top:30px;flex-wrap:wrap}
.btn{height:52px;padding:0 24px;border-radius:6px;background:var(--navy);color:#fff;font-weight:700;font-size:15px;display:inline-flex;align-items:center;gap:10px;letter-spacing:.01em;box-shadow:0 14px 28px -16px rgba(20,34,61,.8);transition:background .15s;border:0;cursor:pointer;font-family:Geist,sans-serif}
.btn:hover{background:var(--navy2)}
.lnk{font-size:15px;color:var(--navy);border-bottom:1px solid currentColor;padding-bottom:2px;font-weight:600}
.wa{display:inline-flex;align-items:center;gap:8px}
.wa svg{width:18px;height:18px}
.trust{display:flex;gap:22px;margin-top:34px;font-size:13px;color:var(--soft);flex-wrap:wrap}
.trust span:before{content:"✓";color:var(--navy);margin-right:7px;font-weight:800}

/* the timetable */
.stage{position:relative;padding:0 0 110px 0}
.stage .ex{position:absolute;right:4px;top:-24px}
.tt{background:var(--card);border:1px solid var(--ln);border-radius:12px;padding:18px;font-size:11px;box-shadow:0 34px 60px -40px rgba(20,34,61,.55)}
.tt-hd{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;padding-bottom:12px;margin-bottom:12px;border-bottom:2px solid var(--ink)}
.tt-hd b{font-size:14px;font-weight:800;display:block}
.tt-hd small{display:block;color:var(--soft);font-size:11px;margin-top:2px}
.now{background:var(--hl);color:var(--navy);border-radius:4px;padding:4px 8px;font-size:10.5px;font-weight:600;white-space:nowrap}
.grid{display:grid;grid-template-columns:44px repeat(7,1fr);grid-template-rows:20px repeat(6,30px);gap:3px}
.grid .d{text-align:center;color:var(--soft);font-weight:700;font-size:10.5px;align-self:center;border-radius:3px}
.grid .d.today{background:var(--ink);color:#fff}
.grid .h{color:var(--soft);font-family:'Geist Mono',monospace;font-size:10px;align-self:center}
.cell{border-radius:4px;background:var(--cell);white-space:nowrap;overflow:visible;position:relative;z-index:1}
.cell:not(:empty){z-index:2}
.lec{background:var(--hl);color:var(--navy);font-weight:700;font-size:10px;padding:4px 6px}
.off{background:var(--ink);color:#C9D6EE;font-weight:600;font-size:10px;padding:4px 6px}
.key{display:flex;gap:14px;margin:0 0 12px;color:var(--mut);flex-wrap:wrap;font-size:11px}
.key span:before{content:"";display:inline-block;width:10px;height:10px;border-radius:2px;margin-right:5px;vertical-align:-1px;background:var(--c);border:1px solid var(--ln)}

.slip{background:var(--card);border:1.5px dashed var(--dim);padding:16px 18px;font-size:12px;width:280px;box-shadow:0 22px 36px -24px rgba(20,34,61,.6)}
.stage .slip{position:absolute;left:-22px;bottom:0;transform:rotate(-2.5deg);z-index:3}
.slip .cut{display:flex;align-items:center;gap:6px;color:var(--soft);font-size:9.5px;letter-spacing:.14em;text-transform:uppercase;margin:-6px 0 8px}
.slip .cut svg{width:14px;height:14px}
.slip .sn{font-weight:800;color:var(--navy);font-size:11px;letter-spacing:.06em}
.slip .who{margin-top:8px;color:var(--ink)}
.slip .num{color:var(--mut);font-size:12px;margin-top:2px}
.slip .pin{font-family:'Geist Mono',monospace;font-size:24px;letter-spacing:.22em;color:var(--ink);margin-top:8px;font-weight:600}
.slip .pin small{display:block;font-family:Geist,sans-serif;font-size:9.5px;letter-spacing:.14em;color:var(--soft);font-weight:600}
.slip .how{color:var(--soft);margin-top:6px;font-size:11px;line-height:1.45}
.stage .tag{position:absolute;right:10px;bottom:22px;z-index:2}
.tag{background:var(--card);border:1px solid var(--ln);border-left:4px solid var(--navy);border-radius:4px;padding:9px 12px;font-size:11.5px;line-height:1.4;max-width:220px;box-shadow:0 14px 26px -20px rgba(20,34,61,.6)}
.tag s{display:block;text-decoration:none;color:var(--soft);font-size:10.5px}
.tag.bad{border-left-color:var(--red)}
.tag.bad b{color:var(--red)}

/* sections */
.sec{padding:96px 0}
.sec.alt{background:var(--card);border-top:1px solid var(--ln);border-bottom:1px solid var(--ln)}
.head{display:flex;justify-content:space-between;align-items:flex-end;gap:48px;flex-wrap:wrap}
.head h2{font-size:46px;line-height:1.06;margin-top:14px;max-width:660px}
.head p{max-width:380px;color:var(--mut);font-size:15.5px;line-height:1.6}

/* before / after */
.switch{display:inline-flex;background:var(--card);border:1px solid var(--ln);border-radius:8px;padding:4px;margin-top:34px;box-shadow:0 10px 26px -20px rgba(20,34,61,.6)}
.switch button{border:0;background:transparent;font:600 15px Geist,sans-serif;color:var(--mut);height:46px;padding:0 22px;border-radius:5px;cursor:pointer;transition:all .25s}
.switch button[aria-pressed=true]{background:var(--ink);color:#fff}
.switch button.w[aria-pressed=true]{background:var(--navy)}
.hint{font-size:13px;color:var(--soft);margin:12px 0 0 4px}
.scenes{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-top:30px}
.scene{background:var(--card);border:1px solid var(--ln);border-radius:12px;overflow:hidden;display:grid;grid-template-rows:auto 1fr;transition:border-color .4s,box-shadow .4s}
.scene.wide{grid-column:span 2;grid-template-columns:1fr 1.3fr;grid-template-rows:none}
.scene .txt{padding:24px 26px 6px}
.scene.wide .txt{padding:28px}
.lim{display:flex;align-items:center;gap:8px;font-size:11px;letter-spacing:.14em;text-transform:uppercase;font-weight:700;padding-bottom:12px;border-bottom:1px solid var(--ln)}
.lim .dot{width:8px;height:8px;border-radius:2px;background:var(--red);transition:background .4s}
.lim .lb{color:var(--red)}
.scene h3{font-size:23px;line-height:1.18;margin-top:14px}
.scene p{font-size:14.5px;color:var(--mut);line-height:1.55;margin-top:8px}
.vis{position:relative;min-height:260px;margin:14px 18px 18px;border-radius:8px;background:var(--paper);border:1px solid var(--ln);overflow:hidden}
.scene.wide .vis{margin:18px;min-height:300px}
.st{position:absolute;inset:0;padding:18px;display:flex;align-items:center;justify-content:center;transition:opacity .45s ease,transform .45s ease}
.st.after{opacity:0;transform:translateY(10px);pointer-events:none}
.fixed .st.before{opacity:0;transform:translateY(-10px);pointer-events:none}
.fixed .st.after{opacity:1;transform:none}
.t-after{display:none}
.fixed .t-before{display:none}.fixed .t-after{display:block}
.fixed .lim .t-after{display:inline}
.fixed .lim .dot{background:var(--navy)}
.fixed .lim .lb{color:var(--navy)}
.fixed .scene{border-color:#C3D3EE;box-shadow:0 20px 40px -34px rgba(31,58,104,.7)}

.board{background:#fff;border:6px solid #C9D3E6;border-radius:4px;width:230px;padding:16px 18px;transform:rotate(-2deg);box-shadow:0 14px 24px -16px rgba(20,34,61,.5)}
.board s{display:block;text-decoration:none;font-size:10px;letter-spacing:.16em;color:var(--soft);font-weight:700}
.board b{display:block;font-size:22px;font-weight:800;margin-top:6px;color:var(--ink)}
.board b span{color:var(--navy)}
.board small{display:block;font-size:12px;color:var(--mut);margin-top:6px}
.vis .tag{position:absolute;right:14px;bottom:14px;max-width:180px}
.mini{width:240px;transform:rotate(-1.5deg)}
.mini .pin{font-size:20px}

.bw{width:100%}
.bw .lbl{display:flex;justify-content:space-between;font-size:11.5px;color:var(--mut);margin-bottom:6px}
.bar{height:24px;border-radius:4px;background:#E3E9F3;overflow:hidden;display:flex}
.bar i{display:block;height:100%}
.legend{display:flex;gap:14px;font-size:11px;color:var(--mut);margin-top:8px;flex-wrap:wrap}
.legend span:before{content:"";display:inline-block;width:9px;height:9px;border-radius:2px;margin-right:5px;background:var(--c);vertical-align:-1px}
.say{margin-top:14px;background:#fff;border-radius:10px 10px 10px 3px;padding:9px 12px;font-size:12.5px;border:1px solid var(--ln);display:inline-block}
.say s{text-decoration:none;color:var(--soft);font-size:10.5px;display:block}

.rule{width:100%;max-width:300px;background:#fff;border:1px solid var(--ln);border-radius:8px;font-size:12.5px;overflow:hidden}
.rule .rh{background:var(--hl);color:var(--navy);padding:9px 12px;font-weight:700;display:flex;justify-content:space-between;gap:8px}
.rule .rh.dark{background:var(--ink);color:#fff}
.rule .r{display:flex;justify-content:space-between;gap:8px;padding:8px 12px;border-top:1px solid var(--ln)}
.no{color:var(--red);font-weight:600}
.yes{color:var(--navy);font-weight:600}

.clock{text-align:center}
.clock b{display:block;font-family:'Geist Mono',monospace;font-size:52px;font-weight:600;color:var(--ink);letter-spacing:-.02em}
.clock small{display:block;color:var(--mut);font-size:12px;margin-top:2px}
.dots{display:flex;gap:5px;justify-content:center;margin-top:12px}
.dots i{width:10px;height:10px;border-radius:2px;background:var(--red);opacity:.75}
.wp{width:210px;background:#fff;border:1px solid var(--ln);border-radius:12px;padding:16px;text-align:center;font-size:12px}
.wp .crest{font-size:10px;letter-spacing:.16em;font-weight:800;color:var(--navy)}
.wp .moon{width:44px;height:44px;border-radius:50%;background:var(--ink);margin:14px auto 10px;position:relative;overflow:hidden}
.wp .moon:after{content:"";position:absolute;width:34px;height:34px;border-radius:50%;background:#fff;left:16px;top:-6px}
.wp b{display:block;font-size:15px;font-weight:800}
.wp p{font-size:12px!important;color:var(--mut);margin-top:4px!important}

.browser{width:min(250px,100%);background:#fff;border:1px solid var(--ln);border-radius:10px;overflow:hidden;font-size:12px}
.browser .url{background:var(--cell);padding:8px 10px;color:var(--mut);font-family:'Geist Mono',monospace;font-size:11px;border-bottom:1px solid var(--ln)}
.browser .odds{padding:10px}
.browser .odds div{display:grid;grid-template-columns:1fr 34px 34px 34px;gap:5px;margin-bottom:6px;align-items:center}
.browser .odds span{height:9px;border-radius:3px;background:#E3E9F3}
.browser .odds em{font-style:normal;font-family:'Geist Mono',monospace;font-size:10.5px;text-align:center;background:var(--redbg);color:var(--red);border-radius:3px;padding:3px 0}
.blist{width:100%;max-width:310px;background:#fff;border:1px solid var(--ln);border-radius:8px;font-size:12.5px}
.blist .r{display:flex;justify-content:space-between;gap:8px;padding:9px 12px;border-top:1px solid var(--ln);align-items:center}
.blist .r:first-child{border:0}
.blist .nm{font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--soft);font-weight:700}
.tog{width:30px;height:17px;border-radius:9px;background:var(--navy);position:relative;flex:none}
.tog:after{content:"";position:absolute;right:2px;top:2px;width:13px;height:13px;border-radius:50%;background:#fff}
.blist .ft{background:var(--cell);border-radius:0 0 8px 8px;color:var(--mut);font-size:11.5px}

.two{display:grid;grid-template-columns:1fr 1fr;gap:14px;width:100%}
.sys{background:#fff;border:1px solid var(--ln);border-radius:8px;padding:14px;font-size:12.5px}
.sys .nm{font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--soft);font-weight:700;margin-bottom:8px}
.sys .row{display:flex;justify-content:space-between;gap:8px;padding:6px 0;border-bottom:1px solid var(--ln)}
.sys .row:last-child{border:0}
.sys .big{font-size:22px;font-weight:800;margin:2px 0 8px}
.sys .act{margin-top:10px;background:var(--navy);color:#fff;border-radius:5px;padding:7px 10px;text-align:center;font-weight:700;font-size:12px}
.sys .act.ghost{background:#fff;color:var(--navy);border:1px solid var(--navy)}
.q .row span:last-child{color:var(--red);font-size:11px}
.flow{grid-column:span 2;text-align:center;font-size:12px}

/* watch a day */
.day{display:grid;grid-template-columns:.9fr 1.1fr;gap:56px;margin-top:48px;align-items:start}
.steps{border-top:2px solid var(--ink)}
.step{display:grid;grid-template-columns:64px 1fr;gap:14px;padding:18px 4px;border:0;border-bottom:1px solid var(--ln);background:none;width:100%;text-align:left;cursor:pointer;opacity:.5;transition:opacity .3s;font:inherit;color:inherit}
.step:hover{opacity:.8}
.step.on{opacity:1}
.step .t{font-family:'Geist Mono',monospace;color:var(--navy);font-size:14px;padding-top:4px;font-weight:600}
.step b{font-weight:800;font-size:19px;display:block;letter-spacing:-.015em}
.step .p{display:block;font-size:14px;color:var(--mut);margin-top:4px;line-height:1.5}
.step .prog{grid-column:2;height:2px;background:var(--ln);margin-top:12px;border-radius:2px;overflow:hidden;display:none}
.step.on .prog{display:block}
.step .prog i{display:block;height:100%;background:var(--navy);width:0}
.step.on .prog i{animation:prog 4.5s linear forwards}
.paused .step.on .prog i{animation-play-state:paused}
@keyframes prog{to{width:100%}}
.dctl{display:flex;gap:10px;margin-top:16px;font-size:13px;color:var(--mut);align-items:center}
.dctl button{border:1px solid var(--ln);background:var(--card);border-radius:6px;height:34px;padding:0 14px;font:600 13px Geist,sans-serif;cursor:pointer;color:var(--ink)}
.dstage{position:sticky;top:132px;background:var(--card);border:1px solid var(--ln);border-radius:14px;padding:22px;min-height:440px;box-shadow:0 30px 60px -46px rgba(20,34,61,.7)}
.dstage .bar2{display:grid;grid-template-columns:200px 1fr;gap:18px;font-size:11px;letter-spacing:.12em;text-transform:uppercase;font-weight:700;color:var(--soft);margin-bottom:16px;padding-bottom:12px;border-bottom:1px solid var(--ln)}
.frame{position:relative;height:370px}
.fr{position:absolute;inset:0;opacity:0;transform:translateY(8px);transition:opacity .45s,transform .45s;display:grid;grid-template-columns:200px 1fr;gap:18px;align-items:center;pointer-events:none}
.fr.on{opacity:1;transform:none;pointer-events:auto}
.phone{width:200px;height:360px;border:8px solid #14223D;border-radius:30px;background:#fff;padding:22px 14px;position:relative;font-size:12px;overflow:hidden}
.phone:before{content:"";position:absolute;top:6px;left:50%;transform:translateX(-50%);width:60px;height:6px;border-radius:9px;background:#14223D}
.ph-h{font-size:11px;color:var(--navy);letter-spacing:.16em;text-align:center;margin-top:8px;font-weight:800}
.ph-s{text-align:center;color:var(--soft);font-size:10.5px;margin-top:3px}
.fld{border:1px solid var(--ln);border-radius:6px;padding:9px 10px;margin-top:10px;font-size:11.5px}
.fld s{display:block;text-decoration:none;color:var(--soft);font-size:9.5px;margin-bottom:2px}
.go{background:var(--navy);color:#fff;text-align:center;border-radius:6px;padding:10px;font-weight:700;margin-top:12px}
.bubble{background:var(--cell);border-radius:12px 12px 12px 4px;padding:10px 12px;line-height:1.45;margin-top:14px}
.okscreen{text-align:center;margin-top:34px}
.okscreen .ck{width:50px;height:50px;border-radius:50%;background:var(--hl);color:var(--navy);display:grid;place-items:center;margin:0 auto 12px;font-size:22px;font-weight:800}
.okscreen .ck.dark{background:var(--ink);color:#fff}
.okscreen .ck.bad{background:var(--redbg);color:var(--red)}
.okscreen p{color:var(--soft);font-size:11px;margin-top:6px;line-height:1.45}
.con{background:var(--paper);border:1px solid var(--ln);border-radius:10px;padding:16px;font-size:12.5px}
.con .nm{font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--navy);font-weight:700}
.con .big{font-size:22px;font-weight:800;margin:6px 0 10px;letter-spacing:-.02em}
.con .row{display:flex;justify-content:space-between;gap:8px;padding:7px 0;border-top:1px solid var(--ln)}
.con .ev{margin-top:10px;background:#fff;border-radius:6px;padding:9px 10px;border-left:3px solid var(--navy);font-size:12px;line-height:1.45}
.con .ev.bad{border-left-color:var(--red)}
.con .act{display:inline-block;margin-top:10px;background:var(--navy);color:#fff;border-radius:5px;padding:7px 12px;font-weight:700;font-size:12px}

/* pillars */
.pillars{display:grid;grid-template-columns:repeat(3,1fr);margin-top:48px;border-top:2px solid var(--ink)}
.pl{padding:28px 28px 28px 0;border-bottom:1px solid var(--ln)}
.pl:not(:nth-child(3n)){border-right:1px solid var(--ln);margin-right:28px}
.pl .n{display:flex;align-items:center;gap:8px;font-size:11.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--soft);font-weight:700}
.pl .n i{font-style:normal;font-family:'Geist Mono',monospace;color:var(--navy);letter-spacing:0}
.pl b{font-weight:800;font-size:19px;display:block;margin:10px 0 6px;line-height:1.25;letter-spacing:-.015em}
.pl p{font-size:14px;color:var(--mut);line-height:1.55}

/* getting started + faq */
.start{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-top:44px}
.sp{background:var(--card);border:1px solid var(--ln);border-radius:10px;padding:22px;border-top:4px solid var(--navy)}
.sp .n{font-family:'Geist Mono',monospace;color:var(--navy);font-size:12px;font-weight:600}
.sp b{display:block;font-weight:800;font-size:18px;margin:10px 0 6px;letter-spacing:-.015em}
.sp p{font-size:13.5px;color:var(--mut);line-height:1.5}
.sp .when{margin-top:12px;font-size:12px;color:var(--navy);font-family:'Geist Mono',monospace;background:var(--hl);display:inline-block;padding:2px 7px;border-radius:3px}
.faq{margin-top:56px;border-top:2px solid var(--ink)}
details{border-bottom:1px solid var(--ln);padding:20px 0}
summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:16px;font-weight:700;font-size:18px}
summary::-webkit-details-marker{display:none}
summary:after{content:"+";color:var(--navy);font-size:22px;line-height:1;transition:transform .2s}
details[open] summary:after{transform:rotate(45deg)}
details p{color:var(--mut);font-size:15px;line-height:1.6;margin-top:10px;max-width:720px}

/* book */
.book{background:var(--ink);color:#fff;border-radius:16px;padding:56px;display:grid;grid-template-columns:1fr 1fr;gap:56px;position:relative;overflow:hidden;margin-top:96px;background-image:linear-gradient(rgba(207,224,250,.06) 1px,transparent 1px),linear-gradient(90deg,rgba(207,224,250,.06) 1px,transparent 1px);background-size:28px 28px}
.book .kick{color:var(--hl)}
.book .kick i{border-color:var(--hl)}
.book h2{font-size:44px;line-height:1.06;color:#fff;margin-top:14px}
.book h2 .hl{box-shadow:inset 0 -.34em 0 rgba(207,224,250,.3)}
.book .lede{color:rgba(255,255,255,.75);margin-top:16px}
.book ul{list-style:none;padding:0;margin-top:26px;font-size:14.5px;color:rgba(255,255,255,.85)}
.book li{padding:7px 0}.book li:before{content:"✓";color:var(--hl);margin-right:10px;font-weight:800}
form{background:var(--card);color:var(--ink);border-radius:12px;padding:26px;position:relative}
form .ttl{font-size:21px;font-weight:800;letter-spacing:-.02em}
form label,form .glbl{display:block;font-size:12.5px;font-weight:600;margin:14px 0 6px;color:var(--mut)}
form input{width:100%;height:46px;border:1px solid var(--ln);border-radius:6px;padding:0 12px;font:15px Geist,sans-serif;background:#fff;color:var(--ink)}
form input:focus{outline:2px solid var(--navy);outline-offset:1px;border-color:var(--navy)}
.seg{display:flex;gap:6px;flex-wrap:wrap}
.seg button{border:1px solid var(--ln);background:#fff;border-radius:6px;height:38px;padding:0 14px;font:500 13.5px Geist,sans-serif;cursor:pointer;color:var(--ink)}
.seg button[aria-pressed=true]{background:var(--navy);border-color:var(--navy);color:#fff}
form .submit{width:100%;justify-content:center;margin-top:20px}
form .or{text-align:center;font-size:13px;color:var(--mut);margin-top:12px}
form .or a{color:var(--navy);font-weight:700}
.done{display:none;text-align:center;padding:40px 10px}
.sent .fields{display:none}.sent .done{display:block}
.done .ck{width:58px;height:58px;border-radius:50%;background:var(--hl);color:var(--navy);display:grid;place-items:center;margin:0 auto 14px;font-size:24px;font-weight:800}
.done .ttl:focus{outline:none}

@media (max-width:900px){
  .wrap{padding:0 16px}
  .hero,.day,.book{grid-template-columns:1fr}
  .hero{gap:44px;padding-bottom:64px}
  .hero h1{font-size:40px}
  .lede{font-size:16.5px}
  .stage{padding:0}
  .stage .slip{position:relative;left:auto;bottom:auto;margin:-16px 0 0 8px;width:min(270px,calc(100% - 16px))}
  .stage .tag{position:relative;right:auto;bottom:auto;margin:14px 0 0 auto;max-width:none}
  .tt{padding:14px}
  .tt-hd{flex-direction:column;gap:8px}
  .grid{grid-template-columns:38px repeat(7,1fr);grid-template-rows:20px repeat(6,28px);gap:2px}
  .lec,.off{font-size:9px;padding:4px 4px}
  .sec{padding:72px 0}
  .head h2{font-size:32px}
  .switch{display:flex;width:100%}
  .switch button{flex:1;padding:0 8px;font-size:13.5px;height:44px}
  .scenes{grid-template-columns:1fr}.scene.wide{grid-column:auto;grid-template-columns:1fr}
  .scene.wide .vis{min-height:560px}
  .vis{min-height:260px}
  .vis .tag{max-width:150px}
  .two{grid-template-columns:1fr}.flow{grid-column:auto}
  .pillars,.start{grid-template-columns:1fr}.pl{margin-right:0!important;border-right:0!important;padding-right:0}
  .dstage{position:relative;top:0;padding:16px}.fr,.dstage .bar2{grid-template-columns:1fr}.phone,.dstage .bar2 span:first-child{display:none}
  .book{padding:28px 20px;margin-top:72px}.book h2{font-size:32px}
  form{padding:20px}
}
@media (prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important;scroll-behavior:auto!important}}
</style><link rel="stylesheet" href="assets/chrome.css">
</head>
<body data-edition="schools">

<?php site_header('schools'); ?>

<main>
<div class="wrap">
  <div class="crumb">Editions / <b>Speedy Connect for Schools</b></div>
  <section class="hero" aria-labelledby="h1">
    <div>
      <span class="edition"><b>for Schools</b> colleges · universities</span>
      <h1 id="h1">Every student signs in <span class="hl">as themselves.</span> The timetable does the rest.</h1>
      <p class="lede">Students sign in with their admission number and a PIN, and staff with theirs. Phones are slowed in lectures, consoles stay off, betting sites are closed, and the Wi-Fi goes quiet at lights out, without anyone touching a router.</p>
      <div class="ctas">
        <a class="btn" href="#book">Book a school demo</a>
        <a class="lnk wa" href="<?= e(whatsapp_url('Hello Speedy Connect, I would like a demo')) ?>"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Zm5.3 14.1c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .1-3.3-.8-2.8-1.1-4.5-3.9-4.7-4.1-.1-.2-1.1-1.5-1.1-2.8s.7-2 1-2.3c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.8 2c.1.2.1.4 0 .5l-.4.6-.4.4c-.1.2-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.3 2.4 1.5.3.1.5.1.6-.1l.9-1c.2-.3.4-.2.6-.1l1.9.9c.3.1.5.2.5.3.1.2.1.7-.2 1.4Z"/></svg>Ask us on WhatsApp</a>
      </div>
      <div class="trust"><span>Works with your MikroTik</span><span>Import from your registrar's list</span><span>Ready before term starts</span></div>
    </div>
    <div class="stage" role="img" aria-label="An example: the Wi-Fi rules for Undergraduates at Amani Hills University drawn as a week. Lectures Monday to Friday, 08:00 to 17:00, with phones at 2 Mbps and consoles off. Lights out Sunday to Thursday nights, 00:00 to 05:00, with no internet. Below it, a printed PIN slip for Kelvin Odhiambo, number AHU/CS/2024/0412, PIN 482 913.">
      <span class="ex">An example</span>
      <div class="tt">
        <div class="tt-hd"><div><b>Undergraduates · this week</b><small>Amani Hills University · study hours</small></div><span class="now mono">Mon 08:00 · Lectures on</span></div>
        <div class="key"><span style="--c:#CFE0FA">Lectures: phones 2 Mbps, consoles off</span><span style="--c:#14223D">Lights out: no internet</span><span style="--c:#F0F3F8">Normal limits</span></div>
        <div class="grid">
          <span></span><span class="d today">Mon</span><span class="d">Tue</span><span class="d">Wed</span><span class="d">Thu</span><span class="d">Fri</span><span class="d">Sat</span><span class="d">Sun</span>
          <span class="h">00–05</span><span class="cell off">Lights out</span><span class="cell off"></span><span class="cell off"></span><span class="cell off"></span><span class="cell off"></span><span class="cell"></span><span class="cell"></span>
          <span class="h">05–08</span><span class="cell"></span><span class="cell"></span><span class="cell"></span><span class="cell"></span><span class="cell"></span><span class="cell"></span><span class="cell"></span>
          <span class="h">08–12</span><span class="cell lec">Lectures</span><span class="cell lec"></span><span class="cell lec"></span><span class="cell lec"></span><span class="cell lec"></span><span class="cell"></span><span class="cell"></span>
          <span class="h">12–17</span><span class="cell lec"></span><span class="cell lec"></span><span class="cell lec"></span><span class="cell lec"></span><span class="cell lec"></span><span class="cell"></span><span class="cell"></span>
          <span class="h">17–21</span><span class="cell"></span><span class="cell"></span><span class="cell"></span><span class="cell"></span><span class="cell"></span><span class="cell"></span><span class="cell"></span>
          <span class="h">21–24</span><span class="cell"></span><span class="cell"></span><span class="cell"></span><span class="cell"></span><span class="cell"></span><span class="cell"></span><span class="cell"></span>
        </div>
      </div>
      <div class="slip">
        <div class="cut"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><circle cx="6" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><path d="M20 4 8.1 15.9M14.5 14.5 20 20M8.1 8.1 12 12"/></svg>Cut along the line</div>
        <div class="sn">AMANI HILLS UNIVERSITY · WI-FI SIGN-IN</div>
        <div class="who">Kelvin Odhiambo · Computer Science</div>
        <div class="num mono">AHU/CS/2024/0412</div>
        <div class="pin"><small>YOUR PIN</small>482 913</div>
        <div class="how">Join "Amani-WiFi" and enter your number and this PIN.</div>
      </div>
      <div class="tag"><s>Now · Lectures until 17:00</s>Phones at 2 Mbps. Consoles not allowed.</div>
    </div>
  </section>
</div>

<section class="sec alt" id="limits" aria-labelledby="h-limits">
  <div class="wrap">
    <div class="head">
      <div><div class="kick"><i>01</i>Sound familiar?</div><h2 id="h-limits">Five things school Wi-Fi gets wrong, and <span class="hl">what changes.</span></h2></div>
      <p>Most schools live with at least one of these. Flip the switch to see each one fixed.</p>
    </div>
    <div class="switch" role="group" aria-label="Compare your school today with Speedy Connect">
      <button type="button" class="b" aria-pressed="true" data-mode="today">Your school today</button>
      <button type="button" class="w" aria-pressed="false" data-mode="with">With Speedy Connect</button>
    </div>
    <p class="hint" id="hint" aria-live="polite">You're looking at today. Try the switch.</p>

    <div class="scenes" id="scenes">
      <article class="scene">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">The shared password</span><span class="lb t-after">A sign-in each</span></div>
          <h3 class="t-before">One password for the whole school, written on a classroom board.</h3>
          <h3 class="t-after">Every student and staff member signs in as themselves.</h3>
          <p class="t-before">Students pass it to friends, and the neighbours have it too. You can't tell who's on, or switch one person off.</p>
          <p class="t-after">With their number and a 6-digit PIN. PINs go by SMS or email, or on printed slips for students without a phone of their own, and always for secondary pupils. A lost phone can be stopped from the helpdesk.</p>
        </div>
        <div class="vis" aria-hidden="true">
          <div class="st before"><div class="board"><s>STUDENT WI-FI</s><b>Password: <span>amani2024</span></b><small>please don't share</small></div><span class="tag bad"><b>Shared well beyond the school</b></span></div>
          <div class="st after"><div class="slip mini"><div class="sn">AMANI HILLS · WI-FI SIGN-IN</div><div class="who">Aisha Mohamed · Year 1</div><div class="num mono">AHU/BUS/2026/0733</div><div class="pin mono">230 617</div></div><span class="tag">One person, one PIN. By SMS, email or slip.</span></div>
        </div>
      </article>
      <article class="scene">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">Slow lectures</span><span class="lb t-after">Study hours</span></div>
          <h3 class="t-before">Lectures crawl while the hostels stream and play.</h3>
          <h3 class="t-after">In study hours, phones slow down and consoles stay off.</h3>
          <p class="t-before">Everyone shares one line, so a room of games consoles in the hostel can stop the slides loading in a lecture hall.</p>
          <p class="t-after">Set Lectures once: Mon–Fri 08:00–17:00, phones at 2 Mbps, games consoles not allowed. Change it, and devices already online follow within a minute.</p>
        </div>
        <div class="vis" aria-hidden="true">
          <div class="st before"><div class="bw"><div class="lbl"><span>Campus internet line · Tue 10:00</span><span class="mono" style="color:var(--red)">full</span></div><div class="bar"><i style="width:58%;background:#C0392B"></i><i style="width:30%;background:#E08B7F"></i><i style="width:10%;background:#9FB2D6"></i></div><div class="legend"><span style="--c:#C0392B">Hostel streaming</span><span style="--c:#E08B7F">Games consoles</span><span style="--c:#9FB2D6">Lecture halls</span></div><div class="say"><s>Lecturer · 10:05</s>"The slides won't load. Again."</div></div></div>
          <div class="st after"><div class="rule"><div class="rh"><span>Lectures</span><span class="mono">Mon–Fri 08:00–17:00</span></div><div class="r"><span>Phones</span><span class="mono yes">2 Mbps</span></div><div class="r"><span>Laptops</span><span class="mono">10 Mbps</span></div><div class="r"><span>Games consoles</span><span class="no">Not allowed</span></div><div class="r" style="background:var(--cell);color:var(--mut);font-size:11.5px"><span>Reaches devices already online</span><span>within a minute</span></div></div></div>
        </div>
      </article>
      <article class="scene">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">Online at 3am</span><span class="lb t-after">Lights out</span></div>
          <h3 class="t-before">It's 3am, and the hostel is still online.</h3>
          <h3 class="t-after">At lights out, the internet goes quiet.</h3>
          <p class="t-before">Nothing switches off at night, so the Wi-Fi is busiest when everyone should be asleep. The 8:00 lecture pays for it.</p>
          <p class="t-after">Sunday to Thursday nights, no internet for the groups you choose. A device that tries is told on the sign-in page when it can come back.</p>
        </div>
        <div class="vis" aria-hidden="true">
          <div class="st before"><div class="clock"><b>03:12</b><small>Wednesday · hostel Wi-Fi</small><div class="dots"><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div></div><span class="tag bad"><b>Still streaming</b><br>An 8:00 lecture tomorrow</span></div>
          <div class="st after"><div class="wp"><div class="crest">AMANI HILLS WI-FI</div><div class="moon"></div><b>Lights out</b><p>The Wi-Fi is back at <span class="mono">05:00</span>.</p></div><span class="tag">Sun–Thu nights · <span class="mono">00:00–05:00</span></span></div>
        </div>
      </article>
      <article class="scene">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">Betting on school Wi-Fi</span><span class="lb t-after">Blocked sites</span></div>
          <h3 class="t-before">Betting and adult sites, on the school's own Wi-Fi.</h3>
          <h3 class="t-after">Blocked on every router, with one list for the whole campus.</h3>
          <p class="t-before">A filter on one router, or none at all. Nobody is sure what's closed and what isn't.</p>
          <p class="t-after">Betting sites from a list we keep up to date, adult sites and scams through a family-safe filter, and your own list. We say plainly what it can't stop: a VPN can get around it.</p>
        </div>
        <div class="vis" aria-hidden="true">
          <div class="st before"><div class="browser"><div class="url">a-betting-site · odds</div><div class="odds"><div><span></span><em>1.85</em><em>3.40</em><em>4.10</em></div><div><span></span><em>2.10</em><em>3.05</em><em>3.60</em></div><div><span></span><em>1.55</em><em>3.90</em><em>5.25</em></div></div></div><span class="tag bad"><b>Open on the school's line</b></span></div>
          <div class="st after"><div class="blist"><div class="r"><span class="nm">Blocked sites</span><span class="mono" style="font-size:11px;color:var(--soft)">every router</span></div><div class="r"><span>Betting</span><span class="tog"></span></div><div class="r"><span>Adult</span><span class="tog"></span></div><div class="r"><span>Your own list</span><span class="mono">3 sites</span></div><div class="r ft"><span>One list for the whole campus</span></div></div></div>
        </div>
      </article>
      <article class="scene wide">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">Term start</span><span class="lb t-after">One upload, one helpdesk screen</span></div>
          <h3 class="t-before">Term starts: hundreds of accounts by hand, and a queue at the ICT office.</h3>
          <h3 class="t-after">Upload the registrar's list. See why anyone was turned away.</h3>
          <p class="t-before">Someone types the new intake in, one at a time. Meanwhile the queue outside says the same thing all day: "I can't get on."</p>
          <p class="t-after">Save the registrar's list from Excel as CSV, in any column order, and upload it. A preview shows what will happen before anyone is added. <b>New term</b> moves a whole group to its next end date in one go. When someone can't get on, the helpdesk sees the reason and sends a new PIN.</p>
          <p class="t-after">The helpdesk gets its own sign-in: find a person, see their devices, send a new PIN, print a slip, stop a lost phone. Groups, rules and imports stay with the ICT office.</p>
        </div>
        <div class="vis" aria-hidden="true">
          <div class="st before"><div class="two"><div class="sys"><div class="nm">Accounts · typed by hand</div><div class="row"><span>Year 1 intake</span><span class="mono">214 of 742</span></div><div class="row"><span>Hostel C list</span><span style="color:var(--red)">not started</span></div><div class="row"><span>Staff</span><span style="color:var(--red)">last year's</span></div></div><div class="sys q"><div class="nm">ICT office · today</div><div class="row"><span class="mono">09:02</span><span>"I can't get on"</span><span>guessing</span></div><div class="row"><span class="mono">09:05</span><span>"Forgot my password"</span><span>re-told it</span></div><div class="row"><span class="mono">09:11</span><span>"Laptop won't connect"</span><span>router restarted</span></div></div><div class="flow" style="color:var(--red)">The queue starts again at 2pm.</div></div></div>
          <div class="st after"><div class="two"><div class="sys"><div class="nm">Import · preview</div><div class="mono" style="font-size:11.5px;color:var(--mut)">Year 1 intake 2026.csv · 742 rows</div><div class="big">738 people</div><div class="row"><span>Repeats</span><span class="mono">2</span></div><div class="row"><span>Skipped (no number)</span><span class="mono">2</span></div><div class="act">Add 738 people</div><div class="act ghost">New term: move a group on</div></div><div class="sys"><div class="nm">Helpdesk · find a person</div><div style="font-weight:700">Brian Mwangi</div><div class="mono" style="font-size:11.5px;color:var(--mut)">AHU/ENG/2025/0218</div><div class="row" style="margin-top:6px"><span>Turned away</span><span class="mono">13:58</span></div><div class="row"><span>Why</span><span class="no">5 wrong PINs</span></div><div class="row"><span>Locked</span><span>15 minutes</span></div><div class="act">Send a new PIN by SMS</div></div></div></div>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="sec" id="day" aria-labelledby="h-day">
  <div class="wrap">
    <div class="head">
      <div><div class="kick"><i>02</i>An example: a Monday at Amani Hills University</div><h2 id="h-day">Watch a school day <span class="hl">run itself.</span></h2></div>
      <p>A university in Limuru with about three thousand students and staff. Nobody in the ICT office touches a router.</p>
    </div>
    <div class="day" id="dayw">
      <div>
        <div class="steps">
          <button type="button" class="step on" aria-current="step"><span class="t">07:45</span><span><b>Kelvin signs in</b><span class="p">His student number and his PIN. The Wi-Fi knows he's an undergraduate.</span></span><span class="prog"><i></i></span></button>
          <button type="button" class="step"><span class="t">08:00</span><span><b>Lectures start</b><span class="p">Phones slow to 2 Mbps and consoles are off. Nobody pressed anything.</span></span><span class="prog"><i></i></span></button>
          <button type="button" class="step"><span class="t">11:20</span><span><b>A betting site, in Hostel B</b><span class="p">It doesn't open. The same list is on every router.</span></span><span class="prog"><i></i></span></button>
          <button type="button" class="step"><span class="t">14:02</span><span><b>"I can't get on"</b><span class="p">The helpdesk sees five wrong PINs, locked for 15 minutes, and sends a new PIN by SMS.</span></span><span class="prog"><i></i></span></button>
          <button type="button" class="step"><span class="t">00:00</span><span><b>Lights out</b><span class="p">Undergraduates are off until 05:00. Staff and postgraduates carry on.</span></span><span class="prog"><i></i></span></button>
        </div>
        <div class="dctl"><button type="button" id="pp">Pause</button><span>or choose any moment</span></div>
      </div>
      <div class="dstage" id="dstage" aria-live="off">
        <div class="bar2"><span>What the student sees</span><span>What the ICT office sees</span></div>
        <div class="frame">
          <div class="fr on">
            <div class="phone"><div class="ph-h">AMANI HILLS</div><div class="ph-s">Wi-Fi sign-in</div><div class="fld"><s>Student or staff number</s><span class="mono">AHU/CS/2024/0412</span></div><div class="fld"><s>PIN</s><span class="mono">● ● ● ● ● ●</span></div><div class="go">Sign in</div><p style="text-align:center;color:var(--soft);font-size:10.5px;margin-top:12px">Help: ICT office, Library ground floor</p></div>
            <div class="con"><div class="nm">People · Undergraduates</div><div class="big">Kelvin Odhiambo</div><div class="row"><span>Number</span><span class="mono">AHU/CS/2024/0412</span></div><div class="row"><span>Course</span><span>BSc Computer Science, year 3</span></div><div class="row"><span>Devices</span><span class="mono">1 of 2</span></div><div class="ev">Signed in · Kelvin's iPhone · <span class="mono">07:45</span></div></div>
          </div>
          <div class="fr" aria-hidden="true">
            <div class="phone"><div class="ph-h">AMANI HILLS</div><div class="ph-s">Wi-Fi</div><div class="okscreen"><div class="ck">✓</div><b style="font-size:14px">You're online</b><p>Signed in as<br><span class="mono">AHU/CS/2024/0412</span></p></div></div>
            <div class="con"><div class="nm">Today · study hours</div><div class="big">Lectures on until 17:00</div><div class="row"><span>Phones</span><span class="mono">2 Mbps</span></div><div class="row"><span>Laptops</span><span class="mono">10 Mbps</span></div><div class="row"><span>Games consoles</span><span class="no">Not allowed</span></div><div class="ev">Applied to devices already online, within a minute</div></div>
          </div>
          <div class="fr" aria-hidden="true">
            <div class="phone"><div class="ph-s" style="margin-top:6px">Hostel B</div><div class="okscreen"><div class="ck bad">!</div><b style="font-size:14px">This site can't be reached</b><p>The address couldn't be found.</p></div></div>
            <div class="con"><div class="nm">Rules · blocked sites</div><div class="big">Closed on every router</div><div class="row"><span>Betting</span><span class="yes">On</span></div><div class="row"><span>Adult</span><span class="yes">On</span></div><div class="row"><span>Your own list</span><span class="mono">3 sites</span></div><div class="ev">One list for the whole campus. A VPN can get around it.</div></div>
          </div>
          <div class="fr" aria-hidden="true">
            <div class="phone"><div class="ph-s" style="margin-top:4px">Messages</div><div class="bubble"><b>Amani Hills ICT</b><br>Brian, your new Wi-Fi PIN is <b class="mono">715 208</b>. Sign in with <span class="mono">AHU/ENG/2025/0218</span>.</div></div>
            <div class="con"><div class="nm">Helpdesk · Brian Mwangi</div><div class="big">Turned away at 13:58</div><div class="row"><span>Why</span><span class="no">Five wrong PINs</span></div><div class="row"><span>Locked</span><span>for 15 minutes</span></div><div class="row"><span>Number</span><span class="mono">AHU/ENG/2025/0218</span></div><div class="ev">New PIN sent by SMS · <span class="mono">14:03</span></div></div>
          </div>
          <div class="fr" aria-hidden="true">
            <div class="phone"><div class="ph-h">AMANI HILLS</div><div class="ph-s">Wi-Fi sign-in</div><div class="okscreen"><div class="ck dark">☾</div><b style="font-size:14px">Lights out</b><p>The Wi-Fi is back at 05:00.</p></div></div>
            <div class="con"><div class="nm">Today · study hours</div><div class="big">Lights out until 05:00</div><div class="row"><span>Undergraduates</span><span class="no">No internet</span></div><div class="row"><span>Postgraduates</span><span>Normal limits</span></div><div class="row"><span>Staff</span><span>Normal limits</span></div><div class="ev">Sunday to Thursday nights, 00:00–05:00</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="sec alt" aria-labelledby="h-net">
  <div class="wrap">
    <div class="head">
      <div><div class="kick"><i>03</i>The network underneath</div><h2 id="h-net">The same Speedy Connect, set up for <span class="hl">how a school runs.</span></h2></div>
      <p>Every edition shares one network platform. Here's what each part does for a school.</p>
    </div>
    <div class="pillars">
      <div class="pl"><span class="n"><i>01</i> Routers</span><b>Your MikroTik, set up with one paste.</b><p>It works even without a public IP. You get an email if a router goes quiet, and you can swap one without students noticing.</p></div>
      <div class="pl"><span class="n"><i>02</i> Access</span><b>A number and a PIN. Visitor codes for the rest.</b><p>Every student and staff member signs in as themselves. Parents' day or the exam board get a visitor code of their own.</p></div>
      <div class="pl"><span class="n"><i>03</i> Control</span><b>Limits per kind of device, study hours, lights out.</b><p>Phones, laptops, tablets and consoles each get their own speed and daily data. Lectures and lights out change them on time.</p></div>
      <div class="pl"><span class="n"><i>04</i> Safety</span><b>Betting and adult sites closed on every router.</b><p>Two-step sign-in keeps your ICT team's accounts safe. Students' records are covered when you export or remove your data.</p></div>
      <div class="pl"><span class="n"><i>05</i> People</span><b>Groups, terms and PINs.</b><p>Undergraduates and Staff, or Form 1–4 and Teachers. Each group ends on its own date. PINs go by SMS, email or printed slips.</p></div>
      <div class="pl"><span class="n"><i>06</i> Visibility</span><b>Who was turned away, and why.</b><p>Today shows devices turned away for being over their limit. Term reports show who signed in, devices by kind and data by group, as CSV.</p></div>
    </div>
  </div>
</section>

<section class="sec" aria-labelledby="h-start">
  <div class="wrap">
    <div class="head">
      <div><div class="kick"><i>04</i>Getting started</div><h2 id="h-start">Ready <span class="hl">before term starts.</span></h2></div>
      <p>You keep your router and access points. We set up the rest with you on a call.</p>
    </div>
    <div class="start">
      <div class="sp"><span class="n">STEP 1</span><b>A call with us</b><p>We look at your campus, your groups and your router together.</p><div class="when">30 minutes</div></div>
      <div class="sp"><span class="n">STEP 2</span><b>Upload your registrar's list</b><p>Save it from Excel as CSV. The preview shows who will be added before anything is made.</p><div class="when">one file</div></div>
      <div class="sp"><span class="n">STEP 3</span><b>Set the rules</b><p>Groups and their limits, study hours, lights out and blocked sites.</p><div class="when">one screen each</div></div>
      <div class="sp"><span class="n">STEP 4</span><b>Connect and print</b><p>Paste one line into your MikroTik, then print the PIN slips or send PINs by SMS.</p><div class="when">one paste</div></div>
    </div>
    <div class="faq">
      <details open><summary>What about pupils without phones?</summary><p>Print their PINs as slips: a PDF of cut-out slips, each with the pupil's number, name, PIN and how to sign in. For a secondary school, pupils always get slips, and we keep only their number, name and class. No phone numbers, no email, no birth dates.</p></details>
      <details><summary>What happens at the end of term?</summary><p>Each group works until its own end date, then stops. When the next term starts, <b>New term</b> moves everyone in a group to the next end date in one go. Someone who has left is stopped, and signed out everywhere at once.</p></details>
      <details><summary>Parents' day and visitors?</summary><p>Make a visitor code for the day, such as "Parents' day" or "Exam board". Visitors type it on the same Wi-Fi page, and it ends when you choose.</p></details>
      <details><summary>Is student data safe?</summary><p>Each school's data is walled off from every other school's. Your ICT team's accounts can use two-step sign-in. You can export all your data any time, and if you leave, your students' records are removed with the rest.</p></details>
    </div>
  </div>
</section>

<section class="wrap" id="book" aria-labelledby="h-book">
  <div class="book">
    <div>
      <div class="kick"><i>05</i>Book a school demo</div>
      <h2 id="h-book">See your own school <span class="hl">running on Speedy Connect.</span></h2>
      <p class="lede">30 minutes on a call or video. We'll set up a demo with your groups and show you a PIN slip, study hours and the helpdesk screen.</p>
      <ul><li>No commitment, no card</li><li>We reply on WhatsApp to agree a time</li><li>Bring your ICT officer if you have one</li></ul>
    </div>
    <form id="f" novalidate method="get" action="<?= e(whatsapp_url()) ?>" target="_blank" data-booking>
<?php booking_fields('schools'); ?>
      <div class="fields">
        <div class="ttl">Book my demo</div>
        <span class="glbl" id="g-ed">Your edition</span>
        <div class="seg" role="group" aria-labelledby="g-ed"><button type="button" aria-pressed="false">ISP</button><button type="button" aria-pressed="false">Hotel</button><button type="button" aria-pressed="false">Café</button><button type="button" aria-pressed="true">School</button><button type="button" aria-pressed="false">Venue</button></div>
        <label for="n">Your name</label><input id="n" name="name" required minlength="2" maxlength="80" placeholder="Esther Wangari" autocomplete="name">
        <label for="sn">School name</label><input id="sn" name="business" required minlength="2" maxlength="120" placeholder="Amani Hills University" autocomplete="organization">
        <label for="p">Your phone number</label><input id="p" name="phone" type="tel" required maxlength="20" placeholder="0712 345 678" inputmode="tel" autocomplete="tel">
        <span class="glbl" id="g-size">How many students?</span>
        <div class="seg" role="group" aria-labelledby="g-size"><button type="button" aria-pressed="false">Up to 500</button><button type="button" aria-pressed="true">500–2,000</button><button type="button" aria-pressed="false">2,000+</button></div>
        <button class="btn submit" id="sb" type="submit">Continue on WhatsApp →</button>
        <p class="or">or <a href="<?= e(whatsapp_url('Hello Speedy Connect, I would like a demo')) ?>">chat with us on WhatsApp now</a></p>
      </div>
      <div class="done" aria-live="polite"><div class="ck" aria-hidden="true">✓</div><div class="ttl" id="thanks" tabindex="-1">Thanks, <span id="nm">Esther</span>.</div><p style="color:var(--mut);margin-top:8px;line-height:1.55">Press <b>Send</b> in WhatsApp and we'll reply to agree a time for your demo.</p></div>
    </form>
  </div>
</section>
</main>

<div style="height:96px"></div><?php site_footer(); ?>

<script src="assets/site.js"></script>
<script src="assets/booking.js"></script>
<script src="assets/page-schools.js"></script>
</body></html>
