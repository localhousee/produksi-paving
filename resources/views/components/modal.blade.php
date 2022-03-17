<div>
  <a class="text-danger nav-link" href="#" data-toggle="modal" data-target="#delete{{ $pointer }}">
    Hapus
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="delete{{ $pointer }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda yakin?</div>
        <div class="modal-footer">
          <form action="{{ $route }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <button class="btn btn-primary" type="submit">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Topbar -->
</div>
