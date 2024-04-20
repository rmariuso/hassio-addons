<?php ob_start() ?>
  <?php if (!RASPI_MONITOR_ENABLED) : ?>
    <input type="submit" class="btn btn-outline btn-primary" id="btnSaveHostapd" name="SaveHostAPDSettings" value="<?php echo _("Save settings"); ?>" />
    <!-- Modal -->
  <?php endif ?>
<?php $buttons = ob_get_clean(); ob_end_clean() ?>

<div class="row">
  <div class="col-lg-12">
    <div class="card">

      <div class="card-header">
        <div class="row">
          <div class="col">
            <i class="far fa-dot-circle mr-2"></i><?php echo _("Hotspot"); ?>
          </div>
          <div class="col">
            <button class="btn btn-light btn-icon-split btn-sm service-status float-right">
              <span class="icon text-gray-600"><i class="fas fa-circle service-status-<?php echo $serviceStatus ?>"></i></span>
              <span class="text service-status">hostapd <?php echo _($serviceStatus) ?></span>
            </button>
          </div>
        </div><!-- /.row -->
      </div><!-- /.card-header -->

      <div class="card-body">
        <?php $status->showMessages(); ?>
        <form role="form" action="hostapd_conf" method="POST" class="needs-validation" novalidate>
          <?php echo CSRFTokenFieldTag() ?>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" id="basictab" href="#basic" aria-controls="basic" data-toggle="tab"><?php echo _("Basic"); ?></a></li>
            <li class="nav-item"><a class="nav-link" id="securitytab" href="#security" data-toggle="tab"><?php echo _("Security"); ?></a></li>
            <li class="nav-item"><a class="nav-link" id="advancedtab" href="#advanced" data-toggle="tab"><?php echo _("Advanced"); ?></a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <?php echo renderTemplate("hostapd/basic", $__template_data) ?>
            <?php echo renderTemplate("hostapd/security", $__template_data) ?>
            <?php echo renderTemplate("hostapd/advanced", $__template_data) ?>
          </div><!-- /.tab-content -->

          <?php echo $buttons ?>
        </form>
      </div><!-- /.card-body -->

      <div class="card-footer"> <?php echo _("Information provided by hostapd"); ?></div>

    </div><!-- /.card -->
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
