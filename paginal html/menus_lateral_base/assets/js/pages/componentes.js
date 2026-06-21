/**
 * JAVASCRIPT EXCLUSIVO DA PÁGINA DE COMPONENTES
 * ==============================================
 * Demonstra duas formas de controlar os popups:
 * - JavaScript puro, usando atributos data-popup-*;
 * - jQuery, usando seletores e eventos do jQuery.
 */

document.addEventListener('DOMContentLoaded', () => {
    let lastFocusedElement = null;

    function openPopup(popup) {
        if (!popup) return;

        lastFocusedElement = document.activeElement;
        popup.classList.add('is-visible');
        popup.setAttribute('aria-hidden', 'false');
        document.body.classList.add('popup-open');
        popup.querySelector('.popup__close')?.focus();
    }

    function closePopup(popup) {
        if (!popup) return;

        popup.classList.remove('is-visible');
        popup.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('popup-open');
        lastFocusedElement?.focus();
    }

    // Exemplo com JavaScript puro.
    document.querySelectorAll('[data-popup-open]').forEach((button) => {
        button.addEventListener('click', () => {
            openPopup(document.getElementById(button.dataset.popupOpen));
        });
    });

    document.querySelectorAll('[data-popup-close]').forEach((button) => {
        button.addEventListener('click', () => {
            closePopup(button.closest('.popup'));
        });
    });

    document.querySelectorAll('.popup').forEach((popup) => {
        popup.addEventListener('click', (event) => {
            if (event.target === popup) closePopup(popup);
        });
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closePopup(document.querySelector('.popup.is-visible'));
        }
    });

    // Exemplo usando jQuery 3.7.1.
    if (window.jQuery) {
        $('#abrirPopupJquery').on('click', function () {
            openPopup(document.getElementById('popupJquery'));
        });

        $('#confirmarPopupJquery').on('click', function () {
            closePopup(document.getElementById('popupJquery'));
            $('#mensagemPopup').addClass('is-visible');

            window.setTimeout(function () {
                $('#mensagemPopup').removeClass('is-visible');
            }, 2500);
        });
    }
});

