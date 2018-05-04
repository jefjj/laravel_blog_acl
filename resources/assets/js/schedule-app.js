(function ($) {
  // Globals
  var empresa = {
    nome: 'Digip',
    whatsapp: '5524992783665' // '5524992656180',
  };

  // Adiciona classe para auxiliar o css
  var addClassSelected = function () {
    $(this).removeClass('schedule-form-select-selected');

    if ($(this).val() != '') {
      $(this).addClass('schedule-form-select-selected');
    }
  };

  $(document).ready(function () {
    // Exibir e esconder o schedule-app
    $('.btn-scheduling').click(function () {
      $('.schedule-app').fadeIn();
    });

    $('.close-app-schedule').click(function () {
      $('.schedule-app').fadeOut();
    });

    // Mascara do telefone celular no schedule-app
    $('.phone_with_ddd').mask('(00) 00000-0000');

    // Tratamento, limites e bloqueios dos campos de date e hora do schedule-app
    var now = new Date();
    var monthsLimit = now.setMonth(now.getMonth() + 6);
    var dateLimit = new Date(monthsLimit);

    // Inicializacao do plugin de calendario
    $('.datepicker').pickadate({
      // editable: true,
      min: new Date(),
      max: dateLimit,
      closeOnSelect: true,
      closeOnClear: true,
      selectYears: 1
    });

    // Inicializacao do plugin de hora
    $('.timepicker').pickatime({
      format: 'HH:i',
      interval: 30,
      min: [9, 0],
      max: [19, 30],
      disable: [{
        from: [12, 0],
        to: [14, 0]
      }]
    });

    $('#selectIndicacao').on('change, blur', addClassSelected);

    $('#schedule-app-form').submit(function (e) {
      e.preventDefault();

      // Locals
      var text = {
        nome: '',
        whatsapp: '',
        email: '',
        dia: '',
        hora: '',
        descricao: '',
        indicacao: '',
        urgencia: ''
      };

      var errors = false;
      var formData = $(this).serializeArray();

      $(formData).each(function (index, item) {
        var elm = $('#schedule-app-form [name=' + item.name + ']');
        var placeholder = elm.attr('placeholder');

        if (placeholder === undefined) {
          placeholder = elm.attr('aria-placeholder');

          if (placeholder === undefined) {
            placeholder = '';
          }
        }

        // Validar campos obrigatórios
        if (placeholder.indexOf('*') !== -1 && item.value == '') {
          errors = true;
          elm.parent('.form-group').addClass('has-error');
        } else {
          if (item.name != '' && item.value != '') {
            switch (item.name) {
              case 'nome':
                text.nome = 'Olá, sou ' + item.value + '.' + '\n';
                break;

              case 'whatsapp':
                text.whatsapp = 'Meu WhatsApp é *' + item.value + '*. ' + '\n';
                break;

              case 'email':
                text.email = 'E-mail: ' + item.value + '. ' + '\n';
                break;

              case 'dia':
                text.dia = 'Gostaria de marcar uma consulta *' + item.value + ' ';
                break;

              case 'hora':
                text.hora = 'às ' + item.value + 'hs*. ' + '\n';
                break;

              case 'descricao':
                text.descricao = 'Descrição: ' + item.value + ' ' + '\n';
                break;

              case 'indicacao':
                text.indicacao = 'Como conheci a Empresa? ' + item.value + '. ' + '\n';
                break;

              case 'urgencia':
                text.urgencia = '*PRECISO DE UMA CONSULTA URGÊNTE!* ' + '\n';
                break;

              default:
                break;
            }
          }
        }

      });

      // Redirecionar para WhatsApp
      if (!errors) {
        var fullText = text.nome +
          text.dia +
          text.hora +
          text.urgencia +
          text.descricao +
          text.whatsapp +
          text.email +
          text.indicacao;

        var fullTextEncoded = encodeURIComponent(fullText);
        window.open('https://api.whatsapp.com/send?phone=' + empresa.whatsapp + '&text=' + fullTextEncoded, '_blank');
        $('#schedule-app-form')[0].reset();
        $('.close-app-schedule').trigger('click');
        // console.log('https://api.whatsapp.com/send?phone=' + empresa.whatsapp + '&text=' + fullTextEncoded);
      } else {
        // Exibe o alert de erro
        $('.schedule-app .alert').fadeIn();

        $('.schedule-app-form-required').change(function () {
          // Limpar a borda de erro do campo
          $(this).parent('.form-group').removeClass('has-error');
          // Fecha o alert de erro
          $('.schedule-app .alert').hide();
        });
      }
    });

    // Fecha o alert
    $('.schedule-app .alert .close').click(function () {
      $('.schedule-app .alert').hide();
    });
  });
}(window.jQuery));
