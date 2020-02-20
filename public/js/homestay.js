$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

$.fn.modal.Constructor.prototype.enforceFocus = function() {};

 function confirmWithCallback(title, text, cb) {
  if(!isOnline()){
    return false;
  }
  Swal.fire({
    title: title,
    text: text,
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#dd3333',
    cancelButtonColor: '#9e9a9a',
    cancelButtonText: 'Cancel',
    confirmButtonText: 'Yes',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      cb(result);
    }
  })
 }

 function swalConfirm(form, title, text) {
  if(!isOnline()){
    return false;
  }
  Swal.fire({
    title: title,
    text: text,
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#dd3333',
    cancelButtonColor: '#9e9a9a',
    cancelButtonText: 'Cancel',
    confirmButtonText: 'Yes',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      form.submit();
    }
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

// this will alert 
function toastMessage(response) {
    response.status && toastr.success(response.status);
    response.warning && toastr.warning(response.warning);
     response.error && toastr.error(response.error);
     response.errors && toastr.error(response.errors);
}

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
      toastr.error('Internal server error');
  }
}

function setContentToDiv(element, html) {
    element.html(html);
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

function makeSimpleRequest(form, card, method, viewCard = null, isModal = false, resetForm = true, cb = false) {
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
        if(resetForm){
          form.trigger('reset');
        }

        if(isModal){
          setTimeout(function(){
            card.modal('hide');
          }, 500);
        }

        if(cb){
          cb(response);
        }else{
          if(response.status) {
            if(response.view && viewCard){
              setContentToDiv(viewCard, response.view);
            }else{
              window.location.reload();
            }
          }
        }

    }).fail(function(response) {
        handleAjaxFailRequest(response);
    }).always(function(){
        setTimeout(function(){
          removeCardLoader(card);
        }, 1000);
        
    })
}

function readFileAndShow(input, imageTag) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function (e) {
      imageTag.attr('src', e.target.result);
    
    }
    reader.readAsDataURL(input.files[0]);
  }
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

// datepicker initialization for input field with date class separate timepicker and date picker
// $('.date').datepicker({
//   format: "yyyy-mm-dd",
//   autoclose: true,
//   clearBtn: true,
//   todayHighlight: true,
//   weekStart: 0,
// })

// $('.time').timepicker({showMeridian: false, minuteStep: 5});

//One datetime picker file

$('.date').datetimepicker({
  format: "YYYY-MM-DD",
  showClear: true
})

$('.time').datetimepicker({
  format: "HH:mm",
  showClear: true
});

$('.datetime').datetimepicker({
  format: "YYYY-MM-DD HH:mm",
  showClear: true,
  icons: {
      time: 'glyphicon glyphicon-time datetime-picker-time-text',
      date: 'glyphicon glyphicon-calendar datetime-picker-date-text',
    }
});

function today() {
    var today, dd, mm, yyyy;
    today = new Date();
    dd = today.getDate();
    mm = today.getMonth() + 1; //January is 0!
    yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    return today = yyyy + '-' + mm + '-' + dd;
}

$(".select2-lazy-list").each(function(){
	var $this = $(this);
	var placeholder = $this.data('placeholder') || "Search for a repository";
	var multiple = false;
	if($this.data('multiple') == true || $this.data('multiple') == 'multiple' || $this.attr('multiple') == true || $this.attr('multiple') == 'multiple'){
		multiple = true;
	}

  var tags = false;
  var TAG_URL = null;
  if($this.data('tags') == true || $this.data('tags') == 'tags' || $this.attr('tags') == true || $this.attr('tags') == 'tags'){
    tags = true;
    TAG_URL = $this.data('tagsource');
  }

	$this.select2({
	    placeholder: placeholder,
      tags: tags,
	    allowClear: true,
	    delay: 250,
	    ajax: { 
	        url: $this.data('source'),
	        dataType: 'json',
	        quietMillis: 250,
	        data: function (params) {
	            return {
                    q: params.term,
                    page: params.page || 1,
                    id: $this.data('id')
                };
	        },
	        
		        processResults: function (data, params) {
		        	params.page = params.page || 1;

		      return {
		        results: data.items,
		        pagination: {
		        	more: (params.page * 20) < data.total
		        }
		      };
		    },
	        cache: true
	    },
	    current: function(element, callback) {
	    	var id = $(element).val();
       	var splitedUrl = element.data('source').split('?');
       	var splitedUrlLength = splitedUrl.length;
       	var querystring = splitedUrl.pop();

	        if (id !== "") {
	            if(element.data('querystring') && splitedUrlLength > 1 && querystring.length >= 0){
                    $.ajax(splitedUrl.join('?') + '/' + id + '?' + querystring, {
                        dataType: "json"
                    }).done(function(data) {
                        callback(data);
                    });
                }else{
                    $.ajax(element.data('source') + '/' + id, {
                        dataType: "json"
                    }).done(function(data) {
                        callback(data);
                    });
                }
	        }
	    },
	    multiple: multiple,
	    escapeMarkup: function (m) { return m; }, // we do not want to escape markup since we are displaying html in results
      createTag: function (params) {
        var term = $.trim(params.term);

        if (term === '' || !TAG_URL || !tags) {
          return null;
        }

        return {
          id: term,
          text: term + ' (ADD NEW)'
        };
      },
	}).on("change", function(e) {
      if(TAG_URL && tags){
        var isNew = $(this).find('[data-select2-tag="true"]');
        if(isNew.length && $.inArray(isNew.val(), $(this).val()) !== -1){
            
            $.ajax({
                url: TAG_URL,
                method: 'POST',
                data: {
                  name: isNew.val()
                }
            }).done(function(response){
              // toastMessage(response);
              isNew.replaceWith('<option selected value="'+response.id+'">'+isNew.val()+'</option>');
          }).fail(function(response) {
              handleAjaxFailRequest(response);
          });
        }
      }
    });

  if($this.data('value')){
    $.ajax({
        type: 'GET',
        url: $this.data('source') + '/' + $this.data('value')
    }).then(function (data) {
        
        if(multiple && data.length > 0){
          for(var i=0; i < data.length; i++){
            var option = new Option(data[i].text, data[i].id, true, true);
            $this.append(option).trigger('change');
          }
        }else{
          var option = new Option(data.text, data.id, true, true);
          $this.append(option).trigger('change');
        }

        // manually trigger the `select2:select` event
        $this.trigger({
            type: 'select2:select',
            params: {
                data: data
            }
        });
    });
  }
})

function customSelect2(selector, url, multiple, placeholder, templateResult = null, templateSelection = null){
  if(!templateResult){
    templateResult = function(repo){
      return repo.name || repo.text;
    }
  }

  if(!templateSelection){
    templateSelection = function (repo) {
      return repo.name || repo.text;
    }
  }
  selector.select2({
      placeholder: placeholder,
      allowClear: true,
      delay: 250,
      ajax: { 
          url: url,
          dataType: 'json',
          quietMillis: 250,
          data: function (params) {
              return {
                    q: params.term,
                    page: params.page || 1,
                    id: selector.data('id')
                };
          },
          
            processResults: function (data, params) {
              params.page = params.page || 1;

          return {
            results: data.items,
            pagination: {
              more: (params.page * 20) < data.total
            }
          };
        },
          cache: true
      },
      multiple: multiple,
      templateResult: templateResult,
      templateSelection: templateSelection,
      escapeMarkup: function (m) { return m; }
  });
}
