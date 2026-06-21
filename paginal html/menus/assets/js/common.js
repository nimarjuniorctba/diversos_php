/**
 * FUNÇÕES GLOBAIS DO PROJETO
 * ==========================
 * Este arquivo é carregado em todas as páginas.
 *
 * Coloque aqui apenas comportamentos realmente compartilhados, por exemplo:
 * - copiar código;
 * - máscaras e formatações gerais;
 * - notificações;
 * - funções auxiliares usadas em várias telas.
 */

document.addEventListener('DOMContentLoaded', () => {
    /**
     * Botões "Copiar código" da biblioteca de componentes.
     */
    document.querySelectorAll('.copy-code-button').forEach((button) => {
        button.addEventListener('click', async () => {
            const code = button.closest('.code-example')?.querySelector('code');
            if (!code) return;

            try {
                await navigator.clipboard.writeText(code.textContent.trim());
                const originalText = button.textContent;
                button.textContent = 'Copiado!';
                button.classList.add('is-copied');

                window.setTimeout(() => {
                    button.textContent = originalText;
                    button.classList.remove('is-copied');
                }, 1800);
            } catch (error) {
                console.info('O navegador não permitiu copiar o código.');
            }
        });
    });
});

