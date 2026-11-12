<?php require_once __DIR__ . '/../src/site.php'; page_begin('isp'); ?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><link rel="icon" href="favicon.svg" type="image/svg+xml"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Speedy Connect for ISPs</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700;800&family=Geist+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#0A0D0B;--sf:#111614;--rs:#18201C;--ln:rgba(232,237,233,.09);--ln2:rgba(232,237,233,.16);
  --ink:#E9EFEB;--mut:#7E8D84;--grn:#35D07F;--on-grn:#06120C;--amb:#E8A33D;--warn:#E5735C;
  --grn-a:rgba(53,208,127,.12);--grn-b:rgba(53,208,127,.32);--warn-a:rgba(229,115,92,.12);--warn-b:rgba(229,115,92,.34);
}
*{box-sizing:border-box;margin:0}
html{scroll-behavior:smooth}
body{background:var(--bg);color:var(--ink);font-family:Geist,system-ui,sans-serif;-webkit-font-smoothing:antialiased}
a{color:inherit;text-decoration:none}
main{overflow-x:clip}
main [id]{scroll-margin-top:124px}
main :focus-visible{outline:2px solid var(--grn);outline-offset:3px}
.mono{font-family:'Geist Mono',ui-monospace,monospace}
.amt{color:var(--amb);font-family:'Geist Mono',ui-monospace,monospace}
.tm{color:var(--amb);font-family:'Geist Mono',ui-monospace,monospace}
.g{color:var(--grn)}.w{color:var(--warn)}.m{color:var(--mut)}
.wrap{max-width:1160px;margin:0 auto;padding:0 32px}
.kick{font-size:11.5px;letter-spacing:.16em;text-transform:uppercase;font-weight:700;color:var(--grn)}
h1,h2,h3{font-weight:800;letter-spacing:-.035em}
.crumb{font-size:12.5px;color:var(--mut);padding:20px 0 0}
.crumb b{color:var(--ink);font-weight:500}

/* hero */
.hero{display:grid;grid-template-columns:1fr 1.06fr;gap:56px;align-items:center;padding:40px 0 88px}
.edition{display:inline-flex;align-items:center;gap:10px;border:1px solid var(--ln2);background:var(--sf);border-radius:999px;padding:5px 14px 5px 5px;font-size:13px;color:var(--mut)}
.edition b{background:var(--grn);color:var(--on-grn);border-radius:999px;padding:3px 10px;font-weight:700;font-size:12px}
.hero h1{font-size:60px;line-height:1;margin:22px 0;text-wrap:balance}
.hero h1 em{font-style:normal;color:var(--grn)}
.lede{font-size:18px;line-height:1.6;color:var(--mut);max-width:500px}
.ctas{display:flex;gap:12px 14px;align-items:center;margin-top:30px;flex-wrap:wrap}
.btn{height:52px;padding:0 24px;border-radius:9px;background:var(--grn);color:var(--on-grn);font-weight:700;font-size:15px;display:inline-flex;align-items:center;gap:10px;transition:background .15s,transform .15s;border:0;cursor:pointer;font-family:Geist,system-ui,sans-serif}
.btn:hover{background:#4ADB8F}
.btn2{height:52px;padding:0 22px;border-radius:9px;border:1px solid var(--ln2);color:var(--ink);font-weight:600;font-size:15px;display:inline-flex;align-items:center;transition:border-color .15s}
.btn2:hover{border-color:var(--grn)}
.lnk{font-size:15px;color:var(--ink);border-bottom:1px solid var(--ln2);padding-bottom:2px;font-weight:500}
.lnk:hover{border-color:var(--grn)}
.wa{display:inline-flex;align-items:center;gap:8px;margin-left:6px}
.wa svg{width:18px;height:18px;color:var(--grn)}
.trust{display:flex;gap:10px 22px;margin-top:34px;font-size:13px;color:var(--mut);flex-wrap:wrap}
.trust span:before{content:"✓";color:var(--grn);margin-right:7px;font-weight:700}

/* hero stage: the wall + the hotspot phone */
.stage{position:relative}
.wall{position:relative;background:var(--sf);border:1px solid var(--ln2);border-radius:16px;padding:18px 18px 66px;box-shadow:0 50px 90px -50px rgba(0,0,0,.9)}
.wall-h{display:flex;justify-content:space-between;align-items:center;gap:10px;margin-bottom:14px}
.wall-h b{font-size:14px;font-weight:700}
.ex{font:500 10px 'Geist Mono',monospace;color:var(--mut);border:1px solid var(--ln2);border-radius:4px;padding:2px 6px;letter-spacing:.08em;text-transform:uppercase;margin-left:8px;vertical-align:1px}
.live{display:inline-flex;align-items:center;gap:7px;font-size:11px;color:var(--grn);font-weight:600}
.live:before{content:"";width:7px;height:7px;border-radius:50%;background:var(--grn);box-shadow:0 0 0 3px rgba(53,208,127,.2);animation:pulse 2.4s ease-in-out infinite}
@keyframes pulse{50%{box-shadow:0 0 0 6px rgba(53,208,127,.05)}}
.tiles{display:grid;grid-template-columns:repeat(3,1fr);gap:10px}
.tile{background:var(--rs);border:1px solid var(--ln);border-radius:10px;padding:11px 12px}
.tile s{display:block;text-decoration:none;font-size:10.5px;color:var(--mut);margin-bottom:5px}
.tile b{font:600 22px 'Geist Mono',monospace;letter-spacing:-.02em}
.tile b small{color:var(--mut);font-size:13px}
.feed{margin-top:12px}
.frow{display:grid;grid-template-columns:76px 1fr auto;gap:10px;padding:9px 0;border-bottom:1px solid var(--ln);font-size:12.5px;align-items:center}
.frow .nm2 small{color:var(--mut)}
.frow .ok{color:var(--grn);font-size:11.5px;white-space:nowrap}
.frow .au{color:var(--mut);font-size:11.5px}
.wall-f{position:absolute;left:18px;bottom:22px;font-size:11px;color:var(--mut);max-width:44%}
.under{display:flex;gap:18px;align-items:flex-start;justify-content:space-between;margin-top:-58px;padding:0 22px;position:relative;z-index:2}
.rt{flex:1;max-width:250px;margin-top:80px;background:var(--rs);border:1px solid var(--ln2);border-radius:12px;padding:14px;font-size:12px;box-shadow:0 30px 50px -30px rgba(0,0,0,.9)}
.rt .hd{display:flex;justify-content:space-between;gap:8px;color:var(--mut);font-size:11px}
.dots24{display:grid;grid-template-columns:repeat(12,1fr);gap:4px;margin:10px 0}
.dots24 i{aspect-ratio:1;border-radius:3px;background:var(--grn);opacity:.8}
.dots24 i.dn{background:var(--warn);opacity:1}
.rt p{line-height:1.45}

.phone{width:178px;height:344px;flex:none;border:7px solid #1C2521;border-radius:30px;background:#0E1311;padding:24px 12px 12px;position:relative;overflow:hidden;font-size:11.5px;box-shadow:0 0 0 1px var(--ln2),0 40px 70px -30px #000}
.phone:before{content:"";position:absolute;top:7px;left:50%;transform:translateX(-50%);width:54px;height:6px;border-radius:9px;background:#1C2521}
.ph-b{font:600 12px 'Geist Mono',monospace;color:var(--grn);letter-spacing:.16em;text-align:center}
.ph-s{text-align:center;color:var(--mut);font-size:10.5px;margin-top:3px}
.opt{display:flex;justify-content:space-between;align-items:center;border:1px solid var(--ln2);border-radius:8px;padding:8px 9px;margin-top:7px}
.opt.sel{border-color:var(--grn);background:var(--grn-a)}
.stk{position:absolute;left:6px;right:6px;bottom:6px;background:#EEF2EF;color:#0A0D0B;border-radius:14px;padding:12px;box-shadow:0 -10px 30px rgba(0,0,0,.6)}
.stk .lb2{font:600 9.5px 'Geist Mono',monospace;letter-spacing:.14em;color:#3E7B58}
.stk p{font-size:11.5px;line-height:1.4;margin-top:5px}
.stk .pin{border:1px solid #C9D3CC;border-radius:7px;padding:7px 9px;margin-top:8px;font-family:'Geist Mono',monospace;letter-spacing:.3em;color:#0A0D0B}
.stk .bt{display:flex;justify-content:flex-end;gap:14px;margin-top:9px;font-weight:700;font-size:11.5px}
.stk .bt span:last-child{color:#1E8A50}

/* sections */
.sec{padding:96px 0;border-top:1px solid var(--ln)}
.sec.alt{background:#0D110F}
.head{display:flex;justify-content:space-between;align-items:flex-end;gap:24px 48px;flex-wrap:wrap}
.head h2{font-size:46px;line-height:1.04;margin-top:12px;max-width:660px;text-wrap:balance}
.head p{max-width:380px;color:var(--mut);font-size:15.5px;line-height:1.6}

/* before / after */
.switch{display:inline-flex;background:var(--sf);border:1px solid var(--ln2);border-radius:999px;padding:5px;margin-top:34px;flex-wrap:wrap}
.switch button{border:0;background:transparent;font:600 15px Geist,system-ui,sans-serif;color:var(--mut);height:46px;padding:0 22px;border-radius:999px;cursor:pointer;transition:background .25s,color .25s}
.switch button[aria-pressed=true]{background:var(--ink);color:var(--bg)}
.switch button.wi[aria-pressed=true]{background:var(--grn);color:var(--on-grn)}
.hint{font-size:13px;color:var(--mut);margin:12px 0 0 6px}
.scenes{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-top:30px}
.sc{background:var(--sf);border:1px solid var(--ln);border-radius:18px;overflow:hidden;display:flex;flex-direction:column;transition:border-color .4s}
.sc.wide{grid-column:span 2;display:grid;grid-template-columns:1fr 1.35fr}
.sc .txt{padding:24px 26px 4px}
.sc.wide .txt{padding:28px}
.lim{display:flex;align-items:center;gap:8px;font-size:11px;letter-spacing:.14em;text-transform:uppercase;font-weight:700}
.lim .dot{width:8px;height:8px;border-radius:50%;background:var(--warn);transition:background .4s,box-shadow .4s}
.lim .lb{color:var(--warn)}
.sc h3{font-size:23px;line-height:1.15;margin-top:10px;font-weight:700;letter-spacing:-.025em}
.sc p{font-size:14.5px;color:var(--mut);line-height:1.55;margin-top:8px}
.vis{display:grid;flex:1;min-height:220px;margin:16px 18px 18px;border-radius:12px;background:var(--bg);border:1px solid var(--ln);overflow:hidden}
.sc.wide .vis{margin:18px}
.st{grid-area:1/1;padding:16px;display:flex;flex-direction:column;justify-content:center;gap:10px;min-width:0;transition:opacity .45s ease,transform .45s ease,visibility .45s}
.st.after{opacity:0;transform:translateY(10px);visibility:hidden}
.fixed .st.before{opacity:0;transform:translateY(-10px);visibility:hidden}
.fixed .st.after{opacity:1;transform:none;visibility:visible}
.t-after{display:none}
.fixed .t-before{display:none}.fixed .t-after{display:block}
.fixed .lim .t-after{display:inline}
.fixed .lim .dot{background:var(--grn);box-shadow:0 0 0 3px rgba(53,208,127,.2)}
.fixed .lim .lb{color:var(--grn)}
.fixed .sc{border-color:var(--grn-b)}
.tag{align-self:flex-end;font-size:11.5px;border-radius:7px;padding:6px 9px;line-height:1.35;max-width:240px}
.tag.tw{color:var(--warn);background:var(--warn-a);border:1px solid var(--warn-b)}
.tag.tg{color:var(--grn);background:var(--grn-a);border:1px solid var(--grn-b)}
.note{font-size:12.5px;color:var(--mut);margin-top:16px}

.sheet{font:500 10.5px 'Geist Mono',monospace;border:1px solid var(--ln2);border-radius:8px;overflow:hidden;background:var(--sf)}
.sheet .sh{display:flex;justify-content:space-between;gap:8px;padding:7px 10px;background:var(--rs);color:var(--mut)}
.sheet .r{display:grid;grid-template-columns:40px minmax(0,1fr) 56px;border-top:1px solid var(--ln)}
.sheet .r span{padding:7px 8px;border-right:1px solid var(--ln);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;min-width:0}
.sheet .r span:last-child{border-right:0}
.sheet .r.hd2 span{color:var(--mut)}
.mfeed{background:var(--sf);border:1px solid var(--ln2);border-radius:10px;padding:4px 12px}
.mfeed .frow:last-child{border-bottom:0}
.mfeed .frow{grid-template-columns:62px minmax(0,1fr) auto;font-size:12px}

.card2{background:var(--rs);border:1px solid var(--ln2);border-radius:12px;padding:13px 14px;font-size:12.5px}
.card2 .hd{display:flex;justify-content:space-between;gap:8px;color:var(--mut);font-size:11px;margin-bottom:8px}
.bub{background:var(--sf);border:1px solid var(--ln2);border-radius:12px 12px 12px 4px;padding:9px 12px;font-size:12.5px;line-height:1.45;align-self:flex-start;max-width:260px}
.bub s{text-decoration:none;color:var(--mut);font-size:10.5px;display:block;margin-bottom:2px}
.codebox{font-family:'Geist Mono',monospace;border:1px solid var(--ln2);background:var(--bg);border-radius:7px;padding:8px 10px;margin:6px 0 10px;letter-spacing:.06em;display:flex;justify-content:space-between;gap:8px}
.codebox span:last-child{color:var(--mut);letter-spacing:0}
.rows2 > div{display:grid;grid-template-columns:minmax(0,1fr) auto;gap:10px;padding:7px 0;border-top:1px solid var(--ln);font-size:12px;align-items:center}
.rows2 > div:first-child{border-top:0}
.rows2 small{display:block;color:var(--mut);font-size:10.5px;margin-top:1px}
.tl > div{display:grid;grid-template-columns:78px minmax(0,1fr);gap:10px;padding:8px 0;border-top:1px solid var(--ln);font-size:12px;line-height:1.4}
.tl > div:first-child{border-top:0}
.chart{width:100%;height:auto;display:block}
.two{display:grid;grid-template-columns:1fr 1fr;gap:12px;width:100%}
.term{font:500 10.5px/1.6 'Geist Mono',monospace;color:var(--grn);background:#070908;border:1px solid var(--ln2);border-radius:10px;padding:11px 12px;word-break:break-all}
.term .m{word-break:normal}
.flow{grid-column:span 2;text-align:center;font-size:12px}

/* watch a day */
.day{display:grid;grid-template-columns:.9fr 1.1fr;gap:52px;margin-top:44px;align-items:start}
.step{display:grid;grid-template-columns:62px 1fr;gap:14px;width:100%;padding:17px 0;background:none;border:0;border-top:1px solid var(--ln);color:inherit;text-align:left;font:inherit;cursor:pointer;opacity:.5;transition:opacity .3s}
.step:last-child{border-bottom:1px solid var(--ln)}
.step:hover{opacity:.8}
.step[aria-pressed=true]{opacity:1}
.step .tm{font-size:14px;font-weight:600;padding-top:3px}
.step b{font-size:18px;font-weight:700;letter-spacing:-.02em;display:block}
.step .sx{display:block;font-size:14px;color:var(--mut);margin-top:4px;line-height:1.5}
.step .prog{grid-column:2;height:2px;background:var(--ln);margin-top:12px;border-radius:2px;overflow:hidden;display:none}
.step[aria-pressed=true] .prog{display:block}
.step .prog i{display:block;height:100%;background:var(--grn);width:0}
.step[aria-pressed=true] .prog i{animation:prog 4.5s linear forwards}
.paused .step .prog i{animation-play-state:paused}
@keyframes prog{to{width:100%}}
.dctl{display:flex;gap:12px;margin-top:16px;font-size:13px;color:var(--mut);align-items:center;flex-wrap:wrap}
.dctl button{border:1px solid var(--ln2);background:var(--sf);border-radius:999px;height:36px;padding:0 15px;font:500 13px Geist,system-ui,sans-serif;cursor:pointer;color:var(--ink)}
.dstage{position:sticky;top:132px;background:var(--sf);border:1px solid var(--ln2);border-radius:20px;padding:20px;box-shadow:0 40px 70px -50px #000}
.dstage .bar2{display:grid;grid-template-columns:178px 1fr;gap:18px;font-size:11px;letter-spacing:.12em;text-transform:uppercase;color:var(--mut);margin-bottom:14px;font-weight:600}
.frame{display:grid}
.fr{grid-area:1/1;display:grid;grid-template-columns:178px 1fr;gap:18px;align-items:center;opacity:0;visibility:hidden;transform:translateY(8px);transition:opacity .45s,transform .45s,visibility .45s}
.fr.on{opacity:1;visibility:visible;transform:none}
.fr .phone{box-shadow:0 0 0 1px var(--ln2)}
.okscreen{text-align:center;margin-top:36px}
.ck{width:52px;height:52px;border-radius:50%;background:var(--grn-a);border:1px solid var(--grn-b);color:var(--grn);display:grid;place-items:center;margin:0 auto 12px;font-size:22px;font-weight:700}
.ck.wk{background:var(--warn-a);border-color:var(--warn-b);color:var(--warn)}
.mail{background:var(--rs);border:1px solid var(--ln2);border-radius:10px;padding:10px;margin-top:10px;line-height:1.45}
.mail s{display:flex;justify-content:space-between;text-decoration:none;color:var(--mut);font-size:10px;margin-bottom:3px}
.pbtn{background:var(--grn);color:var(--on-grn);text-align:center;border-radius:8px;padding:9px;font-weight:700;margin-top:12px}
.ubar{height:8px;border-radius:5px;background:var(--rs);overflow:hidden;margin:8px 0 4px}
.ubar i{display:block;height:100%;width:100%;background:var(--amb)}
.con{background:var(--rs);border:1px solid var(--ln);border-radius:14px;padding:16px;font-size:12.5px}
.con .nm{font:600 10.5px 'Geist Mono',monospace;letter-spacing:.12em;text-transform:uppercase;color:var(--mut)}
.con .big{font-size:24px;font-weight:800;letter-spacing:-.03em;margin:6px 0 10px}
.con .row{display:flex;justify-content:space-between;gap:10px;padding:8px 0;border-top:1px solid var(--ln)}
.con .ev{margin-top:10px;background:var(--bg);border-radius:9px;padding:9px 10px;border-left:3px solid var(--grn);font-size:12px;line-height:1.45}
.con .ev.ew{border-left-color:var(--warn)}

/* pillars */
.pillars{display:grid;grid-template-columns:repeat(3,1fr);margin-top:48px;border-top:1px solid var(--ln)}
.pl{padding:28px 28px 28px 0;border-bottom:1px solid var(--ln)}
.pl:not(:nth-child(3n)){border-right:1px solid var(--ln);margin-right:28px}
.pl .n{display:flex;align-items:center;gap:8px;font-size:11.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--mut);font-weight:600}
.pl .n i{font-style:normal;font-family:'Geist Mono',monospace;color:var(--grn);letter-spacing:0}
.pl b{font-size:20px;font-weight:700;letter-spacing:-.02em;display:block;margin:10px 0 6px;line-height:1.2}
.pl p{font-size:14px;color:var(--mut);line-height:1.55}
.agents{display:grid;grid-template-columns:auto 1fr;gap:12px 28px;align-items:center;margin-top:24px;background:var(--sf);border:1px solid var(--ln);border-radius:14px;padding:20px 24px}
.agents b{font-size:18px;font-weight:700;letter-spacing:-.02em;display:flex;align-items:center;gap:10px;white-space:nowrap}
.agents b:before{content:"";width:8px;height:8px;border-radius:50%;background:var(--grn)}
.agents p{font-size:14px;color:var(--mut);line-height:1.55}

/* start + faq */
.start{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-top:44px}
.sp{background:var(--sf);border:1px solid var(--ln);border-radius:16px;padding:22px}
.sp .n{width:34px;height:34px;border-radius:50%;border:1px solid var(--grn-b);color:var(--grn);display:grid;place-items:center;font:600 15px 'Geist Mono',monospace}
.sp b{display:block;font-size:17px;font-weight:700;letter-spacing:-.02em;margin:14px 0 6px;line-height:1.25}
.sp p{font-size:13.5px;color:var(--mut);line-height:1.5}
.sp .tm{display:block;margin-top:12px;font-size:12.5px}
.startcta{display:flex;gap:14px 20px;align-items:center;flex-wrap:wrap;margin-top:26px}
.startcta span{font-size:13.5px;color:var(--mut)}
.faq{margin-top:56px;border-top:1px solid var(--ln)}
.faq details{border-bottom:1px solid var(--ln);padding:20px 0}
.faq summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:16px;font-size:18px;font-weight:700;letter-spacing:-.02em}
.faq summary::-webkit-details-marker{display:none}
.faq summary:after{content:"+";color:var(--grn);font-size:22px;font-weight:400;line-height:1;transition:transform .2s}
.faq details[open] summary:after{transform:rotate(45deg)}
.faq details p{color:var(--mut);font-size:15px;line-height:1.6;margin-top:10px;max-width:720px}

/* book */
.book{background:var(--sf);border:1px solid var(--ln2);border-radius:26px;padding:56px;display:grid;grid-template-columns:1fr 1fr;gap:56px;position:relative;overflow:hidden;margin-top:0}
.book:before,.book:after{content:"";position:absolute;border-radius:50%;border:1px solid rgba(53,208,127,.14);pointer-events:none}
.book:before{left:-140px;bottom:-140px;width:380px;height:380px}
.book:after{left:-60px;bottom:-60px;width:220px;height:220px}
.book > div{position:relative}
.book h2{font-size:42px;line-height:1.05;margin-top:12px;text-wrap:balance}
.book .lede{margin-top:16px;font-size:16.5px}
.book ul{list-style:none;padding:0;margin-top:26px;font-size:14.5px;color:var(--ink)}
.book li{padding:7px 0}.book li:before{content:"✓";color:var(--grn);margin-right:10px;font-weight:700}
.bk{background:var(--rs);border:1px solid var(--ln2);border-radius:18px;padding:26px}
.bk .ttl{font-size:21px;font-weight:700;letter-spacing:-.02em}
.bk label,.bk .glbl{display:block;font-size:12.5px;font-weight:600;margin:16px 0 7px;color:var(--mut)}
.bk input{width:100%;height:46px;border:1px solid var(--ln2);border-radius:8px;padding:0 12px;font:15px Geist,system-ui,sans-serif;background:var(--bg);color:var(--ink)}
.bk input::placeholder{color:#5E6B63}
.bk input:focus{outline:2px solid var(--grn);outline-offset:1px;border-color:var(--grn)}
.seg{display:flex;gap:6px;flex-wrap:wrap}
.seg button{border:1px solid var(--ln2);background:var(--bg);border-radius:999px;height:38px;padding:0 14px;font:500 13.5px Geist,system-ui,sans-serif;cursor:pointer;color:var(--ink)}
.seg button[aria-pressed=true]{background:var(--grn);border-color:var(--grn);color:var(--on-grn);font-weight:700}
.bk .submit{width:100%;justify-content:center;margin-top:22px}
.done{display:none;text-align:center;padding:40px 10px}
.sent .fields{display:none}.sent .done{display:block}
.done .ck{width:60px;height:60px;font-size:26px}
.done .ttl:focus{outline:none}
.done p{color:var(--mut);margin-top:8px;line-height:1.55}
.done b{color:var(--ink)}
.after-form{text-align:center;font-size:14px;color:var(--mut);margin-top:16px}
.after-form a{color:var(--grn);font-weight:600}

@media (max-width:900px){
  .wrap{padding:0 16px}
  .hero,.day,.book{grid-template-columns:1fr}
  .hero{gap:40px;padding-bottom:64px}
  .hero h1{font-size:42px}
  .lede{font-size:16.5px}
  .head h2{font-size:32px}
  .sec{padding:72px 0}
  .scenes{grid-template-columns:1fr}
  .sc.wide{grid-column:auto;grid-template-columns:1fr}
  .two{grid-template-columns:1fr}.flow{grid-column:auto}
  .pillars,.start{grid-template-columns:1fr}
  .pl{padding-right:0;margin-right:0!important;border-right:0!important}
  .dstage{position:relative;top:0}
  .fr,.dstage .bar2{grid-template-columns:1fr}
  .fr .phone,.dstage .bar2 span:first-child{display:none}
  .book{padding:28px 22px;gap:32px}
  .book h2{font-size:30px}
  .agents{grid-template-columns:1fr}
}
@media (max-width:600px){
  .wall{padding:14px}
  .wall-f{position:static;max-width:none;margin-top:12px}
  .under{margin-top:18px;padding:0;flex-direction:column;align-items:center}
  .rt{margin-top:0;max-width:none;width:100%;order:2}
  .tiles{gap:8px}
  .tile{padding:9px 10px}
  .tile b{font-size:17px}
  .frow,.mfeed .frow{grid-template-columns:64px minmax(0,1fr)}
  .frow .ok,.frow .au{grid-column:2;margin-top:-6px}
  .sc .txt,.sc.wide .txt{padding:20px 18px 4px}
  .vis,.sc.wide .vis{margin:14px 12px 12px}
  .st{padding:12px}
  .switch button{padding:0 16px;font-size:14px}
  .bk{padding:20px}
  .wa{margin-left:0}
}
@media (prefers-reduced-motion:reduce){
  html{scroll-behavior:auto}
  *{animation:none!important;transition:none!important}
}
</style><link rel="stylesheet" href="assets/chrome.css">
</head>
<body data-edition="isp">

<?php site_header('isp'); ?>

<main>
<div class="wrap">
  <div class="crumb">Editions / <b>Speedy Connect for ISPs</b></div>
  <section class="hero">
    <div>
      <span class="edition"><b>for ISPs</b> hotspot · home lines</span>
      <h1>Every shilling matched. Every router <em>watched.</em></h1>
      <p class="lede">M-Pesa payments land on the right customer by themselves. Lapsed lines pause each morning. And a router that goes quiet emails you before your customers call.</p>
      <div class="ctas">
        <a class="btn" href="#book">Book an ISP demo</a>
        <a class="btn2" href="#apply">Apply in 3 minutes</a>
        <a class="lnk wa" href="<?= e(whatsapp_url('Hello Speedy Connect, I would like a demo')) ?>"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Zm5.3 14.1c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .1-3.3-.8-2.8-1.1-4.5-3.9-4.7-4.1-.1-.2-1.1-1.5-1.1-2.8s.7-2 1-2.3c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.8 2c.1.2.1.4 0 .5l-.4.6-.4.4c-.1.2-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.3 2.4 1.5.3.1.5.1.6-.1l.9-1c.2-.3.4-.2.6-.1l1.9.9c.3.1.5.2.5.3.1.2.1.7-.2 1.4Z"/></svg>Ask us on WhatsApp</a>
      </div>
      <div class="trust"><span>Works with MikroTik</span><span>No public IP needed</span><span>Bring your customers over from your router</span></div>
    </div>

    <div class="stage" role="img" aria-label="Example screen: the Kilele Net network wall for today. 1,284 customers online, KES 86,450 paid today, 23 of 24 routers up, M-Pesa payments matched to customers as they land, and 14 lapsed lines paused at 06:30. Beside it, a phone on the hotspot page approving an M-Pesa prompt for a KES 50 daily pass.">
      <div class="wall" aria-hidden="true">
        <div class="wall-h"><span><b>Kilele Net · Today</b><span class="ex">Example</span></span><span class="live">Live</span></div>
        <div class="tiles">
          <div class="tile"><s>Online now</s><b class="g">1,284</b></div>
          <div class="tile"><s>Paid today (KES)</s><b class="amt">86,450</b></div>
          <div class="tile"><s>Routers up</s><b>23<small>/24</small></b></div>
        </div>
        <div class="feed">
          <div class="frow"><span class="amt">KES 50</span><span class="nm2">Wanjiru K. <small>· Daily pass</small></span><span class="ok">✓ matched · online</span></div>
          <div class="frow"><span class="amt">KES 1,500</span><span class="nm2">Otieno H. <small>· Home 20 Mbps</small></span><span class="ok">✓ renewed 30 days</span></div>
          <div class="frow"><span class="amt">KES 20</span><span class="nm2">0712 ••• 448 <small>· 2 hours</small></span><span class="ok">✓ matched · online</span></div>
          <div class="frow"><span class="tm">06:30</span><span class="nm2">14 lapsed lines paused</span><span class="au">automatic</span></div>
        </div>
        <div class="wall-f">Names and numbers are made up.</div>
      </div>
      <div class="under" aria-hidden="true">
        <div class="rt">
          <div class="hd"><span>Routers</span><span class="mono">23 of 24 up</span></div>
          <div class="dots24"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i class="dn"></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
          <p><b>Kangemi-02</b> went quiet <span class="tm">4 min</span> ago. <span class="m">You've been emailed.</span></p>
        </div>
        <div class="phone">
          <div class="ph-b">KILELE NET</div>
          <div class="ph-s">Choose a pass</div>
          <div class="opt"><span>2 hours</span><span class="amt">KES 20</span></div>
          <div class="opt sel"><span>Daily pass</span><span class="amt">KES 50</span></div>
          <div class="opt"><span>Weekly</span><span class="amt">KES 300</span></div>
          <div class="stk"><div class="lb2">M-PESA</div><p>Pay <b>KES 50</b> to KILELE NET for a Daily pass?</p><div class="pin">••••</div><div class="bt"><span>Cancel</span><span>Send</span></div></div>
        </div>
      </div>
    </div>
  </section>
</div>

<section class="sec alt" id="limits">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">Sound familiar?</div><h2>Five things that eat an ISP's week, and what changes.</h2></div>
      <p>Most ISPs live with at least one of these. Flip the switch to see each one fixed.</p>
    </div>
    <div class="switch" role="group" aria-label="Compare your ISP today with Speedy Connect">
      <button type="button" class="bf" aria-pressed="true" data-mode="today">Your ISP today</button>
      <button type="button" class="wi" aria-pressed="false" data-mode="with">With Speedy Connect</button>
    </div>
    <p class="hint" id="hint" aria-live="polite">← You're looking at today. Try the switch.</p>

    <div class="scenes" id="scenes">
      <!-- 1. matching M-Pesa by hand -->
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">The Sunday spreadsheet</span><span class="lb t-after">Matched by itself</span></div>
          <h3 class="t-before">Every Sunday, M-Pesa messages matched to names by hand.</h3>
          <h3 class="t-after">Every payment lands on the right customer by itself.</h3>
          <p class="t-before">Someone scrolls the till messages, guesses who paid, and types it into a spreadsheet. One wrong row and a paying customer gets cut off.</p>
          <p class="t-after">Customers pay with an M-Pesa prompt on your hotspot page, or to your paybill or till. Each payment finds its customer and their service turns on. Anything that can't be matched stays in view for you to link.</p>
        </div>
        <div class="vis">
          <div class="st before">
            <div class="sheet">
              <div class="sh"><span>payments-oct.xlsx</span><span>Sun <span class="tm">21:40</span></span></div>
              <div class="r hd2"><span>Time</span><span>M-Pesa message</span><span>Name</span></div>
              <div class="r"><span class="tm">09:14</span><span>QK41… Ksh50.00 from 2547••448</span><span class="w">???</span></div>
              <div class="r"><span class="tm">11:02</span><span>QK42… Ksh1,500.00 from J OTIENO</span><span class="w">Otieno?</span></div>
              <div class="r"><span class="tm">12:37</span><span>QK43… Ksh20.00 from 2547••913</span><span class="w">???</span></div>
              <div class="r"><span class="tm">14:05</span><span>QK44… Ksh300.00 from M WANJIRU</span><span class="w">which one?</span></div>
            </div>
            <span class="tag tw">Still 40 rows to go</span>
          </div>
          <div class="st after">
            <div class="mfeed">
              <div class="frow"><span class="amt">KES 50</span><span>Wanjiru K.</span><span class="ok">✓ matched · online</span></div>
              <div class="frow"><span class="amt">KES 1,500</span><span>Otieno H.</span><span class="ok">✓ renewed 30 days</span></div>
              <div class="frow"><span class="amt">KES 20</span><span>0712 ••• 448</span><span class="ok">✓ matched · online</span></div>
              <div class="frow"><span class="amt">KES 300</span><span>Mary W.</span><span class="ok">✓ matched · online</span></div>
            </div>
            <span class="tag tg">Nobody typed a name</span>
          </div>
        </div>
      </article>

      <!-- 2. but I paid -->
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">"But I paid!"</span><span class="lb t-after">Look up the code</span></div>
          <h3 class="t-before">"But I paid!" calls you can't settle.</h3>
          <h3 class="t-after">Settle "but I paid!" in seconds, with the M-Pesa code.</h3>
          <p class="t-before">The customer is sure. You scroll through hundreds of messages on your phone. Nobody wins the call.</p>
          <p class="t-after">Type the code from their SMS and the payment is found, then linked to their account. Customers can also claim a payment themselves by typing the code on their account page.</p>
        </div>
        <div class="vis">
          <div class="st before">
            <div class="card2"><div class="hd"><span>Incoming call · 0722 ••• 913</span><span class="tm">13:40</span></div>"But I paid! I sent 500 this morning."</div>
            <div class="bub"><s>You, scrolling the till inbox</s>214 messages today… which one is hers?</div>
            <span class="tag tw">Call ends with nobody sure</span>
          </div>
          <div class="st after">
            <div class="card2">
              <div class="hd"><span>Look up an M-Pesa code</span><span class="tm">13:40</span></div>
              <div class="codebox"><span>QK7H2LM9XA</span><span>↵</span></div>
              <div class="g">✓ Found: <span class="amt">KES 500</span> from Achieng O.</div>
              <div class="g" style="margin-top:4px">Linked to her account</div>
            </div>
            <span class="tag tg">Settled while she's still on the line</span>
          </div>
        </div>
      </article>

      <!-- 3. expired still online / chasing -->
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">Cut-offs by hand</span><span class="lb t-after">Service follows payment</span></div>
          <h3 class="t-before">Expired customers stay online, and you chase the rest.</h3>
          <h3 class="t-after">Paid lines turn on. Lapsed lines pause. Nobody chases.</h3>
          <p class="t-before">Cut-offs happen when someone remembers. Meanwhile you're texting people to pay, one by one.</p>
          <p class="t-after">Service turns on the moment payment lands. Lapsed lines pause each morning. Before a plan ends, an SMS reminder goes out, so customers can renew in time.</p>
        </div>
        <div class="vis">
          <div class="st before">
            <div class="card2 rows2">
              <div><span>Mwangi J.<small>Home 10 Mbps · ended 3 days ago</small></span><span class="w">still online</span></div>
              <div><span>Kamau P.<small>Weekly · ended Monday</small></span><span class="w">still online</span></div>
              <div><span>Njeri W.<small>Home 20 Mbps · paid on Friday</small></span><span class="w">cut off by mistake</span></div>
            </div>
            <span class="tag tw">"Please pay" SMS sent by hand: 31</span>
          </div>
          <div class="st after">
            <div class="card2 tl">
              <div><span class="tm">Fri 10:00</span><span>Reminder SMS: "Your line ends tomorrow."</span></div>
              <div><span class="tm">Sat 06:30</span><span>Line paused <span class="m">· automatic</span></span></div>
              <div><span class="tm">Sat 09:14</span><span><span class="amt">KES 1,500</span> paid · <span class="g">back online</span></span></div>
            </div>
            <span class="tag tg">No chasing, no forgotten cut-offs</span>
          </div>
        </div>
      </article>

      <!-- 4. fair use -->
      <article class="sc">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">The heavy user</span><span class="lb t-after">Fair use</span></div>
          <h3 class="t-before">One heavy user slows everyone, or you cut them off and lose them.</h3>
          <h3 class="t-after">Slowed after the allowance, never cut off.</h3>
          <p class="t-before">There's no middle ground. Either the whole area suffers, or a paying customer gets a dead line and calls another provider.</p>
          <p class="t-after">Home lines run at full speed up to their allowance, then slow down. They stay online. Renewing brings full speed back by itself.</p>
        </div>
        <div class="vis">
          <div class="st before">
            <svg class="chart" viewBox="0 0 260 96" role="img" aria-label="Speed line at 20 Mbps that drops to zero when the customer is cut off">
              <line x1="0" y1="80" x2="260" y2="80" stroke="rgba(232,237,233,.12)"/>
              <polyline points="0,20 120,20 128,80 260,80" fill="none" stroke="#E5735C" stroke-width="2"/>
              <text x="4" y="13" fill="#7E8D84" font-size="9" font-family="Geist Mono, monospace">20 Mbps</text>
              <text x="136" y="72" fill="#E5735C" font-size="9" font-family="Geist Mono, monospace">0 · cut off</text>
            </svg>
            <div class="bub"><s>Otieno H. · SMS</s>"Fine. I'm switching provider."</div>
          </div>
          <div class="st after">
            <svg class="chart" viewBox="0 0 260 96" role="img" aria-label="Speed line at 20 Mbps that drops to 5 Mbps after the allowance is used, and stays online">
              <line x1="0" y1="80" x2="260" y2="80" stroke="rgba(232,237,233,.12)"/>
              <polyline points="0,20 120,20 128,65 260,65" fill="none" stroke="#35D07F" stroke-width="2"/>
              <line x1="124" y1="4" x2="124" y2="92" stroke="#E8A33D" stroke-dasharray="3 3"/>
              <text x="4" y="13" fill="#7E8D84" font-size="9" font-family="Geist Mono, monospace">20 Mbps</text>
              <text x="136" y="58" fill="#35D07F" font-size="9" font-family="Geist Mono, monospace">5 Mbps · still online</text>
              <text x="130" y="91" fill="#E8A33D" font-size="8" font-family="Geist Mono, monospace">allowance used</text>
            </svg>
            <span class="tag tg">Renews → full speed again</span>
          </div>
        </div>
      </article>

      <!-- 5. routers (wide) -->
      <article class="sc wide">
        <div class="txt">
          <div class="lim"><span class="dot"></span><span class="lb t-before">Finding out last</span><span class="lb t-after">Routers that report in</span></div>
          <h3 class="t-before">You hear a router is down from angry customers at 9am.</h3>
          <h3 class="t-after">Your routers tell you first.</h3>
          <p class="t-before">And adding a router means a technician visit, plus a public IP from your upstream before you can even reach it.</p>
          <p class="t-after">You get an email when a router goes quiet, and another when it's back. A new router is set up by pasting one line into it, and it's reachable even without a public IP. Health checks explain problems in plain language, with the fix.</p>
        </div>
        <div class="vis">
          <div class="st before">
            <div class="two">
              <div class="card2 rows2">
                <div class="m" style="font-size:11px">Missed calls · from <span class="tm">09:02</span></div>
                <div><span>0722 ••• 104<small>"Is the internet down?"</small></span><span class="w">×3</span></div>
                <div><span>0733 ••• 551<small>"Nothing works in Riruta."</small></span><span class="w">×2</span></div>
              </div>
              <div class="card2 rows2">
                <div class="m" style="font-size:11px">Job card · new router, Kangemi</div>
                <div><span>Technician visit</span><span class="w">Thursday</span></div>
                <div><span>Public IP</span><span class="w">ask upstream</span></div>
              </div>
              <div class="flow w">✕ you find out last</div>
            </div>
          </div>
          <div class="st after">
            <div class="two">
              <div class="card2">
                <div class="mail" style="margin-top:0"><s><span>Email · Speedy Connect</span><span class="tm">22:05</span></s><span class="w">●</span> Riruta-hAP went quiet</div>
                <div class="mail"><s><span>Email · Speedy Connect</span><span class="tm">22:11</span></s><span class="g">●</span> Riruta-hAP is back</div>
              </div>
              <div class="card2">
                <div class="term">/tool fetch url="https://speedy…/r/7Kf2…" dst-path=setup.rsc; /import setup.rsc<br><span class="m">→ Kangemi-02 · connected · hotspot ready</span></div>
                <div style="margin-top:10px;font-size:12px;line-height:1.45"><span class="g">Health:</span> The uplink on Kangemi-02 is running slow. Check the cable on port 1.</div>
              </div>
              <div class="flow g">✓ you know before anyone calls</div>
            </div>
          </div>
        </div>
      </article>
    </div>
    <p class="note">Names, numbers and screens in these examples are made up.</p>
  </div>
</section>

<section class="sec" id="day">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">An example: a Tuesday at Kilele Net</div><h2>Watch a day run itself.</h2></div>
      <p>A made-up ISP with 24 routers, hotspot passes and home lines. Here is one day, as it happens.</p>
    </div>
    <div class="day" id="dayw">
      <div>
        <div class="steps" role="group" aria-label="Moments in the day">
          <button type="button" class="step" aria-pressed="true"><span class="tm">06:30</span><span><b>Lapsed lines pause</b><span class="sx">14 home lines ran out overnight. They're paused, and each customer gets an email saying how to renew.</span></span><span class="prog"><i></i></span></button>
          <button type="button" class="step" aria-pressed="false"><span class="tm">08:12</span><span><b>Wanjiru buys a daily pass</b><span class="sx">She picks KES 50 on the hotspot page, approves the M-Pesa prompt, and is online in seconds. Nobody at the office lifts a finger.</span></span><span class="prog"><i></i></span></button>
          <button type="button" class="step" aria-pressed="false"><span class="tm">13:40</span><span><b>"But I paid!"</b><span class="sx">Achieng calls. You type the M-Pesa code from her SMS: KES 500, found and linked to her account while she's still on the line.</span></span><span class="prog"><i></i></span></button>
          <button type="button" class="step" aria-pressed="false"><span class="tm">19:30</span><span><b>A home line uses its allowance</b><span class="sx">Otieno's line slows to 5 Mbps instead of cutting off. He's still online, and renewing brings full speed back.</span></span><span class="prog"><i></i></span></button>
          <button type="button" class="step" aria-pressed="false"><span class="tm">22:05</span><span><b>The Riruta router goes quiet</b><span class="sx">You get an email straight away. At 22:11 it's back, and a second email says so.</span></span><span class="prog"><i></i></span></button>
        </div>
        <div class="dctl"><button type="button" id="pp" aria-label="Pause the day">❚❚ Pause</button><span>or pick any moment</span></div>
      </div>
      <div class="dstage" id="dstage" aria-live="off">
        <div class="bar2" aria-hidden="true"><span>On the phone</span><span>In your console</span></div>
        <div class="frame">
          <div class="fr on">
            <div class="phone"><div class="ph-s" style="margin-top:2px">Mail</div><div class="mail"><s><span>Kilele Net</span><span class="tm">06:30</span></s><b>Your home line is paused</b><br><span class="m">Your plan ended last night. Renew from your account page and you're back on at once.</span></div><div class="pbtn">Renew · KES 1,500</div></div>
            <div class="con"><div class="nm">Today · automatic</div><div class="big">14 lines paused</div><div class="row"><span>Mwangi J. · Home 10 Mbps</span><span class="m">paused</span></div><div class="row"><span>Kamau P. · Home 20 Mbps</span><span class="m">paused</span></div><div class="row"><span>and 12 more</span><span class="tm">06:30</span></div><div class="ev">Each customer emailed how to renew</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-b">KILELE NET</div><div class="ph-s">Hotspot</div><div class="okscreen"><div class="ck">✓</div><b style="font-size:14px">You're online</b><p class="m" style="font-size:11px;margin-top:6px;line-height:1.5">Daily pass until <span class="tm">08:12</span> tomorrow<br><span class="amt">KES 50</span> paid by M-Pesa</p></div></div>
            <div class="con"><div class="nm">Payments · live</div><div class="big amt">KES 50</div><div class="row"><span>Customer</span><span>Wanjiru K.</span></div><div class="row"><span>Pass</span><span>Daily · 24 hours</span></div><div class="row"><span>Status</span><span class="g">✓ matched · online</span></div><div class="ev">Prompt approved, matched and online at <span class="tm">08:12:09</span></div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-s" style="margin-top:2px">Messages</div><div class="mail"><s><span>M-PESA</span><span class="tm">08:03</span></s><span class="mono">QK7H2LM9XA</span> Confirmed. <span class="amt">KES 500.00</span> sent to KILELE NET.</div><p class="m" style="font-size:10.5px;margin-top:10px;text-align:center">She reads you the code</p></div>
            <div class="con"><div class="nm">Look up an M-Pesa code</div><div class="codebox" style="margin-top:10px"><span>QK7H2LM9XA</span><span>↵</span></div><div class="row"><span>Amount</span><span class="amt">KES 500</span></div><div class="row"><span>From</span><span>Achieng O.</span></div><div class="row"><span>Paid at</span><span class="tm">08:03</span></div><div class="ev">✓ Linked to her account · <span class="tm">13:41</span></div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-b">KILELE NET</div><div class="ph-s">My line · Home 20 Mbps</div><div class="mail" style="margin-top:14px"><s><span>This month</span><span class="mono">100 / 100 GB</span></s><div class="ubar"><i></i></div><span class="g">Still online</span> <span class="m">at 5 Mbps</span></div><div class="pbtn">Renew for full speed</div></div>
            <div class="con"><div class="nm">Fair use · today</div><div class="big">Otieno H.</div><div class="row"><span>Plan</span><span>Home 20 Mbps</span></div><div class="row"><span>Allowance</span><span class="mono">100 GB used</span></div><div class="row"><span>Speed now</span><span class="mono">5 Mbps</span></div><div class="row"><span>Status</span><span class="g">still online</span></div><div class="ev">Full speed comes back when he renews</div></div>
          </div>
          <div class="fr">
            <div class="phone"><div class="ph-s" style="margin-top:2px">Mail · your phone</div><div class="mail"><s><span>Speedy Connect</span><span class="tm">22:05</span></s><span class="w">●</span> <b>Riruta-hAP went quiet</b></div><div class="mail"><s><span>Speedy Connect</span><span class="tm">22:11</span></s><span class="g">●</span> <b>Riruta-hAP is back</b></div></div>
            <div class="con"><div class="nm">Routers · 23 of 24 up</div><div class="big">Riruta-hAP</div><div class="row"><span>Went quiet</span><span class="tm">22:05</span></div><div class="row"><span>Email sent</span><span class="tm">22:05</span></div><div class="row"><span>Back online</span><span class="tm">22:11</span></div><div class="ev">Second email sent: it's back</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="sec alt">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">The network underneath</div><h2>The same Speedy Connect, set up for how an ISP runs.</h2></div>
      <p>Every edition shares one network platform. Here's what each part does when you sell internet.</p>
    </div>
    <div class="pillars">
      <div class="pl"><span class="n"><i>01</i> Routers</span><b>One paste per router. Watched all day.</b><p>Set up a MikroTik by pasting one line, reachable without a public IP. Plain-language health checks, an email when it goes quiet, and a warning before it reaches its limit. Swap or move a router and its customers follow.</p></div>
      <div class="pl"><span class="n"><i>02</i> Access</span><b>Every customer finds a way in.</b><p>Hotspot passes bought with M-Pesa, vouchers printed in batches, home lines, free trial time, and moving a paid plan to another phone with an SMS code.</p></div>
      <div class="pl"><span class="n"><i>03</i> Control</span><b>Sell exactly the plan you mean.</b><p>Packages set speed, data, duration, price and devices. Fair use slows heavy users instead of cutting them off. A special case? Give one customer a boost.</p></div>
      <div class="pl"><span class="n"><i>04</i> Money</span><b>Books that balance.</b><p>M-Pesa matched to customers, invoices and receipts by email, your wallet and payouts, and expenses, so you see profit, not just sales. Cash and bank payments go in the same books.</p></div>
      <div class="pl"><span class="n"><i>05</i> Customers</span><b>Reach them where they are.</b><p>SMS, WhatsApp and email campaigns, automatic expiry reminders, and a self-service page where customers pay, renew and download receipts.</p></div>
      <div class="pl"><span class="n"><i>06</i> Visibility</span><b>Know how the day is going.</b><p>Who's online right now, the network wall for the office TV, monthly reports, and a weekly summary email to the owner.</p></div>
    </div>
    <div class="agents"><b>Grow through agents</b><p>Resellers and voucher agents top up a prepaid balance and sell your vouchers. Their commission is worked out automatically, and each one has a statement.</p></div>
  </div>
</section>

<section class="sec" id="apply">
  <div class="wrap">
    <div class="head">
      <div><div class="kick">Getting started</div><h2>Sign up yourself. Keep your routers and customers.</h2></div>
      <p>ISPs can apply online today. No technician visit: you set up each router yourself, in minutes.</p>
    </div>
    <div class="start">
      <div class="sp"><span class="n">1</span><b>Apply</b><p>Tell us about your business and set up your account.</p><span class="tm">3 minutes</span></div>
      <div class="sp"><span class="n">2</span><b>A person verifies you</b><p>Our team checks your business details. Only verified businesses run on Speedy Connect.</p><span class="tm">within a day</span></div>
      <div class="sp"><span class="n">3</span><b>Paste one line into each router</b><p>Copy it from your console into the MikroTik. The router connects and the hotspot is ready.</p><span class="tm">minutes</span></div>
      <div class="sp"><span class="n">4</span><b>Bring your home-line customers</b><p>Import them from your MikroTik, with a report of what came over.</p><span class="tm">an afternoon</span></div>
    </div>
    <div class="startcta"><a class="btn" href="#">Apply in 3 minutes</a><span>or <a class="lnk" href="#book">book a demo first</a></span></div>
    <div class="faq">
      <details open><summary>Which routers does it work with?</summary><p>MikroTik. You keep the routers you already have, and each one is set up by pasting one line into it.</p></details>
      <details><summary>Do I need a public IP?</summary><p>No. Your routers stay reachable from your console wherever they are, even behind a connection without a public IP.</p></details>
      <details><summary>Can I keep my current customers?</summary><p>Yes. Import your home-line customers straight from your MikroTik, with a report of what came over. Switching takes about an afternoon.</p></details>
      <details><summary>How do customers pay?</summary><p>With an M-Pesa prompt on your hotspot page, or from their self-service page when they renew. Payments to your paybill or till are matched to customers too. Cash and bank payments are recorded by hand, so all your money is in one place.</p></details>
    </div>
  </div>
</section>

<section class="wrap" id="book">
  <div class="book">
    <div>
      <div class="kick">Book an ISP demo</div>
      <h2>See your own network running on Speedy Connect.</h2>
      <p class="lede">30 minutes on a call or video. We'll set it up with your own packages and prices, and show you a payment landing, a router being added and the morning's paused lines.</p>
      <ul><li>No commitment, no card</li><li>We reply on WhatsApp to agree a time</li><li>Bring your technician if you have one</li></ul>
    </div>
    <div>
      <form class="bk" id="f" novalidate method="get" action="<?= e(whatsapp_url()) ?>" target="_blank" data-booking>
<?php booking_fields('isp'); ?>
        <div class="fields">
          <div class="ttl">Book my demo</div>
          <span class="glbl" id="ed-l">Your edition</span>
          <div class="seg" id="ed" role="group" aria-labelledby="ed-l"><button type="button" aria-pressed="true" data-ed="ISP">ISP</button><button type="button" aria-pressed="false" data-ed="hotel">Hotel</button><button type="button" aria-pressed="false" data-ed="café">Café</button><button type="button" aria-pressed="false" data-ed="school">School</button><button type="button" aria-pressed="false" data-ed="venue">Venue</button></div>
          <label for="n">Your name</label><input id="n" name="name" required minlength="2" maxlength="80" placeholder="Peter Kamau" autocomplete="name">
          <label for="h">Business name</label><input id="h" name="business" required minlength="2" maxlength="120" placeholder="Kilele Net" autocomplete="organization">
          <label for="p">Your phone number</label><input id="p" name="phone" type="tel" required maxlength="20" placeholder="0712 345 678" inputmode="tel" autocomplete="tel">
          <span class="glbl" id="rt-l">How many routers?</span>
          <div class="seg" role="group" aria-labelledby="rt-l"><button type="button" aria-pressed="false">1–2</button><button type="button" aria-pressed="true">3–10</button><button type="button" aria-pressed="false">11+</button></div>
          <button class="btn submit" id="sb" type="submit">Continue on WhatsApp →</button>
        </div>
        <div class="done" aria-live="polite"><div class="ck">✓</div><div class="ttl" id="done-t" tabindex="-1">Thanks, <span id="nm">Peter</span>.</div><p>Press <b>Send</b> in WhatsApp and we'll reply to agree a time for your <span id="edn">ISP</span> demo.</p></div>
      </form>
      <p class="after-form">Prefer to start now? <a href="#apply">Apply in 3 minutes →</a></p>
    </div>
  </div>
</section>
</main>

<div style="height:96px"></div><?php site_footer(); ?>

<script src="assets/site.js"></script>
<script src="assets/booking.js"></script>
<script src="assets/page-isp.js"></script>
</body></html>
