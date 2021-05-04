/**
 * @author David Luis
 * Description:
 * functions for the animation and control of the form
 * 
 */

/* Method insertion in page loaded event */
window.addEventListener('load', pageLoaded, false);

/**
 * Method to remove the error class from a form field
 * 
 * @param  object  event
 * @return void
 */
function removeError(event){
    var element = event.target.parentNode;
    element.className = element.className.replace('error', '').trim();
    element.removeEventListener('change', removeError);
}

/**
 * Method for listening for changes in the fields with the error class
 * 
 * @return void
 */
function listenerErrors(){
    var numErrors = document.getElementsByClassName('error').length;
    for (var i = 0; i < numErrors; i++) {
        document.getElementsByClassName('error')[i].addEventListener('change', removeError);
    }
}

/**
 * Method in charge of validating the content of the form
 * 
 * @return void
 */
function formValidation(){

    var elements = document.getElementsByClassName('required');
    var numRequired = elements.length;

    if(numRequired > 0){

        for(var i = 0; i < numRequired; i++){
            var element = elements[i];
            if(element.className.indexOf('hidden') < 0 && element.className.indexOf('error') < 0){
                var inputs = element.getElementsByClassName('input');
                var numInputs = inputs.length;
                for(var x = 0; x < numInputs; x++){
                    if(inputs[x].value == ''){
                        element.className += ' error';
                        x = numInputs;
                    }
                }
            }

            if(element.className.indexOf('hidden') > -1){
                element.className = element.className.replace('error', '').trim();
            }

        }

    }

    if(document.getElementsByClassName('error').length > 0){
        listenerErrors();
    } else {
        showLoading();
        sendForm();
    }

}

/**
 * Method responsible for displaying the loading window
 * 
 * @return void
 */
function showLoading(){
    document.body.style.overflow = 'hidden';
    document.getElementById('loading').style.display = 'block';
}

/**
 * Method responsible for submitting the form
 * 
 * @return void
 */
function sendForm(){
    setTimeout(function(){
        document.getElementById('form').submit();
    }, 2000);
}

/**
 * Method responsible for displaying the content of the page once loaded
 * 
 * @return void
 */
function pageLoaded(){

    setTimeout(function(){
        var loading = document.getElementById('loading');
        document.body.style.overflow = 'auto';
        loading.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
        loading.style.animationDuration = '1s';
        loading.style.animationName = 'loading';
        loading.style.display = 'none';
    }, 1000);

}