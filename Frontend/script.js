// public/script.js

const API_BASE = '/backend';

// Toggle menu mobile
document.getElementById('mobile-menu-btn')?.addEventListener('click', () => {
  document.getElementById('main-menu')?.classList.toggle('open');
});

// FUNÇÃO DE LOGIN
async function login(event) {
  event.preventDefault();
  const form = event.target;
  const email = form.email.value;
  const password = form.password.value;

  const res = await fetch(`${API_BASE}/login.php`, {
    method: 'POST',
    headers: {'Content-Type':'application/json'},
    body: JSON.stringify({ email, password })
  });
  if (res.ok) {
    window.location.href = 'index.php';
  } else {
    const text = await res.text();
    alert(text);
  }
}

// FUNÇÃO DE REGISTRO
async function register(event) {
  event.preventDefault();
  const form = event.target;
  const name = form.name.value;
  const email = form.email.value;
  const password = form.password.value;

  const res = await fetch(`${API_BASE}/register.php`, {
    method: 'POST',
    headers: {'Content-Type':'application/json'},
    body: JSON.stringify({ name, email, password })
  });
  if (res.ok) {
    alert('Registo bem‑sucedido! Faz login.');
    window.location.href = 'login.php';
  } else {
    const text = await res.text();
    alert(text);
  }
}

// FUNÇÃO DE LOGOUT
async function logout() {
  await fetch(`${API_BASE}/logout.php`, {
    method: 'GET'
  });
  window.location.href = 'login.php';
}
document.getElementById('logoutBtn')?.addEventListener('click', logout);

// SUBMETER NOVO PEDIDO
async function submitRequest(event) {
  event.preventDefault();
  const form = event.target;
  const service_type = form.service_type.value;
  const description  = form.description.value;

  const res = await fetch(`${API_BASE}/submit_request.php`, {
    method: 'POST',
    headers: {'Content-Type':'application/json'},
    body: JSON.stringify({ service_type, description })
  });
  if (res.ok) {
    alert('Pedido submetido com sucesso!');
    form.reset();
    loadOrderHistory();
  } else {
    const text = await res.text();
    alert(text);
  }
}

// CARREGAR HISTÓRICO DO CLIENTE
async function loadOrderHistory() {
  const res = await fetch(`${API_BASE}/get_requests.php`);
  if (!res.ok) return;
  const pedidos = await res.json();
  const tbody = document.querySelector('#historyTable tbody');
  if (!tbody) return;
  tbody.innerHTML = '';
  pedidos.forEach(p => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${p.id}</td>
      <td>${p.service_type}</td>
      <td>${p.description}</td>
      <td>${p.status}</td>
      <td>${new Date(p.created_at).toLocaleString()}</td>
    `;
    tbody.appendChild(tr);
  });
}

// CARREGAR TODOS OS PEDIDOS (ADMIN)
async function loadAllRequests() {
  const res = await fetch(`${API_BASE}/get_all_requests.php`);
  if (!res.ok) return;
  const pedidos = await res.json();
  const tbody = document.querySelector('#adminTable tbody');
  if (!tbody) return;
  tbody.innerHTML = '';
  pedidos.forEach(p => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${p.id}</td>
      <td>${p.user_name} (${p.email})</td>
      <td>${p.service_type}</td>
      <td>${p.description}</td>
      <td>
        <select data-id="${p.id}" class="status-select">
          <option${p.status==='pendente'?' selected':''} value="pendente">Pendente</option>
          <option${p.status==='em progresso'?' selected':''} value="em progresso">Em Progresso</option>
          <option${p.status==='concluido'?' selected':''} value="concluido">Concluído</option>
        </select>
      </td>
      <td>${new Date(p.created_at).toLocaleString()}</td>
    `;
    tbody.appendChild(tr);
  });
  // Attach change handlers
  document.querySelectorAll('.status-select').forEach(sel => {
    sel.addEventListener('change', async e => {
      const id = e.target.dataset.id;
      const status = e.target.value;
      const resp = await fetch(`${API_BASE}/update_status.php`, {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify({ id, status })
      });
      if (resp.ok) {
        alert('Status atualizado.');
      } else {
        alert('Erro ao atualizar status.');
      }
    });
  });
}

// Event listeners de formulários
document.getElementById('loginForm')?.addEventListener('submit', login);
document.getElementById('registerForm')?.addEventListener('submit', register);
document.getElementById('orderForm')?.addEventListener('submit', submitRequest);

// Inicia carregamentos
if (document.querySelector('#historyTable')) loadOrderHistory();
if (document.querySelector('#adminTable'))   loadAllRequests();
