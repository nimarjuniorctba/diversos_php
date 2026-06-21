/**
 * PÁGINA DE CONDUTORES
 * Busca, popup, máscaras e validação do formulário.
 */

$(function () {
    const $body = $('body');
    const $popup = $('#popupExcluirCondutor');

    $('#buscarCondutor').on('input', function () {
        const busca = $(this).val().toLowerCase().trim();
        let visiveis = 0;

        $('#tabelaCondutores .driver-row').each(function () {
            const encontrou = $(this).text().toLowerCase().includes(busca);
            $(this).toggle(encontrou);
            if (encontrou) visiveis += 1;
        });

        $('#quantidadeCondutoresVisiveis').text(
            visiveis + (visiveis === 1 ? ' registro' : ' registros')
        );
        $('#nenhumCondutorEncontrado').prop('hidden', visiveis !== 0 || busca === '');
    });

    $('.delete-driver-button').on('click', function () {
        $('#idCondutorExcluir').val($(this).data('driver-id'));
        $('#nomeCondutorExcluir').text($(this).data('driver-name'));
        $popup.addClass('is-visible').attr('aria-hidden', 'false');
        $body.addClass('popup-open');
        $popup.find('.popup__close').trigger('focus');
    });

    function closePopup() {
        $popup.removeClass('is-visible').attr('aria-hidden', 'true');
        $body.removeClass('popup-open');
    }

    $('.close-driver-popup').on('click', closePopup);
    $popup.on('click', function (event) {
        if (event.target === this) closePopup();
    });
    $(document).on('keydown', function (event) {
        if (event.key === 'Escape') closePopup();
    });

    $('[data-mask="phone"]').on('input', function () {
        let value = $(this).val().replace(/\D/g, '').slice(0, 11);
        value = value.length > 10
            ? value.replace(/^(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3')
            : value.replace(/^(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
        $(this).val(value);
    });

    $('.uppercase-input').on('input', function () {
        $(this).val($(this).val().toUpperCase().replace(/[^A-Z0-9-]/g, ''));
    });

    $('#toggleDriverPassword').on('click', function () {
        $('#driverPasswordCard').prop('hidden', function (_, hidden) {
            return !hidden;
        });
    });

    $('.edit-driver-action').on('click', function () {
        const action = $(this).data('action');
        const labels = {
            excluir: 'Deseja realmente excluir este condutor?',
            desativar: 'Deseja desativar este condutor?',
            ativar: 'Deseja ativar este condutor?'
        };
        if (!window.confirm(labels[action])) return;

        if (action === 'excluir') {
            $('#driverEditOperation').val('excluir');
        } else {
            $('#driverEditOperation').val('status');
            $('#driverEditStatus').val(action === 'ativar' ? 'a' : 'i');
        }
        $('#driverEditActionForm').trigger('submit');
    });

    $('.ajax-password-form').on('submit', function (event) {
        event.preventDefault();
        const $form = $(this);
        const $message = $form.find('.password-ajax-message');
        const data = $form.serializeArray();
        data.push({ name: 'tipo', value: $form.data('type') });

        $message.removeClass('is-success is-error').text('Salvando...');
        $.post('ajax_altera_senha.php', data, function (response) {
            $message
                .toggleClass('is-success', response.ok)
                .toggleClass('is-error', !response.ok)
                .text(response.mensagem);
            if (response.ok) $form[0].reset();
        }, 'json').fail(function () {
            $message.addClass('is-error').text('Não foi possível alterar a senha.');
        });
    });

    $('#con_senha, #con_senha_confirmacao').on('input', function () {
        const senha = $('#con_senha').val();
        const confirmacao = $('#con_senha_confirmacao').val();
        const diferentes = confirmacao !== '' && senha !== confirmacao;

        $('#senhaCondutorAviso')
            .text(diferentes ? 'As senhas não correspondem.' : '')
            .toggleClass('field-error-text', diferentes);
    });

    $('#formCondutor').on('submit', function (event) {
        let firstInvalid = null;

        $(this).find('[required]:visible').each(function () {
            const empty = $(this).val().trim() === '';
            $(this).closest('.form-field').toggleClass('form-field--error', empty);
            if (empty && !firstInvalid) firstInvalid = this;
        });

        const senha = $('#con_senha').val();
        const confirmacao = $('#con_senha_confirmacao').val();

        if (senha !== confirmacao) {
            $('#con_senha_confirmacao').closest('.form-field').addClass('form-field--error');
            if (!firstInvalid) firstInvalid = $('#con_senha_confirmacao')[0];
        }

        if (firstInvalid) {
            event.preventDefault();
            firstInvalid.focus();
        }
    });
});
