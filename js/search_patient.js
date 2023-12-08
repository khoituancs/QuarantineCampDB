const path = "/QuarantineCampDB";
function search_query() {
    if ($("#replace_admission_date").val() === ''){
        $("#admission_date").val('');
    }
    else{
        var selectedDate = $("#replace_admission_date").val();
        var convertedDate = convertDateFormat(selectedDate);
        $("#admission_date").val(convertedDate);
    }
    // If validation succeeds, allow the form to submit via AJAX
    var formData = new FormData(document.getElementById('search_form')); // change to form id
    var xhr = new XMLHttpRequest();
    xhr.open('POST', path+'/services/search_processing.php', true);
    xhr.withCredentials = true;

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById('table_content').innerHTML = xhr.responseText;
            }
        }
        console.log(xhr.responseText);
    };
    xhr.send(formData);
}

function view_query(type_test,patient_id) {
    
    // If validation succeeds, allow the form to submit via AJAX
    
    var formData = new FormData();
    
    // Append data to FormData
    formData.append('type', type_test);
    formData.append('patient_id', patient_id);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', path+'/services/view_processing.php', true);
    xhr.withCredentials = true;

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById('table_content_2').innerHTML = xhr.responseText;
            }
        }
        console.log(xhr.responseText);
    };
    xhr.send(formData);
}

$( function() {
    $( "#replace_admission_date" ).datepicker({
        dateFormat: 'dd/mm/yy',changeMonth: true,
        changeYear: true,
    });
} );

function convertDateFormat(originalDate) {
    var parts = originalDate.split('/');
    return parts[2] + '-' + parts[1] + '-' + parts[0];
}