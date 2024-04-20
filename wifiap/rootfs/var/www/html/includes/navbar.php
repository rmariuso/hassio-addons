<nav class="navbar navbar-expand navbar-light topbar mb-1 static-top">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTopbar" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>
        <!-- Topbar Navbar -->
        <p class="text-left brand-title mt-3 ml-2"></p>
        <ul class="navbar-nav ml-auto">
          <!-- Nav Item - Night mode -->
          <div class="custom-control custom-switch mt-4">
            <input type="checkbox" class="custom-control-input" id="night-mode" <?php echo getNightmode() ? 'checked' : null ; ?> >
            <label class="custom-control-label" for="night-mode"><i class="far fa-moon mr-4 text-muted"></i></label>
          </div>
        </ul>
      </nav>