/* Opens and closes the Editions menu in the shared top bar. */
(function () {
  'use strict';
  var btn = document.querySelector('.sc-ed > button');
  if (!btn) return;
  function set(open) { btn.setAttribute('aria-expanded', open ? 'true' : 'false'); }
  btn.addEventListener('click', function (e) {
    e.stopPropagation();
    set(btn.getAttribute('aria-expanded') !== 'true');
  });
  document.addEventListener('click', function (e) {
    if (!e.target.closest('.sc-dd')) set(false);
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') { set(false); btn.focus(); }
  });
})();
