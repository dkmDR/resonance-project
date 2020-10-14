 Common = function() {};

Common.prototype = {
    errorMessage: function(){
      return "Internal Error, please call the administrator";
    },
    /**
     * 
     * @param {number} nStr
     * @returns {string}
     */
    number_format : function(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    },
    /**
     * 
     * @param {string} key key value language
     * @returns {String}
     */
    getLanguage : function( key ){
        
        // var msg = language_json[key];
        var msg = key;
        return msg;
    },
    getSpin : function(spin, opts){
        
        if (opts === undefined) {
        opts = {
          lines: 13, // The number of lines to draw
          length: 20, // The length of each line
          width: 10, // The line thickness
          radius: 30, // The radius of the inner circle
          corners: 1, // Corner roundness (0..1)
          rotate: 0, // The rotation offset
          direction: 1, // 1: clockwise, -1: counterclockwise
          color: '#000', // #rgb or #rrggbb or array of colors
          speed: 1, // Rounds per second
          trail: 56, // Afterglow percentage
          shadow: false, // Whether to render a shadow
          hwaccel: false, // Whether to use hardware acceleration
          className: 'spinner', // The CSS class to assign to the spinner
          zIndex: 2e9, // The z-index (defaults to 2000000000)
          top: '50%', // Top position relative to parent
          left: '50%' // Left position relative to parent
        };
      }

      var data = $('body').data();

      if (data.spinner) {
        data.spinner.stop();
        delete data.spinner;
        $("#spinner_modal").remove();
        return this;
      }

      if (spin) {

        var spinElem = this;

        $('body').append('<div id="spinner_modal" style="background-color: rgba(0, 0, 0, 0.3); width:100%; height:100%; position:fixed; top:0px; left:0px; z-index:' + (opts.zIndex - 1) + '"/>');
        spinElem = $("#spinner_modal")[0];

        data.spinner = new Spinner($.extend({
          color: $('body').css('color')
        }, opts)).spin(spinElem);
      }
        
    },
    successAlert: function (title, msg) {
        return swal({
            title: title,
            text: msg,
            icon: "success",
            button: "continue",
        });
    },
    errorAlert: function (title, msg) {
        swal({
            title: title,
            text: msg,
            icon: "error",
            button: "continue",
        });
    },
    warningAlert: function (title, msg) {
        swal({
            title: title,
            text: msg,
            icon: "warning",
            button: "continue",
        });
    },
    promptAlert: function(text,btnText) {
        return swal({
            text: text,
            content: "input",
            button: {
                text: btnText,
                closeModal: false,
            },
        });
    },
    infoAlert: function (title, msg) {
        swal({
            title: title,
            text: msg,
            icon: "info",
            button: "continue",
        });
    },
    /**
     * you could call .then((willDelete)=>{}) ask for param to know if you confirm or cancel
     * @param title
     * @param msg
     */
    confirmAlert: function (title, msg ) {
        return swal({
            title: title,
            text: msg,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
    },
    notifyError: function( error ) {
        $.ajax({
            type    :   "POST",
            url     :   "save/internal/error",
            data    :   {
                error : error
            },
            dataType: "text",
            async: false,
            beforeSend:function(){ },
            success:function( returned ){ },
            error:function(e, h, r){ }
        });
    },
    modalContent: function (id, title, html, button, size) {
      size = size !== undefined ? size : "md";
      const modal = '<div class="modal fade" id="'+id+'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
          '  <div class="modal-dialog modal-'+size+'">\n' +
          '    <div class="modal-content">\n' +
          '      <div class="modal-header">\n' +
          '        <h5 class="modal-title" id="exampleModalLabel">'+title+'</h5>\n' +
          '        <button type="button" class="close" data-dismiss="modal" aria-label="Close">\n' +
          '          <span aria-hidden="true">&times;</span>\n' +
          '        </button>\n' +
          '      </div>\n' +
          '      <div class="modal-body">\n' +
                    html+'\n' +
          '      </div>\n' +
          '      <div class="modal-footer">\n' +
          '        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>\n' +
                   button+'\n' +
          '      </div>\n' +
          '    </div>\n' +
          '  </div>\n' +
          '</div>';
        $(modal).appendTo("body");
        $('#'+id).on('hidden.bs.modal', function (e) {
            if($("body").find("#"+id).length>0) {
                $("body").find("#"+id).remove();
            }
        })
    },
    getModal: function( id ){
        $(document).find("#"+id).modal({
            backdrop: 'static',
            keyboard: false,
            show : true
        });
    },
    closeModal: function( id ){
        $(document).find("#"+id).modal("hide");
    },
    printer : function ( id, callBack ) {
        callBack = ( typeof callBack !== "undefined" ) ? callBack : function() {} ;
        $("body").find("#" + id).print({
            //Use Global styles
            globalStyles: true,
            //Add link with attrbute media=print
            mediaPrint: true,
            //Custom stylesheet
            /*stylesheet: "http://fonts.googleapis.com/css?family=Inconsolata",*/
            // stylesheet: "http://localhost/assets/css/common.css",
            //Print in a hidden iframe
            iframe: false,
            //Don't print this
            noPrintSelector: "",
            //Add this at top
            // prepend: "Hello World!!!<br/>",
            //Add this on bottom
            append: "<br/>Buh Bye!",
            //Log to console when printing is done via a deffered callback
            deferred: $.Deferred().done(callBack)
        });
    },
    dataTable: function( id, url, method, columns, params, options ) {
        let parameter = params !== undefined ? params : null;
        if ( options === undefined ) {
            options = {
                scrollX: true,
                scrollY: 810
            }
        }
        $("#"+id).DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: url,
                data : {
                    method : method,
                    params : parameter
                }
            },
            "columns": columns,
            lengthMenu : [[25, 50, 75, 100,150,200,250,300,450,500], [25, 50, 75, 100,150,200,250,300,450,500]],
            scrollX: options.scrollX,
            scrollY: options.scrollY,
            "order" : [[1,"desc"]]
        } );
    },
    printer : function ( id, callBack ) {
        callBack = ( typeof callBack !== "undefined" ) ? callBack : function() {} ;
        $("body").find("#" + id).print({
            //Use Global styles
            globalStyles: true,
            //Add link with attrbute media=print
            mediaPrint: true,
            //Custom stylesheet
            /*stylesheet: "http://fonts.googleapis.com/css?family=Inconsolata",*/
            // stylesheet: "http://localhost/assets/css/common.css",
            //Print in a hidden iframe
            iframe: false,
            //Don't print this
            noPrintSelector: "",
            //Add this at top
            // prepend: "Hello World!!!<br/>",
            //Add this on bottom
            append: "<br/>Buh Bye!",
            //Log to console when printing is done via a deffered callback
            deferred: $.Deferred().done(callBack)
        });
    }
};
