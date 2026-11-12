/*
 * "Book a demo" on a static site: checks the details, then opens WhatsApp to the business number
 * with the request already typed out. The visitor presses Send. Nothing is stored or sent anywhere
 * else. The page's own demo-only submit handler never runs (this listens in the capture phase).
 */
(function () {
  'use strict';

  function pressed(group) {
    var b = group && group.querySelector('button[aria-pressed="true"]');
    return b ? b.textContent.trim() : '';
  }

  function oneLine(v) {
    return String(v || '').replace(/[\u0000-\u001F\u007F]+/g, ' ').replace(/\s+/g, ' ').trim();
  }

  function check(form) {
    var errors = [];
    var name = oneLine(form.elements.name.value);
    var business = oneLine(form.elements.business.value);
    var phone = oneLine(form.elements.phone.value);
    var digits = phone.replace(/\D+/g, '');
    if (name.length < 2 || name.length > 80) errors.push(['name', 'Tell us your name.']);
    if (business.length < 2 || business.length > 120) errors.push(['business', 'Tell us the name of your business.']);
    if (!/^\+?[0-9 ()\-]{9,20}$/.test(phone) || digits.length < 9 || digits.length > 15) {
      errors.push(['phone', 'Enter a phone number we can WhatsApp, like 0712 345 678.']);
    }
    return { errors: errors, name: name, business: business, phone: phone };
  }

  document.addEventListener('submit', function (e) {
    var form = e.target;
    if (!form.matches || !form.matches('form[data-booking]')) return;
    e.preventDefault();
    e.stopPropagation();

    var groups = form.querySelectorAll('.seg');
    var edition = pressed(groups[0]) || form.elements.edition.value;
    var size = pressed(groups[1]) || form.elements.size.value;

    var msg = form.querySelector('.bk-msg');
    msg.hidden = true;
    msg.textContent = '';
    form.querySelectorAll('[aria-invalid]').forEach(function (el) { el.removeAttribute('aria-invalid'); });

    var r = check(form);
    if (r.errors.length) {
      r.errors.forEach(function (x) { form.elements[x[0]].setAttribute('aria-invalid', 'true'); });
      msg.textContent = r.errors[0][1];
      msg.hidden = false;
      form.elements[r.errors[0][0]].focus();
      return;
    }

    var base = form.getAttribute('action') || '';
    if (!/^https:\/\/wa\.me\/\d{9,15}$/.test(base)) {
      msg.textContent = 'Booking is not set up yet. Please call or email us instead.';
      msg.hidden = false;
      return;
    }

    var text = [
      'Hello Speedy Connect, I would like a demo.',
      '',
      'Edition: ' + edition,
      'Name: ' + r.name,
      'Business: ' + r.business,
      'Phone: ' + r.phone,
      form.elements.size_label.value + ' ' + size,
      '',
      '(Sent from the ' + form.elements.page.value + ' page on the website)'
    ].join('\n');
    var url = base + '?text=' + encodeURIComponent(text);

    var w = window.open(url, '_blank', 'noopener');
    if (!w) window.location.href = url; // pop-up blocked: go there in this tab

    var nm = form.querySelector('#nm'), ph = form.querySelector('#ph'), edn = form.querySelector('#edn');
    if (nm) nm.textContent = r.name.split(' ')[0];
    if (ph) ph.textContent = r.phone;
    if (edn) edn.textContent = edition;
    form.classList.add('sent');
    var t = form.querySelector('.done [tabindex="-1"]') || form.querySelector('.done');
    if (t) {
      if (!t.hasAttribute('tabindex')) t.setAttribute('tabindex', '-1');
      t.focus();
    }
  }, true);
})();
