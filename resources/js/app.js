import './bootstrap';

// === Sidebar collapse toggle ===
(() => {
  const KEY = 'dto.sidebar.collapsed';
  const body = document.body;

  if (localStorage.getItem(KEY) === '1') body.classList.add('sidebar-collapsed');

  document.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-toggle-sidebar]');
    if (!btn) return;
    body.classList.toggle('sidebar-collapsed');
    localStorage.setItem(KEY, body.classList.contains('sidebar-collapsed') ? '1' : '0');
  }, true);
})();
