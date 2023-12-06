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
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel" style="color: #026fd4;">RESULT</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid px-3 table-responsive" id="table_content">
        </div>
      </div>
      <div class="modal-footer">
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
        <div class="container-fluid" id="table_content_2">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn " data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to search result</button>
      </div>
    </div>
  </div>
</div>