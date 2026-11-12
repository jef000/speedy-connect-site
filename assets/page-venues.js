/* Page script for the venues page (moved out of the page so the CSP can forbid inline scripts). */
(function(){
  /* hero: "Your venue" swaps the floor plan */
  var V={
    office:{t:'Bidii Co-working · Kilimani',f:'Floor 2',cap:'an example office',o:'22 devices',
      r:[['Open office · 12 desks','DESK-07 · 7731','2 devices per desk · 20 Mbps'],['Meeting room','MEET · 4410','Board meeting · until 17:00'],['Reception TV','TV · 4 Mbps','Slowed by kind of device'],['Visitors','GUEST · 9025','until Friday · New code ↻']]},
    clinic:{t:'A clinic',f:'Ground floor',cap:'an example clinic',o:'31 devices',
      r:[['Consult rooms · 6','ROOM-3 · 5160','2 devices per room · 20 Mbps'],['Waiting room TV','TV · 4 Mbps','Slowed by kind of device'],['Staff','STAFF · 6082','Up to 25 devices · always'],["Patients' families",'FAMILY · 2271','1 device each · New code ↻']]},
    church:{t:'A church',f:'Main compound',cap:'an example church',o:'140 devices',
      r:[['Office','OFFICE · 6604','3 devices · always'],['Hall','HALL · 8812','Youth meeting · until 21:00'],['Media desk','MEDIA · 2047','Streaming laptop · 20 Mbps'],['Congregation','SUNDAY · 4419','1 device each · ends Sun 14:00']]},
    event:{t:'An event venue',f:'Saturday',cap:'an example event venue',o:'212 devices',
      r:[['Main hall · 300 seats','WED · 5530','Up to 300 devices · ends Sat 23:59'],['Green room','GREEN · 7109','4 devices · 20 Mbps'],['Vendors','VENDOR · 3382','2 devices each · until Sunday'],['Guests','GUEST · 9025','1 device each · 3 Mbps']]}
  };
  var vb=[].slice.call(document.querySelectorAll('.vseg button'));
  function $(id){return document.getElementById(id);}
  function setVenue(k){
    var d=V[k];if(!d)return;
    vb.forEach(function(b){b.setAttribute('aria-pressed',String(b.dataset.v===k));});
    $('planT').textContent=d.t;$('planF').textContent=d.f;$('r1o').textContent=d.o;
    for(var i=0;i<4;i++){
      $('r'+(i+1)+'n').textContent=d.r[i][0];$('r'+(i+1)+'c').textContent=d.r[i][1];$('r'+(i+1)+'r').textContent=d.r[i][2];
      var rm=$('rm'+(i+1));rm.classList.add('flash');
      (function(el){setTimeout(function(){el.classList.remove('flash');},350);})(rm);
    }
    $('planCap').textContent='Showing '+d.cap+'. Codes are named after your places and work anywhere on your Wi-Fi.';
  }
  vb.forEach(function(b){b.addEventListener('click',function(){setVenue(b.dataset.v);});});

  /* Today / With switch */
  var sw=[].slice.call(document.querySelectorAll('.switch button')),scn=$('scenes'),hint=$('hint');
  sw.forEach(function(b){b.addEventListener('click',function(){
    var w=b.dataset.mode==='with';
    sw.forEach(function(x){x.setAttribute('aria-pressed',String(x===b));});
    scn.classList.toggle('fixed',w);
    hint.textContent=w?'This is your venue on Speedy Connect.':"You're looking at today. Try the switch.";
  });});

  /* Watch a day */
  var steps=[].slice.call(document.querySelectorAll('#steps .step')),frs=[].slice.call(document.querySelectorAll('.fr')),dw=$('dayw'),pp=$('pp'),i=0,t=null,paused=false;
  var reduce=window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  function show(k){
    i=k;
    steps.forEach(function(s,j){
      s.classList.toggle('on',j===k);s.setAttribute('aria-pressed',String(j===k));
      var p=s.querySelector('.prog i');if(p){p.style.animation='none';void p.offsetHeight;p.style.animation='';}
    });
    frs.forEach(function(f,j){f.classList.toggle('on',j===k);f.setAttribute('aria-hidden',String(j!==k));});
  }
  function tick(){clearTimeout(t);if(paused)return;t=setTimeout(function(){show((i+1)%steps.length);tick();},4500);}
  function setPaused(v){paused=v;dw.classList.toggle('paused',v);pp.textContent=v?'▶ Play':'❚❚ Pause';pp.setAttribute('aria-label',v?'Play the day':'Pause the day');tick();}
  steps.forEach(function(s,j){
    s.addEventListener('click',function(){show(j);tick();});
    s.addEventListener('keydown',function(e){if(e.key==='Enter'||e.key===' '){e.preventDefault();show(j);tick();}});
  });
  pp.addEventListener('click',function(){setPaused(!paused);});
  show(0);
  setPaused(!!reduce);

  /* segmented buttons in the form */
  [].slice.call(document.querySelectorAll('.seg')).forEach(function(g){g.addEventListener('click',function(e){
    var b=e.target.closest('button');if(!b)return;
    [].slice.call(g.querySelectorAll('button')).forEach(function(x){x.setAttribute('aria-pressed',String(x===b));});
  });});

  /* booking → thank-you */
  $('f').addEventListener('submit',function(e){
    e.preventDefault();
    var n=$('n').value.trim(),p=$('p').value.trim();
    $('nm').textContent=(n||'Wanjiru').split(/\s+/)[0];
    $('ph').textContent=p||'0712 345 678';
    $('f').classList.add('sent');
    $('dn').focus();
  });
})();
