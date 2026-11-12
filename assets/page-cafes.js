/* Page script for cafes.php (moved out of the page so the CSP can forbid inline scripts). */
var sw=document.querySelectorAll('.switch button'),scn=document.getElementById('scenes'),hint=document.getElementById('hint');
sw.forEach(function(b){b.addEventListener('click',function(){var w=b.dataset.mode==='with';sw.forEach(function(x){x.setAttribute('aria-pressed',String(x===b))});scn.classList.toggle('fixed',w);hint.textContent=w?'This is your café on Speedy Connect.':'← You\'re looking at today. Try the switch.';});});

(function(){var steps=[].slice.call(document.querySelectorAll('.step')),frs=[].slice.call(document.querySelectorAll('.fr')),w=document.getElementById('dayw'),pp=document.getElementById('pp'),stage=document.getElementById('dstage'),i=0,t=null,paused=false;
var reduce=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
function show(k){i=k;steps.forEach(function(s,j){var on=j===k;s.classList.toggle('on',on);if(on)s.setAttribute('aria-current','step');else s.removeAttribute('aria-current');var p=s.querySelector('.prog i');if(p){p.style.animation='none';void p.offsetHeight;p.style.animation='';}});frs.forEach(function(f,j){f.classList.toggle('on',j===k);f.setAttribute('aria-hidden',String(j!==k));});}
function live(){stage.setAttribute('aria-live',paused?'polite':'off');}
function tick(){clearTimeout(t);live();if(paused)return;t=setTimeout(function(){show((i+1)%steps.length);tick();},5000);}
function setPaused(v){paused=v;w.classList.toggle('paused',v);pp.textContent=v?'▶ Play':'❚❚ Pause';pp.setAttribute('aria-label',v?'Play the day':'Pause the day');}
steps.forEach(function(s,j){s.addEventListener('click',function(){show(j);tick();});});
pp.addEventListener('click',function(){setPaused(!paused);tick();});
if(reduce)setPaused(true);else setPaused(false);
show(0);tick();})();

document.querySelectorAll('.seg').forEach(function(g){g.addEventListener('click',function(e){var b=e.target.closest('button');if(!b)return;g.querySelectorAll('button').forEach(function(x){x.setAttribute('aria-pressed',String(x===b))});});});
document.getElementById('f').addEventListener('submit',function(e){e.preventDefault();var n=document.getElementById('n').value.trim(),p=document.getElementById('p').value.trim();document.getElementById('nm').textContent=(n||'Njeri').split(' ')[0];document.getElementById('ph').textContent=p||'0712 345 678';this.classList.add('sent');document.getElementById('thx').focus();});
