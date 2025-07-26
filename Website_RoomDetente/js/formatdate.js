$(document).ready(function() 
{  
    // Autotab
    $('.date-field').autotab('number');

    $('.single-date-field').mask('00/00/0000', 
    {placeholder: "_ _ /_ _ /_ _ _ _"});
});