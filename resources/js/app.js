import { GreenTechUI, initUi } from './ui.js';

window.GreenTechUI = GreenTechUI;

function initSkeleton() {
    const skeleton = document.getElementById('gt-skeleton');
    const pageRoot = document.getElementById('page-root');
    if (!skeleton || !pageRoot) {
        return;
    }

    const hide = () => {
        skeleton.classList.add('gt-skeleton--hidden');
        pageRoot.classList.add('page-root--visible');
        skeleton.setAttribute('aria-hidden', 'true');
        skeleton.setAttribute('aria-busy', 'false');
        setTimeout(() => skeleton.remove(), 500);
    };

    const minDelay = new Promise((r) => setTimeout(r, 450));
    const loaded = new Promise((r) => {
        if (document.readyState === 'complete') {
            r();
        } else {
            window.addEventListener('load', r, { once: true });
        }
    });

    Promise.all([minDelay, loaded]).then(hide);
}

function initScrollReveal() {
    const sections = document.querySelectorAll('.gt-reveal');
    if (!sections.length) {
        return;
    }

    if (!('IntersectionObserver' in window)) {
        sections.forEach((el) => el.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { root: null, rootMargin: '0px 0px -8% 0px', threshold: 0.08 }
    );

    sections.forEach((el) => observer.observe(el));
}

function initFlashMessages() {
    const body = document.body;
    const success = body.dataset.flashSuccess;
    const error = body.dataset.flashError;
    const info = body.dataset.flashInfo;

    if (success) {
        const isCart = success.toLowerCase().includes('giỏ hàng');
        GreenTechUI.toast(success, 'success', 4500, isCart ? 'Giỏ hàng' : 'Thành công');
    }
    if (error) {
        GreenTechUI.toast(error, 'error');
    }
    if (info) {
        GreenTechUI.toast(info, 'info');
    }
}

function initMobileMenu() {
    const toggle = document.getElementById('mobile-menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('mobile-menu-icon-open');
    const iconClose = document.getElementById('mobile-menu-icon-close');

    if (!toggle || !menu) {
        return;
    }

    toggle.addEventListener('click', () => {
        const isOpen = !menu.classList.contains('hidden');
        menu.classList.toggle('hidden', isOpen);
        iconOpen?.classList.toggle('hidden', !isOpen);
        iconClose?.classList.toggle('hidden', isOpen);
        toggle.setAttribute('aria-expanded', String(!isOpen));
        toggle.setAttribute('aria-label', isOpen ? 'Mở menu' : 'Đóng menu');
    });
}

function initLeadForm() {
    const form = document.getElementById('lead-form');
    if (!form) {
        return;
    }

    form.addEventListener('submit', (e) => {
        const btn = form.querySelector('[type="submit"]');
        if (btn) {
            btn.disabled = true;
            btn.classList.add('opacity-70');
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initUi();
    initSkeleton();
    initScrollReveal();
    initFlashMessages();
    initMobileMenu();
    initLeadForm();
});
