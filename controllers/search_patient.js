const path = "/QuarantineCampDB";
function handle_query() {
    document.getElementById("loading").style.display = "block";
    // var query = document.getElementById('products').value;
    // If validation succeeds, allow the form to submit via AJAX
    var formData = new FormData(document.getElementById('search_form')); // change to form id
    var xhr = new XMLHttpRequest();
    xhr.open('POST', path+'/services/dbconnect.php', true);
    xhr.withCredentials = true;

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById("loading").style.display = "none"; // Hide loading animation when the request is complete
                document.getElementById('table_content').innerHTML = xhr.responseText;
            }
        }
        //console.log(xhr.responseText);
    };
    xhr.send(formData);
}

$( function() {
    $( "#admission_date" ).datepicker({
        dateFormat: 'dd/mm/yy',
    });
} );