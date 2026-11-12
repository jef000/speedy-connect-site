/* Page script for the hotels page (moved out of the page so the CSP can forbid inline scripts). */
(function(){var el=document.getElementById('qr1');var n=21,s=7;function f(r,c){var a=[[0,0],[0,14],[14,0]];for(var i=0;i<3;i++){var R=r-a[i][0],C=c-a[i][1];if(R>=0&&R<7&&C>=0&&C<7)return(R==0||R==6||C==0||C==6||(R>1&&R<5&&C>1&&C<5))?1:0}return -1}
for(var r=0;r<n;r++)for(var c=0;c<n;c++){var v=f(r,c);if(v<0){s=(s*1103515245+12345)&0x7fffffff;v=(s>>16)&1}var i=document.createElement('i');i.style.background=v?'#1E2A26':'transparent';el.appendChild(i)}})();

var sw=document.querySelectorAll('.switch button'),scn=document.getElementById('scenes'),hint=document.getElementById('hint');
sw.forEach(function(b){b.addEventListener('click',function(){var w=b.dataset.mode==='with';sw.forEach(function(x){x.setAttribute('aria-pressed',String(x===b))});scn.classList.toggle('fixed',w);hint.textContent=w?'This is your hotel on Speedy Connect.':'← You\'re looking at today. Try the switch.';});});

(function(){var steps=[].slice.call(document.querySelectorAll('.step')),frs=[].slice.call(document.querySelectorAll('.fr')),w=document.getElementById('dayw'),pp=document.getElementById('pp'),i=0,t=null,paused=false;
var reduce=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
function show(k){i=k;steps.forEach(function(s,j){s.classList.toggle('on',j===k);var p=s.querySelector('.prog i');if(p){p.style.animation='none';void p.offsetHeight;p.style.animation='';}});frs.forEach(function(f,j){f.classList.toggle('on',j===k)});}
function tick(){clearTimeout(t);if(paused)return;t=setTimeout(function(){show((i+1)%steps.length);tick();},4500);}
steps.forEach(function(s,j){s.addEventListener('click',function(){show(j);tick();});});
pp.addEventListener('click',function(){paused=!paused;w.classList.toggle('paused',paused);pp.textContent=paused?'▶ Play':'❚❚ Pause';tick();});
if(reduce){paused=true;w.classList.add('paused');pp.textContent='▶ Play';}
tick();})();

document.querySelectorAll('.seg').forEach(function(g){g.addEventListener('click',function(e){var b=e.target.closest('button');if(!b)return;g.querySelectorAll('button').forEach(function(x){x.setAttribute('aria-pressed',String(x===b))});});});
