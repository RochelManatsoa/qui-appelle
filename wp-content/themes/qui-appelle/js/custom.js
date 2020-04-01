/* jQuery Validates Plugin */
(function(jQuery) {
    var dialogAnnuaireSearch = {
        init: function(){
            this.annuaireRenverse();
            this.annuairePart();
            this.annuairePro();
        },
        annuaireRenverse: function(){
            var dialog = document.querySelector('dialog#resultsSearchDialogueAnnRenv');

            if (dialog !== null) {

                var showDialogButton = jQuery('#send');

                if (!dialog.showModal) {
                    dialogPolyfill.registerDialog(dialog);
                }
                showDialogButton.on('click', function () {
                    dialog.showModal();
                });
                jQuery('dialog#resultsSearchDialogueAnnRenv .close').on('click', function () {
                    dialog.close();
                });
            }
        },
        annuairePart: function(){
            var dialog = document.querySelector('dialog#resultsSearchDialogueAnnPart');

            if (dialog !== null) {

                var showDialogButton = jQuery('#sendName');

                if (!dialog.showModal) {
                    dialogPolyfill.registerDialog(dialog);
                }
                showDialogButton.on('click', function () {
                    dialog.showModal();
                    if(jQuery('#resultsSearchDialogueAnnPart').attr("open")){
                        jQuery('#loading-part').removeClass("active");
                    }
                });
                jQuery('dialog#resultsSearchDialogueAnnPart .close').on('click', function () {
                    dialog.close();
                });
            }
        },
        annuairePro: function(){
            var dialog = document.querySelector('dialog#resultsSearchDialogueAnnPro');

            if (dialog !== null) {

                var showDialogButton = jQuery('#sendNamePro');

                if (!dialog.showModal) {
                    dialogPolyfill.registerDialog(dialog);
                }
                showDialogButton.on('click', function () {
                    dialog.showModal();
                    if(jQuery('#resultsSearchDialogueAnnPro').attr("open")){
                        jQuery('#loading-pro').removeClass("active");
                    }
                });
                jQuery('dialog#resultsSearchDialogueAnnPro .close').on('click', function () {
                    dialog.close();
                });
            }
        }
    }

    var ValidationErrors = new Array();
    jQuery.fn.validate = function(options) {
        options = jQuery.extend({
            expression: "return true;",
            message: "",
            error_class: "ValidationErrors",
            error_field_class: "ErrorField",
            success_field_class: "SuccessField",
            live: true
        }, options);
        var SelfID = jQuery(this).attr("id");
        var unix_time = new Date();
        unix_time = parseInt(unix_time.getTime() / 1000);
        if (!jQuery(this).parents("form:first").attr("id")) {
            jQuery(this).parents("form:first").attr("id", "Form_" + unix_time)
        }
        var FormID = jQuery(this).parents("form:first").attr("id");
        if (!((typeof(ValidationErrors[FormID]) == "object") && (ValidationErrors[FormID] instanceof Array))) {
            ValidationErrors[FormID] = new Array()
        }
        if (options.live) {
            if (jQuery(this).find("input:enabled").length > 0) {
                jQuery(this).find("input:enabled").bind("blur", function() {
                    if (validate_field("#" + SelfID, options)) {
                        if (options.callback_success) {
                            options.callback_success(this)
                        }
                    } else {
                        if (options.callback_failure) {
                            options.callback_failure(this)
                        }
                    }
                });
                jQuery(this).find("input:enabled").bind("focus keypress click", function() {
                    jQuery("#" + SelfID).next("." + options.error_class).remove();
                    jQuery("#" + SelfID).parents('.form-item').removeClass(options.error_field_class).removeClass(options.success_field_class);
                })
            } else {
                jQuery(this).bind("blur", function() {
                    validate_field(this)
                });
                jQuery(this).bind("focus keypress", function() {
                    jQuery(this).next("." + options.error_class).fadeOut("fast", function() {
                        jQuery(this).remove()
                    });
                    jQuery(this).parents('.form-item').removeClass(options.error_field_class).removeClass(options.success_field_class);
                })
            }
        }
        jQuery(this).parents("form").submit(function() {
            if (jQuery("#" + SelfID).is(':disabled') == true || validate_field("#" + SelfID)) {
                //Form is validated
                return true
            } else {
                //Form is Blocked
                return false
            }
        });

        function validate_field(id) {
            var self = jQuery(id).attr("id");
            var expression = "function Validate(){" + options.expression.replace(/VAL/g, "jQuery('#" + self + "').val()") + "} Validate()";
            var validation_state = eval(expression);
            if (!validation_state) {
                if (jQuery(id).next("." + options.error_class).length == 0) {
                    jQuery(id).after('<span class="' + options.error_class + '">' + options.message + "</span>");
                    jQuery(id).parents('.form-item').removeClass(options.success_field_class).addClass(options.error_field_class);
                }
                if (ValidationErrors[FormID].join("|").search(id) == -1) {
                    ValidationErrors[FormID].push(id)
                }
                return false
            } else {
                for (var i = 0; i < ValidationErrors[FormID].length; i++) {
                    if (ValidationErrors[FormID][i] == id) {
                        ValidationErrors[FormID].splice(i, 1)
                    }
                }
                jQuery(id).parents('.form-item').addClass(options.success_field_class)
                dialogAnnuaireSearch.init();
                return true
            }
        }
    };
    jQuery.fn.validated = function() {
        jQuery(this).each(function() {
            if (this.tagName == "FORM") {
                jQuery(this).submit(function() {
                    if (ValidationErrors[jQuery(this).attr("id")].length == 0) {
                        return true
                    }
                    return false
                })
            }
        })
    }

    jQuery("#labelName").validate({
        expression: "if (VAL) return true; else return false;",
        message: 'Champ requis'
    });

    jQuery("#labelMetier").validate({
        expression: "if (VAL) return true; else return false;",
        message: 'Champ requis'
    });
    jQuery("#labelVillePro").validate({
        expression: "if (VAL) return true; else return false;",
        message: 'Champ requis'
    });
    jQuery("#labelNom").validate({
        expression: "if (VAL) return true; else return false;",
        message: 'Champ requis'
    });
    jQuery("#labelVille").validate({
        expression: "if (VAL) return true; else return false;",
        message: 'Champ requis'
    });
    /*end jQuery Validates Plugin*/
})(jQuery);

(function(jQuery) {
    jQuery('#labelName').on('keyup', function(){
        var inputValue = jQuery(this).val();
        var filter = /^[0-9]+$/;
        var msg = "Seuls les caractères numériques sont autorisés";
        var msg2 = "Mauvais format de numéro";
        var msg3 = "Ce champs est requis"

        if (filter.test(inputValue)) {
            if(! inputValue == ""){
                jQuery("#errormsg").html("");
            }
            if(! inputValue == "" && inputValue.length > 10){
                jQuery("#errormsg").html(msg2);
            }
        }else{
            if(! inputValue == ""){
                jQuery("#errormsg").html(msg);
            }
        }
    });
})(jQuery);
