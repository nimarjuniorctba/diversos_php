$(function () {
    const $popup = $('#popupExcluirUsuarioSistema');
    $('#buscarRegistroSistema').on('input', function () {
        const busca = $(this).val().toLowerCase().trim();
        let total = 0;
        $('.system-user-row').each(function () {
            const visible = $(this).text().toLowerCase().includes(busca);
            $(this).toggle(visible);
            if (visible) total++;
        });
        $('#quantidadeRegistrosSistema').text(total + (total === 1 ? ' registro' : ' registros'));
        $('#nenhumRegistroSistema').prop('hidden', total !== 0 || busca === '');
    });
    $('.delete-system-user').on('click', function () {
        $('#idUsuarioSistemaExcluir').val($(this).data('id'));
        $('#nomeUsuarioSistemaExcluir').text($(this).data('name'));
        $popup.addClass('is-visible').attr('aria-hidden', 'false');
        $('body').addClass('popup-open');
    });
    function closePopup() {
        $popup.removeClass('is-visible').attr('aria-hidden', 'true');
        $('body').removeClass('popup-open');
    }
    $('.close-system-user-popup').on('click', closePopup);
    $popup.on('click', function (e) { if (e.target === this) closePopup(); });
    $('#formUsuarioSistema').on('submit', function (e) {
        let invalid = null;
        $(this).find('[required]:visible').each(function () {
            const empty = $(this).val().trim() === '';
            $(this).closest('.form-field').toggleClass('form-field--error', empty);
            if (empty && !invalid) invalid = this;
        });
        if ($('#registro_senha').val() !== $('#registro_senha_confirmacao').val()) {
            invalid = invalid || $('#registro_senha_confirmacao')[0];
            $('#registro_senha_confirmacao').closest('.form-field').addClass('form-field--error');
        }
        if (invalid) { e.preventDefault(); invalid.focus(); }
    });
    $('#toggleSystemPassword').on('click', function () {
        $('#systemPasswordCard').prop('hidden', function (_, hidden) {
            return !hidden;
        });
    });
    $('.ajax-password-form').on('submit', function (e) {
        e.preventDefault();
        const $form = $(this);
        const $message = $form.find('.password-ajax-message');
        const data = $form.serializeArray();
        data.push({ name: 'tipo', value: $form.data('type') });
        $message.removeClass('is-success is-error').text('Salvando...');
        $.post('ajax_altera_senha.php', data, function (response) {
            $message.toggleClass('is-success', response.ok).toggleClass('is-error', !response.ok).text(response.mensagem);
            if (response.ok) $form[0].reset();
        }, 'json').fail(function () {
            $message.addClass('is-error').text('Não foi possível alterar a senha.');
        });
    });
});
