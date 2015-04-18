window.app = window.app || {};

window.ParsleyConfig = window.ParsleyConfig || {};
window.ParsleyConfig = {
  excluded: 'input:not(:visible), input.novalidate',
  classHandler: function (ParsleyField) {
    return ParsleyField.$element.closest('.form__item').append('<div class="parsley-errors-container" />');
  },
  errorsContainer: function (ParsleyField) {
    return ParsleyField.$element.closest('.form__item').children('.parsley-errors-container');
  }
};
window.ParsleyValidator.setLocale('nl');

app.form = (function($, undefined) {
  var $document = $(document),
      $window = $(window),
      $html = $('html'),
      $body = $('body'),
      $forms = $('form');

  var _initialize = function() {
    $forms.on('click', 'button[type=submit]', this.submit);

    _autocomplete();
  };

  var _submit = function() {
    var $form = $(this.form);

    if($form.data('is-submitted')) return false;
    if($form.parsley().isValid()) {
      $form
        .data('is-submitted', true)
        .addClass('is-submitted');
    }
  };

  var _autocomplete = function() {
    var $inputGins = $('#form-search-gin');

    $inputGins.each(function() {
      var $field  = $(this),
          sourceUrl  = $field.data('source');

      var data = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace(name),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        limit: 10,
        remote: {
          url: sourceUrl + '?query=%QUERY',
          ajax: {
            beforeSend: function(){
              $field.addClass('is-loading');
            },
            complete: function(){
              $field.removeClass('is-loading');
            }
          }
        },
        filter: function(list) {
          return $.map(list, function(key, value) { return { name: value }; });
        }
      });

      data.initialize();

      data.get('he', function(suggestions) {
        console.log(suggestions);
      });

      $field
        .typeahead({
          hint: false
        }, {
          displayKey: 'name',
          source: data.ttAdapter(),
          templates: {
            suggestion: function(d) {
              return '<span class="tt-name">' + d.name + '</span>';
            }
          }
        })
        .bind('typeahead:selected', function(obj, datum, name) {
          $body.addClass('is-loading');
          console.log('selected!', datum, name);
        })
        .bind('typeahead:asyncrequest', function() {
          console.log('opened!');
        });

    });
  };


  // var _filter = function() {
  //   var formSelector = '.form--filter',
  //       resultsSelector = '#main',
  //       action = $(formSelector).attr('action');

  //   $document.on('change', '.form--filter input', function() {
  //     var $form = $(this.form),
  //         url = action + '?' + $form.serialize();

  //     if(Modernizr.history) {
  //       _loadResults(url, resultsSelector);
  //     }
  //   });

  //   var _loadResults = function(url, locationSelector) {
  //     var $location = $(locationSelector);
  //     $location.addClass('is-loading');

  //     $location.load( url + ' ' + locationSelector, function(data) {
  //       history.pushState('', 'New URL: ' + url, url);
  //       $location.removeClass('is-loading');
  //     });
  //   };

  //   if(Modernizr.history) {
  //     window.onpopstate = function(event) {
  //       var $location = $(resultsSelector);
  //       $location.addClass('is-loading');
  //       _loadResults(window.location.pathname + window.location.search, resultsSelector);
  //     };
  //   }
  // };


  // Expressionengine validation
  // var _validate= function() {
  //   $forms.each(function(k, v){
  //     var $form = $(v),
  //         $fields = $form.find('.form__text, .form__textarea'),
  //         $statusSucces = $form.find('.block--success'),
  //         $statusError = $form.find('.block--error'),
  //         $button = $form.find('[type=submit]'),
  //         action = $form.attr('action') ? updateQueryStringParameter($form.attr('action'), 'callback', '?') : '',
  //         method = $form.attr('method'),
  //         novalidate = $form.attr('novalidate'),
  //         noJSON = $form.hasClass('nojson'),
  //         $returnInput = $form.find('input[name="return_url"]'),
  //         returnURL;

  //     var onFormError = function() {
  //           $statusSucces.hide();
  //           $statusError.show(function() {
  //             animatedScrollTo(
  //               document.body,
  //               $statusError.offset().top,
  //               500
  //             );
  //           });
  //           $button.prop('disabled', false);
  //         },
  //         onFormSucces = function() {
  //           $form.hide();
  //           $statusError.hide();
  //           $statusSucces.show(function() {
  //             animatedScrollTo(
  //               document.body,
  //               $statusSucces.offset().top,
  //               500
  //             );
  //           });
  //         };

  //     if ($returnInput.length !== '0') {
  //       returnURL = $returnInput.val();
  //     }

  //     if (novalidate === undefined) {
  //       $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
  //         if (formInstance.isValid() === true) {
  //           $form.addClass('is-submitted');
  //           $button.prop('disabled', true);
  //         }
  //       });

  //       if (!noJSON) {
  //         $form.on('submit', function(e){
  //           e.preventDefault();
  //           /*
  //             We assume all internal forms have the POST method
  //             These forms send data in text format, so we need to convert that into a json object (done further below)
  //           */
  //           var ajaxSettings = {
  //             type: method,
  //             url: action,
  //             data: $form.serialize()
  //           };
  //           if (method === 'POST') {
  //             ajaxSettings.dataType = 'text';
  //           } else {
  //             ajaxSettings.dataType = 'json';
  //           }

  //           $.ajax(
  //             ajaxSettings
  //           )
  //           .done(function(data) {
  //             var isObj = $.isPlainObject(data);
  //             if (!isObj) {
  //               data = jQuery.parseJSON(data);
  //             }

  //             if (data.success && data.success === 1) {
  //               // Internal forms
  //               onFormSucces();
  //             } else if (data.Status && data.Status === 200) {
  //               onFormSucces();
  //             } else {
  //               onFormError();
  //             }
  //           })
  //           .fail(function(jqXHR, textStatus) {
  //             onFormError();
  //           })
  //           .always(function() {
  //             $form.removeClass('is-submitted');
  //           });
  //           if (!returnURL || returnURL === '') {
  //             return false;
  //           }
  //         });
  //       }
  //     }
  //   });
  // };

  return {
    init: _initialize,
    submit: _submit
  };

})(jQuery);
