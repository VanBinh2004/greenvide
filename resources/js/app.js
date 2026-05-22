document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('mobile-menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('mobile-menu-icon-open');
    const iconClose = document.getElementById('mobile-menu-icon-close');

    if (toggle && menu) {
        toggle.addEventListener('click', () => {
            const isOpen = !menu.classList.contains('hidden');

            menu.classList.toggle('hidden', isOpen);
            iconOpen?.classList.toggle('hidden', !isOpen);
            iconClose?.classList.toggle('hidden', isOpen);
            toggle.setAttribute('aria-expanded', String(!isOpen));
            toggle.setAttribute('aria-label', isOpen ? 'Mở menu' : 'Đóng menu');
        });
    }

    document.querySelectorAll('[data-add-to-cart]').forEach((button) => {
        button.addEventListener('click', () => {
            const name = button.dataset.productName ?? 'sản phẩm';
            window.alert(`Đã thêm "${name}" vào giỏ hàng (demo). Tính năng giỏ hàng sẽ được triển khai sau.`);
        });
    });
});
