$(function(){
 const $popup=$('#popupExcluirEmpresa');
 $('#buscarEmpresa').on('input',function(){const q=$(this).val().toLowerCase().trim();let n=0;$('.company-row').each(function(){const v=$(this).text().toLowerCase().includes(q);$(this).toggle(v);if(v)n++;});$('#quantidadeEmpresas').text(n+(n===1?' registro':' registros'));$('#nenhumaEmpresa').prop('hidden',n!==0||q==='');});
 $('.delete-company').on('click',function(){$('#idEmpresaExcluir').val($(this).data('id'));$('#nomeEmpresaExcluir').text($(this).data('name'));$popup.addClass('is-visible').attr('aria-hidden','false');$('body').addClass('popup-open');});
 function close(){$popup.removeClass('is-visible').attr('aria-hidden','true');$('body').removeClass('popup-open');}
 $('.close-company-popup').on('click',close);$popup.on('click',function(e){if(e.target===this)close();});
 function type(){const pf=$('input[name="emp_tipo_cad"]:checked').val()==='f';$('.company-pf').prop('hidden',!pf);$('.company-pj').prop('hidden',pf);}
 $('input[name="emp_tipo_cad"]').on('change',type);type();
 $('[data-mask]').on('input',function(){let v=$(this).val().replace(/\D/g,'');const t=$(this).data('mask');
  if(t==='cpf')v=v.slice(0,11).replace(/(\d{3})(\d)/,'$1.$2').replace(/(\d{3})(\d)/,'$1.$2').replace(/(\d{3})(\d{1,2})$/,'$1-$2');
  if(t==='cnpj')v=v.slice(0,14).replace(/^(\d{2})(\d)/,'$1.$2').replace(/^(\d{2})\.(\d{3})(\d)/,'$1.$2.$3').replace(/\.(\d{3})(\d)/,'.$1/$2').replace(/(\d{4})(\d{1,2})$/,'$1-$2');
  if(t==='date')v=v.slice(0,8).replace(/(\d{2})(\d)/,'$1/$2').replace(/(\d{2})(\d)/,'$1/$2');
  if(t==='cep')v=v.slice(0,8).replace(/(\d{5})(\d)/,'$1-$2');
  if(t==='phone'){v=v.slice(0,11);v=v.length>10?v.replace(/^(\d{2})(\d{5})(\d{0,4})/,'($1) $2-$3'):v.replace(/^(\d{2})(\d{4})(\d{0,4})/,'($1) $2-$3');}
  $(this).val(v);});
 $('.uppercase-input').on('input',function(){$(this).val($(this).val().toUpperCase().replace(/[^A-Z]/g,''));});
});

