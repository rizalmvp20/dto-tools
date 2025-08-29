;(() => {
  const shell = document.querySelector('.dash-shell')
  const toggle = document.getElementById('sideToggle')
  const profile = document.getElementById('profileMenu')

  // toggle sidebar
  toggle?.addEventListener('click', () => {
    const collapsed = shell.getAttribute('data-collapsed') === 'true'
    shell.setAttribute('data-collapsed', String(!collapsed))
    try { localStorage.setItem('sidebar_collapsed', String(!collapsed)) } catch {}
  })

  // restore from localStorage
  try {
    const saved = localStorage.getItem('sidebar_collapsed')
    if (saved !== null) shell.setAttribute('data-collapsed', saved)
  } catch {}

  // profile dropdown
  const btn = profile?.querySelector('.profile-btn')
  const dd  = profile?.querySelector('.profile-dd')
  btn?.addEventListener('click', (e) => {
    e.stopPropagation()
    dd.style.display = dd.style.display === 'block' ? 'none' : 'block'
  })
  document.addEventListener('click', () => dd && (dd.style.display = 'none'))

  // fake notif indicator (contoh)
  const notifBtn = document.getElementById('notifBtn')
  notifBtn?.addEventListener('click', () => alert('Coming soon: notifications'))
})()
