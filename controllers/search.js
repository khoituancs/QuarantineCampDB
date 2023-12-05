const path = "/DB";
function handle_query() {
    // var query = document.getElementById('products').value;
    // If validation succeeds, allow the form to submit via AJAX
    var formData = new FormData(document.getElementById('search_form')); // change to form id
    var xhr = new XMLHttpRequest();
    xhr.open('POST', path+'/services/dbconnect-mysql.php', true);
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
/*document.addEventListener('DOMContentLoaded', function () {
    var productsInput = document.getElementById('products'); //input
    var productList = document.getElementById('productList'); //live search

    productsInput.addEventListener('input', function () {
        var query = productsInput.value;

        if (query.length >= 1) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST',root_login + '/services/search_algorithm.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    displayResults(xhr.responseText);
                }
            };
            xhr.send('products=' + encodeURIComponent(query));
        } else {
            productList.style.display = 'none';
        }
    });

    document.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            // Prevent the default form submission
            e.preventDefault();
            // Perform your AJAX submission or other logic here
            handle_query();
        }
    });

    function displayResults(results) {
        productList.innerHTML = '';

        var productArray = JSON.parse(results);

        if (productArray.length > 0) {
            for (var i = 0; i < productArray.length; i++) {
                var link = document.createElement('a');
                link.href = 'javascript:void(0);';
                link.innerText = productArray[i].name;
                link.addEventListener('click', function () {
                    productsInput.value = this.innerText;
                    productList.style.display = 'none';
                });
                productList.appendChild(link);
            }

            // Position the dropdown below the input
            var rect = productsInput.getBoundingClientRect();
            productList.style.top = rect.bottom + 'px';
            productList.style.left = rect.left + 'px';

            productList.style.display = 'block';
        } else {
            productList.style.display = 'none';
        }
    }
});
*/