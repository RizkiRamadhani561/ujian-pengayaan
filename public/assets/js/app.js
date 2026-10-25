(() => {
    'use strict';

    const sidebar = document.getElementById('sidebar');

    document.querySelectorAll('[data-sidebar-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            sidebar?.classList.toggle('sidebar-open');
        });
    });

    document.querySelectorAll('[data-confirm]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            const message = form.dataset.confirm || 'Lanjutkan?';

            if (!window.confirm(message)) {
                event.preventDefault();
            }
        });
    });

    document.querySelectorAll('[data-password-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const password = document.getElementById('password');

            if (!password) {
                return;
            }

            const shouldShow = password.type === 'password';
            password.type = shouldShow ? 'text' : 'password';
            button.textContent = shouldShow ? 'Sembunyikan' : 'Lihat';
            button.setAttribute('aria-pressed', String(shouldShow));
        });
    });
})();
