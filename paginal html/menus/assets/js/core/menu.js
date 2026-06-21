/**
 * CONTROLE GLOBAL DO MENU LATERAL
 * ================================
 * Este arquivo é usado em todas as páginas que possuem o menu.
 */

document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;
    const collapseButton = document.getElementById('menuCollapseButton');
    const mobileButton = document.getElementById('mobileMenuButton');
    const closeButton = document.getElementById('menuCloseButton');
    const overlay = document.getElementById('menuOverlay');
    const submenuButtons = document.querySelectorAll('.submenu-toggle');
    const desktopBreakpoint = 820;

    if (!collapseButton || !mobileButton || !closeButton || !overlay) return;

    function updateCollapseAccessibility() {
        const isCollapsed = body.classList.contains('menu-collapsed');
        collapseButton.setAttribute('aria-expanded', String(!isCollapsed));
        collapseButton.setAttribute(
            'aria-label',
            isCollapsed ? 'Expandir menu' : 'Recolher menu'
        );
    }

    function toggleDesktopMenu() {
        body.classList.toggle('menu-collapsed');
        const isCollapsed = body.classList.contains('menu-collapsed');

        if (isCollapsed) {
            document.querySelectorAll('.menu-item.is-open').forEach((item) => {
                item.classList.remove('is-open');
                item.querySelector('.submenu-toggle')
                    ?.setAttribute('aria-expanded', 'false');
            });
        }

        updateCollapseAccessibility();

    }

    function openMobileMenu() {
        body.classList.add('menu-mobile-open');
        mobileButton.setAttribute('aria-expanded', 'true');
        closeButton.focus();
    }

    function closeMobileMenu() {
        if (!body.classList.contains('menu-mobile-open')) return;
        body.classList.remove('menu-mobile-open');
        mobileButton.setAttribute('aria-expanded', 'false');
        mobileButton.focus();
    }

    updateCollapseAccessibility();
    collapseButton.addEventListener('click', toggleDesktopMenu);
    mobileButton.addEventListener('click', openMobileMenu);
    closeButton.addEventListener('click', closeMobileMenu);
    overlay.addEventListener('click', closeMobileMenu);

    submenuButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const menuItem = button.closest('.menu-item');
            const willOpen = !menuItem.classList.contains('is-open');

            if (body.classList.contains('menu-collapsed')
                && window.innerWidth > desktopBreakpoint) {
                body.classList.remove('menu-collapsed');
                updateCollapseAccessibility();
            }

            menuItem.classList.toggle('is-open', willOpen);
            button.setAttribute('aria-expanded', String(willOpen));
        });
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeMobileMenu();
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > desktopBreakpoint) {
            body.classList.remove('menu-mobile-open');
            mobileButton.setAttribute('aria-expanded', 'false');
        }
    });
});
