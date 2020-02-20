$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

$.fn.modal.Constructor.prototype.enforceFocus = function() {};


$(function(){

  $('#loginModalForm').on('submit', function(e){
    var form = $(this);
    if(!validateRequiredField(form)) return false;

    e.preventDefault();
    form.find('input[name=current_url]').val(CURRENT_URL);
    var modal = form.closest('.modal');

    makeSimpleRequest(form, modal, 'POST', null, true);
  });
});

function validateRequiredField(form) {
  var valid = true;
  form.find("input[required]").each(function(){
    var $this = $(this);
    if(!$this.val()){
      valid = false;
      toastr.error($this.attr('name').split('_').join(' ')  + ' is required');
      $this.addClass('is-invalid');
    }
  });

  form.find("select[required]").each(function(){
    var $this = $(this);
    if(!$this.val()){
      valid = false;
      toastr.error($this.attr('name').split('_').join(' ') + ' is required');
      $this.siblings('span.select2').addClass('invalid-select2');
    }
  });

  return valid;
}


function makeSimpleRequest(form, card, method, viewCard = null, isModal = false) {
  if(!isOnline()){
    return false;
  }
  addCardLoader(card);
  $.ajax({
      url: form.attr('action'),
      method: method,
      data: form.serialize(),
  }).done(function(response){
      toastMessage(response);

      if(response.status) {
        if(response.view && viewCard){
          setContentToDiv(viewCard, response.view);
        }else{
          window.location.reload();
        }
      }

      form.trigger('reset');

      if(isModal){
        setTimeout(function(){
          card.modal('hide');
        }, 500);
      }
  }).fail(function(response) {
      handleAjaxFailRequest(response);
  }).always(function(){
      setTimeout(function(){
        removeCardLoader(card);
      }, 1000);
      
  })
}

function makeFilePostRequest(form, card, method, viewCard = null, isModal = false, formData = null) {
    if(!isOnline()){
    return false;
    }
    addCardLoader(card);
    formData = formData ? formData : form.serialize();
    $.ajax({
        url: form.attr('action'),
        method: method,
        data: formData,
        processData: false,
        contentType: false
    }).done(function(response){
        toastMessage(response);

        if(response.status) {
        if(response.view && viewCard){
            setContentToDiv(viewCard, response.view);
        }else{
          if(response.redirect_to)
            window.location.href = response.redirect_to;
          else
          location.reload();
        }
        }

        form.trigger('reset');

        if(isModal){
        setTimeout(function(){
            card.modal('hide');
        }, 500);
        }
    }).fail(function(response) {
        handleAjaxFailRequest(response);
    }).always(function(){
        setTimeout(function(){
        removeCardLoader(card);
        }, 1000);
        
    })
}

function addCardLoader(element) {
  var container = $('<div id="loading-overlay"></div><div id="loading-spinner"><i class="fa fa-spinner fa-spin"></i></div>').appendTo(element);
      container.hide().fadeIn();
}

function removeCardLoader(element) {
  var loader = element.find('#loading-overlay');
  var spinner = element.find('#loading-spinner');
  loader.fadeOut();
  loader.remove();
  spinner.fadeOut();
  spinner.remove();
}

function setContentToDiv(element, html) {
    element.html(html);
}

// this will alert 
function toastMessage(response) {
    response.status && toastr.success(response.status);
    response.warning && toastr.warning(response.warning);
     response.error && toastr.error(response.error);
     response.errors && toastr.error(response.errors);
}

function isOnline() {
    var isOnline = navigator.onLine;

    if(!isOnline){
      toastr.error('Please! connect to the internet and try again', 'Connection failed!!!',{timeOut: 0});
    }

  return isOnline;
}

function updateConnectionStatus(msg, connected) {
  if (connected) {
    // toastr.success('Connectin established', null, {timeOut: 0});
    $('.connection-error').closest('.toast').remove();
    $('.connection-error').remove();
  } else {
    toastr.error('Please! connect to the internet and try again', 'Connection failed!!!',{timeOut: 0, positionClass: "toast-top-right connection-error"});
        // toastr.error('Please! connect to the internet and try again', 'Connection failed!!!',{timeOut: 0});
    }
}

window.addEventListener('load', function(e) {
  if (!navigator.onLine) {
    updateConnectionStatus('Offline', false);
  } 
}, false);

window.addEventListener('online', function(e) {
  updateConnectionStatus('Online', true);
}, false);

window.addEventListener('offline', function(e) {
  updateConnectionStatus('Offline', false);
}, false);

function handleAjaxFailRequest(response) {
  var status = response.status;

  switch(status)
  {
    case 422:
      $.each(response.responseJSON.errors, function(key, error) {
        toastr.error(error[0]);
      });
      break;
    case 404:
      toastr.error(response.responseJSON.message);
      break;
    case 403:
      toastr.error(response.responseJSON.message);
      break;
    default:
      if(response.responseJSON.message){
        toastr.error(response.responseJSON.message);
      }else{
        toastr.error('Internal server error');
      }
  }
}
