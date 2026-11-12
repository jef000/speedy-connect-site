/* Page script for schools.php (moved out of the page so the CSP can forbid inline scripts). */
(function(){
  var sw=document.querySelectorAll('.switch button'),scn=document.getElementById('scenes'),hint=document.getElementById('hint');
  sw.forEach(function(b){b.addEventListener('click',function(){
    var w=b.dataset.mode==='with';
    sw.forEach(function(x){x.setAttribute('aria-pressed',String(x===b));});
    scn.classList.toggle('fixed',w);
    hint.textContent=w?'This is your school on Speedy Connect.':'You\'re looking at today. Try the switch.';
  });});
})();

(function(){
  var steps=[].slice.call(document.querySelectorAll('.step')),frs=[].slice.call(document.querySelectorAll('.fr')),
      w=document.getElementById('dayw'),pp=document.getElementById('pp'),ds=document.getElementById('dstage'),
      i=0,t=null,paused=false;
  var reduce=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var PLAY='▶︎ Play',PAUSE='Pause';
  function show(k){
    i=k;
    steps.forEach(function(s,j){
      var on=j===k;s.classList.toggle('on',on);
      if(on)s.setAttribute('aria-current','step');else s.removeAttribute('aria-current');
      var p=s.querySelector('.prog i');if(p){p.style.animation='none';void p.offsetHeight;p.style.animation='';}
    });
    frs.forEach(function(f,j){var on=j===k;f.classList.toggle('on',on);if(on)f.removeAttribute('aria-hidden');else f.setAttribute('aria-hidden','true');});
  }
  function tick(){clearTimeout(t);if(paused)return;t=setTimeout(function(){show((i+1)%steps.length);tick();},4500);}
  function setPaused(v){paused=v;w.classList.toggle('paused',v);pp.textContent=v?PLAY:PAUSE;ds.setAttribute('aria-live',v?'polite':'off');}
  steps.forEach(function(s,j){s.addEventListener('click',function(){ds.setAttribute('aria-live','polite');show(j);tick();});});
  pp.addEventListener('click',function(){setPaused(!paused);tick();});
  if(reduce)setPaused(true);
  tick();
})();

document.querySelectorAll('.seg').forEach(function(g){g.addEventListener('click',function(e){
  var b=e.target.closest('button');if(!b)return;
  g.querySelectorAll('button').forEach(function(x){x.setAttribute('aria-pressed',String(x===b));});
});});

document.getElementById('f').addEventListener('submit',function(e){
  e.preventDefault();
  var n=document.getElementById('n').value.trim(),p=document.getElementById('p').value.trim();
  document.getElementById('nm').textContent=(n||'Esther').split(' ')[0];
  document.getElementById('ph').textContent=p||'0712 345 678';
  document.getElementById('f').classList.add('sent');
  document.getElementById('thanks').focus();
});
