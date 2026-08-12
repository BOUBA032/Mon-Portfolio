document.addEventListener('DOMContentLoaded', () => {

  
  const yearEl = document.getElementById('year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();


  document.querySelectorAll('.nav-link[href^="#"]').forEach(link => {
    link.addEventListener('click', () => {
      const menu = document.getElementById('navMenu');
      if (menu.classList.contains('show')) {
        bootstrap.Collapse.getOrCreateInstance(menu).hide();
      }
    });
  });

  
  const form = document.getElementById('contactForm');
  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const data = new FormData(form);
    const btn = form.querySelector('button[type="submit"]');
    const originalText = btn.textContent;
    btn.disabled = true;
    btn.textContent = 'Envoi...';

    try {
      const res = await fetch('contact.php', {
        method: 'POST',
        body: data
      });
      const result = await res.json();

      if (result.success) {
        form.reset();
        alert('Message envoyé avec succès !');
      } else {
        alert(result.message || "Une erreur est survenue.");
      }
    } catch (err) {
      alert("Erreur réseau, réessayez plus tard.");
    } finally {
      btn.disabled = false;
      btn.textContent = originalText;
    }
  });
});