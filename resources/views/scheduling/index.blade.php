@extends('layouts.app') @section('content')
<style>
  .btn {
    line-height: 2;
    vertical-align: middle;
  }

  svg {
    vertical-align: middle;
    margin-left: 5px;
  }

  #circle {
    stroke-dashoffset: 2080;
    stroke-dasharray: 2080;
    animation-name: padda;
    animation-duration: 0.6s;
    animation-timing-function: ease-in-out;
    animation-fill-mode: forwards;
  }

  #check {
    stroke-dashoffset: 575;
    stroke-dasharray: 575;
    animation-name: wan;
    animation-duration: 0.4s;
    animation-timing-function: ease-in;
    animation-delay: 0.6s;
    animation-fill-mode: forwards;
  }

  @keyframes padda {
    from {
      stroke-dashoffset: 2080;
    }
    to {
      stroke-dashoffset: 0;
    }
  }

  @keyframes wan {
    from {
      stroke-dashoffset: 575;
    }
    to {
      stroke-dashoffset: 0;
    }
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <button class="btn btn-primary btn-scheduling">Agendar consulta
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
          x="0px" y="0px" width="30px" height="30px" viewBox="0 0 792 792" enable-background="new 0 0 792 792" xml:space="preserve">
          <circle id="circle" fill="none" stroke="#ffffff" stroke-width="60" stroke-miterlimit="10" cx="396.001" cy="396.001" r="331.081"
          />
          <polyline id="check" fill="none" stroke="#76FF03" stroke-width="60" stroke-miterlimit="10" points="241.69,423.78 296.909,564.448 550.311,227.552"
          />
        </svg>
      </button>
    </div>
  </div>
</div>

<div class="schedule-app">
  <div class="container schedule-app-header">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <h3 class="clearfix">
          <button type="button" class="close close-app-schedule" aria-label="Close">
            <span aria-hidden="true">
              <i class="fa fa-remove" aria-hidden="true"></i>
            </span>
          </button>
          <i class="fa fa-calendar" aria-hidden="true"></i> Agende sua consulta
        </h3>
        <hr>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <div class="well">
          <form role="form" id="schedule-app-form">
            <fieldset>
              <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                    <input id="nome" name="nome" type="text" class="form-control schedule-app-form-required" placeholder="Nome*">
                  </div>
                  <div class="form-group">
                    <input id="whatsapp" name="whatsapp" type="text" class="form-control phone_with_ddd schedule-app-form-required" placeholder="WhatsApp*">
                  </div>
                  <div class="form-group">
                    <input id="email" name="email" type="email" class="form-control" placeholder="E-mail">
                  </div>
                  <div class="form-group">
                    <input id="datepicker" class="datepicker form-control schedule-app-form-required" name="dia" placeholder="Dia*" type="text"
                      style="background: #ffffff" required>
                  </div>
                  <div class="form-group">
                    <input id="timepicker" class="timepicker form-control schedule-app-form-required" name="hora" placeholder="Horário*" type="text"
                      style="background: #ffffff" required>
                  </div>
                  <div class="form-group">
                    <textarea name="descricao" rows="2" class="form-control" placeholder="Descreva sua necessidade" maxlength="400"></textarea>
                  </div>
                  <div class="form-group">
                    <select id="selectIndicacao" name="indicacao" class="form-control schedule-form-select" aria-placeholder="Como nos conheceu?">
                      <option value="">Como nos conheceu?</option>
                      <option value="Google">Google</option>
                      <option value="Facebook">Facebook</option>
                      <option value="Instagram">Instagram</option>
                      <option value="Youtube">Youtube</option>
                      <option value="Site">Site</option>
                      <option value="Indicação de amigo">Indicação de amigo</option>
                      <option value="Indicação de outro profissional">Indicação de outro profissional</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <div class="checkbox">
                      <label>
                        <input name="urgencia" type="checkbox" aria-placeholder="URGÊNCIA">
                        <span class="text-danger">URGÊNCIA!</span> Em caso de dor ou situação grave
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" aria-label="Close">
                      <span aria-hidden="true"><i class="fa fa-remove" aria-hidden="true"></i></span>
                    </button>
                    Preencha os campos destacados para prosseguir com o agendamento.
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i> Agendar
                    </button>
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection