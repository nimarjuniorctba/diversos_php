/**
 * PÁGINA DE CLIENTES
 * ==================
 * Comportamentos exclusivos da listagem e do formulário de clientes.
 * Esta tela usa jQuery, conforme o padrão do projeto.
 */

$(function () {
    const $body = $('body');

    /**
     * LISTAGEM: filtro local sem nova consulta ao servidor.
     */
    $('#buscarCliente').on('input', function () {
        const busca = $(this).val().toLowerCase().trim();
        let visiveis = 0;

        $('#tabelaClientes .client-row').each(function () {
            const encontrou = $(this).text().toLowerCase().includes(busca);
            $(this).toggle(encontrou);
            if (encontrou) visiveis += 1;
        });

        $('#quantidadeVisivel').text(
            visiveis + (visiveis === 1 ? ' registro' : ' registros')
        );
        $('#nenhumClienteEncontrado').prop('hidden', visiveis !== 0 || busca === '');
    });

    /**
     * LISTAGEM: confirmação da exclusão lógica.
     */
    const $deletePopup = $('#popupExcluirCliente');

    $('.delete-client-button').on('click', function () {
        $('#idClienteExcluir').val($(this).data('client-id'));
        $('#nomeClienteExcluir').text($(this).data('client-name'));
        $deletePopup.addClass('is-visible').attr('aria-hidden', 'false');
        $body.addClass('popup-open');
        $deletePopup.find('.popup__close').trigger('focus');
    });

    function closeDeletePopup() {
        $deletePopup.removeClass('is-visible').attr('aria-hidden', 'true');
        $body.removeClass('popup-open');
    }

    $('.close-delete-popup').on('click', closeDeletePopup);

    $deletePopup.on('click', function (event) {
        if (event.target === this) closeDeletePopup();
    });

    $(document).on('keydown', function (event) {
        if (event.key === 'Escape') closeDeletePopup();
    });

    /**
     * FORMULÁRIO: alterna os campos de pessoa física e jurídica.
     */
    function updateRegistrationType() {
        const tipo = $('input[name="cli_tipo_cad"]:checked').val() || 'f';
        const pessoaFisica = tipo === 'f';

        $('.client-fields-pf').prop('hidden', !pessoaFisica);
        $('.client-fields-pj').prop('hidden', pessoaFisica);

        $('#cli_pf_nome, #cli_pf_cpf').prop('required', pessoaFisica);
        $('#cli_pj_razao, #cli_pj_cnpj').prop('required', !pessoaFisica);
    }

    $('input[name="cli_tipo_cad"]').on('change', updateRegistrationType);
    updateRegistrationType();

    /**
     * Máscaras leves, sem plugin adicional.
     * Os limites seguem os tamanhos definidos em mod_clientes.
     */
    $('[data-mask]').on('input', function () {
        const type = $(this).data('mask');
        let value = $(this).val().replace(/\D/g, '');

        if (type === 'cpf') {
            value = value.slice(0, 11)
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        }

        if (type === 'cnpj') {
            value = value.slice(0, 14)
                .replace(/^(\d{2})(\d)/, '$1.$2')
                .replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3')
                .replace(/\.(\d{3})(\d)/, '.$1/$2')
                .replace(/(\d{4})(\d{1,2})$/, '$1-$2');
        }

        if (type === 'date') {
            value = value.slice(0, 8)
                .replace(/(\d{2})(\d)/, '$1/$2')
                .replace(/(\d{2})(\d)/, '$1/$2');
        }

        if (type === 'phone') {
            value = value.slice(0, 11);
            value = value.length > 10
                ? value.replace(/^(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3')
                : value.replace(/^(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
        }

        $(this).val(value);
    });

    /**
     * Validação visual antes do envio. O PHP repete as validações essenciais.
     */
    $('#formCliente').on('submit', function (event) {
        let firstInvalid = null;

        $(this).find('[required]:visible').each(function () {
            const empty = $(this).val().trim() === '';
            $(this).closest('.form-field').toggleClass('form-field--error', empty);

            if (empty && !firstInvalid) firstInvalid = this;
        });

        if (firstInvalid) {
            event.preventDefault();
            firstInvalid.focus();
        }
    });

    $('.client-form input').on('input change', function () {
        if ($(this).val().trim() !== '') {
            $(this).closest('.form-field').removeClass('form-field--error');
        }
    });
});

