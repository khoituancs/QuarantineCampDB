<style>
    #productList {
        display: none;
        border: 1px solid #ccc;
        max-height: 150px;
        overflow-y: auto;
        position: absolute;
        width: 200px;
        z-index: 1;
    }

    #productList a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: #333;
        background-color: #f8f8f8;
        border-bottom: 1px solid #ccc;
    }

    #productList a:hover {
        background-color: #ddd;
    }
</style>

<div class="modal fade" id="exampleModalToggle" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalToggleLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Result</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid px-5 table-responsive">
            <table class="table table-light table-striped table-hover table-bordered">
                <caption><div>Choose patient and click "View" to view patient info</div></caption>
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody id="table_content">
                    
                </tbody>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">View</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalToggleLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Patient Infomation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Hide this modal and show the first with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn " data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to search result</button>
      </div>
    </div>
  </div>
</div>