jQuery(document).ready(function ($) {
    // Some event will trigger the ajax call, you can push whatever data to the server, 
    // simply passing it to the "data" object in ajax call
    $.ajax({
        url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
        type: 'GET',
        data: {
            action: 'POST', // this is the function in your functions.php that will be triggered
            name: 'John',
            age: '38'
        },
        success: function (data) {
            console.log('sfycienstwo')
            console.log(data);
        }
    });
});