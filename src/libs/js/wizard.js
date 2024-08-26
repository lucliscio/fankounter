function validate(button) {
    var wizardSection = $(button).closest("section");
    var valid = true;
    var id = $(wizardSection).prop('id');

    
    $(this).css("border", "1px solid #9a9a9a");
    $(wizardSection).find("input").each(function() {

        if(id == "licence-section"){
            console.log($(this).prop('name'));
            if (!$(this).is(':checked')) {
                valid = false;
                UIkit.modal.alert('<span uk-icon="icon: warning; ratio: 3" style="color: orange;"></span> Devi accettare la licenza per poter proseguire').then(function () {
                    console.log('Alert closed.')
                });
            }
        }

        if ($(this).val() == "") {
            valid = false;
            $(this).css("border", "red 1px solid");
        }
    });

    if (valid == true) {
        showNextWizardSection(wizardSection);
    }
}

function showNextWizardSection(wizardSection) {
    $("section").addClass("display-none");
    $(wizardSection).next("section").removeClass("display-none");
    $(".wizard-flow-chart span.fill").next("span").addClass("fill");
}

function showPrevious(button) {
    var wizardSection = $(button).closest("section");
    $("section").addClass("display-none");
    $(wizardSection).prev("section").removeClass("display-none");
    $(".wizard-flow-chart span.fill").last().removeClass("fill");
}

function validateCheckout() {
    if ($("#notes").val() == "") {
        $("#notes").css("border", "red 1px solid");
        return false;
    }
}