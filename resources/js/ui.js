const TOAST_META = {
    success: { title: 'Thành công', icon: 'fa-circle-check' },
    error: { title: 'Có lỗi', icon: 'fa-circle-xmark' },
    info: { title: 'Thông báo', icon: 'fa-circle-info' },
};

function escapeHtml(str) {
    const div = document.createElement('div');
    div.textContent = String(str);
    return div.innerHTML;
}

export function toast(message, type = 'success', duration = 4200, title = null) {
    const container = document.getElementById('gt-toast-container');
    if (!container) {
        return;
    }

    const safeType = Object.hasOwn(TOAST_META, type) ? type : 'info';
    const meta = TOAST_META[safeType];
    const el = document.createElement('div');

    el.className = `gt-toast gt-toast--${safeType}`;
    el.setAttribute('role', 'alert');
    el.innerHTML = `
        <i class="fas ${meta.icon} gt-toast__icon" aria-hidden="true"></i>
        <div class="gt-toast__body">
            <p class="gt-toast__title">${escapeHtml(title ?? meta.title)}</p>
            <p class="gt-toast__message">${escapeHtml(message)}</p>
        </div>
        <button type="button" class="gt-toast__close" aria-label="Đóng">
            <i class="fas fa-times" aria-hidden="true"></i>
        </button>
    `;

    const remove = () => {
        el.classList.add('gt-toast--leaving');
        el.addEventListener('animationend', () => el.remove(), { once: true });
    };

    el.querySelector('.gt-toast__close')?.addEventListener('click', remove);
    container.appendChild(el);

    if (duration > 0) {
        setTimeout(remove, duration);
    }
}

export function modal(options = {}) {
    const root = document.getElementById('gt-modal-root');
    const titleEl = document.getElementById('gt-modal-title');
    const bodyEl = document.getElementById('gt-modal-body');
    const footerEl = document.getElementById('gt-modal-footer');
    const panel = root?.querySelector('.gt-modal-panel');

    if (!root || !titleEl || !bodyEl || !footerEl || !panel) {
        return;
    }

    const {
        title = '',
        body = '',
        confirmText = 'Xác nhận',
        cancelText = 'Hủy',
        showCancel = true,
        onConfirm = null,
        onCancel = null,
        large = false,
    } = options;

    titleEl.textContent = title;
    bodyEl.innerHTML = typeof body === 'string' ? body : '';
    panel.classList.toggle('gt-modal-panel--lg', Boolean(large));

    footerEl.innerHTML = '';
    footerEl.classList.toggle('hidden', !showCancel && !onConfirm);

    if (showCancel) {
        const cancelBtn = document.createElement('button');
        cancelBtn.type = 'button';
        cancelBtn.className = 'btn btn-secondary btn-sm';
        cancelBtn.textContent = cancelText;
        cancelBtn.addEventListener('click', () => {
            closeModal();
            onCancel?.();
        });
        footerEl.appendChild(cancelBtn);
    }

    if (onConfirm || !showCancel) {
        const confirmBtn = document.createElement('button');
        confirmBtn.type = 'button';
        confirmBtn.className = 'btn btn-primary btn-sm';
        confirmBtn.textContent = confirmText;
        confirmBtn.addEventListener('click', () => {
            closeModal();
            onConfirm?.();
        });
        footerEl.appendChild(confirmBtn);
    }

    openModal();
}

export function openModal() {
    const root = document.getElementById('gt-modal-root');
    if (!root) {
        return;
    }
    root.classList.add('is-open');
    root.setAttribute('aria-hidden', 'false');
    document.body.classList.add('gt-modal-open');
    root.querySelector('.gt-modal__close')?.focus();
}

export function closeModal() {
    const root = document.getElementById('gt-modal-root');
    if (!root) {
        return;
    }
    root.classList.remove('is-open');
    root.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('gt-modal-open');
}

export function initUi() {
    const root = document.getElementById('gt-modal-root');
    if (!root) {
        return;
    }

    root.querySelectorAll('[data-modal-close]').forEach((el) => {
        el.addEventListener('click', closeModal);
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && root.classList.contains('is-open')) {
            closeModal();
        }
    });
}

export const GreenTechUI = { toast, modal, openModal, closeModal, initUi };
