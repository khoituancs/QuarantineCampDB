const path = "/DB";


const toastElList = [].slice.call(document.querySelectorAll('.toast'))
const toastList = toastElList.map(function (toastEl) {
    return new bootstrap.Toast(toastEl, "delay", 1500);
})
const myToastEl = document.getElementById('successfulToast');
const myToast = bootstrap.Toast.getInstance(myToastEl);
const myToastEl2 = document.getElementById('failedToast');
const myToast2 = bootstrap.Toast.getInstance(myToastEl2);

$( function() {
    $( "#admission_date" ).datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
    });
});


// Function to make an XMLHttpRequest
function makeRequest(method, url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(xhr.responseText);
        }
    };
    xhr.send();
}

// Fetch personnel data from the server
makeRequest("POST", path + "/services/insert_helper.php", function (response) {
    // Parse JSON response

    var data = JSON.parse(response);

    // Populate select options for admitting staff
    populateSelectOptions("admitting_staff", "admitting_staff_code", data.staff);

    // Populate select options for nurse
    populateSelectOptions("nurse_number", "nurse_code", data.nurse);

    // Populate select options for building
    populateSelectOptionsBuilding("building", "building_number", data.building);


    // Populate select options for floor
    var floors = data.floor.filter(function (floor) {
        return floor.building_id == document.getElementById("building").value;
    });
    var select = document.getElementById("floor");
    select.innerHTML = "";
    floors.forEach(function (floor) {
        var option = document.createElement("option");
        option.value = floor.floor_number;
        option.text = floor.floor_number;
        select.appendChild(option);
    });

    document.getElementById("building").addEventListener("change", function () {
        var floors = data.floor.filter(function (floor) {
            return floor.building_id == document.getElementById("building").value;
        });
        var select = document.getElementById("floor");
        select.innerHTML = "";
        floors.forEach(function (floor) {
            var option = document.createElement("option");
            option.value = floor.floor_number;
            option.text = floor.floor_number;
            select.appendChild(option);
        });
        document.getElementById("floor_number").value = select.value;
    });

    // Populate select options for room
    var rooms = data.room.filter(function (room) {
        return (room.building_id == document.getElementById("building").value &&
        room.floor_number == document.getElementById("floor").value);
    });
    var select = document.getElementById("room");
    select.innerHTML = "";
    rooms.forEach(function (room) {
        var option = document.createElement("option");
        option.value = room.room_number;
        option.text = room.room_number;
        select.appendChild(option);
    });

    document.getElementById("floor").addEventListener("change", function () {
        var rooms = data.room.filter(function (room) {
            return (room.building_id == document.getElementById("building").value &&
            room.floor_number == document.getElementById("floor").value);
        });
        var select = document.getElementById("room");
        select.innerHTML = "";
        rooms.forEach(function (room) {
            var option = document.createElement("option");
            option.value = room.room_number;
            option.text = room.room_number;
            select.appendChild(option);
        });
        document.getElementById("room_number").value = select.value;
    });
    document.getElementById("building").addEventListener("change", function () {
        var rooms = data.room.filter(function (room) {
            return (room.building_id == document.getElementById("building").value &&
            room.floor_number == document.getElementById("floor").value);
        });
        var select = document.getElementById("room");
        select.innerHTML = "";
        rooms.forEach(function (room) {
            var option = document.createElement("option");
            option.value = room.room_number;
            option.text = room.room_number;
            select.appendChild(option);
        });
        document.getElementById("room_number").value = select.value;
    });
});

// Function to populate select options
function populateSelectOptions(selectId, hiddenInputId, data) {
    var select = document.getElementById(selectId);
    var hiddenInput = document.getElementById(hiddenInputId);

    data.forEach(function (person) {
        var option = document.createElement("option");
        option.value = person.unique_code;
        option.text = person.fullname;
        select.appendChild(option);
    });

    // Add event listener to update hidden input when the selection changes
    select.addEventListener("change", function () {
        hiddenInput.value = this.value;
    });
}


// Function to populate select options
function populateSelectOptionsBuilding(selectId, hiddenInputId, data) {
    var select = document.getElementById(selectId);
    var hiddenInput = document.getElementById(hiddenInputId);

    data.forEach(function (building) {
        var option = document.createElement("option");
        option.value = building.building_id;
        option.text = building.building_id;
        select.appendChild(option);
    });

    // Add event listener to update hidden input when the selection changes
    select.addEventListener("change", function () {
        hiddenInput.value = this.value;
    });
}

function addComorbidities() {
    const box = document.querySelector(".comorbidities-inputs");

    // Create a new textarea element
    const newTextarea = document.createElement('textarea');
    newTextarea.id = 'comorbidities';
    newTextarea.name = 'comorbidities';
    newTextarea.className = 'form-control my-1';
    newTextarea.rows = 1;
    newTextarea.placeholder = 'Write the comorbidity';
    newTextarea.required = true;
    
    // Append the new textarea element to the container
    box.appendChild(newTextarea)
}

function removeComorbidities() {
    var boxContainer = document.querySelector(".comorbidities-inputs");
    var boxes = boxContainer.querySelectorAll("textarea");
    if (boxes.length > 1) {
        boxContainer.removeChild(boxes[boxes.length - 1])
    }
}

function handle_insert() {
    // Create an object to hold your form data
    var formData = {
        // Add other form fields here
        full_name: document.getElementById('full_name').value,
        gender: document.getElementById('gender').value,
        identity_number: document.getElementById("identity_number").value,
        phone: document.getElementById("phone").value,
        address: document.getElementById("address").value,
        last_location: document.getElementById("last_location").value,
        admission_date: document.getElementById("admission_date").value,
        admitting_staff_code: document.getElementById("admitting_staff_code").value,
        nurse_code: document.getElementById("nurse_code").value,
        room_number: document.getElementById("room_number").value,
        floor_number: document.getElementById("floor_number").value,
        building_number: document.getElementById("building_number").value,

        // Handle the comorbidities textareas
        comorbidities: []
    };

    // Iterate over all comorbidities textareas and add their values to the array
    document.querySelectorAll('textarea[name^="comorbidities"]').forEach(function(textarea) {
        formData.comorbidities.push(textarea.value);
    });

    // Convert the object to JSON
    var jsonData = JSON.stringify(formData);

    // Send the JSON data via AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', path+'/services/insert_processing.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json'); // Set the content type to JSON
    xhr.withCredentials = true;

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                if(xhr.responseText == "Success"){
                    myToast.show();
                }
                else{
                    console.log(xhr.responseText);
                    myToast2.show();
                }
            }
        }
    };

    xhr.send(jsonData);
}